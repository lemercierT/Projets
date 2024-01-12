<?php
    class RecupAPI{
        private $_json_file;
        protected $_array_json;
        protected $_sqlPDO;

        public function __construct($json_file){
            $this->_sqlPDO = new ConnexionPDO();
            $this->_json_file = file_get_contents($json_file);
            $this->_array_json = json_decode($this->_json_file, true);

        }
        public function setJsonFile($json_file){
            $this->_json_file = $json_file;
        }
        public function getJsonFile(){
            return $this->_json_file;
        }

        public function recupInfos(){
            $label = "";
            $nom = "";
            $prenom = ''; 
            $id = 0;
            $array_req = [];
            $regex = "/[0-9]/";
            foreach ($this->_array_json as $publication) {
                foreach($publication["PublicationDetail"] as $data_publication) {
                    if($data_publication["Nature"] == "Personne physique") {
                        $nom = $data_publication["Nom"];
                        $nom = str_replace("'", "", $nom);
                        $array_date = [];
            
                        foreach($data_publication["RegistreDetail"] as $registre_detail) {
                            if ($registre_detail["TypeChamp"] === "PRENOM") {
                                $array = $registre_detail["Valeur"][0];
                                $prenom = $array["Prenom"];
                                $prenom = str_replace("'", "", $prenom); 
                            }
                            
                            if ($registre_detail["TypeChamp"] === "FONDEMENT_JURIDIQUE") {
                                $fondement_juridique = $registre_detail["Valeur"][0];
                                $label = $fondement_juridique["FondementJuridiqueLabel"];
                                $label = str_replace("'", "", $label); 
                            }
            
                            if($registre_detail["TypeChamp"] === "DATE_DE_NAISSANCE") {
                                $dates_naissance = $registre_detail["Valeur"];
                                foreach($dates_naissance as $date_naissance) {
                                    $jour = $date_naissance["Jour"];
                                    if(!preg_match($regex, $jour)) $jour = "00";
                                    $mois = $date_naissance["Mois"];
                                    if(!preg_match($regex, $mois)) $mois = "00";
                                    $annee = $date_naissance["Annee"];
                                    if(!preg_match($regex, $annee)) $annee = "0000";
                                    $date = $annee."-".$mois."-".$jour;
                                    $requete = "INSERT INTO data_api VALUES(:id, :nom, :prenom, :date, :label)";
                                    $params = array(":id" => $id, ":nom" => $nom, ":prenom" => $prenom, ":date" => $date, ":label" => $label);
                                    $this->_sqlPDO->execSQLParam($requete, $params);
                                    $id++;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>