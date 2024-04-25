<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes, // Borrado suave
        HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'person_id',
        'voucher_code',
        'date',
        'person_id',
    ];

    protected $dates = ['deleted_at']; // Atributos que deben ser tratados como objetos Carbon

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

    // RELACIONES
    public function people(){ // Accede a la información de la persona
        return $this->belongsToMany(Person::class);
    }
    public function employees(){ // Accede a la información del empleado
        return $this->belongsTo(Employee::class);
    }
}
