<?php

namespace App\Http\Controllers;

use App\Models\Shoppy;
use Illuminate\Http\Request;

class ShoppyController extends Controller
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
        $shoppies = Shoppy::get();
        $data = ['title' => 'Compras', 'shoppies' => $shoppies];
        return view('shopping/index', $data);
    }
}
