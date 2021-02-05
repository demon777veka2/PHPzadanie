<h2>Задание 3</h2>
<form method="POST">
  <input type="number" size="3" name="number" min="1" max="10" value="<?php if (isset($_POST['number'])) print $_POST['number']; ?>">
  <input type="number" size="3" name="degree" min="0" max="9" value="<?php if (isset($_POST['degree'])) print $_POST['degree']; ?>">

  <input type="submit" name="button1" value="Отправить" />
</form>

<?php
if (isset($_POST['button1'])) {
  //задание 3
  $a = $_POST["number"];
  $x = $_POST["degree"];
  if ($x != 0) {
    $ax = $a;
    for ($s = 1; $s < $x; $s++) {
      $ax = $ax * $a;
    }
  } else $ax = 1;

  echo "Рузультат: $ax";
}
?>

<h2>Задание 4</h2>
<form method="POST">
  <input type="text" name="text" value="<?php if (isset($_POST['text'])) print $_POST['text']; ?>">

  <input type="submit" name="button2" value="Отправить">
</form>

<?php
if (isset($_POST['button2'])) { //задание 4
  $text = $_POST["text"];
  if ($text != "") {
    $text = str_replace(" ", "", $text);
    $text = mb_strtolower($text);

    $arr = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
    $arr1 = array_reverse($arr);

    echo ($arr == $arr1) ? 'ура, это палиндром!<br>' : 'строка не палиндром <br>';
  } else echo "Вы ничего не ввели";
};
?>

<?php
echo "<h2>Задание 1-2</h2>";
//1 задание
//массив с рандомными цыфрами
for ($d = 1; $d < 101; $d++) {
  $arr[$d] = rand(1, 100);
}
// Создаем файл в который будем этот массив записывать
$file = fopen('file.csv', 'w');
// Перебираем массив, записывая построчно
foreach ($arr as $line) {
  fputcsv($file, explode(',', $line), ';');
}
// Закрываем соединение с файлом
fclose($file);

//задание 2
//открываем файл. Если его нет, завершаем работу скрипта и выводим ошибку
$file = fopen("file.csv", 'rt') or die("Не удалось подключть файл");
//считываем данные в цикле
for ($i = 0; $data = fgetcsv($file, 1000, ";"); $i++) {
  $array[$i] = $data[0];
}
//Сортировка
sort($array);
//вывод результата
for ($q = 0; $q < count($array); $q++) {
  $q1 = $q + 1;
  echo "<p> Строка $q1 содержит: $array[$q] <br>";
}
//закрываем файл
fclose($file);
?>