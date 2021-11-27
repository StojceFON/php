<?php
include 'konekcija.php';
include 'models/user.php';

if (isset($_GET['mail'])) {
    $korisnik = Users::delete($mysqli, $_GET['mail']);

    header("Location:index.php");
}

?>
<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery.min.js"></script>
<html>
<head>
    <title>
        Obriši postojećeg igrača
    </title>
</head>
<body>
<?php include("header.php") ?>
<?php include("meni.php") ?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="container-fluid h-100 d-flex justify-content-center">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-6"><br><br><br><br><br>
                    <form class="form-horizontal" method="get">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mail">E-mail igrača</label>
                            <div class="col-md-4">
                                <input id="mail" name="mail" type="email" placeholder="Email"
                                       class="form-control input-md">
                                <span id="email_status"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-info" name="obrisi">Obriši igrača
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>

