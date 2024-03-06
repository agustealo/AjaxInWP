<?php
/**
 * The Template for displaying all single posts for the AjaxinWP Theme.
 * Developed by Zeus Eternal
 */

get_header(); ?>

<div id="ajax-container">

    <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'ajaxinwp'), 'after' => '</div>')); ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php edit_post_link(__('Edit', 'ajaxinwp'), '<span class="edit-link">', '</span>'); ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-## -->

        <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        ?>

        <?php
            // Navigation to the next/previous post.
            the_post_navigation(array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'ajaxinwp') . '</span> ' .
                               '<span class="screen-reader-text">' . __('Next post:', 'ajaxinwp') . '</span> ' .
                               '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'ajaxinwp') . '</span> ' .
                               '<span class="screen-reader-text">' . __('Previous post:', 'ajaxinwp') . '</span> ' .
                               '<span class="post-title">%title</span>',
            ));
        ?>

    <?php endwhile; // end of the loop. ?>

</div><!-- #ajax-container -->

<?php get_footer(); ?>
