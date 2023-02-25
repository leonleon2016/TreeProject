<?php

include(dirname(__DIR__) . '/DataCheckers/FruitDataChecker.php');
include(dirname(__DIR__) . '/DataCheckers/BranchDataChecker.php');
include(dirname(__DIR__) . '/Exceptions/InvalidDataException.php');
include('Fruit.php');

class TreeNode {
    public array $branches = [];
    public array $fruits = [];
    public BranchDataChecker $branchDataChecker;
    public FruitDataChecker $fruitDataChecker;

    function __construct()
    {
        $this->branchDataChecker = new BranchDataChecker();
        $this->fruitDataChecker = new FruitDataChecker();
    }

    public function initializeBranches(array $branches)
    {
        foreach ($branches as $branch) {
            $this->branchDataChecker->throwExceptionIfInvalidData($branch);
            $newBranch = new TreeNode();
            $this->addFruitsToBranch($branch['fruits'], $newBranch);
            $newBranch->initializeBranches($branch['branches']);
            $this->branches[] = $newBranch;
        }
    }

    private function addFruitsToBranch(array $fruits, TreeNode $newBranch)
    {
        foreach ($fruits as $fruit) {
            $this->fruitDataChecker->throwExceptionIfInvalidData($fruit);
            $newBranch->fruits[] = new Fruit($fruit);
        }
    }

    public function collectTreeFruits(array &$fruitsByType)
    {
        foreach ($this->branches as $branch) {
            foreach ($branch->fruits as $fruit) {
                $fruitsByType[$fruit->type]['fruits'][] = $fruit;
                if (!isset($fruitsByType[$fruit->type]['weight'])) {
                    $fruitsByType[$fruit->type]['weight'] = 0;
                }
                $fruitsByType[$fruit->type]['weight'] += $fruit->weight;
            }
            $branch->collectTreeFruits($fruitsByType);
        }
    }
}