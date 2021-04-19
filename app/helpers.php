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