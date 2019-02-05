function computepct2(){
    var total = 0;
    var supp = parseInt(document.getElementById("supp2").value);
    var proj = parseInt(document.getElementById("proj2").value);
    var unif = parseInt(document.getElementById("unif2").value);
    var cont = parseInt(document.getElementById("cont2").value);
    var transpo = parseInt(document.getElementById("transpo2").value);

    g_supp = isNaN(supp);
    g_proj= isNaN(proj);
    g_unif = isNaN(unif);
    g_cont = isNaN(cont);
    g_transpo = isNaN(transpo);

        if(g_supp == false){
            total += supp;
        }
        else{
            total += 0;
        }

        if(g_proj == false){
            total += proj;
        }
        else{
            total += 0;
        }   

        if(g_unif == false){
            total += unif;
        }
        else{
            total += 0;
        }   

        if(g_cont == false){
            total += cont;
        }
        else{
            total += 0;
        }   

        if(g_transpo == false){
            total += transpo;
        }
        else{
            total += 0;
        }   

        document.getElementById("total2").value = total;
}

function validatepct2(){

    var total = parseInt(document.getElementById("total2").value);

    if (isNaN(total))
    {
        alert('Invalid percentage!');
        event.preventDefault();
    }

    else if (total != 100)
    {
        alert('Invalid percentage!');
        event.preventDefault();
    }

}

function computepct3(){
    var total = 0;
    var supp = parseInt(document.getElementById("supp3").value);
    var proj = parseInt(document.getElementById("proj3").value);
    var unif = parseInt(document.getElementById("unif3").value);
    var cont = parseInt(document.getElementById("cont3").value);
    var transpo = parseInt(document.getElementById("transpo3").value);

    g_supp = isNaN(supp);
    g_proj= isNaN(proj);
    g_unif = isNaN(unif);
    g_cont = isNaN(cont);
    g_transpo = isNaN(transpo);

        if(g_supp == false){
            total += supp;
        }
        else{
            total += 0;
        }

        if(g_proj == false){
            total += proj;
        }
        else{
            total += 0;
        }   

        if(g_unif == false){
            total += unif;
        }
        else{
            total += 0;
        }   

        if(g_cont == false){
            total += cont;
        }
        else{
            total += 0;
        }   

        if(g_transpo == false){
            total += transpo;
        }
        else{
            total += 0;
        }   

        document.getElementById("total3").value = total;
}

function validatepct3(){

    var total = parseInt(document.getElementById("total3").value);

    if (isNaN(total))
    {
        alert('Invalid percentage!');
        event.preventDefault();
    }

    else if (total != 100)
    {
        alert('Invalid percentage!');
        event.preventDefault();
    }

}


function computepct4(){
    var total = 0;
    var supp = parseInt(document.getElementById("supp4").value);
    var proj = parseInt(document.getElementById("proj4").value);
    var unif = parseInt(document.getElementById("unif4").value);
    var cont = parseInt(document.getElementById("cont4").value);
    var transpo = parseInt(document.getElementById("transpo4").value);

    g_supp = isNaN(supp);
    g_proj= isNaN(proj);
    g_unif = isNaN(unif);
    g_cont = isNaN(cont);
    g_transpo = isNaN(transpo);

        if(g_supp == false){
            total += supp;
        }
        else{
            total += 0;
        }

        if(g_proj == false){
            total += proj;
        }
        else{
            total += 0;
        }   

        if(g_unif == false){
            total += unif;
        }
        else{
            total += 0;
        }   

        if(g_cont == false){
            total += cont;
        }
        else{
            total += 0;
        }   

        if(g_transpo == false){
            total += transpo;
        }
        else{
            total += 0;
        }   

        document.getElementById("total4").value = total;
}

function validatepct4(){

    var total = parseInt(document.getElementById("total4").value);

    if (isNaN(total))
    {
        alert('Invalid percentage!');
        event.preventDefault();
    }

    else if (total != 100)
    {
        alert('Invalid percentage!');
        event.preventDefault();
    }

}
