<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="autho" content="Amandine Fourny">
    <meta name="keywords" content="Portfolio, Amandine Fourny, Amandine, Fourny, Projets">
    <meta name="description" content="Site Portfolio d'Amandine Fourny">
    <title><?= wp_title('•', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <link rel="canonical" href="<?= esc_url( get_home_url()) ?>">
    <link rel="icon" type="image/png" href="resources/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="resources/favicon/favicon.svg" />
    <link rel="shortcut icon" href="resources/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="resources/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="resources/favicon/site.webmanifest" />
    <?php wp_head(); ?>
</head>
<body class="home" itemscope itemtype="https://schema.org/Person">
    <h1 class="home__title" itemprop="givenName" itemprop="familyName"><?= get_the_title() ?></h1>
    <h2 class="home__job" itemprop="jobTitle"><?= get_field('job') ?></h2>
    <div class="home__desc" itemprop="description"> <?= get_field('description') ?> </div>
    <nav class="home__nav" aria-label="<?=__trad('Navigation de la page d’accueil')?>">
        <ul class="home__nav-container">
            <li class="home__nav-item"><a href="<?= get_permalink(pll_get_post('11')) ?>"><?=__trad('Me découvrir') ?></a></li>
            <li class="home__nav-item"><a href="<?= get_permalink(pll_get_post('13')) ?>"><?= __trad('Projets') ?></a></li>
            <li class="home__nav-item"><a href="<?= get_permalink(pll_get_post('15')) ?>"><?= __trad('Contact') ?></a></li>
        </ul>
    </nav>
</body>



