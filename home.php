<!DOCTYPE html>
<html>

<head>
    <title>INTENSIVÃO ENEM</title>

    <meta charset="utf-8">

    <link type="text/css" rel="stylesheet" href="css/style.min.css">
    <link rel="shortcut icon" href="imgs/favicon.png">

</head>

<body>
    <div id="myModal" class="modal">
        <div class="modal-content">
        <img src="imgs/loading.gif" />
            <p>Aguarde...</p>
        </div>
    </div>

    <div class="center_div">
        <img src="imgs/logo.png" />
        <p>Dos dias 03 à 15 de Agosto no Colégio Ferreira Lima em São Geraldo do Araguaia - PA</p>
        <form method="POST" action="classes/Register.php">
            <input type="text" id="idNome" name="nome" class="input_text" placeholder="Digite seu nome completo aqui" required>
            <input type="email" id="idEmail" name="email" class="input_text" placeholder="Coloque aqui seu melhor email!" required>
            <input type="text" id="idCurso" name="curso" class="input_text" placeholder="Qual é o curso dos seus sonhos?" required>
            <input type="text" id="idTelefone" name="telefone" maxlength="14" class="input_text" onkeypress="mask_phone(this)" placeholder="O número do seu Whatsapp" required>

            <button id="myBtn">VAMOS LÁ!</button>
        </form>

    </div>   

    <script type="text/javascript">
        function mask_phone(objeto) {
            if (objeto.value.length == 0)
                objeto.value = '(' + objeto.value;

            if (objeto.value.length == 3)
                objeto.value = objeto.value + ')';

            if (objeto.value.length == 9)
                objeto.value = objeto.value + '-';
        }
    </script>

    <script type="text/javascript" src="js\index.min.js"></script>

</body>

</html>