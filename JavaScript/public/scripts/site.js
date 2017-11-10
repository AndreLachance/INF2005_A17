function changementPolice() {

    var font = "Courier"
    var paragraphes = document.getElementsByTagName("p");
    for (var i = 0; i < paragraphes.length; i++){
        paragraphes[i].style.fontFamily = font;
    }
 }

function reordonnerParagraphes(){

    var texte_paragraphe1 = document.getElementById("paragraphe1").innerHTML;
    var texte_paragraphe2 = document.getElementById("paragraphe2").innerHTML;
    var texte_paragraphe3 = document.getElementById("paragraphe3").innerHTML;

    document.getElementById("paragraphe1").innerHTML = texte_paragraphe2;
    document.getElementById("paragraphe2").innerHTML = texte_paragraphe3;
    document.getElementById("paragraphe3").innerHTML = texte_paragraphe1;
    
}

function visibiliterTitre(){
    
    var titre = document.getElementById("titre");

    if (titre.style.visibility === "" || titre.style.visibility === "visible") {
        titre.style.visibility = "hidden";
    } else {
        titre.style.visibility = "visible";
    }

}

function couleurTitre(){
    document.getElementById("titre").style.color = "red";
}

function ajoutParagraphe(){
    
    var texte = "Tellus elementum sagittis vitae et leo. Aliquam sem et tortor consequat id porta. Dictum sit amet justo donec. Lectus nulla at volutpat diam ut venenatis tellus. Ipsum suspendisse ultrices gravida dictum. Nunc vel risus commodo viverra maecenas accumsan. Elementum nibh tellus molestie nunc non. At lectus urna duis convallis. Quisque id diam vel quam. Mauris in aliquam sem fringilla ut. At imperdiet dui accumsan sit amet. Viverra nam libero justo laoreet. Feugiat in fermentum posuere urna nec tincidunt praesent semper feugiat.";

    var paragraphe = document.createElement("p")
    paragraphe.innerHTML = texte;

    document.getElementById("listeParagraphe").appendChild(paragraphe);
}