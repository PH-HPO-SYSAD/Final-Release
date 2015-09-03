<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Asset extends Model
{
    //
    protected $primaryKey = 'asset_id';
    protected $fillable = [
    	'tag_number',
    	'description',
    	'category_id',
    	'model',
    	'brand_id',
    	'serial_number',
    	'control_number',
    	'color',
    	'location',
        'asset_history',
        'warranty',
        'warranty_end',
    	'status',
    	'remarks',
    	'warranty_end',
    ];

    // Scope - scope query
    // return - collections

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'asset_tags');
    }

    public function asset_users()
    {
        return $this->hasMany(AssetUser::class);
    }

    public function computers()
    {
        return $this->belongsToMany(Computer::class, 'computer_assets');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function deployed()
    {
        return $this->hasMany(Deployment::class, 'asset_id');
    }
    
    public function scopeCubicles($query)
    {   
        return $query->where('category_id', 18);
    }

    public function scopeVacantAssets($query)
    {
        return $query->with('location', 'deployments');
    }

    // New methods

    public function scopeWorking($query)
    {
        return $query->whereStatus('working');
    }

    public function scopeDefectives($query)
    {
        return $query->whereStatus('defective');
    }

    public function parent()
    {
        return $this->hasMany(Deployment::class, 'parent_id');
    }

    public function deployments()
    {
        return $this->hasMany(Deployment::class, 'asset_id');
    }

    public function scopeVacants($query)
    {
        return $query->whereHas('deployments', function($deployment){
            $deployment
                ->whereNotNull('date_to')
                ->where('date_from', '<', Carbon::today())
                ->where('date_to', '<', Carbon::today());
        });
    }

    public function scopeDeployedAsset($query)
    {
        return $query->whereHas('deployments', function($deployment){
            $deployment
                ->where('date_from', '<=', Carbon::today())
                ->where('date_to', '>=', Carbon::today())
                ->orWhere('date_to', null);
        })->with('deployments');
    }

}
