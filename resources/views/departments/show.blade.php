
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Department Show') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Department Details</h1>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
          <div class="p-6">
            <h5 class="text-lg font-semibold mb-4">
              <strong>Department Name:</strong>
              <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg ml-2">{{ $department->name }}</span>
            </h5>
            <p class="mb-4">
              <strong>Description:</strong>
              <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg ml-2">{{ $department->description }}</span>
            </p>
            <p class="mb-4">
              <strong>Organizations:</strong>
              <span class="flex flex-wrap">
                @foreach($organizations as $org)
                  <span class="inline-block bg-blue-500 text-white text-sm font-light py-1 px-2 rounded-lg mr-2 mb-2">{{ $org->name }}</span>
                @endforeach
              </span>
            </p>
          </div>
        </div>

        <a href="{{ route('departments.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded block w-40 mx-auto text-center mb-4">Back to Departments</a>
      </div>

</x-app-layout>



