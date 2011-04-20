<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '&mdash;' ); ?></title>
    <?php if ( is_singular() && get_option( 'thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="container">
      <div id="header">
					<div id="header_container">
						<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		        <p id="description"><?php bloginfo( 'description' ); ?></p>
		        <?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
		          <ul><?php wp_list_pages( 'title_li=&depth=-1' ); ?></ul>
		        <?php endif; ?>
					</div>
      </div><!-- header -->
      <div id="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_content(); ?>
            <?php if ( !is_singular() && get_the_title() == '' ) : ?>
              <a href="<?php the_permalink(); ?>">(more...)</a>
            <?php endif; ?>
            <?php if ( is_singular() ) : ?>
              <div class="pagination"><?php wp_link_pages(); ?></div>
            <?php endif; ?>
            <div class="clear"> </div>
          </div><!-- post_class() -->
          <?php if ( is_singular() ) : ?>
            <div class="meta">
              <p>Posted by <?php the_author_posts_link(); ?>
              on <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a>
              in <?php the_category( ', ' ); ?><?php the_tags( ', ' ); ?></p>
            </div><!-- meta -->
            <?php comments_template(); ?>
          <?php endif; ?>
        <?php endwhile; else: ?>
          <div class="hentry"><h2>Sorry, the page you requested cannot be found</h2></div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'widgets' ) ) : ?>
          <div class="widgets"><?php dynamic_sidebar( 'widgets' ); ?></div>
        <?php endif; ?>
        <?php if ( is_singular() || is_404() ) : ?>
          <div class="left"><a href="<?php bloginfo( 'url' ); ?>">&laquo; Home page</a></div>
        <?php else : ?>
          <div class="left"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
          <div class="right"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
        <?php endif; ?>
        <div class="clear"> </div>
      </div><!-- content -->

			<div id="footer">
					<div id="footer_container">
						<div id="functions">
							<ul>
								<li>
									<a href="http://www.twitter.com/ericteubert">Twitter</a>
								</li>
								<li>
									<a href="http://feeds.feedburner.com/FarBeyondProgramming">RSS Feed</a>
								</li>
								<li>
									<a href="/date-archive">Archive</a>
								</li>
								<li>
									<a href="https://github.com/eteubert">GitHub</a>
								</li>
							</ul>
						</div>
						<div id="about">
							<p>
								Hi! I'm Eric.
							</p>
							<p>
								I am a computing student who is in love with developing software of all kinds. I am continuously trying to get better at what I do.
							</p>
							<p>
								This blog is supposed to be a place to share my thoughts and the knowledge I gather on my path.
							</p>
						</div>
						<div id="copyright">
							Eric Teubert • Far Beyond Programming
						</div>
					</div>
      </div><!-- header -->

    </div><!-- container -->
    <?php wp_footer(); ?>
  </body>
</html>