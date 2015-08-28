<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $primaryKey = 'brand_id';
    protected $fillable = ['name'];

    public function assets(){
    	return $this->hasMany(Asset::class);
    }

    
     
}
