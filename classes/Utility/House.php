<?php

namespace MySociety\TheyWorkForYou\Utility;

/**
 * House Utilities
 *
 * Utility functions related to house types
 */

class House
{
    public static function division_house_name_to_number($name) {
        $name_to_number = array(
            'commons' => HOUSE_TYPE_COMMONS,
            'lords' => HOUSE_TYPE_LORDS,
            'scotland' => HOUSE_TYPE_SCOTLAND,
            'pbc' => HOUSE_TYPE_COMMONS,
        );

        return $name_to_number[$name];
    }

    public static function house_to_members($house) {
        $house_to_members = array(
            HOUSE_TYPE_COMMONS => array(
              'singular' => 'MP',
              'plural'   => 'MPs'
            ),
            HOUSE_TYPE_LORDS => array(
              'singular' => 'Member of the House of Lords',
              'plural'   => 'Members of the House of Lords'
            ),
            HOUSE_TYPE_NI => array(
              'singular' => 'MLA',
              'plural'   => 'MLAs'
            ),
            HOUSE_TYPE_SCOTLAND => array(
              'singular' => 'MSP',
              'plural'   => 'MSPs'
            )
        );

        return $house_to_members[$house];
    }

    public static function getCountryDetails($house) {
        $details = array(
            HOUSE_TYPE_COMMONS => array (
                'country' => 'UK',
                'assembly' => 'uk-commons',
                'location' => '&ndash; in the House of Commons',
                'cons_type' => 'WMC',
                'assembly_name' => 'House of Commons',
            ),
            HOUSE_TYPE_NI => array (
                'country' => 'NORTHERN IRELAND',
                'assembly' => 'ni',
                'location' => '&ndash; in the Northern Ireland Assembly',
                'cons_type' => 'NIE',
                'assembly_name' => 'Northern Ireland Assembly',
            ),
            HOUSE_TYPE_SCOTLAND => array (
                'country' => 'SCOTLAND',
                'assembly' => 'scotland',
                'location' => '&ndash; in the Scottish Parliament',
                'cons_type' => 'SPC',
                'assembly_name' => 'Scottish Parliament',
            ),
            HOUSE_TYPE_LORDS => array (
                'country' => 'UK',
                'assembly' => 'uk-lords',
                'location' => '&ndash; in the House of Lords',
                'cons_type' => '',
                'assembly_name' => 'House of Lords',
            )
        );

        $detail = $details[$house];
        return array($detail['country'], $detail['location'], $detail['assembly'], $detail['cons_type'], $detail['assembly_name']);
    }

    public static function majorToHouse($major) {
        $major_to_house = array(
            1 => array(1),
            2 => array(1),
            3 => array(1, 2),
            4 => array(1, 2),
            5 => array(3),
            6 => array(1),
            7 => array(4),
            8 => array(4),
            101 => array(2),
        );

        return $major_to_house[$major];
    }
}
