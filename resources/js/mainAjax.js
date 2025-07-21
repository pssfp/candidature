/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function creationXHR() {
    var resultat=null;
    try {//test pour les navigateurs : Mozilla, Opéra, ...
        resultat= new XMLHttpRequest();
    } 
    catch (Error) {
        try {//test pour les navigateurs Internet Explorer > 5.0
            resultat= new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (Error) {
            try {//test pour le navigateur Internet Explorer 5.0
                resultat= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (Error) {
                resultat= null;
            }
        }
    }
    return resultat;
}


window.onload=testerNavigateur;
//-----------------------------
function testerNavigateur() {   
    objetXHR = creationXHR();
    if(objetXHR==null) {
        alert("Votre navigateur ne supporte pas javascript ou alors javascript n'est pas actif");
    }
}
