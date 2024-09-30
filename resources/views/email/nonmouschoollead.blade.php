<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /*! */
        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-black: #000;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-gray-100: #f8f9fa;
            --bs-gray-200: #e9ecef;
            --bs-gray-300: #dee2e6;
            --bs-gray-400: #ced4da;
            --bs-gray-500: #adb5bd;
            --bs-gray-600: #6c757d;
            --bs-gray-700: #495057;
            --bs-gray-800: #343a40;
            --bs-gray-900: #212529;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-primary-rgb: 13, 110, 253;
            --bs-secondary-rgb: 108, 117, 125;
            --bs-success-rgb: 25, 135, 84;
            --bs-info-rgb: 13, 202, 240;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 220, 53, 69;
            --bs-light-rgb: 248, 249, 250;
            --bs-dark-rgb: 33, 37, 41;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: 33, 37, 41;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --bs-body-font-family: var(--bs-font-sans-serif);
            --bs-body-font-size: 1rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #212529;
            --bs-body-bg: #fff;
            --bs-border-width: 1px;
            --bs-border-style: solid;
            --bs-border-color: #dee2e6;
            --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
            --bs-border-radius: 0.375rem;
            --bs-border-radius-sm: 0.25rem;
            --bs-border-radius-lg: 0.5rem;
            --bs-border-radius-xl: 1rem;
            --bs-border-radius-2xl: 2rem;
            --bs-border-radius-pill: 50rem;
            --bs-link-color: #0d6efd;
            --bs-link-hover-color: #0a58ca;
            --bs-code-color: #d63384;
            --bs-highlight-bg: #fff3cd;
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        @media (prefers-reduced-motion: no-preference) {
            :root {
                scroll-behavior: smooth;
            }
        }

        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        a {
            color: var(--bs-link-color);
            text-decoration: underline;
        }

        a:hover {
            color: var(--bs-link-hover-color);
        }

        a:not([href]):not([class]),
        a:not([href]):not([class]):hover {
            color: inherit;
            text-decoration: none;
        }

        img {
            vertical-align: middle;
        }

        table {
            caption-side: bottom;
            border-collapse: collapse;
        }

        td,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0;
        }

        ::-webkit-inner-spin-button {
            height: auto;
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0;
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button;
        }

        .container {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        @media (min-width: 1400px) {
            .container {
                max-width: 1320px;
            }
        }

        @keyframes progress-bar-stripes {
            0% {
                background-position-x: 1rem;
            }
        }

        @keyframes spinner-border {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spinner-grow {
            0% {
                transform: scale(0);
            }

            50% {
                opacity: 1;
                transform: none;
            }
        }

        @keyframes placeholder-glow {
            50% {
                opacity: 0.2;
            }
        }

        @keyframes placeholder-wave {
            100% {
                -webkit-mask-position: -200% 0%;
                mask-position: -200% 0%;
            }
        }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Lead Transfer</title>
    <link rel="stylesheet" href="https://www.schooldekho.org/email/style.css" />
</head>

<body style="background-color: white; background: white">
    <div class="container">
        <a href="https://schooldekho.org"><img style="width: 100%"
                src="https://schooldekho.org/public/email/top.webp?h=4443ede889d3931ef170e8892449cf04" /></a>
    </div>
    <div class="container">
        <table class="container" align="center" width="600" cellpadding="0" cellspacing="0">
            <tr>
                <td align="left" style="padding-left: 10%; padding-right: 10%">
                    <div>
                        <p style="text-align: justify">Dear School,</p>
                        <p style="text-align: justify">
                            A parent may be interested in your school. To connect, please contact us at 1800 258 8074.
                        </p>
                        <br />Thanks and Regards,<br />School Dekho,<br />Dekho Phir
                        Chuno.<br />www.schooldekho.org<br />
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin-top: 80px" class="container">
        <img style="width: 100%"
            src="https://schooldekho.org/public/email/mid.webp?h=cbcae391e42a51228c73118da2c0b84b" />
    </div>
    <p style="text-align: center; font-size: 10px; margin-bottom: 10px">
        If you no longer wish to receive email communications, please click on the unsubscribe link below.
    </p>
        <p style="text-align: center; font-size: 10px"><a href="{{ route('unsubscribe', [$school]) }}">Unsubscribe</a></p>
    <div class="container">
        <img style="width: 100%"
            src="https://schooldekho.org/public/email/Bottom.webp?h=3fe7a35586f49fa5060ad30903593881" />
    </div>
</body>

</html>
