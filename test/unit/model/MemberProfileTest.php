<?php

include_once dirname(__FILE__) . '/../../bootstrap/unit.php';
include_once dirname(__FILE__) . '/../../bootstrap/database.php';

$t = new lime_test(null, new lime_output_color());

//------------------------------------------------------------

$t->diag('Member::__toString()');

//------------------------------------------------------------

$t->diag('Member::getValue()');

//------------------------------------------------------------

$t->diag('Member::hydrateProfiles()');

//------------------------------------------------------------

$t->diag('Member::getName()');

//------------------------------------------------------------

$t->diag('Member::getCaption()');
