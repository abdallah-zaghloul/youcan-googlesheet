<?php

namespace App\Casts;

use Illuminate\Database\Eloquent\Casts\Attribute as EloquentAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attribute extends EloquentAttribute
{
    protected Model $model;
    protected string $key;

    public function __construct(callable $get = null, callable $set = null)
    {
        $backTrace = $this->getBackTrace();
        $this->setModel($backTrace);
        $this->setKey($backTrace);
        parent::__construct($get, $set);
    }

    private function getBackTrace(): array
    {
        return collect(debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT | DEBUG_BACKTRACE_IGNORE_ARGS, 4))
            ->firstWhere(fn($trace) => @$trace['object'] instanceof Model);
    }

    private function setModel(array $backTrace): void
    {
        $this->model = $backTrace['object'];
    }

    private function setKey(array $backTrace): void
    {
        $this->key = Str::snake($backTrace['function']);
    }

    public function getValue(): mixed
    {
        return $this->model->getAttributeValue($this->key);
    }
}
