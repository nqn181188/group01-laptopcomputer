<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    //mô hình mass assignment
    protected $fillable = ['firstname','lastname','email','phone','comment','read','note'];
}
