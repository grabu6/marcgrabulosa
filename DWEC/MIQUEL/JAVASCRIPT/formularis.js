function provaCodiArticle(string){
    const rExp= /^[A-Za-z]{3}\-[0-9]{7}\-[A-Z]{1}$/;
    return rExp.test(string);
}

function provaCaracteristiques(dades){
    const rExp= /^[0-9]+$/;
    return rExp.test(dades);
}

function provaPassadis(string){
    const rExp= /^P\-[0-9]{2}\-E$|^P\-[0-9]{2}\-D$/;
    return rExp.test(string);
}

function provaEstanteria(string){
    const rExp= /^EST\+[0-9]{2}\.[0-9]{2}$/;
    return rExp.test(string);
}

function provaForat(string){
    const rExp= /^[0-9]{2}\*[A-Za-z]{3}\*[0-9]{2}\\[0-9]{2}$/;
    return rExp.test(string);
}

function familia(){

    let paraula= document.getElementsByTagName("select")[0].value;
    let resultat = "Familia: " + paraula + "<br>";
    return resultat;

}

function agafarCodi(){

    let codi = document.getElementsByTagName("input")[0].value;
    let resultat = "Codi: " + codi + "<br>";
    return resultat;
}


function agafarNom(){

    let nom = document.getElementsByTagName("input")[1].value;
    let resultat = "Nom: " + nom + "<br>";
    return resultat;
}

function ordenar(){
  
    let familia = ["BLAU", "GROC", "VERMELL"];
    familia.sort();

    const campSeleccionat= document.getElementsByTagName("select")[0];

    for (let i=0; i<familia.length; i++){
        let option= document.createElement("option");
        option.value= familia[i];
        option.innerHTML= familia[i];
        campSeleccionat.append(option);
    }
}

function operarCaracteristiques(){
    
    let caracteristiques= document.getElementsByClassName("caracteristiques");
    let amplada=parseInt(caracteristiques[0].value);
    let llargada= parseInt(caracteristiques[1].value);
    let altura= parseInt(caracteristiques[2].value);
    
    let resultat= "";
    if(provaCaracteristiques(amplada)==true                                                                                                      
    &&provaCaracteristiques(llargada)==true
    &&provaCaracteristiques(altura)==true){

        resultat= (amplada+"x"+llargada+"x"+altura);
        return "Caracteristiques: "+ resultat+ "<br>";

    }else{
        return " ";
    }
}

function ubicacions(){

const ubicacions = document.getElementsByClassName("ubicacio");
let passadis = ubicacions[0].value;
let estanteria = ubicacions[1].value;
let forat = ubicacions[2].value;


let imatges=document.getElementsByClassName("imatge");

let resultat = "";

if(provaPassadis(passadis)==true){
    imatges[0].src ="../Imatges/tick.png";
    resultat += "Ubicació: " + passadis+ "<br>";
}else{
    imatges[0].src = "../Imatges/creu.png";
}

if(provaEstanteria(estanteria)==true){
    imatges[1].src = "../Imatges/tick.png";
    resultat += estanteria+ "<br>";
}else{
    imatges[1].src="../Imatges/creu.png";
}

if(provaForat(forat)==true){
    imatges[2].src = "../Imatges/tick.png";
    resultat += forat + "<br>";
}else{
    imatges[2].src="../Imatges/creu.png";
}

return resultat;

}

function alta(){

resultat="";

if(window.console !== undefined){
    resultat+= familia();
    resultat+=agafarCodi();
    resultat+=agafarNom();
    resultat+= operarCaracteristiques();
    resultat+=ubicacions();
        
    document.getElementsByTagName("p")[0].innerHTML = resultat;
}else{
    document.getElementsByTagName("p")[0].innerHTML = "";
}

    
}

window.onload= function start(){

    ordenar();

    let ubicacio= document.getElementsByClassName("ubicacio");

    for(let i =0; i<ubicacio.length;i++){
        ubicacio[i].addEventListener("change", ubicacions);

    }
    const boto= document.getElementsByTagName("button")[0];
    boto.addEventListener("click", alta);
    
}






    
    
    
  

