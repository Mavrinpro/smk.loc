<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Branch $model */

$this->title = 'Update Branch: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<!DOCTYPE html>

<html>
<head>
    <title>Untitled</title>
    <meta charset="utf-8">
    <style type="text/css">
        .optionally:checked ~ .rez {
            display: inline;
        }
        .optionally ~ .rez {
            display: none;
        }
    </style>

</head>

<body>
<p>
    Если Выбрал значения из первого select т.е mazda значения цен одни, а когда выбираешь например bmw<br>
    то значения другие.
</p>
<form id="form" action="http://">


    <!-- select product -->

    <select  class="car">
        <option  value="">Выбрать</option>
        <option  value="mazda">mazda</option>
        <option  value="lada">lada</option>
        <option  value="bmw">bmw</option>
    </select>
    <br>
    <br>
    <!-- color product -->

    <select  class="color">
        <option value="">Выбрать</option>
        <option value="red">Красный</option>
        <option value="blue">Белый</option>
        <option value="blue">Синий</option>
    </select>

    <br>
    <br>

    <!-- checkbox list  -->

    <br>
    <br>
    <!-- Здесь значение меняються от выбранных вариантов -->

    <!-- size product -->

    <input type="text" class="rez" placeholder="0 руб" readonly="readonly"> <!-- зависимость от первого select -->
    <br>
    <br>
    <input type="text" class="rez" placeholder="0 руб" readonly="readonly"> <!-- зависимость от второго select -->
    <br>
    <br>
    <input type="checkbox" class="optionally" id="opt"><label for="opt">дополнительный настройки

    </label>
    <br>
    <input type="text" class="rez" placeholder="0 руб" readonly="readonly"> <!-- зависимость от checkbox -->

    <br>

    <label>Здесь суммируются значения котые выбрал пользователь</label><br>
    <input type="text" class="summa" placeholder="Сумма">
</form>
<script>
    window.addEventListener("DOMContentLoaded", function() {
        var d = {
                mazda: {
                    product: 350,
                    red: 450,
                    white: 500,
                    blue: 550,
                    option: 360
                },
                lada: {
                    product: 400,
                    red: 600,
                    white: 700,
                    blue: 350,
                    option: 660
                },
                bmw: {
                    product: 600,
                    red: 700,
                    white: 300,
                    blue: 340,
                    option: 360
                }
            },
            f = document.querySelector("#form"),
            g = f.querySelector(".summa"),
            h = f.querySelectorAll(".rez"),
            a = f.querySelectorAll(".car, .color, #opt"),
            b;
        f.addEventListener("change", function() {
            var c = a[0].value;
            b = [0, 0, 0];
            if (c) {
                b[0] = d[c].product;
                var e = a[1].value;
                e && (b[1] = d[c][e]);
                a[2].checked && (b[2] = d[c].option)
            } else a[1].value = "";
            g.value = b.reduce(function(b, a, c) {
                h[c].value = a + " руб.";
                return b + a
            }, 0) + " руб."
        })
    });
</script>

</body>
</html>

