<?php
namespace ProdWCLSR;

if (!defined('ABSPATH')) exit;

use ProdWCLSR\PageSettings\Page_Settings;

define("WCLSR_ASFSK_ASSETS_PUBLIC_DIR_FILE", plugin_dir_url(__FILE__) . "assets/public");
define("WCLSR_ASFSK_ASSETS_ADMIN_DIR_FILE", plugin_dir_url(__FILE__) . "assets/admin");

class ClassProdWCLSR{
    private static $_instance = null;

    public static function instance(){
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function wclsr_all_assets_for_the_admin(){
        if (isset($_GET['page']) && $_GET['page'] === 'get-wooc-click-share') {
            wp_enqueue_script('wclsr-multi-social', plugin_dir_url(__FILE__) . 'assets/admin/multi-social.js', array('jquery'), '1.0', true);
            wp_enqueue_script('wclsr-wheelcolorpicker', plugin_dir_url(__FILE__) . 'assets/admin/colorpicker/jquery.wheelcolorpicker.js', array('jquery'), '1.0', true);
            $all_css_js_file = array(
                'wclsr-style' => array('wclsr_path_define' => WCLSR_ASFSK_ASSETS_ADMIN_DIR_FILE . '/style.css'),
                'wclsr-wheelcolorpicker' => array('wclsr_path_define' => WCLSR_ASFSK_ASSETS_ADMIN_DIR_FILE . '/colorpicker/wheelcolorpicker.css'),
            );

            foreach ($all_css_js_file as $handle => $fileinfo) {
                wp_enqueue_style($handle, $fileinfo['wclsr_path_define'], null, '1.0', 'all');
            }
        }
    }

    public function wclsr_all_assets_for_the_public(){
        wp_enqueue_script('wclsr-multi-font', plugin_dir_url(__FILE__) . 'assets/public/font.js', array('jquery'), '1.0', true);
        $all_css_js_file = array(
            'wclsr-fontawesome' => array('wclsr_path_define' => WCLSR_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/fontawesome.css'),
            'wclsr-style' => array('wclsr_path_define' => WCLSR_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/style.css'),
        );

        foreach ($all_css_js_file as $handle => $fileinfo) {
            wp_enqueue_style($handle, $fileinfo['wclsr_path_define'], null, '1.0', 'all');
        }
    }

    public function wclsr_admin_menu_test(){
        if (current_user_can('manage_options')) {
			add_menu_page(
				esc_html__('WooC Click Share', 'wooc-click-share'),
				esc_html__('WooC Click Share', 'wooc-click-share'),
				'manage_options',
				'get-wooc-click-share',
				array($this, 'wclsr_plugin_submenu_about_plugin_page'),
				'dashicons-share',
				56
			);
        }

        add_action('admin_init', array($this, 'wclsr_admin_controls'));
    }

    public function wclsr_admin_controls(){
        // Register your settings
        register_setting('wclsr-plugin-settings', 'wclsr_select_option');
        register_setting('wclsr-plugin-settings', 'sk_repeater_settings', 'sk_sanitize_repeater_settings');
        add_settings_section('sk_checkout_settings_section', '', array($this, 'sk_display_section_callback'), 'sk_checkout_settings');
        add_settings_field('sk_repeater_field', '', array($this, 'sk_display_repeater_field'), 'sk_checkout_settings', 'sk_checkout_settings_section');
        include 'dashboard/controls.php';
    }

    public function sk_sanitize_repeater_settings($input){
        $sanitized_input = array();

        if (is_array($input)) {
            foreach ($input as $item) {
                $sanitized_item = array();
                if (isset($item['select'])) {
                    $sanitized_item['select'] = sanitize_text_field($item['select']);
                }
                $sanitized_input[] = $sanitized_item;
            }
        }

        return $sanitized_input;
    }

    public function sk_display_section_callback(){}

    public function sk_display_repeater_field(){
        $all_soMedias = [
            'facebook'    => esc_html__( 'Facebook', 'wooc-click-share' ),
            'twitter'     => esc_html__( 'Twitter', 'wooc-click-share' ),
            'linkedin'    => esc_html__( 'Linkedin', 'wooc-click-share' ),
            'instagram'   => esc_html__( 'Instagram', 'wooc-click-share' ),
            'email'       => esc_html__( 'Email', 'wooc-click-share' ),
            'whatsapp'    => esc_html__( 'Whatsapp', 'wooc-click-share' ),
            'youtube'     => esc_html__( 'Youtube', 'wooc-click-share' ),
            'telegram'    => esc_html__( 'Telegram', 'wooc-click-share' ),
            'viber'       => esc_html__( 'Viber', 'wooc-click-share' ),
            'pinterest'   => esc_html__( 'Pinterest', 'wooc-click-share' ),
            'tumblr'      => esc_html__( 'Tumblr', 'wooc-click-share' ),
            'reddit'      => esc_html__( 'Reddit', 'wooc-click-share' ),
            'vk'          => esc_html__( 'VK', 'wooc-click-share' ),
            'xing'        => esc_html__( 'Xing', 'wooc-click-share' ),
            'get-pocket'  => esc_html__( 'Get Pocket', 'wooc-click-share' ),
            'digg'        => esc_html__( 'Digg', 'wooc-click-share' ),
            'stumbleupon' => esc_html__( 'StumbleUpon', 'wooc-click-share' ),
            'weibo'       => esc_html__( 'Weibo', 'wooc-click-share' ),
            'renren'      => esc_html__( 'Renren', 'wooc-click-share' ),
            'skype'       => esc_html__( 'Skype', 'wooc-click-share' ),
            'quora'       => esc_html__( 'Quora', 'wooc-click-share' ),
            'snapchat'      => esc_html__( 'Snapchat', 'wooc-click-share' ),
            'flicker'       => esc_html__( 'Flicker', 'wooc-click-share' ),
            'odnoklassniki' => esc_html__( 'Odnoklassniki', 'wooc-click-share' ),
            'moimir'        => esc_html__( 'Moimir', 'wooc-click-share' ),
            'blogger'       => esc_html__( 'Blogger', 'wooc-click-share' ),
            'evernote'      => esc_html__( 'Evernote', 'wooc-click-share' ),
            'delicious'     => esc_html__( 'Delicious', 'wooc-click-share' ),
            'surfingbird'   => esc_html__( 'Surfingbird', 'wooc-click-share' ),
            'liveinternet'  => esc_html__( 'Liveinternet', 'wooc-click-share' ),
            'buffer'        => esc_html__( 'Buffer', 'wooc-click-share' ),
            'instapaper'    => esc_html__( 'Instapaper', 'wooc-click-share' ),
            'wordpress'     => esc_html__( 'WordPress', 'wooc-click-share' ),
            'baidu'         => esc_html__( 'Baidu', 'wooc-click-share' ),
            'line'          => esc_html__( 'Line', 'wooc-click-share' ),
        ];
        $options = get_option('sk_repeater_settings');
        echo '<div class="repeater-container">';
            if ($options) :
                foreach ($options as $index => $item) :
                    echo '<div class="repeater-item">';
                        echo '<select name="sk_repeater_settings['.$index.'][select]" required>';
                        foreach($all_soMedias as $style_slug => $style_title){ 
                            echo '<option value="'.$style_slug.'" '.selected($item['select'], $style_slug).'>'.$style_title.'</option>';
                            }
                        echo '</select>';
                        echo '<button type="button" class="remove-item" onclick="removeRepeaterItem(this)">'.esc_html__('Remove', 'wooc-click-share').'</button>';
                    echo '</div>';
                endforeach;
            endif;
        echo '</div>';
        echo '<button type="button" class="button" onclick="addRepeaterItem()">'.esc_html__('Add New','wooc-click-share').'</button>';
    }

    public function wclsr_plugin_submenu_about_plugin_page(){
        include 'dashboard/dashboard-style.php';
    }

    public function wclsr_plugin_function_for_datas_callback(){}

    public function wclsr_plugin_settings_to_whitelist($options){
        $options['wclsr-plugin-settings'] = array(
            'wclsr-estimass-bgcolor5',
        );

        return $options;
    }

    public function wclsr_taxoes_styles(){
        // *** reason
        $wclsr_reason_color_value = get_option('wclsr-estimass-color');
        $wclsr_reason_fontsize_value = get_option('wclsr-estimass-fontsize');
        $wclsr_reason_fontweight_value = get_option('wclsr-estimass-fontweight');
        $wclsr_reason_padding_value = get_option('wclsr-estimass-padding');
        $wclsr_reason_margin_value = get_option('wclsr-estimass-margin');
        // Top title
        $wclsr_reason_colorT_value = get_option('wclsr-estimdate-color');
        $wclsr_reason_fontsizeT_value = get_option('wclsr-estimdate-fontsize');
        $wclsr_reason_fontweightT_value = get_option('wclsr-estimdate-fontweight');
        $wclsr_reason_paddingT_value = get_option('wclsr-estimdate-padding');
        $wclsr_reason_marginT_value = get_option('wclsr-estimdate-margin');
        $wclsr_reason_toptitle_alignment_value = get_option('wclsr-toptitle-alignment');
        // Common bg
        $wclsr_reason_bgcolor_value = get_option('wclsr-estimass-bgcolor');
        $wclsr_reason_shadow_value = get_option('wclsr-reason-box-shadow');
        $wclsr_reason_radius_value = get_option('wclsr-reason-border-radius');
        $wclsr_reason_fontsize_value = get_option('wclsr-reason-fontsize');
        // Common hover bg
        $wclsr_reason_Hbgcolor_value = get_option('wclsr-estimass-Hbgcolor');
        $wclsr_reason_Hshadow_value = get_option('wclsr-reason-Hbox-shadow');
        $wclsr_reason_Hradius_value = get_option('wclsr-reason-Hborder-radius');
        $html = "<style>
        .wclsr_btn_link{
            color:{$wclsr_reason_color_value} !important;
            font-size:{$wclsr_reason_fontsize_value} !important;
            font-weight:{$wclsr_reason_fontweight_value} !important;
            padding:{$wclsr_reason_padding_value} !important;
            margin:{$wclsr_reason_margin_value} !important;
        }
        .wclsr-top-ttl__{
            color:{$wclsr_reason_colorT_value} !important;
            font-size:{$wclsr_reason_fontsizeT_value} !important;
            font-weight:{$wclsr_reason_fontweightT_value} !important;
            padding:{$wclsr_reason_paddingT_value} !important;
            margin:{$wclsr_reason_marginT_value} !important;
            text-align:{$wclsr_reason_toptitle_alignment_value} !important;
        }
        .wclsr_btn_common .main-container{
            justify-content:{$wclsr_reason_fontsize_value} !important;
        }
        .wclsr_btn_link_wrap a{
            background-color:{$wclsr_reason_bgcolor_value} !important;
            box-shadow:{$wclsr_reason_shadow_value} !important;
            border-radius:{$wclsr_reason_radius_value} !important;
        }
        .wclsr_btn_link_wrap a:hover{
            background-color:{$wclsr_reason_Hbgcolor_value} !important;
            box-shadow:{$wclsr_reason_Hshadow_value} !important;
            border-radius:{$wclsr_reason_Hradius_value} !important;
        }
        ";
        $html .= '</style>';
        echo $html;
    }

    public function wclsr_settings_plugin_action_link($links, $file){
        if (plugin_basename(__FILE__) == $file) {
            $wclsr_settings_link = '<a href="' . admin_url('admin.php?page=get-wooc-click-share') . '" target="_blank">' . esc_html__('Settings', 'wooc-click-share') . '</a>';
            array_push($links, $wclsr_settings_link);
        }

        return $links;
    }

    public function wclsr_pro_shop_page(){
        echo wclsr_sk_single();
    }
// 
    public function wclsr_add_to_cart_button(){
        echo wclsr_sk_single();
    }

    public function wclsr_after_add_to_cart_button(){
        echo wclsr_sk_single();
    }

    public function wclsr_after_single_product_summary(){
        echo wclsr_sk_single();
    }

    public function wclsr_before_single_product_summary(){
        echo wclsr_sk_single();
    }

    public function wclsr_after_single_product(){
        echo wclsr_sk_single();
    }
    
// 
    public function __construct(){
        // Last Date 
        if(get_option( 'wclsr-thankyou-page-check', 'on' )=='on'){
            if(get_option( 'wclsr-only-sshare-show', 'before_add_to_cart_button' )=='before_add_to_cart_button'){
                add_action('woocommerce_before_add_to_cart_button', [$this, 'wclsr_add_to_cart_button']); // For add_to_cart_button
            }elseif(get_option( 'wclsr-only-sshare-show' )=='after_add_to_cart_button'){
                add_action('woocommerce_after_add_to_cart_button', [$this, 'wclsr_after_add_to_cart_button']); // For after_add_to_cart_button
            }elseif(get_option( 'wclsr-only-sshare-show')=='after_single_product_summary'){
                add_action('woocommerce_after_single_product_summary', [$this, 'wclsr_after_single_product_summary']); // For after_single_product_summary
            }elseif(get_option( 'wclsr-only-sshare-show')=='before_single_product_summary'){
                add_action('woocommerce_before_single_product_summary', [$this, 'wclsr_before_single_product_summary']); // For before_single_product_summary
            }elseif(get_option( 'wclsr-only-sshare-show')=='after_single_product'){
                add_action('woocommerce_after_single_product', [$this, 'wclsr_after_single_product']); // For after_single_product
            }
        }
        // Show date
        if(get_option( 'wclsr-checkout-page-check', 'on' )=='on'){
            add_action('woocommerce_shop_loop_item_title', [$this, 'wclsr_pro_shop_page']); // For the shop page
        }
        // Plugins
        add_filter('plugin_action_links', [$this, 'wclsr_settings_plugin_action_link'], 10, 2);
        add_filter('whitelist_options', [$this, 'wclsr_plugin_settings_to_whitelist']);
        add_action('admin_enqueue_scripts', [$this, 'wclsr_all_assets_for_the_admin']);
        add_action('wp_enqueue_scripts', [$this, 'wclsr_all_assets_for_the_public']);
        add_action('admin_menu', [$this, 'wclsr_admin_menu_test']);
        add_action('wp_head', [$this, 'wclsr_taxoes_styles'], 99);
    }
}

ClassProdWCLSR::instance();
