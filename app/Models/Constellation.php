<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constellation extends Model
{
    public $table = 'constellation';
    protected $guarded = [
        'id'
    ];
}
