<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('create role') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Role</h2>

        @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-md mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="inputText" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <div class="flex">
                        <input type="text" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:border-blue-500" name="name" id="inputText" value="{{ $role->name }}" placeholder="Enter role Name" required>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-blue-600 transition-colors duration-200">Update</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($permissions as $permission)
                <div class="flex items-center">
                    <input id="link-checkbox-{{ $permission->id }}" type="checkbox" name="permission[]" {{ in_array($permission->id, $rolepermissions) ? 'checked' : '' }} value="{{ $permission->name }}" class="form-checkbox h-5 w-5 text-blue-500">
                    <label for="link-checkbox-{{ $permission->id }}" class="ml-2 text-gray-700">{{ $permission->name }}</label>
                </div>
                @endforeach
            </div>
        </form>
    </div>

</x-app-layout>
