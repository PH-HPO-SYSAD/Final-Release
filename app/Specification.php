<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    //
    protected $primaryKey = 'specification_id';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function computers(){
    	return $this->belongsToMany(Computer::class, 'computer_specifications');
    }
    
}
