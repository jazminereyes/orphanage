<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="jquery-steps-master/dist/jquery-steps.css" />
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="jquery-steps-master/dist/jquery-steps.js"></script>
    <script>
    $('#demo').steps({
        onFinish: function () { alert('Wizard Completed'); }
    });
    </script>
</head>
<body>
<div id="demo">
    <div class="step-app">
        <ul class="step-steps">
            <li><a href="#step1">Step 1</a></li>
            <li><a href="#step2">Step 2</a></li>
            <li><a href="#step3">Step 3</a></li>
        </ul>
        <div class="step-content">
            <div class="step-tab-panel" id="step1">
                ...
            </div>
            <div class="step-tab-panel" id="step2">
                ...
            </div>
            <div class="step-tab-panel" id="step3">
                ...
            </div>
        </div>
        <div class="step-footer">
            <button data-direction="prev">Previous</button>
            <button data-direction="next">Next</button>
            <button data-direction="finish">Finish</button>
        </div>
    </div>
</div>
</body>
</html>