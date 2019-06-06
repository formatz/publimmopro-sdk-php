<?php
include '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use \PublimmoPro\Client;
use \PublimmoPro\Mailer;

$myClient = new Client(10543, 'c8da38eada82dc8374470c4d860cbd');

// get all available houses
$objectEntity = $myClient->query(148904);
$object = $objectEntity->raw(); 
?>
<h1><?= $object->transaction ?> <?= $object->descShort ?></h1>
<p>Price : <?= $object->prix ?></p>
<p>Surface : <?= $object->surface ?></p>
<hr>
<p><?= $object->desc ?></p>
<details>
    <summary>See details</summary>
    <pre><?php print_r($object) ?></pre>
</details>
<details>
    <summary>See formular</summary>
    <?php
    $userdata = [
        // mandatory fields
        'title' => 'Mr.',
        'lastname' => 'Doe',
        'firstname' => 'John',
        'email' => 'john@doe.test',
        'phone' => '021 555 55 55',
        'language' => 'en',

        // secondary fields
        'address' => 'Test Road 1',
        'zipcode' => '31232',
        'city' => 'City of tests',
        'country' => 'TestCountry',
        'message' => "Hey, this is my message !\n on multiple lines",
    ];
    $mailer = new Mailer($objectEntity, $userdata, 'https://testwebsite.com');
    ?>
    <pre><?= $mailer->getEmailBody() ?></pre>
    <blockquote>This is the email body you will have to send by email.</blockquote>
</details>
<?php
