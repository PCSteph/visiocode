var isDragging = false;
var objectToDrag;
var obj;
var ecartX;
var ecartY;
var curX;
var curY;
var departX;
var departY;
var largVignette=180;
var hautVignette=180;
var listVignette=["messagerie","compte","forfait","classique","theme","visio","forum","statistique"];
var listBlock=["block1","block2","block3","block4","block5","block6","block7","block8","block9","block10","block11","block12"];
		
function positionne(p_id, p_posX, p_pos_Y){
	document.getElementById(p_id).style.left = p_posX;
	document.getElementById(p_id).style.top = p_pos_Y;
}

function getPositionCurseur(e){
	//ie
	if(document.all){
		curX = event.clientX;
		curY = event.clientY;
	}
	
	//netscape 4
	if(document.layers){
		curX = e.pageX;
		curY = e.pageY;
	}
	
	//mozilla
	if(document.getElementById){
		curX = e.clientX;
		curY = e.clientY;
	}
}

function beginDrag(p_obj,e){
	isDragging = true;
	for(var i in listBlock) {
		document.getElementById(listBlock[i]).style.border="#666 dotted 1px";
	}
	objectToDrag = p_obj;
	getPositionCurseur(e);
	ecartX = curX - parseInt(objectToDrag.style.left);
	ecartY = curY - parseInt(objectToDrag.style.top);
	departX=parseInt(objectToDrag.style.left);
	departY=parseInt(objectToDrag.style.top);
}
function findPos(el) {
	var x = y = 0;
	if(el.offsetParent) {
		x = el.offsetLeft;
		y = el.offsetTop;
		while(el = el.offsetParent) {
			x += el.offsetLeft;
			y += el.offsetTop;
		}
	}
	return {'x':x, 'y':y};
}
function drag(e){
	var newPosX;
	var newPosY;
	getPositionCurseur(e);
	if(document.getElementById){
		var ecart_scrollX = window.pageXOffset;
		var ecart_scrollY = window.pageYOffset;
	}
	if(document.all){
		var ecart_scrollX = document.documentElement.scrollLeft;
		var ecart_scrollY = document.documentElement.scrollTop;
	}
	document.getElementById('suivi_curseur').style.left=(curX+20+ecart_scrollX)+'px';
	document.getElementById('suivi_curseur').style.top=(curY+20+ecart_scrollY)+'px';
	if(isDragging == true){
		newPosX = curX - ecartX;
		newPosY = curY - ecartY;
		objectToDrag.style.left = newPosX + 'px';
		objectToDrag.style.top = newPosY + 'px';
		var pos=findPos(document.getElementById('content_accueil'));
		var posX=curX-pos.x + ecart_scrollX;
		var posY=curY-pos.y + ecart_scrollY;
		for(var i in listBlock) {
			if ((posX>valeurleft(listBlock[i]))&&(posX<valeurleft(listBlock[i])+largVignette)&&(posY>valeurtop(listBlock[i]))&&(posY<(valeurtop(listBlock[i])+hautVignette))) {deplace(true,testPresence(listBlock[i]),departX,departY,(valeurleft(listBlock[i])+1),(valeurtop(listBlock[i])));}
		}
	}
}
function testPresence(block)
{
	var testX=parseInt(document.getElementById(block).style.left)+1;
	var testY=parseInt(document.getElementById(block).style.top)+1;
	var retour=false;
	for (var i in listVignette) {
		if ((valeurleft(listVignette[i])==testX)&&(valeurtop(listVignette[i])==testY)) {retour=listVignette[i];}
	}
	return retour;
}
function valeurleft(el) {
	return parseInt(document.getElementById(el).style.left);
}
function valeurtop(el) {
	return parseInt(document.getElementById(el).style.top);
}
function endDrag(){
	isDragging = false;
	var pos=findPos(document.getElementById('content_accueil'));
	var annul=true;
	if(document.getElementById){
		var posX=curX-pos.x + window.pageXOffset;
		var posY=curY-pos.y + window.pageYOffset;
	}
	if(document.all){
		var posX=curX-pos.x + document.documentElement.scrollLeft;
		var posY=curY-pos.y + document.documentElement.scrollTop;
	}
	for (var i in listBlock) {
		if((posX>valeurleft(listBlock[i]))&&(posX<valeurleft(listBlock[i])+largVignette)&&(posY>valeurtop(listBlock[i]))&&(posY<(valeurtop(listBlock[i])+hautVignette))) {deplace(true,objectToDrag.id,(valeurleft(listBlock[i])+1),(valeurtop(listBlock[i])+1));annul=false;}
	}
	if(annul==true) {deplace(false,objectToDrag.id,departX,departY);}
	for (var i in listBlock) {
		document.getElementById(listBlock[i]).style.border="0px";
	}
}
function deplace(sql,el,destX,destY,depX,depY)
{
	if(el)
	{
		var origX=parseInt(document.getElementById(el).style.left);
		var origY=parseInt(document.getElementById(el).style.top);
		var encore=false;
		var pasX=20;
		var pasY=20;
		if (origX!=destX)
		{
			if(Math.abs(destX-origX)<pasX) pasX=Math.abs(destX-origX);
			var diffX=(destX-origX)/Math.abs(destX-origX);
			document.getElementById(el).style.left=(origX+(diffX*pasX))+"px";
			encore=true;
		}
		if (origY!=destY)
		{
			if(Math.abs(destY-origY)<pasY) pasY=Math.abs(destY-origY);
			var diffY=(destY-origY)/Math.abs(destY-origY);
			document.getElementById(el).style.top=(origY+(diffY*pasY))+"px";
			encore=true;
		}
		if (depX) departX=depX;
		if (depY) departY=depY+1;
		if (encore==true) {window.setTimeout("deplace("+sql+",'"+el+"','"+destX+"','"+destY+"');",10);}
		else
		{
			if(sql) {
				
				var xhr=null;
		
				if (window.XMLHttpRequest) {
					xhr = new XMLHttpRequest();
				}
				else if (window.ActiveXObject)
				{
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
				//on définit l'appel de la fonction au retour serveur
				//xhr.onreadystatechange = function() { if(xhr.readyState == 4 && xhr.status == 200){retourchg_contenu(xhr,"forum");} };
			
				//on appelle le fichier reponse.txt
				xhr.open("POST", "accueil_save_block.php", true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				var chaine;
				for (var i in listBlock) {
					if(i==0) chaine=listBlock[i]+"="+testPresence(listBlock[i]); else chaine+="&"+listBlock[i]+"="+testPresence(listBlock[i]);
				}
				xhr.send(chaine);
			}
		}
	}
}
function reinitialisation_accueil() {

var xhr=null;
	
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	//on définit l'appel de la fonction au retour serveur
	xhr.onreadystatechange = function() { if(xhr.readyState == 4 && xhr.status == 200){retourreinitialisation_accueil(xhr);} };
	
	//on appelle le fichier reponse.txt
	xhr.open("POST", "accueil_save_block.php", true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	var chaine;
	for (var i in listBlock) {
		if(i==0) chaine=listBlock[i]+"="+listVignette[i]; else chaine+="&"+listBlock[i]+"="+listVignette[i];
	}
	xhr.send(chaine);
}
function retourreinitialisation_accueil(xhr) {
	for (var i in listVignette) {
		document.getElementById(listVignette[i]).style.visibility="visible";
		positionne(listVignette[i],valeurleft('block1')+"px",valeurtop('block1')+"px");
		deplace(false,listVignette[i],valeurleft('block'+(parseInt(i)+parseInt(1)))+1,valeurtop('block'+(parseInt(i)+parseInt(1)))+1);
	}
}
