<?php
include '../vendor/autoload.php';

use \PublimmoPro\Client;

$myClient = new Client(10543, 'c8da38eada82dc8374470c4d860cbd');

// get all available houses
$objectCollection = $myClient->setType(Client::HOUSE)
       ->setDisponiblite(Client::AVAILABILITY_IS_AVAILABLE)
       ->query();

// sort them by price ascending
$objects = $objectCollection->sort('prix:asc:integer')->get();

echo '<h1>Found '.$objectCollection->getTotal().' objects</h1>';

foreach ($objects as $object) {
?>
    <h2><?= $object->transaction ?> <?= $object->desc ?></h2>
    <p>Price : <?= $object->prix ?></p>
    <details>
        <summary>See details</summary>
        <pre><?php print_r($object) ?></pre>
    </details>
<?php
}
