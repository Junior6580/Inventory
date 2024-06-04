<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryAdd extends Component
{
    public $name;
    public function saveCategory()
    {
        $this->validate([
            'name' => 'required'
        ]);

        try {

            $new_category = new Category;
            $new_category->name = $this->name;
            $new_category->save();

            return $this->redirect('/categories', navigate: true);
        } catch (\Exception $e) {
            dd($e);
        }

    }
    public function render()
    {
        return view('livewire.categories.category-add');
    }
}
