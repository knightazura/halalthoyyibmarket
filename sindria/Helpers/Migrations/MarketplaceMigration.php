<?php

namespace Sindria\Helpers\Migrations;

use Sindria\Helpers\Migrations\ZeroMigration;

class MarketplaceMigration extends ZeroMigration
{
    public function __construct()
    {
        $this->connection = config('app.env') !== 'testing'
            ? 'marketplace'
            : config('database.default');
    }

    public function getConnection()
    {
        return $this->connection;
    }
}