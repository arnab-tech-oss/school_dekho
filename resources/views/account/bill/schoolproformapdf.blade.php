<!DOCTYPE html>
<html>
<meta charset=utf-8>
<title>Online Receipt</title>
<style>
    *,
    ::after,
    ::before {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb
    }

    ::after,
    ::before {
        --tw-content: ""
    }

    html {
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 4
    }

    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
        height: auto
    }

    ::-webkit-search-decoration {
        -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit
    }

    :disabled {
        cursor: default
    }

    *,
    ::before,
    ::after {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246/0.5);
        --tw-ring-offset-shadow: 0 0#0000;
        --tw-ring-shadow: 0 0#0000;
        --tw-shadow: 0 0#0000;
        --tw-shadow-colored: 0 0#0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia:
    }

    ::-webkit-backdrop {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246/0.5);
        --tw-ring-offset-shadow: 0 0#0000;
        --tw-ring-shadow: 0 0#0000;
        --tw-shadow: 0 0#0000;
        --tw-shadow-colored: 0 0#0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia:
    }

    .absolute {
        position: absolute
    }

    .top-\[320px\] {
        top: 320px
    }

    .z-10 {
        z-index: 10
    }

    .w-\[21cm\] {
        width: 21cm
    }

    .px-3 {
        padding-left: .75rem;
        padding-right: .75rem
    }

    .text-8xl {
        font-size: 6rem;
        line-height: 1
    }

    .font-extrabold {
        font-weight: 800
    }

    .text-gray-400\/25 {
        color: rgb(156 163 175/0.25)
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb
    }

    ::after,
    ::before {
        --tw-content: ""
    }

    html {
        line-height: 1.5;
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 4;
        tab-size: 4;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-feature-settings: normal
    }

    body {
        margin: 0;
        line-height: inherit
    }

    h2 {
        font-size: inherit
    }

    table {
        text-indent: 0;
        border-color: inherit;
        border-collapse: collapse
    }

    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
        height: auto
    }

    ::-webkit-search-decoration {
        -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit
    }

    h1,
    h2,
    p {
        margin: 0
    }

    :disabled {
        cursor: default
    }

    img {
        display: block;
        vertical-align: middle
    }

    img {
        max-width: 100%;
        height: auto
    }

    *,
    ::before,
    ::after {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246/0.5);
        --tw-ring-offset-shadow: 0 0#0000;
        --tw-ring-shadow: 0 0#0000;
        --tw-shadow: 0 0#0000;
        --tw-shadow-colored: 0 0#0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia:
    }

    ::-webkit-backdrop {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246/0.5);
        --tw-ring-offset-shadow: 0 0#0000;
        --tw-ring-shadow: 0 0#0000;
        --tw-shadow: 0 0#0000;
        --tw-shadow-colored: 0 0#0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia:
    }

    .right-2 {
        right: .5rem
    }

    .left-2 {
        left: .5rem
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto
    }

    .mr-20 {
        margin-right: 5rem
    }

    .mt-5 {
        margin-top: 1.25rem
    }

    .mr-2 {
        margin-right: .5rem
    }

    .ml-auto {
        margin-left: auto
    }

    .flex {
        display: flex
    }

    .grid {
        display: grid
    }

    .w-full {
        width: 100%
    }

    .w-auto {
        width: auto
    }

    .table-auto {
        table-layout: auto
    }

    .justify-start {
        justify-content: flex-start
    }

    .justify-end {
        justify-content: flex-end
    }

    .justify-center {
        justify-content: center
    }

    .justify-between {
        justify-content: space-between
    }

    .border {
        border-width: 1px
    }

    .border-t-4 {
        border-top-width: 4px
    }

    .border-t {
        border-top-width: 1px
    }

    .border-b {
        border-bottom-width: 1px
    }

    .p-10 {
        padding: 2.5rem
    }

    .text-center {
        text-align: center
    }

    .text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem
    }

    .font-bold {
        font-weight: 700
    }

    @keyframes fadeOutHighlight {
        from {
            background-color: rgba(155, 215, 255, 0.5)
        }

        to {
            background-color: rgba(155, 215, 255, 0)
        }
    }

    @keyframes fadeOutHighlightIMG {
        0% {
            filter: sepia(100%) hue-rotate(180deg) saturate(200%)
        }

        33% {
            filter: sepia(66%) hue-rotate(180deg) saturate(100%)
        }

        50% {
            filter: sepia(50%) hue-rotate(90deg) saturate(50%)
        }

        66% {
            filter: sepia(33%) hue-rotate(0deg) saturate(100%)
        }

        100% {
            filter: sepia(0%) hue-rotate(0deg) saturate(100%)
        }
    }

    @keyframes fiveserverInfoPopup {
        0% {
            top: -40px
        }

        15% {
            top: 4px
        }

        85% {
            top: 4px
        }

        100% {
            top: -40px
        }
    }

    body {
        background: #ccc
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: .5cm;
        box-shadow: 0 0 .5cm rgba(0, 0, 0, 0.5)
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm
    }

    .sf-hidden {
        display: none !important
    }
</style>
<meta name=author content=Its-Satyajit>
<meta http-equiv=content-security-policy
    content="default-src 'none'; font-src 'self' data:; img-src 'self' data:; style-src 'unsafe-inline'; media-src 'self' data:; script-src 'unsafe-inline' data:; object-src 'self' data:; frame-src 'self' data:;">
</head>

<body>
    <page size="A4">
        <div
            class="fixed p-10 text-gray-400/25 w-[21cm] text-8xl text-center justify-center absolute font-extrabold top-[320px]">
            <span class="mx-auto">PROFORMA <br />
                INVOICE</span>
        </div>
        <div class="p-10">
            <div class="z-10">
                <div style="text-indent: 0pt; text-align: left">
                    <div class="flex">
                        <img width="219" height="112" alt="image"
                            src="{{ asset('account/Image_001.png') }}" />
                        <div class="mx-auto text-center">
                            <h1 class="text-3xl font-bold">
                                PROFORMA INVOICE 
                            </h1>
                            <h2 class="font-bold">SCHOOL COPY</h2>
                            <p class="s1">GSTIN NO.: {{ $bill->gst_number }}</p>
                        </div>
                    </div>
                </div>
                <p style="text-indent: 0pt; text-align: left">
                    <br />
                </p>
                <p style="text-indent: 0pt; text-align: left">
                    <br />
                </p>
                <p class="s2"
                    style="
            padding-left: 2pt;
            text-indent: 0pt;
            line-height: 2pt;
            text-align: left;
          ">
                </p>
                <div class="flex justify-between border-t-4 border-t border-b-4 border-b">
                    <div>RECEIPT DATE : {{ $bill->created_at->format('d-m-Y') }}</div>
                    <div class="mr-20">RECEIPT NUMBER : SD/SC/{{ $bill_id }}</div>
                </div>
                <table class="w-full table-auto">
                    <thead class="w-full">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-3">School</td>
                            <td class="px-3">:</td>
                            <td class="px-3">{{ $bill->school->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-3">Location</td>
                            <td class="px-3">:</td>
                            <td class="px-3">{{ $bill->location }}</td>
                        </tr>
                        <tr>
                            <td class="px-3">Mobile No.</td>
                            <td class="px-3">:</td>
                            <td class="px-3">{{ $bill->mobile }}</td>
                        </tr>
                        <tr>
                            <td class="px-3">Email ID</td>
                            <td class="px-3">:</td>
                            <td class="px-3">{{ $bill->email_id }}</td>
                        </tr>
                        @if($bill->school_gst_number)
                        <tr>
                            <td class="px-3">School GST Number</td>
                            <td class="px-3">:</td>
                            <td class="px-3">{{ $bill->school_gst_number }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <p>
                    <br />
                </p>
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="border-2 border">
                                <p>Sl. No.</p>
                            </td>
                            <td class="border">
                                <p>Product Head Name</p>
                            </td>
                            <td class="border-2 border">
                                <p>Fee Amount</p>
                            </td>
                            <td class="border-2 border">
                                <p>CGST (9%)</p>
                            </td>
                            <td class="border-2 border">
                                <p>SGST (9%)</p>
                            </td>
                            <td class="border-2 border">
                                <p>Amount</p>
                            </td>
                        </tr>
                        <tr style="height: 150pt">
                            <td class="border-2 border">
                                <p>1</p>
                            </td>
                            <td class="border-2 border">
                                <p>
                                    <span>SCHOOL DEKHO 1 YEAR
                                        <br />
                                        SUBSCRIPTION</span>
                                </p>
                                <p class="s4">SAC : 9983</p>
                            </td>
                            <td class="border-2 border">
                                <p class="s4">Rs. {{ $bill->received_amount }}/-</p>
                            </td>
                            <td class="border-2 border">
                                <p>Rs. {{ $bill->cgst }}/-</p>
                            </td>
                            <td class="border-2 border">
                                <p class="s4">Rs. {{ $bill->sgst }}/-</p>
                            </td>
                            <td class="border-2 border">
                                <p class="s4">Rs. {{ $bill->total }}/-</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="grid right-2 justify-end w-auto">
                    <div>
                        Total Amount : Rs. {{ $bill->total_fees_amount }}/-
                    </div>
                    {{-- <div>
                        Due Amount : Rs. {{ $bill->due_amount }}/-
                    </div> --}}
                </div>
                <div class="grid left-2 justify-start w-auto">
                    <div>
                        Mode of Payment: {{ $bill->payment_mode }}
                    </div>
                    @if ($bill->payment_mode == 'Online')
                        <div>
                            Transaction ID: {{ $bill->transaction_id }}
                        </div>
                    @endif
                    @if ($bill->payment_mode == 'cheque')
                        <div>
                            Bank Name: {{ $bill->bank_name }}
                        </div>
                        <div>
                            Cheque Number:{{ $bill->cheque_number }}
                        </div>
                    @endif
                </div>
             
            </div>
        </div>
    </page>
</body>
