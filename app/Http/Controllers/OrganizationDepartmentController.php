<?php

namespace App\Http\Controllers;

use App\Models\Organization_department;
use Illuminate\Http\Request;

class OrganizationDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){


        Organization_department::create($request->all());
        return redirect()->route('organizations.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Organization_department $organization_department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization_department $organization_department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization_department $organization_department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization_department $organization_department)
    {
        //
    }
}
