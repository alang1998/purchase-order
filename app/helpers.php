<?php

if (!function_exists('user_status')) {
    function user_status($status) {
        switch ($status) {
            case '0':
                $text = '<span class="badge badge-danger">Nonactive</span>';
                break;

            case '1':
                $text = '<span class="badge badge-success">Active</span>';
                break;
            
            default:
                $text = 'Status not found!';
                break;
        }
        
        return $text;
    }
}

if (!function_exists('simpleDate')) {
    function simpleDate($date) {
        $newDate = date('d F Y', strtotime($date));

        return $newDate;
    }
}

if (!function_exists('order_status')) {
    function order_status($status) {
        switch ($status) {
            case '0':
                $text = '<span class="badge badge-primary">Pending</span>';
                break;

            case '1':
                $text = '<span class="badge badge-success">Accepted</span>';
                break;
                
            case '2':
                $text = '<span class="badge badge-danger">Rejected</span>';
                break;
                    
            case '3':
                $text = '<span class="badge badge-warning">unknown</span>';
                break;
            
            default:
                $text = 'Status not found!';
                break;
        }
        
        return $text;
    }
}

if (!function_exists('denominator')) {

    function denominator($value) {
        
        $value = abs($value);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";

        if ($value < 12) {
            $temp = " ". $huruf[$value];
        } else if ($value < 20) {
            $temp = denominator($value - 10). " belas";
        } else if ($value < 100) {
            $temp = denominator($value/10)." puluh". denominator($value % 10);
        } else if ($value < 200) {
            $temp = " seratus" . denominator($value - 100);
        } else if ($value < 1000) {
            $temp = denominator($value/100) . " ratus" . denominator($value % 100);
        } else if ($value < 2000) {
            $temp = " seribu" . denominator($value - 1000);
        } else if ($value < 1000000) {
            $temp = denominator($value/1000) . " ribu" . denominator($value % 1000);
        } else if ($value < 1000000000) {
            $temp = denominator($value/1000000) . " juta" . denominator($value % 1000000);
        } else if ($value < 1000000000000) {
            $temp = denominator($value/1000000000) . " milyar" . denominator(fmod($value,1000000000));
        } else if ($value < 1000000000000000) {
            $temp = denominator($value/1000000000000) . " trilyun" . denominator(fmod($value,1000000000000));
        }     
        return $temp;
    }
    
}

if (!function_exists('beCalculated')) {
    
    function beCalculated($value) {
        if($value < 0) {

            $hasil = "minus ". trim(denominator($value));

        } else {

            $hasil = trim(denominator($value));

        }     		
        return $hasil;
    }
    
}