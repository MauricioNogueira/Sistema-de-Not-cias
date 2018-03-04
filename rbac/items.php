<?php
return [
    'cadastrarAdmin' => [
        'type' => 2,
        'description' => 'Cadastrar novo administrador',
    ],
    'excluir-usuario' => [
        'type' => 1,
        'description' => 'Excluir Usuario',
    ],
    'superAdmin' => [
        'type' => 1,
        'children' => [
            'cadastrarAdmin',
            'excluir-usuario',
        ],
    ],
];
