@extends('layouts.frontend.app')
@push('css')
@endpush
@section('content')
    <style>
        .section-padding-02 {
            margin-top: 0 !important;
        }

        .h-margin {
            margin-top: 0;
        }

        .section-padding-01 {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .error-page__image {
            margin-top: unset;

        }

        .error-page__content {
            margin-top: unset;
        }

        .header-section {
            display: none;
        }

        .footer-section {
            display: none;
        }

        svg#maintenance_stories-library:not(.animated) .animable {
            opacity: 0;
        }

        svg#maintenance_stories-library.animated #maintenance--background-complete--inject-3 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        svg#maintenance_stories-library.animated #maintenance--Shadow--inject-3 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        svg#maintenance_stories-library.animated #maintenance--character-2--inject-3 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideRight;
            animation-delay: 0s;
        }

        svg#maintenance_stories-library.animated #maintenance--Bookshelf--inject-3 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
            animation-delay: 0s;
        }

        svg#maintenance_stories-library.animated #maintenance--Sign--inject-3 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideRight;
            animation-delay: 0s;
        }

        svg#maintenance_stories-library.animated #maintenance--character-1--inject-3 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideUp;
            animation-delay: 0s;
        }

        svg#maintenance_stories-library.animated #maintenance--Table--inject-3 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideRight {
            0% {
                opacity: 0;
                transform: translateX(30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideLeft {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: inherit;
            }
        }
    </style>
    <main class="">

        <!-- 404 Page Start -->
        <div class="404-page-section section-padding-01">
            <div class="container custom-container">

                <div class="error-page text-center">

                    <div class="error-page__logo">
                        <a href="index-main.html"><img src="/assets/school/images/sd-logo.png" alt="Logo"></a>
                    </div>

                    <div class=" error-page__image">

                        <svg style="max-width: 600px; max-height: 300px" class="animated" id="maintenance_stories-library"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
                            <g id="maintenance--background-complete--inject-3" class="animable"
                                style="transform-origin: 250px 228.205px;">
                                <rect x="416.78" y="398.49" width="33.12" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 433.34px 398.615px;"
                                    id="elx2rlhr7cbqc" class="animable"></rect>
                                <rect x="322.53" y="401.21" width="8.69" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 326.875px 401.335px;"
                                    id="elis8bjhaji5" class="animable"></rect>
                                <rect x="396.59" y="389.21" width="19.19" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 406.185px 389.335px;"
                                    id="elee3abd7kqs" class="animable"></rect>
                                <rect x="52.46" y="390.89" width="43.19" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 74.055px 391.015px;"
                                    id="elzuedfp1phna" class="animable"></rect>
                                <rect x="104.56" y="390.89" width="6.33" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 107.725px 391.015px;"
                                    id="elccc2nr0i31b" class="animable"></rect>
                                <rect x="131.47" y="395.11" width="93.68" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 178.31px 395.235px;"
                                    id="elxet088r328" class="animable"></rect>
                                <path
                                    d="M237,337.8H43.92a5.71,5.71,0,0,1-5.71-5.71V60.66A5.71,5.71,0,0,1,43.92,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.92,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z"
                                    style="fill: rgb(235, 235, 235); transform-origin: 140.46px 196.4px;" id="elxvc9eia2h5i"
                                    class="animable"></path>
                                <path
                                    d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z"
                                    style="fill: rgb(235, 235, 235); transform-origin: 356.75px 196.4px;" id="elvm0lo3klbq"
                                    class="animable"></path>
                                <rect y="382.4" width="500" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 250px 382.525px;" id="elbyc63aatqlj"
                                    class="animable"></rect>
                                <rect x="346.27" y="140.74" width="84.58" height="213.09"
                                    style="fill: rgb(224, 224, 224); transform-origin: 388.56px 247.285px;"
                                    id="eln3hwmy2eexc" class="animable"></rect>
                                <path d="M430.85,138.87V355.7h15.58V138.87Z"
                                    style="fill: rgb(230, 230, 230); transform-origin: 438.64px 247.285px;"
                                    id="elhlgwo4dstjc" class="animable"></path>
                                <path d="M331.44,138.87V355.7H347V138.87Z"
                                    style="fill: rgb(230, 230, 230); transform-origin: 339.22px 247.285px;"
                                    id="elleuftfyh5l8" class="animable"></path>
                                <path
                                    d="M328.79,138.87V355.7H432.72V138.87ZM429,142.61v38.88H332.53V142.61ZM332.53,266.72V227.84H429v38.88ZM429,270.46v38.88H332.53V270.46Zm-96.45-46.35V185.23H429v38.88Zm0,127.85V313.08H429V352Z"
                                    style="fill: rgb(245, 245, 245); transform-origin: 380.755px 247.285px;"
                                    id="el3po2dwm7vku" class="animable"></path>
                                <g id="elfs9p8tio4of">
                                    <rect x="395.29" y="151.68" width="3.59" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 397.085px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elxhnx21vu4hn">
                                    <rect x="398.88" y="151.68" width="3.59" height="30.17"
                                        style="fill: rgb(224, 224, 224); transform-origin: 400.675px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eliq6l3dei7lm">
                                    <rect x="388.1" y="153.8" width="7.19" height="28.05"
                                        style="fill: rgb(230, 230, 230); transform-origin: 391.695px 167.825px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrobd2vxozk">
                                    <rect x="379.85" y="151.68" width="4.65" height="30.17"
                                        style="fill: rgb(240, 240, 240); transform-origin: 382.175px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elyjawifnxlj">
                                    <rect x="384.5" y="151.68" width="3.59" height="30.17"
                                        style="fill: rgb(235, 235, 235); transform-origin: 386.295px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elho63d7d6586">
                                    <rect x="352.59" y="151.68" width="4.65" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 354.915px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrwwmymsz7yq">
                                    <rect x="357.23" y="151.68" width="3.59" height="30.17"
                                        style="fill: rgb(235, 235, 235); transform-origin: 359.025px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elp3dhamtx9be">
                                    <rect x="368.02" y="151.68" width="4.65" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 370.345px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el0bsqqlfp6w0i">
                                    <rect x="372.66" y="151.68" width="3.59" height="30.17"
                                        style="fill: rgb(224, 224, 224); transform-origin: 374.455px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elca28r7lo81u">
                                    <rect x="345.4" y="152.39" width="7.19" height="29.45"
                                        style="fill: rgb(235, 235, 235); transform-origin: 348.995px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8rq86yg9xe">
                                    <rect x="341.8" y="152.39" width="3.6" height="29.45"
                                        style="fill: rgb(224, 224, 224); transform-origin: 343.6px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el6plstescje5">
                                    <rect x="363.23" y="152.39" width="4.79" height="29.45"
                                        style="fill: rgb(224, 224, 224); transform-origin: 365.625px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elzly5n98h5u">
                                    <rect x="360.83" y="152.39" width="2.4" height="29.45"
                                        style="fill: rgb(240, 240, 240); transform-origin: 362.03px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elv0nknnjyga">
                                    <rect x="372.66" y="153.8" width="7.19" height="28.05"
                                        style="fill: rgb(245, 245, 245); transform-origin: 376.255px 167.825px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elq918wl0a6or">
                                    <rect x="413.26" y="151.68" width="4.65" height="30.17"
                                        style="fill: rgb(235, 235, 235); transform-origin: 415.585px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elos1mhtf42q">
                                    <rect x="417.91" y="151.68" width="3.59" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 419.705px 166.765px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elyti02oa3pkb">
                                    <rect x="406.07" y="152.39" width="7.19" height="29.45"
                                        style="fill: rgb(224, 224, 224); transform-origin: 409.665px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el05fut2sevnlu">
                                    <rect x="402.48" y="152.39" width="3.6" height="29.45"
                                        style="fill: rgb(235, 235, 235); transform-origin: 404.28px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrij2q6ef649">
                                    <rect x="423.9" y="152.39" width="4.79" height="29.45"
                                        style="fill: rgb(235, 235, 235); transform-origin: 426.295px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elnqeyemu066h">
                                    <rect x="421.5" y="152.39" width="2.4" height="29.45"
                                        style="fill: rgb(250, 250, 250); transform-origin: 422.7px 167.115px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <rect x="371.61" y="193.92" width="3.59" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 373.405px 209.005px;"
                                    id="elscp3b4kqcak" class="animable"></rect>
                                <rect x="368.02" y="193.92" width="3.59" height="30.17"
                                    style="fill: rgb(224, 224, 224); transform-origin: 369.815px 209.005px;"
                                    id="elpj6jcyokzhs" class="animable"></rect>
                                <rect x="375.21" y="196.04" width="7.19" height="28.05"
                                    style="fill: rgb(230, 230, 230); transform-origin: 378.805px 210.065px;"
                                    id="elzpoi7tyml7p" class="animable"></rect>
                                <rect x="385.99" y="193.92" width="4.65" height="30.17"
                                    style="fill: rgb(240, 240, 240); transform-origin: 388.315px 209.005px;"
                                    id="elnpokfdzemxd" class="animable"></rect>
                                <rect x="382.4" y="193.92" width="3.6" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 384.2px 209.005px;"
                                    id="elm7njfluxnr" class="animable"></rect>
                                <rect x="413.26" y="193.92" width="4.65" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 415.585px 209.005px;"
                                    id="elo9ojlsv4w1" class="animable"></rect>
                                <rect x="409.67" y="193.92" width="3.59" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 411.465px 209.005px;"
                                    id="el2ttc96pm4x3" class="animable"></rect>
                                <rect x="397.83" y="193.92" width="4.65" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 400.155px 209.005px;"
                                    id="elsce6mku9vgf" class="animable"></rect>
                                <rect x="394.23" y="193.92" width="3.59" height="30.17"
                                    style="fill: rgb(224, 224, 224); transform-origin: 396.025px 209.005px;"
                                    id="elmn9fseu5ta" class="animable"></rect>
                                <rect x="417.91" y="194.64" width="7.19" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 421.505px 209.365px;"
                                    id="elcem0nv7fcac" class="animable"></rect>
                                <rect x="425.1" y="194.64" width="3.6" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 426.9px 209.365px;"
                                    id="el531scaps8hi" class="animable"></rect>
                                <rect x="402.48" y="194.64" width="4.79" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 404.875px 209.365px;"
                                    id="elz8p9ehj02s" class="animable"></rect>
                                <rect x="407.27" y="194.64" width="2.4" height="29.45"
                                    style="fill: rgb(240, 240, 240); transform-origin: 408.47px 209.365px;"
                                    id="eltmhlq5scc97" class="animable"></rect>
                                <rect x="390.64" y="196.04" width="7.19" height="28.05"
                                    style="fill: rgb(245, 245, 245); transform-origin: 394.235px 210.065px;"
                                    id="eltlogj2iowgr" class="animable"></rect>
                                <rect x="352.59" y="193.92" width="4.65" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 354.915px 209.005px;"
                                    id="elc57sk4udlfo" class="animable"></rect>
                                <rect x="348.99" y="193.92" width="3.59" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 350.785px 209.005px;"
                                    id="elfdz1c9y8xp4" class="animable"></rect>
                                <rect x="357.23" y="194.64" width="7.19" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 360.825px 209.365px;"
                                    id="el6i34sddo14k" class="animable"></rect>
                                <rect x="364.42" y="194.64" width="3.6" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 366.22px 209.365px;"
                                    id="elp33lpfpoe2i" class="animable"></rect>
                                <rect x="341.8" y="194.64" width="4.79" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 344.195px 209.365px;"
                                    id="elwd1iuerf8a" class="animable"></rect>
                                <rect x="346.6" y="194.64" width="2.4" height="29.45"
                                    style="fill: rgb(250, 250, 250); transform-origin: 347.8px 209.365px;"
                                    id="elqyoo9gjr3f" class="animable"></rect>
                                <rect x="371.61" y="236.91" width="3.59" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 373.405px 251.995px;"
                                    id="elrmbt5slne0r" class="animable"></rect>
                                <rect x="368.02" y="236.91" width="3.59" height="30.17"
                                    style="fill: rgb(224, 224, 224); transform-origin: 369.815px 251.995px;"
                                    id="elmlrra7mzhog" class="animable"></rect>
                                <rect x="375.21" y="239.03" width="7.19" height="28.05"
                                    style="fill: rgb(230, 230, 230); transform-origin: 378.805px 253.055px;"
                                    id="elv3agn6ooa1a" class="animable"></rect>
                                <rect x="385.99" y="236.91" width="4.65" height="30.17"
                                    style="fill: rgb(240, 240, 240); transform-origin: 388.315px 251.995px;"
                                    id="el28cvy8h30o1" class="animable"></rect>
                                <rect x="382.4" y="236.91" width="3.6" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 384.2px 251.995px;"
                                    id="elgffz25j95ws" class="animable"></rect>
                                <rect x="413.26" y="236.91" width="4.65" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 415.585px 251.995px;"
                                    id="elt3pgt0e9ag" class="animable"></rect>
                                <rect x="409.67" y="236.91" width="3.59" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 411.465px 251.995px;"
                                    id="el2pyn4k5juwq" class="animable"></rect>
                                <rect x="397.83" y="236.91" width="4.65" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 400.155px 251.995px;"
                                    id="elpwiq65548v8" class="animable"></rect>
                                <rect x="394.23" y="236.91" width="3.59" height="30.17"
                                    style="fill: rgb(224, 224, 224); transform-origin: 396.025px 251.995px;"
                                    id="elmtl5y1erwj" class="animable"></rect>
                                <rect x="417.91" y="237.63" width="7.19" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 421.505px 252.355px;"
                                    id="elv9dkcjofvt" class="animable"></rect>
                                <rect x="425.1" y="237.63" width="3.6" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 426.9px 252.355px;"
                                    id="el1vgbabl2xgy" class="animable"></rect>
                                <rect x="402.48" y="237.63" width="4.79" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 404.875px 252.355px;"
                                    id="elxl3e0k4gbsm" class="animable"></rect>
                                <rect x="407.27" y="237.63" width="2.4" height="29.45"
                                    style="fill: rgb(240, 240, 240); transform-origin: 408.47px 252.355px;"
                                    id="el6txfn94adbm" class="animable"></rect>
                                <rect x="390.64" y="239.03" width="7.19" height="28.05"
                                    style="fill: rgb(245, 245, 245); transform-origin: 394.235px 253.055px;"
                                    id="el70136q7my3" class="animable"></rect>
                                <rect x="352.59" y="236.91" width="4.65" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 354.915px 251.995px;"
                                    id="elrz9eaq9l45" class="animable"></rect>
                                <rect x="348.99" y="236.91" width="3.59" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 350.785px 251.995px;"
                                    id="elt0unc0g939" class="animable"></rect>
                                <rect x="357.23" y="237.63" width="7.19" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 360.825px 252.355px;"
                                    id="el4oj86m6dww" class="animable"></rect>
                                <rect x="364.42" y="237.63" width="3.6" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 366.22px 252.355px;"
                                    id="el1vw5tgp3yer" class="animable"></rect>
                                <rect x="341.8" y="237.63" width="4.79" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 344.195px 252.355px;"
                                    id="el444hk1cjnkc" class="animable"></rect>
                                <rect x="346.6" y="237.63" width="2.4" height="29.45"
                                    style="fill: rgb(250, 250, 250); transform-origin: 347.8px 252.355px;"
                                    id="el7titqohie1k" class="animable"></rect>
                                <g id="el1ey6hzvdzgn">
                                    <rect x="395.29" y="279.91" width="3.59" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 397.085px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elxqr404kzqwk">
                                    <rect x="398.88" y="279.91" width="3.59" height="30.17"
                                        style="fill: rgb(224, 224, 224); transform-origin: 400.675px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elkl038kdb1jc">
                                    <rect x="388.1" y="279.91" width="7.19" height="28.05"
                                        style="fill: rgb(230, 230, 230); transform-origin: 391.695px 293.935px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elt09mdivhp1">
                                    <rect x="379.85" y="279.91" width="4.65" height="30.17"
                                        style="fill: rgb(240, 240, 240); transform-origin: 382.175px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elkn2yjnjhn4r">
                                    <rect x="384.5" y="279.91" width="3.59" height="30.17"
                                        style="fill: rgb(235, 235, 235); transform-origin: 386.295px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elxj9a80xwm8">
                                    <rect x="352.59" y="279.91" width="4.65" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 354.915px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elbru363pwcoh">
                                    <rect x="357.23" y="279.91" width="3.59" height="30.17"
                                        style="fill: rgb(235, 235, 235); transform-origin: 359.025px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elw6hagb97iuf">
                                    <rect x="368.02" y="279.91" width="4.65" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 370.345px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el1t2w2qzrk8c">
                                    <rect x="372.66" y="279.91" width="3.59" height="30.17"
                                        style="fill: rgb(224, 224, 224); transform-origin: 374.455px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el2pyusrumznq">
                                    <rect x="345.4" y="279.91" width="7.19" height="29.45"
                                        style="fill: rgb(235, 235, 235); transform-origin: 348.995px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elqqziju8k648">
                                    <rect x="341.8" y="279.91" width="3.6" height="29.45"
                                        style="fill: rgb(224, 224, 224); transform-origin: 343.6px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="ellfskzt2842">
                                    <rect x="363.23" y="279.91" width="4.79" height="29.45"
                                        style="fill: rgb(224, 224, 224); transform-origin: 365.625px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8ngbojyst1v">
                                    <rect x="360.83" y="279.91" width="2.4" height="29.45"
                                        style="fill: rgb(240, 240, 240); transform-origin: 362.03px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elcpj7zn2aptq">
                                    <rect x="372.66" y="279.91" width="7.19" height="28.05"
                                        style="fill: rgb(245, 245, 245); transform-origin: 376.255px 293.935px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8lety3szs7a">
                                    <rect x="413.26" y="279.91" width="4.65" height="30.17"
                                        style="fill: rgb(235, 235, 235); transform-origin: 415.585px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elo343n7ds8w">
                                    <rect x="417.91" y="279.91" width="3.59" height="30.17"
                                        style="fill: rgb(230, 230, 230); transform-origin: 419.705px 294.995px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elxju6fbxmui">
                                    <rect x="406.07" y="279.91" width="7.19" height="29.45"
                                        style="fill: rgb(224, 224, 224); transform-origin: 409.665px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eldezq0voh4u8">
                                    <rect x="402.48" y="279.91" width="3.6" height="29.45"
                                        style="fill: rgb(235, 235, 235); transform-origin: 404.28px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elt0sli6tsj0q">
                                    <rect x="423.9" y="279.91" width="4.79" height="29.45"
                                        style="fill: rgb(235, 235, 235); transform-origin: 426.295px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elqs8l3b1k9kl">
                                    <rect x="421.5" y="279.91" width="2.4" height="29.45"
                                        style="fill: rgb(250, 250, 250); transform-origin: 422.7px 294.635px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <rect x="371.61" y="322.9" width="3.59" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 373.405px 337.985px;"
                                    id="eloqaojooxyc" class="animable"></rect>
                                <rect x="368.02" y="322.9" width="3.59" height="30.17"
                                    style="fill: rgb(224, 224, 224); transform-origin: 369.815px 337.985px;"
                                    id="el0nqk44jviyx" class="animable"></rect>
                                <rect x="375.21" y="322.9" width="7.19" height="28.05"
                                    style="fill: rgb(230, 230, 230); transform-origin: 378.805px 336.925px;"
                                    id="el18xo0e0t0ix" class="animable"></rect>
                                <rect x="385.99" y="322.9" width="4.65" height="30.17"
                                    style="fill: rgb(240, 240, 240); transform-origin: 388.315px 337.985px;"
                                    id="el2d26rahtip9" class="animable"></rect>
                                <rect x="382.4" y="322.9" width="3.6" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 384.2px 337.985px;"
                                    id="elp78bnqgkdro" class="animable"></rect>
                                <rect x="413.26" y="322.9" width="4.65" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 415.585px 337.985px;"
                                    id="elt4pa03lz4x" class="animable"></rect>
                                <rect x="409.67" y="322.9" width="3.59" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 411.465px 337.985px;"
                                    id="elj75h2fp1uo" class="animable"></rect>
                                <rect x="397.83" y="322.9" width="4.65" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 400.155px 337.985px;"
                                    id="elusi0ulcfiwi" class="animable"></rect>
                                <rect x="394.23" y="322.9" width="3.59" height="30.17"
                                    style="fill: rgb(224, 224, 224); transform-origin: 396.025px 337.985px;"
                                    id="el2hu362coco" class="animable"></rect>
                                <rect x="417.91" y="322.9" width="7.19" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 421.505px 337.625px;"
                                    id="eltzvwq2bszk" class="animable"></rect>
                                <rect x="425.1" y="322.9" width="3.6" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 426.9px 337.625px;"
                                    id="elnyj62ong2x" class="animable"></rect>
                                <rect x="402.48" y="322.9" width="4.79" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 404.875px 337.625px;"
                                    id="el2mg3531qgp7" class="animable"></rect>
                                <rect x="407.27" y="322.9" width="2.4" height="29.45"
                                    style="fill: rgb(240, 240, 240); transform-origin: 408.47px 337.625px;"
                                    id="elv5s47uz2ra" class="animable"></rect>
                                <rect x="390.64" y="322.9" width="7.19" height="28.05"
                                    style="fill: rgb(245, 245, 245); transform-origin: 394.235px 336.925px;"
                                    id="elj4r3838rkrt" class="animable"></rect>
                                <rect x="352.59" y="322.9" width="4.65" height="30.17"
                                    style="fill: rgb(235, 235, 235); transform-origin: 354.915px 337.985px;"
                                    id="elxwme59qzxto" class="animable"></rect>
                                <rect x="348.99" y="322.9" width="3.59" height="30.17"
                                    style="fill: rgb(230, 230, 230); transform-origin: 350.785px 337.985px;"
                                    id="elftiuanfpo4i" class="animable"></rect>
                                <rect x="357.23" y="322.9" width="7.19" height="29.45"
                                    style="fill: rgb(224, 224, 224); transform-origin: 360.825px 337.625px;"
                                    id="elcp19mrsaa5q" class="animable"></rect>
                                <rect x="364.42" y="322.9" width="3.6" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 366.22px 337.625px;"
                                    id="elupigjp748mh" class="animable"></rect>
                                <rect x="341.8" y="322.9" width="4.79" height="29.45"
                                    style="fill: rgb(235, 235, 235); transform-origin: 344.195px 337.625px;"
                                    id="elx1imfngppic" class="animable"></rect>
                                <rect x="346.6" y="322.9" width="2.4" height="29.45"
                                    style="fill: rgb(250, 250, 250); transform-origin: 347.8px 337.625px;"
                                    id="eldake0q1fmzl" class="animable"></rect>
                                <rect x="365.66" y="100.6" width="63.13" height="20.9"
                                    style="fill: rgb(230, 230, 230); transform-origin: 397.225px 111.05px;"
                                    id="elihqbrfo2tr" class="animable"></rect>
                                <rect x="365.72" y="55.2" width="1" height="45.4"
                                    style="fill: rgb(230, 230, 230); transform-origin: 366.22px 77.9px;"
                                    id="elnp4yl8uocuf" class="animable"></rect>
                                <rect x="427.69" y="55.2" width="1" height="45.4"
                                    style="fill: rgb(230, 230, 230); transform-origin: 428.19px 77.9px;" id="eleq6hh468ve"
                                    class="animable"></rect>
                                <rect x="230.64" y="129.35" width="96.85" height="244"
                                    style="fill: rgb(224, 224, 224); transform-origin: 279.065px 251.35px;"
                                    id="el6cfkw3ymjcp" class="animable"></rect>
                                <path d="M327.49,127.21V375.49h17.84V127.21Z"
                                    style="fill: rgb(230, 230, 230); transform-origin: 336.41px 251.35px;"
                                    id="elsylppj3a6l8" class="animable"></path>
                                <path d="M213.65,127.21V375.49H231.5V127.21Z"
                                    style="fill: rgb(230, 230, 230); transform-origin: 222.575px 251.35px;"
                                    id="el3g61hrubbr3" class="animable"></path>
                                <path
                                    d="M210.62,127.21V375.49h119V127.21Zm114.73,4.28V176H214.9V131.49ZM214.9,273.61V229.09H325.35v44.52Zm110.45,4.28v44.52H214.9V277.89ZM214.9,224.81V180.29H325.35v44.52Zm0,146.4V326.69H325.35v44.52Z"
                                    style="fill: rgb(245, 245, 245); transform-origin: 270.12px 251.35px;"
                                    id="elt56jft5zn6" class="animable"></path>
                                <g id="elm59ynryuv6s">
                                    <rect x="286.76" y="141.87" width="4.12" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 288.82px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elt0depl6iv69">
                                    <rect x="290.88" y="141.87" width="4.12" height="34.54"
                                        style="fill: rgb(224, 224, 224); transform-origin: 292.94px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eldxhw38pingn">
                                    <rect x="278.53" y="144.3" width="8.23" height="32.12"
                                        style="fill: rgb(230, 230, 230); transform-origin: 282.645px 160.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el3d7cihadxhl">
                                    <rect x="269.09" y="141.87" width="5.32" height="34.54"
                                        style="fill: rgb(240, 240, 240); transform-origin: 271.75px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eluho1trxger">
                                    <rect x="274.41" y="141.87" width="4.12" height="34.54"
                                        style="fill: rgb(235, 235, 235); transform-origin: 276.47px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elc1n16mx57xs">
                                    <rect x="237.87" y="141.87" width="5.32" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 240.53px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el29cn1axaxh1">
                                    <rect x="243.19" y="141.87" width="4.12" height="34.54"
                                        style="fill: rgb(235, 235, 235); transform-origin: 245.25px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elhvtmjfwofiu">
                                    <rect x="255.54" y="141.87" width="5.32" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 258.2px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el2ttzqy5x2g2">
                                    <rect x="260.86" y="141.87" width="4.12" height="34.54"
                                        style="fill: rgb(224, 224, 224); transform-origin: 262.92px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elp7au72p73an">
                                    <rect x="229.64" y="142.69" width="8.23" height="33.73"
                                        style="fill: rgb(235, 235, 235); transform-origin: 233.755px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elfkhuum5xat">
                                    <rect x="225.52" y="142.69" width="4.12" height="33.73"
                                        style="fill: rgb(224, 224, 224); transform-origin: 227.58px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el3j6egb2vgbl">
                                    <rect x="250.05" y="142.69" width="5.49" height="33.73"
                                        style="fill: rgb(224, 224, 224); transform-origin: 252.795px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elazu5uoqjdr7">
                                    <rect x="247.31" y="142.69" width="2.74" height="33.73"
                                        style="fill: rgb(240, 240, 240); transform-origin: 248.68px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrc0225isbfi">
                                    <rect x="260.86" y="144.3" width="8.23" height="32.12"
                                        style="fill: rgb(245, 245, 245); transform-origin: 264.975px 160.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elt7kjd31ora">
                                    <rect x="307.34" y="141.87" width="5.32" height="34.54"
                                        style="fill: rgb(235, 235, 235); transform-origin: 310px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eltxqfbnxqbi9">
                                    <rect x="312.66" y="141.87" width="4.12" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 314.72px 159.14px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elgmswrteku8c">
                                    <rect x="299.11" y="142.69" width="8.23" height="33.73"
                                        style="fill: rgb(224, 224, 224); transform-origin: 303.225px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elke7mnpssb6">
                                    <rect x="294.99" y="142.69" width="4.12" height="33.73"
                                        style="fill: rgb(235, 235, 235); transform-origin: 297.05px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eld3aduabrob5">
                                    <rect x="319.52" y="142.69" width="5.49" height="33.73"
                                        style="fill: rgb(235, 235, 235); transform-origin: 322.265px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el70tskai64bv">
                                    <rect x="316.78" y="142.69" width="2.74" height="33.73"
                                        style="fill: rgb(250, 250, 250); transform-origin: 318.15px 159.555px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <rect x="259.66" y="190.24" width="4.12" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 261.72px 207.51px;"
                                    id="elz0piqbjnk2a" class="animable"></rect>
                                <rect x="255.54" y="190.24" width="4.12" height="34.54"
                                    style="fill: rgb(224, 224, 224); transform-origin: 257.6px 207.51px;"
                                    id="eltj3ml10zh2d" class="animable"></rect>
                                <rect x="263.77" y="192.67" width="8.23" height="32.12"
                                    style="fill: rgb(230, 230, 230); transform-origin: 267.885px 208.73px;"
                                    id="elgarwkrvjfzw" class="animable"></rect>
                                <rect x="276.12" y="190.24" width="5.32" height="34.54"
                                    style="fill: rgb(240, 240, 240); transform-origin: 278.78px 207.51px;"
                                    id="elk63q79e318h" class="animable"></rect>
                                <rect x="272.01" y="190.24" width="4.12" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 274.07px 207.51px;"
                                    id="eleuqnk81t0ee" class="animable"></rect>
                                <rect x="307.34" y="190.24" width="5.32" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 310px 207.51px;" id="elf2hyhvv97z8"
                                    class="animable"></rect>
                                <rect x="303.23" y="190.24" width="4.12" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 305.29px 207.51px;"
                                    id="elfk48f9x4o7f" class="animable"></rect>
                                <rect x="289.67" y="190.24" width="5.32" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 292.33px 207.51px;"
                                    id="elzz58cgt48mo" class="animable"></rect>
                                <rect x="285.56" y="190.24" width="4.12" height="34.54"
                                    style="fill: rgb(224, 224, 224); transform-origin: 287.62px 207.51px;"
                                    id="eli8q3d6wx3k9" class="animable"></rect>
                                <rect x="312.66" y="191.06" width="8.23" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 316.775px 207.925px;"
                                    id="elyz96le4xxi" class="animable"></rect>
                                <rect x="320.9" y="191.06" width="4.12" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 322.96px 207.925px;"
                                    id="elol6l9kkwiyh" class="animable"></rect>
                                <rect x="294.99" y="191.06" width="5.49" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 297.735px 207.925px;"
                                    id="elm3vephujcxn" class="animable"></rect>
                                <rect x="300.48" y="191.06" width="2.74" height="33.73"
                                    style="fill: rgb(240, 240, 240); transform-origin: 301.85px 207.925px;"
                                    id="elchin5n54lar" class="animable"></rect>
                                <rect x="281.44" y="192.67" width="8.23" height="32.12"
                                    style="fill: rgb(245, 245, 245); transform-origin: 285.555px 208.73px;"
                                    id="eldyj9i04fmzb" class="animable"></rect>
                                <rect x="237.87" y="190.24" width="5.32" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 240.53px 207.51px;"
                                    id="el677kholj3oh" class="animable"></rect>
                                <rect x="233.75" y="190.24" width="4.12" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 235.81px 207.51px;"
                                    id="el34sqy7t6zc4" class="animable"></rect>
                                <rect x="243.19" y="191.06" width="8.23" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 247.305px 207.925px;"
                                    id="el8ta16g717zv" class="animable"></rect>
                                <rect x="251.42" y="191.06" width="4.12" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 253.48px 207.925px;"
                                    id="elhmbjo6bor7j" class="animable"></rect>
                                <rect x="225.52" y="191.06" width="5.49" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 228.265px 207.925px;"
                                    id="elzmlfyeau9e" class="animable"></rect>
                                <rect x="231.01" y="191.06" width="2.74" height="33.73"
                                    style="fill: rgb(250, 250, 250); transform-origin: 232.38px 207.925px;"
                                    id="eln5ay3c9fbc" class="animable"></rect>
                                <rect x="259.66" y="239.47" width="4.12" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 261.72px 256.74px;"
                                    id="elr0o1wab7i5d" class="animable"></rect>
                                <rect x="255.54" y="239.47" width="4.12" height="34.54"
                                    style="fill: rgb(224, 224, 224); transform-origin: 257.6px 256.74px;"
                                    id="el67gihqhmaej" class="animable"></rect>
                                <rect x="263.77" y="241.9" width="8.23" height="32.12"
                                    style="fill: rgb(230, 230, 230); transform-origin: 267.885px 257.96px;"
                                    id="elxajrcq6ag" class="animable"></rect>
                                <rect x="276.12" y="239.47" width="5.32" height="34.54"
                                    style="fill: rgb(240, 240, 240); transform-origin: 278.78px 256.74px;"
                                    id="elb9ow4ggcuw" class="animable"></rect>
                                <rect x="272.01" y="239.47" width="4.12" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 274.07px 256.74px;"
                                    id="elxqs85dgr1ql" class="animable"></rect>
                                <rect x="307.34" y="239.47" width="5.32" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 310px 256.74px;" id="el520ysncmdv8"
                                    class="animable"></rect>
                                <rect x="303.23" y="239.47" width="4.12" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 305.29px 256.74px;"
                                    id="elzgq4v42w3d" class="animable"></rect>
                                <rect x="289.67" y="239.47" width="5.32" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 292.33px 256.74px;"
                                    id="elshrf01y8if" class="animable"></rect>
                                <rect x="285.56" y="239.47" width="4.12" height="34.54"
                                    style="fill: rgb(224, 224, 224); transform-origin: 287.62px 256.74px;"
                                    id="el8j2m2bni3vf" class="animable"></rect>
                                <rect x="312.66" y="240.29" width="8.23" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 316.775px 257.155px;"
                                    id="elpbxouqyvcw" class="animable"></rect>
                                <rect x="320.9" y="240.29" width="4.12" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 322.96px 257.155px;"
                                    id="eld4ip9fv1ae" class="animable"></rect>
                                <rect x="294.99" y="240.29" width="5.49" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 297.735px 257.155px;"
                                    id="el3ymk2mn6qug" class="animable"></rect>
                                <rect x="300.48" y="240.29" width="2.74" height="33.73"
                                    style="fill: rgb(240, 240, 240); transform-origin: 301.85px 257.155px;"
                                    id="elzpbvr1151x" class="animable"></rect>
                                <rect x="281.44" y="241.9" width="8.23" height="32.12"
                                    style="fill: rgb(245, 245, 245); transform-origin: 285.555px 257.96px;"
                                    id="el8iwqshkxwnk" class="animable"></rect>
                                <rect x="237.87" y="239.47" width="5.32" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 240.53px 256.74px;"
                                    id="eloz2lvyqmx1d" class="animable"></rect>
                                <rect x="233.75" y="239.47" width="4.12" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 235.81px 256.74px;"
                                    id="el2mfwru24x3p" class="animable"></rect>
                                <rect x="243.19" y="240.29" width="8.23" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 247.305px 257.155px;"
                                    id="elnk9yr55by7" class="animable"></rect>
                                <rect x="251.42" y="240.29" width="4.12" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 253.48px 257.155px;"
                                    id="el1tg0099addg" class="animable"></rect>
                                <rect x="225.52" y="240.29" width="5.49" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 228.265px 257.155px;"
                                    id="elngxz4isndbr" class="animable"></rect>
                                <rect x="231.01" y="240.29" width="2.74" height="33.73"
                                    style="fill: rgb(250, 250, 250); transform-origin: 232.38px 257.155px;"
                                    id="elc8ee5azh11k" class="animable"></rect>
                                <g id="el5fqp3719drj">
                                    <rect x="286.76" y="288.7" width="4.12" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 288.82px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eld8dprxg4djk">
                                    <rect x="290.88" y="288.7" width="4.12" height="34.54"
                                        style="fill: rgb(224, 224, 224); transform-origin: 292.94px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8bryn7swqwv">
                                    <rect x="278.53" y="288.7" width="8.23" height="32.12"
                                        style="fill: rgb(230, 230, 230); transform-origin: 282.645px 304.76px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8aglcdekntx">
                                    <rect x="269.09" y="288.7" width="5.32" height="34.54"
                                        style="fill: rgb(240, 240, 240); transform-origin: 271.75px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elurd8n4k724g">
                                    <rect x="274.41" y="288.7" width="4.12" height="34.54"
                                        style="fill: rgb(235, 235, 235); transform-origin: 276.47px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elzylxzqahktr">
                                    <rect x="237.87" y="288.7" width="5.32" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 240.53px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el1zlpappjry8">
                                    <rect x="243.19" y="288.7" width="4.12" height="34.54"
                                        style="fill: rgb(235, 235, 235); transform-origin: 245.25px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elxvj2meqqzhh">
                                    <rect x="255.54" y="288.7" width="5.32" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 258.2px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elkru983sjghm">
                                    <rect x="260.86" y="288.7" width="4.12" height="34.54"
                                        style="fill: rgb(224, 224, 224); transform-origin: 262.92px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elq39uc0azed">
                                    <rect x="229.64" y="288.7" width="8.23" height="33.73"
                                        style="fill: rgb(235, 235, 235); transform-origin: 233.755px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elzdv9evmwcrb">
                                    <rect x="225.52" y="288.7" width="4.12" height="33.73"
                                        style="fill: rgb(224, 224, 224); transform-origin: 227.58px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elcpd7d57eapd">
                                    <rect x="250.05" y="288.7" width="5.49" height="33.73"
                                        style="fill: rgb(224, 224, 224); transform-origin: 252.795px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el0urmpdltyv1">
                                    <rect x="247.31" y="288.7" width="2.74" height="33.73"
                                        style="fill: rgb(240, 240, 240); transform-origin: 248.68px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elkajumkrgkd">
                                    <rect x="260.86" y="288.7" width="8.23" height="32.12"
                                        style="fill: rgb(245, 245, 245); transform-origin: 264.975px 304.76px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="ellzjzuhkldws">
                                    <rect x="307.34" y="288.7" width="5.32" height="34.54"
                                        style="fill: rgb(235, 235, 235); transform-origin: 310px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elns7egvzar1g">
                                    <rect x="312.66" y="288.7" width="4.12" height="34.54"
                                        style="fill: rgb(230, 230, 230); transform-origin: 314.72px 305.97px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el6a2ovok9tgg">
                                    <rect x="299.11" y="288.7" width="8.23" height="33.73"
                                        style="fill: rgb(224, 224, 224); transform-origin: 303.225px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el12box706nu8h">
                                    <rect x="294.99" y="288.7" width="4.12" height="33.73"
                                        style="fill: rgb(235, 235, 235); transform-origin: 297.05px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elnieb41y3mq">
                                    <rect x="319.52" y="288.7" width="5.49" height="33.73"
                                        style="fill: rgb(235, 235, 235); transform-origin: 322.265px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el79w9jasd5ur">
                                    <rect x="316.78" y="288.7" width="2.74" height="33.73"
                                        style="fill: rgb(250, 250, 250); transform-origin: 318.15px 305.565px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <rect x="259.66" y="337.93" width="4.12" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 261.72px 355.2px;"
                                    id="elj5odqr9ro2f" class="animable"></rect>
                                <rect x="255.54" y="337.93" width="4.12" height="34.54"
                                    style="fill: rgb(224, 224, 224); transform-origin: 257.6px 355.2px;"
                                    id="elfk6ee6zppe8" class="animable"></rect>
                                <rect x="263.77" y="337.93" width="8.23" height="32.12"
                                    style="fill: rgb(230, 230, 230); transform-origin: 267.885px 353.99px;"
                                    id="elx9k8pvdz1hl" class="animable"></rect>
                                <rect x="276.12" y="337.93" width="5.32" height="34.54"
                                    style="fill: rgb(240, 240, 240); transform-origin: 278.78px 355.2px;"
                                    id="elc9oz03g8fw4" class="animable"></rect>
                                <rect x="272.01" y="337.93" width="4.12" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 274.07px 355.2px;"
                                    id="elaf93i886l2d" class="animable"></rect>
                                <rect x="307.34" y="337.93" width="5.32" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 310px 355.2px;"
                                    id="elk1gziejp1oh" class="animable"></rect>
                                <rect x="303.23" y="337.93" width="4.12" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 305.29px 355.2px;"
                                    id="elij5nghmcpzj" class="animable"></rect>
                                <rect x="289.67" y="337.93" width="5.32" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 292.33px 355.2px;"
                                    id="elalrf349l0n8" class="animable"></rect>
                                <rect x="285.56" y="337.93" width="4.12" height="34.54"
                                    style="fill: rgb(224, 224, 224); transform-origin: 287.62px 355.2px;"
                                    id="el0y6ebif68v4q" class="animable"></rect>
                                <rect x="312.66" y="337.93" width="8.23" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 316.775px 354.795px;"
                                    id="eliysh7pe8p1b" class="animable"></rect>
                                <rect x="320.9" y="337.93" width="4.12" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 322.96px 354.795px;"
                                    id="el64a2bmknew" class="animable"></rect>
                                <rect x="294.99" y="337.93" width="5.49" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 297.735px 354.795px;"
                                    id="elm0zi63rdjqh" class="animable"></rect>
                                <rect x="300.48" y="337.93" width="2.74" height="33.73"
                                    style="fill: rgb(240, 240, 240); transform-origin: 301.85px 354.795px;"
                                    id="elcjt3t2b744" class="animable"></rect>
                                <rect x="281.44" y="337.93" width="8.23" height="32.12"
                                    style="fill: rgb(245, 245, 245); transform-origin: 285.555px 353.99px;"
                                    id="el88u6p2w2prx" class="animable"></rect>
                                <rect x="237.87" y="337.93" width="5.32" height="34.54"
                                    style="fill: rgb(235, 235, 235); transform-origin: 240.53px 355.2px;"
                                    id="els4hlb861syf" class="animable"></rect>
                                <rect x="233.75" y="337.93" width="4.12" height="34.54"
                                    style="fill: rgb(230, 230, 230); transform-origin: 235.81px 355.2px;"
                                    id="el3rayyk4kzpq" class="animable"></rect>
                                <rect x="243.19" y="337.93" width="8.23" height="33.73"
                                    style="fill: rgb(224, 224, 224); transform-origin: 247.305px 354.795px;"
                                    id="el7ayvkpstitg" class="animable"></rect>
                                <rect x="251.42" y="337.93" width="4.12" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 253.48px 354.795px;"
                                    id="elg1hueviwid6" class="animable"></rect>
                                <rect x="225.52" y="337.93" width="5.49" height="33.73"
                                    style="fill: rgb(235, 235, 235); transform-origin: 228.265px 354.795px;"
                                    id="elaztostipfbw" class="animable"></rect>
                                <rect x="231.01" y="337.93" width="2.74" height="33.73"
                                    style="fill: rgb(250, 250, 250); transform-origin: 232.38px 354.795px;"
                                    id="elqcxoe3lpumk" class="animable"></rect>
                                <rect x="237.79" y="83.39" width="72.29" height="23.93"
                                    style="fill: rgb(230, 230, 230); transform-origin: 273.935px 95.355px;"
                                    id="el2mj6yo0z6ca" class="animable"></rect>
                                <rect x="237.93" y="55.2" width="1" height="28.18"
                                    style="fill: rgb(230, 230, 230); transform-origin: 238.43px 69.29px;"
                                    id="elcoy4bnqri9n" class="animable"></rect>
                                <rect x="308.96" y="54.95" width="1" height="28.43"
                                    style="fill: rgb(230, 230, 230); transform-origin: 309.46px 69.165px;"
                                    id="elqep5gbb2luk" class="animable"></rect>
                            </g>
                            <g id="maintenance--Shadow--inject-3" class="animable"
                                style="transform-origin: 245.18px 412.39px;">
                                <ellipse id="maintenance--path--inject-3" cx="245.18" cy="412.39"
                                    rx="193.89" ry="11.32"
                                    style="fill: rgb(245, 245, 245); transform-origin: 245.18px 412.39px;"
                                    class="animable"></ellipse>
                            </g>
                            <g id="maintenance--character-2--inject-3" class="animable"
                                style="transform-origin: 392.273px 297.98px;">
                                <path
                                    d="M415.54,340.74h5.61l9.63,65.4c.24,1.68-1.06,2.34-2.75,2.34h0c-1.38,0-2.54-.17-2.75-1.53Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 423.174px 374.61px;"
                                    id="elk5u82er39y" class="animable"></path>
                                <g id="el30j22epzt6p">
                                    <path
                                        d="M415.54,340.74h5.61l9.63,65.4c.24,1.68-1.06,2.34-2.75,2.34h0c-1.38,0-2.54-.17-2.75-1.53Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 423.174px 374.61px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M397.76,340.74h5.61l4.83,65.58c.12,1.62-1.16,2.16-2.79,2.16h0c-1.46,0-2.68-.29-2.79-1.75Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 402.984px 374.61px;"
                                    id="el1lux35jhpgl" class="animable"></path>
                                <g id="eljesccpeylxf">
                                    <path
                                        d="M397.76,340.74h5.61l4.83,65.58c.12,1.62-1.16,2.16-2.79,2.16h0c-1.46,0-2.68-.29-2.79-1.75Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 402.984px 374.61px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M384.46,340.74h-5.61L374,406.32c-.12,1.62,1.17,2.16,2.79,2.16h0c1.47,0,2.68-.29,2.79-1.75Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 379.226px 374.61px;"
                                    id="el7h3wpd133at" class="animable"></path>
                                <g id="elmn78fc02gl8">
                                    <path
                                        d="M384.46,340.74h-5.61L374,406.32c-.12,1.62,1.17,2.16,2.79,2.16h0c1.47,0,2.68-.29,2.79-1.75Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 379.226px 374.61px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M366.69,340.74h-5.61l-9.63,65.4c-.25,1.68,1.05,2.34,2.74,2.34h0c1.38,0,2.55-.17,2.75-1.53Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 359.055px 374.61px;"
                                    id="elac5sdd0y9gu" class="animable"></path>
                                <g id="elb8032lvb37w">
                                    <path
                                        d="M366.69,340.74h-5.61l-9.63,65.4c-.25,1.68,1.05,2.34,2.74,2.34h0c1.38,0,2.55-.17,2.75-1.53Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 359.055px 374.61px;"
                                        class="animable"></path>
                                </g>
                                <path d="M406.14,265.27l-23.38,71.32H433.9l8.84-75.14H411.42A5.55,5.55,0,0,0,406.14,265.27Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 412.75px 299.02px;"
                                    id="el8vkfrkq1wyn" class="animable"></path>
                                <g id="elyvdi4ffusq">
                                    <path
                                        d="M406.14,265.27l-23.38,71.32H433.9l8.84-75.14H411.42A5.55,5.55,0,0,0,406.14,265.27Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 412.75px 299.02px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M398.13,330.87H347.48a4.23,4.23,0,0,0-4.23,4.24v2.95a4.23,4.23,0,0,0,4.23,4.24h50.65Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 370.69px 336.585px;"
                                    id="el2m7mvsm1jq5" class="animable"></path>
                                <g id="eloevmqlmulug">
                                    <path
                                        d="M398.13,330.87H347.48a4.23,4.23,0,0,0-4.23,4.24v2.95a4.23,4.23,0,0,0,4.23,4.24h50.65Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 370.69px 336.585px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M438.47,265.62l-6.6,57.29a9,9,0,0,1-8.93,8h-35.3a4.23,4.23,0,0,0-4.23,4.24v2.95a4.23,4.23,0,0,0,4.23,4.24h42.74a9,9,0,0,0,8.95-8.11l7.19-72.74h-3.37A4.71,4.71,0,0,0,438.47,265.62Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 414.965px 301.915px;"
                                    id="elimd7qodbele" class="animable"></path>
                                <g id="el52sq0f4zqeh">
                                    <path
                                        d="M438.47,265.62l-6.6,57.29a9,9,0,0,1-8.93,8h-35.3a4.23,4.23,0,0,0-4.23,4.24v2.95a4.23,4.23,0,0,0,4.23,4.24h42.74a9,9,0,0,0,8.95-8.11l7.19-72.74h-3.37A4.71,4.71,0,0,0,438.47,265.62Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 414.965px 301.915px;"
                                        class="animable"></path>
                                </g>
                                <polygon points="356.27 386.13 356.99 399.51 349.5 400.09 347.63 387.38 356.27 386.13"
                                    style="fill: rgb(255, 139, 123); transform-origin: 352.31px 393.11px;"
                                    id="el6m5j87or2co" class="animable"></polygon>
                                <path
                                    d="M346.26,400.84a3.37,3.37,0,0,1-2.33-.45.71.71,0,0,1,0-.81,1,1,0,0,1,.56-.47c1.28-.44,4.1.94,4.23,1a.17.17,0,0,1,.1.18.19.19,0,0,1-.14.16A13.72,13.72,0,0,1,346.26,400.84Zm-1.33-1.44a1,1,0,0,0-.35.06.51.51,0,0,0-.35.29c-.12.23-.07.34,0,.4.39.49,2.36.38,3.8.1A8.38,8.38,0,0,0,344.93,399.4Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 346.312px 399.956px;"
                                    id="elrivcxvs5n2" class="animable"></path>
                                <path
                                    d="M348.61,400.46a.11.11,0,0,1-.08,0c-1-.35-2.94-1.93-2.83-2.82,0-.21.15-.48.65-.56a1.4,1.4,0,0,1,1,.25c1.05.75,1.39,2.85,1.41,2.94a.2.2,0,0,1-.07.18A.2.2,0,0,1,348.61,400.46Zm-2.11-3h-.11c-.33.05-.34.18-.35.23,0,.53,1.3,1.78,2.3,2.29a4.35,4.35,0,0,0-1.19-2.33,1,1,0,0,0-.65-.19Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 347.229px 398.768px;"
                                    id="el17t7m9q2wiw" class="animable"></path>
                                <path
                                    d="M349.37,399.32l8.52-.54a.69.69,0,0,1,.7.5l2,6.83a1.14,1.14,0,0,1-.77,1.42,1,1,0,0,1-.24.05c-3.07.14-5.82.14-9.64.39-4.51.29-3.33.75-8.63,1.16-3.2.25-4-3.35-2.67-3.61,6.16-1.18,6.68-3.09,8.93-5.46A2.8,2.8,0,0,1,349.37,399.32Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 349.331px 403.961px;"
                                    id="elqr6u0hn6oog" class="animable"></path>
                                <g id="elq9mbg5ylznr">
                                    <polygon
                                        points="347.63 387.38 348.56 393.72 356.65 393.13 356.27 386.13 356.27 386.13 347.63 387.38"
                                        style="fill: rgb(38, 50, 56); opacity: 0.2; transform-origin: 352.14px 389.925px;"
                                        class="animable"></polygon>
                                </g>
                                <path
                                    d="M387.51,302.56s-42.26,6.16-47.93,20,6.61,65.65,6.61,65.65l11.56-1s-.09-31.85-2.43-55.57l32.19-1.57L417.05,300Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 377.567px 344.105px;"
                                    id="eldtuihy7hw87" class="animable"></path>
                                <g id="elq8khdb25x4">
                                    <path
                                        d="M387.51,302.56s-42.26,6.16-47.93,20,6.61,65.65,6.61,65.65l11.56-1s-.09-31.85-2.43-55.57l32.19-1.57L417.05,300Z"
                                        style="opacity: 0.5; transform-origin: 377.567px 344.105px;" class="animable">
                                    </path>
                                </g>
                                <polygon points="345.4 387.56 358.48 386.13 358.48 389.72 346.12 390.8 345.4 387.56"
                                    style="fill: rgb(64, 123, 255); transform-origin: 351.94px 388.465px;"
                                    id="el90034f8ljce" class="animable"></polygon>
                                <polygon points="384.99 387.63 385.71 401.02 378.22 401.59 376.35 388.88 384.99 387.63"
                                    style="fill: rgb(255, 139, 123); transform-origin: 381.03px 394.61px;"
                                    id="eltqzaiirdntb" class="animable"></polygon>
                                <path
                                    d="M375,402.34a3.34,3.34,0,0,1-2.34-.45.71.71,0,0,1,0-.81,1,1,0,0,1,.55-.47c1.28-.44,4.1.95,4.23,1a.18.18,0,0,1,.1.19.21.21,0,0,1-.14.16A14.61,14.61,0,0,1,375,402.34Zm-1.34-1.44a1,1,0,0,0-.35.07.5.5,0,0,0-.35.28c-.12.24-.07.35,0,.4.39.49,2.36.38,3.81.11A8.59,8.59,0,0,0,373.65,400.9Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 375.038px 401.457px;"
                                    id="el0ydkke3ftbce" class="animable"></path>
                                <path
                                    d="M377.33,402h-.08c-1-.35-2.94-1.93-2.83-2.81,0-.22.15-.48.66-.57a1.41,1.41,0,0,1,1.05.25c1,.76,1.38,2.85,1.4,2.95a.19.19,0,0,1-.07.17A.2.2,0,0,1,377.33,402Zm-2.11-3h-.1c-.34.05-.35.19-.36.24,0,.53,1.3,1.77,2.3,2.29a4.3,4.3,0,0,0-1.18-2.33,1,1,0,0,0-.66-.19Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 375.973px 400.304px;"
                                    id="el1zgitp61vuu" class="animable"></path>
                                <path
                                    d="M378.09,400.82l8.52-.54a.69.69,0,0,1,.7.5l2,6.83a1.15,1.15,0,0,1-.77,1.43l-.24,0c-3.07.14-5.81.14-9.64.39-4.51.29-3.33.76-8.63,1.17-3.2.24-4-3.36-2.67-3.62,6.16-1.17,6.68-3.09,8.94-5.46A2.75,2.75,0,0,1,378.09,400.82Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 378.052px 405.445px;"
                                    id="eleoqkchdnvo9" class="animable"></path>
                                <g id="elqrg5gvzl70k">
                                    <polygon
                                        points="385.39 395.06 384.99 387.63 384.99 387.63 376.35 388.88 377.34 395.61 385.39 395.06"
                                        style="fill: rgb(38, 50, 56); opacity: 0.2; transform-origin: 380.87px 391.62px;"
                                        class="animable"></polygon>
                                </g>
                                <path
                                    d="M428.08,301.93s8.81,28.66-8.82,29.29-40.95,0-40.95,0,8.22,22.6,8.25,58.9l-11.08.94s-18.63-61.38-14.17-69.6c6-11,47.55-19.53,47.55-19.53Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 395.451px 346.495px;"
                                    id="el40uzazg10k7" class="animable"></path>
                                <g id="elsxn431jm9m">
                                    <path
                                        d="M428.08,301.93s8.81,28.66-8.82,29.29-40.95,0-40.95,0,8.22,22.6,8.25,58.9l-11.08.94s-18.63-61.38-14.17-69.6c6-11,47.55-19.53,47.55-19.53Z"
                                        style="opacity: 0.4; transform-origin: 395.451px 346.495px;" class="animable">
                                    </path>
                                </g>
                                <polygon points="374.19 389.57 375.08 393.11 387.45 392.07 387.45 388.66 374.19 389.57"
                                    style="fill: rgb(64, 123, 255); transform-origin: 380.82px 390.885px;"
                                    id="elql79uqtmb9e" class="animable"></polygon>
                                <path
                                    d="M400.35,233.41s-10.78-2.35-15.75,14c-3,9.75-2.46,23.09-2.46,23.09l-17.83.35-2.21,7.24s23,.31,29-.47S400.35,233.41,400.35,233.41Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 381.225px 255.722px;"
                                    id="el6feiirygufk" class="animable"></path>
                                <path
                                    d="M388.39,302.29s-5.67-71.22,11.66-71.22h24.88c6,0,9.45,8.19,8.19,23s-2.52,51.34-2.52,51.34Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 410.441px 268.24px;"
                                    id="el456kz4dw3qa" class="animable"></path>
                                <g id="el1r0ecotpxd5">
                                    <path
                                        d="M388.39,302.29s-5.67-71.22,11.66-71.22h24.88c6,0,9.45,8.19,8.19,23s-2.52,51.34-2.52,51.34Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 410.441px 268.24px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M361.28,269.3l2,.26a2.93,2.93,0,0,1,2.13,1.39l2.81,4.7a3.25,3.25,0,0,1,.37,2.51l-.45,1.77a3.3,3.3,0,0,1-4.48,2.23l-3.29-1.39a4.78,4.78,0,0,1-2.62-2.71l-.82-2.13a3.42,3.42,0,0,1,0-2.32l.69-2A3.41,3.41,0,0,1,361.28,269.3Z"
                                    style="fill: rgb(206, 122, 99); transform-origin: 362.711px 275.846px;"
                                    id="elo2quoxk1r4" class="animable"></path>
                                <polygon
                                    points="362.74 270.56 368.88 284.73 378.33 288.35 390.93 282.06 390.86 267.73 384.37 266.78 379 269.41 376.09 272.21 372.27 267.37 367.31 266.78 364.12 268.2 362.74 270.56"
                                    style="fill: rgb(64, 123, 255); transform-origin: 376.835px 277.565px;"
                                    id="elni2y54cx36s" class="animable"></polygon>
                                <g id="el79g1m1lpsxk">
                                    <polygon
                                        points="362.74 270.56 368.88 284.73 378.33 288.35 390.93 282.06 390.86 267.73 384.37 266.78 379 269.41 376.09 272.21 372.27 267.37 367.31 266.78 364.12 268.2 362.74 270.56"
                                        style="opacity: 0.1; transform-origin: 376.835px 277.565px;" class="animable">
                                    </polygon>
                                </g>
                                <g id="elbvvczbv6x4w">
                                    <polygon
                                        points="380.07 287.48 378.11 270.26 376.09 272.21 373.45 268.87 376.64 287.71 378.33 288.35 380.07 287.48"
                                        style="opacity: 0.2; transform-origin: 376.76px 278.61px;" class="animable">
                                    </polygon>
                                </g>
                                <path
                                    d="M362.27,268.2s8.66-8.82,14,2.36c0,0,9-10.55,14.58-2.83l-.72,2.83s-2.9-7-14.05,3.36c0,0-5.63-10.92-13.35-3.36Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 376.56px 269.408px;"
                                    id="elvnzi96lfijg" class="animable"></path>
                                <g id="elq9ljtj7s2m">
                                    <path
                                        d="M362.27,268.2s8.66-8.82,14,2.36c0,0,9-10.55,14.58-2.83l-.72,2.83s-2.9-7-14.05,3.36c0,0-5.63-10.92-13.35-3.36Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.8; transform-origin: 376.56px 269.408px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M407.17,271.81h-9.51l-2.5-2.32a4.47,4.47,0,0,0-4-1.11l-1.16.24a4.4,4.4,0,0,1-2.33-.15h0a4.51,4.51,0,0,0-5,1.52l-.18.24a4.48,4.48,0,0,0-.19,5.19l2.4,3.65A4.5,4.5,0,0,0,389.6,281l6.71-1.7,11.45,1.54Z"
                                    style="fill: rgb(206, 122, 99); transform-origin: 394.662px 274.688px;"
                                    id="elbmsgkcq43ce" class="animable"></path>
                                <path
                                    d="M423.35,248.39c-.74-4.47-3.78-17.32,4.41-17.32s9.53,12.6,10,20.39,1.92,31.62-3.53,31.64-28.83-1.87-28.83-1.87l.24-10.4,20.55-1.65S424.29,254.06,423.35,248.39Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 421.845px 257.085px;"
                                    id="elfnbnqcubrwu" class="animable"></path>
                                <g id="elm2xqwp91bcs">
                                    <path
                                        d="M423.35,248.39c-.74-4.47-3.78-17.32,4.41-17.32s9.53,12.6,10,20.39,1.92,31.62-3.53,31.64-28.83-1.87-28.83-1.87l.24-10.4,20.55-1.65S424.29,254.06,423.35,248.39Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 421.845px 257.085px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M401.61,231.45l.15.64,5.2,3.31,10.1-3.82.13-.09c-3.9-3.94-2.44-11.17-1.14-17l-4.85,4L404.59,224a22.2,22.2,0,0,1,.45,2.69C405.35,229.57,404.56,230.55,401.61,231.45Z"
                                    style="fill: rgb(206, 122, 99); transform-origin: 409.4px 224.945px;"
                                    id="elkeblggcn4s" class="animable"></path>
                                <path d="M395.61,202.85s-5.63,3.78-4.24,6.09c2.25,3.73,5.43-2.54,5.43-2.54Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 393.975px 206.487px;"
                                    id="ellrex9943uwf" class="animable"></path>
                                <g id="el2lg3tc19jzc">
                                    <path
                                        d="M413.57,223.83a14.15,14.15,0,0,0,.1-3.5l-8.8,5.12c.06.42.12.84.17,1.27a5.16,5.16,0,0,1-.21,2.59C408.07,229,412.61,227,413.57,223.83Z"
                                        style="opacity: 0.2; isolation: isolate; transform-origin: 409.282px 224.82px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M415.56,205.54c1,7.94,2,12.51-1.21,17.38-4.77,7.31-15,5.79-18.33-1.64-3-6.67-4.08-18.52,2.93-23.27a10.57,10.57,0,0,1,16.61,7.53Z"
                                    style="fill: rgb(206, 122, 99); transform-origin: 405.117px 211.882px;"
                                    id="elimch9vwhpih" class="animable"></path>
                                <path
                                    d="M404.09,212.39c.12.65-.12,1.23-.53,1.32s-.85-.35-1-1,.12-1.22.53-1.31S404,211.76,404.09,212.39Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 403.32px 212.555px;"
                                    id="elcxw8kjgkrgf" class="animable"></path>
                                <path
                                    d="M396.65,213.81c.12.63-.12,1.23-.54,1.31s-.84-.35-1-1,.12-1.23.53-1.32S396.53,213.17,396.65,213.81Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 395.873px 213.959px;"
                                    id="eltfdfbm6pxzn" class="animable"></path>
                                <path d="M399.56,211.71a24.34,24.34,0,0,1-1.65,5.26,3.45,3.45,0,0,0,2.78,0Z"
                                    style="fill: rgb(186, 77, 60); transform-origin: 399.3px 214.486px;"
                                    id="elr5853k33cd" class="animable"></path>
                                <path
                                    d="M405.74,207.7a.27.27,0,0,0,.17-.06.37.37,0,0,0,.1-.51v0a3.69,3.69,0,0,0-3-1.58.38.38,0,0,0-.35.4h0a.38.38,0,0,0,.4.36,2.85,2.85,0,0,1,2.39,1.25A.33.33,0,0,0,405.74,207.7Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 404.365px 206.625px;"
                                    id="elv3om8fedtfj" class="animable"></path>
                                <path
                                    d="M393.18,209.34a.38.38,0,0,0,.3-.19,3.16,3.16,0,0,1,2.27-1.62.39.39,0,0,0,.36-.41h0a.4.4,0,0,0-.41-.35h0a3.83,3.83,0,0,0-2.86,2,.36.36,0,0,0,.34.56Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 394.444px 208.055px;"
                                    id="eluacicmi04l" class="animable"></path>
                                <path
                                    d="M405.29,218.76a6.36,6.36,0,0,0,.82-1,.21.21,0,0,0-.05-.3h0a.22.22,0,0,0-.31.05,6,6,0,0,1-4.72,2.66.23.23,0,0,0-.24.22.23.23,0,0,0,.22.23A6.28,6.28,0,0,0,405.29,218.76Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 403.471px 219.019px;"
                                    id="elzkj6s8d1rbl" class="animable"></path>
                                <path d="M412.33,194s1.62-9-2.19-8.64S412.33,194,412.33,194Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 410.773px 189.675px;"
                                    id="elmbwm17qlsn" class="animable"></path>
                                <path
                                    d="M407.22,208.82a3.73,3.73,0,0,0-6.62,2l-2.05.5a3.74,3.74,0,1,0,.25,1.32,2.09,2.09,0,0,0,0-.34l1.86-.45a3.76,3.76,0,1,0,7.14-2.13c3.79-1.48,9.15-3.13,10.17-2.49l.54-.85C416.69,205.22,409.4,208,407.22,208.82ZM395,215.36a2.76,2.76,0,1,1,2.75-2.76A2.77,2.77,0,0,1,395,215.36Zm9.28-1.42a2.76,2.76,0,1,1,2.75-2.75A2.76,2.76,0,0,1,404.32,213.94Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 404.915px 211.253px;"
                                    id="elapjrejbrjmt" class="animable"></path>
                                <g id="elk914hxbevs">
                                    <path
                                        d="M407.22,208.82a3.73,3.73,0,0,0-6.62,2l-2.05.5a3.74,3.74,0,1,0,.25,1.32,2.09,2.09,0,0,0,0-.34l1.86-.45a3.76,3.76,0,1,0,7.14-2.13c3.79-1.48,9.15-3.13,10.17-2.49l.54-.85C416.69,205.22,409.4,208,407.22,208.82ZM395,215.36a2.76,2.76,0,1,1,2.75-2.76A2.77,2.77,0,0,1,395,215.36Zm9.28-1.42a2.76,2.76,0,1,1,2.75-2.75A2.76,2.76,0,0,1,404.32,213.94Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 404.915px 211.253px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M405.12,199.42s-12.57,8.88-15.25,5.19,2.91-4,2.91-4-4.76-3.35-2.24-6,5.57,0,5.57,0,11.54-10.05,15.47-2.51c0,0,8.75-1.74,9.36,5.33s0,8.16,0,8.16,4.63.57,4,2.18-4,.35-4,.35,5.47,4.14,3,4.71-8.91-.79-10.49-6.15.26-6.09.26-6.09S398.65,206.79,405.12,199.42Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 407.071px 201.123px;"
                                    id="eld4ow8x5hk7j" class="animable"></path>
                                <path
                                    d="M419.93,212.22a8.49,8.49,0,0,1-3.1,4.85c-2,1.48-3.53-.31-3.42-2.84.1-2.27,1.27-5.78,3.49-6.24S420.47,209.8,419.93,212.22Z"
                                    style="fill: rgb(206, 122, 99); transform-origin: 416.727px 212.768px;"
                                    id="elhx8jwg28d2v" class="animable"></path>
                                <path
                                    d="M402.7,231.07s-.95,2.6,4.36,2.68,10.21-3.15,10.21-3.15,2.13-.71,2.78.47c0,0-5.46,5.28-13,5.12s-6.37-5.22-6.37-5.22S402.06,230.6,402.7,231.07Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 410.332px 233.291px;"
                                    id="el4z2o5q13dp" class="animable"></path>
                            </g>
                            <g id="maintenance--Bookshelf--inject-3" class="animable"
                                style="transform-origin: 167.235px 257.56px;">
                                <rect x="107.59" y="103.81" width="122.03" height="307.45"
                                    style="fill: rgb(64, 123, 255); transform-origin: 168.605px 257.535px;"
                                    id="eliwzyt19x0qb" class="animable"></rect>
                                <g id="elntg9dd4j59b">
                                    <rect x="107.59" y="103.81" width="122.03" height="307.45"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 168.605px 257.535px;"
                                        class="animable"></rect>
                                </g>
                                <path d="M229.62,101.12V414H252.1V101.12Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 240.86px 257.56px;"
                                    id="el8w873k5w8j" class="animable"></path>
                                <g id="elfhmr3m85xu">
                                    <path d="M229.62,101.12V414H252.1V101.12Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 240.86px 257.56px;"
                                        class="animable"></path>
                                </g>
                                <path d="M86.19,101.12V414h22.48V101.12Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 97.43px 257.56px;"
                                    id="elzxf1k7w7npa" class="animable"></path>
                                <g id="elwnpmgs40ev">
                                    <path d="M86.19,101.12V414h22.48V101.12Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 97.43px 257.56px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M82.37,101.12V414h150V101.12Zm144.55,5.39v56.1H87.76v-56.1ZM87.76,285.58V229.49H226.92v56.09ZM226.92,291v56.09H87.76V291ZM87.76,224.1V168H226.92v56.1Zm0,184.46V352.47H226.92v56.09Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 157.37px 257.56px;"
                                    id="eljfhjs7onhyd" class="animable"></path>
                                <g id="el41d9dyti9tv">
                                    <path
                                        d="M82.37,101.12V414h150V101.12Zm144.55,5.39v56.1H87.76v-56.1ZM87.76,285.58V229.49H226.92v56.09ZM226.92,291v56.09H87.76V291ZM87.76,224.1V168H226.92v56.1Zm0,184.46V352.47H226.92v56.09Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 157.37px 257.56px;"
                                        class="animable"></path>
                                </g>
                                <g id="el2mbgrrnc16m">
                                    <rect x="175.81" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 178.405px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el572rae5oysd">
                                    <rect x="175.81" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 178.405px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elhzfh0v929v">
                                    <rect x="180.99" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 183.585px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el4ng92aqxp18">
                                    <rect x="180.99" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 183.585px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el6wn8xub21lv">
                                    <rect x="165.43" y="122.14" width="10.37" height="40.47"
                                        style="fill: rgb(64, 123, 255); transform-origin: 170.615px 142.375px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrt5f6dro5jd">
                                    <rect x="165.43" y="122.14" width="10.37" height="40.47"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 170.615px 142.375px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elawtgqlazs0m">
                                    <rect x="153.54" y="119.08" width="6.7" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 156.89px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elxiempuvvn">
                                    <rect x="160.25" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 162.845px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elbyg5siqgav">
                                    <rect x="160.25" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 162.845px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elcyvtfruyy3f">
                                    <rect x="114.2" y="119.08" width="6.7" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 117.55px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el3yl78qlou89">
                                    <rect x="114.2" y="119.08" width="6.7" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 117.55px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elthlzaswv3w">
                                    <rect x="120.91" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 123.505px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="ell25shsmj3ip">
                                    <rect x="120.91" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 123.505px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el4pqu01o2t4v">
                                    <rect x="136.47" y="119.08" width="6.7" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 139.82px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el0httej2p3chf">
                                    <rect x="136.47" y="119.08" width="6.7" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 139.82px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elet9scvbkxw">
                                    <rect x="143.17" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 145.765px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="ely7f8xdflja">
                                    <rect x="143.17" y="119.08" width="5.19" height="43.53"
                                        style="opacity: 0.1; transform-origin: 145.765px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eljpag80xd3o">
                                    <rect x="103.83" y="120.11" width="10.37" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 109.015px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elct1zshz021">
                                    <rect x="103.83" y="120.11" width="10.37" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 109.015px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8g5h669ma25">
                                    <rect x="98.64" y="120.11" width="5.19" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 101.235px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elcn9e47jhemd">
                                    <rect x="98.64" y="120.11" width="5.19" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 101.235px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elkxsltxghiym">
                                    <rect x="129.55" y="120.11" width="6.92" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 133.01px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elgall75a1lmm">
                                    <rect x="129.55" y="120.11" width="6.92" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 133.01px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el1dnbyij62l6">
                                    <rect x="126.09" y="120.11" width="3.46" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 127.82px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el6pzl6shkcrv">
                                    <rect x="126.09" y="120.11" width="3.46" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 127.82px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrcypbtl8ie">
                                    <rect x="143.17" y="122.14" width="10.37" height="40.47"
                                        style="fill: rgb(64, 123, 255); transform-origin: 148.355px 142.375px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elr0gs47cocwh">
                                    <rect x="143.17" y="122.14" width="10.37" height="40.47"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 148.355px 142.375px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elnuhlm05h4ub">
                                    <rect x="201.74" y="119.08" width="6.7" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 205.09px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elpwsb8sng1l">
                                    <rect x="201.74" y="119.08" width="6.7" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 205.09px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elg9xrcwzmvdj">
                                    <rect x="208.44" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(64, 123, 255); transform-origin: 211.035px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el5dz7xgf2d4r">
                                    <rect x="208.44" y="119.08" width="5.19" height="43.53"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 211.035px 140.845px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="ela3mojj7ncj">
                                    <rect x="191.37" y="120.11" width="10.37" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 196.555px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el2fpmwdobxp4">
                                    <rect x="191.37" y="120.11" width="10.37" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 196.555px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elgxw7qjlo6eo">
                                    <rect x="186.18" y="120.11" width="5.19" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 188.775px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el7ag5as88bh8">
                                    <rect x="186.18" y="120.11" width="5.19" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 188.775px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eljx5kfuajb5">
                                    <rect x="217.09" y="120.11" width="6.92" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 220.55px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el3urgyny4k75">
                                    <rect x="217.09" y="120.11" width="6.92" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 220.55px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elzsvm2ke527p">
                                    <rect x="213.63" y="120.11" width="3.46" height="42.5"
                                        style="fill: rgb(64, 123, 255); transform-origin: 215.36px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elusr2xz9wry">
                                    <rect x="213.63" y="120.11" width="3.46" height="42.5"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 215.36px 141.36px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <rect x="143.56" y="180.71" width="5.06" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 146.09px 202.41px;"
                                    id="elhcjp6xf7tf" class="animable"></rect>
                                <g id="elkc3l62z4m3c">
                                    <rect x="143.56" y="180.71" width="5.06" height="43.4"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 146.09px 202.41px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="138.49" y="180.71" width="5.06" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 141.02px 202.41px;"
                                    id="ell1xnzsg4bj" class="animable"></rect>
                                <g id="el4a1rss2nl5u">
                                    <rect x="138.49" y="180.71" width="5.06" height="43.4"
                                        style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 141.02px 202.41px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="148.62" y="183.76" width="10.13" height="40.35"
                                    style="fill: rgb(64, 123, 255); transform-origin: 153.685px 203.935px;"
                                    id="eltb2xbase1m" class="animable"></rect>
                                <g id="elsqt57nbg27r">
                                    <rect x="148.62" y="183.76" width="10.13" height="40.35"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 153.685px 203.935px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="163.81" y="180.71" width="6.54" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 167.08px 202.41px;"
                                    id="el66e0x09x046" class="animable"></rect>
                                <rect x="158.75" y="180.71" width="5.06" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 161.28px 202.41px;"
                                    id="elli2w70h9umk" class="animable"></rect>
                                <g id="elcfniqc1ajk5">
                                    <rect x="158.75" y="180.71" width="5.06" height="43.4"
                                        style="opacity: 0.1; transform-origin: 161.28px 202.41px;" class="animable">
                                    </rect>
                                </g>
                                <rect x="202.22" y="180.71" width="6.54" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 205.49px 202.41px;"
                                    id="elxmtx55xoyy" class="animable"></rect>
                                <g id="el1fovb0im6ja">
                                    <rect x="202.22" y="180.71" width="6.54" height="43.4"
                                        style="opacity: 0.1; transform-origin: 205.49px 202.41px;" class="animable">
                                    </rect>
                                </g>
                                <rect x="197.16" y="180.71" width="5.06" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 199.69px 202.41px;"
                                    id="el6haxzhhm80e" class="animable"></rect>
                                <g id="el0z7pp8e23s3p">
                                    <rect x="197.16" y="180.71" width="5.06" height="43.4"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 199.69px 202.41px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="180.48" y="180.71" width="6.54" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 183.75px 202.41px;"
                                    id="eljiqyr6efzbh" class="animable"></rect>
                                <g id="elmvbvbjqew8">
                                    <rect x="180.48" y="180.71" width="6.54" height="43.4"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 183.75px 202.41px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="175.42" y="180.71" width="5.06" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 177.95px 202.41px;"
                                    id="elm4bcqkycl48" class="animable"></rect>
                                <g id="elnhp5au3xr4">
                                    <rect x="175.42" y="180.71" width="5.06" height="43.4"
                                        style="opacity: 0.1; transform-origin: 177.95px 202.41px;" class="animable">
                                    </rect>
                                </g>
                                <rect x="208.76" y="181.74" width="10.13" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 213.825px 202.925px;"
                                    id="elcekb8dccs0c" class="animable"></rect>
                                <g id="el05y1aep0khiq">
                                    <rect x="208.76" y="181.74" width="10.13" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 213.825px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="218.89" y="181.74" width="5.06" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 221.42px 202.925px;"
                                    id="elbmex7tyj05p" class="animable"></rect>
                                <g id="eljtu2t2hyuuf">
                                    <rect x="218.89" y="181.74" width="5.06" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 221.42px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="187.03" y="181.74" width="6.75" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 190.405px 202.925px;"
                                    id="el6p0uwd76qon" class="animable"></rect>
                                <g id="el5ojy3zzzz8o">
                                    <rect x="187.03" y="181.74" width="6.75" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 190.405px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="193.78" y="181.74" width="3.38" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 195.47px 202.925px;"
                                    id="elw02jzrc6q7" class="animable"></rect>
                                <g id="el0ljzgx6lg95f">
                                    <rect x="193.78" y="181.74" width="3.38" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 195.47px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="170.36" y="183.76" width="10.13" height="40.35"
                                    style="fill: rgb(64, 123, 255); transform-origin: 175.425px 203.935px;"
                                    id="el7jnzv7ugi56" class="animable"></rect>
                                <g id="elzqkwe66sokg">
                                    <rect x="170.36" y="183.76" width="10.13" height="40.35"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 175.425px 203.935px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="116.76" y="180.71" width="6.54" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 120.03px 202.41px;"
                                    id="eleurb75d8ays" class="animable"></rect>
                                <g id="el4511qy9fpaf">
                                    <rect x="116.76" y="180.71" width="6.54" height="43.4"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 120.03px 202.41px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="111.69" y="180.71" width="5.06" height="43.4"
                                    style="fill: rgb(64, 123, 255); transform-origin: 114.22px 202.41px;"
                                    id="elku60bdlvewo" class="animable"></rect>
                                <g id="elay9u9vgkyyb">
                                    <rect x="111.69" y="180.71" width="5.06" height="43.4"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 114.22px 202.41px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="123.3" y="181.74" width="10.13" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 128.365px 202.925px;"
                                    id="el6hnu56zaxaq" class="animable"></rect>
                                <g id="elz6wz08xfnb">
                                    <rect x="123.3" y="181.74" width="10.13" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 128.365px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="133.43" y="181.74" width="5.06" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 135.96px 202.925px;"
                                    id="el4f3c3x56pu6" class="animable"></rect>
                                <g id="el8xqfuxiptlr">
                                    <rect x="133.43" y="181.74" width="5.06" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 135.96px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="101.57" y="181.74" width="6.75" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 104.945px 202.925px;"
                                    id="el3ebdmxvelrv" class="animable"></rect>
                                <g id="elndvxif06ggo">
                                    <rect x="101.57" y="181.74" width="6.75" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 104.945px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="108.32" y="181.74" width="3.38" height="42.37"
                                    style="fill: rgb(64, 123, 255); transform-origin: 110.01px 202.925px;"
                                    id="elesmbbampk89" class="animable"></rect>
                                <g id="el65v836mva9">
                                    <rect x="108.32" y="181.74" width="3.38" height="42.37"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 110.01px 202.925px;"
                                        class="animable"></rect>
                                </g>
                                <g id="elbq1bx0so1nq">
                                    <rect x="176.87" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 179.4px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el1b8349m4h3y">
                                    <rect x="176.87" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 179.4px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eljpt1pn29i9">
                                    <rect x="181.93" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 184.46px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el28gb4d9dinrj">
                                    <rect x="181.93" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 184.46px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elwypon9kr55">
                                    <rect x="166.74" y="307.12" width="10.13" height="39.95"
                                        style="fill: rgb(64, 123, 255); transform-origin: 171.805px 327.095px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="els0ph30kcj1">
                                    <rect x="166.74" y="307.12" width="10.13" height="39.95"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 171.805px 327.095px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8n5pn4dafhq">
                                    <rect x="155.13" y="304.1" width="6.54" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 158.4px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elj3kj50oz33m">
                                    <rect x="161.68" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 164.21px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrhrag9y5lge">
                                    <rect x="161.68" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 164.21px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elu05gegcph8i">
                                    <rect x="116.72" y="304.1" width="6.54" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 119.99px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elwb9uzaluii">
                                    <rect x="116.72" y="304.1" width="6.54" height="42.97"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 119.99px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elq25m8j3qgvg">
                                    <rect x="123.27" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 125.8px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eltlw9yn4p73a">
                                    <rect x="123.27" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 125.8px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elb40ucr9zs97">
                                    <rect x="138.46" y="304.1" width="6.54" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 141.73px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="ellvv7nhif4w">
                                    <rect x="138.46" y="304.1" width="6.54" height="42.97"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 141.73px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elf1uakoyggch">
                                    <rect x="145" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 147.53px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elu98leh49zu">
                                    <rect x="145" y="304.1" width="5.06" height="42.97"
                                        style="opacity: 0.1; transform-origin: 147.53px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el6n0ea87tl0t">
                                    <rect x="106.6" y="305.12" width="10.13" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 111.665px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elsjq6p4x43d7">
                                    <rect x="106.6" y="305.12" width="10.13" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 111.665px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elkqhjgdcvom">
                                    <rect x="101.53" y="305.12" width="5.06" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 104.06px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el2g26z7u0zbv">
                                    <rect x="101.53" y="305.12" width="5.06" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 104.06px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el43l3uspccc5">
                                    <rect x="131.71" y="305.12" width="6.75" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 135.085px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elqpim7rkx85">
                                    <rect x="131.71" y="305.12" width="6.75" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 135.085px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elfk61rw4ojgu">
                                    <rect x="128.33" y="305.12" width="3.38" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 130.02px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eloj1p2mdyzln">
                                    <rect x="128.33" y="305.12" width="3.38" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 130.02px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el709xchocj9k">
                                    <rect x="145" y="307.12" width="10.13" height="39.95"
                                        style="fill: rgb(64, 123, 255); transform-origin: 150.065px 327.095px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elkx6ey8f9p2">
                                    <rect x="145" y="307.12" width="10.13" height="39.95"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 150.065px 327.095px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el9k1uw1ykrad">
                                    <rect x="202.19" y="304.1" width="6.54" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 205.46px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elxdmip1r7eq">
                                    <rect x="202.19" y="304.1" width="6.54" height="42.97"
                                        style="opacity: 0.1; transform-origin: 205.46px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eltqh7n9zthir">
                                    <rect x="208.73" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(64, 123, 255); transform-origin: 211.26px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elbo4y7moupbr">
                                    <rect x="208.73" y="304.1" width="5.06" height="42.97"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 211.26px 325.585px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elvzra17ju5fi">
                                    <rect x="192.06" y="305.12" width="10.13" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 197.125px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elpmz6qxb5wjp">
                                    <rect x="192.06" y="305.12" width="10.13" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 197.125px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elggy75o658nj">
                                    <rect x="187" y="305.12" width="5.06" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 189.53px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eltxc3e2vb0cc">
                                    <rect x="187" y="305.12" width="5.06" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 189.53px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elagfe7vz2xms">
                                    <rect x="217.17" y="305.12" width="6.75" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 220.545px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elw0hqq97n57">
                                    <rect x="217.17" y="305.12" width="6.75" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 220.545px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elzaadhbnpzcm">
                                    <rect x="213.8" y="305.12" width="3.38" height="41.96"
                                        style="fill: rgb(64, 123, 255); transform-origin: 215.49px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eljjdzvmwxwq">
                                    <rect x="213.8" y="305.12" width="3.38" height="41.96"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 215.49px 326.1px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elfh35c0wpeow">
                                    <rect x="176.9" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 179.43px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el7yv8w85qcvc">
                                    <rect x="176.9" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 179.43px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el77ui3t5nak7">
                                    <rect x="181.97" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 184.5px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eln64h77g5xrr">
                                    <rect x="181.97" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 184.5px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elfjvrsguup8e">
                                    <rect x="166.77" y="369.13" width="10.13" height="39.45"
                                        style="fill: rgb(64, 123, 255); transform-origin: 171.835px 388.855px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el7cvbke7n4kc">
                                    <rect x="166.77" y="369.13" width="10.13" height="39.45"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 171.835px 388.855px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elcl3zizivtf">
                                    <rect x="155.17" y="366.15" width="6.54" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 158.44px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el4my2w2pq1ga">
                                    <rect x="161.71" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 164.24px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elepsz8tficzw">
                                    <rect x="161.71" y="366.15" width="5.06" height="42.44"
                                        style="opacity: 0.1; transform-origin: 164.24px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elf83veuqfofv">
                                    <rect x="116.76" y="366.15" width="6.54" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 120.03px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el674hkv8nsia">
                                    <rect x="116.76" y="366.15" width="6.54" height="42.44"
                                        style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 120.03px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el22j305qdj51">
                                    <rect x="123.3" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 125.83px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eljv1aiwzuq2s">
                                    <rect x="123.3" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 125.83px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el2tjmy7lxv7j">
                                    <rect x="138.49" y="366.15" width="6.54" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 141.76px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elj5r9ng6677">
                                    <rect x="138.49" y="366.15" width="6.54" height="42.44"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 141.76px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elgm685dgyen">
                                    <rect x="145.04" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 147.57px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el1j1mnhkq7xe">
                                    <rect x="145.04" y="366.15" width="5.06" height="42.44"
                                        style="opacity: 0.1; transform-origin: 147.57px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elev3is8gke9v">
                                    <rect x="106.63" y="367.15" width="10.13" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 111.695px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elhg61fo3ep0m">
                                    <rect x="106.63" y="367.15" width="10.13" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 111.695px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elged5fgvaah">
                                    <rect x="101.57" y="367.15" width="5.06" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 104.1px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elaufuz09nd9">
                                    <rect x="101.57" y="367.15" width="5.06" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 104.1px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el4k5yl34kr9i">
                                    <rect x="131.74" y="367.15" width="6.75" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 135.115px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el79a5sq0hk1o">
                                    <rect x="131.74" y="367.15" width="6.75" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 135.115px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el17e9usg4qbnj">
                                    <rect x="128.37" y="367.15" width="3.38" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 130.06px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el0qye1su39bp">
                                    <rect x="128.37" y="367.15" width="3.38" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 130.06px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el2osjwql1ik4">
                                    <rect x="145.04" y="369.13" width="10.13" height="39.45"
                                        style="fill: rgb(64, 123, 255); transform-origin: 150.105px 388.855px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el7jgr8iu7ygd">
                                    <rect x="145.04" y="369.13" width="10.13" height="39.45"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 150.105px 388.855px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elksys4kdjt6a">
                                    <rect x="202.22" y="366.15" width="6.54" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 205.49px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eligsogihrlal">
                                    <rect x="202.22" y="366.15" width="6.54" height="42.44"
                                        style="opacity: 0.1; transform-origin: 205.49px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elfcali7pvdtp">
                                    <rect x="208.77" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(64, 123, 255); transform-origin: 211.3px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elj3rbzzmz0xs">
                                    <rect x="208.77" y="366.15" width="5.06" height="42.44"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 211.3px 387.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el8vm75r3ufsu">
                                    <rect x="192.09" y="367.15" width="10.13" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 197.155px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="ela4wfdgpxbdl">
                                    <rect x="192.09" y="367.15" width="10.13" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 197.155px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elmuy83i6nvun">
                                    <rect x="187.03" y="367.15" width="5.06" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 189.56px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elx101lhtfpi9">
                                    <rect x="187.03" y="367.15" width="5.06" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 189.56px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elwe0u588q6jo">
                                    <rect x="217.2" y="367.15" width="6.75" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 220.575px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eloopkzb9pwt">
                                    <rect x="217.2" y="367.15" width="6.75" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 220.575px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el3pkhb1q6y9r">
                                    <rect x="213.83" y="367.15" width="3.38" height="41.43"
                                        style="fill: rgb(64, 123, 255); transform-origin: 215.52px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elwjxmwwtnu8a">
                                    <rect x="213.83" y="367.15" width="3.38" height="41.43"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 215.52px 387.865px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <rect x="140.84" y="241.47" width="5.23" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 143.455px 263.525px;"
                                    id="eluz5uw2u5xa" class="animable"></rect>
                                <g id="elq7lbryumws">
                                    <rect x="140.84" y="241.47" width="5.23" height="44.11"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 143.455px 263.525px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="135.6" y="241.47" width="5.23" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 138.215px 263.525px;"
                                    id="el9l97hvvggr5" class="animable"></rect>
                                <g id="eltiwsbnyb69">
                                    <rect x="135.6" y="241.47" width="5.23" height="44.11"
                                        style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 138.215px 263.525px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="146.07" y="244.57" width="10.47" height="41.01"
                                    style="fill: rgb(64, 123, 255); transform-origin: 151.305px 265.075px;"
                                    id="elrf4ylfs09z" class="animable"></rect>
                                <g id="elxql3zqya81c">
                                    <rect x="146.07" y="244.57" width="10.47" height="41.01"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 151.305px 265.075px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="161.78" y="241.47" width="6.77" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 165.165px 263.525px;"
                                    id="el0311v32pt2ap" class="animable"></rect>
                                <rect x="156.54" y="241.47" width="5.23" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 159.155px 263.525px;"
                                    id="elzgegkfoydwo" class="animable"></rect>
                                <g id="elqmicqdcxfzj">
                                    <rect x="156.54" y="241.47" width="5.23" height="44.11"
                                        style="opacity: 0.1; transform-origin: 159.155px 263.525px;" class="animable">
                                    </rect>
                                </g>
                                <rect x="201.49" y="241.47" width="6.77" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 204.875px 263.525px;"
                                    id="elbv6emugvgsc" class="animable"></rect>
                                <g id="eljmx4eh6y0lq">
                                    <rect x="201.49" y="241.47" width="6.77" height="44.11"
                                        style="opacity: 0.1; transform-origin: 204.875px 263.525px;" class="animable">
                                    </rect>
                                </g>
                                <rect x="196.25" y="241.47" width="5.23" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 198.865px 263.525px;"
                                    id="elrezoqhwkzt" class="animable"></rect>
                                <g id="elewc0lle46">
                                    <rect x="196.25" y="241.47" width="5.23" height="44.11"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 198.865px 263.525px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="179.01" y="241.47" width="6.77" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 182.395px 263.525px;"
                                    id="elzjo8lpym2u8" class="animable"></rect>
                                <g id="el12mylbvhvtv">
                                    <rect x="179.01" y="241.47" width="6.77" height="44.11"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 182.395px 263.525px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="173.78" y="241.47" width="5.23" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 176.395px 263.525px;"
                                    id="elosa0xe2kjjj" class="animable"></rect>
                                <g id="elyhpkp1alpqq">
                                    <rect x="173.78" y="241.47" width="5.23" height="44.11"
                                        style="opacity: 0.1; transform-origin: 176.395px 263.525px;" class="animable">
                                    </rect>
                                </g>
                                <rect x="208.25" y="242.52" width="10.47" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 213.485px 264.055px;"
                                    id="elkc075ri6wdl" class="animable"></rect>
                                <g id="eliyfk3vvi6om">
                                    <rect x="208.25" y="242.52" width="10.47" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 213.485px 264.055px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="218.72" y="242.52" width="5.23" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 221.335px 264.055px;"
                                    id="elkojjtnrbp2" class="animable"></rect>
                                <g id="el975rqdf6dwq">
                                    <rect x="218.72" y="242.52" width="5.23" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 221.335px 264.055px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="185.78" y="242.52" width="6.98" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 189.27px 264.055px;"
                                    id="elfynpq14s6ra" class="animable"></rect>
                                <g id="el4d3b29rogjz">
                                    <rect x="185.78" y="242.52" width="6.98" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 189.27px 264.055px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="192.76" y="242.52" width="3.49" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 194.505px 264.055px;"
                                    id="el3spjbnlc9za" class="animable"></rect>
                                <g id="elexum9zn0n8b">
                                    <rect x="192.76" y="242.52" width="3.49" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 194.505px 264.055px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="168.54" y="244.57" width="10.47" height="41.01"
                                    style="fill: rgb(64, 123, 255); transform-origin: 173.775px 265.075px;"
                                    id="elqawsondv9d" class="animable"></rect>
                                <g id="elw9s793d7kxq">
                                    <rect x="168.54" y="244.57" width="10.47" height="41.01"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 173.775px 265.075px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="113.13" y="241.47" width="6.77" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 116.515px 263.525px;"
                                    id="elkoxtuygri7" class="animable"></rect>
                                <g id="ellj3bk7enay">
                                    <rect x="113.13" y="241.47" width="6.77" height="44.11"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 116.515px 263.525px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="107.9" y="241.47" width="5.23" height="44.11"
                                    style="fill: rgb(64, 123, 255); transform-origin: 110.515px 263.525px;"
                                    id="eljdvi08rdfgb" class="animable"></rect>
                                <g id="elnnhj6qof8qh">
                                    <rect x="107.9" y="241.47" width="5.23" height="44.11"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 110.515px 263.525px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="119.9" y="242.52" width="10.47" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 125.135px 264.055px;"
                                    id="el2bh7nss96z6" class="animable"></rect>
                                <g id="elmtrrtrxbwo">
                                    <rect x="119.9" y="242.52" width="10.47" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 125.135px 264.055px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="130.37" y="242.52" width="5.23" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 132.985px 264.055px;"
                                    id="elu5dbsm2pbbb" class="animable"></rect>
                                <g id="elcyyy7rpjyv">
                                    <rect x="130.37" y="242.52" width="5.23" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 132.985px 264.055px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="97.43" y="242.52" width="6.98" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 100.92px 264.055px;"
                                    id="elfp66pgshfpl" class="animable"></rect>
                                <g id="eld8asi8ek7zg">
                                    <rect x="97.43" y="242.52" width="6.98" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 100.92px 264.055px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="104.41" y="242.52" width="3.49" height="43.07"
                                    style="fill: rgb(64, 123, 255); transform-origin: 106.155px 264.055px;"
                                    id="elk0lenvz35o" class="animable"></rect>
                                <g id="ellizg2obv94">
                                    <rect x="104.41" y="242.52" width="3.49" height="43.07"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 106.155px 264.055px;"
                                        class="animable"></rect>
                                </g>
                            </g>
                            <g id="maintenance--Sign--inject-3" class="animable"
                                style="transform-origin: 151.76px 75.22px;">
                                <rect x="111.29" y="68.7" width="80.94" height="26.79"
                                    style="fill: rgb(64, 123, 255); transform-origin: 151.76px 82.095px;"
                                    id="el8xxqteo5rd6" class="animable"></rect>
                                <rect x="112.79" y="54.95" width="1" height="13.75"
                                    style="fill: rgb(64, 123, 255); transform-origin: 113.29px 61.825px;"
                                    id="elgii461gqonw" class="animable"></rect>
                                <rect x="190.85" y="54.95" width="1" height="13.75"
                                    style="fill: rgb(64, 123, 255); transform-origin: 191.35px 61.825px;"
                                    id="eliiw2rqxnxme" class="animable"></rect>
                                <g id="elazfjcvxegpg">
                                    <g style="opacity: 0.7; transform-origin: 150.955px 81.215px;" class="animable">
                                        <rect x="111.29" y="68.7" width="79.33" height="25.03"
                                            style="fill: rgb(255, 255, 255); transform-origin: 150.955px 81.215px;"
                                            id="elf9ibcwlapm9" class="animable"></rect>
                                    </g>
                                </g>
                                <rect x="124.98" y="73.53" width="56.34" height="4.87"
                                    style="fill: rgb(64, 123, 255); transform-origin: 153.15px 75.965px;"
                                    id="elc73jbzr0dwo" class="animable"></rect>
                                <rect x="169.25" y="82.1" width="12.08" height="1.9"
                                    style="fill: rgb(64, 123, 255); transform-origin: 175.29px 83.05px;"
                                    id="elz62dleukjr" class="animable"></rect>
                                <rect x="157.09" y="87.69" width="24.24" height="1.9"
                                    style="fill: rgb(64, 123, 255); transform-origin: 169.21px 88.64px;"
                                    id="eltzklc3jcjk" class="animable"></rect>
                            </g>
                            <g id="maintenance--character-1--inject-3" class="animable"
                                style="transform-origin: 107.28px 266.53px;">
                                <g id="elh2t3r0juoqc">
                                    <path
                                        d="M93.66,413.91a2.56,2.56,0,0,0,3.15-2.55l0-4.94h64.46l0,3.89a3.87,3.87,0,0,0,3.19,3.6,2.56,2.56,0,0,0,3.15-2.55l-1.2-245.1a3.87,3.87,0,0,0-3.18-3.61,2.57,2.57,0,0,0-3.16,2.55l0,3.92H95.63l0-2.86a3.86,3.86,0,0,0-3.18-3.61,2.56,2.56,0,0,0-3.15,2.55l1.2,245.11A3.85,3.85,0,0,0,93.66,413.91ZM161,355H96.54l-.2-41.46H160.8ZM95.88,220.57h64.46l.21,41.47H96.08ZM160.57,267l.2,41.46H96.31L96.11,267Zm-.45-92.93.2,41.47H95.86l-.21-41.47ZM96.77,401.43,96.56,360H161l.2,41.47Z"
                                        style="opacity: 0.2; transform-origin: 128.455px 288.28px;" class="animable">
                                    </path>
                                </g>
                                <path
                                    d="M50.16,413.91a3.13,3.13,0,0,0,3.61-2.55l.85-4.94h64.46l-.67,3.89a3.12,3.12,0,0,0,6.16,1.05l42-245.1a3.12,3.12,0,1,0-6.15-1.06l-.67,3.92H95.3l.49-2.86a3.13,3.13,0,0,0-6.16-1.06l-42,245.11A3.11,3.11,0,0,0,50.16,413.91Zm77.74-59H63.44l7.11-41.46H135ZM86.47,220.57h64.47L143.83,262H79.37ZM143,267l-7.1,41.46H71.4L78.51,267Zm15.93-92.93-7.11,41.47H87.33l7.11-41.47ZM55.47,401.43,62.58,360H127l-7.1,41.47Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 107.1px 288.28px;" id="elocqqk6stil"
                                    class="animable"></path>
                                <g id="ele4gdk6kn96o">
                                    <path
                                        d="M50.16,413.91a3.13,3.13,0,0,0,3.61-2.55l.85-4.94h64.46l-.67,3.89a3.12,3.12,0,0,0,6.16,1.05l42-245.1a3.12,3.12,0,1,0-6.15-1.06l-.67,3.92H95.3l.49-2.86a3.13,3.13,0,0,0-6.16-1.06l-42,245.11A3.11,3.11,0,0,0,50.16,413.91Zm77.74-59H63.44l7.11-41.46H135ZM86.47,220.57h64.47L143.83,262H79.37ZM143,267l-7.1,41.46H71.4L78.51,267Zm15.93-92.93-7.11,41.47H87.33l7.11-41.47ZM55.47,401.43,62.58,360H127l-7.1,41.47Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 107.1px 288.28px;"
                                        class="animable"></path>
                                </g>
                                <path d="M176.22,183.75H154.66a2,2,0,0,1-2-2h0V154.91h0a2,2,0,0,0,2,2h21.56Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 164.44px 169.33px;"
                                    id="elga7yubd39bv" class="animable"></path>
                                <g id="elj1lz37r5peb">
                                    <path d="M176.22,183.75H154.66a2,2,0,0,1-2-2h0V154.91h0a2,2,0,0,0,2,2h21.56Z"
                                        style="opacity: 0.3; transform-origin: 164.44px 169.33px;" class="animable">
                                    </path>
                                </g>
                                <path d="M176.22,156.93H154.66a2,2,0,0,1-2-2h0a2,2,0,0,1,2-2h21.56Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 164.44px 154.93px;"
                                    id="el2kdeeimh9d8" class="animable"></path>
                                <g id="elxk4beitzyu">
                                    <path d="M176.22,156.93H154.66a2,2,0,0,1-2-2h0a2,2,0,0,1,2-2h21.56Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 164.44px 154.93px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M152.64,154.91a2,2,0,0,0,2,2h21.56v-.7H154.66a1.32,1.32,0,0,1,0-2.64h21.56v-.7H154.66A2,2,0,0,0,152.64,154.91Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 164.43px 154.89px;"
                                    id="eltnb594j24k" class="animable"></path>
                                <rect x="157.43" y="162.7" width="14.01" height="8.87"
                                    style="fill: rgb(64, 123, 255); transform-origin: 164.435px 167.135px;"
                                    id="ely8ug8xrfc0a" class="animable"></rect>
                                <g id="elzxsj5aytue">
                                    <rect x="157.43" y="162.7" width="14.01" height="8.87"
                                        style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 164.435px 167.135px;"
                                        class="animable"></rect>
                                </g>
                                <polygon points="49.11 320.5 44.25 334 51.74 336.9 57.59 324.45 49.11 320.5"
                                    style="fill: rgb(255, 139, 123); transform-origin: 50.92px 328.7px;"
                                    id="elxx76gjqwm2" class="animable"></polygon>
                                <path
                                    d="M52.51,337.55a.2.2,0,0,1,.07-.36c.14,0,3.46-.58,4.64.27a1,1,0,0,1,.42.65.75.75,0,0,1-.28.82,3.58,3.58,0,0,1-2.53-.26A14.16,14.16,0,0,1,52.51,337.55Zm.69,0c1.4.72,3.38,1.44,3.94,1.07.07,0,.16-.14.11-.42a.54.54,0,0,0-.27-.4,1.83,1.83,0,0,0-.34-.18A9.25,9.25,0,0,0,53.2,337.53Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 55.047px 338.024px;"
                                    id="eln70j3isnsg7" class="animable"></path>
                                <path
                                    d="M52.41,337.51a.21.21,0,0,1,0-.2c0-.1,1-2.14,2.35-2.59a1.48,1.48,0,0,1,1.15.07c.5.24.56.56.5.78-.16.94-2.68,1.95-3.77,2a.08.08,0,0,1-.08,0A.21.21,0,0,1,52.41,337.51Zm3.23-2.41a1,1,0,0,0-.73,0,4.73,4.73,0,0,0-1.94,2c1.19-.21,2.92-1.09,3.07-1.64,0-.05,0-.19-.29-.34l-.11,0Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 54.4069px 336.108px;"
                                    id="elusm2lpoyswo" class="animable"></path>
                                <path
                                    d="M52.12,336.16,43.55,333a.73.73,0,0,0-.87.29l-4.14,6.4a1.22,1.22,0,0,0,.35,1.69,1,1,0,0,0,.23.12c3.11,1.09,5.92,1.95,9.76,3.38,4.54,1.69,3.18,1.8,8.49,3.86,3.2,1.23,5.14-2.2,3.85-2.89-5.95-3.1-5.9-5.22-7.47-8.35A3,3,0,0,0,52.12,336.16Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 49.9816px 340.979px;"
                                    id="eltkkknd1xrb" class="animable"></path>
                                <g id="elz1ay2m7l7yc">
                                    <polygon points="46.78 326.98 54.64 330.73 57.59 324.45 49.11 320.5 46.78 326.98"
                                        style="fill: rgb(38, 50, 56); opacity: 0.2; transform-origin: 52.185px 325.615px;"
                                        class="animable"></polygon>
                                </g>
                                <polygon points="93.93 333.43 95.22 347.72 103.24 347.18 103.28 333.43 93.93 333.43"
                                    style="fill: rgb(255, 139, 123); transform-origin: 98.605px 340.575px;"
                                    id="elr3frlxzsgc" class="animable"></polygon>
                                <path
                                    d="M104.62,346.94a.2.2,0,0,1-.16-.16.19.19,0,0,1,.09-.21c.12-.08,3-1.85,4.39-1.51a1,1,0,0,1,.64.44.74.74,0,0,1,0,.86,3.59,3.59,0,0,1-2.44.73A15.77,15.77,0,0,1,104.62,346.94Zm.64-.29c1.56.14,3.67.05,4-.51,0-.07.1-.19-.06-.43a.53.53,0,0,0-.4-.26,1.2,1.2,0,0,0-.38,0A9.27,9.27,0,0,0,105.26,346.65Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 107.086px 346.058px;"
                                    id="elae5s7ixbqle" class="animable"></path>
                                <path
                                    d="M104.52,346.93a.19.19,0,0,1-.1-.17c0-.11.15-2.37,1.19-3.29a1.49,1.49,0,0,1,1.09-.38c.55,0,.73.31.76.54.21.93-1.74,2.82-2.72,3.3h-.09A.2.2,0,0,1,104.52,346.93Zm2.06-3.46a1.09,1.09,0,0,0-.68.28,4.67,4.67,0,0,0-1,2.6c1-.65,2.29-2.11,2.21-2.68,0-.05,0-.19-.4-.21Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 105.948px 345.014px;"
                                    id="elk98jkedp5t" class="animable"></path>
                                <path
                                    d="M103.73,345.8l-9.14.33a.73.73,0,0,0-.69.6l-1.39,7.49a1.22,1.22,0,0,0,1,1.43l.26,0c3.29-.18,6.21-.46,10.31-.6,4.84-.17,3.63.45,9.32.33,3.43-.08,3.92-4,2.46-4.14-6.68-.6-7.44-2.58-10.09-4.87A3,3,0,0,0,103.73,345.8Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 104.561px 350.719px;"
                                    id="ell847zrszdlg" class="animable"></path>
                                <g id="elmgxvrsgauhs">
                                    <polygon points="103.28 333.43 93.93 333.43 94.61 340.89 103.26 340.65 103.28 333.43"
                                        style="fill: rgb(38, 50, 56); opacity: 0.2; transform-origin: 98.605px 337.16px;"
                                        class="animable"></polygon>
                                </g>
                                <path
                                    d="M87.05,201s-14.34,9.44-12,37.21l-2.39,31.46s-14.22,9.54-25.55,53.5a25.84,25.84,0,0,0,10,4.85l34.2-52.32L104,221.23l1.48-18.13Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 76.295px 264.51px;"
                                    id="eltsvy1gyp11" class="animable"></path>
                                <g id="elo9gwy8t7fj">
                                    <path d="M97.62,248.51l-5.16-20-8.22-4.05s0,39,3.69,56.4l3.37-5.16Z"
                                        style="opacity: 0.4; transform-origin: 90.93px 252.66px;" class="animable">
                                    </path>
                                </g>
                                <path
                                    d="M79.62,167.3S69.3,180.24,72.1,185.77s11.61,6.07,11.61,6.07A4.22,4.22,0,0,0,87,194.13l1.74-8a3.85,3.85,0,0,0-3.88.13l-5.77-3.5,7.95-10.53Z"
                                    style="fill: rgb(255, 139, 123); transform-origin: 80.1791px 180.715px;"
                                    id="elb4gklodbyyf" class="animable"></path>
                                <path d="M94.34,158.37s-8,.3-12.3,3.94-5,5.8-5,5.8,2.85,4.14,11.34,6.38Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 85.69px 166.43px;"
                                    id="elupg0azc1wuo" class="animable"></path>
                                <g id="elk3im08zke0d">
                                    <path
                                        d="M88.39,174.49l3.21-8.7-3.45-3.54a25,25,0,0,0-3.91,10.84A30,30,0,0,0,88.39,174.49Z"
                                        style="opacity: 0.1; transform-origin: 87.92px 168.37px;" class="animable">
                                    </path>
                                </g>
                                <path
                                    d="M90.46,201S78.63,214,85.87,239.3L91,271.13s-6.48,30.31,1.48,66.34a37.46,37.46,0,0,0,12.06-.27l7.4-67.84,3.7-64.85Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 99.5821px 269.417px;"
                                    id="elbrl1656j2wa" class="animable"></path>
                                <path
                                    d="M98.46,157.91s4.37-.44,4.3-8.47c0,0,4-1.85,6.64.53s-2.36,7.91.89,10.24C110.29,160.21,107.44,162.13,98.46,157.91Z"
                                    style="fill: rgb(255, 139, 123); transform-origin: 104.375px 154.7px;"
                                    id="el89e6w2hchbu" class="animable"></path>
                                <path
                                    d="M117.57,138.17c0-.54.36-.95.71-.93s.6.49.56,1-.35,1-.71.93S117.53,138.71,117.57,138.17Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 118.205px 138.208px;"
                                    id="elbwm5yuj58h8" class="animable"></path>
                                <path d="M117.94,139.14l2.84,3.75a3.54,3.54,0,0,1-3.13.57Z"
                                    style="fill: rgb(255, 86, 82); transform-origin: 119.215px 141.372px;"
                                    id="eldc0kho4v0lp" class="animable"></path>
                                <path
                                    d="M99,137.33c.32,6.8.32,9.69,3.7,13.22,5.2,3.62,13.39,3.43,15.1-3.33,1.54-6.09.75-16.17-5.87-19A9.3,9.3,0,0,0,99,137.33Z"
                                    style="fill: rgb(255, 139, 123); transform-origin: 108.726px 140.183px;"
                                    id="el78350rtrtgc" class="animable"></path>
                                <path
                                    d="M116.56,136.58a.36.36,0,0,0,.3-.07,2.5,2.5,0,0,1,2.19-.61.3.3,0,0,0,.38-.22.31.31,0,0,0-.21-.39,3.14,3.14,0,0,0-2.78.74.3.3,0,0,0,0,.43v0A.34.34,0,0,0,116.56,136.58Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 117.897px 135.903px;"
                                    id="el7johe35thwx" class="animable"></path>
                                <path d="M118.15,137.27l1.48-.22S118.74,138.06,118.15,137.27Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 118.89px 137.311px;"
                                    id="elnzwzquqmpr" class="animable"></path>
                                <g id="eleax7h0ir1y">
                                    <path
                                        d="M105.88,152.17a8.94,8.94,0,0,0,3.63,3.32c.22-.88.48-1.78.6-2.61A12.69,12.69,0,0,1,105.88,152.17Z"
                                        style="opacity: 0.2; transform-origin: 107.995px 153.83px;" class="animable">
                                    </path>
                                </g>
                                <path
                                    d="M111.13,141.27s4.09-4.38,2.44-8.71c0,0,4.66.55,4.37-3s-5.16-2.52-5.16-2.52,2.63-4.2.47-5.35-6,2.28-6,2.28-9.51-1.46-12.38,9.37-9.17,4.4-9.62,9.11c-.51,5.22,7,4.51,7,4.51a3.7,3.7,0,0,0,2.8,4.79,5.63,5.63,0,0,0,6.08-1.57s-.26,3.69,4,3.24c5-.51,3.92-3.77,4.35-5.46S111.89,144.54,111.13,141.27Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 101.589px 137.456px;"
                                    id="elv8dpjwadj6s" class="animable"></path>
                                <path d="M107.32,124.84s-1.84-5.43,1.38-5.73S107.2,120.87,107.32,124.84Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 108.311px 121.961px;"
                                    id="eld7oew4bvikk" class="animable"></path>
                                <path
                                    d="M111.08,139.63a5.22,5.22,0,0,1,1.71,3.63c.08,1.85-1.68,2.36-3.2,1.51s-3.06-2.66-2.41-4.35A2.37,2.37,0,0,1,111.08,139.63Z"
                                    style="fill: rgb(255, 139, 123); transform-origin: 109.91px 142.043px;"
                                    id="eljsqvuqvk3bq" class="animable"></path>
                                <path d="M96.37,159.07s-1.52-6.47,8.19-3.64,8.9,8.36,8.9,8.36Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 104.88px 159.252px;"
                                    id="elo8q4zienl5j" class="animable"></path>
                                <g id="el0i6wf2sxnarn">
                                    <path d="M96.37,159.07s-1.52-6.47,8.19-3.64,8.9,8.36,8.9,8.36Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 104.88px 159.252px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M83.38,204.24s4.52-15.55,4.13-25.64-4-22.09,12.69-20.2,20.25,7.68,20.25,16.85-4.69,35.2-4.69,35.2S98.8,214.9,83.38,204.24Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 101.915px 184.787px;"
                                    id="elsvbmvvg7h4a" class="animable"></path>
                                <g id="elgm5e2rscp3">
                                    <path
                                        d="M120.45,175.25a20.87,20.87,0,0,0-.75-6l-5.54-2.59L111,171.31s4.5,10.11,8.59,14.25A96.11,96.11,0,0,0,120.45,175.25Z"
                                        style="opacity: 0.1; transform-origin: 115.727px 176.11px;" class="animable">
                                    </path>
                                </g>
                                <path
                                    d="M126.21,171.29s5.42,5.4,7.63,7.57l16.84-4.64,1.45-4.36,2.53-.14,7.67-2.29,2.85,2.81-2.77,6L153.32,178s-14.81,8.18-20.24,7.66-12.56-7-12.56-7Z"
                                    style="fill: rgb(255, 139, 123); transform-origin: 142.85px 176.557px;"
                                    id="ele6qsy00hct" class="animable"></path>
                                <path
                                    d="M112.69,161.49c4.66.68,9.42,4.38,16.82,10.93a22.69,22.69,0,0,1-7.82,9s-4.32-1.89-9.45-8.43C106,165.13,109.83,161.07,112.69,161.49Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 119.194px 171.44px;"
                                    id="elj58u0dnvhjo" class="animable"></path>
                            </g>
                            <g id="maintenance--Table--inject-3" class="animable"
                                style="transform-origin: 325.875px 343.952px;">
                                <path
                                    d="M296.68,414h0c-1.59,0-2.86-.47-2.81-2l3.28-103.12h5.61l-3.28,103.29C299.43,413.6,298.19,414,296.68,414Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 298.314px 361.44px;"
                                    id="elgzhzyng1p5" class="animable"></path>
                                <g id="elo95psk5p3bp">
                                    <path
                                        d="M296.68,414h0c-1.59,0-2.86-.47-2.81-2l3.28-103.12h5.61l-3.28,103.29C299.43,413.6,298.19,414,296.68,414Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 298.314px 361.44px;"
                                        class="animable"></path>
                                </g>
                                <rect x="282" y="308.79" width="69.9" height="14.71"
                                    style="fill: rgb(38, 50, 56); transform-origin: 316.95px 316.145px;"
                                    id="el4x52xadci7e" class="animable"></rect>
                                <g id="elhpj43520vgl">
                                    <rect x="282" y="308.79" width="69.9" height="14.71"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 316.95px 316.145px;"
                                        class="animable"></rect>
                                </g>
                                <rect x="351.9" y="308.79" width="17.93" height="14.71"
                                    style="fill: rgb(64, 123, 255); transform-origin: 360.865px 316.145px;"
                                    id="eldya51o3bd5q" class="animable"></rect>
                                <rect x="351.9" y="308.79" width="17.93" height="14.71"
                                    style="fill: rgb(38, 50, 56); transform-origin: 360.865px 316.145px;"
                                    id="elgescgc6aw99" class="animable"></rect>
                                <g id="el4zzdiy8gh4a">
                                    <rect x="351.9" y="308.79" width="17.93" height="14.71"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 360.865px 316.145px;"
                                        class="animable"></rect>
                                </g>
                                <path
                                    d="M375.54,414h0c1.6,0,2.88-.51,2.79-2.12l-5.72-103H367l5.74,103.36C372.82,413.64,374.05,414,375.54,414Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 372.667px 361.44px;"
                                    id="elo3u5c8cmnei" class="animable"></path>
                                <g id="elmn5udmqecp">
                                    <path
                                        d="M375.54,414h0c1.6,0,2.88-.51,2.79-2.12l-5.72-103H367l5.74,103.36C372.82,413.64,374.05,414,375.54,414Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 372.667px 361.44px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M355.13,414h0c1.58,0,2.85-.47,2.8-2l-3.28-103.12H349l3.28,103.29C352.37,413.6,353.61,414,355.13,414Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 353.466px 361.44px;"
                                    id="elt6v2mpzjpga" class="animable"></path>
                                <g id="eldyiey28yyqc">
                                    <path
                                        d="M355.13,414h0c1.58,0,2.85-.47,2.8-2l-3.28-103.12H349l3.28,103.29C352.37,413.6,353.61,414,355.13,414Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 353.466px 361.44px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M276.27,414h0c-1.61,0-2.89-.51-2.8-2.12l5.73-103h5.61l-5.75,103.36C279,413.64,277.75,414,276.27,414Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 279.138px 361.44px;"
                                    id="eluoyx9bfpsu8" class="animable"></path>
                                <g id="eleb7k2i0kfgr">
                                    <path
                                        d="M276.27,414h0c-1.61,0-2.89-.51-2.8-2.12l5.73-103h5.61l-5.75,103.36C279,413.64,277.75,414,276.27,414Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.2; transform-origin: 279.138px 361.44px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M259,304.15H392.75a2.68,2.68,0,0,1,2.68,2.68v3.9a2.69,2.69,0,0,1-2.69,2.69H259a2.68,2.68,0,0,1-2.68-2.68v-3.9a2.68,2.68,0,0,1,2.68-2.68Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 325.875px 308.785px;"
                                    id="elgmipfi7rlxv" class="animable"></path>
                                <g id="elqkpfs5fqhx">
                                    <path
                                        d="M259,304.15H392.75a2.68,2.68,0,0,1,2.68,2.68v3.9a2.69,2.69,0,0,1-2.69,2.69H259a2.68,2.68,0,0,1-2.68-2.68v-3.9a2.68,2.68,0,0,1,2.68-2.68Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 325.875px 308.785px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M331.89,275.43v7.39a.71.71,0,0,1,0,1.42c-2.82,0-5.64,0-8.46,0V274h8.46A.71.71,0,0,1,331.89,275.43Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 328.018px 279.12px;"
                                    id="elvj5qq83c5z" class="animable"></path>
                                <g id="el1qauj3m2064">
                                    <path
                                        d="M331.89,275.43v7.39a.71.71,0,0,1,0,1.42c-2.82,0-5.64,0-8.46,0V274h8.46A.71.71,0,0,1,331.89,275.43Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 328.018px 279.12px;"
                                        class="animable"></path>
                                </g>
                                <rect x="325.32" y="275.44" width="6.57" height="7.38"
                                    style="fill: rgb(64, 123, 255); transform-origin: 328.605px 279.13px;"
                                    id="el10j3dq65cvtg" class="animable"></rect>
                                <g id="elhq0cosprulq">
                                    <rect x="325.32" y="275.44" width="6.57" height="7.38"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 328.605px 279.13px;"
                                        class="animable"></rect>
                                </g>
                                <path d="M326.7,274.72H290.43c-1.57,0-2.84,2-2.84,4.41s1.27,4.4,2.84,4.4H326.7Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 307.145px 279.125px;"
                                    id="elbkl2robstcd" class="animable"></path>
                                <g id="elsftzjnbu1om">
                                    <path d="M326.7,274.72H290.43c-1.57,0-2.84,2-2.84,4.41s1.27,4.4,2.84,4.4H326.7Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.9; transform-origin: 307.145px 279.125px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M326.7,284.24c-7.46,0-28.42.14-35.88,0-5.11-.09-5.38-9.88-.37-10.23,3.49-.24,7.08,0,10.58,0H326.7a.71.71,0,0,1,0,1.42H292c-1.64,0-2.81,0-3.44,1.95-.55,1.67-.37,5.08,1.87,5.44a4.82,4.82,0,0,0,.76,0H326.7a.71.71,0,0,1,0,1.42Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 307.123px 279.103px;"
                                    id="el07v57t7ny7jw" class="animable"></path>
                                <g id="elufbbv95qwa">
                                    <g style="opacity: 0.2; transform-origin: 307.123px 279.103px;" class="animable">
                                        <path
                                            d="M326.7,284.24c-7.46,0-28.42.14-35.88,0-5.11-.09-5.38-9.88-.37-10.23,3.49-.24,7.08,0,10.58,0H326.7a.71.71,0,0,1,0,1.42H292c-1.64,0-2.81,0-3.44,1.95-.55,1.67-.37,5.08,1.87,5.44a4.82,4.82,0,0,0,.76,0H326.7a.71.71,0,0,1,0,1.42Z"
                                            style="fill: rgb(255, 255, 255); transform-origin: 307.123px 279.103px;"
                                            id="elj7bqztgusm" class="animable"></path>
                                    </g>
                                </g>
                                <path
                                    d="M330.63,285.41v6.85a.66.66,0,0,1,0,1.31l-7.84,0v-9.5h7.84A.66.66,0,0,1,330.63,285.41Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 327.045px 288.82px;"
                                    id="elfxa47h3sbb" class="animable"></path>
                                <g id="elemkdlz1rm9h">
                                    <path
                                        d="M330.63,285.41v6.85a.66.66,0,0,1,0,1.31l-7.84,0v-9.5h7.84A.66.66,0,0,1,330.63,285.41Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 327.045px 288.82px;"
                                        class="animable"></path>
                                </g>
                                <rect x="324.54" y="285.42" width="6.09" height="6.84"
                                    style="fill: rgb(64, 123, 255); transform-origin: 327.585px 288.84px;"
                                    id="elwjv0cau0c7i" class="animable"></rect>
                                <g id="elx81tz8wj3y">
                                    <rect x="324.54" y="285.42" width="6.09" height="6.84"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 327.585px 288.84px;"
                                        class="animable"></rect>
                                </g>
                                <path d="M325.82,284.75H292.23c-1.45,0-2.63,1.83-2.63,4.08s1.18,4.08,2.63,4.08h33.59Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 307.71px 288.83px;"
                                    id="elhx4iqzgo2ul" class="animable"></path>
                                <g id="eliooohq1v3a8">
                                    <path d="M325.82,284.75H292.23c-1.45,0-2.63,1.83-2.63,4.08s1.18,4.08,2.63,4.08h33.59Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.9; transform-origin: 307.71px 288.83px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M325.82,293.57c-6.91,0-26.32.12-33.23,0-4.73-.09-5-9.15-.34-9.47,3.23-.22,6.56,0,9.8,0h23.77a.66.66,0,0,1,0,1.31H293.69c-1.52,0-2.6,0-3.19,1.8-.51,1.55-.35,4.71,1.73,5.05a5.61,5.61,0,0,0,.71,0h32.88a.66.66,0,0,1,0,1.31Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 307.647px 288.813px;"
                                    id="elg3qtqj78exs" class="animable"></path>
                                <path
                                    d="M334.53,295v8.15a.78.78,0,0,1,0,1.56c-3.1,0-6.21,0-9.32,0V293.45h9.32A.78.78,0,0,1,334.53,295Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 330.26px 299.08px;"
                                    id="elpygh6nt1s9" class="animable"></path>
                                <g id="eldakl9arz42i">
                                    <path
                                        d="M334.53,295v8.15a.78.78,0,0,1,0,1.56c-3.1,0-6.21,0-9.32,0V293.45h9.32A.78.78,0,0,1,334.53,295Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 330.26px 299.08px;"
                                        class="animable"></path>
                                </g>
                                <rect x="327.29" y="295.02" width="7.24" height="8.14"
                                    style="fill: rgb(64, 123, 255); transform-origin: 330.91px 299.09px;"
                                    id="elk7hyhkrudf" class="animable"></rect>
                                <g id="el2dguvs6rtw2">
                                    <rect x="327.29" y="295.02" width="7.24" height="8.14"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 330.91px 299.09px;"
                                        class="animable"></rect>
                                </g>
                                <path d="M328.81,294.23h-40c-1.72,0-3.12,2.17-3.12,4.85s1.4,4.86,3.12,4.86h40Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 307.25px 299.085px;"
                                    id="el9t2qvezec8v" class="animable"></path>
                                <g id="elyhssp6967p">
                                    <path d="M328.81,294.23h-40c-1.72,0-3.12,2.17-3.12,4.85s1.4,4.86,3.12,4.86h40Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.9; transform-origin: 307.25px 299.085px;"
                                        class="animable"></path>
                                </g>
                                <path
                                    d="M328.81,304.72c-8.22,0-31.32.15-39.54,0-5.63-.1-5.93-10.89-.41-11.27,3.85-.26,7.81,0,11.66,0h28.29a.78.78,0,0,1,0,1.56H290.57c-1.8,0-3.09,0-3.79,2.15-.6,1.84-.41,5.59,2.05,6a6,6,0,0,0,.85,0h39.13a.78.78,0,0,1,0,1.56Z"
                                    style="fill: rgb(64, 123, 255); transform-origin: 307.235px 299.061px;"
                                    id="ellonhc25t9u" class="animable"></path>
                                <g id="elfr7wqugt5me">
                                    <g style="opacity: 0.2; transform-origin: 307.235px 299.061px;" class="animable">
                                        <path
                                            d="M328.81,304.72c-8.22,0-31.32.15-39.54,0-5.63-.1-5.93-10.89-.41-11.27,3.85-.26,7.81,0,11.66,0h28.29a.78.78,0,0,1,0,1.56H290.57c-1.8,0-3.09,0-3.79,2.15-.6,1.84-.41,5.59,2.05,6a6,6,0,0,0,.85,0h39.13a.78.78,0,0,1,0,1.56Z"
                                            id="eltsqupi20koi" class="animable"
                                            style="transform-origin: 307.235px 299.061px;"></path>
                                    </g>
                                </g>
                            </g>
                            <defs>
                                <filter id="active" height="200%">
                                    <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                        radius="2"></feMorphology>
                                    <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                                    <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE">
                                    </feComposite>
                                    <feMerge>
                                        <feMergeNode in="OUTLINE"></feMergeNode>
                                        <feMergeNode in="SourceGraphic"></feMergeNode>
                                    </feMerge>
                                </filter>
                                <filter id="hover" height="200%">
                                    <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                        radius="2"></feMorphology>
                                    <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                                    <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE">
                                    </feComposite>
                                    <feMerge>
                                        <feMergeNode in="OUTLINE"></feMergeNode>
                                        <feMergeNode in="SourceGraphic"></feMergeNode>
                                    </feMerge>
                                    <feColorMatrix type="matrix"
                                        values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 ">
                                    </feColorMatrix>
                                </filter>
                            </defs>
                        </svg>

                        {{-- <img src="assets/images/page-404-image.png" alt="Error" width="699" height="380"> --}}
                    </div>

                    <div class="error-page__content">

                        <h1 style="padding-bottom: 12px">Website Maintenance</h1>
                        <p>Our website will be temporarily unavailable for scheduled maintenance.</p>
                        <p class="downtime-info">Downtime: <b style="font-weight: 700">12:00 PM to 4:00 PM (IST)</b></p>
                        <p>We apologize for any inconvenience this may cause and appreciate your patience as we work
                            diligently to improve your browsing experience.</p>
                        <p>If you have urgent inquiries or require immediate assistance during this time, please contact us
                            at <a href="mailto:support@schooldekho.org">support@schooldekho.org</a> & <a href="mailto:info@schooldekho.org">info@schooldekho.org</a>.   
                            
                            </p>
                        <p>For updates and announcements, follow us on social media: <a
                                href="https://twitter.com/dekho_school">Twitter</a> | <a
                                href="https://www.facebook.com/theschooldekho">Facebook</a></p>
                        <p>Thank you for your understanding.</p>

                    </div>
                </div>

            </div>
        </div>
        <!-- 404 Page End -->

    </main>
@endsection
@push('js')
@endpush
