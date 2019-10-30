@extends("adminlte::master")


@section('body')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-12 text-center">
                <h3>Leia o QR CODE</h3>

                <div style="margin:0 100px 45px 100px; width: 200px">

                <img src="{{ asset('images/QRCODE/QRCode_APPPlasa.png') }} " class="img-thumbnail"/>

                </div>
                <p class="lead"> Ou Clique no botão abaixo para instalar o app!</p>
                <a class="btn btn-primary nebula-sw-install-button" class="install" id="nebula" onclick="install()" href="#">Instalar</a>
            </div>
        </div>
    </div>

    <script>

        let deferredPrompt = null;

        window.addEventListener('beforeinstallprompt', (e) => {
            // Prevent Chrome 67 and earlier from automatically showing the prompt
            e.preventDefault();
            // Stash the event so it can be triggered later.
            deferredPrompt = e;
        });

        async function install() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                console.log(deferredPrompt)
                deferredPrompt.userChoice.then(function(choiceResult){

                    if (choiceResult.outcome === 'accepted') {
                        console.log('Your PWA has been installed');
                    } else {
                        console.log('User chose to not install your PWA');
                    }

                    deferredPrompt = null;

                });


            }
        }
    </script>

    <script src="{{ asset('script.js') }}"></script>

    <script>
        $(document).ready(function () {
            install();
        })
    </script>
@endsection