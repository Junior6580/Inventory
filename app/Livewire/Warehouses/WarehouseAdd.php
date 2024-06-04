<?php

namespace App\Livewire\Warehouses;

use App\Models\Warehouse;
use Livewire\Component;

class WarehouseAdd extends Component
{
    public $name;
    public $description;
    public function saveWarehouse()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        try {

            $new_warehouse = new Warehouse;
            $new_warehouse->name = $this->name;
            $new_warehouse->description = $this->description;
            $new_warehouse->save();

            return $this->redirect('/warehouses', navigate: true);
        } catch (\Exception $e) {
            dd($e);
        }

    }
    public function render()
    {
        return view('livewire.warehouses.warehouse-add');
    }
}
