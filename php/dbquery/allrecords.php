<?php
require_once 'config/database.php';

class allrecords extends Database
{
    public function get($colms = null, $tables, $cond = '', $param = []) {
        if($colms === null){
            $query = 'SELECT * FROM ' .$tables .' WHERE ' .$cond;
        }elseif(empty($cond)){
            $query = 'SELECT ' .$colms .' FROM '.$tables;
        }else {
            $query = 'SELECT ' .$colms .' FROM '.$tables .' WHERE ' .$cond;
        }

        return $this->getRows($query, $param);
    }
}
