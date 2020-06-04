@extends('layouts.app')

@section('content')
    <div class="column">
        <div class="card">
            <div class="card-header">
                <h3 class="has-margin-left-20 has-margin-top-10"> Edit user {{ $user->name }} </h3>
            </div>
            <div class="card-content">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">

                    <div class="field">
                        <label class="label" for="name">Email</label>
                        <div>
                            <input id="email" type="text" class="control input @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="name">Naam</label>
                        <div>
                            <input id="name" type="text" class="control input @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    @csrf
                    {{ method_field('PUT') }}
                    <div class="field">
                        <label class="label" for="roles">Rollen</label>
                        @foreach($roles as $role)
                            <div class="field">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                       @if($user->roles->contains($role->id)) checked=checked @endif>
                                <label>{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="button is-primary">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
