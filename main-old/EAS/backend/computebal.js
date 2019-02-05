function displayBal()
    {
        var rem;
        var crem = parseFloat(document.getElementById("crem").value);
        var pr = parseFloat(document.getElementById("price").value);

        if(pr != ""){

            rem = crem - pr;

            document.getElementById("tbal").value = rem;

        }
        else{
          document.getElementById("tbal").value = "";
              
        }
    }

