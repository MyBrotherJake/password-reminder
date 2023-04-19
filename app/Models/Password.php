<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;
    protected $table = 'm_pass';
    protected $fillable = ['site', 'maddr', 'account', 'pass', 'bikou'];
    public $timestamps = false;
}
