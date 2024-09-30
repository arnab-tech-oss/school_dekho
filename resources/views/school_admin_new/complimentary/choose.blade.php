<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        :root {
            --bg-color: #f5f5f5;
            --text-color: #333;
            --alt-text-color: #000066;
            --link-color: #0077cc;
            --link-hover-color: #005ea6;
            --font-size: 16px;
            --line-height: 1.5;
            --font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI',
                Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue',
                sans-serif;
            --padding: 50px;
            --border-radius: 5px;
            --box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --animation: none;
            --animation-delay: 0;
            --animation-duration: 1s;
            --border: 1px solid #ccc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: var(--font-family);
            min-width: 0;
        }

        .container {
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            background-color: var(--bg-color);
        }

        .image-wrapper {
            margin-inline: auto;
            width: 1024px;
            height: auto;
            position: relative;
        }

        .image-wrapper img.image {
            width: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: var(--border-radius);
            border: var(--border);
        }

        .image-wrapper img.logo {
            height: 150px;
        }

        .alt-text {
            color: var(--alt-text-color);
        }

        header.header {
            position: absolute;
            top: var(--padding);
            left: var(--padding);
            right: var(--padding);
            display: flex;
            justify-content: space-between;
            z-index: 99;
        }

        .hash-tag {
            font-weight: 600;
            font-size: large;
        }

        footer.footer {
            position: absolute;
            bottom: var(--padding);
            left: var(--padding);
            right: var(--padding);
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--alt-text-color);
        }

        footer.footer span:not(:last-child)::after {
            content: '|';
            padding-inline: 10px;
        }

        footer.footer P:last-child {
            font-size: 14px;
            color: #000066b5;
            font-weight: 500;
        }

        .follow-on {
            display: flex;
            gap: 12px;
        }

        .footer-icons {
            display: flex;

            height: 1.5rem;
            gap: 12px;
            margin-top: auto;
        }

        div.copyright {
            position: absolute;
            right: calc(var(--padding) - 100px);
            bottom: calc(var(--padding) + 150px);
            transform: rotate(270deg);
        }

        div.copyright span.copyright-text {
            opacity: 15%;
            filter: blur(0.25px);
            font-size: 0.75rem;
            font-weight: 600;
        }

        .download-button {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px
        }

        .download-button button {
            all: unset;
            font-size: 2rem;
            padding: 6px 12px;
            border-radius: 3px;
            cursor: pointer;
            font-weight: 600;
            background: white;
            transition: all 0.3s ease;
            border: #333 1px solid;
        }

        .download-button button:hover {
            transform: scale(1.01);
        }

        .image-filler {
            background-color: rgba(255, 255, 255, 0);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 22222222222;
        }
    </style>
</head>

<body class="container">
    <div id="myDiv" class="image-wrapper">
        <header class="header">
            <span class="alt-text hash-tag">#{{ $event?->event_hash_tag }}</span>
            <img class="logo" src="{{ $school_details->school_logo }}" alt="logo" />
        </header>
        @php
            $image_path = public_path('storage/complimentary/' . $event_picture->image);
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($image_path));
            //   dd($image);
        @endphp
        <div class="image-wrapper">
            {{-- <img class="image" alt="Saraswati Puja for Schools"
          src="{{ asset('storage/complimentary/' . $event_picture->image) }}" /> --}}
            <img class="image" alt="Saraswati Puja for Schools" src="{{ $image }}" />
        </div>

        <footer class="footer">
            <p> {{ $school_details->name }}</p>
            <p> {{ ucwords(strtolower($school_details->school_address[0]?->address)) }} 
            <!--<span>-->
            <!--        {{ ucwords(strtolower($school_details->school_address[0]?->contact)) }}</span>-->
            </p>
        </footer>
        <div class="copyright">
            <span class="copyright-text">Copyright © {{ date('Y') }} www.schooldekho.org</span>
        </div>
        {{-- <button id="download-btn" onclick="convertToImage()">Convert It to Your Brand</button> --}}
        {{-- Now You Can Download This Image --}}
        <div class="image-filler">
        </div>
    </div>
    <div class="download-button image-wrapper"> <button id="download" class="action">Download <svg
                xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                <path
                    d="M17 17H17.01M17.4 14H18C18.9319 14 19.3978 14 19.7654 14.1522C20.2554 14.3552 20.6448 14.7446 20.8478 15.2346C21 15.6022 21 16.0681 21 17C21 17.9319 21 18.3978 20.8478 18.7654C20.6448 19.2554 20.2554 19.6448 19.7654 19.8478C19.3978 20 18.9319 20 18 20H6C5.06812 20 4.60218 20 4.23463 19.8478C3.74458 19.6448 3.35523 19.2554 3.15224 18.7654C3 18.3978 3 17.9319 3 17C3 16.0681 3 15.6022 3.15224 15.2346C3.35523 14.7446 3.74458 14.3552 4.23463 14.1522C4.60218 14 5.06812 14 6 14H6.6M12 15V4M12 15L9 12M12 15L15 12"
                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg></button></div>
    <div id="download-message" style="display: none">
    </div>
</body>

</html>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
<script>
    function convertToImage() {
        // Get the div element
        var divToConvert = document.getElementById("myDiv");
        // Use html2canvas to convert the div to a canvas
        html2canvas(divToConvert).then(function(canvas) {
            // Convert the canvas to a data URL
            var imgData = canvas.toDataURL("image/png", 1.0);
            // Create a new image element
            var img = new Image();
            img.src = imgData;
            // Append the image to the body or display it as needed
            document.body.appendChild(img);
            document.body.appendChild(img).download = "a.png";
        });
        document.getElementById('myDiv').style.display = 'none';
        document.getElementById('download-btn').style.display = 'none';
        document.getElementById('download-message').style.display = 'block';
    }
    $("#download").on("click", function() {
        html2canvas(document.querySelector("#myDiv"), {
            scale: 2,
            logging: true,
            quality: 1,
        }).then(canvas => {
            canvas.toBlob(function(blob) {
                window.saveAs(blob, 'my_image.jpg');
            });
        });
    });
</script>
<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I') || (e.ctrlKey && e.key === 'u') || e
            .keyCode === 44 || e.key === 'PrintScreen') {
            e.preventDefault();
            window.close();
        }
    });
    // Check if the developer tools are open on page load
    if (
        typeof console._commandLineAPI !== 'undefined' ||
        typeof window.top._phantom !== 'undefined'
    ) {
        window.close();
    }
    // Listen for keyboard shortcuts to open the developer tools
    document.addEventListener('keydown', function(e) {
        if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
            window.location.href = document.referrer || '/';
        }
    });
</script>
