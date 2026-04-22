<?php
/**
 * Šablona pro statické stránky (Kontakt, Ceník, apod.)
 * Obsah lze plně editovat přes WordPress admin → Stránky.
 */
get_template_part('template-parts/header');
?>
<main class="pt-32 pb-24">
    <?php while (have_posts()): the_post(); ?>
    <div class="max-w-4xl mx-auto px-8">
        <h1 class="font-serif text-5xl mb-10 text-zinc-900"><?php the_title(); ?></h1>
        <div class="text-zinc-600 text-lg leading-relaxed [&_h2]:font-serif [&_h2]:text-3xl [&_h2]:mt-12 [&_h2]:mb-4 [&_img]:rounded-xl [&_img]:shadow-md">
            <?php the_content(); ?>
        </div>
    </div>
    <?php endwhile; ?>
</main>
<?php get_template_part('template-parts/footer'); ?>
