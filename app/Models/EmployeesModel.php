<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesModel extends Model
{
    use HasFactory;
    // especificamos el nombre de la tabla
    protected $table = 'employees';
    // campos fillable
    protected $fillable = [
        'nombre',
        'email',
        'puesto',
        'fecha_nacimiento',
        'domicilio'
    ];
    // Metodo para insertar empleados
    public function insertEnployee( $request ){
        return $this->create( $request->except('skill') );
    }

}
