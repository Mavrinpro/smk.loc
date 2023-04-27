<?php

namespace app\components\widgets;

use yii\base\Widget;

class WidgetAlert extends Widget
{
public function run()
{
    return $this->render('widgetalert');
}
}