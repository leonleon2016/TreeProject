<?php

include(dirname(__DIR__) . '/src/DataCheckers/BranchDataChecker.php');

use PHPUnit\Framework\TestCase;

class BranchDataCheckerTest extends TestCase
{
    public function testBranchWithoutBranchesArray()
    {
        $branch = [
            'fruits' => [
            ]
        ];
        $branchDataChecker = new BranchDataChecker();
        $message = $branchDataChecker->checkData($branch);
        if ($message != 'Не найден массив branches' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }

    public function testBranchWithoutFruitsArray()
    {
        $branch = [
            'branches' => [
            ]
        ];
        $branchDataChecker = new BranchDataChecker();
        $message = $branchDataChecker->checkData($branch);
        if ($message != 'Не найден массив fruits' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }

    public function testBranchDataAsArray()
    {
        $branch = 1;
        $branchDataChecker = new BranchDataChecker();
        $message = $branchDataChecker->checkData($branch);
        $trueMessage = "Принятое значение не является массивом, данные о ветке должны быть в формате массива
Не найден массив fruits
Не найден массив branches
";
        if ($message != $trueMessage) {
            $this->fail();
        }
        $this->assertTrue(true);
    }
}
