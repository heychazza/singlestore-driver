<?php

namespace Heychazza\SingleStoreDriver\Blueprint;

use Heychazza\SingleStoreDriver\Definition\KeyColumnDefinition;
use Illuminate\Database\Schema\Blueprint;

class SingleStoreBlueprint extends Blueprint
{
    private array $keys = [];

    public function key(string $key): KeyColumnDefinition
    {
        $definition = new KeyColumnDefinition([
            "key" => $key,
        ]);

        $this->keys[] = $definition;

        return $definition;
    }

    public function getKeys(): array
    {
        return $this->keys;
    }
}
