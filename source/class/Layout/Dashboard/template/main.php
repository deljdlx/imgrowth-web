<!doctype html>
<html>
<head>

    <?php
        $this->fragment('/template/__head.php');

    ?>

</head>
<body>

<?php
$this->fragment('/template/__navbar.php');
?>



<div class="main">

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



</div>

<?php
$this->fragment('/template/__javascript.php');

?>


</body>
</html>
