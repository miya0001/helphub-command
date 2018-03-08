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
class HelpHub_Command extends WP_CLI_Command {
  /**
   * Migrate contents from `pages` to `article` for HelpHub.
   */
  public function migrate() {
    $posts = get_posts( array(
      'post_type' => 'post',
      'posts_per_page' => -1,
			'post_status' => 'any',
    ) );

    foreach ( $posts as $post ) {
        set_post_type( $post->ID, 'helphub_article' );
    }
  }
}
