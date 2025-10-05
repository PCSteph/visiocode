function visualiser_question(nserie,nquestion)
{
   var xhr=null;

   if (window.XMLHttpRequest)
   {
     xhr = new XMLHttpRequest();
   }
   else if (window.ActiveXObject)
   {
     xhr = new ActiveXObject("Microsoft.XMLHTTP");
   }
   //on définit l'appel de la fonction au retour serveur
   xhr.onreadystatechange = function()
   {
     if(xhr.readyState == 4 && xhr.status == 200)
     {
       retourvisu_question(xhr);
       //retourchg_contenu(xhr,'corps');
     }
   }
   //on appelle le fichier reponse.txt
   xhr.open("POST", "visu_question.php", true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
   xhr.send("nserie="+nserie+"&nquestion="+nquestion);
   document.getElementById('explication').style.display="block";
   setOpacity(document.getElementById('explication'),0);
   document.getElementById('question_suivante').style.visibility='hidden';
   document.getElementById('feux_rouge').innerHTML='';
   document.getElementById('feux_orange').innerHTML='';
   document.getElementById('feux_vert').innerHTML='';
   document.getElementById('A').innerHTML='';
   document.getElementById('B').innerHTML='';
   document.getElementById('C').innerHTML='';
   document.getElementById('D').innerHTML='';
   document.getElementById('chargement').style.visibility='hidden';
}
function retourvisu_question(xhr)
{
  var docXML= xhr.responseXML;
  var photo = docXML.getElementsByTagName("photo");
  var lecture_audio = docXML.getElementsByTagName("lecture_audio");
  var question1 = docXML.getElementsByTagName("question1");
  var reponseA = docXML.getElementsByTagName("reponseA");
  var reponseB = docXML.getElementsByTagName("reponseB");
  var question2 = docXML.getElementsByTagName("question2");
  var reponseC = docXML.getElementsByTagName("reponseC");
  var reponseD = docXML.getElementsByTagName("reponseD");
  var question_suivante = docXML.getElementsByTagName("question_suivante");
  var num_question = docXML.getElementsByTagName("num_question");
  document.getElementById('photo').innerHTML=photo.item(0).firstChild.data;
  if (lecture_audio.item(0)) document.getElementById('lecture_audio').innerHTML=lecture_audio.item(0).firstChild.data;
  var explication_standard = docXML.getElementsByTagName("explication_standard");
  document.getElementById('explication_contenu').innerHTML=explication_standard.item(0).firstChild.data;
  document.getElementById('question_suivante').innerHTML=question_suivante.item(0).firstChild.data;
  document.getElementById('num_question').innerHTML=num_question.item(0).firstChild.data;
  if (question2.item(0))
  {
    chaine='<table width=560 border=0><tr><td height=40></td></tr><tr><td width="10"></td><td align="left" colspan="5">'+question1.item(0).firstChild.data+'</td></tr>';
    chaine+='<tr><td></td><td width="40"></td><td align="left" width="255" height=30><div id="reponseA">'+reponseA.item(0).firstChild.data+'</div></td><td align="left" width="255"><div id="reponseB">'+reponseB.item(0).firstChild.data+'</div></td></tr>';
    chaine+='<tr><td height=20></td></tr><tr><td></td><td align="left" colspan="5">'+question2.item(0).firstChild.data+'</td></tr>';
    chaine+='<tr><td></td><td></td><td align="left" width="255" height=30><div id="reponseC">'+reponseC.item(0).firstChild.data+'</div></td><td align="left" width="255"><div id="reponseD">'+reponseD.item(0).firstChild.data+'</div></td></tr></table>';
    document.getElementById('question_reponse').innerHTML=chaine;
  }
  else
  {
    chaine='<table width="560" border=0><tr><td height=30>&nbsp;</td></tr>';
    chaine+='<tr><td width=50>&nbsp;</td><td align="left" colspan=5>'+question1.item(0).firstChild.data+'</td></tr>';
    chaine+='<tr><td>&nbsp;</td><td width=20>&nbsp;</td><td width=490 align="left" height=30><div id="reponseA">'+reponseA.item(0).firstChild.data+'</div></td></tr>';
    chaine+='<tr><td>&nbsp;</td><td>&nbsp;</td><td align="left" height=30><div id="reponseB">'+reponseB.item(0).firstChild.data+'</div></td></tr>';
    if (reponseC.item(0)) chaine+='<tr><td>&nbsp;</td><td>&nbsp;</td><td align="left" height=30><div id="reponseC">'+reponseC.item(0).firstChild.data+'</div></td></tr>';
    if (reponseD.item(0)) chaine+='<tr><td>&nbsp;</td><td>&nbsp;</td><td align="left" height=30><div id="reponseD">'+reponseD.item(0).firstChild.data+'</div></td></tr>';
    chaine+='</table>';
    document.getElementById('question_reponse').innerHTML=chaine;
  }
  document.getElementById('feux').style.visibility='visible';
  document.getElementById('boitier').style.visibility='visible';
  document.getElementById('chrono').style.visibility='visible';
  rebour(20);
}
function retourchg_contenu(xhr,dest)
{
  var doc= xhr.responseText;
  document.getElementById(dest).innerHTML=doc;
}
function rebour(tps)
{
  if ((tps>=0)&&(!document.getElementById('feux_rouge').innerHTML)&&(!document.getElementById('feux_vert').innerHTML)) { //Si le temps est différent de 0
    var heure = Math.floor(tps/3600); //Nombre d'heure écoulés
    if(heure >= 24)
    { //Si plus de 24 => 1 jour
      var jour = Math.floor(heure/24); //Calcul du nombre de jour
      var moins = 86400*jour; // Deffinition et attribution d'une valeur à `moins` qui est la variable soustractrice de la fonction
      var heure = heure-(24*jour); //On enléve le nombre d'heure concernée
    }
    else
    {
      var jour = 0; //Sinon, il n'y a pas de jour
      var moins = 0; // Et pas ed variable moins
    }
    moins = moins+3600*heure; // Recalcul
    var minutes = Math.floor((tps-moins)/60); // Calcul des minutes
    moins = moins + 60*minutes; // Recalcul de la variable moins
    var secondes = tps-moins; //Calcul des seconde
    minutes = ((minutes < 10) ? "0" : "") + minutes;//On rajoute un 0 si les minutes sont inférieures à 10
    secondes = ((secondes < 10) ? "0" : "") + secondes; //On rajoute un 0 si les secondes sont inférieures à 10
    document.getElementById('chrono_compteur').innerHTML = secondes; //On affiche le resultat dans le div concerné
    if (secondes==5) clignotement(11);
    var restant = tps-1; //On enléve une seconde
    setTimeout("rebour("+restant+")", 1000);//On rappelle la fonction toute les secondes
  }
  else
  {
    if ((!document.getElementById('feux_rouge').innerHTML)&&(!document.getElementById('feux_vert').innerHTML)) valid_reponse();
  }
}
function clignotement(tps)
{
  if ((tps>=0)&&(!document.getElementById('feux_rouge').innerHTML)&&(!document.getElementById('feux_vert').innerHTML)) { //Si le temps est différent de 0
    if (!document.getElementById('feux_orange').innerHTML) document.getElementById('feux_orange').innerHTML='<img src="../../images/feux_orange.gif" border=0>'; else document.getElementById('feux_orange').innerHTML='';
    var restant = tps-1; //On enléve une seconde
    setTimeout("clignotement("+restant+")", 500);//On rappelle la fonction toute les secondes
  }
  else
  {
    document.getElementById('feux_orange').innerHTML='';
  }  
}
function chg_reponse(lettre)
{
   if (document.getElementById(lettre).innerHTML==lettre) document.getElementById(lettre).innerHTML=''; else document.getElementById(lettre).innerHTML=lettre;
}
function clear_reponse()
{
  document.getElementById('A').innerHTML='';
  document.getElementById('B').innerHTML='';
  document.getElementById('C').innerHTML='';
  document.getElementById('D').innerHTML='';
}
function valid_reponse()
{
   if (document.getElementById('A').innerHTML=='A') chaine='choixA=1'; else chaine='choixA=0';
   if (document.getElementById('B').innerHTML=='B') chaine+='&choixB=1'; else chaine+='&choixB=0';
   if (document.getElementById('C').innerHTML=='C') chaine+='&choixC=1'; else chaine+='&choixC=0';
   if (document.getElementById('D').innerHTML=='D') chaine+='&choixD=1'; else chaine+='&choixD=0';
   var xhr=null;

   if (window.XMLHttpRequest)
   {
     xhr = new XMLHttpRequest();
   }
   else if (window.ActiveXObject)
   {
     xhr = new ActiveXObject("Microsoft.XMLHTTP");
   }
   //on définit l'appel de la fonction au retour serveur
   xhr.onreadystatechange = function()
   {
     if(xhr.readyState == 4 && xhr.status == 200)
     {
       retourvalid_reponse(xhr);
       //retourchg_contenu(xhr,'corps');
     }
   }
   //on appelle le fichier reponse.txt
   xhr.open("POST", "visu_reponse.php", true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
   xhr.send(chaine);
}
function retourvalid_reponse(xhr)
{
 if ((!document.getElementById('feux_rouge').innerHTML)&&(!document.getElementById('feux_vert').innerHTML))
 {
   fadeIn('explication',0);
   var docXML= xhr.responseXML;
   var acc = docXML.getElementsByTagName("acc");
   var reponseA_ok = docXML.getElementsByTagName("reponseA_ok");
   var reponseB_ok = docXML.getElementsByTagName("reponseB_ok");
   var reponseC_ok = docXML.getElementsByTagName("reponseC_ok");
   var reponseD_ok = docXML.getElementsByTagName("reponseD_ok");
   var photo = docXML.getElementsByTagName("photo");
   if (photo.item(0).firstChild.data!=0) document.getElementById('photo').innerHTML=photo.item(0).firstChild.data;
   if (acc.item(0).firstChild.data==1) document.getElementById('feux_vert').innerHTML='<img src="../../images/feux_vert.gif" border=0>'; else document.getElementById('feux_rouge').innerHTML='<img src="../../images/feux_rouge.gif" border=0>';
   if (reponseA_ok.item(0).firstChild.data==0) { document.getElementById('reponseA').style.textDecoration="line-through";document.getElementById('reponseA').style.color="red"; } else document.getElementById('reponseA').style.color="#00FF66";
   if (reponseB_ok.item(0).firstChild.data==0) { document.getElementById('reponseB').style.textDecoration="line-through";document.getElementById('reponseB').style.color="red"; } else document.getElementById('reponseB').style.color="#00FF66";
   if (document.getElementById('reponseC')) { if (reponseC_ok.item(0).firstChild.data==0) { document.getElementById('reponseC').style.textDecoration="line-through";document.getElementById('reponseC').style.color="red"; } else document.getElementById('reponseC').style.color="#00FF66"; }
   if (document.getElementById('reponseD')) { if (reponseD_ok.item(0).firstChild.data==0) { document.getElementById('reponseD').style.textDecoration="line-through";document.getElementById('reponseD').style.color="red"; } else document.getElementById('reponseD').style.color="#00FF66"; }
   document.getElementById('chrono').style.visibility='hidden';
   document.getElementById('question_suivante').style.visibility='visible';
   fadeIn('question_suivante',0);
 }
 else
 {

 }
}
function setOpacity(obj, opacity) {
  opacity = (opacity == 100)?99.999:opacity;

  // IE/Win
  obj.style.filter = "alpha(opacity:"+opacity+")";

  // Safari<1.2, Konqueror
  obj.style.KHTMLOpacity = opacity/100;

  // Older Mozilla and Firefox
  obj.style.MozOpacity = opacity/100;

  // Safari 1.2, newer Firefox and Mozilla, CSS3
  obj.style.opacity = opacity/100;
}

function fadeIn(objId,opacity) {
  if (document.getElementById) {
    obj = document.getElementById(objId);
    if (opacity <= 100) {
      setOpacity(obj, opacity);
      opacity += 5;
      window.setTimeout("fadeIn('"+objId+"',"+opacity+")", 10);
    }
  }
}

function preload(o, img_src, w, h) {
  var img = new Image ();
  img.onload = function () {
    o.onload = null;
    if (w) o.width  = w;
    if (h) o.height = h;
    o.src = img.src;
    setOpacity(o, 0);
    this.style.visibility = 'visible';
    fadeIn('photo_fade',0);
  };
  img.src = img_src;
}
function prechargimg() {
var doc=document;
if(doc.images){ if(!doc.precharg) doc.precharg=new Array();
var i,j=doc.precharg.length,x=prechargimg.arguments; for(i=0; i<x.length; i++)
if (x[i].indexOf("#")!=0){ doc.precharg[j]=new Image; doc.precharg[j++].src=x[i];}}
}


