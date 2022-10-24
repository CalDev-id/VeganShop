<?php
require_once('menu.php');

$juice = new Menu('GreenSalad', 6,'A green salad filled with cabbage, mustard greens, and added chicken pieces for a more delicious.', './img/vegan1.png');
$coffee = new Menu('BeefSalad', 5,'A green salad filled with cabbage, mustard greens, and added chicken pieces for a more delicious.', './img/vegan5.png');
$pasta = new Menu('NudeSalad', 12,'A green salad filled with cabbage, mustard greens, and added chicken pieces for a more delicious.', './img/vegan4.png');

$menus = array($juice, $coffee, $pasta);

?>