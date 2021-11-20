<?php

require_once '../../components/main.php';
require_once '../products.php';

echo $head;
echo '<link rel="stylesheet" href="../styles.css">';
echo '<link rel="stylesheet" href="../../styles.css">';
echo $body;

?> <script>const products = JSON.parse('<?=json_encode($products)?>');</script>
<header>
  <h1>Book Shop</h1>
</header>
<main>
  <h2>Your order is complete</h2>
    <form>
      <fieldset>
        <legend>Your user account detaiils:</legend>
        <label>
          E-mail:
          <input type="email" readonly value="<?=$_POST['email']?>">
        </label>
        <label>
          Password:
          <input type="text" readonly value="<?=$_POST['password']?>">
        </label>
      </fieldset>
      <fieldset>
        <legend>Receipt</legend>
        <?=$_POST['order']?>
      </fieldset>
      <a href="../">Order again</a>
    </form>
  </section>
</main>
<?=$footer?>
