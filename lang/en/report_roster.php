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
 * Strings for component 'report_roster', language 'en'
 *
 * @package   report_roster
 * @copyright 2013 Lafayette College ITS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$string['allusers'] = 'All users';
$string['displaymode'] = 'Display mode';
$string['learningmodeoff'] = 'Learning mode off';
$string['learningmodeon'] = 'Learning mode on';
$string['pluginname'] = 'Roster';
$string['printmode'] = 'Printable';
$string['privacy:metadata'] = 'The roster report only shows data stored in other locations.';
$string['roster:view'] = 'View roster course report';
$string['settings:displayname'] = 'Display name';
$string['settings:displayname:description'] = 'This will display on the report page and in the navigation link.';
$string['settings:displayname:default'] = 'Roster';
$string['settings:show_username'] = 'Show username';
$string['settings:show_username:description'] = 'Show username below fullname in the Roster Report';
$string['settings:flatnav'] = 'Display in flat navigation?';
$string['settings:flatnav:description'] = 'If checked, a link to the Roster report will be added to the Boost flat navigation.
(Under older themes like More, it will appear in the Navigation block under Current course > {coursename})';
$string['settings:flatnav_position'] = 'Position in Flat Navigation';
$string['settings:flatnav_position:description'] = 'A link to the report will be added *above* the link at the top of this list.
If not found, it will try the next in the list, and so on. The first word on each line is the link identifier; everything afterward
is ignored (so that the identifiers can be labelled). The main course navigation nodes are included by default; the identifiers for
additional nodes can be obtained by looking at the `data-key` property of the relevant `<a>`.';
$string['settings:flatnav_position:default'] = "
badgesview (Badges)
competencies (Competencies)
grades (Grades)
participants (Participants)
";
$string['webmode'] = 'Web report';

