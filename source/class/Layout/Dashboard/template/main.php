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




<?php

if($this->activePanel == 'information') {
    $this->fragment('/template/panel/information.php');
}
else if($this->activePanel == 'photo') {
    $this->fragment('/template/panel/photo.php');
}
else if($this->activePanel == 'graph') {
    $this->fragment('/template/panel/graph.php');
}
else if($this->activePanel == 'action') {
    $this->fragment('/template/panel/action.php');
}
else if($this->activePanel == 'configuration') {
    $this->fragment('/template/panel/configuration.php');
}
?>
</div>

<!-- Sart Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body">

            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple">Nice Button</button>
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
            </div>
            //-->
        </div>
    </div>
</div>
<!--  End Modal -->

<?php
$this->fragment('/template/__javascript.php');

?>


</body>
</html>
