<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes, // Borrado suave
        HasFactory; // Generación de datos de prueba

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'document_type',
        'document_number',
        'date_of_issue',
        'first_name',
        'first_last_name',
        'second_last_name',
        'date_of_birth',
        'gender',
        'address',
        'telephone1',
        'email',
        'avatar',
    ];

    protected $dates = ['deleted_at']; // Atributos que deben ser tratados como objetos Carbon

    protected $hidden = [ // Atributos ocultos para no representarlos en las salidas con formato JSON
        'created_at',
        'updated_at'
    ];

    // MUTADORES Y ACCESORES
    public function getAgeAttribute(){ // Obtener la edad actual a partir de la fecha nacimiento (ACCESOR)
        if($this->date_of_birth!=''):
            $dias = explode("-", $this->date_of_birth, 3);
            $dias = mktime(0,0,0,$dias[1],$dias[2],$dias[0]);
            $edad = (int)((time()-$dias)/31556926 );
            return $edad;
        else:
            return "--";
        endif;
    }
    public function getFullNameAttribute(){ // Obtener el nombre completo de la persona first_name + first_last_name + second_last_name (ACCESOR)
        return $this->first_name.' '.$this->first_last_name.' '.$this->second_last_name;
    }
    public function getIdentificationTypeNumberAttribute(){ // Obtener de manera abreviada del tipo y número de identificación
        // Arreglo de mapeo entre tipos de documentos y sus abreviaturas
        $document_type_abbreviations = [
            'Cédula de ciudadanía' => 'CC',
            'Tarjeta de identidad' => 'TI',
            'Cédula de extranjería' => 'CE',
            'Pasaporte' => 'PP',
            'Documento nacional de identidad' => 'DNI',
            'Registro civil' => 'RC'
        ];
        return $document_type_abbreviations[$this->attributes['document_type']].'-'.$this->attributes['document_number'];
    }
    public function setAddressAttribute($value){ // Convierte el primer carácter en mayúscula del dato address (MUTADOR)
        $this->attributes['address'] = ucfirst($value);
    }
    public function setFirstLastNameAttribute($value){ // Convertir a mayúsculas en valor del dato first_last_name (MUTADOR)
        return $this->attributes['first_last_name'] = mb_strtoupper($value);
    }
    public function setFirstNameAttribute($value){ // Convertir a mayúsculas en valor del dato first_name (MUTADOR)
        return $this->attributes['first_name'] = mb_strtoupper($value);
    }
    public function setSecondLastNameAttribute($value){ // Convertir a mayúsculas en valor del dato second_last_name (MUTADOR)
        return $this->attributes['second_last_name'] = mb_strtoupper($value);
    }
}
