// JavaScript Document
function removeElement(nId, cAction){
	vent = confirm('Confirme para eliminar el registro')
	if(vent){
		document.getElementById('hidId').value = nId;
		document.getElementById('frmPrincipal').action = cAction;
		document.getElementById('frmPrincipal').submit();	
	}	
}

function editElement(nId, cAction){
	document.getElementById('hidId').value = nId;
	document.getElementById('frmPrincipal').action = cAction;
	document.getElementById('frmPrincipal').submit();
}

function removeElementImg(nId, cAction){
	document.getElementById('hidIdImg').value = nId;
	document.getElementById('frmPrincipal').action = cAction;
	document.getElementById('frmPrincipal').submit();
}

function removeElementAdj(nId, cAction){
	document.getElementById('hidIdAdj').value = nId;
	document.getElementById('frmPrincipal').action = cAction;
	document.getElementById('frmPrincipal').submit();
}

function updateImgs(cAction){
	document.getElementById('frmPrincipal').action = cAction;
	document.getElementById('frmPrincipal').submit();
}

function linkActionServicios(nId, cAction){
	if(document.getElementById("Serviciosocio_txtSearchTitulo"))
		document.getElementById("Serviciosocio_txtSearchTitulo").value = '';
	
	document.getElementById('hidId').value = nId;
	document.getElementById('frmPrincipal').action = cAction;
	document.getElementById('frmPrincipal').submit();
}