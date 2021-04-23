<?php

namespace App\Http\Controllers;

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
            'title'             => 'Tambah Purchase Order',
            'submitButton'      => 'Tambah',
            'action'            => $this->getRoute().'.create',
        ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
