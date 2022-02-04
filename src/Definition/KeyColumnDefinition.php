<?php

namespace Heychazza\SingleStoreDriver\Definition;

use Heychazza\SingleStoreDriver\Enum\StoreType;
use Illuminate\Database\Schema\ColumnDefinition;

class KeyColumnDefinition extends ColumnDefinition
{
    private string $key;
    private StoreType $storeType;
    private bool $sharded = false;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->key = $attributes["key"];
    }

    public function storeType(StoreType $storeType)
    {
        $this->storeType = $storeType;

        return $this;
    }

    public function sharded()
    {
        $this->sharded = true;

        return $this;
    }

    public function toString()
    {
        return ($this->sharded ? "SHARD " : "") . "KEY (" . $this->key . ")" . (isset($this->storeType) ? " USING " . $this->storeType->name : "");
    }
}
