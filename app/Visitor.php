<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model{
    public $timestamps    = false;
    protected $primaryKey = 'id';
    protected $fillable   = ['ip','data_access','page'];
}
