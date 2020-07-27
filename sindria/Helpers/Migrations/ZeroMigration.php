<?php

namespace Sindria\Helpers\Migrations;

use Illuminate\Database\Migrations\Migration;

class ZeroMigration extends Migration
{
    public function __construct()
    {
        $this->connection = config('app.env') !== 'testing'
            ? 'zero'
            : config('database.default');
    }

    public function getConnection()
    {
        return $this->connection;
    }   
}