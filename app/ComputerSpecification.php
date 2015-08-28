<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComputerSpecification extends Model
{
    //
    protected $primaryKey = 'computer_specification_id';
    protected $fillable = ['computer_id', 'specification_id', 'description'];
    
}
