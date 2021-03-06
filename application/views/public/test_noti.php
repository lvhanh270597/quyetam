
<!DOCTYPE html>
<html>
    <head>
        <title>Using Push.js to Display Web Browser Notifications</title>        
    </head>
    <style>
        body {
            font-family: sans-serif;
            color: white;
            line-height: 1.5;
            text-align: center;
            padding: 2rem;
            background-color: #593f6e;
        }
        a {
            color: white;
        }
        h1 {
            max-width: 30rem;
            margin: 0 auto 3rem;
        }
        p {
            max-width: 30rem;
            margin: 0.5rem auto;
        }
        button {
            padding: 1rem;
            color: white;
            background-color: #1E88E5;
            outline: 0;
            border: 0;
            font-size: 1rem;
            text-transform: uppercase;
            cursor: pointer;
            opacity: 0.9;
            border-radius: 0.25rem;
            margin: 2rem 1rem 0;
            display: inline-block;
            font-weight: bold;
        }
        button:hover {
            opacity: 1;
        }
    </style>

    <body>
        <h1>Using Push.js to Display Web Browser Notifications</h1>
        <p>This is a demo showcasing the use of web notifications using the open-source <a href="https://github.com/Nickersoft/push.js" target="_blank">Push.js</a> library.</p>
        <button class="request-button">Request permissions</button>
        <button class="show-button">Show notification</button>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.js"></script>
    <script>
        var requestButton = document.querySelector(".request-button");
        var showButton = document.querySelector(".show-button");

        function onGranted() {
            requestButton.style.background = "green";
        }

        function onDenied() {
            requestButton.style.background = "red";
        }

        requestButton.onclick = function() {
            Push.Permission.request(onGranted, onDenied);
        }

        showButton.onclick = function() {
            Push.create("Hello from Sabe.io!", {
                body: "This is a web notification!",
                icon: "/icon.png",
                timeout: 5000,
                onClick: function() {
                    console.log(this);
                }
            });
        };
    </script>
</html>
	