<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleItem extends Model
{
    use SoftDeletes, // Borrado suave
        HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'sale_id',
        'product_id',
        'quantity',
        'unit_price',
    ];

    protected $dates = ['deleted_at']; // Atributos que deben ser tratados como objetos Carbon

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

     // RELACIONES
     public function sale(){ // Accede a la información de la compra
        return $this->belongsTo(Sale::class);
    }
    public function products(){ // Accede a la información del productos
        return $this->belongsToMany(Product::class);
    }
}
