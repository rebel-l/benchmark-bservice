<?php
/**
 * Just a benchmark file returning "Hello Word!" in a JSON string. With Parameter name it is possible to rename the
 * word "World" with your name.
 *
 * @author Rebel-L <dj@rebel-l.net>
 * @copyright (c) 2016 by Rebel-L <www.rebel-l.net>
 * @license GPL-3.0
 * @license http://opensource.org/licenses/GPL-3.0 GNU GENERAL PUBLIC LICENSE
 *
 *
 * Date: 02.03.2016
 * Time: 23:10
 */

$name = 'World';
if (isset($_GET['name'])) {
	$name = $_GET['name'];
}

$sentence = new stdClass();
$sentence->sentence = 'Hello ' . $name . '!';

header('Content-Type: application/json');
echo json_encode($sentence);