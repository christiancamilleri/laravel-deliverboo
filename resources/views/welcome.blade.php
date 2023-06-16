@extends('layouts.app')
@section('content')

<div class="">
    <div class="">

        <div class="jumbo-image">
            <div class="inner-jumbo">
                <h1 class="text-center">Benvenuto su Deliveboo</h1>
                <h3 class="text-center">Accedi o registrati</h3>
                <div class="d-flex justify-content-center gap-3 pt-2">
                    <a class="col-4 col-lg-2 col-xl-1 text-center btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="col-4 col-lg-2 col-xl-1 text-center btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            </div>
        </div>

        <section class="section-1">
            <div class="container my-5 py-5 text-center">
                <h2 class="__h2">Aumenta le tue vendite diventando partner del più grande servizio online di ordini a domicilio d'Italia</h2>
                <p class="my-3">Metti il tuo attività a disposizione di migliaia di nuovi clienti entrando nel gruppo DeliveBoo. Appena affiliato avrai più ordini, le tecnologie più recenti, pubblicità e un servizio clienti dedicato.</p>
                <div class="my-5 pt-5 flex-column flex-lg-row row-gap-5  d-flex justify-content-center">
                    <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                        <i class="fa-solid fa-percent"></i>
                        <h4>Risparmi giornalieri</h4>
                        <span>Grazie alle offerte esclusive sui prodotti per le consegne riservate ai ristoranti partner</span>
                    </div>
                    <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                        <i class="fa-solid fa-circle-dollar-to-slot"></i>
                        <h4>Risparmia i soldi della pubblicità</h4>
                        <span>Dalle affissioni agli spot in tv, DeliveBoo pubblicizza per te il tuo ristorante.</span>
                    </div>
                    <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <h4>Tecnologia Innovativa</h4>
                        <span>Migliora i tuoi ordini e l'esperienza dei clienti grazie alle più recenti tecnologie.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-2">
            <div class="container my-5 py-5 text-center">
                <h2 class="__h2">Tantissimi consigli</h2>
                <p class="my-3">Siamo sempre disponibili a offrirti consigli e idee su come migliorare il tuo business.</p>
                <div class="my-5 pt-5 flex-column flex-lg-row row-gap-5  d-flex justify-content-center">
                    <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                        <i class="fa-solid fa-user-plus"></i>
                        <h4>DeliveBoo</h4>
                        <span>è il punto di incontro tra te e i tuoi potenziali clienti, affezionati alla nostra piattaforma grazie a investimenti lungimiranti nelle campagne di marketing e a un’offerta di prodotti e servizi sempre più ricca.</span>
                    </div>
                    <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                        <i class="fa-solid fa-chart-pie"></i>
                        <h4>Adesione a zero rischi</h4>
                        <span>Non ci sono costi fissi adesione. Le nostre entrate dipendono dalle commissioni, e quindi dal successo della tua attività. In più, offriamo regolarmente offerte, sconti e prezzi competitivi su packaging, borse per le consegne e abbigliamento per rider.</span>
                    </div>
                    <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <h4>Consegne su misura</h4>
                        <span>I nostri servizi, le opportunità delle opzioni di consegna e il nostro supporto smart possono essere utili ad attività come la tua che sono il cardine del nostro business.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-3">
            <div class="container my-5 py-5 text-center">
                <h2 class="">"Da quando sono su DeliveBoo il fatturato è cresciuto del 25%. Gli ordini a domicilio sono diventati sempre più importanti per il mio business."</h2>
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
                        <span>Carica il tuo documento d’identità, una prova di titolarità e il tuo menù o catalogo di prodotti. <br> Ti invieremo subito dopo il kit necessario per iniziare</span>
                    </div>
                    <div class="col-12 col-lg-4 d-flex flex-column gap-3">
                        <i class=" fa-solid fa-brands fa-sellcast"></i>
                        <h4>Inizia a vendere</h4>
                        <span>Ricevi i primi ordini e concludi le prime vendite</span>
                    </div>
                </div>
            </div>
        </section>



<footer class="text-center text-lg-start bg-light text-muted">

  <section class="d-flex justify-content-center justify-content-lg-between p-4">

    <div class="container d-flex justify-content-center justify-content-lg-between p-4">

        <div class="me-5 d-none d-lg-block">
          <span>Connettiti con noi sui nostri social:</span>
        </div>

    

        <div class="">
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>


    </div>
  </section>



  <section class="">
    <div class="container text-center text-md-start mt-5">

      <div class="row mt-3">
  
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <h6 class="__h2 text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>DeliveBoo
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
        </div>
 

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

          <h6 class="__h2 text-uppercase fw-bold mb-4">
            Servizio
          </h6>
          <p>
            <a href="#!" class="text-reset">Rapido</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Puntuale</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Sicuro</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Peciso</a>
          </p>
        </div>



        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <h6 class="__h2 text-uppercase fw-bold mb-4">
            Link Utili
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>



        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <h6 class="__h2 text-uppercase fw-bold mb-4">Contatto</h6>
          <p><i class="fas fa-home me-3"></i> Milano, MI 20123</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            deliveboo@delivery.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 39 123 25 36</p>
          <p><i class="fas fa-print me-3"></i> + 39 234 567 89</p>
        </div>
    
      </div>

    </div>
  </section>



  <div class="copyright text-center p-4">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="">by Polo</a>
  </div>

</footer>













        {{-- <div class="logo_laravel">
            <img src="" alt=""> --}}
            {{-- <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-25">
                <g clip-path="url(#clip0)" fill="#EF3B2D">
                    <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z" />
                </g>
            </svg>
        </div>
        <h1 class="display-5 fw-bold">
            Welcome to Laravel+Bootstrap 5
        </h1>

        <p class="col-md-8 fs-4">This a preset package with Bootstrap 5 views for laravel projects including laravel breeze/blade. It works from laravel 9.x to the latest release 10.x</p>
        <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-primary btn-lg" type="button">Documentation</a> --}}
    {{-- </div>
</div> --}}

{{-- <div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div> --}}
@endsection

<style>

    .jumbo-image {
        height: 500px;
        background-image: url('../../../img/samantha-fields-tMD6iP9fWF4-unsplash.jpg');
        background-size: cover;

    }

    .inner-jumbo {
        height: 100%;
        width: auto;
        padding: 50px;
        color: white;
        background-color: rgba(0, 0, 0, 0.295);
    }

    .text-center.btn {
        color: white;
        background-color: #fc8200;
    }
    
    .fa-solid {
        color: #fc8200;
        font-size: 100px
    }

    .__h2,
    .fas,
    .fab {
        color: #fc8200;
    }

    .section-2 {
        background-color: #f1f2f4;
    }

    .copyright {
        background-color: #fc8200
    }

    section.d-flex.justify-content-center.justify-content-lg-between.p-4 {
        border-bottom: 5px solid #fc8200;
        border-top: 5px solid #fc8200;

    }

    .inner-jumbo h1 {

    }

</style>