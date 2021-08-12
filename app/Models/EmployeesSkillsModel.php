<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesSkillsModel extends Model
{
    use HasFactory;

    // especificamos el nombre de la tabla
    protected $table = 'employees_skills';
    // campos fillable
    protected $fillable = [
        'employee_id',
        'skill'
    ];
}
