<?php
/**
 * Template Name: Galerie
 *
 * Obrázky se spravují přes WordPress admin → Média.
 * Galerie se přiřazují přes plugin "Real Media Library" nebo
 * jednoduše přes natívní WordPress galerii vloženou do obsahu stránky.
 *
 * Tato šablona zobrazuje obrázky z nativní WordPress galerie stránky
 * (vložené Gutenbergem nebo Classic Editorem) v bento gridu.
 */
get_template_part('template-parts/header');

// Načti obrázky galerie připojené k této stránce
$gallery_images = get_attached_media('image', get_the_ID());
?>

<main>
<!-- Hero -->
<section class="relative pt-32 pb-24 bg-gradient-soft overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
        <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Visual Journey</span>
        <h1 class="text-5xl md:text-7xl font-headline text-zinc-900 mb-8 leading-tight tracking-tight">Galerie</h1>
        <p class="text-xl text-zinc-500 font-body leading-relaxed max-w-2xl mx-auto">
            <?php echo esc_html(get_theme_mod('galerie_perex', 'Nahlédněte do atmosféry našeho studia, lekcí a workshopů.')); ?>
        </p>
    </div>
</section>

<!-- Bento galerie -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-8">

        <?php if (!empty($gallery_images)):
            $images = array_values($gallery_images);
            $chunks = array_chunk($images, 5); // po 5 obrázcích opakuj vzor
            foreach ($chunks as $chunk): ?>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-8">

                    <?php
                    // vzor: velký (8) | vysoký (4) | 3× čtverce | celá šířka
                    $layouts = [
                        ['col' => 'md:col-span-8', 'aspect' => 'aspect-[16/10]'],
                        ['col' => 'md:col-span-4', 'aspect' => 'aspect-[3/4]'],
                        ['col' => 'md:col-span-4', 'aspect' => 'aspect-square'],
                        ['col' => 'md:col-span-4', 'aspect' => 'aspect-square'],
                        ['col' => 'md:col-span-4', 'aspect' => 'aspect-square'],
                    ];
                    foreach ($chunk as $i => $img):
                        $layout = $layouts[$i] ?? ['col' => 'md:col-span-4', 'aspect' => 'aspect-square'];
                        $caption = get_post_meta($img->ID, '_wp_attachment_image_alt', true) ?: $img->post_title;
                    ?>
                        <div class="<?php echo $layout['col']; ?> gallery-card rounded-xl relative group cursor-pointer">
                            <div class="<?php echo $layout['aspect']; ?> h-full">
                                <?php echo wp_get_attachment_image($img->ID, 'large', false, [
                                    'class' => 'w-full h-full object-cover transition-transform duration-700',
                                    'alt'   => esc_attr($caption),
                                ]); ?>
                                <div class="overlay absolute inset-0 bg-black/30 opacity-0 transition-opacity duration-500 flex items-end p-8">
                                    <p class="text-white font-headline text-xl"><?php echo esc_html($caption); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endforeach;

        else:
            // Fallback – žádné obrázky ještě nejsou nahrané přes admin
            $fallback = [
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuABuF7V3Cze07gXV109YT35OrYbEBCrD33tNgMnLM3XpQSG7NwuiuBEEDoaG7f_CazG-ucSCvCgDFTkPL066aFwDKrnUXqSV7LMod_WS2SQXCa4YjMHMTXgrD_FVkjL5iM55SpBsfbVAvgjl7DipVWYyspe1rQ5fGxZ9iFAbVU8nQj7x7NHTJdEgO2Nrq4XtYUc0rTJ527iZoqaf-15tNLFJj3C8A0n773NUpaRPD3QM2ORF14J6s3_pMECCN_gPvSivsmZPt2VD_o', 'alt' => 'Morning Vinyasa', 'col' => 'md:col-span-8', 'aspect' => 'aspect-[16/10]'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDro2rOc4cbZnFNNwT_1ENSpCGkkVApLL8ZUbySdRHekb_a6swSmXzQ8O9VKhHCxcmD-nw3BZLOga7LTr5yfH-GZirv8HQcKuYrvxgl6ClUmniuQAU72lMvGSYFIn-I9FGbnEgIV1qYRAdwBWuW_AqturAMLn2XwoK-jSYwtcxFnWLFPwe3UZpmeWsndhYYTvx13DyLa2Q_Ueit42McYjGx3qiG5Pphcf3zDE5GC8KTPuc6OMSrb6jPu2BMtZcOcUaibZeWeKkJJns', 'alt' => 'The Details',    'col' => 'md:col-span-4', 'aspect' => 'aspect-[3/4]'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBPMk4X7vzPEfgm-KbrQ1U1u7GuH14j4m7SQvpiERvaRMU-2CP7CsWzX3FXrHeJVB3Y1r8EcnUYaY_770pOzFl0M6UJe2uNMwcwjki0F821Gf6DrzpRA6cJZ1bFBwavDwRpzzJGRqZT4ObRHxiMfhfXnGm4GuF_PbeJ0t5_CFQ1UJM3vmdFhRhmH_VssAa-XEF539JbkFGuoLcCVs_2Xzr7yhyguO1zwvquE_lakvSDBcbzHNsTEfGZhtQAOOK0wyhKKGFli6XZJGI', 'alt' => 'Inner Peace',    'col' => 'md:col-span-4', 'aspect' => 'aspect-square'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBzwNPcSFZqs1GAmckPtTpqGlD37z1AdiEPd8HC3OkDODgxAnCDYKfPeQhJuCoo2EDbN4mn8gt-i5j2HFjvJUPQrCjgyXzvYAd4FyPCPx9PxDZntHlJSIYSlRm-VMBnFk59R9IhKbbPkWECGSMCLZlsytj-zl6WsJzPxcIpH2B0xcgFxeVPgRfSv2Xem9Q_AWPF5y9LtyQImZeEZ5XNUB7vFqQ1eLX9spqjeLnoo3kXulF5raGMsCmflW6Gwe0vrJzFBpMVCufX_us', 'alt' => 'Guidance',       'col' => 'md:col-span-4', 'aspect' => 'aspect-square'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC4854W6TJkF5EDQfNox3cHQG1pdvaluJ5tXh3jsXYL00lMKmd2dMM2VjkGvO9ub-2p4FtVGlOnT6KnoPUYl6-1jnf5yp9Stfd_5LT9oJc_8houAyCMY-ORwW-Q2-wfv6q3JdZLcvxHoS8Xrc52lvUwxc4I0vfPxl_5ub3VqyG1sqig6-mDn9UmRivwFBlzh5e7kn6Uc5mksEnp5Wa3A8sGDeKDY8CvMQ6aY8Dc4zvNkAOC4qIz4gS3SaLlJbFLQCKw76DghBRtT2E', 'alt' => 'The Studio',     'col' => 'md:col-span-4', 'aspect' => 'aspect-square'],
                ['src' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDrFknX9XWkSWdFMPS33IN9SFjmTACiwLRcKq-s9BSnbGeYokWUGJPe3oaQGa2dhiycIvxHMxl_Soo6vq6e6ebyBW9OaT4k-bfOxB8tHMXoBG3P0jSZ4rWwhyoznWUW5LbH06uHApnBjPcIwQgmbdq37tNmCpvdVinCwxdRxze3JHK43AuYmqKE5KxmHl8uGb-wSDTn5B1DOlD4h6Fi3KAjyt_TEWYU4IYjgB_-bf_iUakxLP4bT8IbUvMbiUaBIxoARGvE_4xqi-E', 'alt' => 'The Sanctuary',  'col' => 'md:col-span-12','aspect' => 'aspect-[21/9]'],
            ];
            ?>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                <?php foreach ($fallback as $img): ?>
                    <div class="<?php echo $img['col']; ?> gallery-card rounded-xl relative group cursor-pointer">
                        <div class="<?php echo $img['aspect']; ?> h-full">
                            <img alt="<?php echo esc_attr($img['alt']); ?>"
                                 class="w-full h-full object-cover transition-transform duration-700"
                                 src="<?php echo esc_url($img['src']); ?>"/>
                            <div class="overlay absolute inset-0 bg-black/30 opacity-0 transition-opacity duration-500 flex items-end p-8">
                                <p class="text-white font-headline text-xl"><?php echo esc_html($img['alt']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="text-center text-zinc-400 text-sm mt-12">
                Obrázky galerie přidáte v <strong>Admin → Média → Nahrát soubory</strong>, poté je přiložte k této stránce.
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-primary-light/40">
    <div class="max-w-5xl mx-auto px-8 text-center">
        <div class="bg-white rounded-xl p-12 md:p-20 relative overflow-hidden shadow-sm border border-primary/5">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
            <div class="relative z-10">
                <span class="inline-block px-4 py-1 bg-primary/10 text-primary-dark rounded-full text-xs font-bold tracking-widest uppercase mb-6">Rezervace otevřeny</span>
                <h2 class="text-4xl md:text-5xl font-headline mb-8">Přijďte si s námi zacvičit</h2>
                <p class="text-zinc-600 font-body mb-12 max-w-2xl mx-auto text-lg leading-relaxed">
                    Vyberte si lekci z našeho rozvrhu a dopřejte si chvíli klidu pro své tělo i mysl. Naše lektorky se na vás již těší.
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
