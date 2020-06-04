@extends('layouts.app')
@section('content')
    <form id="save_post" method="POST" action="{{route('cursus.store')}}">
        @csrf

        <div class="columns has-margin-top-50">
            <div class="column">
                <label for="name">Cursuscode</label>
                <input type="text" id="cursuscode" class="input" name="cursuscode" value="{{ old('cursuscode') }}">
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <label for="name">Omschrijving</label>
                <input type="text" id="omschrijving" class="input" name="omschrijving" {{ old('omschrijving') }}>
                </div>
            </div>

        <div class="columns">
            <div class="column">
                <label for="name">Prijs</label>
                <input type="text" id="prijs" class="input" name="prijs" value="{{ old('prijs') }}">
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <input type="submit" class="button is-success" value="Opslaan">
            </div>
        </div>
    </form>
    @endsection
