<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $table='report';

    protected $fillable = [
        'url'
    ];
}
