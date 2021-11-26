<?php

return [
    '~^/$~' => [App\Controllers\MainController::class, 'addFigurePage'],
    '~^/allFigures$~' => [App\Controllers\MainController::class, 'allFiguresPage'],
    '~^/uploadImage~' => [App\Controllers\ImageController::class, 'uploadImage'],
    '~^/drawFigure~' => [App\Controllers\ImageController::class, 'drawFigure'],
    '~^/saveToDatabase~' => [App\Controllers\ImageController::class, 'saveToDatabase']
];
