<?php

return [
    'required' => ':attribute обязательно для заполнения',
    'string' => ':attribute должно быть строкой',
    'max' => [
        'string' => ':attribute не может превышать :max символов',
        'numeric' => ':attribute не может быть больше :max',
    ],
    'min' => [
        'string' => ':attribute должно содержать как минимум :min символов',
    ],
    'email' => ':attribute должно быть действительным электронным адресом',
    'unique' => ':attribute уже занятa',
    'regex' => ':attribute имеет неверный формат',
    'attributes' => [
        'name' => 'Имя',
        'phone' => 'Телефон',
        'email' => 'Электронная почта',
    ],
];