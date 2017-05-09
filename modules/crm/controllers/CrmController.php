<?php
/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Lev Boyko <lewlazarus@gmail.com>
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

namespace app\modules\crm\controllers;


use yii\web\Controller;
use yii\filters\VerbFilter;

class CrmController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors () {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
}