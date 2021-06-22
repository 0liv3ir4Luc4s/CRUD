class Ajax {
	constructor()
	{
		this.ajax = null;
		try {
			if (window.XMLHttpRequest) {
				this.ajax = new window.XMLHttpRequest();
			} else if (window.ActiveXObject("Msxml2.XMLHTTP")) {
				this.ajax = new window.ActiveXObject("Msxml2.XMLHTTP");
			} else if (window.ActiveXObject("Microsoft.XMLHTTP")) {
				this.ajax = new window.ActiveXObject("Microsoft.XMLHTTP");
			} else {
				throw "Browser não compatível com Ajax";
			}
		} catch (ex) {
			console.log(ex.getMessage());
		}
	}

	getAjax()
	{
		return this.ajax;
	}

	requisitar(arquivo, elemento, form) {
		if (this.ajax) {
			this.ajax.onreadystatechange = function() {
				if (this.readyState == 4) {
					if (this.status == 200 || this.status == 304) {
						elemento.innerHTML = this.responseText;
						document.getElementById("tabela").setAttribute("class", '');

						let valuesConsulta = document.querySelectorAll("td[id]");
						let inputs = document.querySelectorAll("input[name],select");				
						for (let i = 0 ; i < valuesConsulta.length; i++) {
								inputs[i].value = valuesConsulta[i].innerHTML;
						}
					} else {
						alertify.error("Erro no servidor");
					}
				}
			};
			this.ajax.open("GET", arquivo);
			this.ajax.send(null);
		}
	}

	requisitarRemoção(arquivo, linha) {
		if (this.ajax) {
			this.ajax.onreadystatechange = function() {
				if (this.readyState == 4) {
					if (this.status == 200 || this.status == 304) {
						eval(this.responseText);
						if (linha.parentElement.parentElement.getAttribute("class") == "card"){
							linha.parentElement.parentElement.parentElement.remove();
						} else {
							linha.remove();
						}
					} else {
						alertify.error("Erro no servidor");
					}
				}
			};
			this.ajax.open("GET", arquivo);
			this.ajax.send(null);
		}
	}
}
