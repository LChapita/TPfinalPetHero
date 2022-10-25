<?php

    namespace DAO;

    use Models\Keeper;

    class userDAO implements IUserDAO {
   
        private $keeperList = array();
        private $fileKeeper = ROOT . "Data/keepers.json";
 

        public function Modify(Keeper $keeper) {
            $this->RetrieveDataKeeper();

            $this->Remove($keeper->getId());

            array_push($this->keeperList, $keeper);

            $this->SaveData();
        }

      
        private function RetrieveDataKeeper()
        {
            $this->userList = array();
    
            if (file_exists($this->fileKeeper)) {
                $jsonToDecode = file_get_contents($this->fileKeeper);
    
                $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
    
                foreach ($contentArray as $content) {
    
                    $user = new User();
                    $user->setEmail($content["email"]);
                    $user->setPassword($content["password"]);
                    $user->setId($content["id"]);
    
    
                    $keeper = new Keeper();
                    $keeper->setKeeper($content["typeuser"]["type"]);
                    $keeper->setId($content["typeuser"]["id"]);
                    $keeper->setName($content["typeuser"]["name"]);
                    $keeper->setLastname($content["typeuser"]["lastname"]);
                    $keeper->setPhoto($content["typeuser"]["photo"]);
                    $keeper->setDni($content["typeuser"]["dni"]);
                    $keeper->setTuition($content["typeuser"]["tuition"]);
                    $keeper->setSex($content["typeuser"]["sex"]);
                    $keeper->setAge($content["typeuser"]["age"]);
    
                    $user->setTypeUserKeeper($keeper);
    
    
                    array_push($this->keeperList, $user);
                }
            }
        }

    
    }
?>