<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Your access has been blocked due to security reasons. Contact support if you believe this is an error.">
    <title>Access Blocked</title>
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
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 650px;
            width: 90%;
            position: relative;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
            /* Adjust as necessary */
        }

        h1 {
            color: #e74c3c;
            font-size: 30px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            font-size: 16px;
            color: #ffffff;
            background-color: #3498db;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            margin: 10px;
        }

        .button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .info {
            font-size: 15px;
            color: #555555;
            margin-top: 20px;
        }

        .info a {
            color: #3498db;
            text-decoration: none;
        }

        .info a:hover {
            text-decoration: underline;
        }

        .modal {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            padding-top: 60px;
        }

        .modal.show {
            display: block;
            opacity: 1;
        }

        .modal-content {
            background-color: #ffffff;
            margin: 5% auto;
            padding: 40px;
            border: 1px solid #ddd;
            width: 90%;
            max-width: 600px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .modal-content h2 {
            color: #333;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .modal-content ul {
            list-style-type: disc;
            padding-left: 20px;
            text-align: left;
        }

        .modal-content ul li {
            margin-bottom: 10px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo"> <img src="{{ asset('assets/school/images/sd-logo.png') }}" alt="School Logo"> </div>
        <h1>Access Blocked</h1>
        <p>Your access to this service has been blocked due to security concerns. If you believe this action was taken
            in error, please review the information provided below and contact our support team for further assistance.
        </p> <button id="reasonsBtn" class="button" aria-label="View Blocking Reasons">View Blocking Reasons</button>
        <button id="contactBtn" class="button" aria-label="Contact Support">Contact Support</button>
        <div class="info">
            <p>To check the reputation of your IP address, use the <a
                    href="https://www.apivoid.com/tools/ip-reputation-check/" target="_blank">API Void IP Reputation
                    Check</a> tool.</p>
        </div>
    </div>
    <div id="reasonsModal" class="modal">
        <div class="modal-content"> <span class="close" id="reasonsClose" aria-label="Close">&times;</span>
            <h2>Reasons for Access Blockage</h2>
            <ul>
                <li>Suspicious activity detected from your account.</li>
                <li>Violation of our terms of service or usage policies.</li>
                <li>Multiple failed login attempts or other security issues.</li>
                <li>IP address flagged for potential abuse or malicious behavior.</li>
            </ul>
        </div>
    </div>
    <div id="contactModal" class="modal">
        <div class="modal-content"> <span class="close" id="contactClose" aria-label="Close">&times;</span>
            <h2>How to Contact Support</h2>
            <p>If you believe your access has been blocked in error or if you need further assistance, please contact
                our support team. Note that if your IP reputation is low, our ability to assist directly is limited as
                we use a third-party service for this feature.</p>
            <p>In such cases:</p>
            <ul>
                <li>We cannot make direct changes to your account or unblock access.</li>
                <li>We will forward your concern to the third-party service provider.</li>
                <li>The provider will review the issue and respond according to their policies.</li>
            </ul>
            <p>When contacting us, please include:</p>
            <ul>
                <li>A detailed description of the issue.</li>
                <li>Relevant screenshots or logs.</li>
                <li>Proof of compliance with our terms and policies.</li>
            </ul> <a href="mailto:info@schooldekho.org" class="button" aria-label="Email Support">Email Support</a>
        </div>
    </div>
    <script>
        const reasonsModal = document.getElementById("reasonsModal");
        const contactModal = document.getElementById("contactModal");
        const reasonsBtn = document.getElementById("reasonsBtn");
        const contactBtn = document.getElementById("contactBtn");
        const reasonsClose = document.getElementById("reasonsClose");
        const contactClose = document.getElementById("contactClose");
        reasonsBtn.onclick = function() {
            reasonsModal.classList.add("show");
        }
        contactBtn.onclick = function() {
            contactModal.classList.add("show");
        }
        reasonsClose.onclick = function() {
            reasonsModal.classList.remove("show");
        }
        contactClose.onclick = function() {
            contactModal.classList.remove("show");
        }
        window.onclick = function(event) {
            if (event.target == reasonsModal) {
                reasonsModal.classList.remove("show");
            }
            if (event.target == contactModal) {
                contactModal.classList.remove("show");
            }
        }
    </script>
</body>

</html>
