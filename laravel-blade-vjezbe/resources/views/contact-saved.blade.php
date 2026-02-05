<h2>Podaci su uspješno zaprimljeni!</h2>

<ul>
    <li><strong>Naslov:</strong> {{ $podaci['naslov'] }}</li>
    <li><strong>Email:</strong> {{ $podaci['email'] }}</li>
    <li><strong>Poruka:</strong> {{ $podaci['poruka'] }}</li>
</ul>

<a href="{{ route('kontakt.create') }}">Povratak na formu</a>