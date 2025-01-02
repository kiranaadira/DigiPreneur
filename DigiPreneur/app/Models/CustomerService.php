<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    use HasFactory;

    // Tambahkan properti jika perlu, misalnya $fillable
    protected $fillable = ['name', 'email', 'phone', 'message'];
}
