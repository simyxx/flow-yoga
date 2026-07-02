<?php
/**
 * Šablona pro jednotlivý příspěvek (aktuality/blog).
 */
get_template_part('template-parts/header');
?>

<style>
/* ===================================================
   Post content – typografie pro obsah z WP editoru
   =================================================== */
.post-content { overflow-wrap: anywhere; word-break: break-word; }

.post-content p { margin-bottom: 1.5rem; }

.post-content h2 {
    font-family: inherit;
    font-size: 1.875rem;
    line-height: 1.3;
    margin-top: 3rem;
    margin-bottom: 1rem;
    color: #18181b;
}
.post-content h2,
.post-content h3,
.post-content h4 { font-weight: 400; }
.post-content h3 { font-size: 1.5rem; margin-top: 2.5rem; margin-bottom: 0.75rem; color: #18181b; }
.post-content h4 { font-size: 1.125rem; font-weight: 700; margin-top: 2rem; margin-bottom: 0.5rem; color: #18181b; }

.post-content a {
    color: var(--color-primary, #E286B1);
    font-weight: 600;
    text-decoration: underline;
    text-decoration-color: rgba(226, 134, 177, 0.35);
    text-underline-offset: 2px;
    transition: text-decoration-color 0.2s ease;
}
.post-content a:hover { text-decoration-color: rgba(226, 134, 177, 1); }

.post-content strong, .post-content b { color: #18181b; font-weight: 700; }
.post-content em { font-style: italic; }

.post-content ul, .post-content ol { margin: 0 0 1.5rem 0; padding-left: 1.5rem; }
.post-content ul { list-style: disc; }
.post-content ol { list-style: decimal; }
.post-content li { margin-bottom: 0.5rem; line-height: 1.7; }
.post-content li::marker { color: #E286B1; }

.post-content blockquote {
    border-left: 4px solid rgba(226, 134, 177, 0.4);
    background: #fdf2f7;
    padding: 1rem 1.5rem;
    margin: 2rem 0;
    border-radius: 0 1rem 1rem 0;
    font-style: italic;
    color: #52525b;
}

/* Obrázky vložené v obsahu – vždy responzivní, nikdy nepřetečou */
.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 0.75rem;
    box-shadow: 0 10px 25px -10px rgba(226, 134, 177, 0.25);
    margin: 2rem auto;
    display: block;
}
/* Staré WP zarovnání obrázků (classic editor) */
.post-content .wp-caption { max-width: 100% !important; margin: 2rem auto; }
.post-content .wp-caption img { margin: 0; }
.post-content .wp-caption-text,
.post-content figcaption {
    text-align: center;
    font-size: 0.875rem;
    color: #a1a1aa;
    margin-top: 0.75rem;
}
.post-content .alignleft, .post-content .alignright { max-width: 100%; }
@media (min-width: 640px) {
    .post-content .alignleft { float: left; margin: 0.5rem 1.5rem 1rem 0; max-width: 45%; }
    .post-content .alignright { float: right; margin: 0.5rem 0 1rem 1.5rem; max-width: 45%; }
}
.post-content .aligncenter { display: block; margin-left: auto; margin-right: auto; }

/* Video / embed – responzivní poměr stran, žádné přetečení */
.post-content iframe, .post-content video {
    max-width: 100%;
    width: 100%;
    aspect-ratio: 16 / 9;
    height: auto;
    border-radius: 0.75rem;
    margin: 2rem 0;
}

/* Tabulky – horizontální scroll místo přetečení */
.post-content table {
    display: block;
    max-width: 100%;
    overflow-x: auto;
    border-collapse: collapse;
    margin: 2rem 0;
}
.post-content th, .post-content td {
    padding: 0.75rem 1rem;
    border: 1px solid #f0e6ec;
    text-align: left;
}
.post-content th { background: #fdf2f7; color: #18181b; font-weight: 700; }

.post-content pre {
    background: #fafafa;
    border: 1px solid #f0e6ec;
    border-radius: 0.75rem;
    padding: 1rem;
    overflow-x: auto;
    margin: 1.5rem 0;
    font-size: 0.875rem;
}
.post-content code {
    background: #fdf2f7;
    color: #D175A0;
    padding: 0.15rem 0.4rem;
    border-radius: 0.35rem;
    font-size: 0.9em;
}
.post-content pre code { background: none; padding: 0; color: inherit; }

.post-content hr {
    border: none;
    border-top: 1px solid #f0e6ec;
    margin: 3rem 0;
}
</style>

<main class="pt-32 pb-24">
<?php while (have_posts()): the_post(); ?>

    <!-- Hero příspěvku -->
    <section class="relative pb-16 bg-gradient-soft overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-20%] left-[-10%] w-[400px] h-[400px] bg-primary-light rounded-full blur-[100px]"></div>
        </div>
        <div class="max-w-4xl mx-auto px-8 relative z-10 pt-12 text-center">

            <?php
            // Skryjeme výchozí "Nezařazeno" a nahradíme ho obecným štítkem "Zpráva"
            $categories = array_filter(get_the_category(), fn($cat) => $cat->slug !== 'uncategorized');
            ?>
            <div class="flex flex-wrap justify-center gap-2 mb-6">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
                           class="yoga-pill px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest text-primary">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="yoga-pill px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest text-primary">
                        Zpráva
                    </span>
                <?php endif; ?>
            </div>

            <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">
                <?php echo get_the_date('j. F Y'); ?>
            </span>
            <h1 class="font-serif text-4xl md:text-6xl text-zinc-900 mb-2 leading-tight break-words">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>

    <!-- Obsah -->
    <div class="max-w-3xl mx-auto px-8 mt-12">

        <?php if (has_post_thumbnail()): ?>
            <div class="mb-12 rounded-2xl overflow-hidden shadow-lg aspect-[16/9]">
                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
            </div>
        <?php endif; ?>

        <div class="post-content text-zinc-600 text-lg leading-relaxed">
            <?php the_content(); ?>
        </div>

        <!-- Navigace mezi příspěvky -->
        <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        if ($prev_post || $next_post): ?>
        <div class="mt-16 pt-8 border-t border-zinc-100">
            <div class="flex flex-col sm:flex-row rounded-xl border border-primary/10 divide-y sm:divide-y-0 sm:divide-x divide-primary/10 overflow-hidden">
                <?php if ($prev_post): ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post)); ?>"
                       class="group flex-1 min-w-0 flex items-center gap-3 px-5 py-3.5 hover:bg-primary-light/30 transition-colors">
                        <span class="material-symbols-outlined text-primary text-lg shrink-0 group-hover:-translate-x-1 transition-transform">arrow_back</span>
                        <span class="flex flex-col min-w-0 gap-0.5">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-primary/70">Předchozí</span>
                            <span class="font-serif text-base text-zinc-900 truncate"><?php echo esc_html(get_the_title($prev_post)); ?></span>
                        </span>
                    </a>
                <?php endif; ?>

                <?php if ($next_post): ?>
                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>"
                       class="group flex-1 min-w-0 flex items-center justify-end gap-3 px-5 py-3.5 hover:bg-primary-light/30 transition-colors text-right">
                        <span class="flex flex-col min-w-0 gap-0.5 items-end">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-primary/70">Další</span>
                            <span class="font-serif text-base text-zinc-900 truncate"><?php echo esc_html(get_the_title($next_post)); ?></span>
                        </span>
                        <span class="material-symbols-outlined text-primary text-lg shrink-0 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="mt-10 text-center sm:text-left">
            <a class="inline-flex items-center gap-2 text-primary font-bold hover:underline"
               href="<?php echo esc_url(get_permalink(get_page_by_path('aktuality'))); ?>">
                <span class="material-symbols-outlined">arrow_back</span> Zpět na aktuality
            </a>
        </div>
    </div>

<?php endwhile; ?>

    <!-- CTA -->
    <section class="py-24 mt-24 bg-primary-light/40">
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