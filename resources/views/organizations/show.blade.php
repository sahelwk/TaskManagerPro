 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Department Details') }}
        </h2>
    </x-slot>
 
 
 <div class="grid grid-cols-2 grid-rows-1 gap-3">
 <div class="bg-white rounded-lg shadow-lg py-2 px-2 mb-8 border-2 border-gray-300">
  <div class="overflow-x-auto">
 <table class="table-auto">
     <thead>
           <tr>
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder ">Id</th> 
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder ">Name</th> 
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder">Description</th> 
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder">Created</th>
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder">Updated</th> 
           </tr>
   </thead>
    <tbody class="bg-white divide-y divide-green-300">
           <tr>
            <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg ml-2">{{ $organizations->id }}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg ml-2">{{ $organizations->name }}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg ml-2">{{ $organizations->description }}</span>
            </td>
             <td class="px-6 py-4 whitespace-nowrap"> 
                 {{ $organizations->created_at->diffForHumans()}} 
                </td>
                <td class="px-6 py-4 whitespace-nowrap"> 
                  {{ $organizations->updated_at->diffForHumans()}}
                </td>

        </tr>
     </tbody>
  </table>
</div>
  <a href="{{route('departments.index') }}" class = "bg-green-300 hover:bg-green-500 text-white font-bold mt-5 py-2 px-4 rounded block w-40 mx-auto text-center mb-4">Back</a>
</div> 
       <div class= "bg-white rounded-lg shadow-lg py-2 px-2 mb-8 ">
       <form method="post" action="{{ route('department_organization.store') }}">
            @csrf
            <h1 class="font-semibold text-xl leading-tight mb-5" > Assign department to organization </h1>

         
            <select name="department_id" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-green-300 border berder-gray-300 rounded-md focus-outline-none focus-bg-white focus-border-gray-500">
            <option selected> select organization</option>
            @foreach ($departments as $department)
       
            <option  value="{{ $department->id }}">    
                        {{ $department->name }}
                </div>
             
           
              </select>
              @endforeach
              <input type="hidden" name="organization_id" value="{{ $organizations->id }}">

            <div class="flex justify-center">
                <button type="submit" class="btn bg-green-500 hover:bg-green-700 font-bold text-white rounded py-2 px-2 mt-5">Assign</button>
            </div>
        </form>
      </div>

 </div>
 
   
</x-app-layout>



