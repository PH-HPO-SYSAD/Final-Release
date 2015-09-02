<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
	public $primaryKey = 'deployment_id';
	public $table = 'deployment';
	public $fillable = ['asset_id', 'assigned_asset_id', 'employee_name'];

	public function asset()
	{
		return $this->belongsTo(Asset::class);
	}
}
