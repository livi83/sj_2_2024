<?php
include('partials/header.php');
?> 
<main>
    <?php include('partials/banner.php');?>
    <section class="container">
      <div class="row">
        <div class="col-100 text-center">
          <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em></strong></p>
        </div>
      </div>
    </section>
      <section class="container">
        <?php
          
          $qna_class = new Qna();
          $qna = $qna_class->select();
          //print_r($qna);
          for ($i=0;$i<count($qna);$i++){
            echo '<div class="accordion">';
            echo '<div class="question">'.$qna[$i]->question.'</div>';
            echo '<div class="answer">'.$qna[$i]->answer.'</div>';
            echo '</div>';
          }

        ?>
      </section>
    </section>
  </div>
  </main>
  <?php
    include_once('partials/footer.php')
  ?> 