<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Programação para Internet</title>
        <link href="<?php echo \Classes\URL::base("app/public/css/bootstrap.min.css")?>" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/slim">Hospital</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/slim">Home</a></li>
                        <li><a href="patient/add">Paciente</a></li>
                        <li><a href="medic/add">Medico</a></li>
                        <li><a href="consultation/add"> Consulta</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <?php echo $yield; ?>
        </div>
        <script src="<?php echo \Classes\URL::base("app/public/js/jquery-1.11.1.min.js"); ?>"></script>
        <script src="<?php echo \Classes\URL::base("app/public/js/bootstrap.min.js");?>"></script>
    </body>
</html>