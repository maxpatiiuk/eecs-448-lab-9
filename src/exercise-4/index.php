<?php

require_once '../components/main.php';
require_once 'products.php';

echo $head;
echo '<link rel="stylesheet" href="../styles.css">';
echo $body;

?> <script>const products = JSON.parse('<?=json_encode($products)?>');</script>
<header>
  <h1>Book Shop</h1>
</header>
<main>
  <section id="products" style="display: none;">
    <form>
      <input type="submit" value="Proceed to checkout">
    </form>
  </section>
  <section id="userInfo" style="display: none;">
    <form>
      <fieldset>
        <legend>Sign in</legend>
        <label>
          E-mail:
          <input type="email" required name="email">
        </label>
        <label>
          Password:
          <input type="password" required name="password" minlength="8">
        </label>
      </fieldset>
      <fieldset>
        <legend>Select shipping method</legend>
        <label>
          <input type="radio" required name="shipping" value="free">
          7 Day (free)
        </label>
        <label>
          <input type="radio" required name="shipping" value="50">
          Overnight ($50.00)
        </label>
        <label>
          <input type="radio" required name="shipping" value="5">
          Three Day ($5.00)
        </label>
      </fieldset>
      <input type="button" class="back-button" value="Go back" data-section="products">
      <input type="submit" value="Review order">
    </form>
  </section>
  <section id="checkout" style="display: none;">
    <form action="./completed/" method="post">
      <fieldset>
        <legend>Order:</legend>
        <table>
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Cost</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </fieldset>
      <span class="total">Total: <input type="number" readonly></span>
      <input type="button" class="back-button" value="Go back" data-section="userInfo">
      <input type="hidden" name="order">
      <input type="hidden" name="email">
      <input type="hidden" name="password">
      <input type="submit" value="Complete order">
    </form>
  </section>
</main>
<?=$footer?>
