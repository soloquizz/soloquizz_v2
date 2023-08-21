<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Take Dump</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{asset('assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{asset('assets/vendor/fix-footer.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{asset('assets/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{asset('assets/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/fontawesome.rtl.css')}}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{asset('assets/css/preloader.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/preloader.rtl.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/app.rtl.css')}}" rel="stylesheet">

    <!-- Touchspin -->
    <link type="text/css" href="{{asset('assets/css/bootstrap-touchspin.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/bootstrap-touchspin.rtl.css')}}" rel="stylesheet">

</head>

<body id="fullscreen-container" class="layout-navbar-mini-fixed-bottom">

    @include('sweetalert::alert')

    <!-- Page Layout -->
    <div class="mdk-header-layout bg-white js-mdk-header-layout" style="min-height: 100vh; flex-grow: 1;">

        <div class="mdk-header-layout__content  page-content">
            <div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0" data-effects="blend-background">
                <div class="mdk-box__content">
                    <div class="py-64pt text-center text-sm-left">
                        <div class="container d-flex flex-column justify-content-center align-items-center">
                            <div class="countdown">
                                <p id="clock" class="h2 text-white-50 font-weight-light m-0"></p>
                            </div>
                            <h2 class="text-white">{{$certification->titre}}</h2>
                            <button id="toggle-button"  class="btn btn-outline-white">Démarrer</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="info-dump" class="navbar navbar-expand-sm navbar-light navbar-submenu navbar-list p-0 m-0 align-items-center">
                <div class="container page__container">
                    <ul class="nav navbar-nav flex align-items-sm-center">
                        <li class="nav-item navbar-list__item">
                            <i class="fa fa-question mr-2"></i>
                            {{$questions->count()}} questions
                        </li>
                        <li class="nav-item text-danger navbar-list__item">
                            <i class="material-icons text-muted icon--left">schedule</i>
                            <div id="duree">
                                {{$duree}} &nbsp;
                            </div>
                             minutes
                        </li>
                    </ul>
                </div>
            </div>
            <div id="test_section" class="container page__container">
                <div class="mt-4">
                    <div id="progressbar" class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated"  aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <form method="POST" id="dumpForm" action="{{ route('etudiant.dumps.store') }}">
                    @csrf
                    <input type="hidden" name="dump_id" value="{{$dump->id}}">
                    <input type="hidden" name="certification_id" value="{{$certification->id}}">
                    <input type="hidden" name="dump_user_id" value="{{$dumpUser->id}}">
                    @foreach($questions as $question)
                        <div class="tab mt-3">
                            <div class=" row">
                                <div class="col-lg-8">
                                    <div id="firstquestion">
                                        <div class="d-flex align-items-center page-num-container mb-16pt">
                                            <div class="page-num">{{$loop->iteration}}</div>
                                            <h4>Question {{$loop->iteration}} sur {{$loop->count}} </h4>
                                        </div>
                                        <span>{{$question->point}} points</span>
                                        <p class="">{!! $question->contenu !!}</p>
                                    </div>
                                    <input type="hidden" name="questions[]" value="{{$question->id}}">
                                </div>
                                <div class="col-lg-4">
                                    <div id="firstreponse">
                                        <h4>Option de réponse:</h4>
                                        @foreach($question->options as $option)
                                            <div class="ml-2">
                                                <input id="customCheck{{$option->id}}" value="{{$option->id}}" name="reponses{{$question->id}}[]" type="checkbox" class="custom-control-input">
                                                <label for="customCheck{{$option->id}}" class="custom-control-label">{!! $option->contenu !!}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button type="button" class="btn btn-outline-secondary w-100 w-sm-auto mb-8pt mb-sm-0 mr-sm-16pt" id="prevBtn" onclick="nextPrev(-1)">Précédente</button>
                                        <button type="button" class="btn-next btn btn-accent w-100 w-sm-auto" id="nextBtn" onclick="nextPrev(1)"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
        <!-- Layout Content -->
        <!-- // END Layout Content -->
    </div>
    <!-- // END Page Layout -->


    <!-- jQuery -->
    <script src="{{asset('assets/vendor/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('assets/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>

    <!-- DOM Factory -->
    <script src="{{asset('assets/vendor/dom-factory.js')}}"></script>

    <!-- MDK -->
    <script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>

    <!-- App JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{asset('assets/js/app-settings.js')}}"></script>

    <!-- Global Settings -->
    <script src="{{asset('assets/js/settings.js')}}"></script>

    <!-- Gestion du temps -->
    <script src="{{asset('assets/jquery.countdown-2.2.0/jquery.countdown.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/jquery.countdown-2.2.0/jquery.countdown.min.js')}}" type="text/javascript"></script>

    <script>

        //Manage hide section before begin test

        $('.tab').hide();
        $('#progressbar').hide();

        /* Gestion du temp */
        var d1 = new Date ();
        var d2 = new Date ( d1 );
        var duree=parseInt(document.getElementById("duree").textContent);
        d2.setMinutes ( d1.getMinutes() + duree );
        /* Get into full screen */



        // Begin gestion Full Screen
        const toggleButton = document.getElementById('toggle-button');
        const fullscreenContainer = document.getElementById('fullscreen-container');
        toggleButton.addEventListener('click', toggleFullScreen);
        function toggleFullScreen() {
            $('#test_section').show();
            $('#toggle-button').hide();
            $('#info-dump').hide();
            $('#progressbar').show();
            showTab(0);

            $('#clock').countdown(d2)
                .on('update.countdown', function(event) {
                    var format = '%H:%M:%S';
                    $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    $(this).html('Temps expiré')
                        .parent().addClass('disabled');
                    var resttime=(document.getElementById("clock").textContent);
                    $("#temps").val(resttime);
                    document.getElementById("dumpForm").submit();

                });

            //Go Full Screen
            if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                if (fullscreenContainer.requestFullscreen) {
                    fullscreenContainer.requestFullscreen();
                } else if (fullscreenContainer.mozRequestFullScreen) {
                    fullscreenContainer.mozRequestFullScreen();
                } else if (fullscreenContainer.webkitRequestFullscreen) {
                    fullscreenContainer.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (fullscreenContainer.msRequestFullscreen) {
                    fullscreenContainer.msRequestFullscreen();
                }
            }
            else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        }

        // END gestion Full Screen

        /*BEGIN  Envoyer les donner aprés quitter le plein écran*/
            if (document.addEventListener)
            {
                document.addEventListener('fullscreenchange', exitHandler, false);
                document.addEventListener('mozfullscreenchange', exitHandler, false);
                document.addEventListener('MSFullscreenChange', exitHandler, false);
                document.addEventListener('webkitfullscreenchange', exitHandler, false);
            }

            function exitHandler()
            {
                if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement)
                {
                    var resttime=(document.getElementById("clock").textContent);
                    $("#temps").val(resttime);
                    document.getElementById("dumpForm").submit();
                }
                
                $window
            }
        /* END Envoyer les donner aprés quitter le plein écran*/


        /*BEGIN  Gestion Form MultiStep*/
        var currentTab = 0; // Current tab is set to be the first tab (0)
        var steps = document.getElementsByClassName("tab").length;
         // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n === 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n === (x.length-1)) {
                $('.btn-next').text('Envoyer');
            } else {
                $('.btn-next').text('Suivante');
            }
            setProgressBar(n+1);
            // ... and run a function that displays the correct step indicator:
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                var resttime=(document.getElementById("clock").textContent);
                $("#temps").val(resttime);
                document.getElementById("dumpForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function abandonner() {
            var resttime=(document.getElementById("clock").textContent);
            $("#temps").val(resttime);
            document.getElementById("dumpForm").submit();
            return false;
        }

        function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width",percent+"%")
        }
        /*END  Gestion Form MultiStep*/


    </script>
</body>
</html>
