<?php
/**
 * Template Name: Poprvé na jógu
 */
get_template_part('template-parts/header');

$tips = [
    ['col' => 'md:col-span-8',  'num' => '01', 'title' => 'Choďte včas',               'desc' => 'Doražte alespoň 15 minut před začátkem lekce. Budete mít čas se v klidu převléknout, vydechnout a připravit si své místo v sále. Po začátku lekce se studio zamyká.', 'featured' => false],
    ['col' => 'md:col-span-4',  'num' => '02', 'title' => 'Vhodné oblečení',            'desc' => 'Pohodlí je klíčem. Zvolte oblečení, které vás neomezuje v pohybu a dobře odvádí vlhkost.',                                                                              'featured' => false],
    ['col' => 'md:col-span-4',  'num' => '03', 'title' => 'Základní hygiena',           'desc' => 'Jóga se cvičí naboso. Čistá chodidla a absence silných parfémů jsou ohleduplné k ostatním.',                                                                             'featured' => false],
    ['col' => 'md:col-span-8',  'num' => '04', 'title' => 'Komunikujte s učitelem',     'desc' => 'Máte-li jakékoli zdravotní omezení nebo jste těhotná, informujte učitele před lekcí. Pomůže vám modifikovat pozice tak, aby byly bezpečné.',                             'featured' => false, 'icon' => 'forum'],
    ['col' => 'md:col-span-6',  'num' => '05', 'title' => 'Učitel není lékař',          'desc' => 'Respektujte doporučení svého lékaře. Instruktor jógy vám může poradit s technikou, ale nenahrazuje lékařskou péči.',                                                     'featured' => false],
    ['col' => 'md:col-span-6',  'num' => '06', 'title' => 'Naslouchejte svému tělu',    'desc' => 'Jóga není o soutěžení. Pokud cítíte ostrou bolest, přestaňte a odpočiňte si v pozici dítěte. Vaše tělo je váš nejlepší rádce.',                                        'featured' => true],
    ['col' => 'md:col-span-7',  'num' => '07', 'title' => 'Nerušte ostatní',            'desc' => 'Do sálu vstupujte tiše. Telefony nechte v šatně, nebo je zcela vypněte. Společný čas je posvátný pro každého v místnosti.',                                             'featured' => false],
    ['col' => 'md:col-span-5',  'num' => '08', 'title' => 'Neodcházejte před šavásanou','desc' => 'Závěrečná relaxace je nejdůležitější částí lekce. Pokud musíte odejít dříve, odejděte prosím před jejím začátkem.',                                                      'featured' => false],
    ['col' => 'md:col-span-6',  'num' => '09', 'title' => 'Váš prostor je podložka',    'desc' => 'Respektujte prostor souseda. Snažte se nevstupovat na podložky ostatních a udržujte si svůj klidný mikrosvět.',                                                         'featured' => false],
    ['col' => 'md:col-span-6',  'num' => '10', 'title' => 'Udržujte pořádek',           'desc' => 'Po skončení lekce očistěte zapůjčenou podložku a ukliďte všechny pomůcky na své místo. Děkujeme.',                                                                       'featured' => false],
];
?>

<main>
<!-- Hero -->
<section class="relative min-h-screen flex items-center px-6 md:px-20 overflow-hidden pt-32 pb-20 bg-gradient-soft">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="grid md:grid-cols-2 gap-16 items-center max-w-7xl mx-auto w-full relative z-10">
        <div class="z-10 order-2 md:order-1 text-center md:text-left">
            <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Vítejte v oáze klidu</span>
            <h1 class="text-5xl sm:text-6xl md:text-8xl mb-8 leading-tight text-zinc-900 font-serif">
                Poprvé na <br/><span class="italic text-primary">jógu</span>
            </h1>
            <p class="text-xl text-zinc-600 max-w-md mx-auto md:mx-0 mb-10 leading-relaxed font-light">
                Začít s jógou je cesta k sobě samému. Připravili jsme pro vás průvodce, který vám usnadní první krůčky na podložce.
            </p>
            <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
               class="btn-primary px-10 py-5 rounded-full text-lg font-bold inline-block shadow-xl shadow-primary/25">
                Rezervace
            </a>
        </div>
        <div class="relative order-1 md:order-2 flex justify-center">
            <div class="w-full max-w-md md:max-w-lg aspect-[4/5] rounded-2xl overflow-hidden shadow-2xl transform rotate-2 relative z-10">
                <?php
                $img_id = get_theme_mod('prvni_lekce_image');
                if ($img_id):
                    echo wp_get_attachment_image($img_id, 'large', false, ['class' => 'w-full h-full object-cover']);
                else: ?>
                    <img alt="Yoga practice" class="w-full h-full object-cover"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgeguQUfsU3ZPg0qOnXcI8mmzh5LWecNO0EdvlK8Z4dWhw7y78r4kL_GPcdj1Sb1WODqhvAusigQ3l9e1SEhxZhZBdBexTyLpYvuparwrD0wRmplO27B6Ija3IgsU3ekNGmPpqhVfsqomGLELnJWNMuzCX4F5igmtqTzWTQ_we4aD79_nQjebOU_trjkH8lV8QGXmUvFer1cdrJ0nHWEZVW8tx8Rpq_azkReuLhr_DS5hxBEihRkz51Z1x2ISuTg-77ZZoa3tTDf4"/>
                <?php endif; ?>
            </div>
            <div class="absolute -bottom-6 -left-6 md:-bottom-10 md:-left-10 bg-white/90 p-6 md:p-8 rounded-xl shadow-xl max-w-[240px] hidden sm:block backdrop-blur-md border border-primary/10 z-20">
                <p class="text-primary italic font-serif text-lg leading-snug">"Dech je most, který spojuje tělo s myslí."</p>
            </div>
        </div>
    </div>
</section>

<!-- Kroky rezervace -->
<section class="py-24 md:py-32 px-6 bg-surface-dim">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 md:mb-24">
            <h2 class="text-4xl md:text-5xl mb-6 font-serif text-zinc-900">Jak se k nám přidat?</h2>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full"></div>
        </div>
        <div class="grid md:grid-cols-3 gap-8 md:gap-12">
            <?php
            $steps = [
                ['icon' => 'app_registration',       'title' => 'Registrace',   'desc' => 'Skočte si do rezervačního systému a zaregistrujte se. Je to rychlé a snadné, zabere to jen minutku.'],
                ['icon' => 'format_list_bulleted',   'title' => 'Výběr lekce',  'desc' => 'Vyberte si lekci dle Vašeho gusta. Pro začátečníky doporučujeme Hatha jógu nebo Jemnou jógu.'],
                ['icon' => 'event_available',        'title' => 'Potvrzení',    'desc' => 'Po rezervaci obdržíte potvrzení do e-mailu. Pak už jen stačí vzít si pohodlné oblečení a dorazit k nám.'],
            ];
            foreach ($steps as $step): ?>
                <div class="bg-white p-10 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 group border border-zinc-100 flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-full bg-primary-light flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-4xl"><?php echo esc_html($step['icon']); ?></span>
                    </div>
                    <h3 class="text-2xl mb-4 font-serif text-zinc-900"><?php echo esc_html($step['title']); ?></h3>
                    <p class="text-zinc-600 leading-relaxed font-light"><?php echo esc_html($step['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Tipy a etiketa -->
<section class="py-24 md:py-32 px-6 max-w-7xl mx-auto overflow-hidden">
    <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-16 md:mb-24 gap-8 text-center md:text-left">
        <div>
            <span class="text-primary font-bold tracking-widest uppercase text-xs mb-4 block">Etiketa &amp; Rady</span>
            <h2 class="text-4xl md:text-6xl leading-tight font-serif text-zinc-900">Zpříjemněte si <br class="hidden md:block"/>první lekci</h2>
        </div>
        <p class="max-w-md text-zinc-600 text-lg md:text-xl leading-relaxed font-light">
            Abychom se v našem studiu cítili všichni příjemně, připravili jsme pro vás pár tipů, jak se chovat a co očekávat.
        </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8 auto-rows-min">
        <?php foreach ($tips as $tip):
            if ($tip['featured']): ?>
                <div class="<?php echo $tip['col']; ?> bg-primary p-8 md:p-10 rounded-3xl text-white shadow-xl" style="background-color:#E286B1;box-shadow:0 12px 30px rgba(226,134,177,0.2)">
                    <span class="text-6xl font-serif text-white/20 block mb-2"><?php echo esc_html($tip['num']); ?></span>
                    <h3 class="text-2xl mb-4 font-serif italic"><?php echo esc_html($tip['title']); ?></h3>
                    <p class="text-white/90 leading-relaxed text-lg italic font-light"><?php echo esc_html($tip['desc']); ?></p>
                </div>
            <?php else: ?>
                <div class="<?php echo $tip['col']; ?> yoga-card p-8 md:p-10 rounded-3xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <span class="text-6xl md:text-7xl font-serif block mb-2 md:mb-6"
                              style="color:rgba(226,134,177,0.15);line-height:1;"><?php echo esc_html($tip['num']); ?></span>
                        <h3 class="text-2xl md:text-3xl mb-4 font-serif text-zinc-900"><?php echo esc_html($tip['title']); ?></h3>
                        <p class="text-zinc-600 text-base md:text-lg leading-relaxed font-light"><?php echo esc_html($tip['desc']); ?></p>
                    </div>
                    <?php if (!empty($tip['icon'])): ?>
                        <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[12rem] text-primary/5 group-hover:scale-110 transition-transform duration-700">
                            <?php echo esc_html($tip['icon']); ?>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endif;
        endforeach; ?>
    </div>
</section>

<!-- Final CTA -->
<section class="py-24 md:py-32 bg-white text-center px-6 relative overflow-hidden">
    <div class="max-w-3xl mx-auto relative z-10">
        <h2 class="text-4xl md:text-6xl mb-8 font-serif text-zinc-900">
            Jste připraveni na <span class="italic text-primary">první nádech?</span>
        </h2>
        <p class="text-zinc-600 text-lg md:text-xl mb-12 leading-relaxed max-w-2xl mx-auto font-light">
            Není na co čekat. Každá dlouhá cesta začíná prvním krokem na podložku. Těšíme se na vás v našem studiu Flow Yoga.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
            <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
               class="btn-primary px-12 py-5 rounded-full text-lg font-bold shadow-2xl w-full sm:w-auto">
                Chci se přihlásit
            </a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('rozvrh'))); ?>"
               class="bg-zinc-100 text-zinc-800 px-12 py-5 rounded-full text-lg font-bold hover:bg-zinc-200 transition-all w-full sm:w-auto border border-zinc-200">
                Prohlédnout rozvrh
            </a>
        </div>
    </div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[100px] -z-0"></div>
</section>
</main>

<?php get_template_part('template-parts/footer'); ?>
