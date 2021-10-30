<?php
if (isset($_POST["submitform"])) {
    $html = file_get_contents($_POST['siteweb']);
    
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

            .imgpdf {
                width: 100vw;
            }

            .loading {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                z-index: 1000;
            }

            .loading>img {
                width: 40%;
                min-width: 400px;
            }
        </style>
    </head>

    <body>

        <div id="loadingshow" class="loading"><img src="./assets/loading.gif" /></div>
        <?php echo $html; ?>
        <script>
            var afterPrint = function() {
                document.location.href=document.location.href;
            };

            if (window.matchMedia) {
                var mediaQueryList = window.matchMedia('print');
                mediaQueryList.addListener(function(mql) {
                    if (!mql.matches){
                        afterPrint();
                    }
                });
            }

            window.onafterprint = afterPrint;

            function download() {
                var path = document.getElementsByClassName("slide_image")[0]
                var n = document.getElementsByClassName("slide_image").length
                if (path == undefined) {
                    console.log(document.getElementsByClassName("notranslate")[1].href);
                } else {
                    path = path.src;
                    document.body.innerHTML = '<div id="loadingshow" class="loading"><img src="./assets/loading.gif" /></div>';
                    for (var i = 1; i <= n; i++) {
                        var src = path.split("-1-")[0] + "-" + i + "-" + path.split("-1-")[1]
                        var tag = document.createElement('img');
                        tag.src = src;
                        document.body.appendChild(tag);
                    }
                    document.getElementById("loadingshow").style.display = "none";
                    var rsp = window.print()



                }
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
        <a class="howtouse" href="./help.php">How use it ?</a>
        <img id="idlogo" src="./assets/logo.jpg" />
        <form id="idform" onsubmit="loading()" method="post">
            <input type="text" placeholder="Paste here your URL" required name="siteweb" autocomplete="off" />
            <input type="submit" name="submitform" value="Download" />
        </form>
        <div id="loadingshow" class="loading">
            <img src="./assets/loading.gif" />
        </div>
        <script>
            function loading() {
                document.getElementById("idlogo").style.display = "none";
                document.getElementById("idform").style.display = "none";
                document.getElementById("loadingshow").style.display = "flex";
            }
        </script>
    </body>

    </html>
<?php
}
?>