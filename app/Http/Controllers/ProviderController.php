<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $providers = Provider::get();
        $data = ['title' => 'Proveedores', 'providers' => $providers];
        return view('providers/index', $data);
    }
}
