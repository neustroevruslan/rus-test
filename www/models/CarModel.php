<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;

class CarModel extends Model
{    
    function success($data = null)
    {
        $res = ['status'=>'success'];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return json_encode($res);
    }

    function error($message)
    {
        $res = array(['status'=>'error', 'message'=>$message]);
        return json_encode($res);
    }

    public function carList($order = "", $limit = 25, $offset = 0)
    {        
        $query = new Query;
        $query
            ->select('id, name, year, color')
            ->from('cars')
            ->orderBy($order)
            ->limit($limit)
            ->offset($offset);
        $command = $query->createCommand();
        $carList = $command->queryAll();

        return $this->success($carList);
    }

    public function add($name, $year, $color) 
    {
        if (empty($name) || empty($year) || empty($color)) {
            return $this->error('All params are required');
        }
        if (!is_numeric($year)) {
            return $this->error('Year must be numeric');
        }

        $query = Yii::$app->db
            ->createCommand()
            ->insert('cars', ['name'=>$name, 'year'=>$year, 'color'=>$color])
            ->execute();

        return $this->success();
    }

    public function update($id, $name, $year, $color)
    {      
        if (empty($name) || empty($year) || empty($color)) {
            return $this->error('All params are required');
        }
        if (!is_numeric($year)) {
            return $this->error('Year must be numeric');
        }

        if (empty($this->getCarById($id))) {
            return $this->error('Car not found');
        }
        
        Yii::$app->db
            ->createCommand()
            ->update('cars', ['name' => $name, 'year' => $year, 'color' => $color], ["id" => $id])
            ->execute();
        
        return $this->success();
    }

    public function delete($id)
    {
        if (empty($id)) {
            return $this->error('id required');
        }

        Yii::$app->db
            ->createCommand()
            ->delete('cars', ['id'=>$id])
            ->execute();
        
        return $this->success();
    }

    public function getCarById($id)
    {
        $query = new Query;
        $query
            ->select('id')
            ->from('cars')
            ->limit(1)
            ->where(['id' => $id]);
        $command = $query->createCommand();
        $carExists = $command->queryAll();

        return $carExists;
    }
}