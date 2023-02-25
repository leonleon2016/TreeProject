<?php

include(dirname(__DIR__) . '/Entities/Tree.php');
include(dirname(__DIR__) . '/DataCheckers/TreeDataChecker.php');

class TreeService {
    public array $tries = [];
    public TreeDataChecker $dataChecker;

    function __construct()
    {
        $this->dataChecker = new TreeDataChecker();
    }

    public function addTree(array $tree)
    {
        $dataToCheck = $tree;
        $dataToCheck['treesIds'] = array_keys($this->tries);
        $this->dataChecker->throwExceptionIfInvalidData($dataToCheck);
        $newTree = new Tree($tree['id']);
        $newTree->initializeBranches($tree['branches']);
        $this->tries[$tree['id']] = $newTree;
    }

    public function collectAllFruits(): array
    {
        $fruitsByType = [];
        foreach ($this->tries as $tree) {
            $tree->collectTreeFruits($fruitsByType);
        }

        return $fruitsByType;
    }
}