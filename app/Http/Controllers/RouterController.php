<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use File;

use App\Model\Router;
use Illuminate\Http\Request;

class RouterController extends Controller
{   
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show', 'diskSpace', 'storagePath']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Router::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Router::create($request->all());
        return response('Router Stored', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Router  $router
     * @return \Illuminate\Http\Response
     */
    public function show(Router $router)
    {
        return $router;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Router  $router
     * @return \Illuminate\Http\Response
     */
    public function edit(Router $router)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Router  $router
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Router $router)
    {
        $router->update($request->all());
        return response('Router Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Router  $router
     * @return \Illuminate\Http\Response
     */
    public function destroy(Router $router)
    {
        //
    }

    public function softDelete(Router $router)
    {
        $router->delete();
        return response('Soft Deleted', 201);
    }

    public function diskSpace(Router $router)
    {
        $dfs = disk_free_space("C:");
        $dts = disk_total_space("C:");
        $result = array('disk_free_space' => $dfs, 'disk_total_space' => $dts ); 
        return json_encode($result);
    }
    public function storagePath(Router $router)
    {
        // $path = storage_path('test');
        // $files = File::getRelativePathname($path);
        $files = File::allFiles(public_path()); 
        dd($files);
    }
}
