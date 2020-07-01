<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model{
    
    public $timestamps    = false;
    protected $primaryKey = 'id';
    protected $fillable   = ['name','content'];


}
