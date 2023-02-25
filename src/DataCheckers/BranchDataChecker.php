<?php

require_once(dirname(__DIR__) . '/DataCheckers/DataChecker.php');

class BranchDataChecker extends DataChecker
{
    public function checkData($data): string
    {
        $errorMessage = '';
        if (!is_array($data)) {
            $errorMessage = $errorMessage . 'Принятое значение не является массивом, данные о ветке должны быть в формате массива' . PHP_EOL;
        }

        if (!isset($data['fruits'])) {
            $errorMessage = $errorMessage . 'Не найден массив fruits' . PHP_EOL;
        }

        if (!isset($data['branches'])) {
            $errorMessage = $errorMessage . 'Не найден массив branches' . PHP_EOL;
        }

        return $errorMessage;
    }
}