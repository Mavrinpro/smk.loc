<?php

namespace app\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

class MyBreadcrumbs extends Breadcrumbs {

    public $itemTemplate = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"https://schema.org/ListItem\">{link}</li>\n";
    public $activeItemTemplate = "<li class=\"breadcrumb-item active\" aria-current=\"page\" itemprop=\"itemListElement\" itemscope itemtype=\"https://schema.org/ListItem\">{link}</li>\n";

    public function run() {

        $this->registerPlugin('breadcrumb');

        if (empty($this->links)) {
            return '';
        }

        $links = [];
        $position = 0;

        if ($this->homeLink === null) {
            $links[] = $this->renderItem([
                'label' => Yii::t('yii', 'Home'),
                'url' => Yii::$app->homeUrl,
                'position' => $position,
            ], $this->itemTemplate);
        } else if ($this->homeLink !== false) {
            $links[] = $this->renderItem($this->homeLink, $this->itemTemplate);
        }

        foreach ($this->links as $link) {
            $position++;

            if (!is_array($link)) {
                $link = ['label' => $link, 'position' => $position,];
            } else {
                $link += ['position' => $position];
            }

            $links[] = $this->renderItem($link, isset($link['url']) ? $this->itemTemplate : $this->activeItemTemplate);
        }

        return Html::tag('nav', Html::tag($this->tag, implode('', $links), $this->options), $this->navOptions);
    }

    protected function renderItem($link, $template) {

        $encodeLabel = ArrayHelper::remove($link, 'encode', $this->encodeLabels);

        if (array_key_exists('label', $link)) {
            $label = $encodeLabel ? Html::encode($link['label']) : $link['label'];
        } else {
            throw new InvalidConfigException('The "label" element is required for each link.');
        }

        if (isset($link['template'])) {
            $template = $link['template'];
        }

        if (isset($link['position'])) {
            $position = $link['position'];
        } else {
            $position = 0;
        }

        if (isset($link['url'])) {
            $options = $link;
            $options += ['itemprop' => 'item'];
            unset($options['template'], $options['label'], $options['url'], $options['position']);
            $link = Html::a('<span itemprop="name">' . $label. '</span>', $link['url'], $options);
            $link .= '<meta itemprop="position" content="' . $position . '">';
        } else {
            $link = Html::a('<span itemprop="name">' . $label . '</span>', Yii::$app->request->url, ['style' => 'display: none;']);
            $link .= '<meta itemprop="position" content="' . $position . '">';
            $link .= $label;
        }

        return strtr($template, ['{link}' => $link]);

    }
}