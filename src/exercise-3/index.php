<?php

require_once '../components/main.php';

echo $head;
echo '<link rel="stylesheet" href="../styles.css">';
echo $body;

$questions = [
  '0.1+0.2' => [
    '0.3',
    '0.3000000001',
    '0.1',
    '0.2',
  ],
  '45+12' => [
    '57',
    '56',
    '55',
    '58',
  ],
  '15-56' => [
    '-41',
    '41',
    '40',
    '-40',
  ],
  '45/15' => [
    '3',
    '45',
    '15',
    '10',
  ],
  '100-33' => [
    '66',
    '67',
    '66.6666',
    '65',
  ],
];

$submitted = array_key_exists('submit',$_POST);
$className = $submitted ? 'submitted' : '';

$correctAnswers = 0;
$questionNames = array_keys($questions);

?><form method="post" class="<?=$className?>">

  <?php foreach($questions as $question => $originalAnswers){
    $questionIndex = array_search($question, $questionNames);
    $shufledAnswers = $originalAnswers;
    shuffle($shufledAnswers);
    ?> <fieldset>
      <legend><?=$question?></legend> <?php
      foreach($shufledAnswers as $answer){

        $isSelected = array_key_exists($questionIndex, $_POST)
          && $_POST[$questionIndex] == $answer;
        $checked = $isSelected ? 'checked' : '';

        $isCorrect = array_search($answer, $originalAnswers) == 0;
        $className = $isCorrect ? 'correct' : '';
        $className .= ' '.($isSelected ? 'selected' : '');

        if($isSelected && $isCorrect)
          $correctAnswers += 1;

        ?><label class="<?=$className?>">
          <input
            type="radio"
            name="<?=$questionIndex?>"
            value="<?=$answer?>"
            <?=$checked?>
          >
          <?=$answer?>
        </label><?php
      }
    ?> </fieldset> <?php
  }

  if($submitted){
    $max = count($questions);
    $percentage = ($correctAnswers / $max) * 100;
    ?> <span>
      Your score: <?=$percentage?>% (<?=$correctAnswers?>/<?=$max?>)
    </span>
  <?php } ?>

  <input type="submit" name="submit">

</form>

<?php
echo $footer;
?>
