<?php
//require(__DIR__.'/../bootstrap.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
<?php require(__DIR__.'/fragment/head.php');
?>

</head>

<body>



<div id="wrapper">



    <?php
        require(__DIR__.'/fragment/menu.php');
    ?>



    <div id="page-wrapper">
        <?php require(__DIR__.'/fragment/circleProgress.php'); ?>


            <?php require(__DIR__.'/fragment/component.php'); ?>








            <?php include(__DIR__.'/fragment/button.php'); ?>



            <?php require(__DIR__.'/fragment/navbar.php'); ?>
            <?php require(__DIR__.'/fragment/dialog.php'); ?>

            <?php require(__DIR__.'/fragment/typo.php'); ?>

            <?php require(__DIR__.'/fragment/form.php'); ?>



    </div>


</div>


<!--
<div id="wrapper">


<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="topNavigationBar"></div>
	<div class="navbar-default sidebar" role="navigation"></div>
</nav>


<div id="page-wrapper">
	<div class="row bienvenue-panel-main">
	</div>
</div>
</div>
//-->

</body>

</html>
