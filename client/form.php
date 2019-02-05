<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Basic</title>
  <link rel="stylesheet" href="jquery-steps-master/dist/jquery-steps.css">
  <!-- Demo stylesheet -->
  <link rel="stylesheet" href="jquery-steps-master/examples/css/style.css">

   <script>
      

    function validateForm2(){
        alert('Pumasok');
        $('.required').each(function(){
        if( $(this).val() == "" ){
          alert('Please fill all the fields');

          return false;
        }
    });
});
    </script>
</head>
<body>

   <div id="demo">
            <div class="step-app">
              <ul class="step-steps">
                <li><a href="#step1">Basic Information</a></li>
                <li><a href="#step2">Medical Information</a></li>
                <li><a href="#step3">Hobbies</a></li>
                <li><a href="#step4">Family Background</a></li>
                <li><a href="#step5">Other Information</a></li>
              </ul>

              <div class="step-content">
                <div class="step-tab-panel" id="step1">
                <form>
                <input type="text" class="required"/>
                </div>
                <div class="step-tab-panel" id="step2">
                <input type="text" class="required"/>
                </div>
                <div class="step-tab-panel" id="step3">
                <input type="text" class="required"/>
                </div>
                <div class="step-tab-panel" id="step4">
                <input type="text"/>
                </div>
                <div class="step-tab-panel" id="step5">
                <input type="text"/>
                <input type="submit" value="submit" name="submit" onclick="validateForm()"/>
                </form>
                </div>
              </div>
              
              <div class="step-footer">
                <button data-direction="prev" class="step-btn">Previous</button>
                <button data-direction="next" class="step-btn">Next</button>
                <button data-direction="finish" class="step-btn">Finish</button>
              </div>
            </div>  
          </div>

  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="jquery-steps-master/dist/jquery-steps.js"></script>
 
  <script>
    $('#demo').steps({
      onFinish: function () {
        alert('Wizard Completed');
      }
    });

    function validateForm(){
        $('.required').each(function(){
        if( $(this).val() == "" ){
          alert('Please fill all the fields');

          return false;
        }
    });
    }
  </script>
 
</body>
</html>
