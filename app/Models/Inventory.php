<?php

namespace App\Models;

use App\Models\Person;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes, // Borrado suave
        HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'person_id',
        'warehouse_id',
        'product_id',
        'stock',
        'expiration_date',
        'state',
    ];

    protected $dates = ['deleted_at']; // Atributos que deben ser tratados como objetos Carbon

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

    // ACESORES Y MUTADORES
    public function setDescriptionAttribute($value){ // Convierte el primer carácter en mayúscula del dato description (MUTADOR)
        $this->attributes['description'] = ucfirst($value);
    }
    // RELACIONES
    public function person(){ // Accede a la información de la persona
        return $this->belongsTo(Person::class);
    }

    public function warehouse(){ // Accede a la información de la persona
        return $this->belongsTo(Warehouse::class);
    }

    public function product(){ // Accede a la información del productos
        return $this->belongsTo(Product::class);
    }
}
