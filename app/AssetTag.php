<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetTag extends Model
{
    //
    protected $primaryKey = 'asset_tag_id';
    protected $fillable = ['asset_id', 'tag_id'];
    
}
