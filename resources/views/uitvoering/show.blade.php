@extends('layouts.app')

@section('content')
    <div class="columns has-margin-top-50 is-centered">
        <div class="columns">
            <div class="column">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{ $uitvoeringen->begin_datum }}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ $uitvoeringen->eind_datum }}
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            {{ $uitvoeringen->cursus->omschrijving }}
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            {{ $uitvoeringen->cursus->prijs }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
