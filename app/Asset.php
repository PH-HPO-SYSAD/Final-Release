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
        return $query->where('status', 'Defective')->get();
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'location_id');
    }
    
}
