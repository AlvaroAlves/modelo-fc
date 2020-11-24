<?php
include __DIR__. './Config.php';
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>teste</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB' crossorigin='anonymous' />
        <link href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' rel='stylesheet' integrity='sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt' crossorigin='anonymous' />
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js' integrity='sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T' crossorigin='anonymous'></script>
        <style>
            :root {
            --azulescuro: #004768;
            --branco: #ffffff;
            }
            @import url('https://fonts.googleapis.com/css2?family=Signika&display=swap');
            body{
                margin: 0;
                background-color: #dcdcdc;
                font-family: 'Signika', sans-serif;
            }
            .painel{
                margin-top: 90px;
            }

            .card-medico{
                margin: 20px 0;
                background-color: var(--branco);
                padding: 10px;
            }

            .card-medico h5{
                font-weight: bold;
                color: var(--azulescuro);
            }
            .card-medico button{
                margin: 5px;
                height: 20px;
                padding: 2px;
                font-size: 10px;
            }
        </style>
    </header>
    <body>
        
        <nav class="navbar fixed-top navbar-dark bg-primary">
            <div class="container">    
                <div class="col-12">
                    <button type="button" class="btn btn-outline-primary float-right bg-light">Cadastro de médico</button>
                </div>
            </div>
        </nav>

        <div class="container">
            <?php

            $request = $_SERVER['REQUEST_URI'];
            
            switch ($request) {
                case URL.'/' :
                    require __DIR__ . '/controller/MedicoController.php';
                    $controller = new MedicoController();
                    $controller->listar();
                    break;
                case '' :
                    require __DIR__ . '/views/index.php';
                    break;
                case '/about' :
                    require __DIR__ . '/views/about.php';
                    break;
                default:
                    require __DIR__ . '/controller/MedicoController.php';
                    $controller = new MedicoController();
                    $controller->listar();
                    break;
            }
            ?>
        </div>
    </body>
</html>