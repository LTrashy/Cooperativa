<?php

class UserModel extends Model implements IModel{
        
        private $id;
        private $idPersona;
        private $createTime;
        private $username;
        private $password;
   
        
        public function __construct(){
            parent::__construct();
            $this->username = '';
            $this->password = '';
            $this->create_time = '';
        }
        
        public function save(){
            try{
                $query = $this->prepare('INSERT INTO 
                                users(id_persona, create_time, username, password) 
                                VALUES(:id_persona, :create_time, :username, :password)');

                $query->execute([
                    'id_persona' => $this->idPersona,
                    'create_time' => $this->createTime,
                    'username' => $this->username,
                    'password' => $this->password,
                ]);

                return true;
            }catch(PDOException $e){
                error_log('UserModel::save->PDOException ' .$e);
                return false;
            }
        }
        public function getAll(){
            $items=[];
            try{
                $query = $this->query('SELECT * FROM users');
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new userModel();
                    $item->setId($p['id']);
                    $item->setIdPersona($p['id_persona']);
                    $item->setCreateTime($p['create_time']);
                    $item->setUsername($p['username']);
                    $item->setPassword($p['password'], false);
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                error_log('UserModel::getAll->PDOException ' .$e);
                return false;
            }
        }
        public function get($id){
            try{
                $query = $this->prepare('SELECT * FROM users WHERE id = :id');
                $query->execute(['id' => $id]);
                
                $user = $query->fetch(PDO::FETCH_ASSOC);
                
                $this->setId($user['id']);
                $this->setIdPersona($user['id_persona']);
                $this->setCreateTime($user['create_time']);
                $this->setUsername($user['username']);
                $this->setPassword($user['password'], false);

                
                
                return $this;
            }catch(PDOException $e){
                error_log('UserModel::get->PDOException ' .$e);
                return false;
            }
        }
        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM users WHERE id = :id');
                $query->execute(['id' => $id]);
                
                return true;
            }catch(PDOException $e){
                error_log('UserModel::delete->PDOException ' .$e);
                return false;
            }
        }
        public function update(){
            try{
                $query = $this->prepare('UPDATE users SET 
                                            id_persona = :id_persona,
                                            create_time = :create_time,
                                            username = :username,
                                            password = :password,
                                        WHERE id = :id');
                $query->execute([
                    'id' => $this->id,
                    'id_persona' => $this->idPersona,
                    'create_time' => $this->createTime,
                    'username' => $this->username,
                    'password' => $this->password,
                ]);
                // var_dump($this->password);
                // die();
                return true;
            }catch(PDOException $e){
                error_log('UserModel::get->PDOException ' .$e);
                return false;
            }
        }

        public function from($array){
            $this->id = $array['id'];
            $this->idPersona = $array['id_persona'];
            $this->createTime = $array['create_time'];
            $this->username = $array['username'];
            $this->password = $array['password'];
        }
        
        public function exists($username){
            try {
                $query = $this->prepare('SELECT username FROM users WHERE username = :username');
                $query->execute(['username' => $username]);
                if ($query->rowCount() > 0){
                    return true;    
                }else{
                    return false;
                }

            } catch (PDOException $e) {
                error_log('UserModel::Exists->PDOException ' .$e);
                return false;
            }
        }

        public function comparePasswords($password, $id){
            try {
                
                $user = $this->get($id);
                return password_verify($password, $user->getPassword());

            } catch (PDOException $e) {
                error_log('UserModel::comparePasswords->PDOException ' .$e);
                return false;
            }
        }
        
        private function getHashedPassword($password){
            return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        }
        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }
        
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;
        
                return $this;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password, $hashed = true)
        {   
                // var_dump($password);
                if($hashed){
                    $this->password = $this->getHashedPassword($password);
                }else{
                    $this->password = $password;
                }

                return $this;
        }
        
        /**
         * Get the value of id persona
         */ 
        public function getIdPersona()
        {
                return $this->idPersona;
        }

        /**
         * Set the value of id persona
         *
         * @return  self
         */ 
        public function setIdPersona($idPersona)
        {
                $this->idPersona = $idPersona;

                return $this;
        }

        /**
         * Get the value of createTIme
         */ 
        public function getCreateTime()
        {
                return $this->createTime;
        }

        /**
         * Set the value of createtime
         *
         * @return  self
         */ 
        public function setCreateTime($createTime)
        {
                $this->createTime = $createTime;

                return $this;
        }


    }
