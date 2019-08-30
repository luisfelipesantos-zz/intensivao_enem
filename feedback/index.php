<!DOCTYPE html>
<html>

<head>
    <title>INTENSIVÃO ENEM</title>

    <meta charset="utf-8">

    <link type="text/css" rel="stylesheet" href="../css/feedback.css">
    <link rel="shortcut icon" href="imgs/favicon.png">

</head>

<body>
    <div id="myModal" class="modal">
        <div class="modal-content">
        <img src="../imgs/loading.gif" />
            <p>Aguarde...</p>
        </div>
    </div>

    <div class="center_div">
        <img src="../imgs/logo.png" />
        <h1>FEEDBACK</h1>
        <p>Dê o seu feedback sobre o INTENSIVÃO!<br/>Conta pra gente a sua experiência durante o evento. <br/>Se deixamos à desejar em algum aspecto, por favor, nos conte! Sua opinião é muito importante!</p>
        <form method="POST" action="feed.php">
            <textarea id="idFeed" name="feed" class="input_text" required></textarea>            
            <button id="but">Enviar</button>
        </form>

    </div>   
    <script type="text/javascript">
        
        var btn = document.getElementById("but");
        var feed = document.getElementById("idFeed");
        var modal = document.getElementById("myModal");

        btn.onclick = function () {
            console.log(feed.value);
            if (feed.value !== "") {
                modal.style.display = "block";
            } else {
                console.log("Empty or undefined attribute");
            }
        }
    </script>
</body>

</html>