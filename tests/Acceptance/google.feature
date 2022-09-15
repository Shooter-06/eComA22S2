Feature: google
  In order to find things on the internet 
  As a user
  I need to input search terms and click to see results

  Scenario: try googling "dog"
  Given I am on "http://www.Google.ca"
  When I enter "dog" in the search box
  And click Search
  Then I see "dog"

  Scenario: try googling "fish"
  Given I am on "http://www.Google.ca"
  When I enter "fish" in the search box
  And click Search
  Then I see "fish"