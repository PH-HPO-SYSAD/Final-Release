<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;

class ExcelController extends Controller
{	
	// Export to Excel file - Asset
    public function ExportAsset()
    {
    	$assets = Asset::with('category', 'brand', 'tags', 'asset_users', 'computers')->get();
    	Excel::create('Asset', function($excel)
    	{
    		$excel->sheet('SheetName', function($sheet){
    			$data=[];
    			array_push($data, array('Contents'));
    			$sheet->fromArray($data);
    		});
    	})->download('xls');
    }
}
