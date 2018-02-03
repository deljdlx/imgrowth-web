
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Elbiniou-dashboard</title>



<script src="vendor/jquery.js"></script>






<link href="vendor/material-icon/material-icon.css" rel="stylesheet">
<link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="vendor/MaterialDesign-Webfont/css/materialdesignicons.min.css" rel="stylesheet">



<!-- Bootstrap Core -->

<link href="./vendor/bootstrap-pack/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="./vendor/bootstrap-pack/bootstrap/dist/js/bootstrap.min.js"></script>





<!--Menu -->
<link href="./vendor/bootstrap-pack/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<script src="./vendor/bootstrap-pack/metisMenu/dist/metisMenu.min.js"></script>


<!-- Timeline CSS -->
<link href="./vendor/bootstrap-pack/sb-admin/dist/css/timeline.css" rel="stylesheet">




<!-- Custom CSS -->


<link href="./vendor/bootstrap-pack/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">


<!--
<script src="./vendor/bootstrap-pack/sb-admin/dist/js/sb-admin-2.js"></script>
//-->








<!-- Bootstrap Material Design -->
<link href="vendor/bootstrap-pack/bootstrap-material-design/dist/css/bootstrap-material-design.css" rel="stylesheet">
<link href="vendor/bootstrap-pack/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">


<script src="vendor/snackbarjs/dist/snackbar.min.js"></script>
<link href="vendor/snackbarjs/dist/snackbar.min.css" rel="stylesheet">

<script src="vendor/bootstrap-pack/bootstrap-material-design/dist/js/ripples.min.js"></script>
<script src="vendor/bootstrap-pack/bootstrap-material-design/dist/js/material.min.js"></script>

<script src="vendor/jquery.nouislider.min.js"></script>




<!--social button//-->
<link href="./vendor/bootstrap-pack/bootstrap-social/bootstrap-social.css" rel="stylesheet">





<!--
<script src="https://rawgit.com/kottenator/jquery-circle-progress/1.1.3/dist/circle-progress.js"></script>
//-->




<script src="vendor/khi/Khi.js"></script>
<script src="vendor/khi/Request.js"></script>
<script src="vendor/khi/Router.js"></script>
<script src="vendor/khi/RouterRule.js"></script>




<script src="source/helper/function.js"></script>
<script src="source/class/Bienvenue.js"></script>
<script src="source/class/Component.js"></script>
<script src="source/class/Workspace/Workspace.js"></script>
<script src="source/class/Module.js"></script>
<script src="source/class/ModuleLoader.js"></script>



<script src="source/class/Workspace/LeftNavigationBar/LeftNavigationBar.js"></script>
<script src="source/class/Workspace/TopNavigationBar/TopNavigationBar.js"></script>
<link rel="stylesheet" href="vendor/jstree/dist/themes/default/style.min.css" />
<script src="vendor/jstree/dist/jstree.min.js"></script>
<link rel="stylesheet" href="source/class/Component/Ripple/ripple.css"/>
<script src="source/class/Component/Ripple/Ripple.Js"></script>
<link rel="stylesheet" href="source/class/Component/Tree/css/jstree-fontawesome.css"/>
<script src="source/class/Component/Tree/Tree.js"></script>




<!--
<script src="vendor/echarts.min.js"></script>
//-->




<!-- include summernote css/js-->
<!--<link href="vendor/summernote/dist/summernote.css" rel="stylesheet"/>//-->
<!--<script src="vendor/summernote/dist/summernote.js"></script>//-->


<script>



     $(function() {
     var workspace=new Bienvenue.Workspace();
     workspace.run();

     });

     /*
     var router=new Khi.Router();

     router.addRule('moduleLoader', function(request) {
     if(request.url.match(/#module=.+/)) {
     return true;
     }
     }, function(request) {
     var moduleName=request.anchorParameters.module;
     workspace.loadModule(moduleName)
     })
     router.run();

     */
</script>










<link rel="stylesheet" href="source/css/workspace.css"



