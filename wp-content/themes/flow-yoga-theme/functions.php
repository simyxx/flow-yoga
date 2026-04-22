<?php
// ===================================================
// Flow Yoga Studio – functions.php
// ===================================================

// Načtení stylů a skriptů
function flow_yoga_enqueue() {
    // Google Fonts
    wp_enqueue_style(
        'flow-yoga-google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@400;600;700&display=swap',
        [],
        null
    );

    // Material Symbols
    wp_enqueue_style(
        'flow-yoga-material-icons',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
        [],
        null
    );

    // Tailwind CDN (pro development; na produkci nahradit buildem)
    wp_enqueue_script(
        'tailwindcss',
        'https://cdn.tailwindcss.com?plugins=forms,container-queries',
        [],
        null,
        false
    );

    // Tailwind konfigurace – musí být hned po načtení Tailwindu
    wp_add_inline_script('tailwindcss', '
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#E286B1",
                        "primary-light": "#FDF2F7",
                        "primary-dark": "#C76A96",
                        surface: "#FFFFFF",
                        "surface-dim": "#FBFAF9",
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                    fontFamily: {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                    }
                }
            }
        }
    ');

    // Hlavní CSS
    wp_enqueue_style(
        'flow-yoga-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['flow-yoga-google-fonts'],
        '1.0'
    );

    // Hlavní JS
    wp_enqueue_script(
        'flow-yoga-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0',
        true // načíst před </body>
    );
}
add_action('wp_enqueue_scripts', 'flow_yoga_enqueue');


// Registrace navigačních menu
function flow_yoga_menus() {
    register_nav_menus([
        'primary' => __('Hlavní navigace', 'flow-yoga'),
    ]);
}
add_action('after_setup_theme', 'flow_yoga_menus');


// Základní theme supports
function flow_yoga_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'flow_yoga_setup');


// Custom Post Type: Lektor
function flow_yoga_register_cpt() {
    register_post_type('lektor', [
        'labels' => [
            'name'          => 'Lektoři',
            'singular_name' => 'Lektor',
            'add_new_item'  => 'Přidat lektora',
            'edit_item'     => 'Upravit lektora',
        ],
        'public'       => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => ['title', 'thumbnail', 'custom-fields'],
        'has_archive'  => false,
    ]);
}
add_action('init', 'flow_yoga_register_cpt');


// Jednoduchý Walker pro hlavní menu (bez <ul> wrapperu)
class Flow_Yoga_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {}
    public function end_lvl(&$output, $depth = 0, $args = null) {}

    public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
        $item    = $data_object;
        $classes = implode(' ', (array) $item->classes);
        $active  = in_array('current-menu-item', (array) $item->classes);
        $cls     = $active
            ? 'text-primary font-bold border-b-2 border-primary/30 transition-all duration-300'
            : 'text-zinc-600 hover:text-primary transition-all duration-300';
        $output .= sprintf(
            '<a class="%s" href="%s">%s</a>',
            esc_attr($cls),
            esc_url($item->url),
            esc_html($item->title)
        );
    }
    public function end_el(&$output, $data_object, $depth = 0, $args = null) {}
}


// WordPress Customizer – nastavení pro mamku (logo, texty, URL, sociální sítě)
function flow_yoga_customizer($wp_customize) {
    $wp_customize->add_section('flow_yoga_settings', [
        'title'    => 'Flow Yoga – nastavení',
        'priority' => 30,
    ]);

    $fields = [
        ['flow_yoga_logo',          'Logo (URL obrázku)',          ''],
        ['flow_yoga_rezervace_url', 'URL rezervačního systému',    '#'],
        ['flow_yoga_footer_text',   'Text v patičce',              'Rádi byste si s námi zacvičili? Jen pojďte!'],
        ['flow_yoga_instagram',     'Instagram URL',               ''],
        ['flow_yoga_facebook',      'Facebook URL',                ''],
        ['hero_tagline',            'Homepage – perex nad nadpisem','Vítejte ve Flow Yoga Studiu'],
        ['hero_title',              'Homepage – hlavní nadpis',    'Jóga je cestou k vnitřní harmonii a rovnováze.'],
        ['hero_perex',              'Homepage – podnapis',         'Prostor, ve kterém najdete pohlazení nejen pro tělo, ale i pro duši.'],
        ['about_text',              'O nás – text',                'Prostor plný klidu, citu, harmonie a respektu.'],
    ];

    foreach ($fields as [$id, $label, $default]) {
        $wp_customize->add_setting($id, ['default' => $default, 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, ['label' => $label, 'section' => 'flow_yoga_settings', 'type' => 'text']);
    }

    // Obrázky (image picker)
    foreach (['hero_image' => 'Homepage – hlavní obrázek', 'about_image' => 'O nás – obrázek'] as $id => $label) {
        $wp_customize->add_setting($id, ['default' => '', 'sanitize_callback' => 'absint']);
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $id, [
            'label'     => $label,
            'section'   => 'flow_yoga_settings',
            'mime_type' => 'image',
        ]));
    }
}
add_action('customize_register', 'flow_yoga_customizer');
