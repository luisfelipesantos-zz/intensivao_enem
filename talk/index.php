<?php
    $palestrante = "PALESTRANTE";
    $tema = "TEMA";
?>
<!DOCTYPE html>
<html>

<head>
    <title>INTENSIVÃO ENEM</title>

    <meta charset="utf-8">

    <link type="text/css" rel="stylesheet" href="../css/talk.css">
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
        <h1>TALK</h1>
        <p>O próximo talk que nós teremos é sobre</p>
        <h3><?php echo $tema; ?></h3>
        <p>E quem vai bater esse papo com a gente é a </p>
        <h3><?php echo $palestrante; ?></h3>

        <p>Então, deixe aqui em baixo alguma dúvida ou curiosidade que você tem à respeito, belê!?</p>

        <form method="POST" action="talk.php">
            <textarea id="idFeed" name="descricao" class="input_text" required></textarea>   
            <?php echo "<input type='hidden' value='{$palestrante}' name='palestrante'>"; ?>        
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