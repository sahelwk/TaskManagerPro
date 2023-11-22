<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Department_project extends Model
{
    use HasFactory , softDeletes;
    protected $table ='department_project';
    protected $fillable = ['department_id','project_id'];
}
