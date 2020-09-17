<?php
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Inflector;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <?php if (!is_null($this->title)): ?>
                            <?= Html::encode($this->title) ?>
                        <?php else: ?>
                            <?= Inflector::camelize($this->context->id) ?>
                        <?php endif; ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?php
                    try {
                        echo Breadcrumbs::widget([
                            'links' => $this->params['breadcrumbs'] ?? [],
                            'options' => [
                                'class' => 'float-sm-right',
                            ],
                        ]);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
