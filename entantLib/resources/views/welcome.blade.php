<!DOCTYPE html>
<html>
    <head>
        <title>Entants</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ asset('\css\bootstrap.min.css') }}" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Учет абитуриентов</h1>
                <div class="row mt-3">
                    <div class="col-4"></div>
                    <a href="{{ route('start') }}"><button class="btn btn-primary btn-rounded btn-lg mt-5">Начать</button></a>
                </div>
            </div>
            
        </div>
    </body>
</html>
