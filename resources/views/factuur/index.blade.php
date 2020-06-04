@extends('layouts.app')

@section('content')
    <div class="column">
        <div class="card">
            <div class="card-header">
                <h3 class="has-margin-left-20 has-margin-top-10">Factuur #{{$factuur->id}}</h3>
            </div>
            <div class="card-content">
                <table class="table is-striped">
                    <thead>
                    <tr>
                        <th>Cursus</th>
                        <th>Start</th>
                        <th>Eind</th>
                        <th>Prijs</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($factuur->getUitvoeringen() as $uitvoering)
                        <tr>
                            <td>{{ $uitvoering->cursus->omschrijving }}</td>
                            <td>{{ $uitvoering->begin_datum }}</td>
                            <td>{{ $uitvoering->eind_datum }}</td>
                            <td>&euro;{{ $uitvoering->cursus->prijs }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Totaal (ex btw)</th>
                            <th>&euro;{{ $factuur->getTotal() }}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>BTW (21%)</th>
                            <th>&euro;{{ $factuur->getTotal() * 0.21 }}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Totaal (incl btw)</th>
                            <th>&euro;{{ $factuur->getTotal() + ($factuur->getTotal() * 0.21) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


