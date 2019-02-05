function m_disable(str){

	if(str == "Deceased"){
		document.getElementById('moccu').disabled = true;
		document.getElementById('mincome').disabled = true;
		document.getElementById('mcno').disabled = true;
	}
	else{
		document.getElementById('moccu').disabled = false;
		document.getElementById('mincome').disabled = false;
		document.getElementById('mcno').disabled = false;
	}
}

function f_disable(str){

	if(str == "Deceased"){
		document.getElementById('foccu').disabled = true;
		document.getElementById('fincome').disabled = true;
		document.getElementById('fcno').disabled = true;
	}
	else{
		document.getElementById('foccu').disabled = false;
		document.getElementById('fincome').disabled = false;
		document.getElementById('fcno').disabled = false;
	}
}