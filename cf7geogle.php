<?php
/*
Plugin Name: cf7geogle
Plugin URI: https://wordpress.org/plugins/cf7geogle/
Description: Google Map plugin for Contact Form 7
Text Domain: cf7geogle
Domain Path: /languages/
Version: 1.0.1
Author: konagai[at]jidaikobo.com
Author URI: http://www.jidaikobo.com
License: GPL2

Copyright 2017 jidaikobo (email : support@jidaikobo.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/**
 * load language
 */
load_plugin_textdomain(
	'cf7geogle',
	FALSE,
	plugin_basename(__DIR__).'/languages'
);

/**
 * run_cf7geogle
 * @return Void
 */
function run_cf7geogle()
{
	$plugin = new Cf7Geogle();
	$plugin->run();
}
run_cf7geogle();

/**
 * Cf7Geogle
 */
class Cf7Geogle
{

	/**
	 * run
	 * @return Void
	 */
	public function run()
	{
		add_action( 'wpcf7_admin_init', array($this, 'add_cf7_tag_generator_geogle')  );
		add_action( 'wpcf7_init',       array($this, 'add_cf7_shortcode_googleMap')  );
		add_action( 'admin_init',       array($this, 'register_settings') );
		add_action( 'admin_menu',       array($this, 'add_cf7_options')  );
	}

	/**
	 * register_settings
	 * @return Void
	 */
	function register_settings()
	{
		add_option( 'cf7geogle_option_google_api_key', '');
		add_option( 'cf7geogle_option_is_include_api', '0');
		register_setting( 'cf7geogle_option', 'cf7geogle_option_google_api_key');
		register_setting( 'cf7geogle_option', 'cf7geogle_option_is_include_api', 'intval');
	}

	/**
	 * option
	 * @return Void
	 */
	public function add_cf7_options()
	{
		add_options_page(
			__('CF7Geogle Config', 'cf7geogle'),
			__('CF7Geogle Config', 'cf7geogle'),
			'manage_options',
			'cf7geogle',
			array($this, 'options_page')
		);
	}

	/**
	 * options_page
	 * @return Void
	 */
	public function options_page()
	{
		include(plugin_dir_path( __FILE__ ).'/views/admin/option.php');
	}

	/**
	 * admin
	 * @return Void
	 */
	public function add_cf7_tag_generator_geogle()
	{
		if ( class_exists( 'WPCF7_TagGenerator' ) )
		{
			$tag_generator = WPCF7_TagGenerator::get_instance();
			$tag_generator->add(
				'geogleaddresssrc',
				__( 'Search Address form Zip code', 'cf7geogle' ),
				array($this, 'geogle_addresssrc'
				)); // <= ボタンの追加
			$tag_generator->add(
				'geoglemap',
				__( 'Google Map', 'cf7geogle' ),
				array($this, 'geogle_map'
				)); // <= ボタンの追加
			$tag_generator->add(
				'geoglegeocoding',
				__( 'Get latitude and longitude from address', 'cf7geogle' ),
				array($this, 'geogle_geocoding'
				)); // <= ボタンの追加

			wp_enqueue_script(
				'cf7geogle_admin',
				plugin_dir_url( __FILE__ ).'/assets/js/admin.js',
				array('jquery')
			);
			wp_localize_script(
				'cf7geogle_admin',
				'JsData',
				array('API_KEY' => get_option('cf7geogle_option_google_api_key'),
			));
		}
	}

	/**
	 * geogle_addresssrc
	 * @param object $contact_form
	 * @param string $args
	 * @return Void
	 */
	public function geogle_addresssrc( $contact_form, $args = '' )
	{
		$args = wp_parse_args( $args, array() );
		include(plugin_dir_path( __FILE__ ) . '/views/admin/addresssrc.php'); // 入力ビュー
	}

	/**
	 * geogle_map
	 * @param object $contact_form
	 * @param string $args
	 * @return Void
	 */
	public function geogle_map( $contact_form, $args = '' )
	{
		$args = wp_parse_args( $args, array() );
		include( plugin_dir_path( __FILE__ ) . '/views/admin/map.php'); // 入力ビュー
	}

	/**
	 * geogle_geocoding
	 * @param object $contact_form
	 * @param string $args
	 * @return Void
	 */
	public function geogle_geocoding( $contact_form, $args = '' )
	{
		$args = wp_parse_args( $args, array() );
		include( plugin_dir_path( __FILE__ ) . '/views/admin/geocoding.php'); // 入力ビュー
	}

	/**
	 * public
	 * @return Void
	 */
	public function add_cf7_shortcode_googleMap()
	{
		if( function_exists('wpcf7_add_form_tag') )
		{
			wpcf7_add_form_tag(
				array( 'cf7geogle_map', 'cf7geogle_map*' ),
				array($this, 'googlemap_shortcode_handler'),
				true //has name
			);

			wpcf7_add_form_tag(
				array( 'cf7geogle_addresssrc', 'cf7geogle_addresssrc*' ),
				array($this, 'addresssrc_shortcode_handler'),
				true //has name
			);

			wpcf7_add_form_tag(
				array( 'cf7geogle_geocoding', 'cf7geogle_geocoding*' ),
				array($this, 'geocoding_shortcode_handler'),
				true //has name
			);

		}
	}

	/**
	 * options_from_tag
	 * @param Array $tag
	 * @return array
	 */
	protected static function options_from_tag ($tag)
	{
		$options = $tag['options'];
		if (!is_array($options)) $options = array();
		$attr = explode(' ', $tag['attr']);
		if (is_array($attr))
		{
			foreach( $attr as $option) $options[] = $option;
		}
		return $options;
	}

	/**
	 * options_from_tag
	 * @param Array $tag
	 * @return string
	 */
	public function addresssrc_shortcode_handler( $tag )
	{
		$label =  __('Search Address'); // ボタンのラベル
		$zip   = '.zip'; // 検索する郵便番号
		$pref  = '.pref'; // 結果を入力するフィールド
		$city  = '.city'; // 結果を入力するフィールド
		$addr  = '.addr'; // 結果を入力するフィールド
		$id    = '';
		$class = 'cf7geogle-addresssrc';

		$options = static::options_from_tag($tag);

		foreach( $options as $option)
		{
			$tmp = explode( ':', $option);
			switch ($tmp[0])
			{
				case 'label': $label = $tmp[1]; break;
				case 'zip'  : $zip   = $tmp[1]; break;
				case 'pref' : $pref  = $tmp[1]; break;
				case 'city' : $city  = $tmp[1]; break;
				case 'addr' : $addr  = $tmp[1]; break;
				case 'id'   : $id    = $tmp[1]; break;
				case 'class': $class = $class. ' '.$tmp[1]; break;
				default: break;
			}
		}

		wp_enqueue_script(
			'cf7gmap_public',
			plugin_dir_url( __FILE__ ).'/assets/js/public/public.js',
			array('jquery')
		);
		wp_enqueue_script(
			'cf7gmap_public_addresssrc',
			plugin_dir_url( __FILE__ ).'/assets/js/public/addresssrc.js',
			array('jquery')
		);
		wp_localize_script(
			'cf7gmap_public_addresssrc',
			'JsData',
			array('API_KEY' => get_option('cf7geogle_option_google_api_key'), // TODO
		));


		$html = '<input type="button"
			value="'.$label.'"
			data-zip="'.$zip.'"
			data-pref="'.$pref.'"
			data-city="'.$city.'"
			data-addr="'.$addr.'"
			class="'.$class.'"';
		if ($id) $html.= ' id="'.$id.'"'; // id がある時のみ追加
		$html .= '>';

		return $html;
	}

	/**
	 * options_from_tag
	 * @param Array $tag
	 * @return string
	 */
	public function geocoding_shortcode_handler( $tag )
	{
		$label =  __('Search Address'); // ボタンのラベル
		$zip   = '.zip'; // 検索する郵便番号
		$pref  = '.pref'; // 結果を入力するフィールド
		$city  = '.city'; // 結果を入力するフィールド
		$addr  = '.addr'; // 結果を入力するフィールド
		$lat   = '.lat'; // 結果を入力するフィールド
		$lng   = '.lng'; // 結果を入力するフィールド
		$id    = '';
		$class = 'cf7geogle-geocoding';

		$options = static::options_from_tag($tag);

		foreach( $options as $option)
		{
			$tmp = explode( ':', $option);
			switch ($tmp[0])
			{
				case 'label': $label = $tmp[1]; break;
				case 'zip'  : $zip   = $tmp[1]; break;
				case 'pref' : $pref  = $tmp[1]; break;
				case 'city' : $city  = $tmp[1]; break;
				case 'addr' : $addr  = $tmp[1]; break;
				case 'lat'  : $lat   = $tmp[1]; break;
				case 'lng'  : $lng   = $tmp[1]; break;
				case 'id'   : $id    = $tmp[1]; break;
				case 'class': $class = $class. ' '.$tmp[1]; break;
				default: break;
			}
		}

		wp_enqueue_script(
			'cf7gmap_public',
			plugin_dir_url( __FILE__ ).'/assets/js/public/public.js',
			array('jquery')
		);
		wp_enqueue_script(
			'cf7gmap_public_geocoding',
			plugin_dir_url( __FILE__ ).'/assets/js/public/geocoding.js',
			array('jquery')
		);
		wp_localize_script(
			'cf7gmap_public_geocoding',
			'JsData',
			array('API_KEY' => get_option('dashi_google_map_api_key'),
		));

		$html = '<input type="button"
				value="'.$label.'"
				data-zip="'.$zip.'"
				data-pref="'.$pref.'"
				data-city="'.$city.'"
				data-addr="'.$addr.'"
				data-lat="'.$lat.'"
				data-lng="'.$lng.'"
				class="'.$class.'"';
		if ($id) $html .= ' id="'.$id.'" ';
		$html .= '>';

		return $html;
	}

	/**
	 * options_from_tag
	 * @param Array $tag
	 * @return string
	 */
	public function googlemap_shortcode_handler( $tag )
	{
		$default_lat  = '0.0';
		$default_lng  = '0.0';
		$default_zoom = '12';
		$lat          = '.lat'; // 結果を入力するフィールド
		$lng          = '.lng'; // 結果を入力するフィールド
		$zoom         = '.zoom'; // zoom 値を入力するフィールド
		$height       = '300';
		$id           = 'cf7geogle-map';
		$class        = '';

		$options = static::options_from_tag($tag);

		foreach( $options as $option)
		{
			$tmp = explode( ':', $option);
			switch ($tmp[0])
			{
				case 'default_lat' : $default_lat  = $tmp[1]; break;
				case 'default_lng' : $default_lng  = $tmp[1]; break;
				case 'default_zoom': $default_zoom = $tmp[1]; break;
				case 'lat'   : $lat    = $tmp[1]; break;
				case 'lng'   : $lng    = $tmp[1]; break;
				case 'zoom'  : $zoom   = $tmp[1]; break;
				case 'height': $height = $tmp[1]; break;
				case 'id'    : $id     = $tmp[1]; break;
				case 'class' : $class  = $class. ' '.$tmp[1]; break;
				default: break;
			}
		}

		if (!is_numeric($default_lat)) $default_lat = 0.0;
		if (!is_numeric($default_lng)) $default_lng = 0.0;
		if (!is_numeric($default_zoom)) $default_zoom = 12;
		if (!is_numeric($height)) $height = 200;

		if (get_option('cf7geogle_option_is_include_api'))
		{
			wp_enqueue_script(
				'google-maps-api-admin',
				'http://maps.google.com/maps/api/js?key='.get_option('cf7geogle_option_google_api_key'),
				array( 'jquery' ),
				'1.0',
				true
			);
		}

		wp_enqueue_script(
			'cf7gmap_public',
			plugin_dir_url( __FILE__ ).'/assets/js/public/public.js',
			array('jquery')
		);
		wp_enqueue_script(
			'cf7gmap_public_googlemap',
			plugin_dir_url( __FILE__ ).'/assets/js/public/googlemap.js',
			array('jquery')
		);
		wp_localize_script(
			'cf7gmap_public_googlemap',
			'JsData',
			array(
			'default_lat'  => $default_lat,
			'default_lng'  => $default_lng,
			'default_zoom' => $default_zoom,
			'id' => $id,
		));

		return '<div id="'.$id.'"
				data-lat="'.$lat.'"
				data-lng="'.$lng.'"
				data-zoom="'.$zoom.'"
				style="width:100%;height:'.$height.'px"
			></div>';
	}
}
