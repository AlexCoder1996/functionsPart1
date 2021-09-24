<?php
if (isset($_POST['submit_btn']) && ($_POST['form_name']!= '') && ($_POST['form_email']!= '')) {
  if (isset($_COOKIE['submissions'])) {
    setcookie('submissions', $_COOKIE['submissions'] . '|' . $_POST['form_name'] .
      "," . $_POST['form_email'] , time()+30); 
      $_COOKIE['submissions'] = $_COOKIE['submissions'] . '|' . $_POST['form_name'] .
      "," . $_POST['form_email'];
  } else {
    setcookie('submissions', $_POST['form_name'] . "," . $_POST['form_email'] , time()+30);
    $_COOKIE['submissions'] = $_POST['form_name'] . "," . $_POST['form_email'];
  }
}

$usersArray = explode("|", $_COOKIE['submissions']);

if ($_FILES['uploadedFile']['name']){
  if ($_FILES['uploadedFile']['type'] == 'image/jpeg' ) {
    $fileMsg = 'Было загружено изображение';
  } else {
    $fileMsg = 'Был загружен файл';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Test form</title>
</head>
<body>

    <form action="" enctype="multipart/form-data" method="post">
        <label for="form_name">Введите имя:</label>
        <input id="form_name" type="text" name="form_name">
        <label for="form_email">Введите email:</label>
        <input id="form_email" type="mail" name="form_email">
        <input type="file" name="uploadedFile">
        <input type="submit" value="Отправить" name="submit_btn">
    </form>

    <?php
      if ($_FILES['uploadedFile']['name']) {
        echo '<div style="
        border: 1px solid green;
        margin: 10px auto;
        width: 200px;
        text-align:center;">';
        echo $fileMsg;
        echo '</div>';
      }
    ?>     

    <div class="user-list">
      <h3>Name and Email:</h3>
      <ul>
        <?php foreach ($usersArray as $user) {
          $userNameEmail = explode(",", $user);
          echo "<li>";
          echo $userNameEmail[0] . " " . $userNameEmail[1];
          echo "</li>";
        }
        ?>
      </ul>  
    </div>

</body>
</html>