function changeTextbox(str)
{

  if(str == "" || str == 0){
    var amt = "";
  }
  else{
    if (document.getElementById('customRadio1').checked && str != "")
    {
      var qty = document.getElementById('qty').value;
      var amt = 12500 * qty;
    }

    else if (document.getElementById('customRadio2').checked && str != "")
    {
      var qty = document.getElementById('qty').value;
      var amt = 15000 * qty;
    }
    else{
      var amt = "";
    }
  }

  document.getElementById('total').value = amt;
}

function displayPref(str)
{
  if(str=="Yes")
  {
    document.getElementById('preference').style.display = "block";
  }

  else
  {
    document.getElementById('preference').style.display = "none";
  }
}

function validateDate()
{
  var month = document.getElementById('month').value;
  var day = document.getElementById('date').value;
  var year = document.getElementById('year').value;

  var date = year+"-"+month+"-"+day;

  if (moment(date).isAfter(moment())==true)
  {
    swal("Error", "Birthdate cannot be greater than current date.", "error");
    event.preventDefault();
  }
}

function checkEmail()
{
  var mail = document.getElementById('email').value;

  if (emailadd.includes(mail)==true)
  {
    swal('Error!', 'Email address already exists.', 'error');
    event.preventDefault();
  }
}

$(function () {
    //Flat red color scheme for iCheck
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })
});

$(document).ready(function() {
    $("body" ).on( "ifChecked","#gen" , function() {
       document.getElementById('gender').style.display = "block";
    });
});

$(document).ready(function() {
    $("body" ).on( "ifUnchecked","#gen" , function() {
       document.getElementById('gender').style.display = "none";
    });
});

$(document).ready(function() {
    $("body" ).on( "ifChecked","#rel" , function() {
       document.getElementById('religion').style.display = "block";
    });
});

$(document).ready(function() {
    $("body" ).on( "ifUnchecked","#rel" , function() {
       document.getElementById('religion').style.display = "none";
    });
});

function displayRel(checkbox)
{
  if (checkbox.checked){
    document.getElementById('religion').style.display = "block";
  }

  else
  {
    document.getElementById('religion').style.display = "none";
  }
}

function displayGwa(checkbox)
{
  if (checkbox.checked){
    document.getElementById('gwa').style.display = "block";
  }

  else
  {
    document.getElementById('gwa').style.display = "none";
  }
}
