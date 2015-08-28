<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComputerUser extends Model
{
    //
    protected $priamryKey = 'computer_user_id';
    protected $fillable = ['computer_id', 'name', 'department'];
    
}
