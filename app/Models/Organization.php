<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

    class Organization extends Model
{
    use HasFactory , softDeletes;

    protected $fillable = ['name', 'description'];

    // public function departments()
    // {
    //     return $this->hasMany(Department::class);
    // }
    public function users(){

        return $this->hasMany(User::class);
    }
    public function departments(){

        return $this->belongsToMany(Department::class, 'department_organization');
    }
}

