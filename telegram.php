<?php

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$otzyv = $_POST['otzyv'];
$form_subject = $_POST['form_subject'];
$url = $_POST['url'];





//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1647295565:AAEoBAli7p2ezAF1GauqV7ECC00i90qE8t4";

//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-570016972";

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'narkolog-domoy.ru',
  'Имя: ' => $name,
  'Телефон: ' => $phone,
  'Форма: ' => $form_subject,
  'Страница: ' => $url,
  'Отзыв: ' => $otzyv,
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  echo "Форма отправлена";
} else {
  echo "Ошибка";
}
?>