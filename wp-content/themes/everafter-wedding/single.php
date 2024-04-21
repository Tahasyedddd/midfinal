<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package everafter-wedding
 */
 get_header(); ?>

<main id="content" class="site-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="main-single-post-page">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <div class="entry-meta">
                  <span class="posted-on"><?php echo esc_html(get_the_date()); ?></span>
                  <span class="byline"> by <?php the_author_posts_link(); ?></span>
              </div>
              <h2 class="entry-title"><?php the_title(); ?></h2>
                <?php if ( has_post_thumbnail() ) : ?>
                   <div class="featured-image">
                      <?php the_post_thumbnail(); ?>
                   </div>
                <?php endif; ?>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
              <div class="entry-tags">
                  <?php the_tags( '<span class="tag-links">' . __( 'Tags:', 'everafter-wedding' ) . '</span> ' ); ?>
                </div>
                <div class="entry-share">
                  <span><?php esc_html_e( 'Share:', 'everafter-wedding' ); ?></span>
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><span class=""><?php esc_html_e( "Facebook", 'everafter-wedding' ) ?></span></a>
                  <a href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( get_the_title() ); ?>&url=<?php echo esc_url( get_permalink() ); ?>&via=twitterusername" target="_blank"><span class=""><?php esc_html_e( "Twitter", 'everafter-wedding' ) ?></span></a>
                  <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>&title=<?php echo esc_attr  ( get_the_title() ); ?>&summary=<?php echo esc_attr( get_the_excerpt() ); ?>&source=LinkedIn" target="_blank"><span class=""><?php esc_html_e( "Linkedin", 'everafter-wedding' ) ?></span></a>
                </div>
                <div class="post-navigation">
                <div class="nav-previous"><?php previous_post_link( '%link', '%title' ); ?></div>
                <div class="nav-next"><?php next_post_link( '%link', '%title' ); ?></div>
              </div>
            </article>
          </div>
        <?php endwhile; endif; ?>
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <?php get_sidebar(); ?>
      </div>
    </div>
      <?php
      // If comments are open or there is at least one comment, show the comment template.
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }

    ?>
  </div>
</main>



<?php get_footer(); ?>
