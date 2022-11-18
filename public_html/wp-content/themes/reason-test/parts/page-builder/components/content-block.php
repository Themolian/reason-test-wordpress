<section class="content-block">
    <?php if($args['image']) : ?>
    <div class="content-block__image">
        <img src="<?php echo $args['image']['url']; ?>" alt="<?php echo $args['image']['title']; ?>">
    </div>
    <?php endif; ?>
    <div class="content-block__body">
        <?php if($args['title']) : ?>
        <h2><?php echo $args['title']; ?></h2>
        <?php endif; ?>
        <?php if($args['body']) : ?>
            <div class="text-large"><?php echo $args['body']; ?></div>
        <?php endif; ?>
        <?php if($args['link']) : ?>
        <button><a href="<?php echo $args['link']['url'] ?>" class="button button-border--white"><?php echo $args['link']['title'] ?></a></button>
        <?php endif; ?>
    </div>
</section>