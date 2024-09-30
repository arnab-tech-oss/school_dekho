<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ !isset($redirectUrl) ? 'System Check in Progress' : 'Verification Complete' }}</title>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

    <script>
        var _paq = (window._paq = window._paq || []);
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(["trackPageView"]);
        _paq.push(["enableLinkTracking"]);
        (function() {
            var u = "https://matomo.collegeforme.org/";
            _paq.push(["setTrackerUrl", u + "matomo.php"]);
            _paq.push(["setSiteId", "2"]);
            var d = document,
                g = d.createElement("script"),
                s = d.getElementsByTagName("script")[0];
            g.async = true;
            g.src = u + "matomo.js";
            s.parentNode.insertBefore(g, s);
        })();

        var _mtm = (window._mtm = window._mtm || []);
        _mtm.push({
            "mtm.startTime": new Date().getTime(),
            event: "mtm.Start"
        });
        (function() {
            var d = document,
                g = d.createElement("script"),
                s = d.getElementsByTagName("script")[0];
            g.async = true;
            g.src = "https://matomo.collegeforme.org/js/container_Opd7n9nB.js";
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <noscript> <img referrerpolicy="no-referrer-when-downgrade"
            src="https://matomo.collegeforme.org/matomo.php?idsite=2&amp;rec=1" style="border:0" alt="" />
    </noscript>
    <style>
        body {
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            position: relative;

            margin: auto
        }

        .container img {
            width: 120px;
            height: auto;
            margin-bottom: 20px;
        }

        h1 {
            color: #2c3e50;
            font-size: 26px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 12px 24px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        #redirectTimer {
            font-weight: 600;
        }

        .spinner {
            border: 4px solid #e9ecef;
            border-top: 4px solid #007bff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .spinner.hidden {
            display: none;
        }

        .help-icon {
            /* position: absolute;
            top: 20px;
            right: 20px; */
            cursor: pointer;
            font-size: 24px;

            /* color: #007bff; */
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
            position: relative;
        }

        .modal-content h2 {
            margin-top: 0;
            font-size: 22px;
            color: #155724;
            font-weight: 500;
        }

        .modal-content ul {
            list-style-type: disc;
            margin: 0;
            padding-left: 20px;
        }

        .modal-content a {
            color: #155724;
            text-decoration: underline;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="image-wrapper">
            <img src="{{ asset('assets/school/images/sd-logo.png') }}" alt="Company Logo">
        </div>
        <h1>{{ !isset($redirectUrl) ? 'System Check in Progress' : 'Verification Complete' }}
            <span class="help-icon" id="helpIcon"><svg data-v-56bd7dfc="" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-help">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                    <path d="M12 17h.01"></path>
                </svg></span>
        </h1>

        @if (isset($redirectUrl))
            <p>You are being redirected in <span id="redirectTimer">5</span> seconds.</p>
            <div id="spinner" class="spinner"></div>
        @else
            <p style="text-align: left; padding-inline:12px;">To maintain optimal service quality, we are conducting a
                brief check of your browser and network
                settings. This ensures that everything is functioning correctly. We appreciate your patience!</p>
            <form action="{{ route('security-check-submit') }}" method="POST">
                @csrf
                <input type="text" name="redirect" id="redirectInput" hidden readonly>
                {!! getCaptchaBox() !!}
                <button type="submit">Submit</button>
            </form>
        @endif

        <!-- Help Icon -->

    </main>

    <!-- Modal -->
    <div class="modal" id="helpModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Need Assistance?</h2>
            <p>If you are encountering issues with being redirected to this page, it may be related to your browser or
                network settings. Please follow these steps to resolve the problem:</p>
            <ul>
                <li>Ensure that cookies are enabled in your browser settings.</li>
                <li>Clear your browser's cookies and cache.</li>
                <li>Temporarily disable any browser extensions that might block cookies.</li>
                <li>Check your network connection and consider trying a different network if possible.</li>
                <li>Attempt to access the page using a different browser or device.</li>
            </ul>
            <p>If the issue persists, please contact our support team</a> for
                further assistance.</p>
        </div>
    </div>

    @if (!isset($redirectUrl))
        <script>
            document.getElementById('helpIcon').addEventListener('click', function() {
                document.getElementById('helpModal').style.display = 'flex';
            });
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('helpModal').style.display = 'none';
            });
            window.onclick = function(event) {
                if (event.target === document.getElementById('helpModal')) {
                    document.getElementById('helpModal').style.display = 'none';
                }
            };

            function populateInputWithQueryParams() {
                const queryParams = new URLSearchParams(window.location.search);
                const redirectValue = queryParams.get('redirect');
                document.querySelector('#redirectInput').value = redirectValue || '';
            }

            function removeQueryParams() {
                const url = new URL(window.location.href);
                url.search = '';
                window.history.replaceState({}, document.title, url.pathname);
            }
            window.onload = function() {
                populateInputWithQueryParams();
                setTimeout(removeQueryParams, 100);
            };
        </script>
    @endif

    @if (isset($redirectUrl))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var redirectTimer = document.getElementById('redirectTimer');
                var spinner = document.getElementById('spinner');
                if (redirectTimer) {
                    var timeLeft = 5;
                    redirectTimer.textContent = timeLeft;
                    spinner.classList.remove('hidden');
                    var intervalId = setInterval(function() {
                        timeLeft--;
                        redirectTimer.textContent = timeLeft;
                        if (timeLeft <= 0) {
                            clearInterval(intervalId);
                            spinner.classList.add('hidden');
                            window.location.href = '{{ $redirectUrl }}';
                        }
                    }, 1000);
                }
            });
        </script>
    @endif
</body>

</html>
