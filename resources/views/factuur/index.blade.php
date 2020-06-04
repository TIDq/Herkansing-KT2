@extends('layouts.app')

@section('content')
    <div class="column">
        <div class="card">
            <div class="card-header">
                <h3 class="has-margin-left-20 has-margin-top-10">Factuur</h3>
            </div>
            <div class="card-content">
                <table class="table is-striped">
                    <thead>
                    <tr>
                        <th>Cursus</th>
                        <th>Begin</th>
                        <th>Eind</th>
                        <th>Prijs</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($facturen as $factuur)
                        <tr>
                            <th>{{ $factuur ->omschrijving }}</th>
                            <td>{{ $factuur ->begin }}</td>
                            <td>{{ $factuur ->eind }}</td>
                            <td>{{ $factuur ->prijs }}</td>
                        </tr>
                    @endforeach
                    @foreach($facturen as $factuur)

                    @endforeach
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Exclusief BTW:</th>
                        <td>{{ $factuur ->totaal}}</td>
                    </tr>
                    @foreach($facturen as $factuur)

                    @endforeach
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Totaal:</th>
                        <td>{{ $factuur ->totaal + 210}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


