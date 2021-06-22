let ajax = new Ajax();

let remover = document.querySelectorAll("[data-ref]");

let consultar = document.getElementById("btnConsultar");

remover.forEach(item => {
    item.onclick = ev => {
        ajax.requisitarRemoção("http://localhost/av_php/" + ev.target.dataset.ref, ev.target.parentElement.parentElement);
    };
})

consultar.onclick = ev => {
    ev.preventDefault();
    ajax.requisitar("http://localhost/av_php/" + ev.target.dataset.ref + "?id=" + document.getElementById("consulta_id").value, document.getElementById("consulta"));
}
/*document.getElementById("consulta").onchange = ev => {
    document.getElementById("matricula").value = document.getElementById("matricula_al").innerHTML;
						document.getElementById("id_curso").value = document.getElementById("id_curso").innerHTML;
						document.getElementById("id_turma").value = document.getElementById("id_turma").innerHTML;

}*/
var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
})

