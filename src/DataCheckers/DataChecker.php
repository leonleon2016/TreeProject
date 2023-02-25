<?php

abstract class DataChecker
{
    public abstract function checkData($data): string;

    public function throwExceptionIfInvalidData($data)
    {
        $errorMessage = $this->checkData($data);
        if (!empty($errorMessage)) {
            throw new InvalidDataException($errorMessage);
        }
    }
}