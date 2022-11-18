<?php 
$events_query = new WP_Query(array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'posts_per_page' => -1
));
?>
<section class="events-listing">
    <div class="events-listing__inner">
        <h2><?php echo $args['title']; ?></h2>
        <div class="text-large">
            <?php echo $args['body']; ?>
        </div>
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
        <div class="events-listing__footer">
            <a href="<?php echo get_site_url() ?>/events" class="button button-border--red">View all events</a>
        </div>
        <?php wp_reset_postdata(); endif; ?>
    </div>
</section>