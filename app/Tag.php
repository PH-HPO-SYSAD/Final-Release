<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $primaryKey = 'tag_id';
    protected $fillable = ['name'];
    
    public function assets(){
    	return $this->belongsToMany(Asset::class, 'asset_tags');
    }
    
}
