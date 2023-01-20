<?php
include_once 'includes/db.php';

        class Survey extends DB{

            private $totalVotes;
            private $optionSelected;

            public function setOptionSelected($option){
                $this->optionSelected = $option;
            }

            public function getOptionSelected(){
                return $this->optionSelected;
            }

            public function vote(){
                //en :opcion puedes poner ?
                // si no quieres usar :opcion reemplazalo por ? y en el arreglo de abajo borra ":opcion" => y ya
                $query = $this->connect()->prepare('UPDATE lenguajes SET votos = votos + 1 WHERE opcion = :opcion');
                $query->execute([":opcion" => $this->optionSelected]);
            }

            public function showResults(){
                return $this->connect()->query("SELECT * FROM lenguajes ");
            }

            public function getTotalVotes(){
                $query = $this->connect()->query('SELECT SUM(votos) AS votos_totales FROM lenguajes');
                $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->votos_totales;
                return $this->totalVotes;
            }

            public function getPercentageVotes($votes){
                //0 para no decimales
                return round(($votes/ $this->totalVotes)* 100,0);
            }
        }
?>