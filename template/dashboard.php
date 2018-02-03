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


<input type="file" accept="image/*;capture=camera">


<div class="fieldset">

    <h1><span>Environnement</span></h1>

    <div class="node-data row">

        <div class="col-lg-6 col-md-6">
            <i class="fas fa-thermometer-quarter fa-7x" style="color: #AA0000"></i>
            <span id="temperature" class="mesure"></span>
        </div>

        <div class="col-lg-6 col-md-6">
            <i class="fas fa-sun fa-7x" style="color: #f0ad4e"></i>
            <span id="light" class="mesure"></span>
        </div>
    </div>
</div>


<div class="fieldset">

    <h1><span>Humidité</span></h1>

    <div class="node-data row">

        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-0" class="circleGraph" data-value="0.6">
                <div class="graph">
                    <div class="circle">
                        <img src="https://blogschizo.files.wordpress.com/2015/04/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div><h3 style="text-align: center">Pot n°0<h3></div>
        </div>


        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-1" class="circleGraph" data-value="0.8">
                <div class="graph">
                    <div class="circle">
                        <img src="https://blogschizo.files.wordpress.com/2015/04/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div><h3 style="text-align: center">Pot n°1<h3></div>
        </div>


        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-2" class="circleGraph" data-value="0.3">
                <div class="graph">
                    <div class="circle">
                        <img src="https://blogschizo.files.wordpress.com/2015/04/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div><h3 style="text-align: center">Pot n°2<h3></div>
        </div>


        <div class="col-lg-3 col-md-3">
            <div id="CircleGauge-3" class="circleGraph" data-value="0.5">
                <div class="graph">
                    <div class="circle">
                        <img src="https://blogschizo.files.wordpress.com/2015/04/stickers-plante-verte.png"
                             alt="fixture/juniac.jpg">
                    </div>
                    <div class="value"></div>
                </div>
            </div>
            <div><h3 style="text-align: center">Pot n°3<h3></div>
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

<div id="main" style="width: 600px;height:400px;"></div>


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


<!--
<script type="text/javascript">
    // based on prepared DOM, initialize echarts instance
    var myChart = echarts.init(document.getElementById('main'));

    // specify chart configuration item and data
    var option = {
        title: {
            text: 'ECharts entry example'
        },
        tooltip: {},
        legend: {
            data: ['Sales']
        },
        xAxis: {
            data: ["shirt", "cardign", "chiffon shirt", "pants", "heels", "socks"]
        },
        yAxis: {},
        series: [{
            name: 'Sales',
            type: 'bar',
            data: [5, 20, 36, 10, 10, 20]
        }]
    };

    // use configuration item and data specified to show chart
    myChart.setOption(option);
</script>
//-->

</body>
</html>
