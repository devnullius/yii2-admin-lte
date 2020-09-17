<?php
declare(strict_types=1);

namespace devnullius\adminlte\widgets\grid;

use devnullius\adminlte\assets\AdminLteAsset;
use yii\web\AssetBundle;

class GridViewAsset extends AssetBundle
{
    public $sourcePath = '@bower/datatables/media/css';
    public $css = [
        'dataTables.bootstrap.css',
    ];
    public $js = [];
    public $depends = [
        AdminLteAsset::class,
    ];
}
