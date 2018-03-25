<?php

//include 'db_config.php';

/*
$units = array();
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';', DB_LOGIN, DB_PASS);
    foreach ($db->query('SELECT * from Unit') as $unit) {
        $units[$row['id']] = $unit;
    }
    $db = null;
} catch (PDOException $e) {
    print "PDO error occured: " . $e->getMessage();
    die();
}
*/

// to make local tests
$units = array(
    '8pce' => array('id' => '8pce', 'Name' => 'LOT DE 8 PCE', 'Quantity' => 8,    'referenceUnit' => 'pce'),
    '6pce' => array('id' => '6pce', 'Name' => 'LOT DE 6 PCE', 'Quantity' => 6,    'referenceUnit' => 'pce'),
    '4pce' => array('id' => '4pce', 'Name' => 'LOT DE 4 PCE', 'Quantity' => 4,    'referenceUnit' => 'pce'),
    '3pce' => array('id' => '3pce', 'Name' => 'LOT DE 3 PCE', 'Quantity' => 3,    'referenceUnit' => 'pce'),
    'pce'  => array('id' => 'pce',  'Name' => 'pce',          'Quantity' => 3,    'referenceUnit' => 'kg'),
    'kg'   => array('id' => 'kg',   'Name' => 'kg',           'Quantity' => 1000, 'referenceUnit' => 'g'),
    'g'    => array('id' => 'g',    'Name' => 'g',            'Quantity' => null, 'referenceUnit' => null),
    'cs'   => array('id' => 'cs',   'Name' => 'cs',           'Quantity' => 20,   'referenceUnit' => 'g')
);


function convertUnit($targetUnit, $referenceUnit)
{
    global $units;

    $formerTargetUnit = $units[$targetUnit];
    $targetUnit       = $formerTargetUnit;

    $formerRefUnit = $units[$referenceUnit];
    $referenceUnit = $formerRefUnit;

    $factor         = 1;

    $unitsCount     = count($units);
    $conversionLoop = 0;
    while (++$conversionLoop < $unitsCount) {
        $targetUnitRefUnit    = $targetUnit['referenceUnit'];
        $referenceUnitRefUnit = $referenceUnit['referenceUnit'];

        if ($targetUnitRefUnit === $referenceUnitRefUnit) {
            if ($targetUnitRefUnit !== null && $referenceUnitRefUnit !== null) {
                $factor *= $targetUnit['Quantity'] / $referenceUnit['Quantity'];
            }
    
            break;
        }

        if ($targetUnitRefUnit !== null) {
            $factor *= $targetUnit['Quantity'];
            $targetUnit    = $units[$targetUnitRefUnit];
        }

        if ($referenceUnitRefUnit !== null) {
            $factor /= $referenceUnit['Quantity'];
            $referenceUnit = $units[$referenceUnitRefUnit];
        }
    }

    $factor = round($factor, 2);

    print $formerTargetUnit['id'] . ' = ' . $factor . ' ' . $formerRefUnit['id'] . "\n";

    return $factor;
}


$factor = convertUnit('3pce', 'cs');
$factor = convertUnit('4pce', '6pce');
$factor = convertUnit('6pce', '4pce');
$factor = convertUnit('8pce', 'pce');
$factor = convertUnit('8pce', 'g');
$factor = convertUnit('g', '8pce'); // round makes a result of 0
$factor = convertUnit('kg', 'g');
$factor = convertUnit('kg', 'cs');
$factor = convertUnit('g', 'cs');
$factor = convertUnit('pce', 'cs');
$factor = convertUnit('3pce', 'kg');
