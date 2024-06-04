<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $categoryId;
    public $name;

    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($this->categoryId);
        $category->name = $this->name;
        $category->save();

        return redirect()->route('categories')->with('success', 'Categoría actualizada exitosamente.');
    }
    public function render()
    {
        return view('livewire.categories.category-edit');
    }
}
