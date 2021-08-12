<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Importamos modelos
use App\Models\{
    EmployeesModel,
    EmployeesSkillsModel
};


class EmployeeController extends Controller
{
    public function insert( Request $request ){
        return $request->all();
    }

}
