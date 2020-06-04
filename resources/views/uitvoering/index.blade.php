@extends('layouts.app')

@section('content')

    <div class="columns has-margin-top-50">
        <div class="column has-text-centered">
            @can('manage-functions')
            <a href="{{route('uitvoering.create')}}" class="button is-rounded is-success">Maak een nieuwe uitvoering aan</a>
            @endcan
        </div>
    </div>
    <div class="column">
        <div class="card">
            <div class="card-header">
                <h3 class="has-margin-left-20 has-margin-top-10">Uitvoeringen</h3>
            </div>
            <div class="card-content">
                <table class="table is-striped">
                    <thead>
                    <tr>
                        <th>Omschrijving</th>
                        <th>Start</th>
                        <th>Eind</th>
                        <th>Prijs</th>
                        @can('manage-functions')
                        <th>Edit</th>
                        @endcan
                        @can('order-placement')
                        <th>Bestel</th>
                            @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($uitvoeringen as $uitvoering)
                        <tr>
                            <th>{{ $uitvoering ->cursus->omschrijving }}</th>
                            <td>{{ $uitvoering ->begin_datum }}</td>
                            <td>{{ $uitvoering ->eind_datum }}</td>
                            <td>{{ $uitvoering ->cursus->prijs }}</td>
                            @can('manage-functions')
                            <td><a href="{{route('uitvoering.edit', $uitvoering->id)}}" class="card-footer-item button is-warning">Bewerk</a></td>
                                @endcan
                            @can('order-placement')
                                <td><a href="/" class="card-footer-item button is-warning">Bestel</a></td>
                                @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
