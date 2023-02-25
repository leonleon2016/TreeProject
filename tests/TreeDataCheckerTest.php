<?php

include(dirname(__DIR__) . '/src/DataCheckers/TreeDataChecker.php');

use PHPUnit\Framework\TestCase;

class TreeDataCheckerTest extends TestCase
{
    public function testTreeWithoutBranchesArray()
    {
        $tree = [
            'id' => 1,
            'treesIds' => []
        ];
        $treeDataChecker = new TreeDataChecker();
        $message = $treeDataChecker->checkData($tree);
        if ($message != 'Не найден массив branches' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }

    public function testTreeWithoutId()
    {
        $tree = [
            'branches' => [],
            'treesIds' => []
        ];
        $treeDataChecker = new TreeDataChecker();
        $message = $treeDataChecker->checkData($tree);
        if ($message != 'У дерева отсутсвует уникальный идентификатор' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }

    public function testTreeWithWrongId()
    {
        $tree = [
            'id' => 1,
            'branches' => [],
            'treesIds' => [1]
        ];
        $treeDataChecker = new TreeDataChecker();
        $message = $treeDataChecker->checkData($tree);
        if ($message != 'Дерево с таким идентификатором уже существует' . PHP_EOL) {
            $this->fail();
        }
        $this->assertTrue(true);
    }
}
