@extends('layouts.front.app2')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom/index-custom.css') }}">
    <link rel="stylesheet" href="https://schooldekho.org/assets/front/css/custom/main.css">
    <link rel="stylesheet" href="https://schooldekho.org/assets/front/css/custom/404.css">
@endpush
@section('content')
    <section class="inner-section category-part pt-5 pb-5">
        <style>
            .user-form-option li:nth-child(2) button i {
                background: #0044bb !important;
                color: white !important;

            }

            .user-form-option li:nth-child(2) button {
                background: #0044bb !important;
                color: white !important;

            }

            .user-form-option li:nth-child(3) button {
                background: #ffd900 !important;
                color: white !important;
            }

            .user-form-option li:nth-child(3) button i {
                background: #fcdb2479 !important;
                color: white !important;
            }

            .superSmall {
                font-size: 8px;
                text-align: justify;
            }

            .pstyle {
                max-width: 690px;
                margin-left: auto;
                margin-right: auto;
                line-height: 15px;
            }

            .pstyle2 {
                max-width: 690px;
                margin-left: auto;
                margin-right: auto;
            }

            @media (max-width: 570px) {
                .user-form-option {
                    display: grid !important;
                    gap: 10px;
                }

                .user-form-option li:nth-child(3) button {
                    width: 100% !important
                }

                .user-form-option li:nth-child(2) button {
                    width: 100% !important
                }
            }
        </style>
        <div class="mt-5 section-center-heading">
            <svg version="1.1" id="Layer_1" width="275px" height="275px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 275 275" style="enable-background:new 0 0 275 275;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#A4E1FF;}
	.st1{fill:none;stroke:#000000;stroke-miterlimit:10;}
	.st2{opacity:0.6;fill:#7A7A7A;}
	.st3{opacity:0.6;}
	.st4{opacity:0.74;fill:#7A7A7A;}
	.st5{fill:#7DD5FF;}
	.st6{fill:#B2E4FF;}
	.st7{fill:#CFF0FF;}
	.st8{fill:#005DFF;}
	.st9{fill:#5A9DFF;}
	.st10{fill:#A2E6EA;}
	.st11{fill:#0843A0;}
	.st12{fill:#004381;}
	.st13{fill:#2E1709;}
	.st14{fill:#0044BB;}
	.st15{fill:#FFB39C;}
	.st16{fill:#FFC3AE;}
	.st17{fill:#DCF5F9;}
	.st18{fill:#1497FF;}
	.st19{fill:#B97860;}
	.st20{fill:#FF9076;}
	.st21{fill:#FFFFFF;}
	.st22{fill:#0075FF;}
	.st23{fill:#FC8068;}
</style>
<g id="Layer_2">
	<g id="Layer_3">
	</g>
</g>
<g>
	<g id="path120">
		<path vector-effect="non-scaling-stroke" class="st0" d="M243.5,102.3h-6.4c-1.1,0-1.9-0.9-1.9-1.9v-7.1c0-0.3,0.3-0.6,0.6-0.6
			h6.9c0.3,0,0.6,0.3,0.6,0.6v6c0,0.3-0.3,0.6-0.6,0.6s-0.6-0.3-0.6-0.6v-5.5h-5.8v6.6c0,0.4,0.3,0.8,0.8,0.8h6.4
			c0.3,0,0.6,0.3,0.6,0.6S243.8,102.3,243.5,102.3"/>
	</g>
	<g id="path122">
		<path vector-effect="non-scaling-stroke" class="st0" d="M238.6,101.5h5.1c0.4,0,0.8-0.3,0.8-0.8v-0.5h-5.8v0.5
			C238.8,101,238.7,101.3,238.6,101.5z M243.7,102.7h-6.5c-0.1,0-0.2,0-0.3,0c-0.3,0-0.5-0.3-0.5-0.6c0-0.3,0.2-0.5,0.5-0.6
			c0.4-0.1,0.6-0.4,0.6-0.8v-1.1c0-0.3,0.3-0.6,0.6-0.6h6.9c0.3,0,0.6,0.3,0.6,0.6v1.1C245.7,101.8,244.8,102.7,243.7,102.7"/>
	</g>
	<g id="path124">
		<path vector-effect="non-scaling-stroke" class="st0" d="M240.9,95.6h-3.5c-0.3,0-0.6-0.3-0.6-0.6c0-0.3,0.3-0.6,0.6-0.6h3.5
			c0.3,0,0.6,0.3,0.6,0.6C241.5,95.3,241.2,95.6,240.9,95.6"/>
	</g>
	<g id="path126">
		<path vector-effect="non-scaling-stroke" class="st0" d="M240.9,97.8h-3.5c-0.3,0-0.6-0.3-0.6-0.6s0.3-0.6,0.6-0.6h3.5
			c0.3,0,0.6,0.3,0.6,0.6C241.5,97.6,241.2,97.8,240.9,97.8"/>
	</g>
	<g id="path128">
		<path vector-effect="non-scaling-stroke" class="st0" d="M233.8,100.7c-0.3,0-0.6-0.3-0.6-0.6v-8.8c0-0.3,0.3-0.6,0.6-0.6h8.8
			c0.3,0,0.6,0.3,0.6,0.6c0,0.3-0.3,0.6-0.6,0.6h-8.2v8.2C234.3,100.4,234.1,100.7,233.8,100.7"/>
	</g>
	<g id="path14">
		<path vector-effect="non-scaling-stroke" class="st0" d="M240.4,38.8l-1-0.7l2.4-3.4l3.5,2.4l-0.7,1l-2.6-1.7L240.4,38.8"/>
	</g>
	<g id="path88">
		<path vector-effect="non-scaling-stroke" class="st0" d="M23,129.8c-2.3-0.7-4.8,0.7-5.5,3c-0.7,2.3,0.7,4.8,3,5.5
			c2.3,0.7,4.8-0.7,5.5-3C26.7,133,25.4,130.5,23,129.8z M20.2,139.4c-2.9-0.9-4.6-4-3.8-6.9c0.9-2.9,4-4.6,6.9-3.8
			c2.9,0.9,4.6,4,3.8,6.9C26.2,138.6,23.2,140.3,20.2,139.4"/>
	</g>
	<g id="path90">
		<path vector-effect="non-scaling-stroke" class="st0" d="M22.6,131.5c-1.4-0.4-3,0.4-3.4,1.8s0.4,3,1.8,3.4s3-0.4,3.4-1.8
			C24.8,133.4,24,131.9,22.6,131.5z M20.7,137.8c-2-0.6-3.2-2.7-2.6-4.8c0.6-2,2.7-3.2,4.8-2.6c2,0.6,3.2,2.7,2.6,4.8
			C24.9,137.2,22.7,138.4,20.7,137.8"/>
	</g>
	<g id="path92">
		<path vector-effect="non-scaling-stroke" class="st0" d="M24.7,129.5c-0.3-0.1-0.5-0.4-0.4-0.7l0.7-2.2c0.1-0.3,0.4-0.5,0.7-0.4
			c0.3,0.1,0.5,0.4,0.4,0.7l-0.7,2.2C25.3,129.5,25,129.6,24.7,129.5"/>
	</g>
	<g id="path94">
		<path vector-effect="non-scaling-stroke" class="st0" d="M21.8,128.7c-0.3-0.1-0.5-0.4-0.4-0.7l0.7-2.2c0.1-0.3,0.4-0.5,0.7-0.4
			c0.3,0.1,0.5,0.4,0.4,0.7l-0.7,2.2C22.4,128.6,22.1,128.8,21.8,128.7"/>
	</g>
	<g id="path96">
		<path vector-effect="non-scaling-stroke" class="st0" d="M26.5,127.5l-5-1.5c-0.3-0.1-0.5-0.4-0.4-0.7c0.1-0.3,0.4-0.5,0.7-0.4
			l5,1.5c0.3,0.1,0.5,0.4,0.4,0.7C27.1,127.4,26.8,127.6,26.5,127.5"/>
	</g>
	<g id="path98">
		<path vector-effect="non-scaling-stroke" class="st0" d="M28.3,132.2c-0.1,0-0.3-0.1-0.3-0.3l-0.5-1c-0.1-0.3,0-0.6,0.3-0.7
			c0.3-0.1,0.6,0,0.7,0.3l0.5,1c0.1,0.3,0,0.6-0.3,0.7C28.6,132.3,28.5,132.3,28.3,132.2"/>
	</g>
	<g id="path100">
		<path vector-effect="non-scaling-stroke" class="st0" d="M21.7,134.6c-0.1,0-0.3-0.2-0.3-0.3c-0.1-0.3,0-0.6,0.3-0.7l1.7-0.8
			c0.3-0.1,0.6,0,0.7,0.3c0.1,0.3,0,0.6-0.3,0.7l-1.7,0.8C22,134.6,21.9,134.6,21.7,134.6"/>
	</g>
	<g id="path102">
		<path vector-effect="non-scaling-stroke" class="st0" d="M21.2,20.9h0.9c0.1-0.5,0.3-1.1,0.7-1.6l0,0c0.2-0.2,0.7-0.8,0.6-1.6
			c-0.1-1.1-0.9-1.8-1.9-1.8c-1,0-1.9,0.8-1.9,1.9c0,0.5,0.2,1.1,0.6,1.4C20.8,19.7,21.1,20.4,21.2,20.9z M22.6,22.1h-1.9
			c-0.3,0-0.5-0.2-0.6-0.5c0-0.3-0.2-1.1-0.6-1.6c-0.6-0.5-0.9-1.4-0.9-2.2c0-1.6,1.3-3,3-3s2.9,1.1,3.1,2.8c0.2,1.3-0.7,2.3-1,2.5
			c-0.4,0.4-0.5,1.2-0.5,1.4c0,0.1-0.1,0.3-0.2,0.4C22.9,22,22.8,22.1,22.6,22.1"/>
	</g>
	<g id="path104">
		<path vector-effect="non-scaling-stroke" class="st0" d="M22,24h-0.7c-0.3,0-0.6-0.2-0.6-0.6s0.2-0.6,0.6-0.6H22
			c0.3,0,0.6,0.2,0.6,0.6S22.3,24,22,24"/>
	</g>
	<g id="path106">
		<path vector-effect="non-scaling-stroke" class="st0" d="M21.7,20.4c-0.3,0-0.6-0.2-0.6-0.6v-1.1c0-0.3,0.2-0.6,0.6-0.6
			s0.6,0.2,0.6,0.6v1.1C22.2,20.2,22,20.4,21.7,20.4"/>
	</g>
	<g id="path108">
		<path vector-effect="non-scaling-stroke" class="st0" d="M21.6,16.7c-0.1,0-0.2,0.1-0.2,0.2s0.1,0.2,0.2,0.2s0.2-0.1,0.2-0.2
			S21.8,16.7,21.6,16.7z M21.6,17.8c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9s0.9,0.4,0.9,0.9C22.5,17.5,22.1,17.8,21.6,17.8"
			/>
	</g>
	<g id="path110">
		<path vector-effect="non-scaling-stroke" class="st0" d="M18.6,14.7c-0.1,0-0.3-0.1-0.4-0.2l-0.8-0.8c-0.2-0.2-0.2-0.6,0-0.8
			c0.2-0.2,0.6-0.2,0.8,0l0.8,0.8c0.2,0.2,0.2,0.6,0,0.8C18.9,14.7,18.8,14.7,18.6,14.7"/>
	</g>
	<g id="path112">
		<path vector-effect="non-scaling-stroke" class="st0" d="M24.7,15c-0.1,0-0.3-0.1-0.4-0.2c-0.2-0.2-0.2-0.6,0-0.8l0.8-0.8
			c0.2-0.2,0.6-0.2,0.8,0c0.2,0.2,0.2,0.6,0,0.8l-0.8,0.8C25,14.9,24.8,15,24.7,15"/>
	</g>
	<g id="path114">
		<path vector-effect="non-scaling-stroke" class="st0" d="M26.1,17c-0.3,0-0.5-0.2-0.6-0.5c0-0.3,0.2-0.6,0.5-0.6l1.1-0.1
			c0.3,0,0.6,0.2,0.6,0.5c0,0.3-0.2,0.6-0.5,0.6L26.1,17L26.1,17"/>
	</g>
	<g id="path116">
		<path vector-effect="non-scaling-stroke" class="st0" d="M17.1,17L17.1,17L16,16.9c-0.3,0-0.5-0.3-0.5-0.6c0-0.3,0.3-0.5,0.6-0.5
			l1.1,0.1c0.3,0,0.5,0.3,0.5,0.6C17.7,16.8,17.4,17,17.1,17"/>
	</g>
	<g id="path118">
		<path vector-effect="non-scaling-stroke" class="st0" d="M21.7,13.7c-0.3,0-0.6-0.2-0.6-0.6V12c0-0.3,0.2-0.6,0.6-0.6
			s0.6,0.2,0.6,0.6v1.1C22.2,13.4,22,13.7,21.7,13.7"/>
	</g>
	<g id="path130">
		<path vector-effect="non-scaling-stroke" class="st0" d="M236.2,196.3c-0.1,0-0.1,0.1-0.1,0.1v9.1c0,0.1,0.1,0.1,0.1,0.1h5.2
			c0.1,0,0.1-0.1,0.1-0.1v-9.1c0-0.1-0.1-0.1-0.1-0.1C241.4,196.3,236.2,196.3,236.2,196.3z M241.4,206.8h-5.2
			c-0.7,0-1.3-0.6-1.3-1.3v-9.1c0-0.7,0.6-1.3,1.3-1.3h5.2c0.7,0,1.3,0.6,1.3,1.3v9.1C242.7,206.2,242.1,206.8,241.4,206.8"/>
	</g>
	<g id="path132">
		<path vector-effect="non-scaling-stroke" class="st0" d="M236,203.9h5.5v-6H236V203.9z M242.1,205.1h-6.7c-0.3,0-0.6-0.3-0.6-0.6
			v-7.1c0-0.3,0.3-0.6,0.6-0.6h6.7c0.3,0,0.6,0.3,0.6,0.6v7.1C242.7,204.8,242.4,205.1,242.1,205.1"/>
	</g>
	<g id="path134">
		<path vector-effect="non-scaling-stroke" class="st0" d="M238.4,202.9c-0.3,0-0.6-0.1-1-0.3c-0.3-0.2-0.4-0.5-0.2-0.8
			c0.2-0.3,0.5-0.4,0.8-0.2c0.2,0.1,0.4,0.2,0.4,0.2c0.3-0.5,0.7-1.1,0.7-1.4c0-0.1-0.2-0.2-0.3-0.3c-0.3-0.2-0.4-0.5-0.2-0.8
			s0.5-0.4,0.8-0.2c0.1,0.1,0.9,0.6,0.9,1.3c0,0.8-0.8,1.9-1,2.1l0,0C239.2,202.7,238.9,202.9,238.4,202.9"/>
	</g>
	<g id="path136">
		<path vector-effect="non-scaling-stroke" class="st0" d="M39.9,69.4c-0.3,0-0.5,0.1-0.8,0.2c-0.3,0.2-0.6,0.5-0.6,0.9
			c-0.2,0.8,0.3,1.5,1.1,1.7c0.8,0.2,1.5-0.3,1.7-1.1c0.2-0.8-0.3-1.5-1.1-1.7C40.1,69.4,40,69.4,39.9,69.4L39.9,69.4z M39.9,73.4
			c-0.2,0-0.4,0-0.6-0.1c-1.4-0.3-2.3-1.7-1.9-3.1c0.2-0.7,0.6-1.3,1.2-1.6s1.3-0.5,2-0.3c1.4,0.3,2.3,1.7,1.9,3.1
			C42.1,72.6,41,73.4,39.9,73.4"/>
	</g>
	<g id="path138">
		<path vector-effect="non-scaling-stroke" class="st0" d="M197.2,133.3l-0.2-1.2l1.7-0.3l0.2,1.2L197.2,133.3"/>
	</g>
	<g id="path140">
		<path vector-effect="non-scaling-stroke" class="st0" d="M199.1,131.1l-0.3-1.7l1.2-0.2l0.3,1.7L199.1,131.1"/>
	</g>
	<g id="path142">
		<path vector-effect="non-scaling-stroke" class="st0" d="M201.3,132.6l-0.2-1.2l1.6-0.3l0.2,1.2L201.3,132.6"/>
	</g>
	<g id="path144">
		<path vector-effect="non-scaling-stroke" class="st0" d="M199.8,135.3l-0.3-1.8l1.2-0.2l0.3,1.8L199.8,135.3"/>
	</g>
	<g id="path146">
		<path vector-effect="non-scaling-stroke" class="st0" d="M172.8,19.7l2.5,0.4l0.3-2.4l-2.5-0.4L172.8,19.7z M176.3,21.4l-4.8-0.7
			l0.7-4.7l4.8,0.7L176.3,21.4"/>
	</g>
	<g id="path148">
		<path vector-effect="non-scaling-stroke" class="st0" d="M30.4,187.1l2.5,0.4l0.3-2.4l-2.5-0.4L30.4,187.1L30.4,187.1z
			 M33.9,188.8l-4.8-0.7l0.7-4.7l4.8,0.7L33.9,188.8"/>
	</g>
</g>
<g>
	<line class="st1" x1="99.1" y1="99.7" x2="134.4" y2="99.7"/>
	<line class="st1" x1="153.3" y1="105.1" x2="188.6" y2="105.1"/>
	<line class="st1" x1="91.4" y1="110.5" x2="126.8" y2="110.5"/>
	<line class="st1" x1="91.4" y1="137.6" x2="126.8" y2="137.6"/>
	<line class="st1" x1="91.4" y1="195.6" x2="126.8" y2="195.6"/>
	<line class="st1" x1="89.8" y1="208.9" x2="125.2" y2="208.9"/>
	<line class="st1" x1="99.4" y1="224" x2="134.8" y2="224"/>
	<g>
		<path class="st2" d="M163.3,77H121c-0.6,0-1.1,0.6-1.1,1.4c0,0.8,0.5,1.4,1.1,1.4h42.3c0.6,0,1.1-0.6,1.1-1.4
			C164.5,77.6,164,77,163.3,77z"/>
		<g>
			<path class="st3" d="M123.2,77.9c-1.3,0-1.3,1.1,0,1.1C124.5,79,124.5,77.9,123.2,77.9z"/>
			<path class="st3" d="M126.8,77.3c-2.6,0-2.6,2.2,0,2.2C129.4,79.5,129.4,77.3,126.8,77.3z"/>
			<path class="st3" d="M130.8,77.9c-1.3,0-1.3,1.1,0,1.1C132.1,79,132.1,77.9,130.8,77.9z"/>
		</g>
	</g>
	<g>
		<circle cx="99.1" cy="78.2" r="2.8"/>
		<circle class="st4" cx="99.1" cy="78.2" r="1.7"/>
	</g>
	<g id="path16">
		<g>
			<path vector-effect="non-scaling-stroke" class="st5" d="M90.5,259.5h98.9c6.2,0,11.3-5.2,11.3-11.7V82.5c0-6.5-5-11.7-11.3-11.7
				H90.5c-6.2,0-11.3,5.2-11.3,11.7v165.2C79.2,254.3,84.2,259.5,90.5,259.5"/>
		</g>
	</g>
	<g id="path18">
		<path vector-effect="non-scaling-stroke" class="st6" d="M95,255.3h91c5.7,0,10.4-5,10.4-11.3V85.2c0-6.2-4.6-11.3-10.4-11.3H95
			c-5.7,0-10.4,5-10.4,11.3V244C84.7,250.3,89.3,255.3,95,255.3"/>
	</g>
	<g id="path18_00000043436522902838096340000017037318852889217952_">
		<path vector-effect="non-scaling-stroke" class="st7" d="M97.4,238.6h86.2c5.4,0,9.8-4.3,9.8-9.7v-137c0-5.4-4.4-9.7-9.8-9.7H97.4
			c-5.4,0-9.8,4.3-9.8,9.7v137C87.6,234.3,92,238.6,97.4,238.6"/>
	</g>
	<g>
		<g id="path20">
			<path vector-effect="non-scaling-stroke" class="st8" d="M133.8,246.6c0,3.9,3.2,7,7,7c3.9,0,7-3.2,7-7s-3.2-7-7-7
				S133.8,242.7,133.8,246.6"/>
		</g>
		<g id="path20_00000135653853942821103630000000731233361881167745_">
			<path vector-effect="non-scaling-stroke" class="st9" d="M135.9,246.6c0,2.7,2.2,4.9,4.9,4.9c2.7,0,4.9-2.2,4.9-4.9
				s-2.2-4.9-4.9-4.9C138.1,241.7,135.9,243.9,135.9,246.6"/>
		</g>
	</g>
	<g id="path24">
		<path vector-effect="non-scaling-stroke" class="st10" d="M95.8,63.7v-0.1h93.8H97.4C96.9,63.6,96.3,63.6,95.8,63.7"/>
	</g>
	<g>
		<g>
			<g id="path34_00000145016644740573673530000007096309592903074470_">
				<path vector-effect="non-scaling-stroke" class="st8" d="M127.1,91.3c0-4.2,9.7-10.7,15.7-10.7c8.5,0,16.6,5,16.6,10.9
					s-8.2,10.4-16.6,10.4S127.1,97.2,127.1,91.3"/>
			</g>
			<g>
				<g id="path28_00000137101664806600896670000016804153171652101048_">
					<path vector-effect="non-scaling-stroke" class="st11" d="M165.3,58.8c0.2-4.2-2.1-7.7-5.2-7.8c-3.1-0.2-5.8,3.1-6,7.2
						c-0.2,4.2,2.1,7.7,5.2,7.8C162.4,66.2,165.1,62.9,165.3,58.8"/>
				</g>
				<g id="path30_00000039855005359263232820000012808968419344409532_">
					<path vector-effect="non-scaling-stroke" class="st12" d="M163.7,58.7c0.2-4.2-1.7-7.7-4.4-7.8c-2.7-0.1-5,3.1-5.2,7.3
						c-0.2,4.2,1.7,7.7,4.4,7.8C161.1,66.1,163.5,62.9,163.7,58.7"/>
				</g>
				<g id="path32_00000008123505865428332170000010346475319775789479_">
					<path vector-effect="non-scaling-stroke" class="st13" d="M163.7,47c-0.1,3.3-1.2,6-2.4,6c-1.3-0.1-3-3-2.9-6.2
						c0.1-3.3,1-4.4,2.8-4.3C163.2,42.5,163.9,43.7,163.7,47"/>
				</g>
				<g id="path36_00000180332805130577303970000013861883129956534931_">
					<path vector-effect="non-scaling-stroke" class="st14" d="M183.1,209.1c-0.8-6.9-7.2-26.6-7.2-26.6H128l-10.5,10.9l-2.5,45.3
						l68.8,0C184.1,227.5,183.9,216.9,183.1,209.1"/>
				</g>
				<g id="path38_00000031166373679835960660000002148665246353201580_">
					<path vector-effect="non-scaling-stroke" class="st15" d="M156.5,95c-7.7,0-15.4,0-23,0l1.5-12.2l1-13.8
						c6.4,3.5,12.9,7.1,19.3,10.6C155.7,84.7,156.1,89.9,156.5,95z"/>
				</g>
				<g id="path40_00000065790397332585845340000001526410405284731294_">
					<path vector-effect="non-scaling-stroke" class="st15" d="M162.4,58.4c0,1.9-1.3,3.6-3,3.6c-1.7,0-3.1-1.5-3.1-3.5
						c0-1.9,1.3-3.6,3-3.6C161,54.9,162.4,56.4,162.4,58.4"/>
				</g>
				<g id="path42_00000150063975002216097740000003176486975252403588_">
					<path vector-effect="non-scaling-stroke" class="st16" d="M135.2,63.4l-2-23.5l27.4-0.5c2.9,20.7,0.3,37.1-6.9,40.6
						c-4.4,2.1-8.4,1.3-8.4,1.3c-4.9-1-7.5-5.1-8.1-6.1C134,70.1,135,64.7,135.2,63.4z"/>
				</g>
				<g id="path44_00000090252810759182149610000008188421645299566235_">
					<path vector-effect="non-scaling-stroke" class="st13" d="M155,45.8c-6,0.7-9.7-2.1-16-1.9c-4.1,0.2-6.5-3.6-5.9-6.5
						c1.3-6.4,11.6-5.2,15.6-5c9.5,0.5,13.1-1,15.3-1.9c1-0.4,2.2,0.3,2.2,1.4C165.9,41.5,161.2,45.1,155,45.8"/>
				</g>
				<g id="path46_00000089543955477839993370000003949229775363790260_">
					<path vector-effect="non-scaling-stroke" class="st13" d="M136,48.6c-0.7,2-0.4,7.6-2.2,8c-1.9,0.4-6.2-1.4-6.2-11.2
						c0-3.6,2.4-9.6,6.8-8C141.9,40.3,137.6,43.7,136,48.6"/>
				</g>
				<g id="path48_00000055691035017345340360000006428132036416847018_">
					<path vector-effect="non-scaling-stroke" class="st17" d="M159,97c0,0-7.6,5.9-21.3,2.6l7.1,47l-1.5,39l0.5,2.5l36.9-2.5
						l-14.4-55.7L159,97"/>
				</g>
				<g id="path50_00000054256839347619544800000007485193682003319711_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M112,102.4l13.7-7.4l7,2.5l22.6,55.8v68.5c0,0-10,2.2-10.7,2.2
						s-32.6-1.9-32.6-1.9l5.2-51.1l-2.8-42.3L112,102.4"/>
				</g>
				<g id="path52_00000005257986837410762090000006109001480373657788_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M158.7,89.1l9.8,47.7l8.3,27.8l1.5-31.8l2.1-30.5L158.7,89.1"/>
				</g>
				<g id="path54_00000054243675300216616600000012105129038623542968_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M179.9,102.3c4.1,1.2,5.6,10,6.8,18.5c1.5,10.7,3.8,109,3.8,109
						s-8.7-15.4-11-18.8c-1.5-2.3-3.1-8.3-3.5-11.2C172.9,175.6,172,99.9,179.9,102.3"/>
				</g>
				<g id="path56_00000125569517262153668600000003626699254098215809_">
					<path vector-effect="non-scaling-stroke" class="st19" d="M135.3,56.5c-0.4-0.1-0.9-0.1-1.4-0.1c-2.1,0.2-3.7,2-3.4,3.9
						c0.2,1.9,2.1,3.3,4.2,3.1c0.5-0.1,0.9-0.2,1.3-0.4L135.3,56.5"/>
				</g>
				<g id="path58_00000068658406582926341790000009386018026145728914_">
					<path vector-effect="non-scaling-stroke" class="st8" d="M124.9,92.5c-1,3.2-5,17.3-5,17.3l6.8,1.5l-5.6,5l34.5,32.4
						c0,0-23.1-59.4-23.6-61.3c0,0-5,2-6.3,3C125.5,90.7,125.2,91.7,124.9,92.5"/>
				</g>
				<g id="path60_00000144332380123307714260000007197138502935802000_">
					<path vector-effect="non-scaling-stroke" class="st8" d="M171.5,98.8l-4.1,3.3l5.6,1.5l-2,41.9c0,0-4.9-15.8-8.4-31.5
						c-2.6-11.6-4.2-24.3-5.2-27c0,0,3,1.3,4,1.9C162.1,89.4,171.5,98.8,171.5,98.8"/>
				</g>
				<g id="path62_00000062178146697779168870000003649212016284318871_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M155.1,32.7c-2.3-1.7-6-3.4-11.5-2.3c-10,2.1-11.2,18.9-11.2,19.6
						l2.1,0.1c0-0.2,1.1-16,9.6-17.8c3.2-0.7,5.4-0.4,7.3,0.4C151.4,32.8,155.2,32.8,155.1,32.7"/>
				</g>
				<g>
					<path class="st20" d="M144.5,71.8h9.3c0,0.3-0.1,2.1-1.5,3.3c-1.6,1.3-3.8,1.1-5.2,0.3C145,74.3,144.5,72.1,144.5,71.8z"/>
					<path class="st21" d="M150.6,74.3h-2.4c-1.4,0-2.5-1.1-2.5-2.5v0h7.3v0C153,73.2,151.9,74.3,150.6,74.3z"/>
				</g>
				<g id="path76_00000098913181260488579770000010232614846315714223_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M117.1,137.1c0,0-4-34.1-5-34.8c-1.6-1-8.6,5.8-10.2,8.5
						c-4.6,7.6-8,25.3-9.4,33.1c-1.6,9.3-2.9,25.5-1.4,34.1c0.5,2.6,3.2,10.8,3.2,10.8l18.4-27.8L117.1,137.1"/>
				</g>
				<g id="path64_00000042701688125791997130000000097844136921347717_">
					<path vector-effect="non-scaling-stroke" class="st14" d="M151,72.8h-3.1c-0.6,0-1.2,0.5-1.4,1.1c-3.7-0.3-7-2.5-8.9-6
						l-2.5-4.5l-1.1,0.7l2.5,4.5c2.1,3.8,5.9,6.3,9.9,6.6c0.2,0.7,0.7,1.2,1.4,1.2h3.1c0.8,0,1.5-0.7,1.5-1.6v-0.4
						C152.5,73.5,151.8,72.8,151,72.8"/>
				</g>
				<g id="path66_00000019656345326304335230000010022714566918587012_">
					<path vector-effect="non-scaling-stroke" class="st12" d="M137.5,58.7c0.4,4.1-1.7,7.8-4.7,8.1c-3.1,0.3-5.9-2.8-6.4-6.9
						c-0.4-4.1,1.7-7.8,4.7-8.1C134.2,51.4,137,54.5,137.5,58.7"/>
				</g>
				<g id="path68_00000118359062429529975620000009544035988262993836_">
					<path vector-effect="non-scaling-stroke" class="st11" d="M135.8,58.8c0.4,4.1-1.3,7.7-4,8s-5.1-2.8-5.6-7
						c-0.4-4.1,1.3-7.7,4-8C132.9,51.6,135.4,54.7,135.8,58.8"/>
				</g>
				<g id="path70_00000050638863517972458170000014810829427537834679_">
					<path vector-effect="non-scaling-stroke" class="st22" d="M134.7,58.9c0.4,3.3-1.3,6.1-3.7,6.4c-2.4,0.3-4.7-2.2-5-5.4
						c-0.4-3.3,1.3-6.1,3.7-6.4C132.1,53.2,134.4,55.7,134.7,58.9"/>
				</g>
				<g id="path72_00000177462769766870689780000008565468946434141110_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M133,59.1c0.3,3.2-1,6-3,6.2c-2,0.2-4-2.2-4.3-5.4
						c-0.3-3.2,1-6,3-6.2C130.7,53.5,132.6,55.9,133,59.1"/>
				</g>
				<g id="path74_00000125599363786737551230000016330623792546106545_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M179.4,133.2c0,0-0.4-29.5,0.3-30.3c1.2-1.2,4.4,1.4,5.8,3
						c4,4.5,23.1,45.9,18.9,61.6c-0.6,2.4-7.7,5-7.7,5s-10.3-10.2-10.7-11.1c-2.6-6.1-5.9-25.7-5.9-25.7
						C179.6,135,179.4,134.1,179.4,133.2"/>
				</g>
				<g id="path78_00000046330886332062379890000015343667542998363306_">
					<path vector-effect="non-scaling-stroke" class="st21" d="M135,184.4h42.2l9.5-59.9h-42.2L135,184.4"/>
				</g>
				<g id="path80_00000103987338209787610930000002513920501382703524_">
					<path vector-effect="non-scaling-stroke" class="st16" d="M183.3,163.2l-7.8-4.5c0,0-5.3-2.3-6.4-3.2c-0.9-0.6-7.5-5.2-7.8-7.6
						c0-0.3,0.4-1.5,0.4-1.5s-0.5-1.4-0.8-1.7c-0.3-0.4,1-1.3,2.5-1.1c0.1,0,1.3,0.2,2.7,0.5c2.1,0.4,5.7,0.1,5.7,0.1
						s-2.4-1.4-4.4-1.7c-1.1-0.2-3.6-0.2-4.3-1.2c-0.2-0.3,0-1.6,1.8-2c1.6-0.3,10,0.8,15.2,2c0.6,0.1,1.2-3.7,1.2-3.7
						c1.6,0,4.1,2.6,4.9,3.8c1.7,2.5,3.6,12.9,3.6,12.9L183.3,163.2"/>
				</g>
				<g id="path82_00000163044378868372625470000007275732292959678114_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M179.7,162.1l13.6-9.4c0,0,11.3,9.7,11.3,14.2c0,2-2.9,6.1-4.9,7.4
						c-1.3,0.9-4.8,1.5-6.3,1.2C188.3,174.2,179.7,162.1,179.7,162.1"/>
				</g>
				<g id="path84_00000091703070660209096190000002866558247628923532_">
					<path vector-effect="non-scaling-stroke" class="st16" d="M131.6,170.4l12.9-3.8c0,0,4.3-0.7,5.5-1.5c0.9-0.6,7.5-5.2,7.8-7.6
						c0-0.3-0.4-1.5-0.4-1.5s0.5-1.4,0.8-1.7c0.3-0.4-1-1.3-2.5-1.1c-0.1,0-1.3,0.2-2.7,0.5c-2.1,0.4-5.7,0.1-5.7,0.1s2.4-1,4.5-1.4
						c1.1-0.2,3.6-0.2,4.3-1.2c0.2-0.3,0-1.6-1.8-2c-1.6-0.3-10.2,0-15.2,1.6c-0.4,0.1-0.7-0.2-0.6-0.6l0.5-2.1
						c-2.9,0.2-3.6,2-4.4,3.1c-1.9,2.4-9.2,10.1-9.2,10.1L131.6,170.4"/>
				</g>
				<g id="path86_00000066493291241854868560000005937268434125668284_">
					<path vector-effect="non-scaling-stroke" class="st18" d="M132.8,172.7l-9.3-16.4l-11.6,4.9l-14,14.6c0,0-5.2,11.8-4.2,12.7
						c1.2,1.1,11.7-1.6,14.1-2.3C115.1,184,132.8,172.7,132.8,172.7"/>
				</g>
			</g>
		</g>
	</g>
	<g>
		<ellipse cx="144.8" cy="57" rx="2" ry="1.9"/>
	</g>
	<g>
		<ellipse cx="155" cy="57" rx="2" ry="1.9"/>
	</g>
	<g>
		<path class="st23" d="M149.6,61.4c-0.1,2.4-0.4,4.8-0.8,7.2l-0.2-0.3c1.3,0,2.7,0.1,4,0.2c-1.4,0.1-2.9,0.2-4.3,0.2
			C148.6,66.4,149,63.9,149.6,61.4L149.6,61.4z"/>
	</g>
	<g>
		<path d="M140.3,55.2c1.2-3,5.7-3.7,7.6-1C145.3,52.6,142.4,53.1,140.3,55.2L140.3,55.2z"/>
	</g>
	<g>
		<path d="M159.4,55.1c-1.9-1.9-4.4-2.4-6.8-1C154.3,51.6,158.4,52.3,159.4,55.1L159.4,55.1z"/>
	</g>
</g>
</svg>

			<h2>Counselor
                <span>Login</span>
            </h2>

        </div>
        <div class="container mt-5">
            <form action="" autocomplete="off">
                <ul class="mt-5 d-flex user-form-option">
                    <li>
                        <input type="text" name="mobile" id="mobile" class="form-control "
                            placeholder="Enter Mobile Number">
                    </li> 
                    <li>
                        <button type="button" class="btn btn-primary" onclick="sendOtp()">Send OTP</button>
                    </li>

                </ul>
            </form>
            <div class="form-group mt-3" id="otp-view" style="display: none;">
                <ul class="mt-5 d-flex user-form-option">
                    <li>
                        <input type="password" id="otp_code" class="form-control " placeholder="Enter OTP">
                    </li>
                    <li>
                        <button type="button" onclick="verify()" class="btn btn-purple"><i
                                class="fas fa-check"></i>Submit</button>
                    </li>
                    <li>
                        <button type="button" id="sendOTP" class="btn btn-purple"><i
                                class="fas fa-redo-alt"></i>Resend</button>
                    </li>
                </ul>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function() {
                // Initialize variables
                var otpTimer;
                var otpTimerCount = 120; // 2 minutes in seconds
                var otpButton = $('#sendOTP');
                // Function to start the timer
                function startOTPTimer() {
                    otpButton.attr('disabled', true);
                    otpTimer = setInterval(function() {
                        otpTimerCount--;
                        if (otpTimerCount == 0) {
                            clearInterval(otpTimer);
                            otpButton.attr('disabled', false);
                            otpButton.text('Resend OTP');
                            otpTimerCount = 120;
                        } else {
                            otpButton.text('Resend OTP in (' + otpTimerCount + 's)');
                        }
                    }, 1000);
                }
                // Send OTP button click event handler
                otpButton.click(function() {
                    // Simulate OTP sending
                    setTimeout(function() {
                        // alert('OTP sent!');
                        startOTPTimer();
                    }, 1000);
                });
            });
        </script>
        <script type="text/javascript">
            var hash_key = null;

            function sendOtp() {
                var mobile = document.querySelector('#mobile').value;
                console.log(mobile);
                var body = {
                    mobile: mobile
                };
                fetch('/counselor/sendotp', {
                    method: 'POST',
                    body: JSON.stringify(body),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json()).then(data => {

                    if (data.is_success) {
                        hash_key = data.data.hash_key;
                        var inputField = document.getElementById("otp-view");
                        if (inputField.style.display === "none") {
                            inputField.style.display = "block";
                        }
                    } else {
                        alert(data.message);
                    }
                }).catch(error => {
                    alert("Something gone wrong");
                    console.log(error);
                })

            }

            function verify() {
                var otp_code = document.querySelector('#otp_code').value;

                var body = {
                    code: otp_code,
                    hash_key: hash_key,
                };
                fetch('/counselor/verify', {
                    method: 'POST',
                    body: JSON.stringify(body),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json()).then(data => {

                    if (data.is_success) {
                        window.location.href = "/counselor/counselor/dashboard";
                    } else {
                        alert(data.message);
                    }

                }).catch(error => {
                    alert("Something gone wrong");
                })

            }
        </script>
    </section>
@endsection
@push('js')
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
            return true;
        }

        function validatePincode() {
            var l = document.getElementById('pincode').value.length;
            console.log(l);
            if (l == 6) {
                document.getElementById("search_submit").disabled = false;
                document.getElementById('pincode').style.color = "black";
            } else {
                document.getElementById('pincode').style.color = "red";
                document.getElementById("search_submit").disabled = true;
            }
        }
        var current_location = {
            latitude: "",
            longitude: ""
        };
        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }
        getCurrentLocationSchools({
            latitude: "",
            longitude: ""
        });

        function showPosition(position) {
            current_location = {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude
            }
            getCurrentLocationSchools(position.coords)
        }

        function getCurrentLocationSchools(location_data) {
            var url = `/schools/recommended?latitude=${location_data.latitude}&longitude=${location_data.longitude}`;
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    if (data) {
                        $("#recommended").html(data);
                    }
                }
            });
        }
        $("#search_key").keyup(function() {
            var keyword = $(this).val();
            $.ajax({
                type: "GET",
                url: `/school/search/home?key=${keyword}`,
                success: function(data) {
                    if (keyword.length > 0) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    } else {
                        $("#suggesstion-box").hide();
                    }
                }
            });
        })
    </script>
@endpush
