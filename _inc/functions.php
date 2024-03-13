<?php
/**
 * Generuje navigačné menu zadaného zoznamu stránok a ich URL adries
 *
 * Táto funkcia prijíma zoznam stránok a príslušných URL adries vo forme asociatívneho poľa
 * a generuje navigačné menu vo forme HTML zoznamu. Každá položka menu je reprezentovaná ako
 * odkaz na príslušnú stránku s príslušným názvom.
 *
 * @param array $pages Asociatívne pole stránok a ich URL adries
 * @return string HTML kód pre navigačné menu
 */
function generate_menu(array $pages){
    $menuItems = ''; 
    // Prechádza všetky položky v zadanom zozname stránok a URL adries
    foreach($pages as $page_name => $page_url){
        // Pre každú stránku pridá odkaz do navigačného menu
        $menuItems .= '<li><a href="' . $page_url . '">' . $page_name . '</a></li>';
    }

    // Vráti vygenerovaný HTML kód pre navigačné menu
    return $menuItems;
}
/**
 * Generuje odkazy na CSS súbory pre hlavičku stránky
 *
 * Táto funkcia generuje odkazy na základné CSS súbory a pridáva odkazy na špecifické
 * CSS súbory podľa názvu aktuálnej stránky. Odkazy sú vložené priamo do hlavičky HTML.
 *
 * @return void
 */
function add_stylesheets(){
    echo '<link rel="stylesheet" href="css/style.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
    $page_name = basename($_SERVER["SCRIPT_NAME"],'.php');
    switch($page_name){
        case 'index':
            echo '<link rel="stylesheet" href="css/slider.css">';
            break;
        case 'portfolio':
            echo '<link rel="stylesheet" href="css/portfolio.css">';
            echo '<link rel="stylesheet" href="css/banner.css">';
            break;
        case 'kontakt':
            echo '<link rel="stylesheet" href="css/banner.css">';
            echo '<link rel="stylesheet" href="css/form.css">';
            break;
        case 'qna':
            echo '<link rel="stylesheet" href="css/accordion.css">';
            echo '<link rel="stylesheet" href="css/banner.css">';
            break;
    }
}
/**
 * Generuje odkazy na JS súbory pre pätu stránky
 *
 * Táto funkcia generuje odkazy na základné JS súbory a pridáva odkazy na špecifické
 * JS súbory podľa názvu aktuálnej stránky. Odkazy sú vložené na koniec body tagu.
 *
 * @return void
 */

function add_scripts(){
    echo('<script src="js/menu.js"></script>');
    $page_name = basename($_SERVER["SCRIPT_NAME"],'.php');
    switch($page_name){
    case 'index':
        echo('<script src="js/slider.js"></script>');
        break;
    case 'qna':
        echo('<script src="js/accordion.js"></script>');
        break;  
    }
}
function generate_qna(array $qna){
    foreach($qna as $question=>$answer){
        echo('<div class="accordion">');
        echo('<div class="question">'.$question.'</div>');
        echo('<div class="answer">'.$answer.'</div>');
        echo('</div>');
    }
}

?>