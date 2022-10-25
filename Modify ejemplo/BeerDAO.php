<?php

    namespace DAO;

    use Models\Beer;

    class BeerDAO implements IBeerDAO {
        private $fileName = ROOT . "/Data/beers.json";
        private $beerList = array();

   
        public function Modify(Beer $modBeer) {
            $this->RetrieveData();

            $this->beerList = array_filter($this->beerList, function($beer) use($modBeer) {
                return $beer->getId() != $modBeer->getId();
            });

            array_push($this->beerList, $modBeer);

            $this->SaveData();
        }

        private function RetrieveData() {
            $this->beerList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $beer = new Beer();
                    $beer->setId($value["id"]);
                    $beer->setCode($value["code"]);
                    $beer->setDescription($value["description"]);
                    $beer->setDensity($value["density"]);
                    $beer->setPrice($value["price"]);

                    $beerTypeDAO = new BeerTypeDAO();
                    $beerType = $beerTypeDAO->Exist($value["beerType"]);
                    $beer->setBeerType($beerType);

                    array_push($this->beerList, $beer);
                }
            }
        }

     
    }
?>