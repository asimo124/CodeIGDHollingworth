<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index(): string
    {
        $db = db_connect();

        $tables = $db->listTables();

        return view('Articles/index', ['tables' => $tables]);
    }
}
