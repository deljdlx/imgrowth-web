<!doctype html>
<html>
<head>

    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="vendor/x_material_kit_free_v1.1.1/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="vendor/x_material_kit_free_v1.1.1/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>ImGrowth</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>


    <!-- CSS Files -->
    <link href="vendor/x_material_kit_free_v1.1.1/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="vendor/x_material_kit_free_v1.1.1/assets/css/material-kit.css" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="vendor/x_material_kit_free_v1.1.1/assets/css/demo.css" rel="stylesheet"/>


    <script defer src="vendor/fontawesome-free-5.0.6/svg-with-js/js/fontawesome-all.js"></script>


    <link href="css/application.css" rel="stylesheet"/>


    <style>


    </style>


</head>
<body>

<!--
<input type="file" accept="image/*;capture=camera">
//-->

<div class="fieldset">

    <h1><span>Environnement</span></h1>

    <div class="node-data row">

        <div class="col-lg-3 col-md-3">
            <i class="fas fa-thermometer-quarter fa-7x" style="color: #AA0000"></i>
            <span id="temperature" class="mesure"></span>
        </div>

        <div class="col-lg-3 col-md-3">
            <i class="fas fa-sun fa-7x" style="color: #f0ad4e"></i>
            <span id="light" class="mesure"></span>
        </div>
    </div>
</div>





<div class="fieldset">
    <h1><span>Enregistrer une étape</span></h1>
    <div>
        <textarea name="newContent" style="width:100%"></textarea>
        <input style="" id="myFileInput" type="file" accept="image/*;capture=camera">
    </div>
    <div id="imagePreview"></div>
</div>







<div class="fieldset">
    <h1><span>Lumière et température</span></h1>
    <div>
        <div id="temperatureGraph" style="width: 100%;height:400px;"></div>
    </div>
</div>



<div class="fieldset">
    <h1><span>Humidité</span></h1>

    <div>
        <div id="humidityGraph" style="width: 100%;height:400px;"></div>
    </div>

</div>









<div class="fieldset">

    <h1><span>Humidité</span></h1>

    <div class="node-data row">

        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-0" class="circleGraph" data-value="0.6">
                <div class="graph">
                    <div class="circle">
                        <img src="asset/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div style="clear: both"><h3 style="">Pot n°0<h3></div>
        </div>


        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-1" class="circleGraph" data-value="0.8">
                <div class="graph">
                    <div class="circle">
                        <img src="asset/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div style="clear: both"><h3 style="">Pot n°1<h3></div>
        </div>


        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-2" class="circleGraph" data-value="0.3">
                <div class="graph">
                    <div class="circle">
                        <img src="asset/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div style="clear: both"><h3 style="">Pot n°2<h3></div>
        </div>


        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-3" class="circleGraph" data-value="0.5">
                <div class="graph">
                    <div class="circle">
                        <img src="asset/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div style="clear: both"><h3 style="">Pot n°3<h3></div>
        </div>


    </div>
</div>


<div class="fieldset">
    <h1><span>Actions</span></h1>

    <div style="padding: 16px;">


        <h3 style="font-weight: bold">Lumière</h3>
        <div class="togglebutton" style="zoom: 2">
            <label>
                <input type="checkbox" name="lightSwitch" id="lightSwitch">
            </label>
        </div>

        <hr/>
            <h3 style="font-weight: bold">Arrosage manuel</h3>
        <div>
            <a href="javascript:void(0)" class="btn btn-default water-trigger" data-index="0"
               style="font-size: 1.2em; font-weight: bold">
                <i class="fas fa-tint" style="color:#03a9f4"></i>
                Arrosage 0
            </a>

            <a href="javascript:void(0)" class="btn btn-default water-trigger" data-index="1"
               style="font-size: 1.2em; font-weight: bold">
                <i class="fas fa-tint" style="color:#03a9f4"></i>
                Arrosage 1
            </a>

            <a href="javascript:void(0)" class="btn btn-default water-trigger" data-index="2"
               style="font-size: 1.2em; font-weight: bold">
                <i class="fas fa-tint" style="color:#03a9f4"></i>
                Arrosage 2
            </a>

            <a href="javascript:void(0)" class="btn btn-default water-trigger" data-index="3"
               style="font-size: 1.2em; font-weight: bold">
                <i class="fas fa-tint" style="color:#03a9f4"></i>
                Arrosage 3
            </a>

        </div>
    </div>


</div>


<div class="fieldset">
    <h1><span>Réglages humidité</span></h1>

    <div class="btn-group btn-group-justified btn-group-raised">
        <a href="javascript:void(0)" class="btn " id="calibrate0">Calibrage humidité 0%</a>
        <a href="javascript:void(0)" class="btn " id="calibrate1">Calibrage humidité 100%</a>
    </div>



    <hr/>


    <div class="nodeConfiguration" style="padding: 16px;">

            <?php
            for ($i = 0; $i < 4; $i++) {
                echo '<div class=" row">';
                echo '<h3 style="font-weight: bold">Pot n°' . $i . '</h3>';
                echo '<div class="col-sm-4">
                            <div class="humiditySlider"></div>
                        </div>';
                echo '<div class="col-sm-1">
                            <i class="fas fa-tint fa-2x" style="color:#03a9f4"></i>
                        </div>';

                echo '</div>';
            }
            ?>
    </div>
</div>



<script src="vendor/exif-js/exif.js" type="text/javascript"></script>



<script>
var myInput = document.getElementById('myFileInput');


function readFile(file) {

    var reader = new FileReader();



    reader.readAsDataURL(file);
    //reader.is

    reader.onloadend = function(evt) {

        var dataURL = reader.result;


        var maxWidth = 600;
        var maxHeight = 600;


        var image = new Image();
        image.src = dataURL;

        image.onload = function () {



            var width = image.width;
            var height = image.height;
            var shouldResize = (width > maxWidth) || (height > maxHeight);

            if (!shouldResize) {
                sendFile(dataURL);
                return;
            }
            else {

                var orientation = null;
                EXIF.getData(image, function() {
                    console.debug(EXIF.pretty(this));
                    orientation = EXIF.getTag(this, "Orientation");
                });


                var newWidth;
                var newHeight;

                if (width > height) {
                    newHeight = height * (maxWidth / width);
                    newWidth = maxWidth;
                } else {
                    newWidth = width * (maxHeight / height);
                    newHeight = maxHeight;
                }

                var canvas = document.createElement('canvas');


                var context = canvas.getContext('2d');

                if(orientation == 1) {
                    canvas.width = newWidth;
                    canvas.height = newHeight;
                    context.drawImage(this, 0, 0, newWidth, newHeight);
                }

                if(orientation == 8) {
                    canvas.width = newHeight;
                    canvas.height = newWidth;
                    context.translate(newWidth/2, newHeight/2)
                    context.rotate(-90*Math.PI/180);
                    context.drawImage(this, newWidth/4, 0, -newWidth,  -newHeight);
                }

                if(orientation == 6) {
                    canvas.width = newHeight;
                    canvas.height = newWidth;
                    context.translate(newWidth/2, newHeight/2)
                    context.rotate(90*Math.PI/180);
                    context.drawImage(this, -newWidth/4, 0, newWidth,  newHeight);
                }

                if(orientation == 3) {
                    canvas.width = newWidth;
                    canvas.height = newHeight;

                    context.translate(newWidth/2, newHeight/2)
                    context.rotate(-180*Math.PI/180);

                    context.drawImage(this, -newWidth/2, -newHeight/2, newWidth,  newHeight);
                }

                dataURL = canvas.toDataURL(file.type);

                $('#imagePreview').append(canvas);

                sendFile(dataURL);
            }
        }
    };
}



function sendFile(fileData) {

    var formData = new FormData();


    formData.append('photo', fileData);

    $.ajax({
        type: 'POST',
        url: 'index.php/photo/post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            console.debug(data);
        },
        error: function (data) {
            alert('There was an error uploading your file!');
        }
    });
}









function sendPic() {

    var file = myInput.files[0];
    readFile(file);




    /*
    var formData = new FormData();
    formData.append("photo", file, file.name);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php/photo/post', true);
// Set up a handler for when the request finishes.
    xhr.onload = function (data) {
        if (xhr.status === 200) {
            // File(s) uploaded.
            alert(JSON.stringify(xhr.responseText));
        } else {
            alert('An error occurred!');
        }
    };
    xhr.send(formData);
    */
}

myInput.addEventListener('change', sendPic, false);
</script>



<script src="vendor/x_material_kit_free_v1.1.1/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="vendor/x_material_kit_free_v1.1.1/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="vendor/x_material_kit_free_v1.1.1/assets/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->

<!--<script src="vendor/x_material_kit_free_v1.1.1/assets/js/nouislider.min.js" type="text/javascript"></script>//-->

<script src="vendor/noUiSlider.11.0.3/nouislider.js" type="text/javascript"></script>
<link rel="stylesheet" href="vendor/noUiSlider.11.0.3/nouislider.css" />




<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="vendor/x_material_kit_free_v1.1.1/assets/js/bootstrap-datepicker.js"
        type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="vendor/x_material_kit_free_v1.1.1/assets/js/material-kit.js" type="text/javascript"></script>

<script src="vendor/jquery-circle-progress/dist/circle-progress.js" type="text/javascript"></script>
<script src="javascript/class/CircleGauge.js" type="text/javascript"></script>


<script>


</script>


<script src="vendor/echarts.min.js"></script>


<script type="text/javascript">

    $().ready(function () {


    });

</script>

<script src="javascript/class/Application.js" type="text/javascript"></script>
<script src="javascript/class/Seed.js" type="text/javascript"></script>

<script src="javascript/bootstrap.js" type="text/javascript"></script>



<script type="text/javascript">

</script>


</body>
</html>
