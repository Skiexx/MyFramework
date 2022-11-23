<?php

namespace Src\Validator;

abstract class AbstractValidator
{
    protected string $field = '';
    protected $value;
    protected array $args = [];
    protected string $message = '';
    protected array $messageKeys = [];

    public function __construct(string $field, $value, array $args = [], string $message = null)
    {
        $this->field = $field;
        $this->value = $value;
        $this->args = $args;
        $this->message = $message ?? $this->message;

        $this->messageKeys = [
            ':value' => $this->value,
            ':field' => $this->field,
        ];
    }

    public function validate(): bool|string
    {
        if ($this->rule()) {
            return $this->messageError();
        }
        return true;
    }

    private function messageError(): string
    {
        foreach ($this->messageKeys as $key => $value) {
            $this->message = str_replace($key, (string)$value, $this->message);
        }
        return $this->message;
    }

    abstract public function rule(): bool;
}