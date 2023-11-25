<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve organizations, projects, tasks, and departments from your data
        $organizations = Organization::all();
        $projects = Project::all();
        $tasks = Task::all();
        $departments = Department::all();

        return view('reports.index', compact('organizations', 'projects', 'tasks', 'departments'));
    }

    public function search(Request $request)
    {

        $orgName = $request->department;

        $data = Organization::ofName($orgName)->get();

        // Retrieve the filter criteria from the request
        // $organizationId = $request->input('organization');
        // $projectId = $request->input('project');
        // $taskId = $request->input('task');
        // $departmentId = $request->input('department');

        // Apply the filter criteria to your data retrieval logic
        // $data = Report::when($organizationId, function ($query) use ($organizationId) {
        //         return $query->where('organization_id', $organizationId);
        //     })
        //     ->when($projectId, function ($query) use ($projectId) {
        //         return $query->where('project_id', $projectId);
        //     })
        //     ->when($taskId, function ($query) use ($taskId) {
        //         return $query->where('task_id', $taskId);
        //     })
        //     ->when($departmentId, function ($query) use ($departmentId) {
        //         return $query->where('department_id', $departmentId);
        //     })
        //     ->get();

        // return $data;

        // Pass the filtered data and filter criteria to the view
        return view('reports.index2', compact('data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
