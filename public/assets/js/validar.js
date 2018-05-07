function validar() {
	var nueva, repet;
	nueva = document.getElementsByTagName("newcon").value;
	repet = document.getElementsByTagName("repcon").value;

	if (nueva==="") {
		alert("Los datos no coinciden");
		return false;
	}
}