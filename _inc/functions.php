
<?php
require('config.php');

function generate_slides(array $headings, string $img_folder) {
    echo('<section class="slides-container">');
    // Získanie zoznamu súborov obrázkov v adresári
    $img_files = glob($img_folder . '*.jpg');
    
    // Kontrola počtu nadpisov
    $heading_count = count($headings);
    
    // Prechádza cez každý obrázok
    for ($i = 0; $i < count($img_files); $i++) {
        // Začiatok divu pre snímku
        echo('<div class="slide fade">');
        
        // Vloženie obrázka
        echo('<img src="'.$img_files[$i].'">');
        
        // Začiatok divu pre text snímky
        echo('<div class="slide-text">');
        
        // Podmienka pre výpis nadpisu
        if ($heading_count == count($img_files)) {
            // Vypíše i-ty nadpis, ak je ich dostatok
            echo($headings[$i]);
        } else {
            // Inak vypíše nadpis len ak sme mimo rozsahu poľa
            if ($i < $heading_count) {
                echo($headings[$i]);
            }
        }
        
        // Koniec divu pre text snímky
        echo('</div>');
        
        // Koniec divu pre snímku
        echo('</div>');
    }
    echo('<a id="prev" class="prev">❮</a>
    <a id="next" class="next">❯</a>
    </section>');
}

/**
 * Generuje mriežku portfólia s určeným počtom riadkov a stĺpcov.
 *
 * Táto funkcia generuje mriežku portfólia so zadaným počtom riadkov a stĺpcov.
 * Každý riadok obsahuje stĺpce s portfóliovými položkami, ktoré sú reprezentované
 * ako HTML elementy s identifikátorom a textom obsahujúcim poradové číslo.
 *
 * @param int $n_rows Počet riadkov v mriežke portfólia
 * @param int $n_cols Počet stĺpcov v mriežke portfólia
 * @return void
 */
function generate_portfolio(int $n_rows, int $n_cols){
    $n_portfolio = 1; // Počiatočná hodnota pre poradové číslo portfólia
    $col_class = 100/$n_cols; // Výpočet šírky stĺpca na základe počtu stĺpcov

    // Prechádza cez každý riadok v mriežke portfólia
    for($i = 0; $i < $n_rows; $i++){
        echo('<div class="row">'); // Začiatok riadku

        // Pre každý stĺpec v aktuálnom riadku
        for($j = 0; $j < $n_cols; $j++){
            // Vytvára HTML element pre portfóliovú položku s identifikátorom a textom
            echo('<div class="col-'.$col_class.' portfolio text-white text-center" id="portfolio-'.$n_portfolio.'">');
            echo('Web stránka '.$n_portfolio); // Text portfóliovej položky
            $n_portfolio++; // Inkrementuje poradové číslo portfólia
            echo('</div>'); // Ukončuje portfóliovú položku
        }

        echo('</div>'); // Ukončuje riadok
    }
}


function redirect_homepage(){
    header("Location: templates/home.php");
    die("Nepodarilo sa nájsť Domovskú stránku");
}


?>