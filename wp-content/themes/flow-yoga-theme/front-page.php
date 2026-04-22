<?php
/**
 * Template Name: Úvodní stránka
 * Zobrazuje se jako homepage webu.
 */
get_template_part('template-parts/header');
?>

<main>
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center pt-24 overflow-hidden bg-gradient-soft">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-primary-light rounded-full blur-[100px]"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-8 w-full grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="flex flex-col gap-8">
            <span class="text-primary font-bold tracking-[0.2em] uppercase text-sm">
                <?php echo esc_html(get_theme_mod('hero_tagline', 'Vítejte ve Flow Yoga Studiu')); ?>
            </span>
            <h1 class="font-serif text-5xl md:text-7xl leading-[1.1] text-zinc-900">
                <?php echo wp_kses_post(get_theme_mod('hero_title', 'Jóga je cestou k vnitřní <span class="italic text-primary">harmonii</span> a rovnováze.')); ?>
            </h1>
            <p class="text-zinc-600 text-xl max-w-lg leading-relaxed">
                <?php echo esc_html(get_theme_mod('hero_perex', 'Prostor, ve kterém najdete pohlazení nejen pro tělo, ale i pro duši. Objevte svou pravou podstatu v srdci našeho studia.')); ?>
            </p>
            <div class="flex flex-wrap gap-6 pt-4">
                <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
                   class="btn-primary px-10 py-5 rounded-full text-lg font-bold">
                    Rezervace
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('rozvrh'))); ?>"
                   class="bg-white border-2 border-primary/20 text-primary px-10 py-5 rounded-full text-lg font-bold hover:bg-primary-light transition-all duration-300 flex items-center gap-2 group">
                    Týdenní rozvrh
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Hlavní obrázek -->
        <div class="relative flex justify-center items-center" id="hero-image-container">
            <div class="absolute inset-0 bg-primary/10 rounded-xl -rotate-3 scale-105"></div>
            <div class="relative w-full aspect-[4/5] rounded-xl overflow-hidden shadow-2xl floating-pose"
                 id="parallax-img"
                 style="transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1); will-change: transform; transform: translate(calc(var(--mouse-x, 0) * 15px), calc(var(--mouse-y, 0) * 15px));">
                <?php
                $hero_img_id = get_theme_mod('hero_image');
                if ($hero_img_id):
                    echo wp_get_attachment_image($hero_img_id, 'large', false, ['class' => 'w-full h-full object-cover', 'alt' => 'Yoga practice']);
                else: ?>
                    <img alt="Yoga practice" class="w-full h-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5SGbq-6UY9xi40XVdXzLMuMUAxdq-7ydbEkUX98CwdhTA50bRv7M1UgnTKCpuPcFWZHbVt0OUNQLw_t3ysJx_qcDJ-zcsgIJ9TSula3SYiw_tRLX2PmGR2IBuAhIj1wPgPOdkjqavi6PNQrEXoA8yUTMQrrj6ch0Mvwf7VCwiTNVus-v3-0LPfUSgoxook6aZ_t9SYcdgtOYdP_z85_bYiyAQ-ar73lYhCaXPRL-xusZADZCxngUBXhxZL8G-oD4LhaJAfTRNq8o"/>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Yoga Styles Section -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">U nás si každý přijde na své</h2>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            <?php
            // Styly jógy – lze spravovat přes WordPress widgety nebo Custom Fields
            $styles = [
                'Powerjóga', 'Vitální jóga', 'Workshop', 'Jóga na pohodu - Hathajóga',
                'Jin jóga', 'Základy powerjógy', 'Tanec - Taneční cesta', 'Jóga pro zdravá záda',
                'Jóga pro těhotné', 'Jóga s pomůckami', 'Terapeutická jóga', 'Vinyása Flow Jóga',
                'Powerjóga FIT&SLIM', 'Ranní Powerjóga', 'Hathajóga', 'Jemná jóga',
            ];
            foreach ($styles as $style): ?>
                <div class="yoga-pill px-4 h-20 flex items-center justify-center rounded-xl shadow-sm text-center">
                    <span class="text-zinc-800 font-bold leading-tight"><?php echo esc_html($style); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="py-32 bg-primary-light/40">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
        <div class="relative">
            <div class="aspect-square rounded-full overflow-hidden border-[16px] border-white shadow-xl">
                <?php
                $about_img_id = get_theme_mod('about_image');
                if ($about_img_id):
                    echo wp_get_attachment_image($about_img_id, 'large', false, ['class' => 'w-full h-full object-cover']);
                else: ?>
                    <img alt="Our Studio" class="w-full h-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTsKvpJAMBk0YnsnwfSUhXFftcSf-BtrnelQwMCPUVxIMFwQwdP5cGSq2W9vxU8p8AZl-KQAW2SzKC12ly0EadO_hZRJEjqR8kNIWwhNBit92mRqrQJ5xMh2TiUCLqAjoUJSAgz8TMJzHqth2x1IYbuc9YnlBLvJ2lxWDFWvInNUUjw2-khSIO3G_BfXupDeibSbOysktZeZEnScAWLdVqumPyvZ4CETTBm8FVtBQXiMJpm0buvcNhGZYYVwRaNYoY3qBdeEVWztw"/>
                <?php endif; ?>
            </div>
            <div class="absolute -top-4 -right-4 w-32 h-32 bg-primary/20 rounded-full blur-2xl"></div>
        </div>
        <div class="flex flex-col gap-8">
            <h2 class="font-serif text-5xl text-zinc-900">Kdo jsme</h2>
            <p class="text-zinc-600 text-xl leading-relaxed">
                <?php echo esc_html(get_theme_mod('about_text', 'Prostor, ve kterém najdete pohlazení nejen pro tělo, ale i pro duši. Prostor, který je plný klidu, citu, harmonie a respektu. Umožníme Vám vstoupit "k sobě domů", do svého nitra a užívat si slastné okamžiky splynutí se svou pravou podstatou. A to vše prostřednictvím různých stylů jógy tak, aby si každý našel tu svou.')); ?>
            </p>
            <a class="text-primary font-bold inline-flex items-center gap-2 group text-lg"
               href="<?php echo esc_url(get_permalink(get_page_by_path('kdo-jsme'))); ?>">
                Poznejte nás více
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- Instructors Section -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">Náš tým</h2>
            <p class="text-zinc-500 text-lg">Seznamte se s lektorkami, které vás provedou vaší cestou.</p>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto mt-6 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php
            // Dotaz na lektorky – vlastní post type "lektor" nebo klasické Pages
            $lektori = get_posts([
                'post_type'      => 'lektor',
                'posts_per_page' => 3,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);
            if ($lektori):
                foreach ($lektori as $lektor):
                    setup_postdata($lektor); ?>
                    <div class="flex flex-col items-center text-center group">
                        <div class="relative w-64 h-64 mb-8 overflow-hidden rounded-full border-4 border-primary-light shadow-lg">
                            <?php if (has_post_thumbnail($lektor->ID)):
                                echo get_the_post_thumbnail($lektor->ID, 'thumbnail', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700']);
                            endif; ?>
                        </div>
                        <h3 class="font-serif text-2xl mb-2 text-zinc-900"><?php echo esc_html($lektor->post_title); ?></h3>
                        <p class="text-primary font-bold tracking-wide"><?php echo esc_html(get_post_meta($lektor->ID, 'role', true)); ?></p>
                    </div>
                <?php endforeach;
                wp_reset_postdata();
            else: ?>
                <!-- Fallback – žádní lektoři ještě nejsou zadání přes admin -->
                <div class="flex flex-col items-center text-center group">
                    <div class="relative w-64 h-64 mb-8 overflow-hidden rounded-full border-4 border-primary-light shadow-lg">
                        <img alt="Šárka" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwlP3hQPNQAdGSt-Pf272w5lqcxYtc-3CDwrvoz5CAuVQXHcb1D6nkGBpmDujV8MbOelOdRztmMCSR4qlpyZnSdto-szLZMmd_YXJNgQaUNOXRr6Ip4Zeca2A74v-_eJ3GY4BKN5kNqgkQJ6jKNr2kh8o42t5DXIA_O9_NfHMwHJMUs39DC99QAPzFOeVGycSBXe7OwXXr2q-G80WWu4gyNCv3Zyiso8wMIRa0VGiUZKGCJkC_PvtNSQ9q0fyDtpve8ZvjIvF0eDs"/>
                    </div>
                    <h3 class="font-serif text-2xl mb-2 text-zinc-900">Šárka</h3>
                    <p class="text-primary font-bold tracking-wide">Zakladatelka &amp; Lektorka</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Aktuality Section -->
<section class="py-32 bg-primary-light/30 overflow-hidden">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="font-serif text-5xl mb-4 text-zinc-900">Aktuality ze studia</h2>
                <div class="w-24 h-1.5 bg-primary/40 rounded-full"></div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-start">
            <?php
            $aktuality = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);
            if ($aktuality->have_posts()):
                while ($aktuality->have_posts()): $aktuality->the_post(); ?>
                    <article class="flex flex-col gap-6 group">
                        <div class="relative aspect-[3/4] overflow-hidden rounded-2xl shadow-md">
                            <?php if (has_post_thumbnail()):
                                the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000']);
                            endif; ?>
                            <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors"></div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <span class="text-primary text-xs font-bold uppercase tracking-widest">
                                <?php echo get_the_date('j.n.Y'); ?>
                            </span>
                            <h3 class="font-serif text-2xl leading-tight text-zinc-900 group-hover:text-primary transition-colors uppercase">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-zinc-600 line-clamp-2"><?php the_excerpt(); ?></p>
                            <a class="inline-flex items-center gap-2 text-zinc-800 font-bold text-sm border-b-2 border-primary/20 w-fit pb-1 hover:border-primary transition-all"
                               href="<?php the_permalink(); ?>">Číst více</a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
        <div class="mt-16 text-center">
            <a class="text-primary font-bold uppercase tracking-widest text-sm hover:underline flex items-center justify-center gap-2"
               href="<?php echo esc_url(get_permalink(get_page_by_path('aktuality'))); ?>">
                Více aktualit <span class="material-symbols-outlined text-sm">open_in_new</span>
            </a>
        </div>
    </div>
</section>

<!-- Newcomers CTA -->
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-8">
        <div class="bg-primary/5 rounded-3xl p-12 md:p-20 text-center relative overflow-hidden border border-primary/10 shadow-sm">
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="font-serif text-4xl mb-6 text-zinc-900">Ještě jste na józe nikdy nebyli? Super! My nováčky zbožňujeme.</h2>
                <p class="text-zinc-600 mb-10 text-lg">Udělejte svůj první krok k lepšímu já v prostředí, kde se budete cítit bezpečně a vítáni.</p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('prvni-lekce'))); ?>"
                   class="btn-primary px-10 py-5 rounded-full font-bold text-lg">
                    Chci k vám poprvé
                </a>
            </div>
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
        </div>
    </div>
</section>
</main>

<?php get_template_part('template-parts/footer'); ?>
