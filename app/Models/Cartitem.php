<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Class CartItem{

    
    public $id;
    public $name;
    public $quantity;
    public $price;
    public $image;

    
    public function __construct($id, $name, $quantity, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->image = $image;
    }
}