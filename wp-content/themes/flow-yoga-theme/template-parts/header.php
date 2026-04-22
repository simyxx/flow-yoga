<!DOCTYPE html>
<html <?php language_attributes(); ?> class="light">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-zinc-800 selection:bg-primary/20 selection:text-primary-dark'); ?>>

<!-- TopNavBar -->
<nav class="fixed top-0 left-0 right-0 z-50 flex justify-between items-center px-6 md:px-12 py-6 transition-all duration-300 bg-transparent" id="top-nav">
    <div class="flex items-center gap-3">
        <?php
        $logo = get_theme_mod('flow_yoga_logo');
        if ($logo): ?>
            <img alt="<?php bloginfo('name'); ?> Logo" class="h-10 w-auto object-contain" src="<?php echo esc_url($logo); ?>"/>
        <?php endif; ?>
        <span class="font-serif italic text-xl md:text-2xl text-primary font-bold">
            <?php bloginfo('name'); ?>
        </span>
    </div>

    <div class="hidden lg:flex items-center gap-8 font-serif text-sm tracking-widest uppercase">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s', // bez <ul>, jen <li>
            'walker'         => new Flow_Yoga_Nav_Walker(),
        ]);
        ?>
    </div>

    <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
       class="btn-primary px-6 py-2.5 rounded-full font-medium">
        Rezervace
    </a>
</nav>
