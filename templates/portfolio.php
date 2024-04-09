<?php
include('partials/header.php');
?> 
        <main>
             <?php include('partials/banner.php');?>
              <section class="container">
                <?php
                   $portfolio_object = new Portfolio();
                   $portfolio = $portfolio_object->get_portfolio();
                   echo($portfolio);
                ?>
               
            </section>   

        </main>
<?php
  include_once('partials/footer.php')
?> 