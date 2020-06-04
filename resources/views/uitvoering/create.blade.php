@extends('layouts.app')

@section('content')
    <form class="has-margin-top-50" id="save_post" method="POST" action="{{route('uitvoering.store')}}">
        @csrf

        <div class="columns">
            <div class="column">
                <label for="name">Begin Tijd</label>
                <input type="date" id="begin_tijd" class="input" name="begin_tijd" value="{{ old('begin_tijd') }}">
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <label for="name">Eind Tijd</label>
                <input type="date" id="eind_tijd" class="input" name="eind_tijd" {{ old('eind_tijd') }}>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <p>Cursus</p>
                <div class="select">
                    <select name="cursus_id">
                        @forelse($cursussen as $cursus)
                            <option value="{{ $cursus->id }}">{{ $cursus->omschrijving }}</option>
                        @empty
                            <option value="null">Geen cursus beschikbaar</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <input type="submit" class="button is-success" value="Opslaan">
            </div>
        </div>
    </form>
    @endsection

@push('scripts')
    <script>
        var calendars = bulmaCalendar.attach('[type="date"]', options);

        for(var i = 0; i < calendars.length; i++) {
            calendars[i].on('select', date => {
                console.log(date);
            });
        }

        var element = document.querySelector('#my-element');
        if (element) {
            element.bulmaCalendar.on('select', function(datepicker) {
                console.log(datepicker.data.value());
            });
        }
    </script>
    @endpush
