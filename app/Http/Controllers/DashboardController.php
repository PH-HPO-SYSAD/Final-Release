<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Asset;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	$assets = Asset::with('category', 'brand', 'tags', 'asset_users', 'computers')->get();
    	$defectives = Asset::where('status', 'Defective')->get();
    	$vacants = Asset::vacants()->get();
    	return view('dashboard')
    		->with(compact('assets', 'defectives', 'vacants'));
    }
}
