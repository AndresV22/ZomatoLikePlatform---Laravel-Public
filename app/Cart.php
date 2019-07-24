<?php
namespace App;


class Cart{
   public $items = null;
   public $totalQuantity = 0;
   public $totalPrice = 0;

    
   public function __construct($previousCart){
      if($previousCart){
         $this->items = $previousCart->items;
         $this->totalQuantity = $previousCart->totalQuantity;
         $this->totalPrice = $previousCart->totalPrice;
      }
   }

   public function add($item, $id){
      $newItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];

      if($this->items){
         if(array_key_exists($id, $this->items)){
            $newItem = $this->items[$id];
         }
      }
      $newItem['quantity']++;
      $newItem['price'] = $item->price * $newItem['quantity'];
      $this->items[$id] = $newItem;
      $this->totalQuantity++;
      $this->totalPrice += $item->price;   
   }

}

