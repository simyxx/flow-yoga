<?php
// Fallback šablona – WordPress ji vyžaduje.
// Standardní stránky a příspěvky se zobrazí přes page.php / single.php
get_template_part('template-parts/header');
?>
<main class="pt-32 max-w-4xl mx-auto px-8 pb-24">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h1 class="font-serif text-4xl mb-6"><?php the_title(); ?></h1>
        <div class="prose max-w-none text-zinc-600"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
</main>
<?php get_template_part('template-parts/footer'); ?>
