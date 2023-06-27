@extends('layouts.app')
@section('content')
<div class="welcome">

    <div class="jumbo-image">
        <div class="inner-jumbo">
            <h1 class="text-center">Benvenuto su Deliveboo</h1>
            <h3 class="text-center">Accedi o registrati</h3>
            <div class="d-flex justify-content-center gap-3 pt-2">
                <a class="col-4 col-lg-2 col-xl-1 text-center btn btn-primary" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                <a class="col-4 col-lg-2 col-xl-1 text-center btn btn-primary"
                    href="{{ route('register') }}">{{ __('Registrati') }}</a>
            </div>
        </div>
    </div>
    
    <section class="section-1">
        <div class="container py-5 text-center">
            <h2 class="__h2">Aumenta le tue vendite diventando partner del più grande servizio online di ordini a
                domicilio d'Italia</h2>
            <p class="my-3">Metti il tuo attività a disposizione di migliaia di nuovi clienti entrando nel gruppo
                DeliveBoo. Appena affiliato avrai più ordini, le tecnologie più recenti, pubblicità e un servizio
                clienti dedicato.</p>
            <div class="my-5 pt-5 flex-column flex-lg-row row-gap-5  d-flex justify-content-center">
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-percent"></i>
                    <h4>Risparmi giornalieri</h4>
                    <span>Grazie alle offerte esclusive sui prodotti per le consegne riservate ai ristoranti
                        partner</span>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
                    <h4>Risparmia i soldi della pubblicità</h4>
                    <span>Dalle affissioni agli spot in tv, DeliveBoo pubblicizza per te il tuo ristorante.</span>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <h4>Tecnologia Innovativa</h4>
                    <span>Migliora i tuoi ordini e l'esperienza dei clienti grazie alle più recenti
                        tecnologie.</span>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-2">
        <div class="container py-5 text-center">
            <h2 class="__h2">Tantissimi consigli</h2>
            <p class="my-3">Siamo sempre disponibili a offrirti consigli e idee su come migliorare il tuo
                business.</p>
            <div class="my-5 pt-5 flex-column flex-lg-row row-gap-5 d-flex justify-content-center">
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-user-plus"></i>
                    <h4>DeliveBoo</h4>
                    <span>è il punto di incontro tra te e i tuoi potenziali clienti, affezionati alla nostra
                        piattaforma grazie a investimenti lungimiranti nelle campagne di marketing e a un’offerta di
                        prodotti e servizi sempre più ricca.</span>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-chart-pie"></i>
                    <h4>Adesione a zero rischi</h4>
                    <span>Non ci sono costi fissi adesione. Le nostre entrate dipendono dalle commissioni, e quindi
                        dal successo della tua attività. In più, offriamo regolarmente offerte, sconti e prezzi
                        competitivi su packaging, borse per le consegne e abbigliamento per rider.</span>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <h4>Consegne su misura</h4>
                    <span>I nostri servizi, le opportunità delle opzioni di consegna e il nostro supporto smart
                        possono essere utili ad attività come la tua che sono il cardine del nostro business.</span>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-3">
        <div class="container py-5 text-center">
            <h2 class="">"Da quando sono su DeliveBoo il fatturato è cresciuto del 25%. Gli ordini a domicilio
                sono diventati sempre più importanti per il mio business."</h2>
            <p class="my-3">Riccardo, Bianco</p>
            <div class="my-5 pt-5 flex-column flex-lg-row row-gap-5  d-flex justify-content-center">
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <h4>Registrati</h4>
                    <span>Inserisci i tuoi dati qui sopra. Ti faremo una serie di domande sulla tua attività</span>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class="fa-solid fa-id-badge"></i>
                    <h4>Imposta il profilo</h4>
                    <span>Carica il tuo documento d'identità, una prova di titolarità e il tuo menù o catalogo di
                        prodotti. <br> Ti invieremo subito dopo il kit necessario per iniziare</span>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                    <i class=" fa-solid fa-brands fa-sellcast"></i>
                    <h4>Inizia a vendere</h4>
                    <span>Ricevi i primi ordini e concludi le prime vendite</span>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


