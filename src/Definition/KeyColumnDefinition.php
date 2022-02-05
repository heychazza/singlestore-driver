<?php

namespace Heychazza\SingleStoreDriver\Definition;

use Heychazza\SingleStoreDriver\Enum\StoreType;
use Illuminate\Database\Schema\ColumnDefinition;

class KeyColumnDefinition extends ColumnDefinition
{
    private string $key;
    private StoreType $storeType;
    private bool $sharded = false;
    private bool $primary = false;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->key = $attributes["key"];
    }

    public function storeType(StoreType $storeType): KeyColumnDefinition
    {
        $this->storeType = $storeType;

        return $this;
    }

    public function sharded(): static
    {
        $this->sharded = true;

        return $this;
    }

    public function primary(): KeyColumnDefinition
    {
        $this->primary = true;

        return $this;
    }

    public function toString()
    {
        $keyType = '';

        if($this->sharded)
        {
            $keyType .= 'SHARD ';
        } else if($this->primary)
        {
            $keyType .= 'PRIMARY ';
        }

        return sprintf("%sKEY (%s)%s", $keyType, $this->key, isset($this->storeType) ? " USING " . $this->storeType->name : "");
    }
}
