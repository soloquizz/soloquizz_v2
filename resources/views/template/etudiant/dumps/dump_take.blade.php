<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Faire quiz</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="/assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="/assets/vendor/fix-footer.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="/assets/css/material-icons.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="/assets/css/fontawesome.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/fontawesome.rtl.css" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="/assets/css/preloader.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/preloader.rtl.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="/assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/app.rtl.css" rel="stylesheet">

    <style type="text/css">
        #go-button {
            width: 200px;
            display: block;
            margin: 50px auto 0 auto;
        }

        /* webkit requires explicit width, height = 100% of sceeen */
        /* webkit also takes margin into account in full screen also - so margin should be removed (otherwise black areas will be seen) */
        #element:-webkit-full-screen {
            width: 100%;
            height: 100%;
            background-color: #fcf3ec;
            margin: 0;
        }

        #element:-moz-full-screen {
            margin: 0;
        }

        #element:-ms-fullscreen {
            margin: 0;
        }

        /* W3C proposal that will eventually come in all browsers */
        #element:fullscreen {
            margin: 0;
        }
        /* Hide all steps by default: */
        .tab {
            display: none;
        }

    </style>
</head>

<body class="layout-navbar-mini-fixed-bottom">
@if (!Auth::guest())
    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header Layout Content -->
        <div id="element" class="mdk-header-layout__content page-content ">
            <div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0" data-effects="blend-background">
                <div class="mdk-box__content">
                    <div class="py-64pt text-center text-sm-left">
                        <div class="container d-flex flex-column justify-content-center align-items-center">
                            <h1 class="text-white mb-0">Titre de la leçon</h1>
                            <H3 class="text-white mb-0">{{$quize->titre}}</H3>
                            <div class="countdown">
                                <p id="clock" class="h1 text-white-50 font-weight-light m-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="navbar navbar-expand-sm navbar-light navbar-submenu navbar-list p-0 m-0 align-items-center">
                        <div class="container page__container">
                            <ul class="nav navbar-nav flex align-items-sm-center">
                                <li class="nav-item navbar-list__item">20 Points</li>
                                <li class="nav-item navbar-list__item">12 Questions</li>
                                <li class="nav-item navbar-list__item">
                                    <i class="material-icons text-muted icon--left">schedule</i>
                                    <div id="duree">
                                        {{$quize->duree}} minutes
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <button id="go-button" class="btn btn-accent w-100 w-sm-auto pull-right">Démarrer</button>
                    </div>
                </div>
            </div>
            <div class="container page__container">
                <form action="#" method="get" class="form-row" autocomplete="off" id="regForm" style="width: 100%;">
                    <div id="progressbar">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    @foreach($quize->quizQuestions as $question)
                        <div class="tab">
                            <div class=" row">
                                <div class="col-lg-7">
                                    <div id="firstquestion">
                                        <div class="d-flex align-items-center page-num-container mb-16pt">
                                            <div class="page-num">{{$loop->iteration}}</div>
                                            <h4>Question {{$loop->iteration}} sur {{$loop->count}} </h4>
                                        </div>
                                            <span>{{$question->codeQuestion->points}} points</span>
                                            <p class="">{!! $parse->text($question->codeQuestion->text) !!}</p>
                                            <span>{{$question->codeQuestion->source}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div id="firstreponse">
                                        <h4>Votre réponse:</h4>
                                        @foreach($question->codeQuestion->options as $reponse)
                                            <div>
                                                {!! Form::radio($question->codeQuestion->code_question, $reponse->code_option, ['class' => 'form-control']) !!}
                                                <label class="">{!! $parse->text($reponse->text) !!}</label>
                                            </div>
                                        @endforeach
                                        @foreach($question->codeQuestion->options as $reponse)
                                            @if($reponse->correcte!=1)
                                                <div>
                                                    {!! Form::radio($question->codeQuestion->code_question, $reponse->code_option, ['class' => 'form-control']) !!}
                                                    <label class="">Réponse incorrecte</label>
                                                </div>
                                                @break;
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button type="button" class="btn btn-outline-secondary w-100 w-sm-auto mb-8pt mb-sm-0 mr-sm-16pt" id="prevBtn" onclick="nextPrev(-1)">Précédente</button>
                                        <button type="button" class="btn btn-accent w-100 w-sm-auto" id="nextBtn" onclick="nextPrev(1)">Suivante</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
        <!-- // END Header Layout Content -->
    </div>
    <!-- // END Header Layout -->

    <!-- // END drawer -->

@else
    <script>window.location.href = "{{url('/')}}";</script>
@endif
<!-- jQuery -->
<script src="/assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="/assets/vendor/popper.min.js"></script>
<script src="/assets/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="/assets/vendor/perfect-scrollbar.min.js"></script>

<!-- DOM Factory -->
<script src="/assets/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="/assets/vendor/material-design-kit.js"></script>

<!-- Fix Footer -->
<script src="/assets/vendor/fix-footer.js"></script>

<!-- Chart.js -->
<script src="/assets/vendor/Chart.min.js"></script>

<!-- App JS -->
<script src="/assets/js/app.js"></script>

<!-- Highlight.js -->
<script src="/assets/js/hljs.js"></script>

<!-- App Settings (safe to remove) -->
<script src="/assets/js/app-settings.js"></script>


<!-- Global Settings -->
<script src="/assets/js/settings.js"></script>

<!-- Moment.js -->
<script src="/assets/vendor/moment.min.js"></script>
<script src="/assets/vendor/moment-range.min.js"></script>

<!-- Gestion du temps -->
<script src="/assets/jquery.countdown-2.2.0/jquery.countdown.js" type="text/javascript"></script>
<script src="/assets/jquery.countdown-2.2.0/jquery.countdown.min.js" type="text/javascript"></script>
<script>

    /* Gestion du full screen */
    function GoInFullscreen(element) {
        if(element.requestFullscreen)
            element.requestFullscreen();
        else if(element.mozRequestFullScreen)
            element.mozRequestFullScreen();
        else if(element.webkitRequestFullscreen)
            element.webkitRequestFullscreen();
        else if(element.msRequestFullscreen)
            element.msRequestFullscreen();
    }

    /* Get out of full screen */
    function GoOutFullscreen() {
        if(document.exitFullscreen)
            document.exitFullscreen();
        else if(document.mozCancelFullScreen)
            document.mozCancelFullScreen();
        else if(document.webkitExitFullscreen)
            document.webkitExitFullscreen();
        else if(document.msExitFullscreen)
            document.msExitFullscreen();
    }

    /* Is currently in full screen or not */
    function IsFullScreenCurrently() {
        var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;

        // If no element is in full-screen
        if(full_screen_element === null)
            return false;
        else
            return true;
    }

    /* Gestion du temp */
    var d1 = new Date ();
    var d2 = new Date ( d1 );
    var duree=parseInt(document.getElementById("duree").textContent);
    d2.setMinutes ( d1.getMinutes() + duree );
    /* Get into full screen */

    $("#go-button").on('click', function() {
            document.getElementById("go-button").style.display = "none";
            document.getElementById("nextBtn").style.display = "inline";
            document.getElementById("firstquestion").style.display = "inline";
            document.getElementById("firstreponse").style.display = "inline";
            document.getElementById("progressbar").style.display = "inline";
            GoInFullscreen($("#element").get(0));
            $('#clock').countdown(d2)
                console.log(d2)
                .on('update.countdown', function(event) {
                    var format = '%H:%M:%S';
                    $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    $(this).html('Temps expiré')
                        .parent().addClass('disabled');
                    var resttime=(document.getElementById("clock").textContent);
                    $("#temps").val(resttime);
                    document.getElementById("regForm").submit();

                });
    });



    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("firstquestion").style.display = "none";
    document.getElementById("firstreponse").style.display = "none";
    document.getElementById("progressbar").style.display = "none";
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
            document.getElementById("regForm").submit();
        }
    }
    /* END Envoyer les donner aprés quitter le plein écran*/



    /*BEGIN  Gestion Form MultiStep*/
    var currentTab = 0; // Current tab is set to be the first tab (0)
    var steps = document.getElementsByClassName("tab").length;
    showTab(currentTab); // Display the current tab
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
            document.getElementById("nextBtn").innerHTML = "Envoyer";
        } else {
            document.getElementById("nextBtn").innerHTML = "Suivante";
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
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function abandonner() {
        var resttime=(document.getElementById("clock").textContent);
        $("#temps").val(resttime);
        document.getElementById("regForm").submit();
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

