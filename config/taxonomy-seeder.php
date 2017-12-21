<?php

return [
    'vocabularies' => [
        [
            'system_name' => 'categories',
            'name' => 'Категории',
            'description' => 'Словарь категорий сайта',
            'terms' => [
                [
                    'name' => 'Автоэлектроника',
                    'description' => 'Электроника для вашего авто',
                    'terms' => [
                        ['name' => 'Автосигнализации', 'description' => 'Автосигнализации и соп. товары'],
                        ['name' => 'GPS навигаторы', 'description' => 'GPS навигаторы и треккеры'],
                    ],
                ],
                ['name' => 'Колеса и диски', 'description' => 'Шины, диски, колпаки'],
                [
                    'name' => 'Автохимия',
                    'description' => 'Автохимия и автокосметика',
                    'terms' => [
                        ['name' => 'Омиватели', 'description' => 'Омыватели летние и зимнии для стекла'],
                        [
                            'name' => 'Чистка кузова',
                            'description' => 'Инструменты и химия для чистки кузова',
                            'terms' => [
                                ['name' => 'Полироли', 'description' => 'Полироли для кузова'],
                            ],
                        ],
                    ],
                ],
                ['name' => 'Тюнинг', 'description' => 'Спойлеры и наклейки для кузова авто'],
            ],
        ],
        [
            'system_name' => 'regions',
            'name' => 'Регионы',
            'description' => 'Словарь регионов страны',
            'terms' => [
                ['name' => 'Кировоградская', 'description' => 'Кировоградская область'],
                ['name' => 'Волынская', 'description' => 'Волынская область'],
                ['name' => 'Киевская', 'description' => 'Киевская область'],
                ['name' => 'Донецкая', 'description' => 'Донецкая область'],
            ],
        ],
        [
            'system_name' => 'quantities',
            'name' => 'Единицы измерения количества',
            'description' => 'Словарь едениц измерения количества товаров/услуг',
            'terms' => [
                ['name' => 'см.', 'description' => 'сантиметров'],
                ['name' => 'т.', 'description' => 'тонн'],
                ['name' => 'шт.', 'description' => 'штук'],
            ],
        ],
        [
            'system_name' => 'payment-methods',
            'name' => 'Способы оплаты',
            'description' => 'Словарь способов оплаты товаров/услуг',
            'terms' => [
                ['name' => 'предоплата', 'description' => 'оплата проводится наперед'],
                ['name' => 'оплата при получении', 'description' => 'оплата проводится при получении товара'],
            ],
        ],
    ],
];