<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetUser extends Model
{
    //
    protected $primaryKey = 'asset_user_id';
    protected $fillable = ['asset_id', 'name'];
    
    public function asset(){
    	return $this->belongsTo(Asset::class);
    }

}
