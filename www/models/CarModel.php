<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;

class CarModel extends Model
{    
    function success()
    {
        $res = array(['status'=>'success']);
        return json_encode($res);
    }

    function error($message)
    {
        $res = array(['status'=>'error', 'message'=>$message]);
        return json_encode($res);
    }

    public function update($id, $name, $year, $color)
    {      
        Yii::$app->db
            ->createCommand()
            ->update('cars', 
                [
                    'name' => ':name', 
                    'year' => ':year', 
                    'color' => ':color',
                ], 
                'id = :id', 
                [
                    ':name' => $name,
                    ':year' => $year,
                    ':color' => $color,
                    ':id' => $id,
                ]
            );
            ->execute();
        
        return $this->success();
    }

    public function carList($order = "id", $limit = 25, $offset = 0)
    {        
        $query = new Query;
        $query
            ->select('*')
            ->from('cars')
            ->orderBy($order)
            ->limit($limit)
            ->offset($offset);
        $command = $query->createCommand();
        $carList = $command->queryAll();

        if (empty($carList)) {
            return $this->error('Car list is empty.');
        }
        
        $res = array(['status'=>'success', 'carList'=>$carList]);
        return json_encode($res);
    }

    public function add($name, $year, $color) 
    {
        if (empty($name) || empty($year) || empty($color)) {
            return 'Add car in list "/car/add?name=carname&year=caryear&color=carcolor".';
        }

        $query = new Query;
        $query
            ->select('*')
            ->from('cars')
            ->where(['name'=>$name, 'year'=>$year, 'color'=>$color]);
        $command = $query->createCommand();
        $carExists = $command->queryAll();

        if (!empty($carExists)) {
            return $this->error('This car exists.');
        }

        Yii::$app->db
            ->createCommand()
            ->insert('cars', ['name'=>$name, 'year'=>$year, 'color'=>$color])
            ->execute();

        return $this->success();
    }

    public function delete($name)
    {
        if (!isset($name)) {
            return 'Remove a car from the list "/car/delete?name=carname"';
        }

        $query = new Query;
        $query
            ->select('*')
            ->from('cars')
            ->where(['name'=>$name]);
        $command = $query->createCommand();
        $carExists = $command->queryAll();
        
        if (empty($carExists)) {
            return $this->error('Car not exists.');
        }

        Yii::$app->db
            ->createCommand()
            ->delete('cars', ['name'=>$name])
            ->execute();
        
        return $this->success();
    }
}