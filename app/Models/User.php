<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use SoftDeletes, // Borrado suave
        HasFactory, // Generación de datos de prueba
        Notifiable;

    protected $fillable = [ // Atributos modificables (asignación masiva)
        'nickname',
        'person_id',
        'email',
        'password'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     // RELACIONES
     public function person(){ // Accede a la información de la persona asociada a este usuario
        return $this->belongsTo(Person::class);
    }


     // CONFIGURACIONES PREESTABLECIDAS PARA MÉTODOS ELOQUENT
    /**
     * The "booting" method of the model.
     *
     * @return void
    */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            if (empty($user->password)) { // Verificar si se recibe una contraseña por defecto para así crear una por defecto
                $first_name = Str::ascii($user->person->first_name); // Eliminar caracteres especiales del nombre
                $first_last_name = Str::ascii($user->person->first_last_name); // Eliminar caracteres especiales del primer apellido
                $user->password = Hash::make( // Encriptar contraseña generada
                    ucfirst( // Convertir el primer caracter en mayúscula
                        strtolower( // Convertir todo en minúsculas
                            substr($first_name, 0, 2) // Extraer los dos primeros caracteres del nombre
                            .substr($first_last_name, 0, 2) // Extraer los dos primeros caracteres del primer apellido
                            .substr($user->person->document_number, -4) // Extraer los cuatro últimos caracteres del número de documento
                        )
                    )
                );
            }
        });
    }
}
