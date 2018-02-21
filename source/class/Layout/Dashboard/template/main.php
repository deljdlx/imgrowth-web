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

<?php
$this->fragment('/template/__javascript.php');

?>


</body>
</html>
