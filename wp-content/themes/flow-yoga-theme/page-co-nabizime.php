<?php
/**
 * Template Name: Co nabízíme
 */
get_template_part('template-parts/header');

$classes = [
    ['label' => 'síla',  'icon' => 'bolt',             'title' => 'Powerjóga',                   'desc' => 'Dynamický styl jógy zaměřený na budování síly, flexibility a koncentrace v rytmu dechu.',  'featured' => false],
    ['label' => 'energie',     'icon' => 'eco',              'title' => 'Vitální jóga',                'desc' => 'Probuďte svou životní energii skrze jemné sekvence zaměřené na hormonální rovnováhu.',      'featured' => false],
    ['label' => 'dýchání',     'icon' => 'self_improvement', 'title' => 'Hathajóga',                   'desc' => 'Jóga na pohodu. Tradiční pozice a dechová cvičení pro harmonii těla i mysli.',              'featured' => false],
    ['label' => 'meditace', 'icon' => 'nights_stay',      'title' => 'Jin jóga',                    'desc' => 'Pomalá praxe zaměřená na pojivové tkáně a hluboké uvolnění v delších výdržích.',            'featured' => false],
    ['label' => 'pohyb',       'icon' => 'music_note',       'title' => 'Tanec – taneční cesta',       'desc' => 'Osvoboďte své tělo skrze intuitivní pohyb a tanec v bezpečném kruhu.',                      'featured' => false],
    ['label' => 'zdraví',      'icon' => 'accessibility_new','title' => 'Jóga pro zdravá záda',        'desc' => 'Specifické cviky k posílení středu těla a uvolnění napětí v oblasti páteře.',               'featured' => false],
    ['label' => 'klid',    'icon' => 'favorite',         'title' => 'Jóga pro těhotné',            'desc' => 'Jemná příprava těla na porod a podpora klidného těhotenství.',                              'featured' => false],
    ['label' => 'flow',        'icon' => 'waves',            'title' => 'Vinyása flow jóga',           'desc' => 'Plynulé přechody mezi pozicemi, které vytvářejí tanec s dechem.',                           'featured' => false],
    ['label' => 'pohoda',      'icon' => 'spa',              'title' => 'Jóga na pohodu – Hathajóga', 'desc' => 'Klidné tempo, přirozené pozice a vědomý dech pro každodenní pohodu.',                       'featured' => false],
    ['label' => 'začátky',     'icon' => 'school',           'title' => 'Základy powerjógy',           'desc' => 'Ideální vstup do světa jógy pro ty, kdo teprve začínají svou cestu.',                       'featured' => false],
    ['label' => 'regenerace',      'icon' => 'healing',          'title' => 'Terapeutická jóga',           'desc' => 'Léčivé pozice a dechová práce zaměřené na obnovu a regeneraci těla.',                       'featured' => false],
    ['label' => 'kondice',     'icon' => 'fitness_center',   'title' => 'Powerjóga FIT&SLIM',          'desc' => 'Intenzivní lekce kombinující sílu, spalování a jógovou filozofii.',                          'featured' => false],
    ['label' => 'ráno',        'icon' => 'wb_sunny',         'title' => 'Ranní powerjóga',             'desc' => 'Energický start dne s dynamickými sekvencemi pro tělo i mysl.',                             'featured' => false],
    ['label' => 'jemnost',       'icon' => 'air',              'title' => 'Jemná jóga',                  'desc' => 'Pomalé, vědomé pohyby vhodné pro všechny – po náročném dni i pro citlivá těla.',            'featured' => false],
    ['label' => 'pomůcky',     'icon' => 'category',         'title' => 'Jóga s pomůckami',            'desc' => 'Bloky, pásky a bolstery pro bezpečné zarovnání a hlubší protažení bez rizika.',             'featured' => false],
];
?>

<main>

<section class="relative pt-32 pb-24 bg-gradient-soft overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
        <h1 class="font-serif text-5xl md:text-7xl text-zinc-900 mb-8 leading-tight">Co nabízíme</h1>
        <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mb-8"></div>
        <p class="text-xl text-zinc-500 leading-relaxed max-w-2xl mx-auto">
            <?php echo esc_html(get_theme_mod('co_nabizime_perex', 'Ať teprve začínáte, nebo cvičíte léta – najdete u nás lekci, která vám sedí.')); ?>
        </p>
    </div>
</section>

<!-- Přehled lekcí -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($classes as $class):
                if ($class['featured']): ?>
                    <div class="bg-primary text-white p-10 rounded-3xl flex flex-col h-full shadow-xl shadow-primary/20">
                        <div class="flex justify-between items-start mb-6">
                            <span class="text-white/70 font-bold tracking-widest text-xs uppercase"><?php echo esc_html($class['label']); ?></span>
                            <span class="material-symbols-outlined"><?php echo esc_html($class['icon']); ?></span>
                        </div>
                        <h3 class="text-3xl font-serif mb-4 italic"><?php echo esc_html($class['title']); ?></h3>
                        <p class="text-white/90 leading-relaxed flex-grow"><?php echo esc_html($class['desc']); ?></p>
                    </div>
                <?php else: ?>
                    <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                        <div class="flex justify-between items-start mb-6">
                            <span class="text-primary font-bold tracking-widest text-xs uppercase"><?php echo esc_html($class['label']); ?></span>
                            <span class="material-symbols-outlined text-primary/40"><?php echo esc_html($class['icon']); ?></span>
                        </div>
                        <h3 class="text-3xl font-serif mb-4 text-zinc-900"><?php echo esc_html($class['title']); ?></h3>
                        <p class="text-zinc-600 leading-relaxed flex-grow"><?php echo esc_html($class['desc']); ?></p>
                    </div>
                <?php endif;
            endforeach; ?>
        </div>
    </div>
</section>

<!-- Studio info -->
<section class="py-32 bg-primary-light/40">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">Přijďte v pohodě</h2>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white p-10 rounded-3xl flex flex-col border border-primary/10 shadow-sm">
                <span class="material-symbols-outlined text-primary text-4xl mb-6">ac_unit</span>
                <h3 class="font-serif text-2xl mb-4 text-zinc-900">Klimatizace</h3>
                <p class="text-zinc-600 leading-relaxed">
                    Studio je vybaveno klimatizací, takže se budete cítit příjemně v létě i v zimě – bez ohledu na počasí venku.
                </p>
            </div>

            <div class="bg-white p-10 rounded-3xl flex flex-col border border-primary/10 shadow-sm">
                <span class="material-symbols-outlined text-primary text-4xl mb-6">fitness_center</span>
                <h3 class="font-serif text-2xl mb-4 text-zinc-900">Pomůcky k půjčení</h3>
                <p class="text-zinc-600 leading-relaxed">
                    Přijďte na první lekci s prázdnýma rukama – podložky máme pro vás připravené. Ideální pro ty, kdo si chtějí jógu nejdřív vyzkoušet.
                </p>
            </div>

            <div class="bg-white p-10 rounded-3xl flex flex-col border border-primary/10 shadow-sm">
                <span class="material-symbols-outlined text-primary text-4xl mb-6">favorite</span>
                <h3 class="font-serif text-2xl mb-4 text-zinc-900">Přívětivé prostředí</h3>
                <p class="text-zinc-600 leading-relaxed">
                    Ať jste úplný začátečník nebo zkušený jogín, u nás se budete cítit vítáni. Studio je místem bez srovnávání a bez tlaku.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-8">
        <div class="bg-primary/5 rounded-3xl p-12 md:p-20 text-center relative overflow-hidden border border-primary/10 shadow-sm">
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="font-serif text-4xl md:text-5xl mb-6 text-zinc-900">Připraveni začít?</h2>
                <p class="text-zinc-600 mb-10 text-lg">Vyberte si lekci, která vám sedí, a přijďte si zacvičit.</p>
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