<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePayment extends Model
{
    use HasFactory;
    protected $table = 'metode_payments';
    protected $guarded = [];
}
