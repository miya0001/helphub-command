<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}

/**
 * The commands to migrate/manage HelpHub
 *
 * @subpackage commands/community
 * @maintainer Takayuki Miyauchi
 */
class HelpHub extends WP_CLI_Command {
  /**
   * Migrate contents from `pages` to `article` for HelpHub.
   */
  public function migrate() {
    $posts = get_posts( array(
      'post_type' => 'page',
      'posts_per_page' => -1,
    ) );

    foreach ( $posts as $post ) {
        set_post_type( $post->ID, 'article' );
    }
  }
}

WP_CLI::add_command( 'helphub', 'HelpHub' );
