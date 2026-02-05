<div class="card">
    <h3>{{ $proizvod->naziv }}</h3>

    <p>Količina: {{ $proizvod->kolicina }}</p>
    <p class="price">Cijena: {{ $proizvod->cijena }} €</p>

    <p>
        Ukupno: 
        {{ $proizvod->kolicina * $proizvod->cijena }} €
    </p>
    
    {{ $slot }}
    </div>