function displayBMI()
    {
      
        var bmi;
        var weight = parseInt(document.getElementById("weight").value);
        var height = parseInt(document.getElementById("height").value);

        // computation for english unit
        // bmi = (weight / (height * height)) * 703;

        //computation for metric unit
        if(weight != "" && height != ""){

            bmi = weight/(height/100*height/100);

            document.getElementById("bmi").value = bmi;

            if (bmi < 18.5)
            {
                document.getElementById("remarks").value = "Underweight";
            }

            else if (bmi >= 18.5 && bmi <=25)
            {
                document.getElementById("remarks").value = "Normal Weight";
            }

            else if (bmi >= 25 && bmi <= 30)
            {
                document.getElementById("remarks").value = "Obese";
            }

            else if (bmi > 30)
            {
                document.getElementById("remarks").value = "Overweight";
            }

        }
        else{
          document.getElementById("bmi").value = "";
          document.getElementById("remarks").value = "";
              
        }
    }

