<!DOCTYPE html>
<html>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
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

    a {
        text-decoration: inherit
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

    .container {
        width: 100%
    }

    @media(min-width:640px) {
        .container {
            max-width: 640px
        }
    }

    @media(min-width:768px) {
        .container {
            max-width: 768px
        }
    }

    @media(min-width:1024px) {
        .container {
            max-width: 1024px
        }
    }

    @media(min-width:1280px) {
        .container {
            max-width: 1280px
        }
    }

    @media(min-width:1536px) {
        .container {
            max-width: 1536px
        }
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto
    }

    .my-10 {
        margin-top: 2.5rem;
        margin-bottom: 2.5rem
    }

    .mt-4 {
        margin-top: 1rem
    }

    .flex {
        display: flex
    }

    .w-\[50px\] {
        width: 50px
    }

    .justify-center {
        justify-content: center
    }

    .rounded-lg {
        border-radius: .5rem
    }

    .border-2 {
        border-width: 2px
    }

    .border-black {
        --tw-border-opacity: 1;
        border-color: rgb(0 0 0/var(--tw-border-opacity))
    }

    .bg-blue-700 {
        --tw-bg-opacity: 1;
        background-color: rgb(29 78 216/var(--tw-bg-opacity))
    }

    .p-8 {
        padding: 2rem
    }

    .px-3 {
        padding-left: .75rem;
        padding-right: .75rem
    }

    .py-10 {
        padding-top: 2.5rem;
        padding-bottom: 2.5rem
    }

    .py-2 {
        padding-top: .5rem;
        padding-bottom: .5rem
    }

    .text-center {
        text-align: center
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem
    }

    .text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem
    }

    .font-bold {
        font-weight: 700
    }

    .text-white {
        --tw-text-opacity: 1;
        color: rgb(255 255 255/var(--tw-text-opacity))
    }

    .underline {
        -webkit-text-decoration-line: underline;
        text-decoration-line: underline
    }
</style>

</head>

<body class="container flex">
    <div class="bordder border-2 justify-center border-black mx-auto my-10 py-10">
        <h1 class="text-3xl font-bold underline">
            <img class="p-8" src="https://www.schooldekho.org/assets/images/logo.png" alt="logo" />
        </h1>
        <div>
            <p class="font-bold text-2xl text-center">You are successfully unsubscribe to the newsletters.</p>
        </div>
        <div class="text-center mt-4">
            <a class="w-[50px] bg-blue-700 rounded-lg px-3 py-2 font-bold text-white" href="/" />
            Close</a>
        </div>
    </div>
