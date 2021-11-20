<?php
require_once './components/main.php';

echo $head;
echo $body;

$developmentUrl = $development ? '?development' : ''; ?>

<main>
  <div id="blob"></div>
  <nav>
    <ul>
      <li><a href="./exercise-1<?=$developmentUrl?>" data-color="#fcf">Exercise 1</a></li>
      <li><a href="./exercise-2<?=$developmentUrl?>" data-color="#cff">Exercise 2</a></li>
      <li><a href="./exercise-3<?=$developmentUrl?>" data-color="#ffc">Exercise 3</a></li>
      <li><a href="./exercise-4<?=$developmentUrl?>" data-color="#fcf">Exercise 4</a></li>
    </ul>
  </nav>
</main>

<?php
echo $footer;
