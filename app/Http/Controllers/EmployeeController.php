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

class EmployeeController extends Controller
{
    public function insert( EmployeesRequest $request ){
        $validated = $request->validated();
        return $request->all();
    }

}
