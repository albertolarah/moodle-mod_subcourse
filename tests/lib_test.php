<?php
// This file is part of Moodle - https://moodle.org/
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

namespace mod_subcourse;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/mod/subcourse/lib.php');

/**
 * Unit tests for the functions in the lib.php file.
 *
 * @package     mod_subcourse
 * @category    test
 * @copyright   2026 Catalyst IT
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers      ::subcourse_supports
 */
final class lib_test extends \advanced_testcase {
    /**
     * The module must not declare the removed groupmembersonly feature.
     *
     * Moodle 5.3 refuses to install or upgrade any module that still declares it (MDL-83231).
     */
    public function test_does_not_declare_groupmembersonly(): void {
        $this->assertNull(subcourse_supports('groupmembersonly'));
    }

    /**
     * The module still declares the group features it really supports.
     */
    public function test_declares_groups_and_groupings(): void {
        $this->assertTrue(subcourse_supports(FEATURE_GROUPS));
        $this->assertTrue(subcourse_supports(FEATURE_GROUPINGS));
    }
}
