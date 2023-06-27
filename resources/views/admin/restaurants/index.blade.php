@extends ('layouts.admin')

@section('content')
    <div class="container p-5 mb-5 bg-dark rounded-3 text-center ">
        <h1 class="">Benvenuto {{ $userName }}</h1>

        <h2 class="my-5 d-none d-lg-block"><i class="fa-solid fa-circle-arrow-left"></i> Usa il menu sulla sinistra per navigare nel gestionale del tuo ristorante</h2>
        <h2 class="my-5 d-lg-none"><i class="fa-solid fa-circle-arrow-up"></i> Usa il menu in alto per navigare nel gestionale del tuo ristorante</h2>


        <div class="d-flex flex-column align-items-center bg-success rounded-5 p-5">
            
            <h2>Necessiti di supporto?</h2>
            <i class="fa-solid fa-phone fs-2 my-3"></i>    
            <h5 class="">0842 532 25 23</h5>
    
            <p class="">Assistenza telefonica 24 ore su 24, 7 giorni su 7</p>

        </div>

    </div>
@endsection
