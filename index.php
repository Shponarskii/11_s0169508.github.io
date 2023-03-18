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
    $dob = $_POST['dob'];
    $gender = $_POST['radio-1'];
    $limbs = $_POST['radio-2'];
    $bio = $_POST['life'];
    $contract = $_POST['choice'];
    $powers = $_POST['powers'];

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

    if (empty($gender)){
        print('Выберите пол.<br/>');
        $errors = TRUE;
    }

    if (empty($limbs)){
        print('Выберите количество конечностей.<br/>');
        $errors = TRUE;
    }

    if (empty($powers)){
        print('Выберите ваши суперспособности.<br/>');
        $errors = TRUE;
    }

    if (empty($bio)) {
        print('Заполните биографию.<br/>');
        $errors = TRUE;
    }

    if (empty($contract)) {
        print('Согласитесь с условиями.<br/>');
        $errors = TRUE;
    }

    if ($errors) {
        exit();
    }

    $usr = 'u54029';
    $password = '5413631';
    $connection = new PDO("mysql:host=localhost;dbname=u54029", $usr, $password, array(PDO::ATTR_PERSISTENT => true));

    $query1 = "INSERT INTO form1 (name, email, birthday, gender, limbs, bio, contract) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $ex1 = $connection->prepare($query1);

    $ex1->execute(array($name, $email, $dob, $gender, $limbs, $bio, $contract));
    $id_user = $connection->lastInsertId();

    $query2 = "INSERT INTO powers (ability) VALUES (?)";

    $ex2 = $connection->prepare($query2);

    $query3 = "INSERT INTO form_power (form_id, power_id) VALUES (?, ?)";

    $ex3 =  $connection->prepare($query3);


    foreach ($powers as $power) {
        $ex2->execute(array($power));
        $power_id = $connection->lastInsertId();
        $ex3->execute(array($id_user, $power_id));
    }

    echo "Данные успешно сохранены";

} 
catch (PDOException $e) {
    print('Database error : ' . $e->getMessage());
    exit();
}

header('Location: ?save=1');
?>
