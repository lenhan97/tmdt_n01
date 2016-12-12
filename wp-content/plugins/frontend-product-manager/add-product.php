<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class FPM_Add_Product{

	public $product_attributes = null;
	public $product_categories = null;

	public function __construct(){

		function checkLogin() {
		    if (is_page()) {
		        $pageid_current = get_the_ID();
		        $page_slug = get_post($pageid_current)->post_name;

		        if ($page_slug == 'add-product' && !is_user_logged_in()){
		            wp_redirect( home_url() );
	        		exit;
		        }
		    }
		}
		add_action('template_redirect', 'checkLogin');
		
		$args = array(
	    'number'     => $number,
	    'orderby'    => $orderby,
	    'order'      => $order,
	    'hide_empty' => $hide_empty,
	    'include'    => $ids
		);

		// Get all product categories
		$this->product_categories = get_terms( 'product_cat', $args );
		
		// Get all product attributes
		global $wpdb;
		$this->product_attributes = $wpdb->get_results( "SELECT * FROM wp_woocommerce_attribute_taxonomies", OBJECT );

		add_shortcode( 'fpm_add_product', array($this, 'fpm_add_product') );
		//add_action( 'fpm_ajax_add_product_process', array($this,'fpm_add_product_proccess'));
	}

	public function fpm_add_product(){
		
		if( isset($_POST['submit_new_product']) )
		{
			$basic_data = array(
			'post_author' => get_current_user_id(),
		    'post_content' => $_POST['post_content'],
		    'post_status' => "Pending",
		    'post_title' => $_POST['post_title'],
		    'post_parent' => '',
		    'post_type' => "product",
			);
			
			//Create post
			$post_id = wp_insert_post( $basic_data, true );

			if( !is_wp_error($post_id) )
			{
				$category_id = array( $_POST["product_cat"] );
				$category_id = array_map( 'intval', $category_id );
				$category_id = array_unique( $category_id );
				// make sure that product category is integer

				wp_set_object_terms( $post_id, $category_id , 'product_cat' );
				wp_set_object_terms( $post_id, 'simple', 'product_type');
			
				if( isset($_POST['attribute_names']) )
				{
					$i = 0;
					$product_attributes = array();
					foreach( $_POST['attribute_names'] as $attribute_name){
						
						$term_taxonomy_ids = wp_set_object_terms( $post_id, $_POST['attribute_values'][$i], $attribute_name, true );

						$product_attributes[$attribute_name] = array( 
								'name' => $attribute_name, 
								'value'=> $_POST['attribute_values'][$i],
								'is_visible' => '1',
								'is_taxonomy' => '1'
							);

						$i++;
					}

					update_post_meta( $post_id,'_product_attributes',$product_attributes);
				}

				update_post_meta( $post_id, '_visibility', 'visible' );
				update_post_meta( $post_id, '_regular_price', $_POST["_regular_price"] );
				update_post_meta( $post_id, '_sale_price', $_POST["_sale_price"] );
				update_post_meta( $post_id, '_sku', $_POST["_sku"]);
				update_post_meta( $post_id, '_manage_stock', $_POST["_manage_stock"] );
				update_post_meta( $post_id, '_stock_status', $_POST["_stock_status"]);
				update_post_meta( $post_id, '_stock', $_POST["_stock"] );
				update_post_meta( $post_id, '_tax_status', $_POST["_tax_status"]);
				update_post_meta( $post_id, '_tax_class', $_POST["_tax_class"] );
				
				if (!function_exists('wp_generate_attachment_metadata')){
	                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	            }
	            if ($_FILES) {
	                foreach ($_FILES as $file => $array) {
	                    if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
	                        return "upload error : " . $_FILES[$file]['error'];
	                    }
	                    $attach_id = media_handle_upload( $file, $new_post );
	                }   
	            }
	            if ($attach_id > 0){
	                update_post_meta($post_id,'_thumbnail_id',$attach_id);
	            }

				echo '<center><div class="alert alert-success">Product successfully added!</div></center>';
			}
			else
			{
				$errors = $post_id->get_error_messages();
				foreach($errors as $error){
					echo '<center><p style="color:red"><b>'.$error.'</b></p></center>';
				}
			}

		}

		include_once('templates/add-product-form.php');
	}

}

$fpm_add_product = new FPM_Add_Product;
