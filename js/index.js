window.onload = function () {

    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var nome = document.getElementById("idNome");
    var email = document.getElementById("idEmail");
    var curso = document.getElementById("idCurso");
    var telefone = document.getElementById("idTelefone");

    btn.onclick = function () {
            console.log(nome.value);
            console.log(email.value);
            console.log(curso.value);
            console.log(telefone.value);
            if (nome.value !== "" && email.value !== "" && curso.value !== "" && telefone.value !== "") {
                modal.style.display = "block";
            } else {
                console.log("Empty or undefined attribute");
            }

    }

    window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      } 
}