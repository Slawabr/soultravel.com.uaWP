<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "soultravel";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Панель опций', 'redux-framework-demo' ),
        'page_title'           => __( 'Панель опций', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    Redux::setSection($opt_name, array(
        'title' => __('Header/Footer', 'redux-framework-demo'),
        'id' => 'header_footer',
        'customizer_width' => '400px',
        'icon' => 'el el-adjust',
        'desc' => 'Информация для "шапки" и "футера" сайта',
        'fields' => array(
            array(
                'id' => 'mobile',
                'type' => 'text',
                'title' => __('Телефон', 'redux-framework-demo'),
                'default' => '(050)-234-11-43',
            ),
            array(
                'id'=>'mobile-fancy',
                'type' => 'multi_text',
                'title' => __('Телефоны, которые появляются при наведении', 'redux-framework-demo')
            ),
            array(
                'id' => 'email',
                'type' => 'text',
                'title' => __('E-mail', 'redux-framework-demo'),
                'default' => 'info@soultravel.com.ua',
            ),
            array(
                'id' => 'footer-logo',
                'type' => 'media',
                'title' => __('Логотип у футере', 'redux-framework-demo')
            ),
            array(
                'id' => 'footer-text',
                'type' => 'textarea',
                'title' => __('Тексе у футере', 'redux-framework-demo')
            ),
            array(
                'id' => 'link-google',
                'type' => 'text',
                'title' => __('Ссылка на google+', 'redux-framework-demo')
            ),
            array(
                'id' => 'link-ok',
                'type' => 'text',
                'title' => __('Ссылка на Одноклассники', 'redux-framework-demo')
            ),
            array(
                'id' => 'link-in',
                'type' => 'text',
                'title' => __('Ссылка на Instagram', 'redux-framework-demo')
            ),
            array(
                'id' => 'link-tw',
                'type' => 'text',
                'title' => __('Ссылка на Twitter', 'redux-framework-demo')
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('Главный слайдер', 'redux-framework-demo'),
        'id' => 'main_slider',
        'customizer_width' => '400px',
        'icon' => 'el el-picture',
        'fields' => array(
            array(
                'id'          => 'main-slider',
                'type'        => 'slides',
                'title'       => __('Слайдер', 'redux-framework-demo'),
                'placeholder' => array(
                    'title'           => __('Заголовок', 'redux-framework-demo'),
                    'description'     => __('Заголовок снизу', 'redux-framework-demo'),
                    'url'             => __('Заголовок сверху', 'redux-framework-demo'),
                ),
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('Популярные направляния', 'redux-framework-demo'),
        'id' => 'destinations',
        'customizer_width' => '400px',
        'icon' => 'el el-asl',
        'fields' => array(
            array(
                'id'          => 'destinations-img',
                'type'        => 'media',
                'title'       => __('Картинка', 'redux-framework-demo')
            ),
            array(
                'id'          => 'destinations-above-header',
                'type'        => 'text',
                'title'       => __('Текст над заголовком', 'redux-framework-demo'),
                'default' => 'Special offers',
            ),
            array(
                'id'          => 'destinations-header',
                'type'        => 'text',
                'title'       => __('Заголовок', 'redux-framework-demo'),
                'default' => '<span>Popular</span> Destinations',
            ),
            array(
                'id'          => 'destinations-text',
                'type'        => 'textarea',
                'title'       => __('Текст', 'redux-framework-demo'),
                'default' => 'Nullam ac dolor id nulla finibus pharetra. Sed sed placerat mauris. Pellentesque lacinia imperdiet interdum. Ut nec nulla in purus consequat lobortis. Mauris lobortis a nibh sed convallis.'
            ),
        )
    ));
    Redux::setSection($opt_name, array(
        'title' => __('Мы в цифрах', 'redux-framework-demo'),
        'id' => 'numbers',
        'customizer_width' => '400px',
        'icon' => 'el el-cogs',
        'fields' => array(
            array(
                'id'          => 'number1-num',
                'type'        => 'text',
                'title'       => __('Цифра 1', 'redux-framework-demo'),
                'default' => '345',
            ),
            array(
                'id'          => 'number1-text',
                'type'        => 'text',
                'title'       => __('Подпись 1', 'redux-framework-demo'),
                'default' => 'Tours',
            ),
            array(
                'id'          => 'number2-num',
                'type'        => 'text',
                'title'       => __('Цифра 2', 'redux-framework-demo'),
                'default' => '438',
            ),
            array(
                'id'          => 'number2-text',
                'type'        => 'text',
                'title'       => __('Подпись 2', 'redux-framework-demo'),
                'default' => 'Holidays',
            ),
            array(
                'id'          => 'number3-num',
                'type'        => 'text',
                'title'       => __('Цифра 3', 'redux-framework-demo'),
                'default' => '526',
            ),
            array(
                'id'          => 'number3-text',
                'type'        => 'text',
                'title'       => __('Подпись 3', 'redux-framework-demo'),
                'default' => 'Hotels',
            ),
            array(
                'id'          => 'number4-num',
                'type'        => 'text',
                'title'       => __('Цифра 4', 'redux-framework-demo'),
                'default' => '169',
            ),
            array(
                'id'          => 'number4-text',
                'type'        => 'text',
                'title'       => __('Подпись 4', 'redux-framework-demo'),
                'default' => 'Cruises',
            ),
            array(
                'id'          => 'number5-num',
                'type'        => 'text',
                'title'       => __('Цифра 5', 'redux-framework-demo'),
                'default' => '293',
            ),
            array(
                'id'          => 'number5-text',
                'type'        => 'text',
                'title'       => __('Подпись 5', 'redux-framework-demo'),
                'default' => 'Flights',
            ),
            array(
                'id'          => 'number6-num',
                'type'        => 'text',
                'title'       => __('Цифра 6', 'redux-framework-demo'),
                'default' => '675',
            ),
            array(
                'id'          => 'number6-text',
                'type'        => 'text',
                'title'       => __('Подпись 6', 'redux-framework-demo'),
                'default' => 'Cars',
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('О нас', 'redux-framework-demo'),
        'id' => 'about',
        'customizer_width' => '400px',
        'icon' => 'el el-address-book',
        'fields' => array(
            array(
                'id'          => 'about-bg',
                'type'        => 'media',
                'title'       => __('Фон', 'redux-framework-demo'),
            ),
            array(
                'id'          => 'about-header',
                'type'        => 'text',
                'title'       => __('Заголовок', 'redux-framework-demo'),
                'default' => 'About',
            ),
            array(
                'id'          => 'about-header-name',
                'type'        => 'text',
                'title'       => __('Название компании', 'redux-framework-demo'),
                'default' => '<span>Soul</span>Travel',
            ),
            array(
                'id'          => 'about-text',
                'type'        => 'textarea',
                'title'       => __('Текст', 'redux-framework-demo'),
                'default' => 'Vestibulum tincidunt venenatis scelerisque. Proin quis enim lacinia, vehicula massa et, mollis urna. Proin nibh mauris, blandit vitae convallis at, tincidunt vel tellus. Praesent posuere nec lectus non cursus. Sed commodo odio et ipsum sagittis tincidunt non eget felis.'
            ),
            array(
                'id'          => 'about-author',
                'type'        => 'text',
                'title'       => __('Автор', 'redux-framework-demo'),
                'default' => 'Andrew McDonald',
            ),
            array(
                'id'          => 'about-video',
                'type'        => 'text',
                'title'       => __('Видео', 'redux-framework-demo'),
                'default' => 'https://www.youtube.com/embed/yib7tvIrL6k',
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('Рекомендуемые туры', 'redux-framework-demo'),
        'id' => 'recomend',
        'customizer_width' => '400px',
        'icon' => 'el el-arrow-up',
        'fields' => array(
            array(
                'id'          => 'recomend-header',
                'type'        => 'text',
                'title'       => __('Заголовок', 'redux-framework-demo'),
                'default' => '<span>Recomended</span> Hotels',
            ),
            array(
                'id'          => 'recomend-header-above',
                'type'        => 'text',
                'title'       => __('Над заголовком', 'redux-framework-demo'),
                'default' => 'Top rated',
            ),
            array(
                'id'          => 'recomend-text',
                'type'        => 'textarea',
                'title'       => __('Текст', 'redux-framework-demo'),
                'default' => 'Maecenas commodo odio ut vulputate cursus. Integer in egestas lectus. Nam volutpat feugiat mi vitae mollis. Aenean tristique dolor bibendum mi scelerisque ultrices non at lorem.'
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('Отзывы', 'redux-framework-demo'),
        'id' => 'recalls',
        'customizer_width' => '400px',
        'icon' => 'el el-group',
        'fields' => array(
            array(
                'id'          => 'recalls-bg',
                'type'        => 'media',
                'title'       => __('Фон', 'redux-framework-demo'),
            ),
            array(
                'id'          => 'recalls-header',
                'type'        => 'text',
                'title'       => __('Заголовок', 'redux-framework-demo'),
                'default' => '<span>Our</span> Testimonials',
            ),
            array(
                'id'          => 'recalls-header-above',
                'type'        => 'text',
                'title'       => __('Над заголовком', 'redux-framework-demo'),
                'default' => 'Happy Memories',
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('Галерея', 'redux-framework-demo'),
        'id' => 'gallery',
        'customizer_width' => '400px',
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'id'          => 'gallery-header',
                'type'        => 'text',
                'title'       => __('Заголовок', 'redux-framework-demo'),
                'default' => '<span>Photo</span> Gallery',
            ),
            array(
                'id'          => 'gallery-header-above',
                'type'        => 'text',
                'title'       => __('Над заголовком', 'redux-framework-demo'),
                'default' => 'Happy Memories',
            ),
            array(
                'id'          => 'gallery-text',
                'type'        => 'textarea',
                'title'       => __('Текст', 'redux-framework-demo'),
                'default' => 'Vestibulum feugiat vitae tortor ut venenatis. Sed cursus, purus eu euismod bibendum, diam nisl suscipit odio, vitae ultrices mauris dolor quis mauris. Curabitur ac metus id leo maximus porta.',
            ),
            array(
                'id'       => 'gallery',
                'type'     => 'gallery',
                'title'    => __('Галерея', 'redux-framework-demo'),
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('Наш блог', 'redux-framework-demo'),
        'id' => 'blog',
        'customizer_width' => '400px',
        'icon' => 'el el-book',
        'fields' => array(
            array(
                'id'          => 'blog-bg',
                'type'        => 'media',
                'title'       => __('Фон', 'redux-framework-demo'),
            ),
            array(
                'id'          => 'blog-header',
                'type'        => 'text',
                'title'       => __('Заголовок', 'redux-framework-demo'),
                'default' => '<span>Our</span> Blog',
            ),
            array(
                'id'          => 'blog-header-above',
                'type'        => 'text',
                'title'       => __('Над заголовком', 'redux-framework-demo'),
                'default' => 'Latest News',
            ),
            array(
                'id'          => 'blog-text',
                'type'        => 'text',
                'title'       => __('Текст', 'redux-framework-demo'),
                'default' => 'Vestibulum feugiat vitae tortor ut venenatis. Sed cursus, purus eu euismod bibendum, diam nisl suscipit odio, vitae ultrices mauris dolor quis mauris. Curabitur ac metus id leo maxim.',
            ),
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => __('Подписка', 'redux-framework-demo'),
        'id' => 'subscribe',
        'customizer_width' => '400px',
        'icon' => 'el el-envelope',
        'fields' => array(
            array(
                'id'          => 'subscribe-header',
                'type'        => 'text',
                'title'       => __('Заголовок', 'redux-framework-demo'),
                'default' => '<span>Get</span> Latest offers',
            ),
            array(
                'id'          => 'subscribe-header-above',
                'type'        => 'text',
                'title'       => __('Над заголовком', 'redux-framework-demo'),
                'default' => 'subscribe today',
            ),
        )
    ));

    

    /*
     * <--- END SECTIONS
     */
