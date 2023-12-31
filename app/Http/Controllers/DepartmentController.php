<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Organization;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class DepartmentController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index', 'store', 'show']]);
    //     $this->middleware('permission:department-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:department-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $department = Department::with('organizations')->get();
        $departments = Department::when($search , function($query , $search){
            return $query->where('name', 'like' ,"%$search%")
                        ->orWhere('description', 'like', "%$search%");

        })->paginate(4);
        return view('departments.index', compact('departments','department'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $organizations = Organization::all();

        return view('departments.create' ,compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // $department = new Department();
        // // $department->name = $request->input('name');
        // // $department->description = $request->input('description');
        // // // Assuming you have a foreign key 'org_id' in the 'departments' table
        // // $department->org_id = $request->input('org_id');
        // $department = Department::get($request()->all());
        // $department->save();
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'description' => 'required|string',
        ]);

        // Create a new project with the validated data
        Department::create($validatedData);

        // Redirect to the index page with a success message


        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $organization = Organization::with('departments')->get();
        $department = Department::find($id);
        return view('departments.show', compact('department','organization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // DepartmentController.php

 public function edit( $id)
    {

        $department = Department::find($id);
         $organizations = Organization::get();
        return view('departments.edit', compact('department','organizations'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->name = $request->input('name');
        $department->description = $request->input('description');
        // Assuming you have a foreign key 'org_id' in the 'departments' table
        // $department->org_id = $request->input('org_id');
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}
