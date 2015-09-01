<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $primaryKey = 'location_id';
    public $table = 'location';

    public function asset()
    {
    	return $this->belongsTo(Asset::class);
    }
}
