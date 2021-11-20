<?php

require_once '../components/main.php';

echo $head;
echo '<link rel="stylesheet" href="../styles.css">';
echo $body;

?><main>

  <form method="post"><?php

    if(array_key_exists('submit',$_POST)){
      ?>
        <span>Name: <?=$_POST['name']?></span>
        <span>E-mail: <?=$_POST['email']?></span>
      <?php
    }

    ?>

    <label>
      Name:
      <input type="text" name="name">
    </label>

    <label>
      E-mail:
      <input type="email" name="email">
    </label>

    <input type="submit" name="submit">

  </form>
</main>

<?php
echo $footer;
?>
