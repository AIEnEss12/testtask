<?php

class test {
    public $x;

    public $next;

    public function __construct($x) {
        $this->x = $x;
        $this->next = null;
    }
}

function reverseObject($object) {
    $prev = null;
    $current = $object;
    $next = null;

    while ($current != null) {
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }

    return $prev;
}

$a = new test(1);
$b = new test(2);
$c = new test(3);

$a->next = $b;
$b->next = $c;
$c->next = null;

// Вывод исходного списка
var_dump($a);

// Переворачиваем список
$newtest = reverseLinkedList($a);

// Вывод перевернутого списка
var_dump($newtest);

