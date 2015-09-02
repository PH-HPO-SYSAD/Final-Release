<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function scopeDefectives($query)
    {
        return $query->whereStatus('Defective')->get();
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function scopeVacants($query)
    {   
        return $query->where('location_id', null);
    }

    public function deployments()
    {
        return $this->hasMany(Deployment::class, 'assigned_asset_id');
    }
    
    public function scopeCubicles($query)
    {   
        return $query->where('category_id', 18);
    }

    public function scopeDeployed($query)
    {
        return $query->has('location')->with('location', 'deployments');
    }
}
