<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>

        </div>
    </x-slot>
    <style>
        a {
            color: #FFFFFF;
            text-decoration: none;
        }
    </style>

    <div class="container pb-5">

        @forelse($notifications as $notification)
        <div class="alert alert-success flex justify-between items-center" role="alert">
            @php $data = json_decode($notification->data) @endphp
            <span>
                {{ $notification->created_at }} User: {{ $data->name }} Email: {{ $data->email }} has just registered.
            </span>
            <a href="#" class="text-white underline mark-as-read" data-id="{{ $notification->id }}">
                Mark as read
            </a>
        </div>

        @if($loop->last)
        <a href="#" id="mark-all" class="text-white mb-4">
            Mark all as read
        </a>
        @endif
        @empty

        @endforelse


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            <a href="{{ route('organizations.index') }}" class="text-decoration-none">
                <div class="card bg-blue-500 text-white text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-globe fa-3x mb-3"></i>
                        <h5 class="card-title">
                            <i class="fa-solid fa-building"></i> {{ $organizations->count('id') }}
                        </h5>
                        <h1 class="card-text">Organization</h1>
                    </div>
                </div>
            </a>



            <a href="{{ route('projects.index') }}" class="text-decoration-none">
                <div class="card bg-green-500 text-white text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-globe fa-3x mb-3"></i>
                        <h5 class="card-title">
                            <i class="fa-solid fa-folder"></i> {{ $projects->count('id') }}
                        </h5>
                        <h1 class="card-text">Projects</h1>
                    </div>
                </div>
            </a>


            <a href="{{ route('users.index') }}" class="text-decoration-none">
                <div class="card bg-yellow-500 text-white text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-globe fa-3x mb-3"></i>
                        <h5 class="card-title">
                            <i class="fa-solid fa-user"></i> {{ $users->count('id') }}
                        </h5>
                        <h1 class="card-text">User</h1>
                    </div>
                </div>
            </a>


            <a href="{{ route('departments.index') }}" class="text-decoration-none">
                <div class="card bg-pink-500 text-white text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-globe fa-3x mb-3"></i>
                        <h5 class="card-title">
                            <i class="fa-solid fa-building"></i> {{ $departments->count('id') }}
                        </h5>
                        <h1 class="card-text">Departments</h1>
                    </div>
                </div>
            </a>



            <a href="{{ route('tasks.index') }}" class="text-decoration-none">
                <div class="card bg-purple-500 text-white text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-globe fa-3x mb-3"></i>
                        <h5 class="card-title">
                            <i class="fa-solid fa-tasks"></i> {{ $tasks->count('id') }}
                        </h5>
                        <h1 class="card-text">Tasks</h1>
                    </div>
                </div>
            </a>

        </div>
    </div>
    <canvas id="myChart"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Organization', 'Projects', 'User', 'Departments', 'Tasks'],
                datasets: [{
                    label: 'Count',
                    data: [
                        {{ $organizations->count('id') }},
                        {{ $projects->count('id') }},
                        {{ $users->count('id') }},
                        {{ $departments->count('id') }},
                        {{ $tasks->count('id') }}
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- Add your chart code here -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('Admin.markNotification') }}", {
                method: 'POST',
                data: {
                    _token,
                    id
                }
            });
        }

        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() =>{
                $(this).parents('div.alert').remove();
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
    </script>



</x-app-layout>
