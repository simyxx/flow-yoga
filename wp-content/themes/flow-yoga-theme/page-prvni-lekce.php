<?php
/**
 * Template Name: Poprvé na jógu
 */
get_template_part('template-parts/header');

$tips = [
    ['col' => 'md:col-span-8',  'num' => '01', 'title' => 'Choďte včas',                'desc' => 'Doražte alespoň 15 minut před začátkem lekce. Budete mít čas se v klidu převléknout, vydechnout a připravit si své místo v sále. Po začátku lekce se studio zamyká.', 'featured' => false],
    ['col' => 'md:col-span-4',  'num' => '02', 'title' => 'Vhodné oblečení',             'desc' => 'Pohodlí je klíčem. Zvolte oblečení, které vás neomezuje v pohybu a dobře odvádí vlhkost.',                                                                              'featured' => false],
    ['col' => 'md:col-span-4',  'num' => '03', 'title' => 'Základní hygiena',            'desc' => 'Jóga se cvičí naboso. Čistá chodidla a absence silných parfémů jsou ohleduplné k ostatním.',                                                                             'featured' => false],
    ['col' => 'md:col-span-8',  'num' => '04', 'title' => 'Komunikujte s učitelem',      'desc' => 'Máte-li jakékoli zdravotní omezení nebo jste těhotná, informujte učitele před lekcí. Pomůže vám modifikovat pozice tak, aby byly bezpečné.', 'featured' => false, 'icon' => 'forum'],
    ['col' => 'md:col-span-6',  'num' => '05', 'title' => 'Učitel není lékař',           'desc' => 'Respektujte doporučení svého lékaře. Instruktor jógy vám může poradit s technikou, ale nenahrazuje lékařskou péči.',                                                     'featured' => false],
    ['col' => 'md:col-span-6',  'num' => '06', 'title' => 'Naslouchejte svému tělu',     'desc' => 'Jóga není o soutěžení. Pokud cítíte ostrou bolest, přestaňte a odpočiňte si v pozici dítěte. Vaše tělo je váš nejlepší rádce.',                                        'featured' => true],
    ['col' => 'md:col-span-7',  'num' => '07', 'title' => 'Nerušte ostatní',             'desc' => 'Do sálu vstupujte tiše. Telefony nechte v šatně, nebo je zcela vypněte. Společný čas je posvátný pro každého v místnosti.',                                             'featured' => false],
    ['col' => 'md:col-span-5',  'num' => '08', 'title' => 'Neodcházejte před šavásanou', 'desc' => 'Závěrečná relaxace je nejdůležitější částí lekce. Pokud musíte odejít dříve, odejděte prosím před jejím začátkem.',                                                      'featured' => false],
    ['col' => 'md:col-span-6',  'num' => '09', 'title' => 'Váš prostor je podložka',     'desc' => 'Respektujte prostor souseda. Snažte se nevstupovat na podložky ostatních a udržujte si svůj klidný mikrosvět.',                                                         'featured' => false],
    ['col' => 'md:col-span-6',  'num' => '10', 'title' => 'Udržujte pořádek',            'desc' => 'Po skončení lekce očistěte zapůjčenou podložku a ukliďte všechny pomůcky na své místo. Děkujeme.',                                                                       'featured' => false],
];
?>

<style>
/* Appear animace */
.appear {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}
.appear.visible {
    opacity: 1;
    transform: translateY(0);
}
</style>

<main>

<!-- Hero – sjednocený s ostatními podstránkami -->
<section class="relative pt-32 pb-24 bg-gradient-soft overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 text-center">
        <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Vítejte v oáze klidu</span>
        <h1 class="font-serif text-5xl md:text-7xl text-zinc-900 mb-8 leading-tight">
            Poprvé na <span class="italic text-primary">jógu</span>
        </h1>
        <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mb-8"></div>
        <p class="text-xl text-zinc-500 leading-relaxed max-w-2xl mx-auto">
            Začít s jógou je cesta k sobě samému. Připravili jsme pro vás průvodce, který vám usnadní první krůčky na podložce.
        </p>
    </div>
</section>

<!-- Kroky rezervace -->
<section class="py-32 bg-primary-light/40">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">Jak se k nám přidat?</h2>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full"></div>
        </div>
        <div class="grid md:grid-cols-3 gap-8 md:gap-12">
            <?php
            $steps = [
                ['icon' => 'app_registration',     'title' => 'Registrace',  'desc' => 'Skočte si do rezervačního systému a zaregistrujte se. Je to rychlé a snadné, zabere to jen minutku.'],
                ['icon' => 'format_list_bulleted',  'title' => 'Výběr lekce', 'desc' => 'Vyberte si lekci dle vašeho gusta. Pro začátečníky doporučujeme Hatha jógu nebo Jemnou jógu.'],
                ['icon' => 'event_available',       'title' => 'Potvrzení',   'desc' => 'Po rezervaci obdržíte potvrzení do e-mailu. Pak už jen stačí vzít si pohodlné oblečení a dorazit.'],
            ];
            foreach ($steps as $i => $step): ?>
                <div class="appear bg-white p-10 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 group border border-primary/10 flex flex-col items-center text-center"
                     style="transition-delay: <?php echo $i * 120; ?>ms">
                    <div class="w-20 h-20 rounded-full bg-primary-light flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-primary text-4xl"><?php echo esc_html($step['icon']); ?></span>
                    </div>
                    <h3 class="font-serif text-2xl mb-4 text-zinc-900"><?php echo esc_html($step['title']); ?></h3>
                    <p class="text-zinc-600 leading-relaxed"><?php echo esc_html($step['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA pod kroky -->
        <div class="mt-14 text-center">
            <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
               class="btn-primary px-10 py-5 rounded-full text-lg font-bold inline-block">
                Rezervovat první lekci
            </a>
        </div>
    </div>
</section>

<!-- Tipy a etiketa -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8 overflow-hidden">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-16 gap-8 text-center md:text-left">
            <div>
                <span class="text-primary font-bold tracking-widest uppercase text-xs mb-4 block">Etiketa &amp; Rady</span>
                <h2 class="font-serif text-5xl text-zinc-900">Zpříjemněte si <br class="hidden md:block"/>první lekci</h2>
            </div>
            <p class="max-w-md text-zinc-600 text-lg leading-relaxed">
                Abychom se v našem studiu cítili všichni příjemně, připravili jsme pro vás pár tipů, jak se chovat a co očekávat.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8 auto-rows-min">
            <?php foreach ($tips as $tip):
                if ($tip['featured']): ?>
                    <div class="appear <?php echo $tip['col']; ?> bg-primary p-8 md:p-10 rounded-3xl text-white shadow-xl shadow-primary/20">
                        <span class="text-6xl font-serif text-white/20 block mb-2"><?php echo esc_html($tip['num']); ?></span>
                        <h3 class="font-serif text-2xl mb-4 italic"><?php echo esc_html($tip['title']); ?></h3>
                        <p class="text-white/90 leading-relaxed text-lg italic"><?php echo esc_html($tip['desc']); ?></p>
                    </div>
                <?php else: ?>
                    <div class="appear <?php echo $tip['col']; ?> yoga-card p-8 md:p-10 rounded-3xl relative overflow-hidden group">
                        <div class="relative z-10">
                            <span class="text-6xl md:text-7xl font-serif block mb-2 md:mb-6"
                                  style="color:rgba(226,134,177,0.15);line-height:1;"><?php echo esc_html($tip['num']); ?></span>
                            <h3 class="font-serif text-2xl md:text-3xl mb-4 text-zinc-900"><?php echo esc_html($tip['title']); ?></h3>
                            <p class="text-zinc-600 text-base md:text-lg leading-relaxed"><?php echo esc_html($tip['desc']); ?></p>
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
    </div>
</section>

<!-- Citát – vizuální oddechy mezi sekcemi -->
<section class="py-20 bg-primary-light/40">
    <div class="max-w-3xl mx-auto px-8 text-center">
        <p class="font-serif text-3xl md:text-4xl italic text-zinc-700 leading-relaxed">
            „Dech je most, který spojuje tělo s myslí."
        </p>
    </div>
</section>

<!-- Final CTA -->
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-8">
        <div class="bg-primary/5 rounded-3xl p-12 md:p-20 text-center relative overflow-hidden border border-primary/10 shadow-sm">
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="font-serif text-4xl md:text-5xl mb-6 text-zinc-900">
                    Jste připraveni na <span class="italic text-primary">první nádech?</span>
                </h2>
                <p class="text-zinc-600 mb-10 text-lg leading-relaxed">
                    Není na co čekat. Každá dlouhá cesta začíná prvním krokem na podložku. Těšíme se na vás.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
                       class="btn-primary px-10 py-5 rounded-full font-bold text-lg">
                        Chci se přihlásit
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('rozvrh'))); ?>"
                       class="bg-white border-2 border-primary/20 text-primary px-10 py-5 rounded-full font-bold text-lg hover:bg-primary-light transition-all duration-300">
                        Prohlédnout rozvrh
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<script>
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.appear').forEach(el => observer.observe(el));
</script>

<?php get_template_part('template-parts/footer'); ?>