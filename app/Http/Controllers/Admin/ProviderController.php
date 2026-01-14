<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          return view('admin.providers.index');
    }

   
    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
        var_dump($provider->name);
        die();
        return view('admin.providers.show',compact('provider'));
    }

}
