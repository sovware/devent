<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class TGM_Config {

	public $prefix;

	public $path;

	public function __construct() {
		$this->prefix = Constants::$theme_prefix;
		$this->path   = Constants::$theme_plugins_dir;

		add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
	}

	public function register_required_plugins() {
		$plugins = array(
			// Bundled.

			// Repository.
			array(
				'name'     => 'Elementor Page Builder',
				'slug'     => 'elementor',
				'required' => true,
			),
		);

		$config = array(
			'id'           => $this->prefix,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->prefix . '-install-plugins', // Menu slug.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		);

		tgmpa( $plugins, $config );
	}
}

new TGM_Config();
