<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Department;

class OrganizationController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:orgnization-list|orgnization-create|orgnization-edit|orgnization-delete', ['only' => ['index', 'store', 'show']]);
    //     $this->middleware('permission:orgnization-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:orgnization-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:orgnization-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)


    {
        $search = $request->input('search');
       $organization = Organization::with('departments')->get();
       $organizations = Organization::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%");
    })->paginate(4);

          return view('organizations.index',compact('organizations','organization'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $validatedData = $request->validate([
           'name' => 'required|string',
            'description' =>'required|max:5000',
        ]);

        Organization::create($validatedData);
        $notification = array
        (
         'message'=>' orgianizatin created successfullry',
         'alirt-type' => 'success'
        );
        return redirect()->route('organizations.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Organization $organization)
    // {
    //  $departments = Department::all();

    //     return view('organizations.show', compact('organization','departments'));

    // }


    public function show($id)
{   
    $departments = Department::all();
   $organizations = Organization::find($id);
    return view('organizations.show', compact('organizations','departments'));
    
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

        ]);

        $organization->update($validatedData);
        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }



    public function delete(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');
    }
}
