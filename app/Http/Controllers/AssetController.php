<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Asset;
use App\Category;
use App\Brand;

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
        $defectives = Asset::where('status', 'Defective')->get();
        return view('assets.all')
            ->with(compact('assets', 'defectives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.add');
    }

    public function getDeploy()
    {
        $assets = Asset::where('location', 'vacant')->get();
        return view('dashboard.deployment')
            ->with(compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $asset = Asset::create([
            'tag_number'    => value($this->generate_tag_number($request->input('category'), $request->input('brand'))),
            'description'   => $request->input('description'),
            'category_id'   => $request->input('category'),
            'model'         => $request->input('model'),
            'brand_id'      => $request->input('brand'),
            'serial_number' => $request->input('serial_number'),
            'control_number'=> $request->input('control_number'),
            'color'         => $request->input('color'),
            'asset_history' => $request->input('asset_history'),
            'warranty'      => $request->input('warranty'),
            'location'      => $request->input('location'),
            'status'        => $request->input('status'),
            'remarks'       => $request->input('remarks'),
            'warranty_end'  => $request->input('warranty_end')      
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
