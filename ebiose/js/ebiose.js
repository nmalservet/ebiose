function toggle(eltId)
{
var elt = document.getElementById(eltId);
elt.style.display = (elt.style.display == "block") ? "none" : "block";
var elt2 = document.getElementById(eltId+"_im");
elt2.style.display = (elt2.style.display == "inline") ? "none" : "inline";
var elt3 = document.getElementById(eltId+"_ip");
elt3.style.display = (elt3.style.display == "inline") ? "none" : "inline";
}

function toggleNoeud(eltId)
{
	var elt = document.getElementById(eltId+ "_f");
	elt.style.display = (elt.style.display == "block") ? "none" : "block";
	var elt2 = document.getElementById(eltId+"_im");
	elt2.style.display = (elt2.style.display == "inline") ? "none" : "inline";
	var elt3 = document.getElementById(eltId+"_ip");
	elt3.style.display = (elt3.style.display == "inline") ? "none" : "inline";
}

function selectionNoeud(noeudId)
{
	var textField = document.getElementById('Dossier_parent_id');
	$idAncienSelected = textField.value == "" ? 0 : textField.value;
	var span1 = document.getElementById("noeud"+$idAncienSelected+"_t");
	span1.style.background = "#FFFFFF";
	var span2 = document.getElementById(noeudId+"_t");
	span2.style.background = "#BCE774";
	
	var id = noeudId.substring(5,noeudId.length);
	var id = id == 0 ? "" : id;
	textField.value = id;
}

function selectedTreeNode(eltId,hiddeninputid)
{
var hiddeninput = document.getElementById(hiddeninputid);
hiddeninput.value = eltId;
}

function toggleHelp(eltId)
{
var elt = document.getElementById(eltId);
elt.style.display = (elt.style.display == "block") ? "none" : "block";
}

//fonction qui set la proprieter enabled du champs Date de deces en fonction du champs est Décédé d'un patient
function enableDeces(deceder)
{
	var champsDate = document.getElementById("date_deces");
	champsDate.disabled = !deceder;
	if(!deceder)
		champsDate.value = "";
}