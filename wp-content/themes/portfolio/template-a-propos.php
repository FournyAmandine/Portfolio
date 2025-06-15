<?php /* Template Name: Page "A propos" */ ?>

<?php get_header(); ?>

<section class="propos" itemscope itemtype="https://schema.org/Person">
    <h1 class="propos__title"><?= get_the_title(); ?></h1>
    <div class="propos__explanation" itemprop="description">
        <?= get_field('explanation') ?>
    </div>
</section>

<section class="project" itemscope itemtype="https://schema.org/CreativeWork">
    <h2 class="project__title"><?= __trad('Derniers projets') ?></h2>
    <div class="project__container">
        <?php
        $news = new WP_Query([
            'post_type' => 'projects',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 2,
            'lang' => pll_current_language()
        ]);
        if ($news->have_posts()): while ($news->have_posts()): $news->the_post(); ?>
            <article class="project__article">
                <div class="project__card">
                    <a href="<?= get_the_permalink(); ?>" class="project__click" itemprop="url" title="<?= esc_attr(get_the_title()); ?>" aria-label="<?= esc_attr(get_the_title()); ?>">
                        <span class="sro"><?= get_the_title(); ?></span>
                    </a>
                    <div class="project__text">
                        <figure class="project__fig" itemprop="thumbnail">
                            <?= get_the_post_thumbnail(size: 'small', attr: ['class' => 'project__img', 'alt' => esc_attr(get_the_title())]); ?>
                        </figure>
                        <h3 class="project__name-card" itemprop="name"><?= get_the_title(); ?></h3>
                    </div>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); else: ?>
            <p><?= __trad('Il n’y a pas de projets récents pour le moment') ?></p>
        <?php endif; ?>
    </div>
    <div class="project__more">
        <a class="project__link" href="<?= get_permalink(pll_get_post(13)) ?>"><?= __trad('Voir plus de projets') ?></a>
    </div>
</section>




<?php get_footer(); ?>
