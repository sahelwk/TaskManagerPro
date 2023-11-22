<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Department') }}
        </h2>
    </x-slot>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800 max-w-xl">


        <form action="{{ route('departments.update', $department->id) }}" method="POST" class="mt-4">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label for="name" class="text-gray-700">Name:</label>
            <input type="text" id="name" name="name" class="form-input mt-1 block w-full" value="{{ $department->name }}" required>
          </div>

          <div class="mb-4">
            <label for="description" class="text-gray-700">Description:</label>
            <textarea id="description" name="description" class="form-textarea mt-1 block w-full" required>{{ $department->description }}</textarea>
          </div>

          {{-- <div class="mb-4">
            <label for="org_id" class="text-gray-700">Organization Name:</label>
            <select name="org_id" class="form-select mt-1 block w-full">
              @foreach ($organizations as $organization)
                <option value="{{ $organization->id }}" {{ $organization->id == $department->org_id ? 'selected' : '' }}>
                  {{ $organization->name }}
                </option>
              @endforeach
            </select>
          </div> --}}

          <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">
            Update Department
          </button>
        </form>
      </div>



</x-app-layout>
