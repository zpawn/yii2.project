<?php
/**
 * (c) 2017 FF.ua. Lev Boyko, Ilya M.
 */


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\web\HttpException;


class CategoryController extends AppController {

    public function actionIndex () {
        $this->setMeta('E-SHOPPER');
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));
    }

    public function actionView ($id) {

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new HttpException(404, 'Category not found');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            // for pretty url
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);

        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch () {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | ' . $q);

        if (!$q) {
            return $this->render('search', compact('q'));
        }
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('products', 'pages', 'q'));
    }
} 