<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Отчёт</title>

    <script src="<?=SITE_URL?>templates/default/assets/webix/codebase/webix.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/webix/codebase/webix.css" type="text/css">

    <script type="text/javascript" src="<?=SITE_URL?>templates/default/assets/webix/spreadsheet/codebase/spreadsheet.js"></script>
    <link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/webix/spreadsheet/codebase/spreadsheet.css" type="text/css">
    <a href="/" class="close-widget">❌</a>

</head>
<body>
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
    webix.ready(function(){

        webix.ui({

            view:"spreadsheet",
            url:"binary-><?=SITE_URL?>/test/test.xlsx",
            toolbar:"full",
            datatype: 'excel',
        });
    });
</script>
</body>
</html>
