<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Asset;
use App\Category;
use App\Brand;
use App\Location;
use App\Deployment;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Get all the asset with its relationship (category, brand, tags, asset_users, computers)
        $assets = Asset::with('category', 'brand', 'tags', 'asset_users', 'computers')->get();
        $defectives = Asset::with('category', 'brand', 'tags', 'asset_users', 'computers')->defectives();
        return view('assets.all')->with(compact('assets', 'defectives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('dashboard.add')->with(compact('locations'));
    }

    public function getDeploy()
    {
        $assets = Asset::vacants()->get();
        return view('dashboard.deployment')->with(compact('assets'));
    }

    public function postDeploy(Request $request, $id)
    {
        $asset = Asset::find($id);
        if ($asset) {
            $asset->deployments()->save(new Deployment([
                'assigned_asset_id' => $request->assigned_asset_id,
                'employee_name' => $request->employee_name,
            ]));
        }
        dd("Good");
    }

    public function deploymentForm($id)
    {
        $asset = Asset::find($id);
        return view('dashboard.partials.deploy')->with(compact('asset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {  
        // dd($request->all());
        $asset = Asset::create([
            'tag_number'    => value($this->generate_tag_number($request->category, $request->brand)),
            'description'   => $request->description,
            'category_id'   => $request->category,
            'model'         => $request->model,
            'brand_id'      => $request->brand,
            'serial_number' => $request->serial_number,
            'control_number'=> $request->control_number,
            'color'         => $request->color,
            'asset_history' => $request->asset_history,
            'warranty'      => $request->warranty,
            'location_id'   => $request->location,
            'status'        => $request->status,
            'remarks'       => $request->remarks,
            'waranty'       => $request->warranty,
            'warranty_end'  => $request->warranty_end      
        ]);
        //if asset is successfully saved to the database
        if($asset){
            flash()->success($asset->model.' successfully added.');
            return redirect()->to('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // $category = Category::find($category_id);
        // $brand = Brand::find($brand_id);
        // return strtoupper($category->code.'-'.$brand->name);
        $asset = Asset::find($id);
        return view('assets.info')->with(compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
    * Auto-generate asset tag number
    *
    * @param int $category_id
    * @param int $brand_id
    * @return String
    */
    protected function generate_tag_number($category_id, $brand_id){
        $category = Category::find($category_id);
        $brand = Brand::find($brand_id);
        return strtoupper($category->code.'-'.$brand->name);
    }

}
