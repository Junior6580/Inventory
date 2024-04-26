<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderProduct extends Model
{
    use HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'provider_id',
        'product_id',
    ];

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

     // RELACIONES
     public function providers(){ // Accede a la información del proveedor
        return $this->belongsToMany(Provider::class);
    }
    public function products(){ // Accede a la información de los productos
        return $this->belongsToMany(Product::class);
    }
}
