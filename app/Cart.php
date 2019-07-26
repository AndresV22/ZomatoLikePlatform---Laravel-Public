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

   public function myDeleteAll(){
      
      $this->items = null;
      $this->totalQuantity = 0;
      $this->totalPrice = 0;
   }

   public function deleteItem($id){

      

      foreach($this->items as $this->product){
         if($this->product['item']['id'] == $id){
            $this->product['item']->delete();
            
            $this->totalPrice = $this->totalPrice - ($this->product['price'] * $this->product['quantity']);
            
            $this->totalQuantity = $this->totalQuantity - 1;
            break;
         }            
      }
      
      
   }

}

