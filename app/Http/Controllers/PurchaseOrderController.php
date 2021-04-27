<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DetailPurchaseOrder;
use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Get named route
     *
     */
    private function getRoute() {
        return 'purchase_order';
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $purchase_order = PurchaseOrder::latest()->get();
            return datatables()->of($purchase_order)
                    ->addColumn('action', function($data){
                        $button = '<a href="'.route('purchase_order.show', $data).'" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search"></i></a>';
                        if (empty($data->verification_order)) {
                            $button .= '<a href="'.route('purchase_order.edit', $data).'" class="btn btn-sm btn-info mr-1"><i class="fa fa-cog"></i></a>';
                            $button .= '<a href="#" class="btn btn-sm btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-trash"></i></a>';                            
                        }

                        return $button;
                    })
                    ->addColumn('order_date', function($data){
                        return simpleDate($data->order_date);
                    })
                    ->addColumn('status', function($data){
                        return order_status($data->status);
                    })
                    ->addColumn('user', function($data){
                        return $data->user->name;
                    })
                    ->addColumn('store', function($data){
                        return $data->store->name;
                    })
                    ->addColumn('total', function($data){
                        $details = $data->detail_orders;
                        $total = 0;
                        if ($details) {
                            foreach ($details as $key => $detail_order) {
                                $total += $detail_order->quantity*$detail_order->price;
                            }
                        }

                        return 'Rp. '.number_format($total, '0', '', '.').'';
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }
        return view('pages.purchase_order.index', [
            'title' => 'Daftar Purchase Order'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.purchase_order.form', [
            'purchase_order'    => new PurchaseOrder,
            'suppliers'          => Supplier::get(),
            'title'             => 'Tambah Purchase Order',
            'submitButton'      => 'Tambah',
            'action'            => $this->getRoute().'.create',
        ]);
    }

    public function detailSupplier()
    {
        $supplier = Supplier::with('region')->findOrFail(request('supplier_id'));
        if ($supplier) {
            return response()->json([
                'status'    => 200,
                'supplier'  => $supplier,
                'message'   => 'Success'
            ]);
        } else {
            return response()->json([
                'status'   => 400,
                'message'  => 'Failed'
            ]);
        }
    }

    public function orderNumber()
    {
        $supplier_id = request('supplier_id');
        $supplier = Supplier::find($supplier_id);

        if ($supplier) {

            $supplier_code = $supplier->supplier_code.'-'.$supplier->region->region_code;
            $month = $this->romanNumerals(date('n'));
            $year = date('Y');
            $key = $supplier_code.'/'.$month.'/'.$year;

            $purchase_order = PurchaseOrder::where('order_number', 'like', '%/'.$key.'%')->orderBy('id', 'desc')->first();

            if ($purchase_order) {                
                $row = explode('/', $purchase_order->order_number);

                $row[0] += 1;

                switch (strlen($row[0])) {
                    case '1':
                        $num = '000'.$row[0];
                        break;

                    case '2':
                        $num = '00'.$row[0];
                        break;

                    case '3':
                        $num = '0'.$row[0];
                        break;
                    
                    default:
                        $num = $row[0];
                        break;
                }
                
                $number = $num.'/'.$key;
            } else {
                $number = '0001/'.$key;
            }

            return response()->json([
                'status'       => '200',
                'orderNumber'  => $number,
                'message'      => 'Success'
            ]);
        } else {
            return response()->json([
                'status'  => '404',
                'message' => 'Error Order Number'
            ]);
        }
    }

    public function romanNumerals($month)
    {        
        $roman = array('0', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        return $roman[$month];
    }

    public function getItemsOrder()
    {
        $supplier = Supplier::with('items')->find(request('supplier_id'));
        $item = Item::with('unit', 'brand', 'suppliers')->find(request('item_id'));
        if ($supplier && $item) {
            $res = $supplier->items()->where('item_id', $item->id)->first();
            if ($res) {
                $price = $res->pivot->price;
            }
        }

        if ($item) {
            $item->price = $price ?? 0;            
            return response()->json([
                'status'    => 200,
                'item'      => $item,
                'message'   => 'Success'  
            ]);
        } else {
            return response()->json([
                'status'    => 400,
                'message'   => 'Fail'  
            ]);
        }
    }

    public function getStatusOrders($itemOrders)
    {        
        $grandTotal = 0;
        for ($i=0; $i < count($itemOrders['item']); $i++) { 
            $grandTotal += $itemOrders['quantity'][$i]*$itemOrders['price'][$i];
        }

        $status = ($grandTotal >= 20000000) ? '0' : '1';

        return $status;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = Supplier::find(request('supplier_id'));
        $status   = $this->getStatusOrders($request->all());
        try {   

            if ($supplier) {
                $syncData = [];

                foreach($request->input('item_id') as $key => $id) { 
                    $syncData[$id] = [ 'price' => $request->input('price')[$key] ];
                }

                $supplier->items()->sync($syncData, false);

                $newOrder = PurchaseOrder::create([
                    'order_number'  => $request->order_number,
                    'order_date'    => $request->order_date,
                    'note'          => $request->note ?? '-',
                    'status'        => $status,
                    'user_id'       => auth()->user()->id,
                    'supplier_id'   => $request->supplier_id,
                    'store_id'      => $request->store_id
                ]);
                
                for ($i=0; $i < count($request->item); $i++) {
                    DetailPurchaseOrder::create([
                        'order_id'  => $newOrder->id,
                        'item_id'   => $request->item_id[$i],
                        'quantity'  => $request->quantity[$i],
                        'price'     => $request->price[$i]
                    ]);
                }
            }

            return redirect()->route($this->getRoute().'.show', $newOrder)->with('success', $newOrder->order_number.' berhasil dibuat.');

        } catch (\Throwable $th) {
            
            return redirect()->route($this->getRoute().'.create')->with('error', $th->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {        
        return view('pages.purchase_order.show', [
            'purchase_order' => $purchaseOrder,
            'title'          => $purchaseOrder->order_number
        ]);
    }

    public function printOrder(PurchaseOrder $purchaseOrder)
    {
        $data = [
            'purchase_order' => $purchaseOrder,
            'company'        => Company::orderBy('id', 'asc')->first()
        ];

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadview('pages.purchase_order.print_order', $data)->setPaper('a4', 'potrait');

        return $pdf->stream();

        // return view('pages.purchase_order.print_order', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        return view('pages.purchase_order.form', [
            'purchase_order' => $purchaseOrder,
            'title'          => $purchaseOrder->order_number,
            'submitButton'   => 'Simpan',
            'action'         => $this->getRoute().'.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $supplier = Supplier::find($request->supplier_id);
        $status   = $this->getStatusOrders($request->all());
        try {
            
            if ($supplier) {

                $syncData = [];

                foreach($request->input('item_id') as $key => $id) { 
                    $syncData[$id] = [ 'price' => $request->input('price')[$key] ];
                }

                $supplier->items()->sync($syncData, false);
                
                $newOrder = $purchaseOrder->update([
                    'order_number'  => $request->order_number,
                    'note'          => $request->note ?? '-',
                    'status'        => $status,
                    'supplier_id'   => $request->supplier_id,
                    'store_id'      => $request->store_id
                ]);

                if ($newOrder) {
                    $purchaseOrder->detail_orders()->delete();
                    for ($i=0; $i < count($request->item); $i++) { 
                        $purchaseOrder->detail_orders()->create([                            
                            'order_id'  => $purchaseOrder->id,
                            'item_id'   => $request->item_id[$i],
                            'quantity'  => $request->quantity[$i],
                            'price'     => $request->price[$i]
                        ]);
                    }
                }

                return redirect()->route($this->getRoute().'.show', $purchaseOrder)->with('success', $purchaseOrder->order_number.' berhasil diupdate');

            } else {

                return redirect()->route($this->getRoute().'.edit', $purchaseOrder)->with('error', 'Terjadi kesalahan.');

            }

        } catch (\Throwable $th) {
            
            return redirect()->route($this->getRoute().'.edit', $purchaseOrder)->with('error', $th->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $purchaseOrder = PurchaseOrder::find(request()->get('id'));
        if ($purchaseOrder) {
            $purchaseOrder->delete();
            return response()->json([
                'status'    => 200,
                'message'   => 'success'
            ]);
        } else {
            return response()->json([
                'status'    => 400,
                'message'   => 'fail'
            ]);
        }
    }
}
