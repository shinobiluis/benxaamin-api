<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importamos modelos
use App\Models\{
    EmployeesModel,
    EmployeesSkillsModel
};

// importamos la validacion del empleado
use App\Http\Requests\EmployeesRequest;

// importamos un Trait para las respuesta del api
// Este trait nos ayuda a usar siempre un tipo de respuesta
use App\Traits\ApiResponseTrait;

class EmployeeController extends Controller
{
    use ApiResponseTrait;
    
    // metodo para insertar empleados
    public function insert( 
        EmployeesModel $employee, 
        EmployeesSkillsModel $skills, 
        EmployeesRequest $request 
    ){
        // validamos el $request
        $validated = $request->validated();
        // Insertamos desde el modelo EmployeesModel
        $insertEmployee = $employee->insertEnployee( $request );
        // insetamos las skills desde el modelo de EmployeesSkillsModel
        $insertSkills = $skills->insertSkills( $insertEmployee->id, $request->skill );
        // retornamos la el registro completo del empleado registrado
        return $this->successRessponse( $employee->consultEmployee( $insertEmployee->id ), 200 );
    }

    // metodo para consultar todos los empleados
    public function consultEmployees( EmployeesModel $employees ){
        // consultamos a todos los empleados desde el modelo
        $employees = $employees->consultEmployees();
        // retornamos la respuesta
        return $this->showAll( $employees );
    }

    // metodo para consultar a un empleado por el id
    public function consultEmployee( EmployeesModel $employee, $employee_id ){
        // consultamos a un empleado especifico por su id
        $employee = $employee->consultEmployee( $employee_id );
        // retornamos la respeusta
        return $this->showOne( $employee );
    }

}
