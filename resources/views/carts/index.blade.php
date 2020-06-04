@extends('layouts.app')

@section('content')
    <div class="column">
        <div class="card">
            <div class="card-header">
                <h3 class="has-margin-left-20 has-margin-top-10">Carts</h3>
            </div>
            <div class="card-content">
                <table class="table is-striped">
                    <thead>
                    <tr>
                        <th>Nummer</th>
                        <th>Merk</th>
                        <th>Type</th>
                        <th>Cursus</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <th>{{ $cart ->nummer }}</th>
                            <td>{{ $cart ->merk }}</td>
                            <td>{{ $cart ->type }}</td>
                            <td>{{ $cart ->omschrijving }}</td>
                            <td>{{ $cart ->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
