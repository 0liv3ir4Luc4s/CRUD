let ajax = new Ajax();

let remover = document.querySelectorAll("[data-ref]");

remover.forEach(item => {
    item.onclick = ev => {
        ajax.requisitarRemoção("http://localhost/av_php/" + ev.target.dataset.ref, ev.target.parentElement.parentElement);
    };
})

