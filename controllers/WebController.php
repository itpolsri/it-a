<?php
namespace Controllers;
use Models\WebDb;
use Felis\Silvestris\Database;
use Felis\Silvestris\Session;

class WebController { 


    public function handleBuatMatkul(){
        
    }

    // login gagal belum diperbaiki
    public function handleLogin(){
        $username = htmlentities(trim($_POST['username']));
        $password = htmlentities(trim($_POST['password']));
        $loginSebagai = htmlentities(trim($_POST['login_sebagai']));

        $loginResult = WebDb::handleLogin($username,$password, $loginSebagai);

        if(!$loginResult) {
            Session::set("login_gagal","Username atau password salah");
            header("Location: /it-a");
            die();
        }
        Session::set("user_id",$username);
        Session::set("login_sebagai",$loginSebagai);
        header("Location: /it-a/dashboard");
    }




    // handle gagal belum diperbaiki
    public function handleDaftar() {
        $nama = htmlentities(trim($_POST['nama']));
        $daftarSebagai = htmlentities(trim($_POST['daftar_sebagai']));
        $userId = htmlentities(trim($_POST['user_id']));
        $userPassword = htmlentities(trim($_POST['user_password']));
        $noHp = htmlentities(trim($_POST['no_hp']));
        $gender = htmlentities(trim($_POST['gender']));
        $alamat = htmlentities(trim($_POST['alamat']));
        $email = htmlentities(trim($_POST['email']));

        $result = substr($daftarSebagai , 1 );
        $toLower = strtolower($daftarSebagai[0]);
        $daftarSebagai = $toLower . $result;

        try {
            $saveResult = WebDb::handleSaveDaftar(
                    $daftarSebagai,
                    $nama,
                    $userId,
                    $userPassword,
                    $noHp,
                    $email,
                    $alamat,
                    $gender
            );
            header("Location: /it-a/daftar");
        }catch(\PDOException $pEx){
            echo("Pendaftaran gagal");
        }


    }
}


