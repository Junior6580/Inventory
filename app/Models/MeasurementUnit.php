<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeasurementUnit extends Model
{
    use SoftDeletes, // Borrado suave
        HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'name',
        'abbreviation',
        'minimum_unit_measure',
        'conversion_factor',
    ];

    protected $dates = ['deleted_at']; // Atributos que deben ser tratados como objetos Carbon

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

    // MUTADORES Y ACCESORES
    public function setAbbreviatioAttribute($value)
    { // Convierte el primer carácter en mayúscula dato abbreviation (MUTADOR)
        $this->attributes['abbreviation'] = ucfirst($value);
    }
    public function setMinimumUnitMeasureAttribute($value)
    { // Convierte el primer carácter en mayúscula y el resto en minúsculas del dato minimum_unit_measure (MUTADOR)
        $this->attributes['minimum_unit_measure'] = ucfirst(strtolower($value));
    }
    public function setNameAttribute($value)
    { // Convierte el primer carácter en mayúscula y el resto en minúsculas del dato name (MUTADOR)
        $this->attributes['name'] = ucfirst(strtolower($value));
    }
}
