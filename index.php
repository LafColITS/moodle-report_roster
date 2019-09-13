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
 * Display a roster of students
 *
 * @package   report_roster
 * @copyright 2013 Lafayette College ITS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../config.php');
require_once(dirname(__FILE__) . '/locallib.php');

$id          = required_param('id', PARAM_INT);
$mode        = optional_param('mode', ROSTER_MODE_DISPLAY, PARAM_TEXT);
$group       = optional_param('group', 0, PARAM_INT);
$role        = optional_param('role', 0, PARAM_INT);
$defaultsize = get_config('report_roster', 'size_' . get_config('report_roster', 'size_default'));
$size        = optional_param('size', $defaultsize, PARAM_INT);
$course      = $DB->get_record('course', array('id' => $id), '*', MUST_EXIST);

require_login($course);

// Setup page.
$PAGE->set_url('/report/roster/index.php', array('id' => $id));
if ($mode === ROSTER_MODE_PRINT) {
    $PAGE->set_pagelayout('print');
} else {
    $PAGE->set_pagelayout('report');
}
$returnurl = new moodle_url('/course/view.php', array('id' => $id));

// Check permissions.
$coursecontext = context_course::instance($course->id);
require_capability('report/roster:view', $coursecontext);

// Get all the users.
if ($role > 0) {
    $userlist = get_role_users($role, $coursecontext, false, user_picture::fields('u', ['username'], 0, 0, true), null, null, $group);
} else {
    $userlist = get_enrolled_users($coursecontext, '', $group, user_picture::fields('u', ['username'], 0, 0, true));
}

// Get suspended users.
$suspended = get_suspended_userids($coursecontext);

$data = array();
foreach ($userlist as $user) {
    if (!in_array($user->id, $suspended)) {
        $item = $OUTPUT->user_picture($user, array('size' => $size, 'courseid' => $course->id));
        $item .= html_writer::tag('span', fullname($user));
        $item .= get_config('report_roster', 'show_username') ? html_writer::tag('span', $user->username) : '';
        $data[] = $item;
    }
}

// Finish setting up page.
$PAGE->set_title($course->shortname .': '. get_config('report_roster' , 'displayname'));
$PAGE->set_heading($course->fullname);
$PAGE->requires->js_call_amd('report_roster/roster', 'init');

// Display the roster to the user.
echo $OUTPUT->header();
echo html_writer::tag('button', get_string('learningmodeoff', 'report_roster'), array('id' => 'report-roster-toggle'));

$currentparams = array(
    'group' => $group,
    'role'  => $role,
    'size'  => $size,
    'mode'  => $mode
);
echo report_roster_output_action_buttons($id, $PAGE->url, $currentparams);

echo html_writer::alist($data, array('class' => 'report-roster'));
echo $OUTPUT->footer();
