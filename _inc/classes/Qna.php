<?php

    class Qna extends Database{
        private $db;

        public function __construct(){
            $this->db = $this->connect();        
        }

        public function select(){
            try{
                $query =  $this->db->query("SELECT * FROM qna");
                $qna = $query->fetchAll();
                return $qna;
              }catch(PDOException $e){
                echo($e->getMessage());
            }   
        }

    }

?>