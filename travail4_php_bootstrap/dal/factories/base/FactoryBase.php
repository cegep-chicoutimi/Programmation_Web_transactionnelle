<?php

abstract class FactoryBase
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=sql.decinfo-cchic.ca;port=33306;dbname=h25_web_transac_2310197;charset=utf8', 'dev-2310197', 'Zazou2468');
        return $db;
    }
}
