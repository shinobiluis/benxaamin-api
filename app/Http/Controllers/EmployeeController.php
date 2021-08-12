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
        // retornamos la respuesta
        return $this->successRessponse( $request->all(), 200 );
    }

    // metodo para consultar todos los empleados
    public function consultEmployees( EmployeesModel $employees ){
        $employees = $employees->consultEmployees();
        return $this->showAll( $employees );
    }

}
