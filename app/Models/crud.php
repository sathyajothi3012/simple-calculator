<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    use HasFactory;
    protected $table='reg_user';
    public $fillable=['name','phno','gender','address','photo','password'];
}
