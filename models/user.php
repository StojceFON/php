<?php class Users
{
    public $id = 0;
    public $name = '';
    public $surname = '';
    public $email = '';
    public $type_of_user = 0;

    public static function addNew($mysqli, $naziv, $prezime, $email, $tip)
    {

        $result = $mysqli->query("INSERT INTO users (name, surname, email, type_of_user) VALUES ('$naziv', '$prezime', '$email', '$tip')");

        if ($result > 0)
            return true;
        else
            return false;

    }

    public static function returnOne($mysqli, $email)
    {
        $result = $mysqli->query("SELECT * FROM users u JOIN type_of_users t ON u.type_of_user = t.id_type WHERE email='" . $email . "'");
        $korisnik = array();
        while ($row = $result->fetch_assoc()) {

            $user = new Users();
            $user->id = $row['id'];
            $user->name = $row['name'];
            $user->surname = $row['surname'];
            $user->email = $row['email'];
            array_push($korisnik, $user);
        }
        return $korisnik;
    }

    public static function update($mysqli, $id, $ime, $prezime, $email, $tip)
    {
        $result = $mysqli->query("UPDATE users SET name = '$ime', surname='$prezime', email = '$email', type_of_user='$tip' WHERE id='$id'");
        if ($result > 0)
            return true;
        else
            return false;
    }
    public static function delete($mysqli, $email)
    {
        $result = $mysqli->query("DELETE FROM users WHERE email='$email'");
        return true;
    }
    public static function returnAll($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM users u JOIN type_of_users t ON u.type_of_user = t.id_type");
        $korisnik = array();
        while ($row = $result->fetch_assoc()) {
            $tip = new Type_Of_Users();
            $tip->id = $row['id_type'];
            $tip->name = $row['Name'];

            $user = new Users();
            $user->id = $row['id'];
            $user->name = $row['name'];
            $user->surname = $row['surname'];
            $user->email = $row['email'];
            $user->tip = $tip;
            array_push($korisnik, $user);
        }
        return $korisnik;
    }
    public function proveriMejl($mysqli, $ime, $prezime, $email, $tip)
    {

        $result = $mysqli->query("SELECT * FROM users WHERE email='$email '");
        $korisnici = array();
        while ($row = $result->fetch_assoc()) {
            $korisnik = new Users();
            $korisnik->id = $row['id'];
            $korisnik->name = $row['name'];
            $korisnik->surname = $row['surname'];
            $korisnik->email = $row['email'];
            $korisnik->type_of_user = $row['type_of_user'];
            array_push($korisnici, $korisnik);
        }
        if(count($korisnici)>0){
            echo "<script>alert('Korisnik sa unetim mejlom već postoji u bazi. Pokušajte ponovo.');</script>";
        }

        else{
            $this->addNew($mysqli, $ime, $prezime, $email, $tip);
            echo "<script>alert('Korisnik je uspešno unetu u bazu.');</script>";
            return true;
        }

    }


}