<!Doctype html>
	<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#2e8cc2">
        <title><?= app('app_name'); ?> - Login</title>
        <link rel="icon" href="<?php echo base_url("/views/assets/favicon.ico"); ?>">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url("/views/assets/fonts/font-awesome.min.css"); ?>">
        <link href="<?php echo base_url("/views/assets/css/admin4b.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("/views/assets/css/custom.css"); ?>" rel="stylesheet">

    </head>
    <body>
        <?php
					echo boxAjax();
					echo boxFlash();
				?>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>

        <script src="<?php echo base_url("/views/assets/js/jquery.js"); ?>"></script>
        <script src="<?php echo base_url("/views/assets/js/bootstrap.min.js"); ?>"></script>
        <script>
            var BASE = '<?php echo base_url(); ?>';
        </script>
        <script src="<?php echo base_url("/views/assets/motor_ajax/motor_ajax.js"); ?>"></script>
    </body>
</html>
