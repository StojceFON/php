<?php
include 'models/user.php';
include 'konekcija.php';
if (isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['mail']) && isset($_POST['tip'])) {
    $user = new Users();

    $naziv = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = strtolower($_POST['mail']);
    $tip = $_POST['tip'];


    $user->proveriMejl($mysqli, $naziv, $prezime, $email, $tip);
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
        Dodaj novog igrača
    </title>
</head>
<body>
<?php include("header.php") ?>
<?php include("meni.php") ?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="container-fluid h-100 d-flex justify-content-center">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-6">
                    <form class="form-horizontal" method="POST" action="" style="margin-top: 100px" id="forma">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Ime">Ime</label>
                            <div class="col-md-4">
                                <input id="ime" name="ime" type="text" placeholder="Ime" class="form-control input-md"
                                       minlength="3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="prezime">Prezime</label>
                            <div class="col-md-4">
                                <input id="prezime" name="prezime" type="text" placeholder="Prezime"
                                       class="form-control input-md" minlength="3">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mail">E-mail</label>
                            <div class="col-md-4">
                                <input id="mail" name="mail" type="email" placeholder="Email"
                                       class="form-control input-md">
                                <span id="email_status"></span>
                            </div>
                        </div>


                        <div class="form-group" id="tipkorisnika" style="padding-left: 15px!important;">
                            <label class="col-md-4 control-label" for="tipkorisnika">Pozicija igrača</label>

                            <select class="form-control" name="tip" id="type_user">

                            </select>
                            <br>
                        </div>

                        </br>
                        <div class="form-group">
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-info" onclick="validateForm()">Dodaj novog
                                igrača
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/validacija_forme.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $.get("kontroler.php", {data: "Type_Of_Users"})
        .done(function (data) {

            var podaci = JSON.parse(data);
            var ispis = '<option value="0"> ---- Sve ---- </option>';

            for (var i = 0; i < podaci.length; i++) {
                ispis += '<option value="' + podaci[i].id + '">' + podaci[i].name + '</option>';
            }
            ;
            $('#type_user').html(ispis);
        });
</script>
</body>
