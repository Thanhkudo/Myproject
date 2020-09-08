<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1,">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/form.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="assets/js/jquery1.min.js"></script>
    <!-- start menu -->
    <link href="asets/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="assets/js/megamenu.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <!--start slider -->
    <link rel="stylesheet" href="asets/css/fwslider.css" media="all">
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/css3-mediaqueries.js"></script>
    <script src="assets/js/fwslider.js"></script>
    <!--end slider -->
    <script src="assets/js/jquery.easydropdown.js"></script>
    <title>Kudo Shop | </title>
</head>
<body>
<?php require_once 'views/layouts/header.php'?>

<?php require_once 'views/layouts/slideshow.php'?>

<div class="main">
    <div class="wrap">
        <?php echo $this->content?>
    </div>
</div>

<?php require_once 'views/layouts/footer.php'?>

</body>
</html>
