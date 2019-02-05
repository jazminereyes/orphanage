function updateOrphan()
  {
    
    document.getElementById("addr_lbl").style.display = "none";
    document.getElementById("place").style.display = "none";
    document.getElementById("lbl_s").style.display = "inline-block";
    document.getElementById("st").style.display = "inline-block";
    document.getElementById("lbl_c").style.display = "inline-block";
    document.getElementById("ct").style.display = "inline-block";
    document.getElementById("lbl_z").style.display = "inline-block";
    document.getElementById("zp").style.display = "inline-block";
    document.getElementById("fullname").style.display = "none";
    document.getElementById("name_lbl").style.display = "none";
    document.getElementById("lvl").style.display = "none";
    document.getElementById("selyrlvl").style.display = "inline-block";
    document.getElementById("fn").style.display = "inline-block";
    document.getElementById("mn").style.display = "inline-block";
    document.getElementById("ln").style.display = "inline-block";
    document.getElementById("first").style.display = "inline-block";
    document.getElementById("mid").style.display = "inline-block";
    document.getElementById("lst").style.display = "inline-block";
    document.getElementById("bday").style.display = "inline-block";
    document.getElementById("bdate").style.display = "none";
    document.getElementById("gender").disabled = false;
    document.getElementById("school").disabled = false;
    document.getElementById("savebtn").style.display = "block";
     document.getElementById("cancelbtn").style.display = "block";
  
  }
  function saveOrphan()
  {
    document.getElementById("savebtn").style.display = "none";
    document.getElementById("cancelbtn").style.display = "none";
  }

  function disableOrphan()
  {
    document.getElementById("addr_lbl").style.display = "inline-block";
    document.getElementById("place").style.display = "inline-block";
    document.getElementById("lbl_s").style.display = "none";
    document.getElementById("st").style.display = "none";
    document.getElementById("lbl_c").style.display = "none";
    document.getElementById("ct").style.display = "none";
    document.getElementById("lbl_z").style.display = "none";
    document.getElementById("zp").style.display = "none";
    document.getElementById("fullname").disabled = true;
    document.getElementById("bdate").style.display = "inline-block";
    document.getElementById("bday").style.display = "none";
    document.getElementById("gender").disabled = true;
    document.getElementById("place").disabled = true;
    document.getElementById("school").disabled = true;
    document.getElementById("fn").style.display = "none";
    document.getElementById("mn").style.display = "none";
    document.getElementById("ln").style.display = "none";
    document.getElementById("first").style.display = "none";
    document.getElementById("mid").style.display = "none";
    document.getElementById("lst").style.display = "none";
    document.getElementById("selyrlvl").style.display = "none";
    document.getElementById("fullname").style.display = "inline-block";
    document.getElementById("name_lbl").style.display = "inline-block";
    document.getElementById("lvl").style.display = "inline-block";

  }

  function cancelUpdate(){
    alert('cancel');
    document.getElementById("addr_lbl").style.display = "inline-block";
    document.getElementById("place").style.display = "inline-block";
    document.getElementById("lbl_s").style.display = "none";
    document.getElementById("st").style.display = "none";
    document.getElementById("lbl_c").style.display = "none";
    document.getElementById("ct").style.display = "none";
    document.getElementById("lbl_z").style.display = "none";
    document.getElementById("zp").style.display = "none";
    document.getElementById("fullname").disabled = true;
    document.getElementById("bdate").style.display = "inline-block";
    document.getElementById("bday").style.display = "none";
    document.getElementById("gender").disabled = true;
    document.getElementById("place").disabled = true;
    document.getElementById("school").disabled = true;
    document.getElementById("fn").style.display = "none";
    document.getElementById("mn").style.display = "none";
    document.getElementById("ln").style.display = "none";
    document.getElementById("first").style.display = "none";
    document.getElementById("mid").style.display = "none";
    document.getElementById("lst").style.display = "none";
    document.getElementById("selyrlvl").style.display = "none";
    document.getElementById("savebtn").style.display = "none";
    document.getElementById("cancelbtn").style.display = "none";
    document.getElementById("fullname").style.display = "inline-block";
    document.getElementById("name_lbl").style.display = "inline-block";
    document.getElementById("lvl").style.display = "inline-block";
  }