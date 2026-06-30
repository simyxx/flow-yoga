<!DOCTYPE html>
<html <?php language_attributes(); ?> class="light scroll-smooth">
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
<style>
/* Hamburger → X animace */
.ham-line { transform-origin: center; }
#nav-toggle .ham-line:nth-child(1) { transform: translateY(-6px); }
#nav-toggle .ham-line:nth-child(3) { transform: translateY(6px); }
#nav-toggle.is-open .ham-line:nth-child(1) { transform: rotate(45deg); }
#nav-toggle.is-open .ham-line:nth-child(2) { opacity: 0; }
#nav-toggle.is-open .ham-line:nth-child(3) { transform: rotate(-45deg); }

/* Hover efekt pro hamburger menu */
#nav-toggle {
    transition: color 0.s ease;
}
#nav-toggle:hover {
    color: #E286B1;
}

/* Fullscreen overlay */
#mobile-overlay {
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.4s ease;
}
#mobile-overlay.is-open {
    opacity: 1;
    pointer-events: auto;
}

/* Styly odkazů v overlay */
#mobile-overlay .menu-item { list-style: none; }
#mobile-overlay nav a {
    display: block;
    font-size: 1.75rem !important; 
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #31332e;
    padding: 0.75rem 0;
    transition: color 0.2s ease;
}

#mobile-overlay nav a:hover { 
    color: #E286B1; 
}

/* Animace paddingu vnitřního divu */
#top-nav > div {
    transition: padding 0.3s ease;
}

/* Zmenšený padding při odscrollování */
#top-nav.navbar-scrolled > div {
    padding-top: 0.4rem !important;
    padding-bottom: 0.4rem !important;
}
</style>
</head>
<body <?php body_class('bg-white text-zinc-800 selection:bg-primary/20 selection:text-primary-dark'); ?>>

<div id="mobile-overlay"
     class="fixed inset-0 z-40 flex flex-col items-center justify-center gap-14 px-8 lg:hidden"
     style="background: #fdf2f7;">

    <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
       class="btn-primary px-10 py-4 rounded-full font-bold text-xl">
        Rezervace
    </a>

    <nav class="flex flex-col items-center">
        <?php wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Flow_Yoga_Nav_Walker(),
        ]); ?>
    </nav>
</div>

<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent" id="top-nav">
    
    <div class="flex justify-between items-center px-6 md:px-12 py-4">

        <div class="flex items-center gap-3">
            <?php
            $logo = get_theme_mod('flow_yoga_logo', get_template_directory_uri() . '/assets/images/logo-w.png');
            if ($logo): ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img alt="<?php bloginfo('name'); ?> Logo"
                         class="h-16 w-auto object-contain transition-all duration-300"
                         src="<?php echo esc_url($logo); ?>" />
                </a>
            <?php endif; ?>
        </div>

        <div class="hidden lg:flex items-center gap-8 font-serif text-sm tracking-widest uppercase">
            <?php wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'walker'         => new Flow_Yoga_Nav_Walker(),
            ]); ?>
        </div>

        <div class="flex items-center gap-4">
            <a href="<?php echo esc_url(get_theme_mod('flow_yoga_rezervace_url', '#')); ?>"
               class="btn-primary px-6 py-2.5 rounded-full font-medium hidden lg:inline-flex">
                Rezervace
            </a>

            <button id="nav-toggle"
                    class="lg:hidden relative w-10 h-10 flex items-center justify-center"
                    aria-label="Otevřít menu"
                    aria-expanded="false">
                <span class="ham-line absolute block w-6 h-0.5 bg-current transition-all duration-300"></span>
                <span class="ham-line absolute block w-6 h-0.5 bg-current transition-all duration-300"></span>
                <span class="ham-line absolute block w-6 h-0.5 bg-current transition-all duration-300"></span>
            </button>
        </div>
    </div>
</nav>

<script>
const toggle  = document.getElementById('nav-toggle');
const overlay = document.getElementById('mobile-overlay');

toggle.addEventListener('click', () => {
    const isOpen = toggle.classList.contains('is-open');
    toggle.classList.toggle('is-open', !isOpen);
    overlay.classList.toggle('is-open', !isOpen);
    toggle.setAttribute('aria-expanded', String(!isOpen));
    document.body.style.overflow = isOpen ? '' : 'hidden';
});

overlay.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        toggle.classList.remove('is-open');
        overlay.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    });
});
</script>
</body>
</html>