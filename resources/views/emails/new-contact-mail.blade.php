<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Nuovo ordine</h1>

    <h4>Cliente: <strong>{{ $lead->name }}</strong></h4>
    <h4>Indirizzo: <strong>{{ $lead->address }}</strong></h4>
    <h4>Cap: <strong>{{ $lead->postal_code }}</strong></h4>
    <h4>Email: <strong>{{ $lead->email }}</strong></h4>
    <h4>Telefono: <strong>{{ $lead->phone }}</strong></h4>

    <div class="container">
        <h2>Ordinazione:</h2>
        <ul>
            @foreach ($lead->cartItems as $cartItem)   
            <li>
                {{$cartItem['product']['name']}} - {{ $cartItem['product']['price'] }}€ x {{ $cartItem['quantity'] }}
            </li>
            @endforeach
        </ul>
    
        <div>
            Totale: <strong>{{$lead->total_price}}€</strong>
        </div>
    
        <p>Info aggiuntive: {{ $lead->optional_info ? $lead->optional_info : '"nessuna"' }}</p>

        <p>Stato ordine: {{ $lead->content }}</p>
    </div>
</body>

</html>
