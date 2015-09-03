<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
	public $primaryKey = 'deployment_id';
	public $table = 'deployment';
	public $fillable = ['asset_id', 'parent_id', 'employee_id', 'location_id'];

	public function asset()
	{
		return $this->belongsTo(Asset::class);
	}
}
