<?php
include 'models/Type_Of_Users.php';
include 'models/user.php';
include 'konekcija.php';

if (isset($_GET['data']) && $_GET['data'] == 'Type_Of_Users') {
    echo json_encode(Type_Of_Users::returnAll($mysqli));
}
if(isset($_GET['data']) && $_GET['data']=='korisnik')
{
    echo json_encode(Users::returnAll($mysqli));
}




