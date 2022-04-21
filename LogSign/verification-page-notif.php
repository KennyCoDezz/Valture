<!DOCTYPE html>

<head>
    <title>Account Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.typekit.net/oov2wcw.css">

    <style>
        body {
            background-color: #f3f3f5;
            font-family: Century-Gothic;    
        }


        div.content {
            display: inline-flex;
            margin-top: 10%;
            height: 400px;
            width: 730px;
            background-color: beige;
            background-color: #fafafa;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
            flex-direction: column;
            text-align: center;
            align-items: center;
            justify-content: center;
            line-height: 10px;
           
        }

        div.content img {
            display: inline-flex;
            height: 200px;
            width: 200px;
            text-align:  center;
            align-items: center;
            justify-content: center;
         
        }
        
    </style>
</head>

<body>
    <center>
        <div class="content" id = "con">

            <img src="img/verify-img.png">

                    <p>
                    <b>You're One Step Away!</b>
                    </p>

                <!-- HEAD MESSAGE--> 
                    <h1>
                    <b>Verify Your Email</b>
                    </h1>
                <!-- END OF HEAD MESSAGE--> 

                    <p>
                    To complete the process, kindly check your e-mail for a validation request.
                    </p>
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