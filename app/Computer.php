<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    //
    protected $primaryKey = 'computer_id';
    protected $fillable = ['computer_number', 'location'];
    
    public function assets(){
    	return $this->belongsToMany(Asset::class, 'computer_assets');
    }

    public function specifications(){
    	return $this->belongsToMany(Specification::class, 'computer_specifications');
    }

    public function computer_users(){
    	return $this->hasMany(ComputerUser::class);
    }
    
}
