<section class="services">
    <div class="services-inner">
        <h2><?php echo $args[0]['title']; ?></h2>
        <p><?php echo $args[0]['subtitle']; ?></p>
        <div class="services-cards">
            <?php foreach($args[1] as $key => $value) : ?>
                <div class="services-card">
                    <div class="services-card__inner">
                    <h3><?php echo $value[0] ?></h3>
                        <?php echo $value[1] ?>
                        <a href="<?php echo $value[2]['url'] ?>" class="button button-border--red"><?php echo $value[2]['title'] ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="services-footer">
            <a href="<?php echo $args[0]['link']['url'] ?>" class="button button-fill button-fill--white"><?php echo $args[0]['link']['title'] ?></a>
        </div>
    </div>
</section>