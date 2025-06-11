<?php get_header(); ?>

<div class="not-found">
    <h1 class="not-found__title">
         <?= __trad('Page non trouvée') ?>
    </h1>
    <p class="not-found__message">
        <?= __trad('Désolée, la page que vous recherchez n‘existe pas ou a été déplacée') ?>
    </p>
    <p class="not-found__message">
        <?= __trad('Retour à la') ?> <a class="not-found__link" href="<?= home_url()?>" title="<?php __trad('Retour à la page d‘accueil') ?>"><?php __trad('page d‘accueil') ?></a>

<?php get_footer(); ?>
