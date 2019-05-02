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
 * This file creates a behat step definition
 *
 * @package    report_roster
 * @copyright  2019 Lafayette College
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../../../lib/behat/behat_base.php');

use Behat\Behat\Context\Step\Given as Given;
use Behat\Gherkin\Node\PyStringNode as PyStringNode;

/**
 * Custom step definitions
 *
 * @package    report_roster
 * @copyright  2019 Lafayette College
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_report_roster extends behat_base {
    /**
     * Sets a multiline config value as admin
     *
     * @Given /^I set the multiline "(?P<plugin_string>(?:[^"]|\\")*)" "(?P<name_string>(?:[^"]|\\")*)" setting as admin to:$/
     * @param string $plugin The plugins Frankenstyle name
     * @param string $name The name of the setting to be set_config
     * @param PyStringNode $value A triple-quote delimited text block to be set as the value of the setting
     */
    public function i_set_the_multiline_setting_as_admin_to($plugin, $name, PyStringNode $value) {
        set_config($name, $value->getRaw(), $plugin);
    }
}