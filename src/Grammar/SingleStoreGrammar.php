<?php

namespace Heychazza\SingleStoreDriver\Grammar;

use Illuminate\Database\Schema\Grammars\MySqlGrammar;

class SingleStoreGrammar extends MySqlGrammar
{
    /**
     * @param ExtendedBlueprint $blueprint
     * @param $command
     * @param $connection
     * @return array|string
     */
    protected function compileCreateTable($blueprint, $command, $connection)
    {
        $extraCols = [];

        foreach ($blueprint->getKeys() as $key) {
            $extraCols[] = $key->toString();
        }

        $cols = array_merge($this->getColumns($blueprint), $extraCols);
        return trim(sprintf("%s table %s (%s)", $blueprint->temporary ? "create temporary" : "create", $this->wrapTable($blueprint), implode(", ", $cols)));
    }

    public function compileDropTable($table)
    {
        return 'drop table '.$table;
    }
}
