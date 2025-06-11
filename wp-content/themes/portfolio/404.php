<?php get_header(); ?>

<div>
    <h1>
         <?= __trad('Page non trouvée') ?>
    </h1>
    <p>
        <?= __trad('Désolée, la page que vous recherchez n‘existe pas ou a été déplacée') ?>
    </p>
    <p>
        <?= __trad('Retour à la') ?> <a href="<?= home_url()?>" title="<?php __trad('Retour à la page d‘accueil') ?>"><?php __trad('page d‘accueil') ?></a>

<?php get_footer(); ?>
