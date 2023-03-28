<?php
require_once '../models/User.php';
require '../config.php';

class UserDAOMySql implements UserDAO {
    private $pdo;

    //crio o pdo
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }
    private function generateUser($array) {
        $u = new User();
        $u->id = $array['id'] ?? 0;
        $u->email = $array['email'] ?? '';
        $u->password = $array['password'] ?? '';
        $u->name = $array['name'] ?? '';
       

        return $u;
}


    public function findByEmail($email){
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
        $sql->bindValue(':email',$email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $user = $this->generateUser($data);
            return $user;
        }

        return false;
    }

    public function create(User $u){
        $hash = password_hash($u->senha, PASSWORD_DEFAULT);

        $sql = $this->pdo->prepare('INSERT INTO usuarios (nome_usuario, email, senha) VALUES (:name, :email, :password)');
        $sql->bindValue(':name', $u->nome_usuario);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':password', $hash);
        $sql->execute();
    }
    public function isAdmin() {
        $stmt = $this->pdo->prepare('SELECT is_admin FROM usuarios WHERE id = :id');
        $stmt->bindValue(':id', $_SESSION['user_id']);
        $stmt->execute();
        $user = $stmt->fetch();
    
        return $user['admin'] === '1';
      }



      
        public function validateLogin($email, $senha){
            $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
            $sql->bindValue(':email',$email);
            $sql->execute();
        
            if ($sql->rowCount() > 0) {
                $user = $sql->fetch(PDO::FETCH_ASSOC);
                if(password_verify($senha, $user['senha'])) {
                    return $user;
                }
            }
        
            return false;
        }

        public function findById($id){
            $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
        $sql->bindValue(':id',$id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        return false;
        }

       
        public function listUser(){
            $sql = $this->pdo->prepare('SELECT * FROM usuarios');
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        }
        
        
        
    }
       
        
        



