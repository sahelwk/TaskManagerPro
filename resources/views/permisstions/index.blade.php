<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __(' Permission index') }}
            </h2>

        </div>
    </x-slot>
    <div class="container mx-auto">
        <form action="{{ route('permissions.index') }}" method="GET" class="flex justify-center mb-4">
            <div class="flex items-center">
                <input type="text" name="search" class="border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:border-blue-500" placeholder="Search">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition-colors duration-200">Search</button>
            </div>
        </form>

        

        @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('permissions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200 m-5">Create Permission</a>

        <div class="overflow-x-auto">
    
            <table class="min-w-full table-auto border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-200 border-b">ID</th>
                        <th class="px-4 py-2 bg-gray-200 border-b">Name</th>
                        <th class="px-4 py-2 bg-gray-200 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $permission->name }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('permissions.edit', $permission) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition-colors duration-200">Edit</a>

                            <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this permission?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination text-center mt-4">
            {{ $permissions->links('pagination::tailwind') }}
        </div>
    </div>

</x-app-layout>
