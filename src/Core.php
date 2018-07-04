<?php

namespace String\Fingers;

use Pimple\Container;

class Core {

	protected static $_instance;

	/** @var Container */
	protected $container = null;

	/** @var Service_Loader */
	protected $service_loader = null;

	/**
	 * @param Container $container
	 */
	public function __construct( $container ) {
		$this->container = $container;
	}

	static public function url() {
		return plugin_dir_url( __DIR__ );
	}

	public function init() {
		$this->load_service_providers();
	}

	private function load_service_providers() {
	}

	public function container() {
		return $this->container;
	}

	/**
	 * @param null|\ArrayAccess $container
	 *
	 * @return Core
	 * @throws \Exception
	 */
	public static function instance( $container = null ) {
		if ( ! isset( self::$_instance ) ) {
			if ( empty( $container ) ) {
				throw new \Exception( 'You need to provide a Pimple container' );
			}

			$className       = __CLASS__;
			self::$_instance = new $className( $container );
		}

		return self::$_instance;
	}

}
