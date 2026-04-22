<!-- Footer -->
<footer class="bg-zinc-50 border-t border-primary/5 pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-12 mb-16">
            <div class="flex flex-col items-center md:items-start gap-4">
                <div class="flex items-center gap-2">
                    <?php $logo = get_theme_mod('flow_yoga_logo'); if ($logo): ?>
                        <img alt="<?php bloginfo('name'); ?> Logo" class="h-10 w-auto" src="<?php echo esc_url($logo); ?>"/>
                    <?php endif; ?>
                    <span class="font-serif text-2xl text-primary font-bold"><?php bloginfo('name'); ?></span>
                </div>
                <p class="text-zinc-500 max-w-xs text-center md:text-left">
                    <?php echo esc_html(get_theme_mod('flow_yoga_footer_text', 'Rádi byste si s námi zacvičili? Jen pojďte! U nás má každý dveře otevřené. Kontaktujte nás.')); ?>
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-10">
                <div class="flex flex-col gap-4">
                    <h5 class="font-bold text-xs uppercase tracking-widest text-primary">Studio</h5>
                    <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('kdo-jsme'))); ?>">Kdo jsme</a>
                    <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('aktuality'))); ?>">Aktuality</a>
                    <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('kontakt'))); ?>">Kontakt</a>
                </div>
                <div class="flex flex-col gap-4">
                    <h5 class="font-bold text-xs uppercase tracking-widest text-primary">Praxe</h5>
                    <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('rozvrh'))); ?>">Rozvrh</a>
                    <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('cenik'))); ?>">Ceník</a>
                    <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('co-nabizime'))); ?>">Co nabízíme</a>
                </div>
                <div class="flex flex-col gap-4">
                    <h5 class="font-bold text-xs uppercase tracking-widest text-primary">Sociální sítě</h5>
                    <?php $ig = get_theme_mod('flow_yoga_instagram'); if ($ig): ?>
                        <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url($ig); ?>">Instagram</a>
                    <?php endif; ?>
                    <?php $fb = get_theme_mod('flow_yoga_facebook'); if ($fb): ?>
                        <a class="text-sm text-zinc-600 hover:text-primary transition-colors" href="<?php echo esc_url($fb); ?>">Facebook</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center pt-10 border-t border-zinc-200 gap-4">
            <p class="text-xs uppercase tracking-widest text-zinc-400">© <?php echo '2024'; ?> <?php bloginfo('name'); ?></p>
            <div class="flex gap-8">
                <a class="text-xs uppercase tracking-widest text-zinc-400 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('ochrana-soukromi'))); ?>">Ochrana soukromí</a>
                <a class="text-xs uppercase tracking-widest text-zinc-400 hover:text-primary transition-colors" href="<?php echo esc_url(get_permalink(get_page_by_path('obchodni-podminky'))); ?>">Obchodní podmínky</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
