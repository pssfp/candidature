
function datepicker(){
    
    for (i=1; i<=12; i++){
        $("#datepicker"+i).datepicker();
    }
    
}

//fonction ajax qui récupere la liste des specialités en fonction de l'id formation
function actualiserSpecialite(id)
{         
//    alert("aaaa = "+id);
    objetXHR = creationXHR();
    //construction de la chaine des parametres
    //Config. objet XHR
//    objetXHR.open("post",'http://localhost/pssfp-inscription/index.php/candidature/getspecialite/'+id, true);  
    objetXHR.open("post",'http://candidature.pfinancespubliques.org/index.php/candidature/getspecialite/'+id, true);  
    objetXHR.onreadystatechange = afficherSpecialite;//désignation de la fonction de rappel
    objetXHR.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    objetXHR.send(null);//envoi de la requete
//    alert("fin de requette " ); 
}
        //fonction qui rafraichie la liste des spécialités en fonction de la formation selectionnée
function afficherSpecialite(){
//         alert("appel de fonction affichie specialite  ");
//        alert('voila : '+objetXHR.readyState);
    if (objetXHR.readyState == 4) {//test si le résultat est disponible
        if (objetXHR.status == 200) {
            var json = objetXHR.responseText;
            var value = JSON.parse(json);
            var retour = "";
            retour = "<option value='' selected=\"<?php echo (empty($this->form_data->formation)?'selected':'') ?>\" >----------- Choisir une option  -----------</option>"
            for(var i = 0; i < value.length; i++) {
                retour =retour + "<option value='"+value[i].id +"'>"+value[i].nom+"( "+value[i].code +" )" +"</option>";
            }
            
            document.getElementById("specialite").innerHTML= retour;
        }else{
            //message d'erreur serveur
            alert("Erreur Serveur");
        }
    }
}

function libele_specialite(){
    var formation_id = document.getElementById("specialite").value();
    alert("ddddd "+formation_id);
}

$(document).ready(function(){
            var formation_id = document.getElementById("formationHiden").value;
    
            actualiserSpecialite(formation_id);
    
        });
        
//        permet d'activer ou désactiver un div'
function activerDiv(idactive, idhide1){
    $(idactive).show();
    $(idhide1).hide();
}
