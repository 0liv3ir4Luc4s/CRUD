let ajax = new Ajax();

let remover = document.querySelectorAll("[data-ref]");

let consultar = document.getElementById("btnConsultar");


remover.forEach(item => {
    item.onclick = ev => {
        ajax.requisitarRemoção("http://localhost/av_php/" + (ev.target.dataset.ref || ev.target.parentElement.dataset.ref), ev.target.parentElement.parentElement);
    };
})

if (consultar != null) {
    consultar.onclick = ev => {
        ev.preventDefault();
        ajax.requisitar("http://localhost/av_php/" + (ev.target.dataset.ref || ev.target.parentElement.dataset.ref) + "?id=" + document.getElementById("consulta_id").value, document.getElementById("consulta"));
    }
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
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
})()