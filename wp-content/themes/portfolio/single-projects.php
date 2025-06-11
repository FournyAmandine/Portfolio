<?php
get_header();
?>
<?php
if (have_posts()): while (have_posts()):
    the_post();
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
    $args = [
        'post_type' => 'projects',
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => 1,
        'paged' => $paged,
    ];

    if ($taxonomy !== '') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'projects_type',
                'field' => 'slug',
                'terms' => $taxonomy,
            ]
        ];
    }

    $query = new WP_Query($args);
    ?>
    <section class="project__presentation" itemscope itemtype="https://schema.org/CreativeWork">
        <h1 class="project__header-title" itemprop="name"><?= get_the_title(); ?></h1>
        <h2 class="project__presentation-title" itemprop="headline"><?= get_field('subtitle'); ?></h2>
        <div class="project__presentation-text" itemprop="description">
            <?= get_field('presentation') ?>
        </div>
        <figure class="project__presentation-fig">
            <?= wp_get_attachment_image(get_field('main_image'), 'large', attr: ['class' => 'project__img']); ?>
        </figure>
        <?php
        $video = get_field('presentation_video');
        if (!empty($video)):?>
            <div class="project__presentation-container">
                <video autoplay loop muted playsinline preload="auto" class="project__presentation-video">
                    <source src="<?php echo esc_url($video['url']); ?>"
                            type="<?php echo esc_attr($video['mime_type']); ?>">
                    <?= __trad('Votre navigateur ne supporte pas la lecture de vidéos.') ?>
                </video>
            </div>
        <?php endif; ?>
    </section>

    <?php
    $source = get_field('source_image');
    if ($source):?>
        <section class="project__source">
            <h2 class="project__source-title">
                <?= get_field('source_title') ?>
            </h2>
            <figure class="project__source-fig">
                <?= wp_get_attachment_image($source, 'large', attr: ['class' => 'project__img']); ?>
            </figure>
        </section>
    <?php endif; ?>

    <?php if (have_rows('projects_steps')): while (have_rows('projects_steps')):
    the_row(); ?>

    <?php if (get_row_layout() == 'texte_galerie'): ?>
    <section class="project__gallery-container" itemscope itemtype="https://schema.org/HowToStep">
        <h2 class="project__gallery-title" itemprop="name">
            <?= get_sub_field('title_step') ?>
        </h2>
        <div class="project__gallery-text" itemprop="text">
            <?= get_sub_field('texte') ?>
        </div>
        <div class="project__gallery">
            <?php $images = get_sub_field('gallery');
            if ($images):?>
                <div class="project__gallery-fig">
                    <?php foreach ($images as $image): ?>
                        <img class="project__gallery-image" src="<?php echo esc_url($image['sizes']['large']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php elseif (get_row_layout() == 'texte_image_verticale'): ?>
    <section class="project__vertical-container" itemscope itemtype="https://schema.org/HowToStep">
        <div class="project__vertical-content" itemprop="name">
            <h2 class="project__vertical-title">
                <?= get_sub_field('title') ?>
            </h2>
            <div class="project__vertical-text" itemprop="text">
                <?= get_sub_field('description_step') ?>
            </div>
        </div>
        <figure class="project__vertical-fig">
            <?= wp_get_attachment_image(get_sub_field('image_step'), 'large', attr: ['class' => 'project__img']); ?>
        </figure>
    </section>

<?php elseif (get_row_layout() == 'texte_image'): ?>
    <section class="project__image-container" itemscope itemtype="https://schema.org/HowToStep">
        <div class="project__image-content" itemprop="name">
            <h2 class="project__image-title">
                <?= get_sub_field('title') ?>
            </h2>
            <div class="project__image-text" itemprop="text">
                <?= get_sub_field('description_step') ?>
            </div>
        </div>
        <figure class="project__image-fig">
            <?= wp_get_attachment_image(get_sub_field('image_step'), 'large', attr: ['class' => 'project__img']); ?>
        </figure>
    </section>

<?php elseif (get_row_layout() == 'texte_videos'): ?>
    <section class="project__videos-container" itemscope itemtype="https://schema.org/HowToStep">
        <h2 class="project__videos-title" itemprop="name">
            <?= get_sub_field('title_step') ?>
        </h2>
        <div class="project__videos-text" itemprop="text">
            <?= get_sub_field('texte') ?>
        </div>
        <div class="project__videos-carousel">
            <button class="project__videos-carousel__prev">←</button>

            <div class="project__videos-videos">
                <?php
                $videos = get_sub_field('video');
                if (!empty($videos)):
                    foreach ($videos as $index => $single_video):
                        $active_class = $index === 0 ? 'active' : '';
                        ?>
                        <video
                                autoplay muted playsinline preload="auto"
                                class="project__videos-video <?= $active_class; ?>">
                            <source src="<?php echo esc_url($single_video['video_file']['url']); ?>"
                                    type="<?php echo esc_attr($single_video['video_file']['mime_type']); ?>">
                            <?= __trad('Votre navigateur ne supporte pas la lecture de vidéos.') ?>
                        </video>
                    <?php endforeach;
                endif; ?>
            </div>

            <button class="project__videos-carousel__next">→</button>
        </div>

    </section>

<?php elseif (get_row_layout() == 'texte_video'): ?>
    <section class="project__video-container" itemscope itemtype="https://schema.org/HowToStep">
        <h2 class="project__video-title" itemprop="name">
            <?= get_sub_field('title_step') ?>
        </h2>
        <div class="project__video-text" itemprop="text">
            <?= get_sub_field('texte')?>
        </div>
        <div class="project__video-videos">
            <?php
            $video = get_sub_field('video');
            if (!empty($video)): foreach ($video as $single_video): ?>
                <video autoplay loop muted playsinline preload="auto" class="project__video-video">
                    <source src="<?php echo esc_url($single_video['video_file']['url']); ?>"
                            type="<?php echo esc_attr($single_video['video_file']['mime_type']); ?>">
                    <?= __trad('Votre navigateur ne supporte pas la lecture de vidéos.') ?>
                </video>
            <?php endforeach; endif; ?>
        </div>

    </section>

<?php elseif (get_row_layout() == 'texte'): ?>
    <section class="project__texte-container" itemscope itemtype="https://schema.org/HowToStep" itemprop="step">
        <h2 class="project__texte-title" itemprop="name">
            <?= get_sub_field('title_step') ?>
        </h2>
        <div class="project__texte-text" itemprop="text">
            <?= get_sub_field('texte') ?>
        </div>
    </section>

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php endwhile; else: ?>
    <p><?= __trad('Ce projet n’existe pas') ?></p>
<?php endif; ?>
<?php
$next_post = get_next_post(false);
$prev_post = get_previous_post(false);
?>

<nav class="project__nav" aria-label="<?= __trad('Navigation de projet') ?>">
    <?php if (!empty($prev_post)): ?>
        <a class="project__nav-link project__nav-prev" href="<?= get_permalink($prev_post->ID); ?>">

            ← <?= __trad('Précédent') ?>
        </a>
    <?php endif; ?>

    <?php if (!empty($next_post)): ?>
        <a class="project__nav-link project__nav-next" href="<?= get_permalink($next_post->ID); ?>">

            <?= __trad('Suivant ') ?>→
        </a>
    <?php endif; ?>
</nav>
<?php get_footer(); ?>

