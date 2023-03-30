<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Задание 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="col-12 m order-2 order-sm-3" id="bc">

    <h1 id="c">Форма</h1>

    <form action="" method="POST" class="row g-3">
        <div class="col-md-6 col-sm-12">
            <label for="iname" class="form-label">
                Имя:<br>
            </label><br>
            <input name="name" class="form-control" id="iname" placeholder="Введите ваше имя">
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="inmail" class="form-label">
                e-mail:<br>
            </label><br>
            <input type="email" name="email" class="form-control" id="inmail" placeholder="Введите ваш e-mail">
        </div>
        <div class="col-12">
            <label for="inbirth" class="form-label">
                Дата рождения:<br>
            </label><br>
            <input type="date" name="dob" class="form-control" id="inbirth" min="2000-01-01" max="2005-12-31">
        </div>
        <div class="col-md-6 col-sm-12">
            Пол:
            <div class="form-check-inline">
                <label class="form-check-label">
                    Мужской
                </label>
                <input type="radio" class="form-check-input" checked="checked" name="sx" value="m">
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    Женский
                </label>
                <input type="radio" class="form-check-input" name="sx" value="f">
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            Количество конечностей:
            <div class="form-check-inline">
                <label class="form-check-label">
                    1
                </label>
                <input type="radio" class="form-check-input" name="limb" value="1">
            </div>

            <div class="form-check-inline">
                <label class="form-check-label">
                    2
                </label>
                <input type="radio" class="form-check-input" name="limb" value="2">
            </div>

            <div class="form-check-inline">
                <label class="form-check-label">
                    3
                </label>
                <input type="radio" class="form-check-input" name="limb" value="3">
            </div>

            <div class="form-check-inline">
                <label class="form-check-label">
                    4
                </label>
                <input type="radio" class="form-check-input" checked="checked" name="limb" value="4">
            </div>
        </div>

        <div class="col-12">
            <label>
                Сверхспособности:<br>
                <select name="powers[]" multiple="multiple">
                    <option value="immortal">Бессмертие</option>
                    <option value="through">Прохождение сквозь стены</option>
                    <option value="levitate">Левитация</option>
                </select>
            </label><br>
        </div>

        <div class="col-12">
            <label>
                Биография:<br>
                <textarea name="life"></textarea>
            </label><br>
        </div>

        <div class="col-12">
            <label>
                С контрактом ознакомлен(-а):<br>
                <input type="checkbox" name="choice">
            </label><br>
        </div>

        <div class="col-12">
            <input type="submit" value="Отправить">
        </div>
    </form>
</div>
</body>
</html>
