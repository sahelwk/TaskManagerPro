<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Task extends Model
{ 
    use HasFactory , softDeletes;
    protected $fillable = ['project_id','name','description','status','priority','deadline'];


    // public function project()
    // {
    //     return $this->belongsTo(Project::class, 'project_id');
    // }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function projects(){
        return $this->belongsToMany(Project::class);
    }


}
