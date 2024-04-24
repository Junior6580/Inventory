<?php

namespace App\Models;

use App\Models\MovementType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movement extends Model
{
    use SoftDeletes, // Borrado suave
        HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'person_id',
        'inventory_id',
        'stock',
        'registration_date',
        'movement_type_id',
        'observation',
    ];

    protected $dates = ['deleted_at']; // Atributos que deben ser tratados como objetos Carbon

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

    //RELACIONES
    public function movementstype(){ // Accede a la información de los productos
        return $this->belongsTo(MovementType::class);
    }
}
