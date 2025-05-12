<?php get_header(); ?>

<section class="propos">
    <h2 class="propos__title"><?= get_the_title(); ?></h2>
    <div class="propos__explanation">
        <?= get_field('explanation') ?>
    </div>
</section>

<section class="project">
    <h2><?= __trad('Derniers projets') ?></h2>
    <div class="project__container">
        <?php
        $news = new WP_Query([
            'post_type' => 'projects',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 2,
        ]);
        if ($news->have_posts()): while ($news->have_posts()): $news->the_post(); ?>
            <article class="project__article">
                <a href="<?= get_the_permalink(); ?>" class="project__link">
                    <span class="sro"><?= get_the_title(); ?></span>
                </a>
                <div class="project__card">
                    <div class="project__text">
                        <figure class="project__fig">
                            <?= get_the_post_thumbnail(size: 'small', attr: ['class' => 'project__img']); ?>
                        </figure>
                        <h4 class="project__title"><?= get_the_title(); ?></h4>
                        <?php
                        $date = get_field('date');
                        if ($date): ?>
                            <p class="project__date">
                                <time datetime="<?= date('c', $date) ?>">
                                    <?= date_i18n('d F Y', $date); ?>
                                </time>
                            </p>
                        <?php endif; ?>
                        <?= get_the_excerpt(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); else: ?>
            <p>Il n’y a pas de projets récents pour le moment</p>
        <?php endif; ?>
    </div>
    <a href="<?= get_permalink(13) ?>">Voir plus de projets</a>
</section>




<?php get_footer(); ?>
