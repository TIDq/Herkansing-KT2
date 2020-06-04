@extends('layouts.app')
@section('content')
    <div class="columns">
        <div class="column">
            <h1 id="h1" class="title has-padding-top-15" style="text-align: center;">
                Winkelwagen
            </h1>
        </div>
    </div>

    <div class="columns has-margin-top-50 is-centered">
        <div class="columns">
            <div class="column is-one-third">
                Omschrijving {{ $uitvoering->cursus->omschrijving }}
            </div>
            <div class="column is-one-third">
                Prijs: &euro; {{ $uitvoering->cursus->prijs }}
            </div>
            <div class="column is-one-third">
                <a href="{{ url('/') }}" class="button is-danger">Verwijder</a>
            </div>
        </div>
    </div>
@endsection

