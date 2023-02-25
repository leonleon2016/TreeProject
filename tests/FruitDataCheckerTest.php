<?php

include(dirname(__DIR__) . '/src/DataCheckers/FruitDataChecker.php');

use PHPUnit\Framework\TestCase;

class FruitDataCheckerTest extends TestCase
{
    public function testFruitWithoutWeight()
    {
        $fruit = [
            'type' => 'яблоки',
        ];
        $fruitDataChecker = new FruitDataChecker();
        $message = $fruitDataChecker->checkData($fruit);
        if ($message != 'Не указан вес фрукта' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }

    public function testFruitWithoutType()
    {
        $fruit = [
            'weight' => 123,
        ];
        $fruitDataChecker = new FruitDataChecker();
        $message = $fruitDataChecker->checkData($fruit);
        if ($message != 'Не указан тип фрукта' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }

    public function testFruitWithWrongWeightValue()
    {
        $fruit = [
            'type' => 'яблоки',
            'weight' => -1,
        ];
        $fruitDataChecker = new FruitDataChecker();
        $message = $fruitDataChecker->checkData($fruit);
        if ($message != 'Неправильное значение параметра веса. Вес фрукта может принимать только числовые значения и не может быть меньше или равен нулю' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }

    public function testFruitWithWrongTypeValue()
    {
        $fruit = [
            'type' => 123123,
            'weight' => 1,
        ];
        $fruitDataChecker = new FruitDataChecker();
        $message = $fruitDataChecker->checkData($fruit);
        if ($message != 'Тип фрукта может быть только строчным значением' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }
}
