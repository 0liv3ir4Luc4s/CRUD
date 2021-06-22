let ajax = new Ajax();

let remover = document.querySelectorAll("[data-ref]");

remover.forEach(item => {
    item.onclick = ev => {
        ajax.requisitarRemoção("http://localhost/av_php/" + ev.target.dataset.ref, ev.target.parentElement.parentElement);
    };
})

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

