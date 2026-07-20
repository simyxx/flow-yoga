<?php
/**
 * Template Name: Galerie
 *
 * Obrázky se spravují tak, že se do obsahu stránky v administraci vloží 
 * nativní blok "Galerie" (Gutenberg). Šablona si z něj fotky sama vytáhne 
 * a vykreslí je ve tvém designu.
 */
get_template_part('template-parts/header');

$blocks = parse_blocks( get_post()->post_content );
$gallery_ids = [];

foreach ( $blocks as $block ) {
    if ( $block['blockName'] === 'core/gallery' ) {
        // Moderní WP (5.9+) ukládá obrázky uvnitř galerie jako innerBlocks
        if ( !empty($block['innerBlocks']) ) {
            foreach ( $block['innerBlocks'] as $inner ) {
                if ( $inner['blockName'] === 'core/image' && !empty($inner['attrs']['id']) ) {
                    $gallery_ids[] = $inner['attrs']['id'];
                }
            }
        }
        // Zpětná kompatibilita pro starší verze WP
        elseif ( !empty($block['attrs']['ids']) ) {
            $gallery_ids = array_merge($gallery_ids, $block['attrs']['ids']);
        }
    }
}

// Připravíme parametry pro dotaz na obrázky – stejná paginace (paged/max_num_pages)
// jako u šablony Aktuality, jen nad post__in místo post_type=post
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if ( !empty($gallery_ids) ) {
    $gallery_query = new WP_Query([
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'post__in'       => $gallery_ids, // Vybere POUZE fotky z bloku Galerie
        'orderby'        => 'post__in',   // Zachová přesně to pořadí, jaké paní nastaví myší
        'posts_per_page' => 6,            // 2 plné řady po 3 sloupcích
        'paged'          => $paged,
    ]);
} else {
    // Pokud paní ještě žádný blok Galerie nepřidala, vytvoříme prázdný dotaz
    // (Zobrazí se tvůj Fallback s defaultními fotkami)
    $gallery_query = new WP_Query(); 
}
?>

<main>

<!-- Hero -->
<section class="relative pt-32 pb-24 bg-gradient-soft overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
        <h1 class="font-serif text-5xl md:text-7xl text-zinc-900 mb-8 leading-tight">Galerie</h1>
        <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mb-8"></div>
        <p class="text-xl text-zinc-500 leading-relaxed max-w-2xl mx-auto">
            <?php echo esc_html(get_theme_mod('galerie_perex', 'Nahlédněte do atmosféry našeho studia, lekcí a workshopů.')); ?>
        </p>
    </div>
</section>

<!-- Galerie -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-8">

        <?php if ($gallery_query->have_posts()): ?>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <?php while ($gallery_query->have_posts()): $gallery_query->the_post();
                    $img_id  = get_the_ID();
                    $caption = get_post_meta($img_id, '_wp_attachment_image_alt', true) ?: get_the_title();
                ?>
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl shadow-md group cursor-pointer">
                        <?php echo wp_get_attachment_image($img_id, 'medium_large', false, [
                            'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000',
                            'alt'   => esc_attr($caption),
                        ]); ?>
                        <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors"></div>
                        <?php if ($caption): ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                                <p class="text-white font-serif text-lg"><?php echo esc_html($caption); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

            <?php if ($gallery_query->max_num_pages > 1): ?>
            <div class="mt-20 flex justify-center">
                <div class="flex flex-wrap items-center gap-2
                            [&_a]:flex [&_a]:items-center [&_a]:justify-center [&_a]:w-12 [&_a]:h-12 [&_a]:rounded-full [&_a]:bg-white [&_a]:border [&_a]:border-zinc-200 [&_a]:text-zinc-600 [&_a]:font-medium hover:[&_a]:bg-primary hover:[&_a]:border-primary hover:[&_a]:text-white [&_a]:transition-all [&_a]:shadow-sm
                            [&_span.current]:flex [&_span.current]:items-center [&_span.current]:justify-center [&_span.current]:w-12 [&_span.current]:h-12 [&_span.current]:rounded-full [&_span.current]:bg-primary [&_span.current]:text-white [&_span.current]:font-bold [&_span.current]:shadow-md
                            [&_span.dots]:flex [&_span.dots]:items-center [&_span.dots]:justify-center [&_span.dots]:w-12 [&_span.dots]:h-12 [&_span.dots]:text-zinc-400">
                    <?php echo paginate_links([
                        'total'     => $gallery_query->max_num_pages,
                        'current'   => $paged,
                        'prev_text' => '←',
                        'next_text' => '→',
                        'type'      => 'plain',
                    ]); ?>
                </div>
            </div>
            <?php endif; ?>

        <?php else:
            // Fallback – žádné obrázky ještě nejsou nahrané přes admin
            $fallback = [
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuABuF7V3Cze07gXV109YT35OrYbEBCrD33tNgMnLM3XpQSG7NwuiuBEEDoaG7f_CazG-ucSCvCgDFTkPL066aFwDKrnUXqSV7LMod_WS2SQXCa4YjMHMTXgrD_FVkjL5iM55SpBsfbVAvgjl7DipVWYyspe1rQ5fGxZ9iFAbVU8nQj7x7NHTJdEgO2Nrq4XtYUc0rTJ527iZoqaf-15tNLFJj3C8A0n773NUpaRPD3QM2ORF14J6s3_pMECCN_gPvSivsmZPt2VD_o', 'alt' => 'Morning Vinyasa'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDro2rOc4cbZnFNNwT_1ENSpCGkkVApLL8ZUbySdRHekb_a6swSmXzQ8O9VKhHCxcmD-nw3BZLOga7LTr5yfH-GZirv8HQcKuYrvxgl6ClUmniuQAU72lMvGSYFIn-I9FGbnEgIV1qYRAdwBWuW_AqturAMLn2XwoK-jSYwtcxFnWLFPwe3UZpmeWsndhYYTvx13DyLa2Q_Ueit42McYjGx3qiG5Pphcf3zDE5GC8KTPuc6OMSrb6jPu2BMtZcOcUaibZeWeKkJJns', 'alt' => 'The Details'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBPMk4X7vzPEfgm-KbrQ1U1u7GuH14j4m7SQvpiERvaRMU-2CP7CsWzX3FXrHeJVB3Y1r8EcnUYaY_770pOzFl0M6UJe2uNMwcwjki0F821Gf6DrzpRA6cJZ1bFBwavDwRpzzJGRqZT4ObRHxiMfhfXnGm4GuF_PbeJ0t5_CFQ1UJM3vmdFhRhmH_VssAa-XEF539JbkFGuoLcCVs_2Xzr7yhyguO1zwvquE_lakvSDBcbzHNsTEfGZhtQAOOK0wyhKKGFli6XZJGI', 'alt' => 'Inner Peace'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBzwNPcSFZqs1GAmckPtTpqGlD37z1AdiEPd8HC3OkDODgxAnCDYKfPeQhJuCoo2EDbN4mn8gt-i5j2HFjvJUPQrCjgyXzvYAd4FyPCPx9PxDZntHlJSIYSlRm-VMBnFk59R9IhKbbPkWECGSMCLZlsytj-zl6WsJzPxcIpH2B0xcgFxeVPgRfSv2Xem9Q_AWPF5y9LtyQImZeEZ5XNUB7vFqQ1eLX9spqjeLnoo3kXulF5raGMsCmflW6Gwe0vrJzFBpMVCufX_us', 'alt' => 'Guidance'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC4854W6TJkF5EDQfNox3cHQG1pdvaluJ5tXh3jsXYL00lMKmd2dMM2VjkGvO9ub-2p4FtVGlOnT6KnoPUYl6-1jnf5yp9Stfd_5LT9oJc_8houAyCMY-ORwW-Q2-wfv6q3JdZLcvxHoS8Xrc52lvUwxc4I0vfPxl_5ub3VqyG1sqig6-mDn9UmRivwFBlzh5e7kn6Uc5mksEnp5Wa3A8sGDeKDY8CvMQ6aY8Dc4zvNkAOC4qIz4gS3SaLlJbFLQCKw76DghBRtT2E', 'alt' => 'The Studio'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDrFknX9XWkSWdFMPS33IN9SFjmTACiwLRcKq-s9BSnbGeYokWUGJPe3oaQGa2dhiycIvxHMxl_Soo6vq6e6ebyBW9OaT4k-bfOxB8tHMXoBG3P0jSZ4rWwhyoznWUW5LbH06uHApnBjPcIwQgmbdq37tNmCpvdVinCwxdRxze3JHK43AuYmqKE5KxmHl8uGb-wSDTn5B1DOlD4h6Fi3KAjyt_TEWYU4IYjgB_-bf_iUakxLP4bT8IbUvMbiUaBIxoARGvE_4xqi-E', 'alt' => 'The Sanctuary'],
            ];
            ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <?php foreach ($fallback as $img): ?>
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl shadow-md group cursor-pointer">
                        <img alt="<?php echo esc_attr($img['alt']); ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000"
                             src="<?php echo esc_url($img['src']); ?>"/>
                        <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                            <p class="text-white font-serif text-lg"><?php echo esc_html($img['alt']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                <p class="text-zinc-600 mb-10 text-lg">Vyberte si lekci z našeho rozvrhu a dopřejte si chvíli klidu pro své tělo i mysl.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
                       class="btn-primary px-10 py-5 rounded-full font-bold text-lg">
                        Rezervace
                    </a>
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