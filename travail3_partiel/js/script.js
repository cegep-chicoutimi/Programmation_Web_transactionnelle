// 1 - Changement de couleur du texte du tire h2 lorsque on survole dessus
$('h2').hover(function() {
    $(this).css('color', 'red');
}, function() {
    $(this).css('color', 'blue');
});


// 2-  Lors du chargement de page, le rectangle vert est invisible. Indice : hide

$("div#green").hide();

// 3  Changer les cases à cocher en bouton au chargement  de la page 

$('input[type="checkbox"]').checkboxradio({ icon: false });

/*5 - Lors de la sélection d’une couleur (les 4 cases à cocher transformées en boutons), le
rectangle correspondant à la couleur sélectionnée devient visible. Lors de la désélection,
le rectangle devient invisible. Indice : click - val - toggle */

$('input[type="checkbox"]').click(function() {
    var color = $(this).val();
    $("#" + color).toggle();
});

/*6 - Transformez la division (div) « slider » en visuel de curseur, qui modifie la largeur des
rectangles de couleurs et la valeur du label. Minimum 10 et Maximum 140. Indice :
slider - text - width*/

$("#slider").slider({
    range : "min", // defini la couleur de progression
    min: 10,
    max: 140,
    slide: function(event, ui) {
        $("#width").text(ui.value + "px");
        $(".rectangle").width(ui.value);
    }
});

/* 7 - Ajoutez une boîte d’information (tooltip) lorsque la souris passe par-dessus le curseur
(slider). Indice : tooltip */

$("#slider").tooltip();

/* 8 - Ajoutez l’icône ui-icon-comment sur le bouton « Afficher un message "modal" », et lors
du clic sur ce bouton, affichez un message dans une fenêtre modal. Indice : button -
icons - click - dialog
*/

$("div#message button").button({
    icons: {
        primary: "ui-icon-comment"
    }
}).click(function() {
    $("#dialog").dialog({
        modal: true,
        buttons: {
            "Ok": function() {
                $(this).dialog("close");
            }
        }
    });
});

/*  9 -  Ajoutez l’icône ui-icon-plus sur le bouton « Ajouter une ligne », et lors du clic sur ce
bouton, ajoutez un paragraphe (même texte que ceux déjà en place) à la suite des
autres (avant les boutons). Indice : button - icons - click - before - text   */

$("button#add").button({
    icons: {
        primary: "ui-icon-plus"
    }
}).click(function() {
    $("#paragraphe button:first")
        .before($("<p>").text("Tu autem, Fanni, quod mihi tantum tribui dicis quantum ego nec adgnosco postulo."));
});

/* 10 -Ajoutez l’icône ui-icon-minus sur le bouton « Effacer une ligne », et lors du clic sur ce
bouton, enlevez le dernier paragraphe. Indice : button - icons - click - last - remove */

$("button#del").button({
    icons: {
        primary: "ui-icon-minus"
    }
}).click(function() {
    $("#paragraphe p:last").remove();
});

/* 11 - Ajoutez l’icône ui-icon-play sur le bouton « Démarrer l’animation », et lors du clic sur ce
bouton, faire une animation ralentie (slow) qui bouge ce même bouton vers la droite de
300px, et revient à sa position initiale. Indice : button - icons - click - aminate */


$("div#animation button").button({
    icons: {
        primary: "ui-icon-play"
    }
}).click(function() {
    $("div#animation button")
        .animate({ marginLeft: "300px" }, "slow")
        .animate({ marginLeft: "0px" }, "slow"); // pour revenir à sa position initiale, même si vous ne l'avez pas demandé
});

/* 12 - Ajoutez l’icône ui-icon-help sur le bouton « jQuery c’est… », et lors du clic sur ce bouton,
faire un appel AJAX qui va afficher le texte du fichier jquery.txt dans division (div)
« reponse ». Indice : button - icons - click - load */

$("div#ajax button").button({
    icons: {
        primary: "ui-icon-help"
    }
}).click(function() {
    $("#reponse").load("ajax/jquery.txt");
});


/* 13 - */

$("div input#datepicker").datepicker($.datepicker.regional["fr"]);


/* 14 - */  
$("#spinner").spinner({
    min: 0,
    max: 10
});


/* 15 -  Nouveau comportement  */

/*   Effet de bascule   */
$("button#toggleBox").button({
    icons: { primary: "ui-icon-info" }
}).click(function() {
    $("#infoBox").toggle("slow");
});




$("#slideToggle").click(function() {
    $("#slideBox").slideToggle("slow").fadeToggle("slow");
});


// Faire clignoter le texte du titre

$("#bouttonClignoter").click(function() {
    $("#flashText").fadeOut(500).fadeIn(500);
});
