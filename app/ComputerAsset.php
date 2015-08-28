<?php

namespace HPOInventory;

use Illuminate\Database\Eloquent\Model;

class ComputerAsset extends Model
{
    //
    protected $primaryKey = 'computer_asset_id';
    protected $fillable = ['asset_id', 'computer_id'];
    
}
