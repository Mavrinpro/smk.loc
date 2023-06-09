<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="mt-5 pt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="site-error col-md-12">
            <?php if ($this->title == 'Forbidden (#403)'){  ?>

                <?php
                $js = <<<JS
  

Swal.fire('Доступ запрещен!',
  'Вам не разрешено производить данное действие.',
  'error'
)


JS;

                $this->registerJs($js);
                ?>
            <?php }else{ ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <?php }?>
                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>

            </div>
        </div>
    </div>
</section>

