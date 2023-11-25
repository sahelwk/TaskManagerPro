
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
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder">Description</th> 
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder">Created</th>
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder">Updated</th> 
           </tr>
   </thead>
    <tbody class="bg-white divide-y divide-green-300">
           <tr>
            <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg ml-2">{{ $department->name }}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg ml-2">{{ $department->description }}</span>
            </td>
             <td class="px-6 py-4 whitespace-nowrap"> 
                 {{$department->created_at->diffForHumans()}} 
                </td>
                <td class="px-6 py-4 whitespace-nowrap"> 
                  {{$department->updated_at->diffForHumans()}}
                </td>

        </tr>
     </tbody>
  </table>
</div>
  <a href="{{route('departments.index') }}" class = "bg-green-300 hover:bg-green-500 text-white font-bold mt-5 py-2 px-4 rounded block w-40 mx-auto text-center mb-4">Back</a>
</div> 
       <div class= "bg-white rounded-lg shadow-lg py-2 px-2 mb-8 ">
      <table class="min-win-w-full divide-y divide-gray-200">
     <thead>
           <tr>
  <th class="px-6 py-6 bg-green-50 text-left text-xs font-midium text-gray-500 uppercase tacking-winder">Organizations</th> 
           </tr>
   </thead>
    <tbody class="bg-white divide-y divide-green-300">
           <tr>
           
             <td class="px-6 py-4 whitespace-nowrap"> 
             <span class="flex flex-wrap">
                 @foreach($organization as $org)
               <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg mr-2 mb-2">{{ $org->name }}</span>
                 @endforeach
                </span>
                </td>
        </tr>
     </tbody>
  </table> 
      </div>

 </div>
 
   
</x-app-layout>



