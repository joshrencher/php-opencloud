<?php

require __DIR__ . '/../../vendor/autoload.php';

use OpenCloud\Rackspace;
use OpenCloud\Common\Collection\ResourceList;

$client = new Rackspace(Rackspace::US_IDENTITY_ENDPOINT, [
    'username' => 'jamiehannaford1',
    'apiKey'   => '8d28b0ee0c694a6d9db6e973ebfb2d67',
    //'tenantName' => 848195
]);
$client->authenticate();

$service = $client->objectStoreService('cloudFiles', 'ORD');

$container = $service->getContainer('ORD_TEST_1');

$list = $container->objectList();

while ($object = $list->next()) {
    echo $object->getName(), PHP_EOL;
}