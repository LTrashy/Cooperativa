<?php

class UserModel extends Model implements IModel{
        
        private $id;
        private $idPersona;
        private $createTime;
        private $username;
        private $password;
        //private $role;
        //private $budget;
        //private $photo;
        //private $name;
        
        public function __construct(){
            parent::__construct();
            $this->username = '';
            $this->password = '';
            // $this->role = '';
            // $this->budget = 0.0;
            // $this->photo = '';
            // $this->name = '';
        }
        
        public function save(){
            try{
                $query = $this->prepare('INSERT INTO 
                                users(username, password, role, budget, photo, name) 
                                VALUES(:username, :password, :role, :budget, :photo, :name)');

                $query->execute([
                    'username' => $this->username,
                    'password' => $this->password,
                    'role' => $this->role,
                    'budget' => $this->budget,
                    'photo' => $this->photo,
                    'name' => $this->name,
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
                                            username = :username,
                                            password = :password,
                                            role = :role,
                                            budget = :budget,
                                            photo = :photo,
                                            name = :name
                                        WHERE id = :id');
                $query->execute([
                    'id' => $this->id,
                    'username' => $this->username,
                    'password' => $this->password,
                    'role' => $this->role,
                    'budget' => $this->budget,
                    'photo' => $this->photo,
                    'name' => $this->name,
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
            $this->username = $array['username'];
            $this->password = $array['password'];
            $this->role = $array['role'];
            $this->budget = $array['budget'];
            $this->photo = $array['photo'];
            $this->name =$array['name'];
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
