@extends ('layouts.app')

@section('content')
    <div class="columns has-margin-top-50">
        <div class="column has-text-centered">
            <a href="{{route('cursus.create')}}" class="button is-rounded is-success">Maak een nieuwe cursus aan</a>
        </div>
    </div>

    <div class="columns has-margin-top-50 is-centered">
        @forelse($cursus as $key => $data)
            @if($loop->index >= 2 && $loop->index % 3 == 0)
    </div>
    <div class="columns">
        @endif
        <div class="column is-one-third">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{ substr($data->cursuscode, 0,60)}}
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        {{ substr($data->omschrijving, 0,60)}}
                    </div>
                </div>
                <div class="card-content">
                    <div class="content">
                        {{ substr($data->prijs, 0,60)}}
                    </div>
                <footer class="card-footer">
                    <a href="{{route('cursus.show', $data->id)}}" class="card-footer-item button is-info">Bekijk</a>
                    <a href="{{route('cursus.edit', $data->id)}}" class="card-footer-item button is-warning">Bewerk</a>
                </footer>
            </div>
        </div>
    </div>

        @empty
            <th><h3>Geen cursus gevonden</h3></th>
    @endforelse
    </div>
    @endsection
