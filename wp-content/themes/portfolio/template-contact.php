<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
    <section class="contact__container">
    <h1 class="contact__title"><?= __trad('Contactez-moi') ?></h1>
    <?php
    if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="contact__hook">
        <?= get_field('hook') ?>
    </div>
    <div class="contact__right">
        <?php
        $errors = $_SESSION['contact_form_errors'] ?? [];
        unset($_SESSION['contact_form_errors']);
        $success = $_SESSION['contact_form_success'] ?? false;
        unset($_SESSION['contact_form_success']);

        if ($success): ?>
            <div class="contact__success" role="status">
                <p><?= $success; ?></p>
            </div>
        <?php else: ?>
            <form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="contact__form">
                <fieldset class="contact__form__fields">
                    <div class="contact__form-name">
                        <div class="contact__field">
                            <label for="firstname" class="contact__field-label"><?= __trad('Entrez votre prénom') ?></label>
                            <input type="text" name="firstname" id="firstname" class="contact__field-input" placeholder="Loïc" required aria-required="true" <?= isset($errors['firstname']) ? 'aria-invalid="true"' : '' ?>>
                            <?php if (isset($errors['firstname'])): ?>
                                <p class="contact__field-error"><?= $errors['firstname']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="contact__field">
                            <label for="lastname" class="contact__field-label"><?= __trad('Entrez votre nom') ?></label>
                            <input type="text" name="lastname" id="lastname" class="contact__field-input" placeholder="Parker" required aria-required="true" <?= isset($errors['lastname']) ? 'aria-invalid="true"' : '' ?>>
                            <?php if (isset($errors['lastname'])): ?>
                                <p class="contact__field-error"><?= $errors['lastname']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="contact__field">
                        <label for="email" class="contact__field-label"><?= __trad('Entrez votre adresse email') ?></label>
                        <input type="email" name="email" id="email" class="contact__field-input" placeholder="Loic.parker@gmail.com" required aria-required="true" <?= isset($errors['email']) ? 'aria-invalid="true"' : '' ?>>
                        <?php if (isset($errors['email'])): ?>
                            <p class="contact__field-error"><?= $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="contact__field">
                        <label for="subject" class="contact__field-label"><?= __trad('Sélectionner votre sujet') ?></label>
                        <select class="contact__field-select" name="subject" id="subject" required aria-required="true" <?= isset($errors['subject']) ? 'aria-invalid="true"' : '' ?>>
                            <option value="" disabled selected hidden><?= __trad('Choisissez une option') ?></option>
                            <option value="Projets"><?= __trad('Projets') ?></option>
                            <option value="Collaboration"><?= __trad('Collaboration') ?></option>
                            <option value="Question"><?= __trad('Question') ?></option>
                            <option value="Autre"><?= __trad('Autre') ?></option>
                        </select>
                        <?php if (isset($errors['subject'])): ?>
                            <p class="contact__field-error"><?= $errors['subject']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="contact__field">
                        <label for="message" class="contact__field-label"><?= __trad('Entrez votre message') ?></label>
                        <textarea name="message" id="message" class="contact__field-input" placeholder="Votre site est magnifique..." required aria-required="true" <?= isset($errors['message']) ? 'aria-invalid="true"' : '' ?>></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <p class="contact__field-error"><?= $errors['message']; ?></p>
                        <?php endif; ?>
                    </div>
                </fieldset>
                <div class="contact__form-submit">
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button type="submit" class="contact__btn"><?= __trad('Envoyer votre question') ?></button>
                </div>
            </form>
        <?php endif; ?>
    </div>
    </section>

<?php
endwhile;
else: ?>
    <p><?= __trad('Il n’y a rien sur cette page') ?></p>
<?php endif; ?>
<?php get_footer('link'); ?>