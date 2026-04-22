<?php
/**
 * Šablona pro jednotlivý příspěvek (aktuality/blog).
 */
get_template_part('template-parts/header');
?>
<main class="pt-32 pb-24">
    <?php while (have_posts()): the_post(); ?>
    <!-- Hero příspěvku -->
    <section class="relative pb-16 bg-gradient-soft overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
        </div>
        <div class="max-w-4xl mx-auto px-8 relative z-10 pt-12 text-center">
            <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">
                <?php echo get_the_date('j. F Y'); ?>
            </span>
            <h1 class="font-serif text-4xl md:text-6xl text-zinc-900 mb-6 leading-tight"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Obsah -->
    <div class="max-w-3xl mx-auto px-8 mt-12">
        <?php if (has_post_thumbnail()): ?>
            <div class="mb-12 rounded-2xl overflow-hidden shadow-lg">
                <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
            </div>
        <?php endif; ?>

        <div class="text-zinc-600 text-lg leading-relaxed [&_h2]:font-serif [&_h2]:text-3xl [&_h2]:mt-12 [&_h2]:mb-4 [&_h2]:text-zinc-900 [&_img]:rounded-xl [&_img]:shadow-md [&_img]:my-8">
            <?php the_content(); ?>
        </div>

        <div class="mt-16 pt-8 border-t border-zinc-100">
            <a class="inline-flex items-center gap-2 text-primary font-bold hover:underline"
               href="<?php echo esc_url(get_permalink(get_page_by_path('aktuality'))); ?>">
                <span class="material-symbols-outlined">arrow_back</span> Zpět na aktuality
            </a>
        </div>
    </div>
    <?php endwhile; ?>
</main>
<?php get_template_part('template-parts/footer'); ?>
