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
    public $sfname;
    public $slname;
    public $sphone;
    public $semail;
    public $sadd;

    
    public function __construct($id, $name, $quantity, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->image = $image;
        $this->shipemail=$semail;
        $this->shipphone=$sphone;
        $this->shipaddress=$sadd;
        $this->shipname=$sfname;
        $this->shipname=$slname;
    }
}