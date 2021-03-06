<?php

include_once dirname(__FILE__) . '/../www/includes/easyparliament/init.php';

$parties = MySociety\TheyWorkForYou\Party::getParties();
$policies = new MySociety\TheyWorkForYou\Policies;

$party_count = 0;
foreach ( $parties as $party ) {
    $party = new MySociety\TheyWorkForYou\Party($party);

    $positions = $party->calculateAllPolicyPositions($policies);

    if ( count( $positions ) ) {
        $party_count++;
    }

    foreach ( $positions as $position ) {
        $party->cache_position( $position );
    }
}

print "cached positions for $party_count parties\n";
