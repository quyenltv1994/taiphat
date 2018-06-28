<?php
	if(!function_exists ('tvlgiao_wpdance_register_tgmpa_plugin')){
		function tvlgiao_wpdance_register_tgmpa_plugin(){
            $tvlgiao_wpdance_plugins = array(
                array(
                    'name'                  => esc_html__('WPBakery Visual Composer', 'wpdance'), // The plugin name
                    'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
                    'source'                => TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI.'/plugins/js_composer.zip', // The plugin source
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                    'version'               => '5.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                    'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                    'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                    'external_url'          => '', // If set, overrides default API URL and points to an external URL
                ),
                array(
                    'name'                  => esc_html__('Contact Form 7', 'wpdance'), // The plugin name
                    'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
                    'required'              => true, // If false, the plugin is only 'recommended' instead of required
                )
    		); //End plugins
            $tvlgiao_wpdance_config = array(
                'default_path'      => '',
                'menu'              => 'tgmpa-install-plugins',
                'has_notices'       => true,
                'dismissable'       => true,
                'dismiss_msg'       => '',
                'is_automatic'      => false,
                'message'           => '',
                'strings' => array(
                    'page_title'                        => esc_html__('Install Required Plugins', 'wpdance'),
                    'menu_title'                        => esc_html__('Install Plugins', 'wpdance'),
                    'installing'                        => esc_html__('Installing Plugin: %s', 'wpdance'),
                    'oops'                              => esc_html__('Something went wrong with the plugin API.', 'wpdance'),
                    'notice_can_install_required'       => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','wpdance'),
                    'notice_can_install_recommended'    => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','wpdance'),
                    'notice_cannot_install'             => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','wpdance'),
                    'notice_can_activate_required'      => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','wpdance'),
                    'notice_can_activate_recommended'   => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','wpdance'),
                    'notice_cannot_activate'            => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','wpdance'),
                    'notice_ask_to_update'              => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','wpdance'),
                    'notice_cannot_update'              => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','wpdance'),
                    'install_link'                      => _n_noop('Begin installing plugin', 'Begin installing plugins','wpdance'),
                    'activate_link'                     => _n_noop('Begin activating plugin', 'Begin activating plugins','wpdance'),
                    'return'                            => esc_html__('Return to Required Plugins Installer', 'wpdance'),
                    'plugin_activated'                  => esc_html__('Plugin activated successfully.', 'wpdance'),
                    'complete'                          => esc_html__('All plugins installed and activated successfully. %s', 'wpdance'),
                    'nag_type'                          => 'updated'
                )
            );
            tgmpa($tvlgiao_wpdance_plugins, $tvlgiao_wpdance_config);
		}
	}
	//Register Tgmpa Plugin
	add_action('tgmpa_register', 'tvlgiao_wpdance_register_tgmpa_plugin');
?>