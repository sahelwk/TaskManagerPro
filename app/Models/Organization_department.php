<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Organization_department extends Model
{
    use HasFactory , softDeletes;
    protected $table = 'department_organization';
    protected $fillable = ['organization_id','department_id'];
}
