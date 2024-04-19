<?php

    class Portfolio extends Database{
        
        private $db;

        public function __construct(){
            $this->db = $this->connect();  
        }
        
        public function select(){
            try{
                $query =  $this->db->query("SELECT * FROM portfolio");
                $portfolio= $query->fetchAll();
                return $portfolio;
            }catch(PDOException $e){
                echo($e->getMessage());
            } 
        }        
        
        function get_portfolio(){
            $portfolio = $this->select();
            $result = '';
            for ($i = 0; $i < count($portfolio); $i++) {
                $temp_i = $i + 1;
                if ($temp_i % 4 == 1) {
                    $result.= '<div class="row">';
                }
    
                $result.= '<div class="col-25 portfolio text-white text-center" style="background-image: url(\''.$portfolio[$i]->image.'\');">';
                $result.= '<a href="">'.$portfolio[$i]->name.'</a>';
                $result.= '</div>';
    
                if ($temp_i % 4 == 0 || $temp_i == count($portfolio)) {
                    $result.= '</div>'; // Close row after every four items or at the end
                }
            }
            return $result;
        }

        public function select_single(){
            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                try{
                    $query = $this->db->prepare("SELECT * FROM portfolio WHERE id = ?");
                    $query->execute([$id]);
                    $portfolio = $query->fetch(); // Using fetch() as we expect only one row
                    if($portfolio) {
                        return $portfolio;
                    } else {
                        // If no portfolio item found with the given ID
                        header("HTTP/1.0 404 Not Found");
                        header("Location: 404.php");
                        die();
                    }
                } catch(PDOException $e){
                    echo($e->getMessage());
                } 
            } else {
                // If ID is not set or not valid
                header("HTTP/1.0 400 Bad Request");
                header("Location: 400.php");
                die();
            }
        }

        }

?>