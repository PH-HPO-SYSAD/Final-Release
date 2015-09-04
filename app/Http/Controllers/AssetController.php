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
use Carbon\Carbon;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $assets = Asset::with('category', 'brand')->get();
        $defectives = Asset::defectives()->with('category', 'brand')->get();
        //Get all the asset with its relationship (category, brand, tags, asset_users, computers)
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
        foreach (Asset::all() as $asset) {
            if ($asset->deployments->isEmpty()) {
                $assets->push($asset);
            }    
        }
        // dd($assets);
        return view('dashboard.deployment')->with(compact('assets'));
    }

    public function postDeploy(Request $request, $id)
    {
        // dd($request->all());
        $asset = Asset::find($id);
        if ($asset) {
            flash()->success($asset->tag_number." successfully deployed!");
            $asset->deployments()->save(new Deployment([
                'parent_id' => $request->parent_id == 'null' ? null : $request->parent_id,
                'employee_id' => $request->employee_id,
                'location_id' => $request->location_id
            ]));
        } else {
            flash()->error("Asset not found!");
        }
        return redirect()->back();
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
