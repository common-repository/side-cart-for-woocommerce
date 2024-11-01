<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('SCFW_admin_menu')) {

    class SCFW_admin_menu {

        protected static $SCFW_instance;

        function scfw_submenu_page() {
            add_menu_page(  'Floating Cart', 'Floating Cart', 'manage_options', 'floating-cart',array($this, 'scfw_callback'));
        }

        function scfw_callback() {
            ?>    
                <div class="wrap">
                    <h2>Cart Setting</h2>
                    <?php if(isset($_REQUEST['message'])  && $_REQUEST['message'] == 'success'){ ?>
                        <div class="notice notice-success is-dismissible"> 
                            <p><strong>Record updated successfully.</strong></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="wfc-container">
                    <form method="post" >
                        <?php wp_nonce_field( 'wfc_nonce_action', 'wfc_nonce_field' ); ?>
                        <ul class="tabs">
                            <li class="tab-link current" data-tab="wfc-tab-general"><?php echo __( 'General Settings', SCFW_DOMAIN );?></li>
                            <li class="tab-link" data-tab="wfc-tab-other"><?php echo __( 'Custom Style', SCFW_DOMAIN );?></li>
                            <li class="tab-link" data-tab="wfc-tab-translations"><?php echo __( 'Translations', SCFW_DOMAIN );?></li>
                        </ul>
                        <div id="wfc-tab-general" class="tab-content current">
                            <div class="cover_div">
                                <h2>Show Cart Basket</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Display All Pages</th>
                                        <td>
                                            <input type="checkbox" class="wfc_all_pages" name="wfc_all_pages" value="yes" <?php if(get_option( 'wfc_all_pages', 'yes' ) == 'yes'){echo "checked";}?> disabled="">
                                            <label><?php echo __('All Page','scfw');?></label>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr class="wfc_single_pages">
                                        <th>Selected Pages</th>
                                        <td class="scpfw_visibility_on_pages">
                                            <input type="checkbox" name="wfc_display_home_page" value="yes" <?php if(get_option( 'wfc_display_home_page', 'yes' ) == 'yes'){ echo "checked";}?> disabled="">
                                            <label><?php echo __('Display On Home Page','scfw');?></label>
                                            </br>

                                            <input type="checkbox" class="wfc_display_shop_page" name="wfc_display_shop_page" value="yes" <?php if(get_option( 'wfc_display_shop_page', 'yes' ) == 'yes'){ echo "checked";}?> disabled="">
                                            <label><?php echo __('Display On Shop Page','scfw');?></label>
                                            </br>

                                            <input type="checkbox" name="wfc_display_product_page" value="yes" <?php if(get_option( 'wfc_display_product_page', 'yes' ) == 'yes'){ echo "checked";}?> disabled="">
                                            <label><?php echo __('Display On Single Product Page','scfw');?></label></br>

                                            <input type="checkbox" name="wfc_display_cart_page" value="yes" <?php if(get_option( 'wfc_display_cart_page', 'yes' ) == 'yes'){ echo "checked";}?> disabled="">
                                            <label><?php echo __('Display On Cart Page','scfw');?></label></br>

                                            <input type="checkbox" name="wfc_display_checkout_page" value="yes" <?php if(get_option( 'wfc_display_checkout_page', 'yes' ) == 'yes'){ echo "checked";}?> disabled="">
                                            <label><?php echo __('Display On Checkout Page','scfw');?></label></br>

                                            <input type="checkbox" name="product_cat_page" value="yes" <?php if(get_option( 'product_cat_page', 'yes' ) == 'yes'){echo "checked";}?> disabled="">
                                            <label><?php echo __('Product Category Page','scfw');?></label><br>

                                            <input type="checkbox" name="product_tag_page" value="yes" <?php if(get_option( 'product_tag_page', 'yes' ) == 'yes'){echo "checked";}?> disabled="">
                                            <label><?php echo __('Product Tag Page','scfw');?></label><br>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Side cart</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Ajax Add To Cart</th>
                                        <td>
                                            <input type="checkbox" name="wfc_ajax_cart" value="yes" <?php if (get_option( 'wfc_ajax_cart', 'yes' ) == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Add to cart without page refresh.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Side Cart Width</th>
                                        <td>
                                            <input type="text" name="wfc_sidecart_width" value="<?php echo get_option( 'wfc_sidecart_width', '350' ); ?>">
                                            <strong>(in px - eg. 350)</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Button Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show ViewCart Button</th>
                                        <td>
                                            <input type="checkbox" name="wfc_cart_option" value="yes" <?php if (get_option( 'wfc_cart_option', 'yes' ) == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Show Viewcart Button.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show Checkout Button</th>
                                        <td>
                                            <input type="checkbox" name="wfc_checkout_option" value="yes" <?php if (get_option( 'wfc_checkout_option', 'yes' ) == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Show Checkout Button.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show Continue Shopping Button</th>
                                        <td>
                                            <input type="checkbox" name="wfc_conshipping_option" value="yes" <?php if (get_option( 'wfc_conshipping_option', 'yes' ) == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Show Continue Shipping Button.</strong>
                                        </td>
                                    </tr>
                                     <tr>
                                        <th>Show Shipping Total </th>
                                        <td>
                                            <input type="checkbox" name="wfc_total_shipping_option"  disabled="">
                                            <strong>Show Shipping Total.</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show Tax Total </th>
                                        <td>
                                            <input type="checkbox" name="wfc_total_tax_option" value="yes"  disabled="">
                                            <strong>Show Tax Total.</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show All Total </th>
                                        <td>
                                            <input type="checkbox" name="wfc_total_all_option"  disabled="">
                                            <strong>Show All Total.</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Continue Shopping Button Link</th>
                                        <td>
                                            <input type="text" name="wfc_conshipping_link" value="<?php echo get_option( 'wfc_conshipping_link', '#' ); ?>">
                                            <strong>Use "#" for the same page</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Product Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Display Qty Box</th>
                                        <td>
                                            <input type="checkbox" name="wfc_qty_box" value="yes" disabled="">
                                            <strong>Display Product Qty box.</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    
                                    
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Coupon Field</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Coupon Field on Mobile</th>
                                        <td>
                                            <input type="checkbox" name="wfc_coupon_field_mobile" value="yes" <?php if (get_option( 'wfc_coupon_field_mobile', 'yes' ) == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Enable Coupon Field on Mobile</strong>
                                        </td>
                                    </tr>   
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Cart Product Slider</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Product Slider on Desktop</th>
                                        <td>
                                            <input type="checkbox" name="wfc_prodslider_desktop"  disabled="">
                                            <strong>Enable Product Slider on Desktop</strong>
                                             <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Slider on Mobile</th>
                                        <td>
                                            <input type="checkbox" name="wfc_prodslider_mobile"  disabled="">
                                            <strong>Enable Product Slider on Mobile</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Select Product</th>
                                        <td>
                                            <select id="wfc_select_product" name="wfc_select2[]" multiple="multiple" style="width:100%;max-width:15em;" disabled="">
                                           </select>
                                           <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>   
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Cart basket</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Cart basket Hide</th>
                                        <td>
                                            <input type="checkbox" name="wfc_cart_empty" value="yes" disabled="">
                                            <strong>If Cart is Empty Then Cart Basket Hide</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cart Icon</th>
                                        <td>
                                            <input type="checkbox" name="wfc_show_cart_icn" value="yes" <?php if (get_option( 'wfc_show_cart_icn', 'yes' ) == "yes" ) { echo 'checked="checked"'; } ?> disabled="">
                                            <strong>Show Cart Icon</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>   
                                    <tr>
                                        <th>On Cart & Checkout Page</th>
                                        <td>
                                            <input type="checkbox" name="wfc_cart_check_page" value="yes" disabled="">
                                            <strong>Show Cart Basket on cart and checkout pages.</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cart on Mobile</th>
                                        <td>
                                            <input type="checkbox" name="wfc_mobile" value="yes" <?php if (get_option( 'wfc_mobile', 'yes' ) == "yes" ) { echo 'checked="checked"'; } ?>>
                                            <strong>Show Cart on mobile device.</strong>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Product Count</th>
                                        <td>
                                            <input type="checkbox" name="wfc_product_cnt" value="yes" <?php if (get_option( 'wfc_product_cnt', 'yes' ) == "yes") { echo 'checked="checked"'; } ?>>
                                            <strong>Show Product Count.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hide Basket Pages</th>
                                        <td>
                                            <input type="text" name="wfc_on_pages" value="<?php echo get_option( 'wfc_on_pages' ); ?>" disabled="">
                                            <strong>Do not show basket on pages.</strong>
                                            <label class="ocsc_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/side-cart-woocommerce/" target="_blank">link</a></label>
                                        </td>
                                    </tr> 
                                </table>
                            </div>   
                        </div>
                        <div id="wfc-tab-other" class="tab-content">
                            <div class="cover_div">
                                <h2>Side cart</h2>
                                <table class="data_table">
                                    
                                    <tr>
                                        <td>
                                            <h3>Title Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Header Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_head_ft_size" value="<?php echo get_option( 'wfc_head_ft_size', '20' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Header Font Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_head_ft_clr', '#000000' ); ?>" name="wfc_head_ft_clr" value="<?php echo get_option( 'wfc_head_ft_clr', '#000000' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Text Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_ship_ft_size" value="<?php echo get_option( 'wfc_ship_ft_size', '16' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Text Font Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_ship_ft_clr', '#000000' ); ?>" name="wfc_ship_ft_clr" value="<?php echo get_option( 'wfc_ship_ft_clr', '#000000' ); ?>"/>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <h3>Cart Product Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_product_ft_size" value="<?php echo get_option( 'wfc_product_ft_size', '16' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_product_ft_clr', '#000000' ); ?>" name="wfc_product_ft_clr" value="<?php echo get_option( 'wfc_product_ft_clr', '#000000' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Coupon Field Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apply Coupon Font Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_apply_cpn_ft_clr', '#000000' ); ?>" name="wfc_apply_cpn_ft_clr" value="<?php echo get_option( 'wfc_apply_cpn_ft_clr', '#000000' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apply Button Text Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_applybtn_cpn_ft_clr', '#ffffff' ); ?>" name="wfc_applybtn_cpn_ft_clr" value="<?php echo get_option( 'wfc_applybtn_cpn_ft_clr', '#ffffff' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apply Button Background Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_applybtn_cpn_bg_clr', '#000000' ); ?>" name="wfc_applybtn_cpn_bg_clr" value="<?php echo get_option( 'wfc_applybtn_cpn_bg_clr', '#000000' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Slider Product Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_sld_product_ft_size" value="<?php echo get_option( 'wfc_sld_product_ft_size', '18' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_sld_product_ft_clr', '#000000' ); ?>" name="wfc_sld_product_ft_clr" value="<?php echo get_option( 'wfc_sld_product_ft_clr', '#000000' ); ?>"/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h3>Footer Button Settings</h3>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Footer Buttons Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_ft_btn_clr', '#766f6f' ); ?>" name="wfc_ft_btn_clr" value="<?php echo get_option( 'wfc_ft_btn_clr', '#766f6f' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Footer Buttons Text Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_ft_btn_txt_clr', '#ffffff' ); ?>" name="wfc_ft_btn_txt_clr" value="<?php echo get_option( 'wfc_ft_btn_txt_clr', '#ffffff' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Footer Buttons Margin</th>
                                        <td>
                                            <input type="number" name="wfc_ft_btn_mrgin" value="<?php echo get_option( 'wfc_ft_btn_mrgin', '5' ); ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Cart basket</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Basket Position</th>
                                        <td>
                                            <select name="wfc_basket_position">
                                                <option value="top" <?php if(get_option( 'wfc_basket_position' ) == "top"){ echo "selected"; } ?>>Top</option>
                                                <option value="bottom" <?php if(get_option( 'wfc_basket_position' ) == "bottom" || empty(get_option( 'wfc_basket_position' ))){ echo "selected"; } ?>>Bottom</option>
                                            </select>
                                        </td>
                                    </tr>   
                                    
                                   
                                    <tr>
                                        <th>Basket Icon Size</th>
                                        <td>
                                            <input type="number" name="wfc_basket_icn_size" value="<?php echo get_option( 'wfc_basket_icn_size', '60' ); ?>">
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Basket Background Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_basket_bg_clr', '#cccccc' ); ?>" name="wfc_basket_bg_clr" value="<?php echo get_option( 'wfc_basket_bg_clr', '#cccccc' ); ?>"/>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Count Background Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_cnt_bg_clr', '#000000' ); ?>" name="wfc_cnt_bg_clr" value="<?php echo get_option( 'wfc_cnt_bg_clr', '#000000' ); ?>"/>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Count Text Color</th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'wfc_cnt_txt_clr', '#ffffff' ); ?>" name="wfc_cnt_txt_clr" value="<?php echo get_option( 'wfc_cnt_txt_clr', '#ffffff' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Count Text Size</th>
                                        <td>
                                            <input type="number" name="wfc_cnt_txt_size" value="<?php echo get_option( 'wfc_cnt_txt_size', '15' ); ?>">
                                        </td>
                                    </tr> 
                                </table>
                            </div>
                        </div>
                        <div id="wfc-tab-translations" class="tab-content">
                            <div class="cover_div">
                                <h2>Translations</h2>
                                <table class="data_table">
                                    <tr>
                                        <td>
                                            <h3>Title Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Head Title</th>
                                        <td>
                                            <input type="text" name="wfc_head_title" value="<?php echo get_option( 'wfc_head_title', 'Your Cart' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Coupon Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cart is empty Text</th>
                                        <td>
                                            <input type="text" name="wfc_cart_is_empty" value="<?php echo get_option( 'wfc_cart_is_empty', 'Cart is empty.' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apply Coupon Text</th>
                                        <td>
                                            <input type="text" name="wfc_apply_cpn_txt" value="<?php echo get_option( 'wfc_apply_cpn_txt', 'Apply Coupon' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apply Coupon Placeholder Text</th>
                                        <td>
                                            <input type="text" name="wfc_apply_cpn_plchldr_txt" value="<?php echo get_option( 'wfc_apply_cpn_plchldr_txt', 'Enter your promo code' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Apply Coupon Apply Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_apply_cpn_apbtn_txt" value="<?php echo get_option( 'wfc_apply_cpn_apbtn_txt', 'APPLY' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Field Empty Text</th>
                                        <td>
                                            <input type="text" name="wfc_cpnfield_empty_txt" value="<?php echo get_option( 'wfc_cpnfield_empty_txt', 'Coupon Code Field is Empty!' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Already Applied Text</th>
                                        <td>
                                            <input type="text" name="wfc_cpn_alapplied_txt" value="<?php echo get_option( 'wfc_cpn_alapplied_txt', 'Coupon Code Already Applied.' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Invalid Coupon Code Text</th>
                                        <td>
                                            <input type="text" name="wfc_invalid_coupon_txt" value="<?php echo get_option( 'wfc_invalid_coupon_txt', 'Invalid code entered. Please try again.' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Applied Successfully Text</th>
                                        <td>
                                            <input type="text" name="wfc_coupon_applied_suc_txt" value="<?php echo get_option( 'wfc_coupon_applied_suc_txt', 'Coupon Applied Successfully.' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Removed Successfully Text</th>
                                        <td>
                                            <input type="text" name="wfc_coupon_removed_suc_txt" value="<?php echo get_option( 'wfc_coupon_removed_suc_txt', 'Coupon Removed Successfully.' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Product Slider Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Add to Cart Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_slider_atcbtn_txt" value="<?php echo get_option( 'wfc_slider_atcbtn_txt', 'Add to cart' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>View Options Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_slider_vwoptbtn_txt" value="<?php echo get_option( 'wfc_slider_vwoptbtn_txt', 'View Options' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Cart Footer Settings</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Subtotal Text</th>
                                        <td>
                                            <input type="text" name="wfc_subtotal_txt" value="<?php echo get_option( 'wfc_subtotal_txt', 'Subtotal' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Text</th>
                                        <td>
                                            <input type="text" name="wfc_ship_txt" value="<?php echo get_option( 'wfc_ship_txt', 'To find out your shipping cost , Please proceed to checkout.' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>View Cart Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_cart_txt" value="<?php echo get_option( 'wfc_cart_txt', 'View Cart' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Checkout Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_checkout_txt" value="<?php echo get_option( 'wfc_checkout_txt', 'Checkout' ); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Continue Shopping Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_conshipping_txt" value="<?php echo get_option( 'wfc_conshipping_txt', 'Continue Shopping' ); ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="wfc_save_option">
                        <input type="submit" value="Save changes" name="submit" class="button-primary" id="wfc-btn-space">
                    </form>  
                </div>
            <?php
        }

        function scfw_recursive_sanitize_text_field($array) {  
            if(!empty($array)) {
                foreach ( $array as $key => $value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->scfw_recursive_sanitize_text_field($value);
                    }else{
                        $value = sanitize_text_field( $value );
                    }
                }
            }
            return $array;
        }

        function scfw_save_options() {
            if( current_user_can('administrator') ) {
                if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'wfc_save_option') {
                    if(!isset( $_POST['wfc_nonce_field'] ) || !wp_verify_nonce( $_POST['wfc_nonce_field'], 'wfc_nonce_action' ) ){
                        print 'Sorry, your nonce did not verify.';
                        exit;
                    } else {

                        if(isset($_REQUEST['wfc_ajax_cart']) && !empty($_REQUEST['wfc_ajax_cart'])) {
                            $scfw_ajax_cart = sanitize_text_field( $_REQUEST['wfc_ajax_cart'] );
                        } else {
                            $scfw_ajax_cart = 'no';
                        }

                        update_option('wfc_ajax_cart', $scfw_ajax_cart, 'yes');

                        if(isset($_REQUEST['wfc_sidecart_width']) && !empty($_REQUEST['wfc_sidecart_width'])) {
                            $wfc_sidecart_width = sanitize_text_field( $_REQUEST['wfc_sidecart_width'] );
                        } else {
                            $wfc_sidecart_width = '350';
                        }

                        update_option('wfc_sidecart_width', $wfc_sidecart_width, 'yes');

                        update_option('wfc_head_title', sanitize_text_field( $_REQUEST['wfc_head_title'] ), 'yes');

                        update_option('wfc_ship_txt', sanitize_text_field( $_REQUEST['wfc_ship_txt'] ), 'yes');

                        if(isset($_REQUEST['wfc_qty_box']) && !empty($_REQUEST['wfc_qty_box'])) {
                            $wfc_qty_box = sanitize_text_field( $_REQUEST['wfc_qty_box'] );
                        } else {
                            $wfc_qty_box = 'no';
                        }

                        update_option('wfc_qty_box', $wfc_qty_box, 'yes');

                        if(isset($_REQUEST['wfc_cart_option']) && !empty($_REQUEST['wfc_cart_option'])) {
                            $wfc_cart_option = sanitize_text_field( $_REQUEST['wfc_cart_option'] );
                        } else {
                            $wfc_cart_option = 'no';
                        }

                        update_option('wfc_cart_option', $wfc_cart_option, 'yes');

                        if(isset($_REQUEST['wfc_checkout_option']) && !empty($_REQUEST['wfc_checkout_option'])) {
                            $wfc_checkout_option = sanitize_text_field( $_REQUEST['wfc_checkout_option'] );
                        } else {
                            $wfc_checkout_option = 'no';
                        }

                        update_option('wfc_checkout_option', $wfc_checkout_option, 'yes');

                        if(isset($_REQUEST['wfc_conshipping_option']) && !empty($_REQUEST['wfc_conshipping_option'])) {
                            $wfc_conshipping_option = sanitize_text_field( $_REQUEST['wfc_conshipping_option'] );
                        } else {
                            $wfc_conshipping_option = 'no';
                        }

                        update_option('wfc_conshipping_option', $wfc_conshipping_option, 'yes');


                        update_option('wfc_show_cart_icn', 'yes', 'yes');

                        if(isset($_REQUEST['wfc_cart_check_page']) && !empty($_REQUEST['wfc_cart_check_page'])) {
                            $wfc_cart_check_page = sanitize_text_field( $_REQUEST['wfc_cart_check_page'] );
                        } else {
                            $wfc_cart_check_page = 'no';
                        }

                        update_option('wfc_cart_check_page', $wfc_cart_check_page, 'yes');

                        if(isset($_REQUEST['wfc_mobile']) && !empty($_REQUEST['wfc_mobile'])) {
                            $wfc_mobile = sanitize_text_field( $_REQUEST['wfc_mobile'] );
                        } else {
                            $wfc_mobile = 'no';
                        }

                        update_option('wfc_mobile', $wfc_mobile, 'yes');

                        if(isset($_REQUEST['wfc_cart_empty']) && !empty($_REQUEST['wfc_cart_empty'])) {
                            $wfc_cart_empty = sanitize_text_field( $_REQUEST['wfc_cart_empty'] );
                        } else {
                            $wfc_cart_empty = 'no';
                        }

                        update_option('wfc_cart_empty', $wfc_cart_empty, 'yes');

                        if(isset($_REQUEST['wfc_product_cnt']) && !empty($_REQUEST['wfc_product_cnt'])) {
                            $wfc_product_cnt = sanitize_text_field( $_REQUEST['wfc_product_cnt'] );
                        } else {
                            $wfc_product_cnt = 'no';
                        }

                        update_option('wfc_product_cnt', $wfc_product_cnt, 'yes');

                        if(isset($_REQUEST['wfc_select2'])) {
                            $scfw_select2 = $this->scfw_recursive_sanitize_text_field($_REQUEST['wfc_select2'] );
                            update_option('wfc_select2', $scfw_select2, 'yes');
                        }

                        update_option('wfc_cart_txt', sanitize_text_field( $_REQUEST['wfc_cart_txt'] ), 'yes');

                        update_option('wfc_checkout_txt', sanitize_text_field( $_REQUEST['wfc_checkout_txt'] ), 'yes');

                        update_option('wfc_conshipping_txt', sanitize_text_field( $_REQUEST['wfc_conshipping_txt'] ), 'yes');

                        update_option('wfc_conshipping_link', sanitize_text_field( $_REQUEST['wfc_conshipping_link'] ), 'yes');
                        update_option('wfc_head_ft_size', sanitize_text_field( $_REQUEST['wfc_head_ft_size'] ), 'yes');
                        update_option('wfc_head_ft_clr', sanitize_text_field( $_REQUEST['wfc_head_ft_clr'] ), 'yes');
                        update_option('wfc_ship_ft_size', sanitize_text_field( $_REQUEST['wfc_ship_ft_size'] ), 'yes');
                        update_option('wfc_ship_ft_clr', sanitize_text_field( $_REQUEST['wfc_ship_ft_clr'] ), 'yes');
                        update_option('wfc_cart_is_empty', sanitize_text_field( $_REQUEST['wfc_cart_is_empty'] ), 'yes');
                        update_option('wfc_product_ft_size', sanitize_text_field( $_REQUEST['wfc_product_ft_size'] ), 'yes');
                        update_option('wfc_product_ft_clr', sanitize_text_field( $_REQUEST['wfc_product_ft_clr'] ), 'yes');
                        update_option('wfc_sld_product_ft_size', sanitize_text_field( $_REQUEST['wfc_sld_product_ft_size'] ), 'yes');
                        update_option('wfc_sld_product_ft_clr', sanitize_text_field( $_REQUEST['wfc_sld_product_ft_clr'] ), 'yes');
                        update_option('wfc_ft_btn_mrgin', sanitize_text_field( $_REQUEST['wfc_ft_btn_mrgin'] ), 'yes');
                        update_option('wfc_ft_btn_clr', sanitize_text_field( $_REQUEST['wfc_ft_btn_clr'] ), 'yes');
                        update_option('wfc_ft_btn_txt_clr', sanitize_text_field( $_REQUEST['wfc_ft_btn_txt_clr'] ), 'yes');
                        update_option('wfc_basket_position', sanitize_text_field( $_REQUEST['wfc_basket_position'] ), 'yes');
                        update_option('wfc_basket_bg_clr', sanitize_text_field( $_REQUEST['wfc_basket_bg_clr'] ), 'yes');
                        update_option('wfc_basket_icn_size', sanitize_text_field( $_REQUEST['wfc_basket_icn_size'] ), 'yes');
                        update_option('wfc_cnt_bg_clr', sanitize_text_field( $_REQUEST['wfc_cnt_bg_clr'] ), 'yes');
                        update_option('wfc_cnt_txt_clr', sanitize_text_field( $_REQUEST['wfc_cnt_txt_clr'] ), 'yes');
                        update_option('wfc_cnt_txt_size', sanitize_text_field( $_REQUEST['wfc_cnt_txt_size'] ), 'yes');
                        update_option('woocommerce_enable_ajax_add_to_cart', $scfw_ajax_cart, 'yes');
                        update_option('wfc_apply_cpn_txt', sanitize_text_field( $_REQUEST['wfc_apply_cpn_txt'] ), 'yes');
                        update_option('wfc_apply_cpn_plchldr_txt', sanitize_text_field( $_REQUEST['wfc_apply_cpn_plchldr_txt'] ), 'yes');
                        update_option('wfc_apply_cpn_apbtn_txt', sanitize_text_field( $_REQUEST['wfc_apply_cpn_apbtn_txt'] ), 'yes');

                        update_option('wfc_cpnfield_empty_txt', sanitize_text_field( $_REQUEST['wfc_cpnfield_empty_txt'] ), 'yes');
                        update_option('wfc_cpn_alapplied_txt', sanitize_text_field( $_REQUEST['wfc_cpn_alapplied_txt'] ), 'yes');
                        update_option('wfc_invalid_coupon_txt', sanitize_text_field( $_REQUEST['wfc_invalid_coupon_txt'] ), 'yes');
                        update_option('wfc_coupon_applied_suc_txt', sanitize_text_field( $_REQUEST['wfc_coupon_applied_suc_txt'] ), 'yes');
                        update_option('wfc_coupon_removed_suc_txt', sanitize_text_field( $_REQUEST['wfc_coupon_removed_suc_txt'] ), 'yes');
                        update_option('wfc_subtotal_txt', sanitize_text_field( $_REQUEST['wfc_subtotal_txt'] ), 'yes');
                        update_option('wfc_slider_atcbtn_txt', sanitize_text_field( $_REQUEST['wfc_slider_atcbtn_txt'] ), 'yes');
                        update_option('wfc_slider_vwoptbtn_txt', sanitize_text_field( $_REQUEST['wfc_slider_vwoptbtn_txt'] ), 'yes');
                        update_option('wfc_apply_cpn_ft_clr', sanitize_text_field( $_REQUEST['wfc_apply_cpn_ft_clr'] ), 'yes');
                        update_option('wfc_applybtn_cpn_ft_clr', sanitize_text_field( $_REQUEST['wfc_applybtn_cpn_ft_clr'] ), 'yes');
                        update_option('wfc_applybtn_cpn_bg_clr', sanitize_text_field( $_REQUEST['wfc_applybtn_cpn_bg_clr'] ), 'yes');

                        if(isset($_REQUEST['wfc_coupon_field_mobile']) && !empty($_REQUEST['wfc_coupon_field_mobile'])) {
                            $wfc_coupon_field_mobile = sanitize_text_field( $_REQUEST['wfc_coupon_field_mobile'] );
                        } else {
                            $wfc_coupon_field_mobile = 'no';
                        }

                        update_option('wfc_coupon_field_mobile', $wfc_coupon_field_mobile, 'yes');

                        if(isset($_REQUEST['wfc_prodslider_mobile']) && !empty($_REQUEST['wfc_prodslider_mobile'])) {
                            $wfc_prodslider_mobile = sanitize_text_field( $_REQUEST['wfc_prodslider_mobile'] );
                        } else {
                            $wfc_prodslider_mobile = 'no';
                        }

                        update_option('wfc_prodslider_mobile', $wfc_prodslider_mobile, 'yes');
                    }
                }
            }
        }

        function scfw_product_ajax() {
          
            $return = array();
            $post_types = array( 'product','product_variation');

            $search_results = new WP_Query( array( 
                's'=> sanitize_text_field($_GET['q']),
                'post_status' => 'publish',
                'post_type' => $post_types,
                'posts_per_page' => -1,
                'meta_query' => array(
                                    array(
                                        'key' => '_stock_status',
                                        'value' => 'instock',
                                        'compare' => '=',
                                    )
                                )
                ) );
             

            if( $search_results->have_posts() ) :
               while( $search_results->have_posts() ) : $search_results->the_post();   
                  $productc = wc_get_product( $search_results->post->ID );
                  if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                     $title = $search_results->post->post_title;
                     $price = $productc->get_price_html();
                     $return[] = array( $search_results->post->ID, $title, $price);   
                  }
               endwhile;
            endif;
            echo json_encode( $return );
            die;
        }

        function SCFW_support_and_rating_notice() {
            $screen = get_current_screen();
            // print_r($screen);
            if( 'toplevel_page_floating-cart' == $screen->base) {
                ?>
                <div class="scfw_ratess_open">
                    <div class="scfw_rateus_notice">
                        <div class="scfw_rtusnoti_left">
                            <h3>Rate Us</h3>
                            <label>If you like our plugin, </label>
                            <a target="_blank" href="https://wordpress.org/support/plugin/side-cart-for-woocommerce/reviews/?filter=5">
                                <label>Please vote us</label>
                            </a>
                            <label>, so we can contribute more features for you.</label>
                        </div>
                        <div class="scfw_rtusnoti_right">
                            <img src="<?php echo SCFW_PLUGIN_DIR;?>/images/review.png" class="scfw_review_icon">
                        </div>
                    </div>
                    <div class="scfw_support_notice">
                        <div class="scfw_rtusnoti_left">
                            <h3>Having Issues?</h3>
                            <label>You can contact us at</label>
                            <a target="_blank" href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress">
                                <label>Our Support Forum</label>
                            </a>
                        </div>
                        <div class="scfw_rtusnoti_right">
                            <img src="<?php echo SCFW_PLUGIN_DIR;?>/images/support.png" class="scfw_review_icon">
                        </div>
                    </div>
                </div>
                <div class="scfw_donate_main">
                   <img src="<?php echo SCFW_PLUGIN_DIR;?>/images/coffee.svg">
                   <h3>Buy me a Coffee !</h3>
                   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                   <div class="scfw_donate_form">
                      <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                   </div>
                </div>
                <?php
            }
        }


        function init() {
            add_action( 'admin_menu',  array($this, 'scfw_submenu_page'));
            add_action( 'init',  array($this, 'scfw_save_options'));
            add_action( 'wp_ajax_nopriv_WFC_product_ajax',array($this, 'scfw_product_ajax') );
            add_action( 'wp_ajax_WFC_product_ajax', array($this, 'scfw_product_ajax') );
            add_action( 'admin_notices', array($this, 'SCFW_support_and_rating_notice' ));
        }

        public static function SCFW_instance() {
            if (!isset(self::$SCFW_instance)) {
                self::$SCFW_instance = new self();
                self::$SCFW_instance->init();
            }
            return self::$SCFW_instance;
        }
    }
    SCFW_admin_menu::SCFW_instance();
}