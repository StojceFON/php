<?php
include 'konekcija.php';
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
        Prikaz igrača po poziciji
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

                        <div class="form-group" id="tipkorisnika" style="padding-left: 15px!important;">
                            <label class="col-md-4 control-label" for="tipkorisnika">Pozicija igrača</label>

                            <select class="form-control" name="tip" id="type_user" onchange="pretraga()">

                            </select>
                            <br>
                        </div>

                        </br>

                    </form>
                    <div id="tabela">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
<script>
    function pretraga() {

        $.get("kontroler.php", {data: "korisnik"})
            .done(function (data) {
                $('#tabela').html("");
                var idTipa = $("#type_user").val();
                var podaci = JSON.parse(data);
                var ispis = '<table class="table table-hover text-left"><thead><tr class="text-left"><th>ID</th> <th>Ime</th> <th>Prezime</th> <th>Email</th><th>Tip</th></tr></thead><tbody> ';

                for (var i = 0; i < podaci.length; i++) {
                    if (idTipa == podaci[i].tip.id || idTipa == 0) {
                        ispis += '<tr>';
                        ispis += '<td>' + podaci[i].id + '</td>';
                        ispis += '<td>' + podaci[i].name + '</td>';
                        ispis += '<td>' + podaci[i].surname + '</td>';
                        ispis += '<td>' + podaci[i].email + '</td>';
                        ispis += '<td>' + podaci[i].tip.name + '</td>';
                        ispis += '</tr>';
                    }

                }
                ;
                ispis += '</tbody></table>';
                $('#tabela').html(ispis);
            });
    }


</script>


</body>
