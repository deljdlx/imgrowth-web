


<script src="vendor/exif-js/exif.js" type="text/javascript"></script>






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

<script src="javascript/class/Photo.js" type="text/javascript"></script>

<script src="javascript/bootstrap.js" type="text/javascript"></script>




<script>


    var myInput = document.getElementById('myFileInput');
    myInput.addEventListener('change', function() {


        var file = myInput.files[0];


        var test = new ImGrowth.Photo({
            onSelection: function(image) {
                $('#imagePreview').append(image);
            }
        });
        test.send('index.php/photo/post', 'photo', file);


        //test.



        //readFile(file);

    }, false);
</script>



<script type="text/javascript">

</script>