<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmCode extends Model
{
    use HasFactory;
    protected $table = 'confirm_codes';
    //mô hình mass assignment
    protected $fillable = ['cust_email','code'];
}
