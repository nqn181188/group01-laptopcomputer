<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    //mô hình mass assignment
    protected $fillable = ['firstname','lastname','email','address','phone','password','lock'];
}
