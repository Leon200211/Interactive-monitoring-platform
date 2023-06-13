<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>СтройКонтроль</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?=SITE_URL?>templates/default/assets/imgs/favicon-32x32.422fe5d794a2.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/c3/c3.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/owl.carousel/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/node_modules/owl.carousel/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/dist/css/theme.min.css">
    <script src="<?=SITE_URL?>templates/default/assets/src/js/vendor/modernizr-2.8.3.min.js"></script>

    <script src="<?=SITE_URL?>templates/default/assets/webix/codebase/webix.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/webix/codebase/webix.css" type="text/css">

    <script type="text/javascript" src="<?=SITE_URL?>templates/default/assets/webix/spreadsheet/codebase/spreadsheet.js"></script>
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/webix/spreadsheet/codebase/spreadsheet.css" type="text/css">
    <a href="/projects" class="close-widget">❌</a>

</head>
<body>



<?php
require_once "include/header.php";
?>



<style>
    .close-widget{
        text-decoration: none;
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1000;
        font-size: 30px;
        transition: transform .5s ease-in-out;
    }
    .close-widget:hover{
        transform: rotate(90deg);
    }
</style>
<script>

    console.log("binary-><?=SITE_URL?>/files/report/<?=$this->report_file?>")

    webix.ready(function(){

        webix.ui({

            view:"spreadsheet",
            url:"binary-><?=SITE_URL?>/files/report/<?=$this->report_file?>",
            toolbar:"full",
            datatype: 'excel',
        });
    });
</script>
</body>
</html>
