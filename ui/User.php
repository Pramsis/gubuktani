<?php

    class User
    {

        private $db;
        private $error;

        function __construct($db_conn)
        {
            $this->db = $db_conn;

            session_start();
        }

        public function login($email, $password)
        {
            try
            {
                $query = $this->db->prepare("SELECT * FROM tb_user WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $data = $query->fetch();

                if($query->rowCount() > 0){
                    if(password_verify($password, $data['password'])){
                        $_SESSION['user_session'] = $data['id_user'];
                        return true;
                    }else{
                        $this->error = "Email atau Password Salah";
                        return false;
                    }
                }else{
                    $this->error = "Email atau Password Salah";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_session']))
            {
                return true;
            }
        }

        public function getUser(){
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                $query = $this->db->prepare("SELECT * FROM tb_user WHERE id_user = :id_user");
                $query->bindParam(":id_user", $_SESSION['user_session']);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function logout(){
            session_destroy();
            unset($_SESSION['user_session']);
            return true;
        }

        public function getLastError(){
            return $this->error;
        }
    }

?>
