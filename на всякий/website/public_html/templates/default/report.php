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

</head>
<body>
<a href="/">123</a>
<script>
    webix.ready(function(){
        const sheet_data = {
            "styles": [
                ["wss1",";;left;;;;;;;;;"],
            ],
            "sizes": [
                [0,185,185],
            ],
            "data": [
                [1,1,"Report - July 2016 12312312312312312312312312312312312312321","wss1", "string"],
                [2,1,"ogon","string"],
            ],
            "spans": [
                [1,1,3,1]
            ]
        };

        webix.ui({

            view:"spreadsheet", url:"some_data_link", toolbar:"full", data: 'binary->'
        });
    });
</script>
</body>
</html>
