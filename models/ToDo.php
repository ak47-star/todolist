<?php
namespace Model;
use Connection\DB;

class ToDo
{
     public $id;
     public $task_name;
     public $start_date;
     public $end_date;
     public $status;

     public function __construct($id, $task_name, $start_date, $end_date, $status){
       $this->id = $id;
       $this->task_name = $task_name;
       $this->start_date = $start_date;
       $this->end_date = $end_date;
       $this->status = $status;
     }

     public static function all(){
         $list_to_do = [];
         $db = DB::getInstance();
         $req = $db->query('SELECT * FROM todo');
         foreach ($req->fetchAll() as $item) {
             $list_to_do[] = new ToDo($item['id'], $item['task_name'], $item['start_date'], $item['end_date'], $item['status']);
         }
         return $list_to_do;
     }

     public static function create($params){
         $db = DB::getInstance();
         $sql = 'INSERT INTO todo (task_name, start_date, end_date, status) VALUES (?,?,?,?)';
         $stmt = $db->prepare($sql);
         $response = $stmt->execute($params);
         return $response;
     }

     public static function update($params){
         $db = DB::getInstance();
         $sql = 'UPDATE todo SET task_name = ?, start_date = ?, end_date = ?, status = ? WHERE id = ?';
         $stmt = $db->prepare($sql);
         $response = $stmt->execute($params);
         return $response;
     }

     public static function findById($id){
         $db = DB::getInstance();
         $req = $db->query('SELECT * FROM todo where id ='.$id);
         $todo = $req->fetch();
         return $todo;
     }

     public static function delete($id){
         $db = DB::getInstance();
         $sql = "DELETE FROM todo WHERE id = ?";
         $stmt = $db->prepare($sql);
         $response = $stmt->execute([$id]);
         return $response;
     }

}