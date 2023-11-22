
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>
<div class="container mx-auto pb-5">
    

    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
      <h5 class="text-xl font-bold"><strong>Project ID:</strong>
        <span class="inline-block bg-blue-500 text-white text-sm font-semibold py-1 px-2 rounded ml-2">{{ $project->id }}</span>
      </h5>
      <p class="text-xl font-bold"><strong>Department Name:</strong>
        <span class="inline-block bg-blue-500 text-white text-sm font-semibold py-1 px-2 rounded ml-2">{{ $project->department->name }}</span>
      </p>
      <p class="text-xl font-bold"><strong>Project Name:</strong>
        <span class="inline-block bg-blue-500 text-white text-sm font-semibold py-1 px-2 rounded ml-2">{{ $project->name }}</span>
      </p>
    </div>

    <a href="{{ route('projects.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Back to Projects</a>
  </div>
</x-app-layout>
