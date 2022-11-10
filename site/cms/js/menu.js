function menu(obj){		
	
	if(navigator.appName.indexOf('Internet Explorer')>0){
		for (var j=0;j<document.getElementsByTagName("div").length; j++) {
			if(document.getElementsByTagName("div").item(j).name == 'submenu') {	
				if(document.getElementsByTagName("div").item(j).style.display != "none"){
					document.getElementsByTagName("div").item(j).style.display = "none";					
				}
			}			
		}	
	}else{
		var aberto = document.getElementsByName("submenu");
		for (var i=0; i<aberto.length; i++) {
			if(aberto[i].style.display != "none"){
				aberto[i].style.display = "none";
			}
		}

	}
			
	var el = document.getElementById(obj);		
		if(el.style.display != "block"){ 
			el.style.display = "block";
		} 
} 	