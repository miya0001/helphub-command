Feature: Test that WP-CLI loads.

  Scenario: WP-CLI loads for your tests
    Given a WP install

    When I run `wp eval 'echo "Hello world.";'`
    Then STDOUT should contain:
      """
      Hello world.
      """

  Scenario: Convert all contents from `post` to `article`
    Given a WP install
    And I run `wp post generate --post_type=post --count=10`
    And I run `wp helphub migrate`

    When I run `wp post list --post_type=post --format=count`
    Then STDOUT should be:
      """
      0
      """
    When I run `wp post list --post_type=helphub_article --format=count`
    Then STDOUT should be:
      """
      11
      """
