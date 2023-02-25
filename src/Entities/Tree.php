<?php

include('TreeNode.php');

class Tree extends TreeNode
{
    public string $id;

    function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }
}