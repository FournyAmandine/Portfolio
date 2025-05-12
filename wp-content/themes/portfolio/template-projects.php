<?php /* Template Name: Template Projects */ ?>

<?php get_header(); ?>
<h2 class="news__page-title">Mes projets</h2>
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

    <div class="project__filter">
        <a href="<?= esc_url(get_permalink()); ?>" class="<?= ($current_filter === '') ? 'active-project' : ''; ?>">
            <?= __('Tout', 'hepl-trad'); ?>
        </a>

        <?php foreach ($terms as $term): ?>
            <a href="<?= esc_url(get_permalink()) . '?filter=' . $term->slug; ?>"
               class="<?= ($current_filter === $term->slug) ? 'active-project' : ''; ?>">
                <?= esc_html($term->name); ?>
            </a>
        <?php endforeach; ?>
    </div>
<?php
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        ?>
            <article class="projects__article">
                <a href="<?= get_the_permalink(); ?>" class="projects__link">
                    <span class="sro"><?= get_the_title(); ?></span>
                </a>
                <div class="projects__card">
                    <figure class="projects__fig">
                        <?= get_the_post_thumbnail(size: 'small', attr: ['class' => 'projects__img']); ?>
                    </figure>
                    <h3 class="projects__title"><?= get_the_title(); ?></h3>
                </div>
            </article>
    <?php
    endwhile;

    echo '<div class="pagination">';
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => $paged,
    ));
    echo '</div>';

    wp_reset_postdata();
else :
    echo '<p>Aucune actualité n’a été trouvée</p>';
endif;

?>

    <a href="<?= get_home_url()?>">Accueil</a>

<?php get_footer('link'); ?>