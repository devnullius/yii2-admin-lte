<?php
declare(strict_types=1);

namespace devnullius\adminlte\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/fontawesome-free';

    public $css = [
        'css/all.min.css',
    ];
}
