<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CSV extends Model
{

  protected $table = 'csv';

  protected $fillable = [
    'name',
    'email',
    'systolic_a',
    'systolic_b',
    'diastolic_a',
    'diastolic_b',
    'alert'
  ];
}
