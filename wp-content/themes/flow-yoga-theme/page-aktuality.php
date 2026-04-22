<?php
/**
 * Template Name: Aktuality
 * Zobrazuje seznam příspěvků (aktualit).
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
        <h1 class="text-5xl md:text-7xl font-headline text-zinc-900 mb-8 leading-tight tracking-tight">Aktuality ze studia</h1>
        <p class="text-xl text-zinc-500 font-body leading-relaxed max-w-2xl mx-auto">
            Vítejte v našem online deníku. Místě, kde sdílíme inspiraci, novinky z našeho studia a pozvánky na společná setkání na jógových podložkách.
        </p>
    </div>
</section>

<!-- Bento grid příspěvků -->
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
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <?php
            $i = 0;
            if ($posts_query->have_posts()):
                while ($posts_query->have_posts()): $posts_query->the_post();
                    $is_featured = ($i === 0); // první příspěvek je velký
                    $col_class   = $is_featured ? 'md:col-span-8' : 'md:col-span-4';
                    $pad_class   = $is_featured ? 'p-12' : 'p-10';
                    $title_size  = $is_featured ? 'text-4xl' : 'text-2xl';
                ?>
                <article class="<?php echo $col_class; ?> bg-surface-dim news-card rounded-xl <?php echo $pad_class; ?> flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-6">
                        <?php
                        $cats = get_the_category();
                        if ($cats): ?>
                            <span class="text-primary font-bold tracking-widest text-xs uppercase"><?php echo esc_html($cats[0]->name); ?></span>
                            <span class="h-px w-12 bg-primary/20"></span>
                        <?php endif; ?>
                        <span class="text-zinc-400 text-xs font-medium tracking-wider"><?php echo strtoupper(get_the_date('j. F Y')); ?></span>
                    </div>

                    <?php if (has_post_thumbnail() && $is_featured): ?>
                        <div class="mb-8 rounded-xl overflow-hidden">
                            <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-48 object-cover']); ?>
                        </div>
                    <?php endif; ?>

                    <h2 class="<?php echo $title_size; ?> font-headline text-zinc-900 mb-6"><?php the_title(); ?></h2>
                    <p class="text-zinc-500 mb-8 font-body leading-relaxed <?php echo $is_featured ? 'text-xl max-w-2xl' : ''; ?>">
                        <?php echo wp_trim_words(get_the_excerpt(), $is_featured ? 30 : 20); ?>
                    </p>
                    <a class="inline-flex items-center text-primary font-bold group/link <?php echo $is_featured ? 'text-lg' : ''; ?>"
                       href="<?php the_permalink(); ?>">
                        Číst celý příspěvek
                        <span class="material-symbols-outlined ml-2 transition-transform group-hover/link:translate-x-2">arrow_forward</span>
                    </a>
                </article>
                <?php
                $i++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Stránkování -->
        <div class="mt-16 flex justify-center gap-4">
            <?php
            echo paginate_links([
                'total'     => $posts_query->max_num_pages,
                'current'   => $paged,
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
                'type'      => 'list',
            ]);
            ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-primary-light/40">
    <div class="max-w-5xl mx-auto px-8 text-center">
        <div class="bg-white rounded-xl p-12 md:p-20 relative overflow-hidden shadow-sm border border-primary/5">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
            <div class="relative z-10">
                <h2 class="text-4xl md:text-5xl font-headline mb-8">Přijďte si s námi zacvičit</h2>
                <p class="text-zinc-600 font-body mb-12 max-w-2xl mx-auto text-lg leading-relaxed">
                    Vyberte si lekci z našeho rozvrhu a dopřejte si chvíli klidu pro své tělo i mysl.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
                       class="btn-primary px-12 py-5 rounded-full font-bold shadow-xl text-lg">
                        Registrace na lekci
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('rozvrh'))); ?>"
                       class="px-12 py-5 rounded-full font-bold border border-zinc-200 hover:bg-zinc-50 transition-colors text-lg">
                        Zobrazit rozvrh
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?php get_template_part('template-parts/footer'); ?>
