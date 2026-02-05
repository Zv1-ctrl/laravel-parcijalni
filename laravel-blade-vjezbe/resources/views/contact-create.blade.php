<form action="{{ route('kontakt.store') }}" method="POST">
    @csrf
    <div>
        <label>Naslov:</label>
        <input type="text" name="naslov" value="{{ old('naslov') }}">
    </div>
    
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <label>Poruka:</label>
        <textarea name="poruka" cols='30' rows='11'></textarea>
    </div>

    <button type="submit">Pošalji</button>
</form>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif