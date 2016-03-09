<?php
/**
 * The template used for displaying archive content for custom post types in category.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isRoot;

?>

<?php // Get today's date in the right format
$todaysDate = date('m/d/Y H:i:s');
?>

    <div class="exhibits-feed">
        <div class="entry-categories">
            <div class="entry-cats-list">
                <?php
                foreach((get_the_category()) as $category) {
                    echo '<span class="category-bg"><span class="category-init">' . (substr($category->cat_name,0,1))  . '</span></span>' . '<span class="catName">' . $category->cat_name . ' Exhibit' . '</span> ';
                }
                ?>
            </div>
        </div>

        <div class="category-post">
            <div class="category-image" style="background-image: url('&lt;?php get_stylesheet_directory_uri(); the_field('exhibit_thumbnail_image'); ?&gt;');"></div>

            <div class="category-post-content">
                <h4><a class="exhibit-title" href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>

                <div class="entry-summary">
                    <p><?php custom_excerpt(35, '...') ?></p>
                </div>

                <div class="exhibit-ends">
                    Ends <?php the_field('end_date'); ?>
                </div>
            </div>
        </div>
        
        <?php if (get_field('sponsored')) : ?>

        <div class="sponsored">
            <?php the_field('sponsored'); ?>
        </div><?php endif; ?>
    </div>
