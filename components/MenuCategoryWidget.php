<?php
/********************************************************************
 *              (c) 2017 FF.ua. Lev Boyko, Ilya M.                  *
 *******************************************************************/


namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;


class MenuCategoryWidget extends Widget {

    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;
    public $model;

    public function init () {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run () {

        if ($this->tpl == 'menu.php') {
            // get Cache
            $menu = Yii::$app->cache->get('categoryMenu');
            // and return menu
            if ($menu) return $menu;
        }

        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        if ($this->tpl == 'menu.php') {
            /**
             * set menu name
             * chached template
             * live time
             */
            Yii::$app->cache->set('categoryMenu', $this->menuHtml, 60);
        }
        return $this->menuHtml;
    }

    protected function getTree () {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml ($tree, $tab = '') {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->categoryToTemplate($category, $tab);
        }
        return $str;
    }

    protected function categoryToTemplate ($category, $tab) {
        ob_start();
        include(__DIR__ . '/menu_category/' . $this->tpl);
        return ob_get_clean();
    }
} 