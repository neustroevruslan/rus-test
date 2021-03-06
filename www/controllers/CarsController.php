<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\CarModel;

class CarsController extends Controller {
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionList()
    {
        $model = new CarModel;
        $request = Yii::$app->request;
        $order = $request->get('order');
        $limit = $request->get('limit');
        $offset = $request->get('offset');

        return $model->carList($order, $limit, $offset); 
    }

    public function actionAdd()
    {
        $model = new CarModel;
        $request = Yii::$app->request;
        $name = $request->get('name');
        $year = $request->get('year');
        $color = $request->get('color');

        return $model->add($name, $year, $color); 
    }

    public function actionUpdate()
    {
        $model = new CarModel;
        $request = Yii::$app->request;
        $id = $request->get('id');
        $name = $request->get('name');
        $year = $request->get('year');
        $color = $request->get('color');

        return $model->update($id, $name, $year, $color); 
    }

    public function actionDelete()
    {
        $model = new CarModel;
        $request = Yii::$app->request;
        $id = $request->get('id');

        return $model->delete($id); 
    }
}