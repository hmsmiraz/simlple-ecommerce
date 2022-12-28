<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Users
    </x-slot>

    <x-backend.partials.elements.breadcrumb>
        <x-slot name="pageHeader">Roles</x-slot>
        <li class="breadcrumb-item"><a href="{{route('home')}}"> Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('roles.index')}}">Roles</a></li>
        <li class="breadcrumb-item active">User</li>
    </x-backend.partials.elements.breadcrumb>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Roles User
            <a class="btn btn-info" href="{{route('roles.index')}}">User List</a>

        </div>
        <div class="card-body">
            <table class="table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    </x-backend.layouts.master>