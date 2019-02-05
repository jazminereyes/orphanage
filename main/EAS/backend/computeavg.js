function computeavg()
    {      
        var num = 0;
        var grade = 0;
        var ga = 0;
        var gradeavg = 0;
        var math = parseInt(document.getElementById("math").value);
        var eng = parseInt(document.getElementById("eng").value);
        var fil = parseInt(document.getElementById("fil").value);
        var sci = parseInt(document.getElementById("sci").value);
        var histo = parseInt(document.getElementById("histo").value);
        var mapeh = parseInt(document.getElementById("eng").value);
        var tle = parseInt(document.getElementById("fil").value);
        var val = parseInt(document.getElementById("val").value);

        g_math = isNaN(math);
        g_eng = isNaN(eng);
        g_fil = isNaN(fil);
        g_sci = isNaN(sci);
        g_histo = isNaN(histo);
        g_mapeh = isNaN(mapeh);
        g_tle = isNaN(tle);
        g_val = isNaN(val);

        if(g_math == false){
            num = num + 1;
            grade += math;
        }
        else{
            num += 0;
            grade += 0;
        }

        if(g_eng == false){
            num = num + 1;
            grade += eng;
        }
        else{
            num += 0;
            grade += 0;
        }   

        if(g_fil == false){
            num = num + 1;
            grade += fil;
        }
        else{
            num += 0;
            grade += 0;
        }   

        if(g_sci == false){
            num = num + 1;
            grade += sci;
        }
        else{
            num += 0;
            grade += 0;
        }   

        if(g_histo == false){
            num = num + 1;
            grade += histo;
        }
        else{
            num += 0;
            grade += 0;
        }   

        if(g_mapeh == false){
            num = num + 1;
            grade += mapeh;
        }
        else{
            num += 0;
            grade += 0;
        }   

        if(g_tle == false){
            num = num + 1;
            grade += tle;
        }
        else{
            num += 0;
            grade += 0;
        }   

        if(g_val == false){
            num = num + 1;
            grade += val;
        }
        else{
            num += 0;
            grade += 0;
        }   

        gradeavg = grade/num;
        // gradeavg = ga.toFixed(2);
        document.getElementById("avg").value = gradeavg;

    }

