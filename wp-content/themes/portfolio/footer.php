
        </main>
        <footer class="footer" aria-label="<?= __trad('Navigation secondaire') ?>">
            <div class="footer__container">
                <div class="footer__first">
                    <div class="footer__logo" aria-label="Logo">
                        <img src="/wp-content/themes/portfolio/resources/img/Logo.svg" alt="Logo AF">
                    </div>

                    <div class="footer__released" aria-label="<?= __trad('Réalisé par') ?>" itemscope itemtype="https://schema.org/Person">
                        <p class="footer__released-text" itemprop="givenName" itemprop="familyName">Amandine Fourny</p>
                        <a class="footer__released-text" itemprop="email" title="Envoyer un mail à cette adresse" target="_blank" href="mailto:amandine.fourny@student.hepl.be">amandine.fourny@student.hepl.be</a>
                        <p class="footer__released-text" itemprop="telephone">0472 56 28 08</p>
                        <p class="footer__released-address" itemprop="address">5, Rue du Spitran 6619, Bartogne</p>
                    </div>
                </div>
                <div class="footer__second">
                    <div class="footer__navigation" aria-label="<?=__trad('Navigation')?>">
                        <nav class="footer__nav">
                            <ul class="footer__list">
                                <?php foreach (dw_get_navigation_links('footer')as $link): ?>
                                    <li class="footer__item footer__item--<?= $link->icon; ?>">
                                        <a href="<?=$link->href;?>" class="footer__link"><?=$link->label;?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>

                    <div class="footer__follow" aria-label="<?= __trad('Suivre') ?>">
                        <a class="footer__follow-link" rel="noopener noreferrer" target="_blank" href="https://github.com/FournyAmandine" itemprop="follows">Github</a>
                    </div>
                </div>
            </div>

            <a class="footer__privacy" href="<?= get_the_permalink(544) ?>" title="Aller voir les mentions légales"><?= __trad('© Tous droits réservés, créé par Amandine Fourny') ?></a>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>