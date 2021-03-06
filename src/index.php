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
        <link type="text/css" href='model/css/style.css' rel="stylesheet"></link>
    </header>
    <body>
        
        <nav class="navbar fixed-top navbar-dark bg-primary">
            <div class="container">    
                <div class="col-12">
                    <button type="button" class="btn btn-outline-primary float-right bg-light" id="cadastramedico">Cadastro de médico</button>
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
                case  URL.'/cadastromedico' :
                    require __DIR__ . '/controller/MedicoController.php';
                    $controller = new MedicoController();
                    $controller->criar();
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
    <script type="text/javascript">
        $('#cadastramedico').click(function() {
            window.location.href = '<?= URL ?>/cadastromedico';
            return false;
        });
    </script>
</html>