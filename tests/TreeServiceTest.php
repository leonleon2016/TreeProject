<?php

include(dirname(__DIR__) . '/src/Services/TreeService.php');

use PHPUnit\Framework\TestCase;

class TreeServiceTest extends TestCase
{
    public function testAddTreeWithFruitInvalidData()
    {
        $this->expectException(Exception::class);

        $trees = [
            [
                'id' => 1,
                'branches' => [
                    [
                        'id' => 2,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 0
                            ],
                        ],
                        'branches' => [
                        ]
                    ]
                ]
            ],
            [
                'id' => 1,
                'branches' => [
                    [
                        'id' => 2,
                        'fruits' => [
                            [
                                'weight' => 150
                            ],
                        ],
                        'branches' => [
                        ]
                    ]
                ]
            ],
            [
                'id' => 3,
                'branches' => [
                    [
                        'id' => 4,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                            ],
                        ],
                        'branches' => [
                        ]
                    ]
                ]
            ],
            [
                'id' => 5,
                'branches' => [
                    [
                        'id' => 6,
                        'fruits' => [
                            [
                            ],
                        ],
                        'branches' => [
                        ]
                    ]
                ]
            ],
            [
                'id' => 7,
                'branches' => [
                    [
                        'id' => 8,
                        'fruits' => [
                            'id' => 9,
                            [
                            ],
                        ],
                        'branches' => [
                        ]
                    ]
                ]
            ],
        ];

        $treeService = new TreeService();
        foreach ($trees as $tree) {
            $treeService->addTree($tree);
        }

        $this->fail();
    }

    public function testAddTreeWithBranchInvalidData()
    {
        $this->expectException(Exception::class);

        $trees = [
            [
                'id' => 1,
                'branches' => [
                    [
                        'id' => 3,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 150
                            ],
                        ],
                    ]
                ]
            ],
            [
                'id' => 2,
                'branches' => [
                    [
                        'id' => 4,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 150
                            ],
                        ],
                        'branches' => [
                            [

                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 5,
                'branches' => [
                    [
                        'id' => 6,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 150
                            ],
                        ],
                        'branches' => [
                            'id' => 7,
                            [
                                'id' => 8,
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => 10,
                'branches' => [
                    [
                        'id' => 6,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 150
                            ],
                        ],
                        'branches' => [
                        ]
                    ]
                ]
            ],
            [
                'id' => 10,
                'branches' => [
                    [
                        'id' => 6,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 150
                            ],
                        ],
                        'branches' => [
                        ]
                    ]
                ]
            ],
        ];

        $treeService = new TreeService();
        foreach ($trees as $tree) {
            $treeService->addTree($tree);
        }

        $this->fail();
    }

    public function testCollectAllFruits()
    {
        $trees = [
            [
                'id' => 1,
                'branches' => [
                    [
                        'id' => 3,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 150
                            ]
                        ],
                        'branches' => [

                        ]
                    ]
                ]
            ],
        ];
        $treeService = new TreeService();
        foreach ($trees as $tree) {
            $treeService->addTree($tree);
        }

        $allFruits = $treeService->collectAllFruits();
        if (!isset($allFruits['яблоки'])
            || count($allFruits['яблоки']['fruits']) != 1
            || $allFruits['яблоки']['weight'] != 150) {
            $this->fail();
        }
        $this->assertTrue(true);
    }
}
