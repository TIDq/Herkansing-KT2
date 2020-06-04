@extends('layouts.app')

@section('content')
    <div class="column">
        <div class="card">
            <div class="card-header">
                <h3 class="has-margin-left-20 has-margin-top-10">Users</h3>
            </div>
            <div class="card-content">
                <table class="table is-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Actie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th>{{ $user ->id }}</th>
                            <td>{{ $user ->name }}</td>
                            <td>{{ $user ->email }}</td>
                            <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="button is-warning is-pulled-left">Edit</button></a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="is-pulled-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="button is-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
