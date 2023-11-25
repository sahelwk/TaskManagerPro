<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Department extends Model
{
    use HasFactory , softDeletes;
    protected $fillable = ['org_id', 'name', 'description'];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class,'department_organization');
    }

    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    // }
    public function users(){

        return $this->hasMany(User::class);
    }
    public function projects(){

        return $this->belongsToMany(Project::class,'department_projects');
    }
}
