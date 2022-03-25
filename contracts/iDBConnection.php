<?php

namespace Contracts;

interface iDBConnection
{
    public static function getInstance();

    public function queryExecute($query, $type = NULL, $param = NULL);

    public function numRows();

    public function affectedRows();

    public function fetchOne();

    public function fetchAll();

    public function getLastInsertedId();

    public function connClose();
}