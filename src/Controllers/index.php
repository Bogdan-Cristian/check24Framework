<?php
var_dump(__DIR__);
// Loading the Twig Template
$template = $twig->load('index.html.twig');

$posts = [
    'bogdan' => [
        [
            'Name' => "Title1",
            "description" => "this is some description",
            'date' => "28.01.2021"
        ],
        [
            'Name' => "Title2",
            "description" => "this is some description",
            'date' => "28.01.2021"
        ],
        [
            'Name' => "Title3",
            "description" => "this is some description",
            'date' => "28.01.2021"
        ],
    ],
    'Oleg' => [
        [
            'Name' => "Title4",
            "description" => "this is some description",
            'date' => "28.01.2021"
        ],
        [
            'Name' => "Title5",
            "description" => "this is some description",
            'date' => "28.01.2021"
        ],
        [
            'Name' => "Title6",
            "description" => "this is some description",
            'date' => "28.01.2021"
        ],
    ],
];
// Returning the page response
echo $template->render(['name' => 'Oleg konyk', 'profession' => 'Senior', 'posts' => $posts]);
