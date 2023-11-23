<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="HOME"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown
        title="Organization"
        :active="Str::startsWith(request()->route()->uri(), 'buttons')"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Create"
            href="{{ route('organizations.create') }}"
            :active="request()->routeIs('organizations.create')"
        />
        <x-sidebar.sublink
            title="View"
            href="{{ route('organizations.index') }}"
            :active="request()->routeIs('organizations.index')"
        />
    </x-sidebar.dropdown>


    <x-sidebar.dropdown
        title="Department"
        :active="Str::startsWith(request()->route()->uri(), 'buttons')"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Create"
            href="{{ route('departments.create') }}"
            :active="request()->routeIs('departments.create')"
        />
        <x-sidebar.sublink
            title="View"
            href="{{ route('departments.index') }}"
            :active="request()->routeIs('departments.index')"
        />
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="Task"
        :active="Str::startsWith(request()->route()->uri(), 'buttons')"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Create"
            href="{{ route('tasks.create') }}"
            :active="request()->routeIs('tasks.create')"
        />
        <x-sidebar.sublink
            title="View"
            href="{{ route('tasks.index') }}"
            :active="request()->routeIs('tasks.index')"
        />
    </x-sidebar.dropdown>
    <x-sidebar.dropdown
        title="Users"
        :active="Str::startsWith(request()->route()->uri(), 'buttons')"
    >
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Create"
            href="{{ route('users.create') }}"
            :active="request()->routeIs('users.create')"
        />
        <x-sidebar.sublink
            title="View"
            href="{{ route('users.index') }}"
            :active="request()->routeIs('users.index')"
        />
    </x-sidebar.dropdown>

    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="text-sm text-gray-500"
    >
        projects
    </div>

    @php
        $links = array_fill(0, 20, '');
    @endphp


        <x-sidebar.link title="create project" link="{{ route('projects.create') }}" />
        <x-sidebar.link title="view project" link="{{ route('projects.index') }}" />

</x-perfect-scrollbar>
