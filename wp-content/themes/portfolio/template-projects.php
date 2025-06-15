<?php /* Template Name: Template Projects */ ?>

<?php get_header(); ?>
    <h1 class="projects__page-title"><?= __trad('Mes projets') ?></h1>
<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
$args = [
    'post_type' => 'projects',
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => 4,
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

<?php
$terms = get_terms([
    'taxonomy' => 'projects_type',
    'hide_empty' => false,
]);

$current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
?>

    <nav class="projects__filters" aria-label="Filtrer les projets par catégorie">
        <a title="" href="<?=  esc_url(get_permalink()); ?>" class=" projects__filter <?= ($current_filter === '') ? 'projects__active' : ''; ?>">
            <?= __trad('Tout'); ?>
        </a>

        <?php foreach ($terms as $term): ?>
            <a href="<?= esc_url(get_permalink()) . '?filter=' . $term->slug; ?>"
               class=" projects__filter <?= ($current_filter === $term->slug) ? 'projects__active' : ''; ?>">
                <?= esc_html($term->name); ?>
            </a>
        <?php endforeach; ?>
    </nav>
    <section class="projects__articles" aria-label="Liste des projets">
<?php
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        ?>
        <article class="projects__article" itemscope itemtype="https://schema.org/CreativeWork">
            <div class="projects__card">
                <a href="<?= get_the_permalink(); ?>" class="projects__click" itemprop="url" title="Aller voir cet article" aria-label="<?= get_the_title(); ?>">
                    <span class="sro"><?= get_the_title(); ?></span>
                </a>
                <figure class="projects__fig" itemprop="thumbnail">
                    <?= get_the_post_thumbnail(size: 'small', attr: ['class' => 'projects__img']); ?>
                </figure>
                <h2 class="projects__title" itemprop="name"><?= get_the_title(); ?></h2>
            </div>
        </article>
    <?php
    endwhile; ?>
    </section>
    <?php echo '<nav class="projects__pagination">';
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => $paged,
        'prev_next' => false,
    ));
    echo '</nav>';

    wp_reset_postdata();
else :
    echo __trad('Aucun projet n’a été trouvé');
endif;

?>

<div class="projects__accueil">
    <a class="projects__accueil-link" title="Retourner à l'accueil" href="<?= get_home_url() ?>"><?php __trad('Accueil') ?></a>
</div>

<?php get_footer('link'); ?>