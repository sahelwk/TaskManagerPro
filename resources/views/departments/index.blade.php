<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Department index') }}
        </h2>
    </x-slot>


    <div class="container mx-auto">
  <form action="{{ route('departments.index') }}" method="GET" class="flex justify-center mb-4">
    <div class="flex items-center">
      <input type="text" name="search" class="border border-gray-300 rounded-l-md py-2 px-4 w-64" placeholder="Search">
      <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-r-md ml-2">
        Search
      </button>
    </div>
  </form>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif
  <!-- <a href="{{ route('departments.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mb-4">
    Create Department
  </a> -->
  <div class="overflow-x-auto">
  <table class="w-full border-collapse mt-4 border border-green-200">
    <thead>
      <tr>
        <th class="border-b-2 border-gray-300 py-2">ID</th>
        <th class="border-b-2 border-gray-300 py-2">Name</th>
        <th class="border-b-2 border-gray-300 py-2">Description</th>
        <th class=" border-b-2 border-gray-300 py-2">Organizations</th>
        <th class="border-b-2 border-gray-300 py-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($departments as $department)
        <tr>
          <td class="border-b border-gray-300 py-2">{{ $department->id }}</td>
          <td class="border-b border-gray-300 py-2">{{ $department->name }}</td>
          <td class="border-b border-gray-300 py-2">{{ $department->description }}</td>
          <td class="border-b border-gray-300 py-2">
          @foreach ($department_organization->organizations as $organization)
          <span class="badge bg-green-500 text-white text-sm">{{$organization->name }}</span>
      @endforeach
    </td>
          <td class="border-b border-gray-300 py-2">
            <a href="{{ route('departments.show', $department->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
              Show
            </a>
            <a href="{{ route('departments.edit', $department->id) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded ml-2">
              Edit
            </a>
            <form action="{{ route('departments.delete', $department->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2" onclick="return confirm('Are you sure you want to delete this department?')">
                Delete
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

</x-app-layout>
