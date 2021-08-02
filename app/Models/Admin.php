<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    //mô hình mass assignment
    protected $fillable = ['firstname','lastname','email','address','password','role'];
}
