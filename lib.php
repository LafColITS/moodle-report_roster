<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Library functions for the roster report.
 *
 * @package   report_roster
 * @copyright 2013 Lafayette College ITS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Extends core navigation to display the roster link in the course administration.
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass        $course The course object
 * @param context         $context The course context
 */
function report_roster_extend_navigation_course($navigation, $course, $context) {
    if (has_capability('report/roster:view', $context)) {
        // If the setting is enabled, put a link to the report in the flat navigation.
        if (get_config('report_roster', 'flatnav')) {
            report_roster_add_to_flatnav();
        }

        $url = new moodle_url('/report/roster/index.php', array('id' => $course->id));
        $navigation->add(get_string('pluginname', 'report_roster'), $url,
                navigation_node::TYPE_SETTING, null, null, new pix_icon('i/report', ''));
    }
}

/**
 * Adds the Roster link to the flat course navigation.
 *
 * @return void
 */
function report_roster_add_to_flatnav() {
    global $PAGE, $COURSE;

    // Create the link.
    $node = $PAGE->navigation->create(
        get_config('report_roster', 'displayname'),   // Link text.
        '/report/roster/index.php?id=' . $COURSE->id, // URL.
        navigation_node::TYPE_SETTING,                // Node type.
        null,                                         // "Shorttext".
        'report_roster',                              // Key.
        new pix_icon('t/roster', '', 'report_roster') // Icon.
    );

    // Get course navigation node.
    $coursenode = $PAGE->navigation->find($COURSE->id, navigation_node::TYPE_COURSE);
    $children   = $coursenode->children;

    // Figure out where to put the link, based on config.
    // Note that the addkey is the node which our new link will be added *above*.
    $addkey    = '';
    $keyconfig = get_config('report_roster', 'flatnav_position');
    $keys      = explode("\n", $keyconfig);
    $keys      = array_map(function($k) {
        return explode(' ', $k)[0];
    }, $keys);

    foreach ($keys as $key) {
        if ($children->find($key)) {
            $addkey = $key;
            break;
        }
    }

    // Add our link to the navigation.
    $coursenode->add_node($node, $addkey);
}

/**
 * Creates a mapping between the Moodle icon system and Font Awesome icons.
 * See https://docs.moodle.org/dev/Moodle_icons#Font_awesome_icons.
 *
 * @return array
 */
function report_roster_get_fontawesome_icon_map() {
    return [
        'report_roster:t/roster' => 'fa-clipboard',
    ];
}
