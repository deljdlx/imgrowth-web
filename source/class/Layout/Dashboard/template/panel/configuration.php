<div class="fieldset">
    <h1><span>Réglages humidité</span></h1>

    <!--
    <div class="btn-group btn-group-justified btn-group-raised">
        <a href="javascript:void(0)" class="btn " id="calibrate0">Calibrage humidité 0%</a>
        <a href="javascript:void(0)" class="btn " id="calibrate1">Calibrage humidité 100%</a>
    </div>
    <hr/>
    //-->


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



<div class="fieldset">
    <h1><span>Localisation</span></h1>


    <div style="padding: 16px;">

        <div id="demo"></div>

        <form>
            <div class="form-group">
                <label for="exampleInputEmail2" class="bmd-label-floating">Ville</label>
                <input type="email" class="form-control" id="exampleInputEmail2">
            </div>

            <div class="form-group">
                <label for="exampleSelect1" class="bmd-label-floating">Fuseau horaire</label>
                <select class="form-control" id="exampleSelect1">
                    <?php
                    for($gmt = -12 ; $gmt<13; $gmt++) {
                        if($gmt > 0) {
                            $sign = '+';
                        }

                        echo '<option>GMT '.$sign.$gmt.'</option>';
                    }

                    ?>
                </select>
            </div>



            <span class="form-group bmd-form-group">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </span>

        </form>


    </div>
</div>

<script>
    /*
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        alert(3);
    }
    function showPosition(position) {

        console.log(position);

        alert(position);
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
    getLocation();
    */
</script>



