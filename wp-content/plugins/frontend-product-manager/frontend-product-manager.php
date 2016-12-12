<?php
/*
    Plugin Name: Front End Product Manager
    Description: Allow merchants/ vendors to add new product through front end
    Version:     1.0
    Author:      Minh Nguyen
*/
if( !defined('ABSPATH') ){
	exit;
}

if ( ! class_exists('Frontend_Product_Manager') ) 
{
	
	class Frontend_Product_Manager {

		protected $pluginPath;
		protected $pluginUrl;

		public function __construct() {	
	        $this->pluginPath = dirname(__FILE__); 
	        $this->pluginUrl = plugins_url('frontend-product-manager/');	
			$this->init_hooks();
			$this->includes();
		}

		public function init_hooks() {		
			add_action('wp_enqueue_scripts', array($this, 'fpm_enqueue') );
		}

		public function includes() {		
			include_once( 'add-product.php' );
		}

		public function fpm_enqueue(){
			wp_enqueue_style('style', $this->pluginUrl.'assets/css/fpm.css', __FILE__);
			wp_enqueue_script('add-product', $this->pluginUrl.'assets/js/add-product.js', array('jquery'));
			wp_enqueue_script('ckeditor', $this->pluginUrl.'assets/ckeditor4.6.0/ckeditor.js', array('jquery'));
			wp_enqueue_script('jquery-validate', $this->pluginUrl.'assets/js/jquery.validate.js', array('jquery'));
			wp_enqueue_script('validate', $this->pluginUrl.'assets/js/validate.js', array('jquery'));
			wp_localize_script( 'add-product', 'fpmPostSumitter', 
				array(
					'fpmAjaxUrl' => plugins_url('fpm-ajax.php' , __FILE__) ,
					'security' => wp_create_nonce("user-submitted-product")
				) );
		}

		
	}
	// end FPM class

}

function fpm_load(){
	global $FPM;
	$FPM = new Frontend_Product_Manager;
}
add_action( 'init', 'fpm_load' );
 



