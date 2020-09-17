<?php
declare(strict_types=1);

namespace devnullius\adminlte\widgets;

use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Widget;
use yii\helpers\Html;

class Box extends Widget
{
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    /**
     * @var array html options for the box-body
     */
    public $bodyOptions = [];
    /**
     * @var string header text
     */
    public $header;
    /**
     * @var bool Add a border to the header
     */
    public $headerWithBorder = true;
    /**
     * @var string header text
     */
    public $footer;
    /**
     * @var string icon name
     */
    public $icon;
    /**
     * @var string box type
     * You can use one of this class constants
     */
    public $type = 'default';
    /**
     * @var bool is expandable
     */
    public $expandable = false;
    /**
     * @var bool is collapsable
     */
    public $collapsable = false;
    /**
     * @var bool is removable
     */
    public $removable = false;
    /**
     * @var bool is filled
     */
    public $filled = false;
    /**
     * @var string tools buttons
     */
    protected $tools;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initTools();
        Html::addCssClass($this->options, 'box box-' . $this->type);
        if ($this->filled) {
            Html::addCssClass($this->options, 'box-solid');
        }
        echo Html::beginTag('div', $this->options);
        if (isset($this->header)) {
            $classes = ['box-header'];
            if ($this->headerWithBorder) {
                $classes[] = 'with-border';
            }

            echo Html::beginTag('div', ['class' => implode(' ', $classes)]);
            echo Html::tag(
                'h3',
                (isset($this->icon) ? FAS::icon($this->icon) . '&nbsp;' : '') . $this->header,
                ['class' => 'box-title']
            );
            if (!empty($this->tools)) {
                echo Html::tag('div', $this->tools, ['class' => 'box-tools pull-right']);
            }
            echo Html::endTag('div');
        }

        Html::addCssClass($this->bodyOptions, 'box-body');

        echo Html::beginTag('div', $this->bodyOptions);
    }

    protected function initTools(): void
    {
        if ($this->expandable || $this->collapsable) {
            $this->tools .= Html::button(
                FAS::icon($this->expandable ? 'plus' : 'minus'),
                [
                    'class' => 'btn btn-box-tool',
                    'data-widget' => 'collapse',
                ]
            );
            if ($this->expandable) {
                Html::addCssClass($this->options, 'collapsed-box');
            }
        }
        if ($this->removable) {
            $this->tools .= Html::button(
                FAS::icon('times'),
                [
                    'class' => 'btn btn-box-tool',
                    'data-widget' => 'remove',
                ]
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::endTag('div');
        if (!empty($this->footer)) {
            echo Html::tag('div', $this->footer, ['class' => 'box-footer']);
        }
        echo Html::endTag('div');
        parent::run();
    }
}
