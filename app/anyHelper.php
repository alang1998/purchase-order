<?php

Class anyHelper
{

  public static function getMaxReceiptOrder($data) 
  {  
    $maxReceipt = 0;
    $quantityReceipt = 0;

    if (count($data->receipt_history) > 0) {
      foreach ($data->receipt_history as $receipt) {
        $quantityReceipt += $receipt->quantity;  
      }
    }

    $maxReceipt = $data->quantity - $quantityReceipt;

    return $maxReceipt;
  }

  public static function getQuantityReceipt($data)
  {
    $quantityReceipt = 0;

    if (count($data->receipt_history) > 0) {
      foreach ($data->receipt_history as $receipt) {
        $quantityReceipt += $receipt->quantity;  
      }
    }

    return $quantityReceipt;
  }

  public static function receiptOrder($data)
  {
    $orderQuantity = 0;
    $receiptQuantity = 0;

    foreach ($data as $detail_order) {

      if ($detail_order->receipt_history) {

        foreach ($detail_order->receipt_history as $receipt) {
          
          $receiptQuantity += $receipt->quantity;

        }

      }

      $orderQuantity += $detail_order->quantity;

    }

    if ($orderQuantity == $receiptQuantity) {

      return true;

    } else {

      return false;
      
    }
    
  }

}