<?php

abstract class FactoryBase
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=sql.decinfo-cchic.ca;port=33306;dbname=???;charset=utf8', '???', '???');
        return $db;
    }
}
