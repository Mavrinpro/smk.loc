<?php

namespace app\components\widgets;
use yii\base\Widget;

class AlertWidget extends Widget
{
  public function run()
  {
      return $this->render('alertwidget');
  }
}