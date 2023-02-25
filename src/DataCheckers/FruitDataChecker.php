<?php

require_once(dirname(__DIR__) . '/DataCheckers/DataChecker.php');

class FruitDataChecker extends DataChecker
{
    public function checkData($data): string
    {
        $errorMessage = '';
        if (!is_array($data)) {
            $errorMessage = $errorMessage . 'Принятое значение не является массивом, данные о фрукте должны быть в формате массива' . PHP_EOL;
        }

        if (!isset($data['weight'])) {
            $errorMessage = $errorMessage . 'Не указан вес фрукта' . PHP_EOL;
        } else if($data['weight'] <= 0 || !is_numeric($data['weight'])) {
            $errorMessage = $errorMessage . 'Неправильное значение параметра веса. Вес фрукта может принимать только числовые значения и не может быть меньше или равен нулю' . PHP_EOL;
        }

        if (!isset($data['type'])) {
            $errorMessage = $errorMessage . 'Не указан тип фрукта' . PHP_EOL;
        } else if (!is_string($data['type'])) {
            $errorMessage = $errorMessage . 'Тип фрукта может быть только строчным значением' . PHP_EOL;
        }

        return $errorMessage;
    }
}