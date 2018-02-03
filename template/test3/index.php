<!doctype html>
<html lang="en">
<head>

    <?php include(__DIR__ . '/fragment/head.php'); ?>


</head>

<body class="index-page">









<!-- Navbar
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="http://www.creative-tim.com">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="vendor/x_material_kit_free_v1.1.1/assets/img/logo.png" alt="Creative Tim Logo" rel="tooltip" title="<b>Material Kit</b> was Designed & Coded with care by the staff from <b>Creative Tim</b>" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">
	                    Creative Tim
	                </div>


				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="components-documentation.html" target="_blank">
						<i class="material-icons">dashboard</i> Components
					</a>
				</li>
				<li>
					<a href="http://demos.creative-tim.com/material-kit-pro/presentation.html?ref=utp-freebie" target="_blank">
						<i class="material-icons">unarchive</i> Upgrade to PRO
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-instagram"></i>
					</a>
				</li>

	    	</ul>
	    </div>
	</div>
</nav>
 End Navbar -->

<div class="wrapper">


    <header>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <h1>Title H1</h1>
                </div>
            </div>
    </header>





    <div class="row">
        <div class="col-md-4">
            <db-card-flipping></db-card-flipping>
        </div>
        <div class="col-md-4">
            <db-card-flipping header-image="http://lorempixel.com/850/280/nature/1/" image="http://lorempixel.com/300/300/city/1/"></db-card-flipping>
        </div>
        <div class="col-md-4">
            <db-card-flipping header-image="http://lorempixel.com/850/280/nature/5/" image="http://lorempixel.com/300/300/city/2/"></db-card-flipping>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <db-card-rounded header-image="http://lorempixel.com/850/280/nature/3/" title="RoundedImage Card" subtitle="Description" footer="Here the footer"></db-card-rounded>
        </div>
        <div class="col-md-4">
            <db-card-rounded header-image="http://lorempixel.com/850/280/nature/6"></db-card-rounded>
        </div>
        <div class="col-md-4">
            <db-card-rounded></db-card-rounded>
        </div>
    </div>



    <?php include(__DIR__.'/fragment/card/test.php'); ?>



    <?php include(__DIR__.'/fragment/card/accordion.php'); ?>



    <div class="" style="background-color:#FFF">
        <div class="section section-basic">








            <div class="container">


                <?php require(__DIR__ . '/fragment/notification.php'); ?>

                <?php require(__DIR__ . '/fragment/circleProgress.php'); ?>




                <div id="buttons">
                    <?php require(__DIR__ . '/fragment/button.php'); ?>
                </div>

                <div id="inputs">
                    <?php require(__DIR__ . '/fragment/form.php'); ?>
                </div>

                <div class="space-70"></div>
            </div>


            <div class="col-sm-3">
                <div class="title">
                    <h3>Sliders</h3>
                </div>

                <div id="sliderRegular" class="slider"></div>
                <div id="sliderDouble" class="slider slider-info"></div>
            </div>


            <div class="section section-navbars">
                <?php require(__DIR__ . '/fragment/navbar.php'); ?>
            </div>
            <!-- End .section-navbars  -->

            <div class="section section-tabs">
                <?php require(__DIR__ . '/fragment/tab.php'); ?>
            </div>
            <!-- End Section Tabs -->



            <?php include(__DIR__.'/fragment/progressBar.php'); ?>




            <?php include(__DIR__.'/fragment/pagination.php'); ?>


            <?php include(__DIR__.'/fragment/typographie.php');?>
            <?php include(__DIR__.'/fragment/image.php');?>

            <?php include(__DIR__.'/fragment/label.php');?>











            <div class="section" id="javascriptComponents">
                <div class="container">
                    <div class="title">
                        <h2>Javascript components</h2>
                    </div>

                    <div class="row" id="modals">
                        <div class="col-md-6">
                            <div class="title">
                                <h3>Modal</h3>
                            </div>

                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Launch demo modal
                            </button>
                        </div>
                        <div class="col-md-6">
                            <div class="title">
                                <h3>Popovers</h3>
                            </div>

                            <button type="button" class="btn btn-default" data-toggle="popover" data-placement="left"
                                    title="Popover on left"
                                    data-content="Here will be some very useful information about his popover.<br> Here will be some very useful information about his popover."
                                    data-container="body">On left
                            </button>

                            <button type="button" class="btn btn-default" data-toggle="popover" data-placement="top"
                                    title="Popover on top"
                                    data-content="Here will be some very useful information about his popover."
                                    data-container="body">On top
                            </button>

                            <button type="button" class="btn btn-default" data-toggle="popover" data-placement="bottom"
                                    title="Popover on bottom"
                                    data-content="Here will be some very useful information about his popover."
                                    data-container="body">On bottom
                            </button>

                            <button type="button" class="btn btn-default" data-toggle="popover" data-placement="right"
                                    title="Popover on right"
                                    data-content="Here will be some very useful information about his popover."
                                    data-container="body">On right
                            </button>

                        </div>
                        <br/><br/>

                        <div class="col-md-6">
                            <div class="title">
                                <h3>Datepicker</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-static">
                                        <label class="control-label">Datepicker</label>
                                        <input type="text" class="datepicker form-control" value="03/12/2016"/>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="title">
                                <h3>Tooltips</h3>
                            </div>

                            <button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip"
                                    data-placement="left" title="Tooltip on left" data-container="body">On left
                            </button>

                            <button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip"
                                    data-placement="top" title="Tooltip on top" data-container="body">On top
                            </button>

                            <button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip"
                                    data-placement="bottom" title="Tooltip on bottom" data-container="body">On bottom
                            </button>

                            <button type="button" class="btn btn-default btn-tooltip" data-toggle="tooltip"
                                    data-placement="right" title="Tooltip on right" data-container="body">On right
                            </button>

                            <div class="clearfix"></div>
                            <br><br>
                        </div>

                        <div class="title">
                            <h3>Carousel</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section" id="carousel">
                <?php include(__DIR__ . '/fragment/carrousel.php'); ?>
            </div>


            <div class="section section-full-screen section-signup"
                 style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <?php include(__DIR__ . '/fragment/form2.php'); ?>

                        </div>
                    </div>
                </div>
            </div>






        </div>


    </div>

    <!-- Sart Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <?php include(__DIR__ . '/fragment/dialog.php'); ?>
    </div>
    <!--  End Modal -->


    <!--   Core JS Files   -->
    <script src="vendor/x_material_kit_free_v1.1.1/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="vendor/x_material_kit_free_v1.1.1/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="vendor/x_material_kit_free_v1.1.1/assets/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->

    <script src="vendor/x_material_kit_free_v1.1.1/assets/js/nouislider.min.js" type="text/javascript"></script>


    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="vendor/x_material_kit_free_v1.1.1/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->


    <script src="vendor/x_material_kit_free_v1.1.1/assets/js/material-kit.js" type="text/javascript"></script>


    <script type="text/javascript">

        $().ready(function () {

            // the body of this function is in assets/material-kit.js

            materialKit.initSliders();

        });


    </script>


</body>

</html>
