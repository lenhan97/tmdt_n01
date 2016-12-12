<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<form id="fpm_add_product_form" method="post" action="" role="form" enctype="multipart/form-data"> 
	
	<?php wp_nonce_field(basename(__FILE__),'user-submitted-product'); ?>
	
	<div class="row" id="fpm-product-container">
		<div class="col-sm-6 col-sm-offset-2" id="fpm-product-left"> 
			<!-- Title -->
			<div class="control-group">
				<label for="post_title">Product Name</label>
				<div class="control">
					<input type="text" name="post_title" id="post_title" data-rule-required="true" data-msg-required="Product title is required." data-rule-maxlength="30" data-msg-maxlength="Product title must be less than 30 characters."/> 
				</div>
			</div>
			<br />		
			<!-- Description -->
			<div class="control-group">
				<div class="control">
					<label for="post_content">Product Description</label>
					<br/>
					<textarea class="select short"  name="post_content" id="post_content" rows="5" cols="5" ></textarea> 
				</div>
			</div>
			<br />		
			<!-- Short Description -->
			<div class="control-group">
				<div class="control">
					<label for="post_excerpt">Product Short Description</label>
					<br/>
					<textarea class="select short" name="post_excerpt" id="post_excerpt" rows="5" cols="5" ></textarea> 
				</div>
			</div>
			<br />	
			<!-- Type >
			<div class="control-group">
				<div class="row">
					<div class="col-sm-6">
						<label>Product Type</label>
						<select id="product-type" name="product-type" class="select2">
							<option value="simple"  selected='selected'>Simple product</option>
							<option value="grouped" >Grouped product</option>
							<option value="variable" >Variable product</option>
						</select>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<input type="checkbox" name="_virtual" id="_virtual"  style="width: 10%"/>
							<label for="_virtual" data-tip="Virtual products are intangible and aren&#039;t shipped.">Virtual</label>
							<input type="checkbox" name="_downloadable" id="_downloadable"  style="width: 10%"/>
							<label for="_downloadable" data-tip="Downloadable products give access to a file upon purchase.">Downloadable</label>
						</div>
					</div>
				</div>
			</div>
			<br/-->

			<ul class="nav nav-tabs">
			  <li class="active">
			  	<a data-toggle="tab" href="#home">General</a>
			  </li>
			  <li><a data-toggle="tab" href="#menu1">Inventory</a></li>
			  <li><a data-toggle="tab" href="#menu2">Attributes</a></li>
			</ul>
			<div class="tab-content">
			  	<div id="home" class="tab-pane fade in active">
			    <h3>General</h3>
				    <!-- Price -->
					<div class="control-group">
						<label for="_regular_price">Regular price ($)</label>
						<div class="control">
							<input type="text" name="_regular_price" id="_regular_price" >
						</div>
						<br />
						<label for="_sale_price">Sale price ($)</label>
						<div class="control">
							<input type="text" name="_sale_price" id="_sale_price" value="">
						</div>
					</div>
					<br />
					<!-- Tax-->
					<div class="control-group">
						<label for="_tax_status">Tax status</label>
						<br />
						<div class="control select">
							<select id="_tax_status" name="_tax_status" class="select short" style="" >
								<option value="taxable" >Taxable</option>
								<option value="shipping" >Shipping only</option>
								<option value="none" >None</option>
							</select> 
						</div>
						<br />
						<label for="_tax_class">Tax class</label>
						<br />
						<div class="control select">
							<select id="_tax_class" name="_tax_class" class="select short" style="" >
								<option value=""  selected='selected'>Standard</option>
								<option value="reduced-rate" >Reduced Rate</option>
								<option value="zero-rate" >Zero Rate</option>
							</select>
						</div>
					</div>
				</div>
				<div id="menu1" class="tab-pane fade">
					<h3>Inventory</h3>
					<!-- SKU  -->
					<div class="control-group">
						<label for="_sku" class="">
							<abbr title="Stock Keeping Unit">SKU</abbr>
						</label>
						<div class="control">
							<input type="text" name="_sku" id="_sku" value="" placeholder=""  />
						</div> 
					</div>
					<br />
					<!-- Stock -->
					<div class="control-group">
						<div class="control">
							<input type="checkbox" name="_manage_stock" id="_manage_stock" value="yes" style="width:2%"/>
							<label for="_manage_stock">Manage stock?</label>
						</div>
					</div>
					<div class="control-group" id="stock_qty_wrapper" style="display:none">
						<label for="_stock" class="">Stock Qty</label>
						<div class="control">
							<input type="text" name="_stock" id="_stock"/>
						</div>
					</div>
					<br />
					<div class="control-group" id="stock_status_wrapper" style="display:none">
					<label for="_stock_status">Stock status</label>
						<div class="control select">
							<select id="_stock_status" name="_stock_status">
							<option value="instock" >In stock</option>
							<option value="outofstock" >Out of stock</option>
							</select> 
						</div>
					</div>	
				</div>
				<div id="menu2" class="tab-pane fade">
					<h3>Attributes</h3>
					<div class="control-group">
					<label for="">Attributes</label>
						<div class="control select">
							<select id="attribute_taxonomy" name="attribute_taxonomy">
								<option value="">Custom product attribute</option>
								<?php 
								foreach ( $this->product_attributes as $attribute ) {
							    ?>
									<option value="<?php echo 'pa_'.$attribute->attribute_name ?>" ><?php echo $attribute->attribute_name ?></option>
								<?php }?>
							</select> 
							<a id="add-attribute" class="clickable">Add</a>
						</div>
					</div>
					<br />
					<!-- Added Attributes -->
					<div class="control-group" id="added-attributes">
						
					</div>
				</div>
			</div>
			<!--br /><i class="fa fa-angle-double-up"></i>Go up-->
		</div>
		<div class="col-sm-2" id="fpm-product-right">
			<!-- Categories -->
			<div class="control-group">
				<label for="product_cat">Categories</label>
				<div class="control select">
					<select id="product_cat" name="product_cat">	
						<?php 
						foreach($this->product_categories as $product_category) {
						?>
						<option class="" value="<?php echo $product_category->term_id ?>"><?php echo $product_category->name ?></option>
						<?php } ?>
					</select> 
				</div>
			</div>
			<br />
			<!-- Image -->
			<div class="control-group">
				<label for="">Product Image</label>
				<div class="control">
					<input type="file" id="_thumbnail_id" name="_thumbnail_id" value="-1">
					<img id="show-image" src="<?php echo plugins_url('frontend-product-manager/assets/default-thumbnail.jpg') ?>" alt="your image" />
				</div>
			</div>
			<br />
			<br />
			<div class="control-group">
				<input type="submit" name="submit_new_product" id="submit_new_product" class="button button-primary button-large" value="Submit to review">
			</div>
		</div>
	</div>
</form>

<script>
CKEDITOR.replace( 'post_excerpt' );
CKEDITOR.replace( 'post_content' );
</script>