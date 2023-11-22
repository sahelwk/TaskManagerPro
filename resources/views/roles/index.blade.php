<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('create role') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex justify-center items-center flex-col">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Roles</h1>
            <form action="{{ route('roles.index') }}" method="GET" class="flex justify-center mb-4">
                <div class="flex">
                    <input type="text" name="search" class="border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:border-blue-500" placeholder="Search">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md ml-2 hover:bg-blue-600 transition-colors duration-200">Search</button>
                </div>
            </form>
        </div>

        @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-3 hover:bg-blue-600 transition-colors duration-200">Create Role</a>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-200 border-b">ID</th>
                        <th class="px-4 py-2 bg-gray-200 border-b">Name</th>
                        <th class="px-4 py-2 bg-gray-200 border-b">Permission</th>
                        <th class="px-4 py-2 bg-gray-200 border-b">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $role->name }}</td>
                        <td class="px-4 py-2">
                            @foreach ($role->permissions as $permission)
                            <span class="inline-block bg-green-500 text-white px-2 py-1 rounded-md mr-2">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('roles.edit', $role) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition-colors duration-200">Edit</a>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $roles->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
