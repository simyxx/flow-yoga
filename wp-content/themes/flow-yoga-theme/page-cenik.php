<?php
/**
 * Template Name: Ceník
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
        <h1 class="font-serif text-5xl md:text-7xl text-zinc-900 mb-8 leading-tight">Ceník</h1>
        <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mb-8"></div>
        <p class="text-xl text-zinc-500 leading-relaxed max-w-2xl mx-auto">
            Ceník platný od <?php echo esc_html(get_theme_mod('cenik_platny_od', '1. 9. 2022')); ?>
        </p>
    </div>
</section>

<!-- Videolekce jógy -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">Videolekce jógy</h2>
            <p class="text-zinc-500 text-lg max-w-2xl mx-auto">Balíčky online videolekcí, které si pustíte, kdykoliv se vám to hodí.</p>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Kurz a vstupné</span>
                    <span class="material-symbols-outlined text-primary/40">smart_display</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">Videokurz pro začátečníky</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">3 měsíce + 100 kreditů zdarma</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">2000 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=200000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

            <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Knihovna 50+ lekcí</span>
                    <span class="material-symbols-outlined text-primary/40">smart_display</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">Videolekce</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">Platnost 12 měsíců</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">3000 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=300000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

            <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Knihovna 50+ lekcí</span>
                    <span class="material-symbols-outlined text-primary/40">smart_display</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">Videolekce</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">Platnost 1 měsíc</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">900 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=90000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Permanentky -->
<section class="py-32 bg-primary-light/40">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">Permanentky</h2>
            <p class="text-zinc-500 text-lg max-w-2xl mx-auto">Kredity na lekce ve studiu — čím delší platnost, tím větší volnost v plánování.</p>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="bg-white p-10 rounded-3xl flex flex-col h-full border border-primary/10 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Plné vstupné</span>
                    <span class="material-symbols-outlined text-primary/40">confirmation_number</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">INTENSIVE — 100 kreditů</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">Platnost 2 měsíce</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">1400 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=140000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

            <div class="bg-white p-10 rounded-3xl flex flex-col h-full border border-primary/10 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Plné vstupné</span>
                    <span class="material-symbols-outlined text-primary/40">confirmation_number</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">BASIC — 100 kreditů</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">Platnost 4 měsíce</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">1600 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=160000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

            <div class="bg-white p-10 rounded-3xl flex flex-col h-full border border-primary/10 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Plné vstupné</span>
                    <span class="material-symbols-outlined text-primary/40">confirmation_number</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">INTENSIVE — 200 kreditů</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">Platnost 3 měsíce</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">2200 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=220000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

            <div class="bg-white p-10 rounded-3xl flex flex-col h-full border border-primary/10 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Plné vstupné</span>
                    <span class="material-symbols-outlined text-primary/40">confirmation_number</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">BASIC — 200 kreditů</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">Platnost 6 měsíců</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">2600 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=260000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

            <div class="bg-white p-10 rounded-3xl flex flex-col h-full border border-primary/10 shadow-sm">
                <div class="flex justify-between items-start mb-6">
                    <span class="text-primary font-bold tracking-widest text-xs uppercase">Studentské vstupné</span>
                    <span class="material-symbols-outlined text-primary/40">confirmation_number</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">BASIC — 100 kreditů</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">Platnost 4 měsíce</p>
                <div class="mt-8">
                    <p class="text-3xl font-serif text-zinc-900 mb-4">1200 Kč</p>
                    <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=120000&amp;Currency=CZK"
                       class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Jednotlivé lekce -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">Jednotlivé lekce</h2>
            <p class="text-zinc-500 text-lg max-w-2xl mx-auto">Platnost od 1. 9. 2024. Ceny uvedeny jako plné / studentské.</p>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <span class="material-symbols-outlined text-primary/40">self_improvement</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">1 lekce</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">60 minut</p>
                <div class="mt-8">
                    <p class="text-2xl font-serif text-zinc-900 mb-4">200 / 150 Kč</p>
                    <div class="flex gap-4">
                        <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=20000&amp;Currency=CZK"
                           class="btn-primary flex-1 text-center py-3 rounded-full font-bold text-sm">Plné</a>
                        <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=15000&amp;Currency=CZK"
                           class="flex-1 text-center py-3 rounded-full font-bold text-sm bg-white border-2 border-primary/20 text-primary hover:bg-primary-light transition-all duration-300">Studentské</a>
                    </div>
                </div>
            </div>

            <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <span class="material-symbols-outlined text-primary/40">self_improvement</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">Prodloužená lekce</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">75 minut · 15 kreditů</p>
                <div class="mt-8">
                    <p class="text-2xl font-serif text-zinc-900 mb-4">300 / 200 Kč</p>
                    <div class="flex gap-4">
                        <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=30000&amp;Currency=CZK"
                           class="btn-primary flex-1 text-center py-3 rounded-full font-bold text-sm">Plné</a>
                        <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=20000&amp;Currency=CZK"
                           class="flex-1 text-center py-3 rounded-full font-bold text-sm bg-white border-2 border-primary/20 text-primary hover:bg-primary-light transition-all duration-300">Studentské</a>
                    </div>
                </div>
            </div>

            <div class="yoga-card p-10 rounded-3xl flex flex-col h-full">
                <div class="flex justify-between items-start mb-6">
                    <span class="material-symbols-outlined text-primary/40">self_improvement</span>
                </div>
                <h3 class="text-2xl font-serif mb-2 text-zinc-900">Prodloužená lekce</h3>
                <p class="text-zinc-600 leading-relaxed flex-grow">90 minut · 20 kreditů</p>
                <div class="mt-8">
                    <p class="text-2xl font-serif text-zinc-900 mb-4">400 / 250 Kč</p>
                    <div class="flex gap-4">
                        <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=40000&amp;Currency=CZK"
                           class="btn-primary flex-1 text-center py-3 rounded-full font-bold text-sm">Plné</a>
                        <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=25000&amp;Currency=CZK"
                           class="flex-1 text-center py-3 rounded-full font-bold text-sm bg-white border-2 border-primary/20 text-primary hover:bg-primary-light transition-all duration-300">Studentské</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Soukromé lekce -->
<section class="py-32 bg-primary-light/40">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-5xl mb-6 text-zinc-900">Soukromé lekce</h2>
            <div class="w-24 h-1.5 bg-primary/40 mx-auto rounded-full"></div>
        </div>

        <div class="bg-white p-10 md:p-16 rounded-3xl flex flex-col md:flex-row md:items-center gap-10 border border-primary/10 shadow-sm">
            <div class="flex-1">
                <span class="text-primary font-bold tracking-widest text-xs uppercase">Max. 2 cvičící</span>
                <h3 class="text-2xl font-serif mt-3 mb-4 text-zinc-900">Lekce na míru</h3>
                <p class="text-zinc-600 leading-relaxed">
                    Lekci sestavíme přímo na míru. Předchází jí osobní setkání a seznámení — může jít
                    o první kontakt s jógou, nebo o terapii při řešení konkrétního problému.
                </p>
            </div>
            <div class="md:w-56 flex-shrink-0 text-center md:text-right">
                <p class="text-3xl font-serif text-zinc-900 mb-1">1000 Kč</p>
                <p class="text-zinc-500 mb-6">60 minut</p>
                <a href="https://www.pays.cz/paymentorder?Merchant=28894&amp;Shop=90284&amp;Amount=100000&amp;Currency=CZK"
                   class="btn-primary block text-center py-4 rounded-full font-bold">Koupit online</a>
            </div>
        </div>
    </div>
</section>

<!-- Platba a podmínky -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8">

        <div class="bg-primary/5 rounded-3xl p-10 mb-12 flex items-start gap-6 border border-primary/10 shadow-sm">
            <span class="material-symbols-outlined text-primary text-3xl">account_balance</span>
            <div>
                <h3 class="font-serif text-xl mb-2 text-zinc-900">Číslo bankovního účtu studia</h3>
                <p class="text-zinc-600">
                    <?php echo esc_html(get_theme_mod('cenik_ucet', '67399028/5500')); ?>,
                    <?php echo esc_html(get_theme_mod('cenik_banka', 'RaiffeisenBank a.s.')); ?>
                </p>
            </div>
        </div>

        <h3 class="font-serif text-2xl mb-6 text-zinc-900">Obecné obchodní podmínky</h3>
        <ul class="space-y-4 text-zinc-600 leading-relaxed list-disc list-inside marker:text-primary">
            <li>Rezervací místa v lekci vzniká vůči studiu povinnost úhrady ceny za danou lekci.</li>
            <li>Rezervaci lze bezplatně zrušit nejpozději 6 hodin před začátkem lekce, poté je nutné lekci uhradit i v případě neúčasti.</li>
            <li>Platnost kreditů nelze prodloužit.</li>
            <li>Kredity nelze proměnit zpět na peníze.</li>
            <li>Při nemožnosti čerpání ze závažných důvodů kontaktujte studio — platnost vaší permanentky bude pozastavena.</li>
            <li>100 kreditů INTENSIVE má platnost 2 měsíce.</li>
            <li>100 kreditů BASIC má platnost 4 měsíce.</li>
            <li>200 kreditů INTENSIVE má platnost 3 měsíce.</li>
            <li>200 kreditů BASIC má platnost 6 měsíců.</li>
            <li>100 kreditů STUDENT má platnost 4 měsíce.</li>
        </ul>

    </div>
</section>

</main>

<?php get_template_part('template-parts/footer'); ?>