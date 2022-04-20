<!DOCTYPE html>

<head>
    <title>Account Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.typekit.net/oov2wcw.css">

    <style>
        body {
            background-color: #fafafa;
            font-family: Century-Gothic;
        }
        
        div.content {
            display: inline-flex;
            height: 200px;
            width: 750px;
            background-color: beige;
            background-color: #fafafa;
            border-radius: 8px;
            border: 1px solid #dfe3e6;
            box-shadow: 10px 10px 5px grey;
            text-align: center;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <center>
        <div class="content" id = "con">
            <h1>
               Check Your Email for Verification!
            </h1>
        </div>
    </center>

    <script>

        document.addEventListener('readystatechange', event => { 

        // When window loaded ( external resources are loaded too- `css`,`src`, etc...) 
        if (event.target.readyState === "complete") {
            setTimeout(changeContent, 3000);
        }
        });

        function changeContent() {
            var container = document.getElementById('con');
            container.innerHTML = "Your email has been verified! Redirecting to login...";
            setTimeout(redirectPage, 18000);
        }

        function redirectPage() {
            window.location.href = "log_sign.html";
        }


    </script>
</body>

</html>