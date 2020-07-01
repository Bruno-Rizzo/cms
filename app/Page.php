<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model{
    
    public $timestamps    = false;
    protected $primaryKey = 'id';
    protected $fillable   = ['title','slug','body'];

}
