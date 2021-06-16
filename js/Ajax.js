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
				this.ajax = new window.ActiveXObject("Microsoft.XMLHTTP"));
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
}
