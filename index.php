<?php
if (isset($_POST["submitform"])) {
    $html = file_get_contents($_POST['siteweb']);
    echo $html;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Download</title>
        <style>
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            img {
                width: 100vw;
                height: 100vh;
            }
        </style>
    </head>

    <body>
        <script>
            function download() {
                var path = document.getElementsByClassName("slide_image")[0]
                if (path == undefined) {
                    console.log(document.getElementsByClassName("notranslate")[1].href);
                }
                path = path.src;
                document.body.innerHTML = "";
                for (var i = 1; i < 55; i++) {
                    var src = path.split("-1-")[0] + "-" + i + "-" + path.split("-1-")[1]
                    var tag = document.createElement('img');
                    tag.src = src;
                    document.body.appendChild(tag);
                }
                window.print();
            }

            download();
        </script>
    </body>

    </html>
<?php
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SlideShare</title>
        <link rel="icon" href="./assets/favicon.ico" />
        <link rel="stylesheet" href="./style.css" />
    </head>

    <body>
        <img src="./assets/logo.jpg" />
        <form method="post">
            <input type="text" placeholder="Paste here your URL" required name="siteweb" autocomplete="off" />
            <input type="submit"  name="submitform" value="Download" />
        </form>
    </body>

    </html>
<?php
}
?>