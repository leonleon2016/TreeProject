<?php

require_once(dirname(__DIR__) . '/DataCheckers/DataChecker.php');

class TreeDataChecker extends DataChecker
{
    public function checkData($data): string
    {
        $errorMessage = '';
        if (!isset($data['branches'])) {
            $errorMessage = $errorMessage . 'Не найден массив branches' . PHP_EOL;
        }
        if (!isset($data['id'])) {
            $errorMessage = $errorMessage . 'У дерева отсутсвует уникальный идентификатор' . PHP_EOL;
        } else if (in_array($data['id'], $data['treesIds'])) {
            $errorMessage = $errorMessage . 'Дерево с таким идентификатором уже существует' . PHP_EOL;
        }

        return $errorMessage;
    }
}