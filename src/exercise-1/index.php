<?php

require_once '../components/main.php';

echo $head;
echo '<link rel="stylesheet" href="../styles.css">';
echo $body;


$n = 100;
?>

<table>
  <thead>
    <tr>
      <?php
        for($i=1; $i<=$n; $i++)
          echo '<th scope="col">'.$i.'</th>';
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
      for($i=1; $i<=$n; $i++){
        ?><tr>
          <th scope="col"><?=$i?></th><?php

          for($ii=1; $ii<=$n; $ii++)
            echo '<td>'.$i*$ii.'</td>';

        ?></tr><?php
      }
    ?>
  </tbody>
</table>


<?php
echo $footer;
?>
