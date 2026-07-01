<?php
/**
 * Template Name: Aktuality
 */
get_template_part('template-parts/header');
?>
<main>

<!-- Hero -->
<section class="relative pt-32 pb-24 bg-gradient-soft overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
    <h1 class="font-serif text-5xl md:text-7xl text-zinc-900 mb-8 leading-tight">Aktuality ze studia</h1>
    <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mb-8"></div>
    <p class="text-xl text-zinc-500 leading-relaxed max-w-2xl mx-auto">
        Novinky, inspirace a pozvánky přímo ze studia. Sledujte, co se u nás chystá.
    </p>
</div>
</section>

<!-- Příspěvky -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $posts_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'paged'          => $paged,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);
        ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php
            if ($posts_query->have_posts()):
                while ($posts_query->have_posts()): $posts_query->the_post(); ?>

                    <article class="flex flex-col gap-6 group">
                        <div class="relative aspect-[3/4] overflow-hidden rounded-2xl shadow-md">
                            <?php if (has_post_thumbnail()):
                                the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000']);
                            else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-p.png'); ?>"
                                     alt="<?php the_title_attribute(); ?>"
                                     class="w-full h-full object-contain bg-white p-12 group-hover:scale-105 transition-transform duration-1000"/>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors"></div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <span class="text-primary text-xs font-bold uppercase tracking-widest">
                                <?php echo get_the_date('j.n.Y'); ?>
                            </span>
                            <h3 class="font-serif text-2xl leading-tight text-zinc-900 group-hover:text-primary transition-colors uppercase line-clamp-2">
                                <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-zinc-600 line-clamp-2">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '…'); ?>
                            </p>
                            <a class="inline-flex items-center gap-2 text-zinc-800 font-bold text-sm border-b-2 border-primary/20 w-fit pb-1 hover:border-primary transition-all"
                               href="<?php echo esc_url(get_permalink()); ?>">Číst více</a>
                        </div>
                    </article>

                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>

        <?php if ($posts_query->max_num_pages > 1): ?>
        <div class="mt-20 flex justify-center">
            <div class="flex flex-wrap items-center gap-2
                        [&_a]:flex [&_a]:items-center [&_a]:justify-center [&_a]:w-12 [&_a]:h-12 [&_a]:rounded-full [&_a]:bg-white [&_a]:border [&_a]:border-zinc-200 [&_a]:text-zinc-600 [&_a]:font-medium hover:[&_a]:bg-primary hover:[&_a]:border-primary hover:[&_a]:text-white [&_a]:transition-all [&_a]:shadow-sm
                        [&_span.current]:flex [&_span.current]:items-center [&_span.current]:justify-center [&_span.current]:w-12 [&_span.current]:h-12 [&_span.current]:rounded-full [&_span.current]:bg-primary [&_span.current]:text-white [&_span.current]:font-bold [&_span.current]:shadow-md
                        [&_span.dots]:flex [&_span.dots]:items-center [&_span.dots]:justify-center [&_span.dots]:w-12 [&_span.dots]:h-12 [&_span.dots]:text-zinc-400">
                <?php echo paginate_links([
                    'total'     => $posts_query->max_num_pages,
                    'current'   => $paged,
                    'prev_text' => '←',
                    'next_text' => '→',
                    'type'      => 'plain',
                ]); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-primary-light/40">
    <div class="max-w-5xl mx-auto px-8 text-center">
        <div class="bg-white rounded-3xl p-12 md:p-20 relative overflow-hidden shadow-sm border border-primary/10">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="font-serif text-4xl md:text-5xl mb-6 text-zinc-900">Přijďte si s námi zacvičit</h2>
                <p class="text-zinc-600 mb-10 text-lg">Vyberte si lekci z našeho rozvrhu a dopřejte si chvíli klidu.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
                       class="btn-primary px-10 py-5 rounded-full font-bold text-lg">Rezervace</a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('rozvrh'))); ?>"
                       class="bg-white border-2 border-primary/20 text-primary px-10 py-5 rounded-full font-bold text-lg hover:bg-primary-light transition-all duration-300">
                        Zobrazit rozvrh
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
<?php get_template_part('template-parts/footer'); ?>