@report @report_roster @report_roster_flatnav
Feature: Option to display in Boost flat navigation
  In order to test the flat navigation display
  As an admin
  I need to do some stuff

  Background:
    Given the following "courses" exist:
      | fullname | shortname | category | groupmode |
      | Course 1 | C1        | 0        | 1         |

  @javascript
  Scenario: Display in flat navigation
    Given I log in as "admin"
    And the following config values are set as admin:
      | config  | value | plugin        |
      | flatnav | 1     | report_roster |
    When I am on "Course 1" course homepage
    Then "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should be visible
    And "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should appear before "#nav-drawer > nav a.list-group-item[data-key=badgesview]" "css_element"
    And "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should appear after "#nav-drawer > nav a.list-group-item[data-key=participants]" "css_element"
    And I should see "Roster" in the "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element"

    And the following config values are set as admin:
      | config      | value          | plugin        |
      | flatnav     | 1              | report_roster |
      | displayname | Something Else | report_roster |
    And I set report_roster/flatnav_position to:
    """
    competencies (Competencies)
    grades (Grades)
    participants (Participants)
    """
    When I am on "Course 1" course homepage
    Then "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should be visible
    And "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should appear before "#nav-drawer > nav a.list-group-item[data-key=competencies]" "css_element"
    And "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should appear after "#nav-drawer > nav a.list-group-item[data-key=badgesview]" "css_element"
    And I should see "Something Else" in the "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element"

    And the following config values are set as admin:
      | config      | value          | plugin        |
      | flatnav     | 1              | report_roster |
      | displayname | Something ELSE | report_roster |
    And I set report_roster/flatnav_position to:
    """
    typocompetencies (Competencies)
    grades (Grades)
    participants (Participants)
    """
    When I am on "Course 1" course homepage
    Then "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should be visible
    And "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should appear before "#nav-drawer > nav a.list-group-item[data-key=grades]" "css_element"
    And "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element" should appear after "#nav-drawer > nav a.list-group-item[data-key=competencies]" "css_element"
    And I should see "Something ELSE" in the "#nav-drawer > nav a.list-group-item[data-key=report_roster]" "css_element"
