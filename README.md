# Roster

[![Build Status](https://api.travis-ci.org/LafColITS/moodle-report_roster.png)](https://api.travis-ci.org/LafColITS/moodle-report_roster)

This is a simple report which displays the user pictures for everyone enrolled in the given course.

## Requirements
- Moodle 3.5 (build 2018051700 or later)

## Installation
Copy the roster folder into your /report directory and visit your Admin Notification page to complete the installation.

## Administration
There are several options available to the admin from the Roster Report settings page.

### General

**Show username:** If enabled, username will be shown below full name in the Roster Report.

**Display name:** The display string used by the Roster Report on the front end. Will appear in the flat navigation (if enabled) and on the Roster Report page.

### Flat Navigation

**Display in flat navigation:** If enabled, the plugin will attempt to display a link to the Roster Report in the Boost flat navigation menu (left sidebar).

**Position in flat navigation:** A newline separated list of flat navigation link identifiers. A link to the Roster Report will be added above the link at the top of this list. If not found, the next link down will be tried, and so on. The first word on each line is the link identifier; everything afterward is ignored (so that the identifiers can be labeled). The main course navigation nodes are included by default; the identifiers for additional nodes can be obtained by looking at the `data-key` property of the relevant `<a>`.

### User Image Size

**Default size:** The default size, in pixels, of the user images in the Roster Report. Should match one of the three size level options below. This is the size that will be used when a user first navigates to the report and has not requested a specific size yet.

**Size: Small:** The size, in pixels, of the user images when the user has selected "Small".

**Size: Medium:** ...when the user has selected "Medium".

**Size: Large:** ... when the user has selected "Large".

## Usage
Once the plugin is installed, you can access the functionality by going to
Reports > Roster within the course, or by going to the URL `<mymoodle>/report/roster/index.php?id=<courseid>.`

There are several options available when viewing the Roster Report:

**Learning mode** turns the display of names on and off
**Group** filtering to display only users in the selected group
**Role** filtering to display only users with the selected role
**Size** changes the display size of the user images based on levels configured in the admin settings (see above)
**Display mode** which toggles between the regular web view and a version of the report suitable for printing

## Author
Charles Fulton (fultonc@lafayette.edu)
