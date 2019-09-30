<?php
declare(strict_types=1);
session_start();

ini_set('display_errors', (string)1);
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

$word = "world";

if ($word === "hello") {
    echo 'the word is hello';
} else {
    echo 'No hello for you';
}
echo "<hr>";

$list = [
    'a',
    'b',
    'c'
];
//var_dump($list);
for($i=0; $i < count($list); $i++) {
    echo $list[$i] . "<br>";
}

var_dump("1" + "1");
var_dump(1 . 1);

echo '<hr>';

$list = [
    'first' => 'a',
    'second' =>'b',
    'third' =>'c'
];

foreach($list AS $key => $item) {
    echo $key .": ". $item . "<br>";
}

echo '<hr>';
$pokemon = [
    'name' => 'eevee',
    'powers' => [
        'being cute',
        'evolving into many forms'
    ]
];

foreach($pokemon AS $key => $item) {
    if(is_array($item)) {
        foreach ($item AS $key => $childItem) {
            echo $key .": ". $childItem . "<br>";
        }
    } else {
        echo $key .": ". $item . "<br>";
    }
}

echo '<hr>';

function footer(int $year) : string {
    return '<footer>&copy; '. ($year+1) .' Becode</footer>';
}
?>
<p>Hfddgfdgdfg</p>
<?php echo footer((int)date("Y"));
echo '<hr>';
var_dump($_COOKIE);
?>
<form method="post">
    <input type="text" name="animal" value="monkey" />
    <input type="submit">
</form>
<hr>
<?php
if(!isset($_SESSION['times'])) {
    $_SESSION['times'] = 1;
} else {
    $_SESSION['times']++;
}


echo '<p>I have visited this page '. $_SESSION['times'] . ' times';













