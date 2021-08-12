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
    // relaciones con skills
    public function skills(){
        return $this->hasMany(EmployeesSkillsModel::class, 'employee_id', 'id');
    }

    // Metodo para insertar empleados
    public function insertEnployee( $request ){
        return $this->create( $request->except('skill') );
    }
    
    // metodo para todos los empleados
    public function consultEmployees(){
        return $this->with([
            'skills'
        ])->get();
    }

    // metodo para consultar un empleado por medio del id
    public function consultEmployee( $employee_id ){
        return $this->with([
            'skills'
        ])->where([
            [ 'id', $employee_id ]
        ])->first();
    }

}
