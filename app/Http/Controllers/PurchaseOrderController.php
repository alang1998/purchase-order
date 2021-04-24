<?php

namespace App\Http\Controllers;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = Supplier::find(request('supplier_id'));
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
                    'note'          => $request->note,
                    'status'        => '0',
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

            return redirect()->route($this->getRoute())->with('success', $newOrder->order_number.' berhasil dibuat.');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
