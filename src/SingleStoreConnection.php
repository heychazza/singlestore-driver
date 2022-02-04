<?php

namespace Heychazza\SingleStoreDriver;

use Heychazza\SingleStoreDriver\Builder\SingleStoreBuilder;
use Heychazza\SingleStoreDriver\Grammar\SingleStoreGrammar;
use Illuminate\Database\MySqlConnection;

class SingleStoreConnection extends MySqlConnection
{
    /**
     * Get a schema builder instance for the connection.
     *
     * @return SingleStoreBuilder
     */
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }

        return new SingleStoreBuilder($this);
    }

    /**
     * Get the default schema grammar instance.
     *
     * @return SingleStoreGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SingleStoreGrammar());
    }

    /**
     * Get the Doctrine DBAL driver.
     *
     * @return \Doctrine\DBAL\Driver\PDOPgSql\Driver
     */
    protected function getDoctrineDriver()
    {
        return new DoctrineDriver();
    }
}
