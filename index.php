<?php

/*
1. Написать функцию render(string $path, array $vars = []). Ключ массива $vars должен преобразоваться в переменную. Например: "number" -> $number
2. Написать функцию tag(string $name, $body, array $arguments = [], bool $selfClosing = false).
Пример:
tag('a', 'home', ['href' => 'index.php']) -> <a href="index.php">home</a>
tag('input', '', ['name' => 'date'], true) -> <input name='date' />
*/

// 1

function render(string $path, array $vars = []){
    if(file_exists($path)){
        foreach($vars as $key => $value){
            $$key = $value;
        }
        include $path;
    }
    else
        die("File is not exist");
}

// 2
function tag(string $name, $body, array $arguments = [], bool $selfClosing = false)
{
    $result = "<$name";
    foreach ($arguments as $key => $value) {
        $result .= " {$key}=\"{$value}\"";
    }
    if ($selfClosing) {
        $result .= " />";
    } else {
        $result .= " >$body</$name>";
    }
    return $result;
}

?>

<!DOCTYPE html>
<html lang="en">
    <title>Document</title>
</head>
<body>
    <?= tag('a', 'home', ['href' => 'index.php'])?>
    <?= tag('input', '', ['name' => 'date'], true)?>
</body>
</html>