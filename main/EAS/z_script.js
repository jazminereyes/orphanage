
function getStatement(str)
{
    var schol = document.getElementById("scholar").value;
    var budget = document.getElementById("bid").value;

    if (str== "") {
        document.getElementById("statement").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("statement").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getexp.php?year="+str+"&scholarid="+schol+"&bid="+budget, true);
        xmlhttp.send();
    }
}

function displayData(str)
{
    if (str== "") {
        document.getElementById("budgetalloc").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("budgetalloc").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getbudget.php?type="+str, true);
        xmlhttp.send();
    }
}

function displayButton(str)
{
    if (str== "") {
        document.getElementById("epchange").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("epchange").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getep.php?type="+str, true);
        xmlhttp.send();
    }
}

function displayButtonhs(str)
{
    if (str== "") {
        document.getElementById("epchangehs").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("epchangehs").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getephs.php?type="+str, true);
        xmlhttp.send();
    }
}

function displayAmount(str)
{
    if (str == "EM")
    {
        document.getElementById("amt").value = 1250;
    }

    else if (str == "EY")
    {
        document.getElementById("amt").value = 12500;
    }
}

function displayValue(str)
{
    if (str == "HSM")
    {
        document.getElementById("hs").value = 1500;
    }

    else if (str == "HSY")
    {
        document.getElementById("hs").value = 15000;
    }
}

function displayHigh(str)
{
    if (str== "") {
        document.getElementById("budgeths").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("budgeths").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getbudget.php?type="+str, true);
        xmlhttp.send();
    }
}

function displayBalance(str)
{
    var schol = document.getElementById("scholar").value;

    if (str== "") {
        document.getElementById("rem").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rem").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "z_getbalance.php?type="+str+"&scholarid="+schol, true);
        xmlhttp.send();
    }
}

function validateBalance()
{
    var amount = parseInt(document.getElementById("price").value);
    var balance = parseInt(document.getElementById("balance").value);

    if (isNaN(amount))
    {
        alert('Invalid amount!');
        event.preventDefault();
    }

    else if (amount <= 0 || amount > balance)
    {
        alert('Invalid amount!');
        event.preventDefault();
    }
}

function computepct(){
    var total = 0;
    var supp = parseInt(document.getElementById("supp").value);
    var proj = parseInt(document.getElementById("proj").value);
    var unif = parseInt(document.getElementById("unif").value);
    var cont = parseInt(document.getElementById("cont").value);
    var transpo = parseInt(document.getElementById("transpo").value);

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

        document.getElementById("total").value = total;
}

function validatepct(){

    var total = parseInt(document.getElementById("total").value);

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

