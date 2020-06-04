@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('cursus.update', $cursus->id) }}">
        @csrf
        @method('PATCH')

        <div class="columns">
            <div class="column">
                <label for="name"><h2>Cursuscode</h2></label>
                <input type="text" class="input" name="cursuscode" value="{{ $cursus->cursuscode }}">
            </div>
            <div class="column">
                <label for="name"><h2>Omschrijving</h2></label>
                <input type="text" class="input" name="omschrijving" value="{{ $cursus->omschrijving }}">
            </div>
            <div class="column">
                <label for="name"><h2>Cursuscode</h2></label>
                <input type="text" class="input" name="prijs" value="{{ $cursus->prijs }}">
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <button type="submit" class="button">Update</button>
            </div>
            <div class="column">
                <form action="{{ route('cursus.destroy', $cursus->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="button is-danger">Delete</button>
                </form>
            </div>
        </div>
    </form>

@endsection
