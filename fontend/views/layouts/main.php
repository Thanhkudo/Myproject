<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kudo Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/imagehover.css">
    <link rel="stylesheet" type="text/css" href="assets/css/myweb.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">

    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>
<div class="container">
    <?php require_once'views/layouts/header.php';?>
    <?php require_once'views/layouts/menu.php';?>

    <section class="content">
        <div class="container">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($this->error)): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $this->error;
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php echo $this->content;?>

    <?php require_once'views/layouts/partner.php';?>
    <?php require_once'views/layouts/footer.php';?>

</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js" ></script>
<script src="assets/sliderengine/amazingslider.js"></script>

<script src="assets/sliderengine/initslider-1.js"></script>
<script src="assets/js/css3-mediaqueries.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>
