@extends('layouts.app')
@section('content')
    <div class="columns">
        <div class="column">
            <h1 id="h1" class="title has-padding-top-15" style="text-align: center;">
                Winkelwagen
            </h1>
        </div>
    </div>

    @forelse(Session::get('cart') as $index => $id)
        @php $uitvoering = \App\Uitvoering::find($id); @endphp
        <div class="columns has-margin-top-50 is-centered">
            <div class="columns">
                <div class="column is-one-third">
                    Omschrijving {{ $uitvoering->cursus->omschrijving }}
                </div>
                <div class="column is-one-third">
                    Prijs: &euro; {{ $uitvoering->cursus->prijs }}
                </div>
                <div class="column is-one-third">
                    <a href="{{ url('/cart/'.$index.'/remove') }}" class="button is-danger">Verwijder</a>
                </div>
            </div>
        </div>
    @empty
        <h2 class="is-centered">
            Winkelmandje is leeg
        </h2>
    @endforelse

    @if(Session::has('cart') && !empty(Session::get('cart')))
        <a class="button is-danger" href="{{ url('/cart/empty') }}">Leeg mandje</a>
        <a class="button is-success" href="{{ url('/checkout') }}">Bestellen</a>
    @endif
@endsection

