<?php
/**
 * Template Name: Co nabízíme
 */
get_template_part('template-parts/header');

$classes = [
    ['label' => 'Intenzivní', 'icon' => 'bolt',             'title' => 'Powerjóga',          'desc' => 'Dynamický styl jógy zaměřený na budování síly, flexibility a koncentrace v rytmu dechu.',                             'lektor' => 'Šárka Řiháková', 'featured' => false],
    ['label' => 'Energie',    'icon' => 'eco',              'title' => 'Vitální jóga',        'desc' => 'Probuďte svou životní energii skrze jemné sekvence zaměřené na hormonální rovnováhu.',                                 'lektor' => 'Kateřina Malá',  'featured' => false],
    ['label' => 'Speciální',  'icon' => 'event',            'title' => 'Workshop',            'desc' => 'Prohlubte svou praxi v tématických blocích zaměřených na konkrétní aspekty jógy a meditace.',                         'lektor' => 'Hostující lektoři', 'featured' => true],
    ['label' => 'Klasika',    'icon' => 'self_improvement', 'title' => 'Hathajóga',           'desc' => 'Jóga na pohodu. Tradiční pozice a dechová cvičení pro harmonii těla i mysli.',                                        'lektor' => 'Jana Nováková',  'featured' => false],
    ['label' => 'Meditativní','icon' => 'nights_stay',      'title' => 'Jin Jóga',            'desc' => 'Pomalá praxe zaměřená na pojivové tkáně a hluboké uvolnění v delších výdržích.',                                      'lektor' => 'Lenka Černá',    'featured' => false],
    ['label' => 'Pohyb',      'icon' => 'music_note',       'title' => 'Taneční Cesta',       'desc' => 'Osvoboďte své tělo skrze intuitivní pohyb a tanec v bezpečném kruhu.',                                                 'lektor' => 'Petra Svobodová','featured' => false],
    ['label' => 'Zdraví',     'icon' => 'accessibility_new','title' => 'Jóga pro zdravá záda','desc' => 'Specifické cviky k posílení středu těla a uvolnění napětí v oblasti páteře.',                                         'lektor' => 'Martin Král',    'featured' => false],
    ['label' => 'Pro ženy',   'icon' => 'favorite',         'title' => 'Jóga pro těhotné',    'desc' => 'Jemná příprava těla na porod a podpora klidného těhotenství.',                                                         'lektor' => 'Lucie Veselá',   'featured' => false],
    ['label' => 'Flow',       'icon' => 'waves',            'title' => 'Vinyása Flow Jóga',   'desc' => 'Plynulé přechody mezi pozicemi, které vytvářejí tanec s dechem.',                                                      'lektor' => 'Šárka Řiháková', 'featured' => false],
];
?>

<main>
<!-- Hero -->
<section class="relative pt-48 pb-24 overflow-hidden bg-gradient-soft">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2">
                <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Naše lekce</span>
                <h1 class="text-6xl md:text-8xl font-serif text-zinc-900 leading-tight mb-8">
                    Co <span class="italic text-primary">nabízíme</span>
                </h1>
                <p class="text-xl text-zinc-600 leading-relaxed font-light max-w-lg">
                    <?php echo esc_html(get_theme_mod('co_nabizime_perex', 'Vstupte do prostoru, kde se dech potkává s pohybem. Naše lekce jsou navrženy tak, aby vám pomohly najít vnitřní klid i vnější sílu.')); ?>
                </p>
            </div>
            <div class="w-full md:w-1/2 relative">
                <div class="aspect-[4/5] rounded-2xl overflow-hidden shadow-2xl transform rotate-2 relative z-10">
                    <?php
                    $img_id = get_theme_mod('co_nabizime_image');
                    if ($img_id):
                        echo wp_get_attachment_image($img_id, 'large', false, ['class' => 'w-full h-full object-cover']);
                    else: ?>
                        <img alt="Yoga practice" class="w-full h-full object-cover"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrFWGZVmAbd2WEDzE7UKW7ijM0OmA9X8_hQgLnplb_xYeedPE58NwnXJ-pePvNn0p6shBdJE7ndSwrhNdkWPhNG-F-3tDndSDIW55V-w1oq6RJgd454Vt0mZLCeZ0ZKPY3D39mCPmkSqGg7I2fuFBAgQhncFn_qb_WLJn--osa1l0B7oizzp37GJASisxl6F_HAeyi62IL556RhUgJSslZoM4obn52fLoXOesWthne50s2iXgsFWWPgnX7oPp8Ty5MaU4WXiGbAy4"/>
                    <?php endif; ?>
                </div>
                <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-primary/10 rounded-full -z-0 blur-3xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- Přehled lekcí -->
<section class="py-32 px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            <?php foreach ($classes as $class):
                if ($class['featured']): ?>
                    <div class="bg-primary text-white p-10 rounded-3xl flex flex-col h-full shadow-xl shadow-primary/20">
                        <div class="flex justify-between items-start mb-6">
                            <span class="text-white/70 font-bold tracking-widest text-xs uppercase"><?php echo esc_html($class['label']); ?></span>
                            <span class="material-symbols-outlined"><?php echo esc_html($class['icon']); ?></span>
                        </div>
                        <h3 class="text-3xl font-serif mb-4 italic"><?php echo esc_html($class['title']); ?></h3>
                        <p class="text-white/90 leading-relaxed mb-8 flex-grow"><?php echo esc_html($class['desc']); ?></p>
                        <div class="pt-6 border-t border-white/20">
                            <p class="text-sm font-medium text-white/70 uppercase tracking-wider">Vedené <span class="text-white"><?php echo esc_html($class['lektor']); ?></span></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                        <div class="flex justify-between items-start mb-6">
                            <span class="text-primary font-bold tracking-widest text-xs uppercase"><?php echo esc_html($class['label']); ?></span>
                            <span class="material-symbols-outlined text-primary/40"><?php echo esc_html($class['icon']); ?></span>
                        </div>
                        <h3 class="text-3xl font-serif mb-4 text-zinc-900"><?php echo esc_html($class['title']); ?></h3>
                        <p class="text-zinc-600 leading-relaxed mb-8 flex-grow"><?php echo esc_html($class['desc']); ?></p>
                        <div class="pt-6 border-t border-primary/10">
                            <p class="text-sm font-medium text-zinc-400 uppercase tracking-wider">Lekce vede <span class="text-zinc-800"><?php echo esc_html($class['lektor']); ?></span></p>
                        </div>
                    </div>
                <?php endif;
            endforeach; ?>
        </div>
    </div>
</section>

<!-- Asymetrický bento – soukromé lekce + pomůcky -->
<section class="py-32 px-8 bg-primary-light/30">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8">
        <div class="md:col-span-7 bg-white p-12 rounded-3xl flex flex-col justify-center border border-primary/10 shadow-sm">
            <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Individuální přístup</span>
            <h2 class="text-4xl font-serif mb-6 text-zinc-900 italic">Soukromé lekce</h2>
            <p class="text-zinc-600 leading-relaxed mb-8 text-lg">
                Hledáte hlubší vhled do své praxe nebo řešíte specifická omezení? Soukromé lekce nabízí prostor jen pro vás a vaše potřeby pod vedením našich zkušených lektorů.
            </p>
            <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
               class="w-fit border-b-2 border-primary text-primary font-bold hover:translate-x-2 transition-transform pb-1 flex items-center gap-2 group">
                Zjistit více o soukromých lekcích
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
        <div class="md:col-span-5 rounded-3xl overflow-hidden shadow-xl h-[400px]">
            <img alt="Private yoga lesson" class="w-full h-full object-cover"
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuACiML_egHdGMXafJjQQ8nGkbMMsebPym5XtffsbzdxaRTgUtyyP-ByAVlHg1gOMZl3YnEeCHT7UksMjLVbunYMcGTH2RE30yzYR_z4yZObsxgXK4jM31tB328de4olN7Gcz3PtRqKt6FeXZqdi7v5aBLa6RNEv-pY9q6qlVEvnqZ1kX5sT61UA5av0WlWbM9m7T3lgihirKRzvkQQ72b0TulxWoBlUVt_1m6VQl8x5uxmIgWtilbcMfRKSDVdn0uKftlpSOqr_5EI"/>
        </div>
        <div class="md:col-span-5 rounded-3xl overflow-hidden shadow-xl h-[400px] order-4 md:order-3">
            <img alt="Yoga with props" class="w-full h-full object-cover"
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuBS3zDVdw4io7Xlcd1fgMgdqyH-Zm1tYxNrmFCb2C4oQM_qKMb4L-G45hsVAdY02BQ9POGNGQZSauGC3myQxEkszGHtNPAzZgMfEUJzmHnSEGijGw3u-Z6RgRn3kgRZhRDzpeUUswyeuPv7KFei_wzOmliKo8XTRUdynMans_FK_RbNw2QE2DsLeYoQegzyd1E97hRqdOBW3yUgQIeupHK4Ez3S9CIlbKNo66DBIT3lwdIaVylAwPeH23zZZCSAlf-ZWUvOVNrbdY8"/>
        </div>
        <div class="md:col-span-7 bg-white p-12 rounded-3xl flex flex-col justify-center border border-primary/10 shadow-sm order-3 md:order-4">
            <h3 class="text-3xl font-serif mb-4 text-zinc-900 uppercase">Jóga s pomůckami</h3>
            <p class="text-zinc-600 leading-relaxed mb-8">
                Využijte bloky, pásky a bolstery k bezpečnému dosažení správného zarovnání a hlubšího protažení bez rizika zranění. Ideální pro začátečníky i pokročilé.
            </p>
            <div class="pt-6 border-t border-primary/10">
                <p class="text-sm font-medium text-zinc-400 uppercase tracking-wider">Lekce vede <span class="text-zinc-800">Šárka Řiháková</span></p>
            </div>
        </div>
    </div>
</section>

<!-- Další možnosti -->
<section class="py-32 px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-serif mb-6 text-zinc-900">Další možnosti cvičení</h2>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <?php
            $extras = [
                ['title' => 'Základy powerjógy',  'sub' => 'Pro úplné začátečníky'],
                ['title' => 'Terapeutická jóga',  'sub' => 'Léčivé pozice a klid'],
                ['title' => 'Powerjóga FIT&SLIM',  'sub' => 'Kondiční spalování'],
                ['title' => 'Ranní Powerjóga',     'sub' => 'Start vašeho dne'],
            ];
            foreach ($extras as $e): ?>
                <div class="yoga-pill px-6 py-8 flex flex-col items-center justify-center rounded-2xl shadow-sm text-center">
                    <h4 class="font-bold text-zinc-800 mb-1"><?php echo esc_html($e['title']); ?></h4>
                    <p class="text-xs text-zinc-500 uppercase tracking-widest"><?php echo esc_html($e['sub']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</main>

<?php get_template_part('template-parts/footer'); ?>
