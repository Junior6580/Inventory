<?php

namespace App\Models;

use App\Models\Category;
use App\Models\MeasurementUnit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, // Borrado suave
        HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'name',
        'measurement_unit_id',
        'description',
        'category_id',
        'price',
        'provider_id',
        'image',

    ];

    protected $dates = ['deleted_at']; // Atributos que deben ser tratados como objetos Carbon

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

    // RELACIONES
    public function measurement_units()
    { // Accede a la información de la persona
        return $this->belongsTo(MeasurementUnit::class);
    }
    public function categories()
    { // Accede a la información de la persona
        return $this->belongsTo(Category::class);
    }

    public function providers()
    { // Accede a la información del proveedor
        return $this->belongsToMany(Provider::class);
    }

    public function person(){ // Accede a la información de la persona
        return $this->belongsTo(Person::class);
    }
}
