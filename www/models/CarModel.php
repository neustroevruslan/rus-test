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

    public function update($name, $year, $color)
    {      
        if (empty($name)) {
            return 'Change car information "/car/update?name=carname&year=caryear&color=carcolor".';
        }

        $query = new Query;
        $query
            ->select('*')
            ->from('cars')
            ->where(['car_name'=>$name]);
        $command = $query->createCommand();
        $carExists = $command->queryAll();

        if (empty($carExists)) {
            return $this->error('Car no exists.');
        }
        if (!isset($year) && !isset($color)) {
            return $this->error('There must be at least one value.');
        }

        $changeValue;

        if (!isset($year)) {
            $changeValue = ['car_color'=>$color];
        } elseif (!isset($color)) {
            $changeValue = ['car_year'=>$year];
        } else {
            $changeValue = ['car_year'=>$year, 'car_color'=>$color];
        }

        Yii::$app->db
            ->createCommand()
            ->update('cars', $changeValue, ['car_name'=>$name])
            ->execute();
        
        return $this->success();
    }

    public function carList($order, $limit, $offset)
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
            ->where(['car_name'=>$name, 'car_year'=>$year, 'car_color'=>$color]);
        $command = $query->createCommand();
        $carExists = $command->queryAll();

        if (!empty($carExists)) {
            return $this->error('This car exists.');
        }

        Yii::$app->db
            ->createCommand()
            ->insert('cars', ['car_name'=>$name, 'car_year'=>$year, 'car_color'=>$color])
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
            ->where(['car_name'=>$name]);
        $command = $query->createCommand();
        $carExists = $command->queryAll();
        
        if (empty($carExists)) {
            return $this->error('Car not exists.');
        }

        Yii::$app->db
            ->createCommand()
            ->delete('cars', ['car_name'=>$name])
            ->execute();
        
        return $this->success();
    }
}