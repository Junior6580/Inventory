<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $data = ['title' => 'Categorias', 'categories' => $categories];
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        $data = ['title' => 'Nueva Categoría'];
        return view('categories.new', $data);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $data = ['title' => 'Editar Categoría', 'category' => $category, 'id' => $id];
        return view('categories.edit', $data);
    }
    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories')->with('success', 'Categoría eliminada exitosamente.');
    }

}
