<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
       

        <form action="{{ route('projects.store') }}" method="POST" class="max-w-md mx-auto">
          @csrf

          {{-- <div class="mb-6">
            <label for="dep_id" class="block text-gray-700 font-semibold mb-2">Departments:</label>
            <select name="dep_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
              @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
              @endforeach
            </select>
          </div> --}}

          <div class="mb-6">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Project Name:</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('name') }}" required>
          </div>
          <div class="mb-6">
            <label for="name" class="block text-gray-700 font-semibold mb-2">descrtiption:</label>
            <textarea type="text" id="description" name="description" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('name') }}" required> </textarea>
          </div>

          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full">Create Project</button>
        </form>
      </div>
</x-app-layout>
