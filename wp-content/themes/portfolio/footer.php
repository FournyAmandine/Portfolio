
        </main>
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__first">
                    <div class="footer__logo">
                        <img src="/wp-content/themes/portfolio/resources/img/Logo.svg" alt="Logo AF">
                    </div>

                    <div class="footer__released" itemscope itemtype="https://schema.org/Person">
                        <p><span itemprop="givenName">Amandine</span> <span itemprop="familyName">Fourny</span></p>
                        <a class="footer__released-text" aria-label="Envoyer un email à Amandine Fourny" itemprop="email" title="Envoyer un mail à cette adresse" target="_blank" href="mailto:amandine.fourny@student.hepl.be">amandine.fourny@student.hepl.be</a>
                        <p class="footer__released-text" itemprop="telephone">0472 56 28 08</p>
                        <p class="footer__released-address" itemprop="address">5, Rue du Spitran 6619, Bartogne</p>
                    </div>
                </div>
                <div class="footer__second">
                    <div class="footer__navigation">
                        <nav class="footer__nav" aria-label="<?= __trad('Navigation secondaire') ?>">
                            <ul class="footer__list">
                                <?php foreach (dw_get_navigation_links('footer')as $link): ?>
                                    <li class="footer__item footer__item--<?= $link->icon; ?>">
                                        <a href="<?=$link->href;?>" class="footer__link"><?=$link->label;?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>

                    <div class="footer__follow">
                        <a class="footer__follow-link" aria-label="Suivre Amandine Fourny sur Github" rel="noopener noreferrer" target="_blank" href="https://github.com/FournyAmandine" itemprop="follows">Github</a>
                    </div>
                </div>
            </div>

            <a class="footer__privacy" href="<?= get_the_permalink(544) ?>" aria-label="Mentions légales d'Amandine Fourny" title="Aller voir les mentions légales"><?= __trad('© Tous droits réservés, créé par Amandine Fourny') ?></a>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>