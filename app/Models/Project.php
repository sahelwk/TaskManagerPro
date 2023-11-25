<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Project extends Model
{
    use HasFactory , softDeletes;

   protected $fillable=['name','description'];

    // public function department()
    // {
    //     return $this->belongsTo(Department::class, 'dep_id');

    public function tasks(){

        return $this->belongsToMany(Task::class,'task_projects');
    }
    public function users(){

        return $this->hasMany(User::class);
    }

    public function departments(){
        return $this->belongsToMany(Department::class , 'department_projects');

    }
}
