<?php

class Login{

    private $db_connection = null;
    public $errors = array();
    public $messages = array();

    public function __construct(){
        session_start();
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    private function dologinWithPostData(){
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Nombre de usuario esta vacio.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "El campo contraseña esta vacio.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
            if (!$this->db_connection->connect_errno) {
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);
                $sql = "SELECT user_id,lastname ,firstname ,user_name, user_password_hash,user_king,user_status
                        FROM users    
                        WHERE user_name = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);
                    if ($result_of_login_check->num_rows == 1) {
                        $result_row = $result_of_login_check->fetch_object();
                        if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {
                            if ($result_row->user_status=="Deshabilitado"){
                                $this->errors[] = "Usuario Deshabilitado, pongase en contacto con el Administrador del Sistema.";
                            }else{
                            $_SESSION['user_id'] = $result_row->user_id;
    						$_SESSION['user_name'] = $result_row->user_name;
                            $_SESSION['user_login_status'] = 1;
                            $_SESSION['user_king'] = $result_row->user_king;
                            }
                        } else {
                            $this->errors[] = "La contraseña no es correcta.";
                        }
                    } else {
                        $this->errors[] = "El nombre de usuario no es correcto.";
                    }
                
            } else {
                $this->errors[] = "Problema de conexión con la base de datos.";
            }
        }
    }


    public function doLogout(){
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "Ha cerrado sesión.";
    }


    public function isUserLoggedIn(){
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        return false;
    }
}