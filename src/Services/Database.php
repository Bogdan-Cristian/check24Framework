<?php

namespace Service;

class database
{
    private $connection;

    private $query;

    public function __construct()
    {
        $this->connection = new \mysqli('localhost','root','','check24project');
    }

    public function query($table, $params = [])
    {
        if($table)
        {
            if(count($params) > 0)
            {
                $columns = "";
                $condition = "";
                foreach($params as $key => $val)
                {

                    if(is_string($key))
                    {
                        $condition .= " ${key} = '${val}' AND";
                    }

                    $columns .= $key . ',';
                }
                $condition = substr($condition, 0, -3);
//                var_dump($condition);
                $columns = substr($columns, 0, -1);
                $query = "SELECT ${columns} FROM ${table}";
                if(strlen($condition) > 0)
                {
                    $query .= " WHERE ${condition}";
                }
            }
//            var_dump($query);
            $this->query = $query;
            return;
        }
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function persist()
    {
        $result = $this->connection->query($this->query);


        return $result;
    }

}