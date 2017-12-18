<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new OrderWorkflow(
    'shirt',
    '3141592',
    '1600 Pennsylvania Ave NW, Washington, DC 20500, USA'
);

$workflow->dispatch();

sleep(3);

OrderWorkflow::whereId('3141592')->send(new AddressUpdatedEvent('One Infinite Loop Cupertino, CA 95014'));
