function chg_contenu(cible,dest)
{
    var xhr=null;

    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //on définit l'appel de la fonction au retour serveur
    xhr.onreadystatechange = function() { if(xhr.readyState == 4 && xhr.status == 200){retourchg_contenu(xhr,dest);} };

    //on appelle le fichier reponse.txt
    xhr.open("GET", cible, true);
    xhr.send(null);
}

function retourchg_contenu(xhr,dest)
{
        var doc= xhr.responseText;
        document.getElementById(dest).innerHTML=doc;
	    document.getElementById('suivi_curseur').style.display="none";
}
function retour_inscription(xhr)
{
   var doc= xhr.responseText;
   if (doc!="0")
   {
	   document.getElementById('principal').innerHTML=doc;
   }
   else
   {
	   document.getElementById('btn_valid').innerHTML='<input type="submit" value="Valider" />';
   }
}
function inscription()
{
	document.getElementById('btn_valid').innerHTML='<img src="../images/ajax-loader_black.gif" border=0>';
	veriflogin();
    verifpassword();
    verifchampsvide('nom');
    verifchampsvide('prenom');
    verifchampsvide('adresse1');
    verifchampsvide('langue');
    verifchampsvide_ville();
    verifemail();
    verifdate('date_naissance');
	valid_inscription();
}

function valid_inscription()
{
     var xhr=null;

     if (window.XMLHttpRequest) {
         xhr = new XMLHttpRequest();
     }
     else if (window.ActiveXObject)
     {
         xhr = new ActiveXObject("Microsoft.XMLHTTP");
     }
     //on définit l'appel de la fonction au retour serveur
     xhr.onreadystatechange = function() { if(xhr.readyState == 4 && xhr.status == 200){retour_inscription(xhr);} };

    //on appelle le fichier reponse.txt
     xhr.open("POST", "./inscription.php", true);
     xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
     xhr.send("login="+document.getElementById("login").value+"&password="+document.getElementById("password").value+"&pass_conf="+document.getElementById("pass_conf").value+"&email="+document.getElementById("email").value+"&id_ville="+document.getElementById("id_ville").value+"&adresse1="+document.getElementById("adresse1").value+"&adresse2="+document.getElementById("adresse2").value+"&tel_fixe="+document.getElementById("tel_fixe").value+"&tel_port="+document.getElementById("tel_port").value+"&date_naissance="+document.getElementById("date_naissance").value+"&id_langue="+document.getElementById("langue").value+"&nom="+document.getElementById("nom").value+"&prenom="+document.getElementById("prenom").value+"&permisB="+document.getElementById("permisB").checked+"&permisAAC="+document.getElementById("permisAAC").checked+"&permisA="+document.getElementById("permisA").checked+"&permisC="+document.getElementById("permisC").checked+"&permisEC="+document.getElementById("permisEC").checked+"&permisD="+document.getElementById("permisD").checked+"&permisEB="+document.getElementById("permisEB").checked+"&annul="+document.getElementById("annul").checked+"&code="+document.getElementById("code").checked+"&nb_code="+document.getElementById("nb_code").value+"&auto="+document.getElementById("auto").checked+"&libre="+document.getElementById("libre").checked+"&non_inscrit="+document.getElementById("non_inscrit").checked+"&newsletter="+document.getElementById("newsletter").checked+"&partenaire="+document.getElementById("partenaire").checked);
}

function verifemail()
{
    var xhr=null;

    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //on définit l'appel de la fonction au retour serveur
    xhr.onreadystatechange = function() { if(xhr.readyState == 4 && xhr.status == 200){retourVerif(xhr,'email');} };
    //on appelle le fichier reponse.txt
    xhr.open("POST", "./verifemail.php", true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("email="+document.getElementById('email').value);
}
function verifchampsvide(champs)
{
    document.getElementById(champs).style.borderStyle='solid';
	document.getElementById(champs).style.borderWidth='1px';
	document.getElementById(champs).style.paddingBottom='2px';
	document.getElementById(champs).style.paddingLeft='1px';
	document.getElementById(champs).style.paddingRight='1px';
	document.getElementById(champs).style.paddingTop='2px';
	if (document.getElementById(champs).value=='')
	{
		document.getElementById(champs).style.borderColor='red';
        document.getElementById('v'+champs).innerHTML='Non renseigné';
	}
	else
	{
		document.getElementById(champs).style.borderColor='#A5ACB2';
        document.getElementById('v'+champs).innerHTML='';
	}
}
function verifchampsvide_ville()
{
    document.getElementById('ville_visio').style.borderStyle='solid';
	document.getElementById('ville_visio').style.borderWidth='1px';
	document.getElementById('ville_visio').style.paddingBottom='2px';
	document.getElementById('ville_visio').style.paddingLeft='1px';
	document.getElementById('ville_visio').style.paddingRight='1px';
	document.getElementById('ville_visio').style.paddingTop='2px';
	if (document.getElementById('id_ville').value=='')
	{
		document.getElementById('ville_visio').style.borderColor='red';
        document.getElementById('v'+'ville').innerHTML='Non renseigné';
	}
	else
	{
		document.getElementById('ville_visio').style.borderColor='#A5ACB2';
        document.getElementById('v'+'ville').innerHTML='';
	}
}
function veriflogin()
{
    var xhr=null;

    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //on définit l'appel de la fonction au retour serveur
    xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200){retourVerif(xhr,'login');}
	};
    //on appelle le fichier reponse.txt
    xhr.open("POST", "../inscription/veriflogin.php", true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("login="+document.getElementById('login').value);
}
function verifdate(champs)
{
    var xhr=null;

    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //on définit l'appel de la fonction au retour serveur
    xhr.onreadystatechange = function() { if(xhr.readyState == 4 && xhr.status == 200){retourVerif(xhr,champs);} };
    //on appelle le fichier reponse.txt
    xhr.open("POST", "./verifdate.php", true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(champs+"="+document.getElementById(champs).value);
}
function verifpassword()
{
	document.getElementById('password').style.borderStyle='solid';
	document.getElementById('password').style.borderWidth='1px';
	document.getElementById('password').style.paddingBottom='2px';
	document.getElementById('password').style.paddingLeft='1px';
	document.getElementById('password').style.paddingRight='1px';
	document.getElementById('password').style.paddingTop='2px';
	document.getElementById('pass_conf').style.borderStyle='solid';
	document.getElementById('pass_conf').style.borderWidth='1px';
	document.getElementById('pass_conf').style.paddingBottom='2px';
	document.getElementById('pass_conf').style.paddingLeft='1px';
	document.getElementById('pass_conf').style.paddingRight='1px';
	document.getElementById('pass_conf').style.paddingTop='2px';
	if (document.getElementById('password').value!='')
	{
		if (document.getElementById('password').value!=document.getElementById('pass_conf').value)
		{
			document.getElementById('vpassword').innerHTML="Problème de mot de passe";
			document.getElementById('password').style.borderColor='red';
			document.getElementById('pass_conf').style.borderColor='red';
		}
		else
		{
			document.getElementById('vpassword').innerHTML="";
			document.getElementById('password').style.borderColor='#A5ACB2';
			document.getElementById('pass_conf').style.borderColor='#A5ACB2';
		}
	}
	else
	{
		document.getElementById('vpassword').innerHTML="Non renseigné";
		document.getElementById('password').style.borderColor='red';
		document.getElementById('pass_conf').style.borderColor='red';
	}
}

function retourVerif(xhr,champs)
{
	var docXML= xhr.responseXML;
	var acc=docXML.getElementsByTagName("acc");
	var donnee=docXML.getElementsByTagName("donnee");
	document.getElementById(champs).style.borderStyle='solid';
	document.getElementById(champs).style.borderWidth='1px';
	document.getElementById(champs).style.paddingBottom='2px';
	document.getElementById(champs).style.paddingLeft='1px';
	document.getElementById(champs).style.paddingRight='1px';
	document.getElementById(champs).style.paddingTop='2px';
	if (acc.item(0).firstChild.data=='0')
	{
		document.getElementById(champs).style.borderColor='red';
        document.getElementById('v'+champs).innerHTML=donnee.item(0).firstChild.data;
	}
	else
	{
		document.getElementById(champs).style.borderColor='#A5ACB2';
		document.getElementById('v'+champs).innerHTML='';
	}
}
function listVille(ville)
{
    var xhr=null;

    if (window.XMLHttpRequest) {
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
        retourlistVille(xhr,ville);
        //retourchg_contenu(xhr,'vlogin');
      }
    }
    //on appelle le fichier reponse.txt
    xhr.open("POST", "./listVille.php", true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("ville="+ville);
}
function retourlistVille(xhr,ville_org)
{
  if (ville_org==document.getElementById('ville_visio').value)
  {
	  var ville = document.getElementById('list_ville');
	  var cp = document.getElementById('cp');
	  var docXML= xhr.responseXML;
	  var id_villeXML = docXML.getElementsByTagName("id_ville");
	  var villeXML = docXML.getElementsByTagName("ville");
	  var cpXML = docXML.getElementsByTagName("cp");
		//on fait juste une boucle sur chaque element "donnee" trouvé
  	  var taille=0;
	  ville.innerHTML='<ul>';
	  for (i=0;i<villeXML.length;i++)
	  {
		  ville.innerHTML+='<li onclick="valid_ville(\''+id_villeXML.item(i).firstChild.data+'\',\''+villeXML.item(i).firstChild.data+'\');">'+villeXML.item(i).firstChild.data+' - '+cpXML.item(i).firstChild.data+'</li>';
		  if (taille<120) taille+=20;
		  //id_ville.item(i).firstChild.data);
	  }
	  ville.innerHTML+='</ul>';
	  ville.style.height=taille+'px';
	  if (villeXML.length>0) {
	  	ville.style.visibility='visible';
	  }
	  else
	  {
	  	ville.style.visibility='hidden';
	  }
  }
}

function valid_ville(id_ville,ville)
{
	document.getElementById('id_ville').value=id_ville;
	document.getElementById('ville_visio').value=ville;
	verifchampsvide_ville();
}
function deconnection()
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
       retourDeconnect(xhr);
     }
   }
   //on appelle le fichier reponse.txt
   xhr.open("GET", "./deconnect.php", true);
   xhr.send(null);
}
function retourDeconnect(xhr)
{
//      var doc= xhr.responseText;
//      document.getElementById('principal').innerHTML=doc;
//      chg_contenu('./identification.php','identification');
//      chg_contenu('./menu_client.php','menu_client');
//      chg_contenu('./menu_moniteur.php','menu_moniteur');
//      chg_contenu('./menu_admin.php','menu_admin');

var myloc = window.location.href;
var locarray = myloc.split("/");
window.location.href=locarray[0]+'//'+locarray[2];
}
function creer_serie(nserie,nquestion)
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
       retourchg_contenu(xhr,'principal');
     }
   }
   //on appelle le fichier reponse.txt
   xhr.open("POST", "./GestionBaseLecon/formsaisiequestion.php", true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
   xhr.send("nserie="+nserie+"&nquestion="+nquestion);
}
function ajout_categorie(new_categorie,list)
{
   var xhr=null;
   document.getElementById('new_categorie').value="";
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
       retourajout_categorie(xhr,list);
     }
   }
   //on appelle le fichier reponse.txt
   xhr.open("POST", "./GestionBaseLecon/ajout_categorie.php", true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
   xhr.send("new_categorie="+new_categorie);
}
function retourajout_categorie(xhr,list)
{
  list.categorie.options.length=0;
  var o=new Option("Sélectionner","0");
  list.categorie.options[list.categorie.options.length]=o;
  var docXML= xhr.responseXML;
  var id_categorie = docXML.getElementsByTagName("id_categorie");
  var nom = docXML.getElementsByTagName("nom");
//on fait juste une boucle sur chaque element "donnee" trouvé
  for (i=0;i<id_categorie.length;i++)
  {
    //alert (id_ville.item(i).firstChild.data);
    var o=new Option(nom.item(i).firstChild.data,id_categorie.item(i).firstChild.data);
    list.categorie.options[list.categorie.options.length]=o;
  }
}
function modif_serie(nserie)
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
       retourchg_contenu(xhr,'principal');
     }
   }
   //on appelle le fichier reponse.txt
   xhr.open("POST", "./GestionBaseLecon/formmodifserie.php", true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
   xhr.send("nserie="+nserie);
}
function modif_question(nserie,nquestion)
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
       retourchg_contenu(xhr,'principal');
     }
   }
   //on appelle le fichier reponse.txt
   xhr.open("POST", "./GestionBaseLecon/formmodifquestion.php", true);
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
   xhr.send("nserie="+nserie+"&nquestion="+nquestion);
}
function chargement(pageactuel)
{
     chg_contenu('./identification.php','identification');
     chg_contenu('./menu_client.php','menu_client');
     chg_contenu('./menu_moniteur.php','menu_moniteur');
     chg_contenu('./menu_admin.php','menu_admin');
     //alert (pageactuel);
     if (pageactuel!='notload') { chg_contenu('./'+pageactuel,'principal'); }
}
function suppr_question(nserie,nquestion)
{
   reponse=confirm("Voulez-vous supprimer la question "+nquestion+" de la série "+nserie+" ?");
   if (reponse)
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
           retoursuppr_question(xhr,nserie);
         }
       }
       //on appelle le fichier reponse.txt
       xhr.open("POST", "./GestionBaseLecon/suppr_question.php", true);
       xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
       xhr.send("nserie="+nserie+"&nquestion="+nquestion);
   }
}
function retoursuppr_question(xhr,nserie,nquestion)
{
   modif_serie(nserie);
}
function ajax_load(cible)
{
  document.getElementById(cible).innerHTML='<img src="images/ajax-loader_black.gif" border=0>';
}
function chg_pageactuel (page_actuel) {
	   document.getElementById('suivi_curseur').style.display="block";
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
           chg_contenu(page_actuel,'principal');
         }
       }
       //on appelle le fichier reponse.txt
       xhr.open("POST", "chg_pageactuel.php", true);
       xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
       xhr.send("page_actuel="+page_actuel);
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
      opacity += 20;
      window.setTimeout("fadeIn('"+objId+"',"+opacity+")", 1);
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
    fadeIn(o.id,0);
  };
  img.src = img_src;
}
