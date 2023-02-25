<?php

include(dirname(__DIR__) . '/src/Services/TreeService.php');

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
                    [
                        'type' => 'яблоки',
                        'weight' => 175
                    ],
                ],
                'branches' => [
                    [
                        'id' => 4,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 160
                            ],
                            [
                                'type' => 'яблоки',
                                'weight' => 180
                            ],
                        ],
                        'branches' => [
                            [
                                'id' => 6,
                                'fruits' => [
                                    [
                                        'type' => 'яблоки',
                                        'weight' => 171
                                    ],
                                    [
                                        'type' => 'яблоки',
                                        'weight' => 179
                                    ],
                                ],
                                'branches' => [

                                ]
                            ],
                        ]
                    ],
                    [
                        'id' => 5,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 155
                            ],
                            [
                                'type' => 'яблоки',
                                'weight' => 165
                            ],
                        ],
                        'branches' => [

                        ]
                    ]
                ]
            ],
            [
                'id' => 7,
                'fruits' => [
                    [
                        'type' => 'яблоки',
                        'weight' => 166
                    ],
                    [
                        'type' => 'яблоки',
                        'weight' => 170
                    ],
                    [
                        'type' => 'яблоки',
                        'weight' => 152
                    ],
                    [
                        'type' => 'яблоки',
                        'weight' => 157
                    ],
                ],
                'branches' => [
                    [
                        'id' => 8,
                        'fruits' => [
                            [
                                'type' => 'яблоки',
                                'weight' => 158
                            ],
                            [
                                'type' => 'яблоки',
                                'weight' => 160
                            ],
                        ],
                        'branches' => [
                        ]
                    ],
                ]
            ]
        ]
    ],
    [
        'id' => 2,
        'branches' => [
            [
                'id' => 9,
                'fruits' => [
                    [
                        'type' => 'груши',
                        'weight' => 130
                    ],
                    [
                        'type' => 'груши',
                        'weight' => 170
                    ],
                ],
                'branches' => [
                    [
                        'id' => 10,
                        'fruits' => [
                            [
                                'type' => 'груши',
                                'weight' => 135
                            ],
                            [
                                'type' => 'груши',
                                'weight' => 140
                            ],
                        ],
                        'branches' => [
                            [
                                'id' => 11,
                                'fruits' => [
                                    [
                                        'type' => 'груши',
                                        'weight' => 168
                                    ],
                                    [
                                        'type' => 'груши',
                                        'weight' => 169
                                    ],
                                ],
                                'branches' => [

                                ]
                            ],
                        ]
                    ],
                    [
                        'id' => 12,
                        'fruits' => [
                            [
                                'type' => 'груши',
                                'weight' => 155
                            ],
                            [
                                'type' => 'груши',
                                'weight' => 165
                            ],
                        ],
                        'branches' => [

                        ]
                    ]
                ]
            ],
            [
                'id' => 13,
                'fruits' => [
                    [
                        'type' => 'груши',
                        'weight' => 166
                    ],
                    [
                        'type' => 'груши',
                        'weight' => 170
                    ],
                    [
                        'type' => 'груши',
                        'weight' => 152
                    ],
                    [
                        'type' => 'груши',
                        'weight' => 157
                    ],
                ],
                'branches' => [
                    [
                        'id' => 14,
                        'fruits' => [
                            [
                                'type' => 'груши',
                                'weight' => 158
                            ],
                            [
                                'type' => 'груши',
                                'weight' => 160
                            ],
                        ],
                        'branches' => [
                        ]
                    ],
                ]
            ]
        ]
    ],
];

$treeService = new TreeService();

foreach ($trees as $tree) {
    try {
        $treeService->addTree($tree);
    } catch (Exception $e) {
        print($e->getMessage());
        exit(1);
    }
}

$fruitsByType = $treeService->collectAllFruits();

foreach ($fruitsByType as $type => $fruitsInformation) {
    print($type . ' : ' . count($fruitsInformation['fruits']) . '.шт' . PHP_EOL);
    print('общий вес : ' . $fruitsInformation['weight'] . PHP_EOL);
}
