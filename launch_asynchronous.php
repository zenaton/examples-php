<?php

require __DIR__.'/autoload.php';

$workflow = new SendInvitationsWorkflow(
    ['Gilles', 'Julien', 'Oussama', 'Alice', 'Charlotte', 'Balthazar', 'Annabelle', 'Louis']
);

$workflow->dispatch();
