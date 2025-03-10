function ChargerInfo(el) {
  var code = el.value;
  var typeDeFichier = document.getElementById("typefichier").value;   

  
  if (typeDeFichier === "json") {
    fournirInfoJson(code);
  }
  else if (typeDeFichier === "xml") {
    fournirInfoXml(code);
  }

}

function fournirInfoJson(code) {
  var reponseJson = new XMLHttpRequest();

  reponseJson.onreadystatechange = function () {
      if (reponseJson.readyState == 4 && reponseJson.status == 200) {
        // readystate == 4 veut dire que les données sont accesibles
       // status == 200 veut dire que le chargement a réussi
          var peinture = JSON.parse(reponseJson.responseText).peinture;
          var peintureChoisie = null;

          //on part chercher la peinture correspondante au bouton choisi
            for(var i = 0; i < peinture.length; i++) {
                 if(peinture[i].code === code) {
                    peintureChoisie = peinture[i];
                    }
                  }

          if (peintureChoisie) {
              /* Cette fonction de mettre à jour les elements, afin d'éviter les copier coller des codes 
               et avoir les bonnes pratiques de programmation 😁 */
               
              function mettreAJourTexte(id, texte) {
                  var element = document.getElementById(id);
                  if (element.firstChild) {
                      element.firstChild.nodeValue = texte;
                  } else {
                      element.appendChild(document.createTextNode(texte));
                  }
              }

              // Mise à jour des informations
              mettreAJourTexte("titre", peintureChoisie.titre);
              mettreAJourTexte("artiste", peintureChoisie.artiste);
              mettreAJourTexte("prix", peintureChoisie.prix);
            //  mettreAJourTexte("info", "Informations mises à jour.");

              // Mise à jour de l'image
              document.getElementById("peinture").setAttribute("src", "img/" + peintureChoisie.image);
              ChargerDescription(code);
          } 
      }
  };

 // je pars recuperer le contenu json depuis le fichier peintures.json
  reponseJson.open("GET", "ajax/peintures.json", true);
  reponseJson.send();
}


function fournirInfoXml(code) {
  var reponseXml = new XMLHttpRequest();

  reponseXml.onreadystatechange = function () {
      if (reponseXml.readyState == 4 && reponseXml.status == 200) {
          var FichierXml = reponseXml.responseXML;
          var peintures = FichierXml.getElementsByTagName("peinture");
          var peintureChoisie = null;

          // Recherche de la peinture correspondant au code
          for (var i = 0; i < peintures.length; i++) {
              var codePeinture = peintures[i].getElementsByTagName("code")[0].firstChild.nodeValue;
              if (codePeinture === code) {
                  peintureChoisie = {
                      titre: peintures[i].getElementsByTagName("titre")[0].firstChild.nodeValue,
                      artiste: peintures[i].getElementsByTagName("artiste")[0].firstChild.nodeValue,
                      prix: peintures[i].getElementsByTagName("prix")[0].firstChild.nodeValue,
                      image: peintures[i].getElementsByTagName("image")[0].firstChild.nodeValue
                  };
                  break;
              }
          }

          if (peintureChoisie) {
              mettreAJourInfos(peintureChoisie, code);
          }
      }
  };

  reponseXml.open("GET", "ajax/peintures.xml", true);
  reponseXml.send();
}

     /* autre petite fonction pour mettre à jour les informations de la peinture
      choisie quelqu'en soit le type du fichier
      */


function mettreAJourInfos(peinture, code) {
  function mettreAJourTexte(id, texte) {
      var element = document.getElementById(id);
      if (element.firstChild) {
          element.firstChild.nodeValue = texte;
      } else {
          element.appendChild(document.createTextNode(texte));
      }
  }

  mettreAJourTexte("titre", peinture.titre);
  mettreAJourTexte("artiste", peinture.artiste);
  mettreAJourTexte("prix", peinture.prix);
  document.getElementById("peinture").setAttribute("src", "img/" + peinture.image);

  //reutilisation de la fonction pour charger la description pour les bonnes pratiques de programmation 
  ChargerDescription(code);
}



// Fonction pour recuperer les infos CONTENU DANS LES FICHIERS TEXTES 
function ChargerDescription(code) {
    var fichierTexte = "ajax/" + code + ".txt";  
    var xhrTxt = new XMLHttpRequest();

    xhrTxt.onreadystatechange = function () {
        if (xhrTxt.readyState == 4 && xhrTxt.status == 200) {
            var infoElement = document.getElementById("info");
            if (infoElement.firstChild) {
                infoElement.firstChild.nodeValue = xhrTxt.responseText;
            } else {
                infoElement.appendChild(document.createTextNode(xhrTxt.responseText));
            }
        }
    };

    xhrTxt.open("GET", fichierTexte, true);
    xhrTxt.send();
}