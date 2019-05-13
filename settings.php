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
 * @copyright 2019 Lafayette College ITS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(
        new admin_setting_configcheckbox('report_roster/flatnav',
            get_string('settings:flatnav', 'report_roster'),
            get_string('settings:flatnav:description', 'report_roster'),
            0
        )
    );

    $settings->add(
        new admin_setting_configcheckbox('report_roster/show_username',
            get_string('settings:show_username', 'report_roster'),
            get_string('settings:show_username:description', 'report_roster'),
            0
        )
    );

    $settings->add(
        new admin_setting_configtext('report_roster/displayname',
            get_string('settings:displayname', 'report_roster'),
            get_string('settings:displayname:description', 'report_roster'),
            get_string('settings:displayname:default', 'report_roster')
        )
    );

    $settings->add(
        new admin_setting_configtextarea('report_roster/flatnav_position',
            get_string('settings:flatnav_position', 'report_roster'),
            get_string('settings:flatnav_position:description', 'report_roster'),
            get_string('settings:flatnav_position:default', 'report_roster')
        )
    );
}
