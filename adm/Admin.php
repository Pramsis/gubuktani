<?php

    class Admin
    {

        private $db;
        private $error;

        function __construct($db_conn)
        {
            $this->db = $db_conn;


            session_start();
        }

        public function login($username, $password)
        {
            try
            {

                $query = $this->db->prepare("SELECT * FROM tb_admin WHERE username = :username");
                $query->bindParam(":username", $username);
                $query->execute();
                $data = $query->fetch();

                // Jika jumlah baris > 0
                if($query->rowCount() > 0){
                    // jika password yang dimasukkan sesuai dengan yg ada di database
                    if(password_verify($password, $data['password'])){
                        $_SESSION['adm_session'] = $data['id_admin'];
                        return true;
                    }else{
                        $this->error = "Username atau Password Salah";
                        return false;
                    }
                }else{
                    $this->error = "Username atau Password Salah";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function isLoggedIn(){
            // Apakah user_session sudah ada di session
            if(isset($_SESSION['adm_session']))
            {
                return true;
            }
        }

        public function getAdmin(){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                $query = $this->db->prepare("SELECT * FROM tb_admin WHERE id_admin = :id_admin");
                $query->bindParam(":id_admin", $_SESSION['adm_session']);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function logout(){
            // Hapus session
            session_destroy();
            unset($_SESSION['adm_session']);
            return true;
        }


        public function getLastError(){
            return $this->error;
        }
    }

?>
