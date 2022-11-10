function GetXMLHttp() {
    var xmlHttp;
    try {
        xmlHttp = new XMLHttpRequest();
    }
    catch(ee) {
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e) {
                xmlHttp = false;
            }
        }
    }
    return xmlHttp;
}

function menu(obj){	
	
		var aberto = document.getElementsByName("submenu");
		for (var i=0; i<aberto.length; i++) {
			if(aberto[i].style.display != "none"){
				aberto[i].style.display = "none";
			}
		}
			
		var el = document.getElementById(obj);		
		if(el.style.display != "block"){ 
			el.style.display = "block";
		} 
	} 	