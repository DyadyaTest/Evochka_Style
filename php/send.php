<?php

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['login']);
    $name1 = ($_POST['growth']);
    $name2 = ($_POST['volumes']);
    $name3 = ($_POST['nomber']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Логин:' => $name,
        'Рост:' => $name1,
        'Обьемы:' => $name2,
        'Номер товара:' => $name3,
        
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b>".$value."%0A";
    };
    header("location: ".$_SERVER['HTTP_REFERER']);
//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot5047525082:AAENzgHHku1qhEZx94sWMj_fjwVHNQun9tI/sendMessage?chat_id=-664073744&parse_mode=html&text={$txt}","r");
    if ($sendToTelegram) {
        header('Good');
      } else {
        echo "Error";
      }
}

?>
