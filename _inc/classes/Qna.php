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

        public function delete(){
            try{
                $data = array(
                    'qna_id' => $_POST['delete_qna']
                );
                $query = "DELETE FROM qna WHERE id = :qna_id";
                $query_run = $this->db->prepare($query);
                $query_run->execute($data);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

    }

?>