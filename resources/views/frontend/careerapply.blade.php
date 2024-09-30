@extends("layouts.frontend.app")
@push("css")
@endpush
@section("content")
    <style>
        svg#freepik_stories-job-hunt:not(.animated) .animable {
            opacity: 0;
        }

        svg#freepik_stories-job-hunt.animated #freepik--background-complete--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomOut;
            animation-delay: 0s;
        }

        svg#freepik_stories-job-hunt.animated #freepik--Shadow--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomIn;
            animation-delay: 0s;
        }

        svg#freepik_stories-job-hunt.animated #freepik--Briefcases--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        svg#freepik_stories-job-hunt.animated #freepik--Character--inject-48 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomIn;
            animation-delay: 0s;
        }

        @keyframes zoomOut {
            0% {
                opacity: 0;
                transform: scale(1.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
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

        .course-list-info__meta {
            gap: 4px
        }

        .comment-form-c {
            display: flex;
        }

        @media (max-width: 768px) {
            .comment-form-c {
                flex-direction: column
            }
        }

        @media only screen and (max-width: 767px) {
            .section-padding-01 {
                padding-top: 26px;
                padding-bottom: 50px;
            }

            .course-list-info {
                padding-left: 0;
                padding-top: 0px;
            }

            .footer-section {
                padding-top: 25px;
            }
    </style>
    <main class="main-wrapper">
        <div class="page-banner bg-color-05" style="margin-top: 150.641px;">
            <div class="page-banner__wrapper" style="margin-top: 150.641px;">
                <div class="container">
                    <div class="page-breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item">Careers</li>
                            <li class="breadcrumb-item active">{{$job_details->job_title}}</li>
                        </ul>
                    </div>
                    <div class="page-banner__caption text-center">
                        <h2 style="text-align:left  ;" class="page-banner__main-title">{{$job_details->job_title}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses-section section-padding-01">
    </div> 
        <div class="container">
            <div class="comment-form-c">
                <div style="display: flex;  flex-direction: column " class="comment-form col-md-6 p-5">
                    <h2 style="    display: contents;    font-size: 32px;" class="course-list-info__title pb-5">Couldn't
                        find a job that suits
                        your preferences?</h2>
                    <div style="justify-content: center ; display:flex ; height: auto; width:auto; ">
                        <svg id="freepik_stories-job-hunt" height="250" width="250" class="animated"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
                            <g id="freepik--background-complete--inject-48" class="animable"
                                style="transform-origin: 250px 226.165px;">
                                <rect id="elkxtf32ipbo" y="382.4" width="500" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 250px 382.525px;" class="animable">
                                </rect>
                                <rect id="el6ymjvxi2f5p" x="52.46" y="391.92" width="33.12" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 69.02px 392.045px;" class="animable">
                                </rect>
                                <rect id="elydw14euyy5" x="171.14" y="392.05" width="53.86" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 198.07px 392.175px;"
                                    class="animable"></rect>
                                <rect id="elmkq3gn9e0am" x="105.77" y="397.08" width="19.19" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 115.365px 397.205px;"
                                    class="animable"></rect>
                                <rect id="ele0005kfhnib" x="426.77" y="396.96" width="19.23" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 436.385px 397.085px;"
                                    class="animable"></rect>
                                <rect id="eltir6o9pjsaq" x="387.57" y="396.96" width="30.29" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 402.715px 397.085px;"
                                    class="animable"></rect>
                                <rect id="elnubc1mb0mza" x="328.33" y="395.31" width="42.56" height="0.25"
                                    style="fill: rgb(235, 235, 235); transform-origin: 349.61px 395.435px;"
                                    class="animable"></rect>
                                <path id="elrxzvucq6mp"
                                    d="M237,337.8H43.91a5.71,5.71,0,0,1-5.7-5.71V60.66A5.71,5.71,0,0,1,43.91,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.91,55.2a5.46,5.46,0,0,0-5.45,5.46V332.09a5.46,5.46,0,0,0,5.45,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z"
                                    style="fill: rgb(235, 235, 235); transform-origin: 140.46px 196.4px;" class="animable">
                                </path>
                                <path id="elyh6ne8bihcl"
                                    d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z"
                                    style="fill: rgb(235, 235, 235); transform-origin: 356.75px 196.4px;" class="animable">
                                </path>
                                <g id="el55zywc8abn">
                                    <rect x="302.21" y="241.5" width="28.32" height="140.9"
                                        style="fill: rgb(230, 230, 230); transform-origin: 316.37px 311.95px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <polygon id="el1njjt10zcrc"
                                    points="307.59 382.4 302.21 382.4 302.21 367.1 313.23 367.1 307.59 382.4"
                                    style="fill: rgb(240, 240, 240); transform-origin: 307.72px 374.75px;" class="animable">
                                </polygon>
                                <g id="elb8uo24de49r">
                                    <rect x="408.06" y="241.5" width="28.32" height="140.9"
                                        style="fill: rgb(230, 230, 230); transform-origin: 422.22px 311.95px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elztpyrnom7q">
                                    <rect x="302.21" y="241.5" width="110.54" height="131.51"
                                        style="fill: rgb(240, 240, 240); transform-origin: 357.48px 307.255px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elh9q6r7rguwu">
                                    <rect x="318.25" y="316.45" width="25.57" height="49.29"
                                        style="fill: rgb(230, 230, 230); transform-origin: 331.035px 341.095px; transform: rotate(-90deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elrv2buye6jo">
                                    <rect x="371.15" y="316.45" width="25.57" height="49.29"
                                        style="fill: rgb(230, 230, 230); transform-origin: 383.935px 341.095px; transform: rotate(-90deg);"
                                        class="animable"></rect>
                                </g>
                                <path id="elyktq0hje19"
                                    d="M379.06,332.59h9.75a15.4,15.4,0,0,0,11.2-4.82H367.86A15.4,15.4,0,0,0,379.06,332.59Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 383.935px 330.18px;"
                                    class="animable"></path>
                                <path id="eliblqy24xg1"
                                    d="M325.66,332.59h9.75a15.4,15.4,0,0,0,11.2-4.82H314.46A15.4,15.4,0,0,0,325.66,332.59Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 330.535px 330.18px;"
                                    class="animable"></path>
                                <g id="elrr5amdf37m">
                                    <rect x="318.25" y="276.7" width="25.57" height="49.29"
                                        style="fill: rgb(230, 230, 230); transform-origin: 331.035px 301.345px; transform: rotate(-90deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el1doohkvyvz5">
                                    <rect x="371.15" y="276.7" width="25.57" height="49.29"
                                        style="fill: rgb(230, 230, 230); transform-origin: 383.935px 301.345px; transform: rotate(-90deg);"
                                        class="animable"></rect>
                                </g>
                                <path id="el14pxh49x3i9"
                                    d="M379.06,292.84h9.75A15.43,15.43,0,0,0,400,288H367.86A15.43,15.43,0,0,0,379.06,292.84Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 383.93px 290.42px;"
                                    class="animable"></path>
                                <path id="elfwfd0qk7t74"
                                    d="M325.66,292.84h9.75a15.43,15.43,0,0,0,11.2-4.81H314.46A15.43,15.43,0,0,0,325.66,292.84Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 330.535px 290.435px;"
                                    class="animable"></path>
                                <g id="elougt0wm5xq">
                                    <rect x="318.25" y="236.96" width="25.57" height="49.29"
                                        style="fill: rgb(230, 230, 230); transform-origin: 331.035px 261.605px; transform: rotate(-90deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elb1ki1tfcsle">
                                    <rect x="371.15" y="236.96" width="25.57" height="49.29"
                                        style="fill: rgb(230, 230, 230); transform-origin: 383.935px 261.605px; transform: rotate(-90deg);"
                                        class="animable"></rect>
                                </g>
                                <path id="elxsnjmn8nq6"
                                    d="M379.06,253.1h9.75a15.4,15.4,0,0,0,11.2-4.82H367.86A15.4,15.4,0,0,0,379.06,253.1Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 383.935px 250.69px;"
                                    class="animable"></path>
                                <path id="el7vnwjme9qch"
                                    d="M325.66,253.1h9.75a15.4,15.4,0,0,0,11.2-4.82H314.46A15.4,15.4,0,0,0,325.66,253.1Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 330.535px 250.69px;"
                                    class="animable"></path>
                                <polygon id="eluaoban00jsa"
                                    points="407.38 382.4 412.76 382.4 412.76 367.1 401.74 367.1 407.38 382.4"
                                    style="fill: rgb(240, 240, 240); transform-origin: 407.25px 374.75px;"
                                    class="animable"></polygon>
                                <polygon id="elf8nwwf54sf"
                                    points="412.04 144.77 416.37 156.61 412.04 156.61 385.47 144.77 412.04 144.77"
                                    style="fill: rgb(245, 245, 245); transform-origin: 400.92px 150.69px;"
                                    class="animable"></polygon>
                                <polygon id="el2nyizyjqbpx"
                                    points="416.37 144.77 416.37 156.61 389.81 144.77 416.37 144.77"
                                    style="fill: rgb(230, 230, 230); transform-origin: 403.09px 150.69px;"
                                    class="animable"></polygon>
                                <polygon id="elioquyu8rbb"
                                    points="307.87 144.77 312.2 156.61 307.87 156.61 281.31 144.77 307.87 144.77"
                                    style="fill: rgb(245, 245, 245); transform-origin: 296.755px 150.69px;"
                                    class="animable"></polygon>
                                <polygon id="eltio3sgkm0vr" points="312.2 144.77 312.2 156.61 285.64 144.77 312.2 144.77"
                                    style="fill: rgb(230, 230, 230); transform-origin: 298.92px 150.69px;"
                                    class="animable"></polygon>
                                <rect id="ellw96djgcoj" x="406.98" y="136.31" width="28.89" height="9.01"
                                    style="fill: rgb(230, 230, 230); transform-origin: 421.425px 140.815px;"
                                    class="animable"></rect>
                                <g id="ely3a43fi6oq8">
                                    <rect x="263.35" y="136.31" width="143.63" height="9.01"
                                        style="fill: rgb(245, 245, 245); transform-origin: 335.165px 140.815px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <path id="el3tsdp5teao5" d="M377.81,105s.29,31.32,11.1,31.32S400,105,400,105Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 388.905px 120.66px;"
                                    class="animable"></path>
                                <path id="elrcsvqx1jzka" d="M310.78,126.1s.76,10.21,29.84,10.21,29.84-10.21,29.84-10.21Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 340.62px 131.205px;"
                                    class="animable"></path>
                                <path id="elcvasiq57cj4"
                                    d="M224.36,382.4h1.93l5.53-27.25,1-4.78,6-29.7H262l12.53,61.73h1.94l-12.77-62.86a.94.94,0,0,0-.93-.76H238.05a.93.93,0,0,0-.92.76l-5.3,26.08-1,4.77Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 250.415px 350.59px;"
                                    class="animable"></path>
                                <path id="eleahimxm8do"
                                    d="M187.23,382.4h1.93l12.54-61.73h23.12l6,29.72,1,4.76,5.54,27.25h1.93l-6.5-32-1-4.75-5.3-26.08a1,1,0,0,0-.93-.76H200.93a.94.94,0,0,0-.93.76Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 213.26px 350.605px;"
                                    class="animable"></path>
                                <path id="elo49khhgtetr"
                                    d="M265.46,311.58H198.19a5.83,5.83,0,0,0-5.82,5.82v.2a2.13,2.13,0,0,0,2.13,2.13h74.65a2.13,2.13,0,0,0,2.13-2.13v-.2A5.83,5.83,0,0,0,265.46,311.58Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 231.825px 315.655px;"
                                    class="animable"></path>
                                <path id="elfcmcpiy0czl"
                                    d="M156.85,382.4h1.93l5.53-27.25,1-4.78,6-29.7h23.12L207,382.4h1.94l-12.77-62.86a.94.94,0,0,0-.93-.76H170.54a.93.93,0,0,0-.92.76l-5.3,26.08-1,4.77Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 182.895px 350.59px;"
                                    class="animable"></path>
                                <path id="el352cfm8a9wv"
                                    d="M119.72,382.4h1.94l12.53-61.73h23.13l6,29.72,1,4.76,5.54,27.25h1.93l-6.5-32-1-4.75L159,319.54a1,1,0,0,0-.93-.76H133.42a.94.94,0,0,0-.93.76Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 145.755px 350.59px;"
                                    class="animable"></path>
                                <path id="el6aniknvnz6a"
                                    d="M198,311.58H130.68a5.83,5.83,0,0,0-5.82,5.82v.2a2.13,2.13,0,0,0,2.13,2.13h74.66a2.12,2.12,0,0,0,2.12-2.13v-.2A5.83,5.83,0,0,0,198,311.58Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 164.315px 315.655px;"
                                    class="animable"></path>
                                <g id="el3jv6c00i9ek">
                                    <rect x="84.33" y="77.76" width="96.65" height="154.83"
                                        style="fill: rgb(230, 230, 230); transform-origin: 132.655px 155.175px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elvtbyqefq3q8">
                                    <rect x="78.02" y="77.76" width="100.01" height="154.83"
                                        style="fill: rgb(240, 240, 240); transform-origin: 128.025px 155.175px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el2927vgsnqci">
                                    <rect x="84.33" y="232.6" width="96.65" height="11.74"
                                        style="fill: rgb(230, 230, 230); transform-origin: 132.655px 238.47px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eltwpypcja0x">
                                    <rect x="67.49" y="232.6" width="100.01" height="11.74"
                                        style="fill: rgb(240, 240, 240); transform-origin: 117.495px 238.47px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elwcvwz3fi7">
                                    <rect x="59.45" y="114.02" width="137.15" height="82.33"
                                        style="fill: rgb(250, 250, 250); transform-origin: 128.025px 155.185px; transform: rotate(90deg);"
                                        class="animable"></rect>
                                </g>
                                <polygon id="elgtlrhee2p8"
                                    points="169.89 223.75 140.93 86.61 116.43 86.61 145.39 223.75 169.89 223.75"
                                    style="fill: rgb(255, 255, 255); transform-origin: 143.16px 155.18px;"
                                    class="animable"></polygon>
                                <path id="el49sj45erwxn"
                                    d="M163.22,207.37a.63.63,0,0,0,.63-.63V92.36a.63.63,0,1,0-1.26,0V206.74A.63.63,0,0,0,163.22,207.37Z"
                                    style="fill: rgb(240, 240, 240); transform-origin: 163.22px 149.55px;"
                                    class="animable"></path>
                                <polygon id="ell8ytkn7zi0g"
                                    points="140.13 223.75 111.17 86.61 101.62 86.61 130.57 223.75 140.13 223.75"
                                    style="fill: rgb(255, 255, 255); transform-origin: 120.875px 155.18px;"
                                    class="animable"></polygon>
                                <g id="elqd1co9tng4o">
                                    <rect x="18.85" y="154.62" width="137.15" height="1.12"
                                        style="fill: rgb(230, 230, 230); transform-origin: 87.425px 155.18px; transform: rotate(90deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elx9i9zcb0nwq">
                                    <polygon points="75.92 93.4 172.57 93.4 173.39 90.04 76.74 90.04 75.92 93.4"
                                        style="fill: rgb(240, 240, 240); opacity: 0.6; transform-origin: 124.655px 91.72px;"
                                        class="animable"></polygon>
                                </g>
                                <g id="elgog0potf6y">
                                    <polygon points="75.92 101.21 172.57 101.21 173.39 97.86 76.74 97.86 75.92 101.21"
                                        style="fill: rgb(240, 240, 240); opacity: 0.6; transform-origin: 124.655px 99.535px;"
                                        class="animable"></polygon>
                                </g>
                                <g id="elxvn0gqi8sg">
                                    <polygon points="75.92 109.03 172.57 109.03 173.39 105.67 76.74 105.67 75.92 109.03"
                                        style="fill: rgb(240, 240, 240); opacity: 0.6; transform-origin: 124.655px 107.35px;"
                                        class="animable"></polygon>
                                </g>
                                <g id="eljovyt5kfkxi">
                                    <polygon points="75.92 116.84 172.57 116.84 173.39 113.49 76.74 113.49 75.92 116.84"
                                        style="fill: rgb(240, 240, 240); opacity: 0.6; transform-origin: 124.655px 115.165px;"
                                        class="animable"></polygon>
                                </g>
                                <g id="elto775lqn1z">
                                    <polygon points="75.92 124.66 172.57 124.66 173.39 121.31 76.74 121.31 75.92 124.66"
                                        style="fill: rgb(240, 240, 240); opacity: 0.6; transform-origin: 124.655px 122.985px;"
                                        class="animable"></polygon>
                                </g>
                                <g id="eljleohanvryc">
                                    <polygon points="75.92 132.48 172.57 132.48 173.39 129.12 76.74 129.12 75.92 132.48"
                                        style="fill: rgb(240, 240, 240); opacity: 0.6; transform-origin: 124.655px 130.8px;"
                                        class="animable"></polygon>
                                </g>
                            </g>
                            <g id="freepik--Shadow--inject-48" class="animable"
                                style="transform-origin: 250px 416.24px;">
                                <ellipse id="freepik--path--inject-48" cx="250" cy="416.24" rx="193.89"
                                    ry="11.32" style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px;"
                                    class="animable">
                                </ellipse>
                            </g>
                            <g id="freepik--Briefcases--inject-48" class="animable"
                                style="transform-origin: 212.595px 175.815px;">
                                <rect id="eldmt3h0h2ptu" x="180.47" y="262.73" width="64.21" height="28.6"
                                    rx="1.56" style="fill: rgb(0, 113, 220); transform-origin: 212.575px 277.03px;"
                                    class="animable"></rect>
                                <g id="el5qfwbb737qg">
                                    <rect x="180.47" y="262.73" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 212.575px 277.03px;"
                                        class="animable"></rect>
                                </g>
                                <g id="eluzc2msrh63j">
                                    <path
                                        d="M243.11,262.73H182a1.56,1.56,0,0,0-1.56,1.56v8.17l31.8,6.26a1.47,1.47,0,0,0,.59,0l31.81-6.26v-8.17A1.56,1.56,0,0,0,243.11,262.73Z"
                                        style="opacity: 0.1; transform-origin: 212.54px 270.74px;" class="animable">
                                    </path>
                                </g>
                                <path id="eltf5wu8eu56n"
                                    d="M244.45,252.27H225.79v-3.13a4.89,4.89,0,0,0-4.88-4.88H204.24a4.89,4.89,0,0,0-4.88,4.88v3.13H180.71a1.54,1.54,0,0,0-1.54,1.54v15.41a1.55,1.55,0,0,0,1.24,1.51L212.28,277a1.94,1.94,0,0,0,.59,0l31.87-6.27a1.56,1.56,0,0,0,1.25-1.51V253.81A1.54,1.54,0,0,0,244.45,252.27Zm-41.38-3.13a1.19,1.19,0,0,1,1.17-1.18h16.67a1.19,1.19,0,0,1,1.17,1.18v3.13h-19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 212.58px 260.641px;"
                                    class="animable"></path>
                                <g id="el6zblt91tr6d">
                                    <path
                                        d="M244.45,252.27H225.79v-3.13a4.89,4.89,0,0,0-4.88-4.88H204.24a4.89,4.89,0,0,0-4.88,4.88v3.13H180.71a1.54,1.54,0,0,0-1.54,1.54v15.41a1.55,1.55,0,0,0,1.24,1.51L212.28,277a1.94,1.94,0,0,0,.59,0l31.87-6.27a1.56,1.56,0,0,0,1.25-1.51V253.81A1.54,1.54,0,0,0,244.45,252.27Zm-41.38-3.13a1.19,1.19,0,0,1,1.17-1.18h16.67a1.19,1.19,0,0,1,1.17,1.18v3.13h-19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 212.58px 260.641px;"
                                        class="animable"></path>
                                </g>
                                <rect id="el88etudziho5" x="207.81" y="272.79" width="9.54" height="7.12"
                                    rx="1.48" style="fill: rgb(0, 113, 220); transform-origin: 212.58px 276.35px;"
                                    class="animable"></rect>
                                <g id="el7fx7oh4gf7q">
                                    <rect x="207.81" y="272.79" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 212.58px 276.35px;"
                                        class="animable"></rect>
                                </g>
                                <rect id="elv0nqf0wy2e" x="180.47" y="78.77" width="64.21" height="28.6"
                                    rx="1.56" style="fill: rgb(0, 113, 220); transform-origin: 212.575px 93.07px;"
                                    class="animable"></rect>
                                <g id="el8p9e2hnr8cf">
                                    <rect x="180.47" y="78.77" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 212.575px 93.07px;"
                                        class="animable"></rect>
                                </g>
                                <g id="el8wija1ztdxv">
                                    <path
                                        d="M243.11,78.77H182a1.56,1.56,0,0,0-1.56,1.56V88.5l31.8,6.26a1.47,1.47,0,0,0,.59,0l31.81-6.26V80.33A1.56,1.56,0,0,0,243.11,78.77Z"
                                        style="opacity: 0.1; transform-origin: 212.54px 86.7799px;" class="animable">
                                    </path>
                                </g>
                                <path id="elr8tkui0thhh"
                                    d="M244.45,68.31H225.79V65.18a4.89,4.89,0,0,0-4.88-4.88H204.24a4.89,4.89,0,0,0-4.88,4.88v3.13H180.71a1.54,1.54,0,0,0-1.54,1.54V85.26a1.54,1.54,0,0,0,1.24,1.51L212.28,93a1.47,1.47,0,0,0,.59,0l31.87-6.27A1.55,1.55,0,0,0,246,85.26V69.85A1.54,1.54,0,0,0,244.45,68.31Zm-41.38-3.13A1.18,1.18,0,0,1,204.24,64h16.67a1.18,1.18,0,0,1,1.17,1.17v3.13h-19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 212.585px 76.665px;"
                                    class="animable"></path>
                                <g id="elirbwna3ol1p">
                                    <path
                                        d="M244.45,68.31H225.79V65.18a4.89,4.89,0,0,0-4.88-4.88H204.24a4.89,4.89,0,0,0-4.88,4.88v3.13H180.71a1.54,1.54,0,0,0-1.54,1.54V85.26a1.54,1.54,0,0,0,1.24,1.51L212.28,93a1.47,1.47,0,0,0,.59,0l31.87-6.27A1.55,1.55,0,0,0,246,85.26V69.85A1.54,1.54,0,0,0,244.45,68.31Zm-41.38-3.13A1.18,1.18,0,0,1,204.24,64h16.67a1.18,1.18,0,0,1,1.17,1.17v3.13h-19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 212.585px 76.665px;"
                                        class="animable"></path>
                                </g>
                                <rect id="el3s0ihm82uia" x="207.81" y="88.84" width="9.54" height="7.12"
                                    rx="1.48" style="fill: rgb(0, 113, 220); transform-origin: 212.58px 92.4px;"
                                    class="animable"></rect>
                                <g id="el3c0mc77m3pa">
                                    <rect x="207.81" y="88.84" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 212.58px 92.4px;"
                                        class="animable">
                                    </rect>
                                </g>
                                <rect id="elvvdkc9f1r1e" x="85.31" y="262.73" width="64.21" height="28.6"
                                    rx="1.56" style="fill: rgb(0, 113, 220); transform-origin: 117.415px 277.03px;"
                                    class="animable"></rect>
                                <g id="elvvnc62fiyga">
                                    <rect x="85.31" y="262.73" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 117.415px 277.03px;"
                                        class="animable"></rect>
                                </g>
                                <g id="eldid1lrnf8xh">
                                    <path
                                        d="M148,262.73H86.87a1.56,1.56,0,0,0-1.56,1.56v8.17l31.8,6.26a1.52,1.52,0,0,0,.6,0l31.81-6.26v-8.17A1.56,1.56,0,0,0,148,262.73Z"
                                        style="opacity: 0.1; transform-origin: 117.415px 270.74px;" class="animable">
                                    </path>
                                </g>
                                <path id="el8qalrdw9z5u"
                                    d="M149.28,252.27H130.62v-3.13a4.89,4.89,0,0,0-4.88-4.88H109.08a4.89,4.89,0,0,0-4.88,4.88v3.13H85.54A1.54,1.54,0,0,0,84,253.81v15.41a1.55,1.55,0,0,0,1.24,1.51L117.11,277a2,2,0,0,0,.6,0l31.87-6.27a1.55,1.55,0,0,0,1.24-1.51V253.81A1.54,1.54,0,0,0,149.28,252.27Zm-41.38-3.13a1.2,1.2,0,0,1,1.18-1.18h16.66a1.2,1.2,0,0,1,1.18,1.18v3.13h-19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 117.41px 260.641px;"
                                    class="animable"></path>
                                <g id="el7k8t8ct63xx">
                                    <path
                                        d="M149.28,252.27H130.62v-3.13a4.89,4.89,0,0,0-4.88-4.88H109.08a4.89,4.89,0,0,0-4.88,4.88v3.13H85.54A1.54,1.54,0,0,0,84,253.81v15.41a1.55,1.55,0,0,0,1.24,1.51L117.11,277a2,2,0,0,0,.6,0l31.87-6.27a1.55,1.55,0,0,0,1.24-1.51V253.81A1.54,1.54,0,0,0,149.28,252.27Zm-41.38-3.13a1.2,1.2,0,0,1,1.18-1.18h16.66a1.2,1.2,0,0,1,1.18,1.18v3.13h-19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 117.41px 260.641px;"
                                        class="animable"></path>
                                </g>
                                <rect id="elospxnt0tw" x="112.64" y="272.79" width="9.54" height="7.12"
                                    rx="1.48" style="fill: rgb(0, 113, 220); transform-origin: 117.41px 276.35px;"
                                    class="animable"></rect>
                                <g id="elwzxc418og7">
                                    <rect x="112.64" y="272.79" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 117.41px 276.35px;"
                                        class="animable"></rect>
                                </g>
                                <rect id="elsk1xndimuu" x="85.31" y="78.77" width="64.21" height="28.6" rx="1.56"
                                    style="fill: rgb(0, 113, 220); transform-origin: 117.415px 93.07px;" class="animable">
                                </rect>
                                <g id="elh6xkkzqd3bs">
                                    <rect x="85.31" y="78.77" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 117.415px 93.07px;"
                                        class="animable"></rect>
                                </g>
                                <g id="eln7dspw8xvjn">
                                    <path
                                        d="M148,78.77H86.87a1.56,1.56,0,0,0-1.56,1.56V88.5l31.8,6.26a1.51,1.51,0,0,0,.6,0l31.81-6.26V80.33A1.56,1.56,0,0,0,148,78.77Z"
                                        style="opacity: 0.1; transform-origin: 117.415px 86.7801px;" class="animable">
                                    </path>
                                </g>
                                <path id="elgbup0i7xdkc"
                                    d="M149.28,68.31H130.62V65.18a4.89,4.89,0,0,0-4.88-4.88H109.08a4.89,4.89,0,0,0-4.88,4.88v3.13H85.54A1.54,1.54,0,0,0,84,69.85V85.26a1.54,1.54,0,0,0,1.24,1.51L117.11,93a1.51,1.51,0,0,0,.6,0l31.87-6.27a1.54,1.54,0,0,0,1.24-1.51V69.85A1.54,1.54,0,0,0,149.28,68.31ZM107.9,65.18A1.19,1.19,0,0,1,109.08,64h16.66a1.19,1.19,0,0,1,1.18,1.17v3.13h-19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 117.41px 76.665px;" class="animable">
                                </path>
                                <g id="el3w9k8ht8yn4">
                                    <path
                                        d="M149.28,68.31H130.62V65.18a4.89,4.89,0,0,0-4.88-4.88H109.08a4.89,4.89,0,0,0-4.88,4.88v3.13H85.54A1.54,1.54,0,0,0,84,69.85V85.26a1.54,1.54,0,0,0,1.24,1.51L117.11,93a1.51,1.51,0,0,0,.6,0l31.87-6.27a1.54,1.54,0,0,0,1.24-1.51V69.85A1.54,1.54,0,0,0,149.28,68.31ZM107.9,65.18A1.19,1.19,0,0,1,109.08,64h16.66a1.19,1.19,0,0,1,1.18,1.17v3.13h-19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 117.41px 76.665px;"
                                        class="animable"></path>
                                </g>
                                <rect id="ellhkqcn1qg2a" x="112.64" y="88.84" width="9.54" height="7.12"
                                    rx="1.48" style="fill: rgb(0, 113, 220); transform-origin: 117.41px 92.4px;"
                                    class="animable"></rect>
                                <g id="elr61vaqa7reo">
                                    <rect x="112.64" y="88.84" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 117.41px 92.4px;"
                                        class="animable">
                                    </rect>
                                </g>
                                <path id="elb1n7o0g6fgh"
                                    d="M140,199.35H86.87a1.57,1.57,0,0,1-1.57-1.57V172.31a1.55,1.55,0,0,1,.13-.61,2.15,2.15,0,0,1,.14-.26,1.1,1.1,0,0,1,.2-.23,1.56,1.56,0,0,1,1.1-.46h50.29a65.58,65.58,0,0,0-.41,10.52c0,.57,0,1.14.09,1.7.07,1.05.15,2.11.27,3.16A67,67,0,0,0,140,199.35Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 112.65px 185.05px;" class="animable">
                                </path>
                                <g id="elctg6ohdhcko">
                                    <path
                                        d="M140,199.35H86.87a1.57,1.57,0,0,1-1.57-1.57V172.31a1.55,1.55,0,0,1,.13-.61,2.15,2.15,0,0,1,.14-.26,1.1,1.1,0,0,1,.2-.23,1.56,1.56,0,0,1,1.1-.46h50.29a65.58,65.58,0,0,0-.41,10.52c0,.57,0,1.14.09,1.7.07,1.05.15,2.11.27,3.16A67,67,0,0,0,140,199.35Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 112.65px 185.05px;"
                                        class="animable"></path>
                                </g>
                                <g id="el0t1k9kxm45ko">
                                    <path
                                        d="M137.16,170.75a65.58,65.58,0,0,0-.41,10.52c0,.57,0,1.14.09,1.7l-14.66,2.88-4.48.88a1.18,1.18,0,0,1-.59,0l-4.47-.87-27.33-5.38V172.3a1.69,1.69,0,0,1,.12-.6,2.15,2.15,0,0,1,.14-.26,1.1,1.1,0,0,1,.2-.23,1.56,1.56,0,0,1,1.1-.46Z"
                                        style="opacity: 0.1; transform-origin: 111.235px 178.759px;" class="animable">
                                    </path>
                                </g>
                                <path id="elw9dnyv0r4w"
                                    d="M139.25,160.29h-8.62v-3.13a4.9,4.9,0,0,0-4.89-4.88H109.08a4.88,4.88,0,0,0-4.88,4.88v3.13H85.54A1.54,1.54,0,0,0,84,161.83v15.4a1.55,1.55,0,0,0,1.25,1.52h.06l27.33,5.39,4.47.87a1.47,1.47,0,0,0,.59,0l4.48-.88,14.57-2.87a65.58,65.58,0,0,1,.41-10.52A66.34,66.34,0,0,1,139.25,160.29Zm-31.35-3.13a1.19,1.19,0,0,1,1.18-1.17h16.66a1.18,1.18,0,0,1,1.17,1.17v3.13h-19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 111.625px 168.66px;"
                                    class="animable"></path>
                                <g id="elwsppovyq6cf">
                                    <path
                                        d="M139.25,160.29h-8.62v-3.13a4.9,4.9,0,0,0-4.89-4.88H109.08a4.88,4.88,0,0,0-4.88,4.88v3.13H85.54A1.54,1.54,0,0,0,84,161.83v15.4a1.55,1.55,0,0,0,1.25,1.52h.06l27.33,5.39,4.47.87a1.47,1.47,0,0,0,.59,0l4.48-.88,14.57-2.87a65.58,65.58,0,0,1,.41-10.52A66.34,66.34,0,0,1,139.25,160.29Zm-31.35-3.13a1.19,1.19,0,0,1,1.18-1.17h16.66a1.18,1.18,0,0,1,1.17,1.17v3.13h-19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 111.625px 168.66px;"
                                        class="animable"></path>
                                </g>
                                <rect id="elvnow3rqas5g" x="112.64" y="180.81" width="9.54" height="7.12"
                                    rx="1.48" style="fill: rgb(0, 113, 220); transform-origin: 117.41px 184.37px;"
                                    class="animable"></rect>
                                <g id="eliw7mzvtogeq">
                                    <rect x="112.64" y="180.81" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 117.41px 184.37px;"
                                        class="animable"></rect>
                                </g>
                                <g id="elblq38pqnku6">
                                    <rect x="275.64" y="262.73" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(0, 113, 220); transform-origin: 307.745px 277.03px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elcifk4a8srn">
                                    <rect x="275.64" y="262.73" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 307.745px 277.03px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="el7e9n9do6ant">
                                    <path
                                        d="M277.2,262.73h61.08a1.56,1.56,0,0,1,1.56,1.56v8.17L308,278.72a1.47,1.47,0,0,1-.59,0l-31.81-6.26v-8.17A1.56,1.56,0,0,1,277.2,262.73Z"
                                        style="opacity: 0.1; transform-origin: 307.72px 270.74px;" class="animable">
                                    </path>
                                </g>
                                <path id="el3780pxegbej"
                                    d="M275.87,252.27h18.66v-3.13a4.89,4.89,0,0,1,4.88-4.88h16.67a4.89,4.89,0,0,1,4.88,4.88v3.13h18.65a1.54,1.54,0,0,1,1.54,1.54v15.41a1.55,1.55,0,0,1-1.24,1.51L308,277a2,2,0,0,1-.6,0l-31.87-6.27a1.55,1.55,0,0,1-1.24-1.51V253.81A1.54,1.54,0,0,1,275.87,252.27Zm41.38-3.13a1.19,1.19,0,0,0-1.17-1.18H299.41a1.2,1.2,0,0,0-1.18,1.18v3.13h19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 307.72px 260.641px;"
                                    class="animable"></path>
                                <g id="el4arkvg1wttj">
                                    <path
                                        d="M275.87,252.27h18.66v-3.13a4.89,4.89,0,0,1,4.88-4.88h16.67a4.89,4.89,0,0,1,4.88,4.88v3.13h18.65a1.54,1.54,0,0,1,1.54,1.54v15.41a1.55,1.55,0,0,1-1.24,1.51L308,277a2,2,0,0,1-.6,0l-31.87-6.27a1.55,1.55,0,0,1-1.24-1.51V253.81A1.54,1.54,0,0,1,275.87,252.27Zm41.38-3.13a1.19,1.19,0,0,0-1.17-1.18H299.41a1.2,1.2,0,0,0-1.18,1.18v3.13h19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 307.72px 260.641px;"
                                        class="animable"></path>
                                </g>
                                <g id="el4ibd3cgjw0l">
                                    <rect x="302.97" y="272.79" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(0, 113, 220); transform-origin: 307.74px 276.35px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="eli7gxgwd9gw">
                                    <rect x="302.97" y="272.79" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 307.74px 276.35px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elm8q9wd7csco">
                                    <rect x="275.64" y="78.77" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(0, 113, 220); transform-origin: 307.745px 93.07px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elvu9jixr38yd">
                                    <rect x="275.64" y="78.77" width="64.21" height="28.6" rx="1.56"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 307.745px 93.07px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elf224rf15s8">
                                    <path
                                        d="M277.2,78.77h61.08a1.56,1.56,0,0,1,1.56,1.56V88.5L308,94.76a1.47,1.47,0,0,1-.59,0L275.64,88.5V80.33A1.56,1.56,0,0,1,277.2,78.77Z"
                                        style="opacity: 0.1; transform-origin: 307.74px 86.7799px;" class="animable">
                                    </path>
                                </g>
                                <path id="elpzoxyu2m02"
                                    d="M275.87,68.31h18.66V65.18a4.89,4.89,0,0,1,4.88-4.88h16.67A4.89,4.89,0,0,1,321,65.18v3.13h18.65a1.54,1.54,0,0,1,1.54,1.54V85.26a1.54,1.54,0,0,1-1.24,1.51L308,93a1.51,1.51,0,0,1-.6,0l-31.87-6.27a1.54,1.54,0,0,1-1.24-1.51V69.85A1.54,1.54,0,0,1,275.87,68.31Zm41.38-3.13A1.18,1.18,0,0,0,316.08,64H299.41a1.19,1.19,0,0,0-1.18,1.17v3.13h19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 307.74px 76.665px;" class="animable">
                                </path>
                                <g id="el7ry1s75tgj5">
                                    <path
                                        d="M275.87,68.31h18.66V65.18a4.89,4.89,0,0,1,4.88-4.88h16.67A4.89,4.89,0,0,1,321,65.18v3.13h18.65a1.54,1.54,0,0,1,1.54,1.54V85.26a1.54,1.54,0,0,1-1.24,1.51L308,93a1.51,1.51,0,0,1-.6,0l-31.87-6.27a1.54,1.54,0,0,1-1.24-1.51V69.85A1.54,1.54,0,0,1,275.87,68.31Zm41.38-3.13A1.18,1.18,0,0,0,316.08,64H299.41a1.19,1.19,0,0,0-1.18,1.17v3.13h19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 307.74px 76.665px;"
                                        class="animable"></path>
                                </g>
                                <g id="el81oushnjje">
                                    <rect x="302.97" y="88.84" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(0, 113, 220); transform-origin: 307.74px 92.4px; transform: rotate(-180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elvmbu43qdn9p">
                                    <rect x="302.97" y="88.84" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 307.74px 92.4px; transform: rotate(-180deg);"
                                        class="animable"></rect>
                                </g>
                                <path id="el4ipd83rcalp"
                                    d="M285.19,199.35h53.1a1.57,1.57,0,0,0,1.56-1.57V172.31a1.55,1.55,0,0,0-.13-.61,1.3,1.3,0,0,0-.14-.26,1.1,1.1,0,0,0-.2-.23,1.54,1.54,0,0,0-1.1-.46H288a65.58,65.58,0,0,1,.41,10.52c0,.57,0,1.14-.09,1.7-.06,1.05-.15,2.11-.27,3.16A67,67,0,0,1,285.19,199.35Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 312.52px 185.05px;" class="animable">
                                </path>
                                <g id="elclnv92ib4h">
                                    <path
                                        d="M285.19,199.35h53.1a1.57,1.57,0,0,0,1.56-1.57V172.31a1.55,1.55,0,0,0-.13-.61,1.3,1.3,0,0,0-.14-.26,1.1,1.1,0,0,0-.2-.23,1.54,1.54,0,0,0-1.1-.46H288a65.58,65.58,0,0,1,.41,10.52c0,.57,0,1.14-.09,1.7-.06,1.05-.15,2.11-.27,3.16A67,67,0,0,1,285.19,199.35Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 312.52px 185.05px;"
                                        class="animable"></path>
                                </g>
                                <g id="elk6au1pm2c8m">
                                    <path
                                        d="M288,170.75a65.58,65.58,0,0,1,.41,10.52c0,.57,0,1.14-.09,1.7L303,185.85l4.48.88a1.18,1.18,0,0,0,.59,0l4.47-.87,27.33-5.38V172.3a1.69,1.69,0,0,0-.12-.6,1.3,1.3,0,0,0-.14-.26,1.1,1.1,0,0,0-.2-.23,1.54,1.54,0,0,0-1.1-.46Z"
                                        style="opacity: 0.1; transform-origin: 313.935px 178.759px;" class="animable">
                                    </path>
                                </g>
                                <path id="ela7n7x5iut9i"
                                    d="M285.9,160.29h8.63v-3.13a4.89,4.89,0,0,1,4.88-4.88h16.66a4.89,4.89,0,0,1,4.89,4.88v3.13h18.65a1.54,1.54,0,0,1,1.54,1.54v15.4a1.55,1.55,0,0,1-1.24,1.52h-.07l-27.33,5.39L308,185a1.47,1.47,0,0,1-.59,0l-4.48-.88-14.57-2.87a67,67,0,0,0-2.5-21Zm31.35-3.13a1.19,1.19,0,0,0-1.18-1.17H299.41a1.18,1.18,0,0,0-1.17,1.17v3.13h19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 313.505px 168.655px;"
                                    class="animable"></path>
                                <g id="elid1uj57839">
                                    <path
                                        d="M285.9,160.29h8.63v-3.13a4.89,4.89,0,0,1,4.88-4.88h16.66a4.89,4.89,0,0,1,4.89,4.88v3.13h18.65a1.54,1.54,0,0,1,1.54,1.54v15.4a1.55,1.55,0,0,1-1.24,1.52h-.07l-27.33,5.39L308,185a1.47,1.47,0,0,1-.59,0l-4.48-.88-14.57-2.87a67,67,0,0,0-2.5-21Zm31.35-3.13a1.19,1.19,0,0,0-1.18-1.17H299.41a1.18,1.18,0,0,0-1.17,1.17v3.13h19Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.6; transform-origin: 313.505px 168.655px;"
                                        class="animable"></path>
                                </g>
                                <g id="elovsyx3e8z4">
                                    <rect x="302.97" y="180.81" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(0, 113, 220); transform-origin: 307.74px 184.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <g id="elgqusgqlhi3n">
                                    <rect x="302.97" y="180.81" width="9.54" height="7.12" rx="1.48"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 307.74px 184.37px; transform: rotate(180deg);"
                                        class="animable"></rect>
                                </g>
                                <rect id="elvkmrvn48lvj" x="169.68" y="164.54" width="92.26" height="41.09"
                                    rx="2.24" style="fill: rgb(0, 113, 220); transform-origin: 215.81px 185.085px;"
                                    class="animable"></rect>
                                <path id="ell8wnvxrhrpk"
                                    d="M227.78,158H203.83a6.86,6.86,0,0,1-6.85-6.85V145a6.86,6.86,0,0,1,6.85-6.85h23.95a6.85,6.85,0,0,1,6.85,6.85v6.12A6.85,6.85,0,0,1,227.78,158Zm-23.95-14.82A1.85,1.85,0,0,0,202,145v6.12a1.85,1.85,0,0,0,1.85,1.85h23.95a1.85,1.85,0,0,0,1.85-1.85V145a1.85,1.85,0,0,0-1.85-1.85Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 215.805px 148.075px;"
                                    class="animable"></path>
                                <g id="elmdnz1ocy65f">
                                    <path
                                        d="M259.69,164.54H171.93a2.24,2.24,0,0,0-2.25,2.24v11.75l45.7,9a2,2,0,0,0,.85,0l45.71-9V166.78A2.24,2.24,0,0,0,259.69,164.54Z"
                                        style="opacity: 0.2; transform-origin: 215.81px 176.058px;" class="animable">
                                    </path>
                                </g>
                                <path id="elrtmf9evzkil"
                                    d="M262,176l-45.79,9a2.48,2.48,0,0,1-.86,0l-45.79-9a2.22,2.22,0,0,1-1.79-2.17V151.73a2.21,2.21,0,0,1,2.21-2.21H261.6a2.21,2.21,0,0,1,2.21,2.21v22.14A2.21,2.21,0,0,1,262,176Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 215.79px 167.279px;"
                                    class="animable"></path>
                                <rect id="el1k9gpdpt95d" x="208.96" y="179.01" width="13.71" height="10.23"
                                    rx="2.12" style="fill: rgb(0, 113, 220); transform-origin: 215.815px 184.125px;"
                                    class="animable"></rect>
                                <g id="elkskavbebh4o">
                                    <rect x="208.96" y="179.01" width="13.71" height="10.23" rx="2.12"
                                        style="opacity: 0.4; transform-origin: 215.815px 184.125px;" class="animable">
                                    </rect>
                                </g>
                            </g>
                            <g id="freepik--Character--inject-48" class="animable"
                                style="transform-origin: 274.673px 254.693px;">
                                <path id="eldbvt7ppjii"
                                    d="M380.9,187.21c1.15,2.37,2,4.61,3,6.95s1.73,4.67,2.51,7.06a90.17,90.17,0,0,1,3.49,14.86c.1.63.15,1.31.22,2l.1,1c0,.18,0,.31,0,.52l0,.65a21,21,0,0,1-.39,4.52,48.49,48.49,0,0,1-2.11,7.6,83,83,0,0,1-6.36,13.55l-5.08-2.15c1.13-4.56,2.27-9.21,3.13-13.7a57.49,57.49,0,0,0,.89-6.51,15.18,15.18,0,0,0-.06-2.68l-.11-.63-.14-.8c-.11-.53-.18-1.06-.31-1.6a102,102,0,0,0-3.86-13c-.76-2.17-1.6-4.33-2.44-6.5s-1.77-4.35-2.63-6.35Z"
                                    style="fill: rgb(127, 62, 59); transform-origin: 380.488px 216.565px;"
                                    class="animable"></path>
                                <path id="elkldokjsl2e" d="M376.5,242.44l-3.9,3.8,8.51,4s2.06-3.6.64-6.86Z"
                                    style="fill: rgb(127, 62, 59); transform-origin: 377.425px 246.34px;"
                                    class="animable"></path>
                                <polygon id="elrrietl8csmk"
                                    points="369.46 251.91 376.64 254.85 381.11 250.2 372.6 246.24 369.46 251.91"
                                    style="fill: rgb(127, 62, 59); transform-origin: 375.285px 250.545px;"
                                    class="animable"></polygon>
                                <g id="elk3zxggpacu">
                                    <path d="M223.81,247.81a72,72,0,1,0-79.57-63.57A72,72,0,0,0,223.81,247.81Z"
                                        style="fill: rgb(0, 113, 220); opacity: 0.2; transform-origin: 215.796px 176.257px;"
                                        class="animable"></path>
                                </g>
                                <g id="eluylpkbe3f3p">
                                    <path
                                        d="M171.42,119.54,280.92,207c.47-1,.91-2,1.34-3a71.06,71.06,0,0,0,5.2-20.48h0L192.88,108A71.39,71.39,0,0,0,171.42,119.54Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 229.44px 157.5px;"
                                        class="animable"></path>
                                </g>
                                <g id="elkzydcsu7zjs">
                                    <path
                                        d="M146.16,157.87,249.1,240.12a72,72,0,0,0,24.78-21.28L161.46,129A72,72,0,0,0,146.16,157.87Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.1; transform-origin: 210.02px 184.56px;"
                                        class="animable"></path>
                                </g>
                                <path id="eld1fh723ky4f"
                                    d="M393.17,257.12a10.68,10.68,0,0,0-1.73-5.1,7.38,7.38,0,0,0-2.95-2.61l-6.83-3.35c-4.54-2.25-9.11-4.44-13.68-6.63s-9.17-4.34-13.75-6.51-9.2-4.28-13.83-6.35q-13.86-6.28-27.9-12.22c-4.68-2-9.37-3.92-14.1-5.8h0a5.85,5.85,0,0,1-3.43-7.22,83.07,83.07,0,1,0-11.12,22.51,5.86,5.86,0,0,1,7.83-1.67h0q6.56,3.9,13.18,7.67,13.23,7.54,26.66,14.7c4.47,2.42,9,4.75,13.45,7.12s9,4.68,13.53,7,9,4.59,13.59,6.83l6.81,3.38a7.34,7.34,0,0,0,3.87.76,10.58,10.58,0,0,0,5.09-1.73A11.27,11.27,0,0,0,393.17,257.12ZM186.8,235a65.54,65.54,0,1,1,87.77-29.76A65.53,65.53,0,0,1,186.8,235Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 262.975px 181.399px;"
                                    class="animable"></path>
                                <path id="elrtgkh096saq"
                                    d="M343.19,156.3c0,.59-.31,1.07-.7,1.07s-.7-.48-.7-1.07.31-1.08.7-1.08S343.19,155.7,343.19,156.3Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 342.49px 156.295px;" class="animable">
                                </path>
                                <path id="elexss3ugnrlr"
                                    d="M342.93,157.37a21.16,21.16,0,0,1-2.82,5.07,3.41,3.41,0,0,0,2.83.53Z"
                                    style="fill: rgb(99, 15, 15); transform-origin: 341.525px 160.223px;"
                                    class="animable"></path>
                                <path id="elqjoer8proge"
                                    d="M345.29,153a.35.35,0,0,0,.2-.63,3.49,3.49,0,0,0-3.13-.54.35.35,0,1,0,.25.65h0a2.79,2.79,0,0,1,2.48.45A.31.31,0,0,0,345.29,153Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 343.866px 152.336px;"
                                    class="animable"></path>
                                <path id="el6bdk5p5rwwo"
                                    d="M363.42,160.76c-1.06,5.38-2.11,15.23,1.65,18.81,0,0-1.47,5.45-11.45,5.45-11,0-5.25-5.45-5.25-5.45,6-1.43,5.84-5.88,4.79-10Z"
                                    style="fill: rgb(127, 62, 59); transform-origin: 355.969px 172.89px;"
                                    class="animable"></path>
                                <path id="elclmcfehi7eu"
                                    d="M367,176.2c.83.27-.25,5.21-.25,5.21s-1.37,3.45-18.39,2.25c-1.31-.1-.81-4.84.44-5.53C352.83,175.93,364.32,175.32,367,176.2Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 357.451px 179.863px;"
                                    class="animable"></path>
                                <path id="elrvnj7j15b29"
                                    d="M401.57,382.81c.92-.09,2.26-1.78,2.64-2.4a.17.17,0,0,0,0-.18.16.16,0,0,0-.17-.08c-.1,0-2.52.46-3.11,1.4a.84.84,0,0,0-.1.67c.13.44.38.56.58.59Zm2.11-2.23c-.65.9-1.72,1.95-2.23,1.88-.05,0-.2,0-.29-.34a.46.46,0,0,1,.06-.39A4.71,4.71,0,0,1,403.68,380.58Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 402.518px 381.479px;"
                                    class="animable"></path>
                                <path id="elbq8prh4x5qj"
                                    d="M403.58,380.58a3.22,3.22,0,0,0,.53-.09.18.18,0,0,0,.12-.13.18.18,0,0,0-.06-.17c-.06-.06-1.68-1.44-2.78-1.33h0a.94.94,0,0,0-.68.36.55.55,0,0,0-.07.71C401,380.5,402.58,380.68,403.58,380.58Zm.08-.35c-1,.12-2.46-.08-2.74-.49,0,0-.08-.13.06-.31a.66.66,0,0,1,.45-.23h0A4.22,4.22,0,0,1,403.66,380.23Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 402.387px 379.73px;"
                                    class="animable"></path>
                                <path id="elgrwsj3o8mal"
                                    d="M332.82,409.11a13.43,13.43,0,0,0,2.26-.2.2.2,0,0,0,.14-.14.17.17,0,0,0-.09-.18c-.11-.07-2.67-1.53-3.9-1.2a.9.9,0,0,0-.55.41.66.66,0,0,0,0,.76C331,409,331.88,409.11,332.82,409.11Zm1.7-.46c-1.37.19-3.23.18-3.57-.29-.05-.06-.09-.17,0-.39a.51.51,0,0,1,.34-.24C332.08,407.52,333.62,408.19,334.52,408.65Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 332.891px 408.226px;"
                                    class="animable"></path>
                                <path id="elap2srdmnkj"
                                    d="M335,408.91a.2.2,0,0,0,.11,0,.2.2,0,0,0,.07-.16c0-.08-.21-2.06-1.14-2.83a1.33,1.33,0,0,0-1-.3c-.48.05-.61.29-.65.49-.13.83,1.63,2.42,2.51,2.82Zm-1.79-3a1,1,0,0,1,.61.23,4.15,4.15,0,0,1,1,2.26c-.91-.54-2.1-1.79-2-2.29,0,0,0-.16.34-.19Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 333.782px 407.271px;"
                                    class="animable"></path>
                                <polygon id="eljgs5owdeiz"
                                    points="343.12 408.74 335.78 408.74 335.04 391.72 342.39 391.72 343.12 408.74"
                                    style="fill: rgb(127, 62, 59); transform-origin: 339.08px 400.23px;" class="animable">
                                </polygon>
                                <polygon id="elopvh1c1lk3g"
                                    points="410.63 375.03 404.9 379.62 390.32 369.5 396.06 364.91 410.63 375.03"
                                    style="fill: rgb(127, 62, 59); transform-origin: 400.475px 372.265px;"
                                    class="animable"></polygon>
                                <path id="eljcknxps5yac"
                                    d="M403.85,379.33l5.86-5.81a.65.65,0,0,1,.8-.08l5.63,3.62a1.07,1.07,0,0,1,.15,1.68c-2.08,2-3.19,2.86-5.77,5.41-1.58,1.58-5.45,6.28-7.64,8.45s-4.63.29-3.92-.8c3.15-4.86,4.22-8.87,4.36-11.31A1.81,1.81,0,0,1,403.85,379.33Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 407.732px 383.469px;"
                                    class="animable"></path>
                                <path id="el4fwx72y28wg"
                                    d="M335.82,407.89h8a.63.63,0,0,1,.62.5l1.45,6.53a1.06,1.06,0,0,1-1.05,1.3c-2.9,0-7.08-.21-10.72-.21-4.25,0-7.92.23-12.91.23-3,0-3.85-3.05-2.59-3.33,5.75-1.25,10.44-1.39,15.4-4.45A3.44,3.44,0,0,1,335.82,407.89Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 331.987px 412.065px;"
                                    class="animable"></path>
                                <path id="el8vvs43mlqeu"
                                    d="M379.55,181.77c6.37,3,9,23.56,9,23.56l-14.65,5.75a117.21,117.21,0,0,1-5.51-17.15C366.34,184.65,373,178.65,379.55,181.77Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 378.281px 196.009px;"
                                    class="animable"></path>
                                <g id="elv1otk06ojc">
                                    <path
                                        d="M379.55,181.77c6.37,3,9,23.56,9,23.56l-14.65,5.75a117.21,117.21,0,0,1-5.51-17.15C366.34,184.65,373,178.65,379.55,181.77Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 378.281px 196.009px;"
                                        class="animable"></path>
                                </g>
                                <g id="els5xuc7gaifa">
                                    <path
                                        d="M370.06,187.8a8.18,8.18,0,0,0-1.56-.57,13.46,13.46,0,0,0-.06,6.7,116.48,116.48,0,0,0,5.5,17.15l4.83-1.89C377.88,203.82,375.15,190.24,370.06,187.8Z"
                                        style="opacity: 0.2; transform-origin: 373.408px 199.155px;" class="animable">
                                    </path>
                                </g>
                                <path id="elax0k5gju49t"
                                    d="M337.07,181.61s-7.82,8.83-.44,63.5h39.3c.27-6-3.52-35.46,2.3-63.88a102.86,102.86,0,0,0-13.16-1.66,145.27,145.27,0,0,0-16.7,0A73.5,73.5,0,0,0,337.07,181.61Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 355.845px 212.22px;"
                                    class="animable"></path>
                                <g id="elhkmwxqv827">
                                    <path
                                        d="M337.07,181.61s-7.82,8.83-.44,63.5h39.3c.27-6-3.52-35.46,2.3-63.88a102.86,102.86,0,0,0-13.16-1.66,145.27,145.27,0,0,0-16.7,0A73.5,73.5,0,0,0,337.07,181.61Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 355.845px 212.22px;"
                                        class="animable"></path>
                                </g>
                                <g id="ellyirv2qpbu">
                                    <path
                                        d="M345,193.33c-1.78-5.34-6.06-7.05-10.42-3.88-.88,5.18-1.5,13.53-.79,26.77l7.67-.07S347.63,201.28,345,193.33Z"
                                        style="opacity: 0.2; transform-origin: 339.567px 202.04px;" class="animable">
                                    </path>
                                </g>
                                <path id="el63ob9fmasb8"
                                    d="M343.56,191.14c-.32,2.68-.76,5.11-1.25,7.64s-1.06,5-1.71,7.49a85.86,85.86,0,0,1-5.22,14.82c-.57,1.23-1.23,2.44-1.93,3.65-.36.61-.72,1.22-1.13,1.82a12.64,12.64,0,0,1-1.87,2.29,13.27,13.27,0,0,1-4.8,2.85,21.64,21.64,0,0,1-4.47,1.05,36.92,36.92,0,0,1-8.19.1q-2-.16-3.9-.51c-1.3-.23-2.53-.47-3.87-.82l.65-5.48a65.26,65.26,0,0,0,13.52-2A15.39,15.39,0,0,0,322,223a3.75,3.75,0,0,0,1.4-1.11c-.08.07.65-1.14,1.08-2s.91-2,1.32-3c.84-2.06,1.56-4.24,2.22-6.47s1.24-4.5,1.78-6.8,1-4.62,1.5-7,.86-4.74,1.22-6.95Z"
                                    style="fill: rgb(127, 62, 59); transform-origin: 324.39px 211.35px;" class="animable">
                                </path>
                                <path id="eldrmgrwwsbno"
                                    d="M346.89,187c2.07,6.71-6.33,26.71-6.33,26.71l-17.69-4.45a81.82,81.82,0,0,1,5.43-18.39C334,178.39,344.4,178.91,346.89,187Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 335.044px 197.44px;"
                                    class="animable"></path>
                                <g id="elptwbnm37ji">
                                    <path
                                        d="M346.89,187c2.07,6.71-6.33,26.71-6.33,26.71l-17.69-4.45a81.82,81.82,0,0,1,5.43-18.39C334,178.39,344.4,178.91,346.89,187Z"
                                        style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 335.044px 197.44px;"
                                        class="animable"></path>
                                </g>
                                <path id="el6qx9308hj7o"
                                    d="M306.12,226.07l-8.32-.21,4,8.65s3.38.45,6.16-4.12l2.93-3.49-3.37-.68A8.22,8.22,0,0,0,306.12,226.07Z"
                                    style="fill: rgb(127, 62, 59); transform-origin: 304.345px 230.191px;"
                                    class="animable"></path>
                                <polygon id="eluwu1bbcdvle"
                                    points="292.55 227.47 297.32 234.64 301.81 234.51 297.8 225.86 292.55 227.47"
                                    style="fill: rgb(127, 62, 59); transform-origin: 297.18px 230.25px;" class="animable">
                                </polygon>
                                <g id="eln4n45qizs0l">
                                    <polygon points="335.05 391.73 335.42 400.5 342.77 400.5 342.39 391.73 335.05 391.73"
                                        style="opacity: 0.2; transform-origin: 338.91px 396.115px;" class="animable">
                                    </polygon>
                                </g>
                                <g id="el30leti46q63">
                                    <polygon points="396.06 364.91 390.32 369.5 397.84 374.72 403.58 370.13 396.06 364.91"
                                        style="opacity: 0.2; transform-origin: 396.95px 369.815px;" class="animable">
                                    </polygon>
                                </g>
                                <path id="elk441pckf43r"
                                    d="M363,155c-.44,7.28-.32,11.56-4,15.3-5.52,5.62-14.51,2.3-16.25-5-1.57-6.54-.58-17.34,6.54-20.25A9.94,9.94,0,0,1,363,155Z"
                                    style="fill: rgb(127, 62, 59); transform-origin: 352.568px 158.712px;"
                                    class="animable"></path>
                                <path id="elyenguxl0u19"
                                    d="M368.88,148.24s3.83,1.14,2.63,5.51c-1.81,6.64-6.07,14.28-11.57,14.76-6.85.61-9.94-6.46-10.84-13.77-4.1-2.81-7.14-5.44-6.16-8.36,1.5-4.5,6.94-8.38,15.6-7.38S371.51,145.6,368.88,148.24Z"
                                    style="fill: rgb(38, 50, 56); transform-origin: 357.249px 153.694px;"
                                    class="animable"></path>
                                <path id="elmb81vgflss"
                                    d="M353.27,156.24a8.24,8.24,0,0,1-2.06,4.87c-1.6,1.76-3.28.66-3.56-1.48-.25-1.94.27-5.19,2.23-6.16S353.4,154.06,353.27,156.24Z"
                                    style="fill: rgb(127, 62, 59); transform-origin: 350.435px 157.581px;"
                                    class="animable"></path>
                                <path id="eljuosglsb1e"
                                    d="M350.57,245.11s-2.48,49.52,2.35,70.5c7.65,33.22,41.28,59.84,41.28,59.84L405,366.8s-27.67-20.59-30.16-48.25c-2.23-24.84,1.07-53.37,1.07-73.44Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 377.467px 310.28px;"
                                    class="animable"></path>
                                <g id="el6vv4c6bbcb">
                                    <path
                                        d="M350.57,245.11s-2.48,49.52,2.35,70.5c7.65,33.22,41.28,59.84,41.28,59.84L405,366.8s-27.67-20.59-30.16-48.25c-2.23-24.84,1.07-53.37,1.07-73.44Z"
                                        style="opacity: 0.2; transform-origin: 377.467px 310.28px;" class="animable">
                                    </path>
                                </g>
                                <g id="elxdwkirlr7c9">
                                    <path
                                        d="M354.26,259.78c-1-1.93-2.95,3.82-4.31,11.2,0,10.18.18,21.76,1.07,31.57C357.81,290,356.37,263.78,354.26,259.78Z"
                                        style="opacity: 0.2; transform-origin: 352.981px 280.977px;" class="animable">
                                    </path>
                                </g>
                                <path id="elgi0f7rjehbi" d="M389.3,373.32s4.1,3.18,4.1,3.18l12.47-10.11L402.13,363Z"
                                    style="fill: rgb(44, 107, 219); transform-origin: 397.585px 369.75px;"
                                    class="animable"></path>
                                <g id="elij3vjvij65">
                                    <path d="M389.3,373.32s4.1,3.18,4.1,3.18l12.47-10.11L402.13,363Z"
                                        style="fill: rgb(250, 250, 250); opacity: 0.4; transform-origin: 397.585px 369.75px;"
                                        class="animable"></path>
                                </g>
                                <path id="ellltr22zz5sc"
                                    d="M336.63,245.11s-11.06,46.9-11.84,69.3c-.87,25.13,7.89,84.39,7.89,84.39h12.45s1.53-59.72,2.09-82.61c.6-24.95,15.24-71.08,15.24-71.08Z"
                                    style="fill: rgb(0, 113, 220); transform-origin: 343.595px 321.955px;"
                                    class="animable"></path>
                                <g id="elfqbhwamdpy">
                                    <path
                                        d="M336.63,245.11s-11.06,46.9-11.84,69.3c-.87,25.13,7.89,84.39,7.89,84.39h12.45s1.53-59.72,2.09-82.61c.6-24.95,15.24-71.08,15.24-71.08Z"
                                        style="opacity: 0.2; transform-origin: 343.595px 321.955px;" class="animable">
                                    </path>
                                </g>
                                <path id="eli6f39y1rk5" d="M330.29,393.84c-.06,0,.7,5.17.7,5.17h15.14l.41-4.61Z"
                                    style="fill: rgb(44, 107, 219); transform-origin: 338.413px 396.425px;"
                                    class="animable"></path>
                                <g id="elqn2hyq2lf7">
                                    <path d="M330.29,393.84c-.06,0,.7,5.17.7,5.17h15.14l.41-4.61Z"
                                        style="fill: rgb(250, 250, 250); opacity: 0.4; transform-origin: 338.413px 396.425px;"
                                        class="animable"></path>
                                </g>
                            </g>
                            <defs>
                                <filter id="active" height="200%">
                                    <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2">
                                    </feMorphology>
                                    <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                                    <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE">
                                    </feComposite>
                                    <feMerge>
                                        <feMergeNode in="OUTLINE"></feMergeNode>
                                        <feMergeNode in="SourceGraphic"></feMergeNode>
                                    </feMerge>
                                </filter>
                                <filter id="hover" height="200%">
                                    <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2">
                                    </feMorphology>
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
                    </div>
                    <p style="    font-size: 24px;">Fill out application form, and we
                        will get in touch with you.</p>
                </div>
                <div class="comment-form col-md-6 p-5">
                    <h2 id="application-form" style="    font-size: 32px;" class="course-list-info__title pb-5"><a
                            href="course-single-layout-01.html">Application form</a></h2>
                    <form action="{{ route('job.apply.submit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <!-- Account Account details Start -->
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Name</label>
                                    <input class="form-control" type="text" name="name">
                                    <input type="hidden" name="job_id" value="{{ $job_details->id }}">
                                </div>
                                <!-- Account Account details End -->
                            </div>
                            <div class="col-md-6">
                                <!-- Account Account details Start -->
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Email</label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                                <!-- Account Account details End -->
                            </div>
                         
                            <div class="col-md-6">
                                <!-- Account Account details Start -->
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Phone Number</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                                <!-- Account Account details End -->
                            </div>
                            <div class="col-md-12">
                                <!-- Account Account details Start -->
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Address</label>
                                    <textarea class="form-control" name="address"></textarea>
                                </div>
                                <!-- Account Account details End -->
                            </div>
                        
                            <div class="col-md-6">
                                <!-- Account Account details Start -->
                                <div class="dashboard-content__input">
                                    <label class="form-label-02">Upload Your Resume</label>
                                    <input class="form-control" type="file" name="resume">
                                </div>
                                <!-- Account Account details End -->
                            </div>
                            <div class="col-md-12">
                                <div class="comment-form__input">
                                    <button type="submit" class="btn btn-primary btn-hover-secondary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <button id="backBtn" class="back-to-top backBtn" style="display: none;">
            <i class="arrow-top fal fa-long-arrow-up"></i>
            <i class="arrow-bottom fal fa-long-arrow-up"></i>
        </button>
        <script>
            function scrollToForm() {
                var element = document.getElementById("application-form");
                element.scrollIntoView({
                    behavior: "smooth"
                });
            }
        </script>
    </main>
@endsection
@push("js")
@endpush
