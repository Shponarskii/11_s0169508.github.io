<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['save'])) {
        print('Спасибо, результаты сохранены.');
    }
    include('form.php');
    exit();
}


try {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['radio-1'];
    $limbs = $_POST['radio-2'];
    $dob = $_POST['dob'];
    $bio = $_POST['life'];

    $errors = FALSE;
    
    if (empty($name) || (!preg_match("/^[a-zA-z]*$/", $name))) {
        print('Заполните имя.<br/>');
        $errors = TRUE;
    }

    if (empty($email)) {
        print('Заполните почту.<br/>');
        $errors = TRUE;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors = TRUE;
        print('Почта заполнена некорректно.<br/>');
    }

    if (empty($dob)){
        print('Выберите дату рождения.<br/>');
        $errors = TRUE;
    }

    if (empty($_POST['powers'])){
        print('Выберите ваши суперспособности.<br/>');
        $errors = TRUE;
    }

    if (empty($bio)){
        print('Напишите биографию.<br/>');
        $errors = TRUE;
    }

    if (empty($_POST['choice'])) {
        print('Согласитесь с условиями.<br/>');
        $errors = TRUE;
    }

    if ($errors) {
        exit();
    }

    $powers = $_POST['powers'];
    $contract = $_POST['choice'];

    $usr = 'u54029';
    $password = '5413631';
    $connection = new PDO("mysql:host=localhost;dbname=u54029", $usr, $password, array(PDO::ATTR_PERSISTENT => true));

    $query1 = "INSERT INTO form1 (name, email, birthday, gender, limbs, bio, contract) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $ex1 = $connection->prepare($query1);
    $ex1->execute(array($name, $email, $dob, $gender, $limbs, $bio, $contract));
    $id_user = $connection->lastInsertId();

    $query3 = "INSERT INTO form_power (form_id, power_id) VALUES (?, ?)";
    $ex3 =  $connection->prepare($query3);


    foreach ($powers as $power){
        switch ($power) {
            case "immortal":
                $ex3->execute(array($id_user, 1));
                break;
            case "through":
                $ex3->execute(array($id_user, 2));
                break;
            case "levitate":
                $ex3->execute(array($id_user, 3));
                break;
        }
    }

} 
catch (PDOException $e) {
    print('Database error : ' . $e->getMessage());
    exit();
}

header('Location: ?save=1');
?>
