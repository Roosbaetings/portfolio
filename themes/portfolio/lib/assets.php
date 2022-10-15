<?php

class AssetsResolver {
	/** @var array */
	public $manifest;

	/** @var string */
	public $dist;

	/**
	 * constructor
	 * 
	 * @param string $manifestPath Local filesystem path to the JSON-encoded manifest file.
	 * @param string $distUri Remote URI to assets root
	 */
	public function __construct($manifestPath, $distUri) {
		$this->manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
		$this->dist = $distUri;
	}

	/** @inheritDoc */
	public function get($asset) {
		return isset($this->manifest[$asset]) ? $this->manifest[$asset] : $asset;
	}

	/** @inheritDoc */
	public function getUri($asset) {
		return "{$this->dist}{$this->get($asset)}";
	}

}

class Assets {
	public static function manifest() {
		return new AssetsResolver(
			get_theme_file_path('/dist/mix-manifest.json'),
			get_theme_file_uri('/dist')
		);
	}

	public static function get($asset) {
		return Assets::manifest()->getUri($asset);
	}
}


add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('toto-starter/main.css', Assets::get('/css/main.css'), false, null);
	wp_enqueue_script('toto-starter/main.js', Assets::get('/js/main.js'), ['jquery'], null, true);
}, 100);

/**
 * Unregisters the WP Gutenberg Block library stylesheet
 */
// add_action( 'wp_print_styles', function () {
// 	wp_dequeue_style( 'wp-block-library' );
// }, 100 );
