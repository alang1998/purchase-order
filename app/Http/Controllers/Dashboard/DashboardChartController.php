<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPurchaseOrder;
use App\Http\Controllers\Controller;

class DashboardChartController extends Controller
{
    public function getWeeklyPurchaseOrder()
    {
        $weekly_po_index = array();
        $weekly_po_count = array();
        $purchase_orders = PurchaseOrder::select([
            // This aggregates the data and makes available a 'count' attribute
            DB::raw('count(id) as `count`'), 
            // This throws away the timestamp portion of the date
            DB::raw('SUM(grand_total) as grand_total'),
            DB::raw('DATE(created_at) as day')
          // Group these records according to that day
          ])->groupBy('day')
          // And restrict these results to only those created in the last week
          ->where('created_at', '>=', Carbon::now()->subWeeks(1))
          ->whereNull('deleted_at')
          ->get();
        $purchase_orders = json_decode($purchase_orders);

        foreach($purchase_orders as $entry) {
            array_push($weekly_po_index, date('D', strtotime($entry->day)));
            array_push($weekly_po_count, $entry->count);
        }

        // $max_no = max($weekly_po_count);
        // $max = round(($max_no + 10/2) / 10) * 10;

        $weekly_po_data = array(
            'day' => $weekly_po_index,
            'po_count_data' => $weekly_po_count,
            'max' => 10
        );

        return $weekly_po_data;
    }

    public function getWeeklyNominalPurchaseOrder()
    {
        $weekly_po_index = array();
        $weekly_po_nominal = array();
        $purchase_orders = PurchaseOrder::select([
            // This aggregates the data and makes available a 'count' attribute
            // This throws away the timestamp portion of the date
            DB::raw('SUM(grand_total) as grand_total'),
            DB::raw('DATE(created_at) as day'),
          // Group these records according to that day
          ])->groupBy('day')
          // And restrict these results to only those created in the last week
          ->where('created_at', '>=', Carbon::now()->subWeeks(1))
          ->whereNull('deleted_at')
          ->get();
        $purchase_orders = json_decode($purchase_orders);

        foreach($purchase_orders as $entry) {
            array_push($weekly_po_index, date('D', strtotime($entry->day)));
            array_push($weekly_po_nominal, $entry->grand_total/10000000);
        }

        // $max_no = max($weekly_po_nominal);
        // $max = round(($max_no * 10 / 2) / 10) * 10;

        $weekly_po_data = array(
            'day' => $weekly_po_index,
            'po_count_data' => $weekly_po_nominal,
            // 'max' => $max
        );

        return $weekly_po_data;
    }

    public function weightPurchaseOrder()
    {
        $weight_po_index = array();
        $weight_po_count = array();
        $purchase_orders = PurchaseOrder::select([
            // This aggregates the data and makes available a 'count' attribute
            // This throws away the timestamp portion of the date
            DB::raw('SUM(grand_total_tonase) as grand_total_tonase'),
            DB::raw('DATE(created_at) as day'),
          // Group these records according to that day
          ])->groupBy('day')
          // And restrict these results to only those created in the last week
          ->where('created_at', '>=', Carbon::now()->subWeeks(1))
          ->whereNull('deleted_at')
          ->get();
        $purchase_orders = json_decode($purchase_orders);

        foreach($purchase_orders as $entry) {
            array_push($weight_po_index, date('D', strtotime($entry->day)));
            array_push($weight_po_count, $entry->grand_total_tonase);
        }

        // $max_no = max($weight_po_count);
        // $max = round(($max_no * 10 / 2) / 10) * 10;

        $weekly_po_data = array(
            'day' => $weight_po_index,
            'po_count_data' => $weight_po_count,
            // 'max' => $max
        );

        return $weekly_po_data;
    }

    public function getBestProduct()
    {
        $best_product_count_array = array();
        $best_product_name = array();
        $purchased_items = DetailPurchaseOrder::with('item')->select([
            DB::raw('count(id) as `count`'), 
            DB::raw('item_id'),
          ])->groupBy('item_id')
          ->orderBy('count', 'DESC')
          ->limit(5)->get();
        
        foreach ($purchased_items as $item) {
            array_push($best_product_count_array, $item->count);
            array_push($best_product_name, $item->item->name);
        }

        $best_product_data = array(
            'labels' => $best_product_name,
            'count'  => $best_product_count_array
        );

        return $best_product_data;
    }

    public function getWorstProduct()
    {
        $worst_product_count_array = array();
        $worst_product_name = array();
        $purchased_items = DetailPurchaseOrder::with('item')->select([
            DB::raw('count(id) as `count`'), 
            DB::raw('item_id'),
          ])->groupBy('item_id')
          ->orderBy('count', 'ASC')
          ->limit(5)->get();
        
        foreach ($purchased_items as $item) {
            array_push($worst_product_count_array, $item->count);
            array_push($worst_product_name, $item->item->name);
        }

        $worst_product_data = array(
            'labels' => $worst_product_name,
            'count'  => $worst_product_count_array
        );

        return $worst_product_data;
    }

    public function getAllMonthsPurchaseOrder()
    {
        $month_array = array();
        $purchase_orders = PurchaseOrder::orderBy('created_at', 'ASC')->pluck('created_at');
        $purchase_orders = json_decode($purchase_orders);

        if (!empty($purchase_orders)) {
            foreach ($purchase_orders as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
            }
        }

        return $month_array;
    }

    public function getMonthlyPurchaseOrderCount($month)
    {
        $monthly_po_count = PurchaseOrder::whereMonth('created_at', $month)->get()->count();

        return $monthly_po_count;
    }

    public function getMonthlyPurchaseOrderData()
    {
        $monthly_po_count_array = array();
        $month_array = $this->getAllMonthsPurchaseOrder();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_po_count = $this->getMonthlyPurchaseOrderCount($month_no);
                array_push($monthly_po_count_array, $monthly_po_count);
                array_push($month_name_array, $month_name);
            }
        }

        $monthly_po_data_array = array(
            'months' => $month_name_array,
            'po_count_data' => $monthly_po_count_array
        );

        return $monthly_po_data_array;
    }
}
