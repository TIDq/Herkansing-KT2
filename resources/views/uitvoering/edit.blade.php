@section('content')
    <form method="POST" action="{{ route('uitvoering.update', $uitvoering->id) }}">
        @csrf
        @method('PATCH')

        <div class="columns">
            <div class="column">
                <label for="name"><h2>Begin Tijd</h2></label>
                <input type="date" class="input" name="begin_tijd" value="{{ $uitvoering->begin_tijd }}">
            </div>
            <div class="column">
                <label for="name"><h2>Eind Tijd</h2></label>
                <input type="date" class="input" name="eind_tijd" value="{{ $uitvoering->eind_tijd }}">
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
                <button type="submit" class="button is-success">Update</button>
            </div>
            <div class="column">
                <form action="{{ route('uitvoering.destroy', $uitvoering->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="button is-danger">Delete</button>
                </form>
            </div>
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
