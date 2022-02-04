<?php

namespace Heychazza\SingleStoreDriver\Builder;

use Illuminate\Database\Schema\MySqlBuilder;

class SingleStoreBuilder extends MySqlBuilder
{
    public function dropAllTables()
    {
        $this->disableForeignKeyConstraints();

        foreach ($this->getAllTables() as $row) {
            $row = (array) $row;
            $this->connection->statement($this->grammar->compileDropAllTables(reset($row)));
        }

        $this->enableForeignKeyConstraints();
    }
}
