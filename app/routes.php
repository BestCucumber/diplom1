<?php
// Теперь маршруты указывают на функции контроллера
// Формат: 'адрес' => 'название_контроллера@название_функции'

return [
    '/' => ['PageController', 'index'],
    '/news' => ['PageController', 'news'],
    '/profile' => ['PageController', 'profile'],
    '/auto' => ['PageController', 'auto'],
    '/reg' => ['PageController', 'reg'],
    '/archive' => ['PageController', 'index'],
    '/sign-in' => ['PageController', 'index'],
    '/sign-up' => ['PageController', 'index']
];

?>