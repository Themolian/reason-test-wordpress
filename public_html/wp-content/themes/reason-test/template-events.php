<?php 
/*
    Template Name: Events
*/
get_header();
get_template_part('parts/hero');

$paged = ( get_query_var('paged')) ? get_query_var('paged') : 1;
$events_query = new WP_Query(array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'paged' => $paged
));
$events = get_field('events');
?>

<section class="events">
    <div class="events-inner">
        <h2><?php echo $events['title'] ?></h2>
        <p><?php echo $events['body']; ?></p>
        <?php if($events_query->have_posts()) : ?>
        <div class="events-cards">
                <?php while($events_query->have_posts()) : $events_query->the_post();?>
                    <?php 
                        $event = get_field('event');
                    ?>
                    <div class="events-card">
                        <div class="events-card__image">
                            <img src="<?php echo $event['image']['url'] ?>" alt="<?php echo $event['image']['title'] ?>">
                        </div>
                        <div class="events-card__body">
                            <h3><?php echo $event['title']; ?></h3>
                            <?php echo $event ['body']; ?>
                        </div>
                        <?php echo $event['date_time'] ?>
                        <div class="events-card__details">
                            <p class="location"><?php echo $event['location']; ?></p>
                            <p class="date"><?php echo $event['event_date']; ?></p>
                        </div>
                        <div class="events-card__footer">
                            <a href="<?php echo $event['through_link']['url'] ?>" class="button button-border--red"><?php echo $event['through_link']['title'] ?></a>
                        </div>
                        <a class="link-cover" href="<?php the_permalink(); ?>"></a>
                    </div>
                <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php 
    get_footer();
?>