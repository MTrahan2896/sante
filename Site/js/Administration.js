var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope,$window) {
  $scope.name = 'World';
  $scope.toggle = $scope.name.length<3


   $scope.check = function(){
     
     console.log($scope.toggle)
   } 

   
    
  $scope.numItems = function(className) {
		 return $window.document.getElementsByClassName(className).length;
  };

	    setInterval(function() {
        $scope.$apply() 
    }, 500);

});  
     


function ajouterGroupe(nomGroupe, idGroupe){


$("#listeGroupe").html($("#listeGroupe").html() + " <li class=\"groupe\"><div class=\"collapsible-header\"><i class=\"material-icons\">supervisor_account</i>"+
	nomGroupe+
	"<span class=\"right\" id=\"nbEleves\">{{numItems('Eleve-groupe"+idGroupe+"')}}<i class=\"material-icons right\">person</i></span>"+
	"</div><div class=\"collapsible-body\" style=\"display: none; padding-top: 30px; margin-top: 0px; padding-bottom: 30px; margin-bottom: 0px;\">"+
	"<table class=\"bordered\"><thead><tr><th data-field=\"id\">Nom</th><th data-field=\"name\">Prénom</th><th data-field=\"price\">Note</th></tr></thead><tbody id=\""+idGroupe+"\">");






	
	/*for (var i = 0; i < 5; i++) {
		$("#"+idGroupe).html($("#"+idGroupe).html()+"<div class=\"Eleve-groupe"+idGroupe+"\"></div>");
	}
*/

	$("#"+idGroupe).html($("#"+idGroupe).html()+"</tbody></table></li></div>");
	



}





function ajouterEleve(idGroupe, _nom, _prenom, _note){

	let row = document.createElement("tr");
	row.className ="Eleve-groupe"+idGroupe;
	let nom = document.createElement("td");
	nom.innerHTML = _nom;
	let prenom = document.createElement("td");
	prenom.innerHTML = _prenom;
	let note = document.createElement("td");
	note.innerHTML = _note;

	row.appendChild(nom);
	row.appendChild(prenom);
	row.appendChild(note);
	row.innerHTML += "<td><a class=\"btn-floating  waves-effect waves-light red\"><i class=\"material-icons\">clear</i></td>";

	document.getElementById(idGroupe).appendChild(row);

}

