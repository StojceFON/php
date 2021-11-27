<?php
include 'konekcija.php';
include 'models/user.php';

$korisnik = Users::returnOne($mysqli, $_GET['mail']);

if (isset($_POST['izmeni'])) {
    if (Users::update($mysqli, $_POST['id'], $_POST['ime'], $_POST['prezime'], strtolower($_POST['mail']), $_POST['tip'])) {
        header("Location: index.php");
    } else {
        echo "<script> alert('Korisnik neuspesno izmenjen.');</script>";
    }
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
        Izmeni postojećeg igraca
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
                            <label class="col-md-4 control-label" for="mail">E-mail igraca</label>
                            <div class="col-md-4">
                                <input id="mail" name="mail" type="email" placeholder="Email"
                                       class="form-control input-md">
                                <span id="email_status"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-info" name="nadji">Pronadji igraca
                                </button>
                            </div>
                        </div>
                    </form>

                    <form class="form-horizontal" method="POST" action="" style="margin-top: 100px;" id="dodavanje">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ID">ID igraca</label>
                            <div class="col-md-4">
                                <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md"
                                       value="<?php echo $korisnik[0]->id; ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Ime">Ime</label>
                            <div class="col-md-4">
                                <input id="ime" name="ime" type="text" placeholder="Ime" class="form-control input-md"
                                       value="<?php echo $korisnik[0]->name; ?>"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="prezime">Prezime</label>
                            <div class="col-md-4">
                                <input id="prezime" name="prezime" type="text" placeholder="Prezime"
                                       class="form-control input-md" value="<?php echo $korisnik[0]->surname; ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mail">E-mail</label>
                            <div class="col-md-4">
                                <input id="mail" name="mail" type="email" placeholder="Email"
                                       class="form-control input-md" value="<?php echo $korisnik[0]->email; ?>">
                                <span id="email_status"></span>
                            </div>
                        </div>


                        <div class="form-group" id="tipkorisnika" style="padding-left: 15px!important;">
                            <label class="col-md-4 control-label" for="tipkorisnika">Pozicija igraca</label>

                            <select class="form-control" name="tip" id="type_user">

                            </select>
                            <br>
                        </div>

                        </br>
                        <div class="form-group">
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-info" name="izmeni">Izmeni igraca
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
            var ispis = '';

            for (var i = 0; i < podaci.length; i++) {
                ispis += '<option value="' + podaci[i].id + '">' + podaci[i].name + '</option>';

            }
            ;
            $('#type_user').html(ispis);
        });


</script>
</body>

