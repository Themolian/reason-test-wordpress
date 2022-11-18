<?php 
    get_header();
    get_template_part('parts/hero');

    $event = get_field('event');
?>

<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
        <main class="main">
            <div class="main-inner">
                <section class="event">
                    <div class="event__image">
                        <?php if($event['image']) : ?>
                            <img src="<?php echo $event['image']['url'] ?>" alt="<?php echo $event['image']['title']; ?>">
                        <?php else: ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif ?>
                    </div>
                    <div class="event__body">
                        <?php if($event['title']) : ?>
                            <h2><?php echo $event['title']; ?></h2>
                        <?php else: ?>
                            <h2><?php the_title(); ?></h2>
                        <?php endif; ?>
                        
                        <?php if($event['body']) : ?>
                            <?php echo $event['body']; ?>
                        <?php endif; ?>
                        
                        <p><?php echo $event['location']; ?></p>
                        <p><?php echo $event['event_date']; ?></p>

                        <a href="<?php echo $event['through_link']['url'] ?>" class="button button-border--red"><?php echo $event['through_link']['title'] ?></a>
                    </div>
                </section>
            </div>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>