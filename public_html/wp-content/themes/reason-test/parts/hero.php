<?php 
    $hero = get_field('hero_settings');
?>
<section class="hero">
    <div class="hero-inner">
        <?php if($hero['title']) : ?>
            <h1 class="hero__title"><?php echo $hero['title']; ?></h1>
            <?php else : ?>
            <h1 class="hero__title"><?php the_title(); ?></h1>
        <?php endif; ?>
        <?php if($hero['subtitle']) : ?>
            <div class="hero__copy"><?php echo $hero['subtitle']; ?></div>
        <?php endif; ?>
        <?php if($hero['button']) : ?>
        <button><a href="<?php echo $hero['button']['url'] ?>" class="button button-fill button-fill--white"><?php echo $hero['button']['title'] ?></a></button>
        <?php endif; ?>
    </div>
    <div class="hero-image">
        <?php if($hero['image']) : ?>
            <img src="<?php echo $hero['image']['url'] ?>" alt="<?php echo $hero['image']['title'] ?>">
        <?php else : ?>
            <img src="<?php echo get_theme_file_uri('static/min/img/hero.jpg') ?>" alt="Hero image">
        <?php endif; ?>
    </div>
</section>