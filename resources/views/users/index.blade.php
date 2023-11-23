<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('User index') }}
        </h2>
    </x-slot>

      <div class="container mx-auto">
          <div class="page-header text-center">
              <form action="{{ route('users.index') }}" method="GET" class="flex justify-center mb-4">
                  <div class="flex">
                      <div class="relative">
                          <input type="text" name="search" class="form-input rounded-l-lg" placeholder="Search">
                          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg">Search</button>
                      </div>
                  </div>
              </form>
           </div>

          @if(session('success'))
              <div class="bg-green-200 text-green-800 rounded p-4 mb-4">
                  {{ session('success') }}
              </div>
          @endif

          <div class="overflow-x-auto">
              <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                      <th class="py-2 px-4 border-b bg-green-300">ID</th>
                      <th class="py-2 px-4 border-b bg-green-200">Organization</th>
                      <th class="py-2 px-4 border-b bg-green-300">Department</th>
                      <th class="py-2 px-4 border-b bg-green-200">Project</th>
                      <th class="py-2 px-4 border-b bg-green-300">Name</th>
                      <th class="py-2 px-4 border-b bg-green-200">Role</th>
                      <th class="py-2 px-4 border-b bg-green-300">Email</th>
                      <th class="py-2 px-4 border-b bg-green-200">Status</th>
                      <th class="py-2 px-4 border-b bg-green-300">Last Seen</th>
                      <th class="py-2 px-4 border-b bg-green-200">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                          <tr>
                              <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                              <td class="py-2 px-4 border-b">{{ $user->organization->name ?? '' }}</td>
                              <td class="py-2 px-4 border-b">{{ $user->department->name ?? '' }}</td>
                              <td class="py-2 px-4 border-b">{{ $user->project->name ?? '' }}</td>
                              <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                              <td class="py-2 px-4 border-b">
                                  @foreach ($user->roles as $role)
                                      {{ $role->name }}<br>
                                  @endforeach
                              </td>
                              <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                              <td class="py-2 px-4 border-b">{{ $user->status }}</td>
                              <td class="py-2 px-4 border-b">
                                  {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                  @if(Cache::has('$user-is-online-' .$user->id))
                                      <span class="text-center text-green-500">Online</span>
                                  @else
                                      <span class="text-center text-red-500">Offline</span>
                                  @endif
                              </td>
                              <td class="py-2 px-4 border-b">
                                  <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">Show</a>
                                  <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded">Edit</a>
                                  <form action="{{ route('users.delete', $user->id) }}" method="POST" class="inline">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

</x-app-layout>
