<?php
declare(strict_types=1);

namespace devnullius\adminlte\assets;

use Yii;
use yii\web\AssetBundle;

class PluginAsset extends AssetBundle
{
    /**
     * @var array
     */
    public static array $pluginMap = [
        'fontawesome' => [
            'css' => 'fontawesome-free/css/all.min.css',
        ],
        'icheck-bootstrap' => [
            'css' => ['icheck-bootstrap/icheck-bootstrap.css'],
        ],
    ];
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $depends = [
        AdminLteAsset::class,
    ];

    /**
     * add a plugin dynamically
     *
     * \devnullius\adminlte\assets\PluginAsset::register($this)->add(['sweetalert2']);
     *
     *
     *
     * return [
     *  'adminEmail' => 'admin@example.com',
     *  'devnullius.adminlte' => [
     *      'pluginMap' => [
     *          'sweetalert2' => [
     *          'css' => 'sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
     *          'js' => 'sweetalert2/sweetalert2.min.js'
     *          ]
     *      ]
     *  ]
     * ];
     *
     * or
     *
     * $bundle = \devnullius\adminlte\assets\PluginAsset::register($this);
     * $bundle->css[] = 'sweetalert2-theme-bootstrap-4/bootstrap-4.min.css';
     * $bundle->js[] = 'sweetalert2/sweetalert2.min.js';
     *
     * @param $pluginName
     *
     * @return $this
     */
    public function add(array $pluginName): self
    {
        $pluginName = (array)$pluginName;

        foreach ($pluginName as $name) {
            $plugin = $this->getPluginConfig($name);
            if (isset($plugin['css'])) {
                foreach ((array)$plugin['css'] as $css) {
                    $this->css[] = $css;
                }
            }
            if (isset($plugin['js'])) {
                foreach ((array)$plugin['js'] as $js) {
                    $this->js[] = $js;
                }
            }
        }

        return $this;
    }

    /**
     * @param $name ;  adminLTE plugin name
     *
     * @return array
     */
    private function getPluginConfig(string $name): array
    {
        return self::$pluginMap[$name] ?? Yii::$app->params['devnullius.adminlte']['pluginMap'][$name] ?? [];
    }
}
