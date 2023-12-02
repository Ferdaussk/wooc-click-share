<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Taxos label check
$wclsr_only_countdown_show = get_option( 'wclsr-only-sshare-show', 'before_add_to_cart_button' );
$wclsr_checkout_page_check = get_option( 'wclsr-checkout-page-check' );
$wclsr_thankyou_page_check = get_option( 'wclsr-thankyou-page-check', 'on' );
// Label controls
// *** estimass
$wclsr_estimass_color_value = get_option( 'wclsr-estimass-color' );
$wclsr_estimass_bgcolor_value = get_option( 'wclsr-estimass-bgcolor');
$wclsr_estimass_Hbgcolor_value = get_option( 'wclsr-estimass-Hbgcolor');
$wclsr_estimass_fontsize_value = get_option( 'wclsr-estimass-fontsize');
$wclsr_estimass_fontweight_value = get_option( 'wclsr-estimass-fontweight');
$wclsr_estimass_padding_value = get_option( 'wclsr-estimass-padding');
$wclsr_estimass_margin_value = get_option( 'wclsr-estimass-margin');
$wclsr_estimass_presets_value = get_option( 'wclsr-estimass-presets', '1' );
// *** estimdate
$wclsr_notice_toptitle_value = get_option( 'wclsr-toptitle', 'WooC Click Share' );
$wclsr_notice_position_value = get_option( 'wclsr-notice-position', 'top' );
// *** reason
$wclsr_reason_box_shadow_value = get_option( 'wclsr-reason-box-shadow');
$wclsr_reason_Hbox_shadow_value = get_option( 'wclsr-reason-Hbox-shadow');
$wclsr_reason_border_radius_value = get_option( 'wclsr-reason-border-radius');
$wclsr_reason_Hborder_radius_value = get_option( 'wclsr-reason-Hborder-radius');
$wclsr_reason_fontsize_value = get_option( 'wclsr-reason-fontsize');
$wclsr_reason_fontweight_value = get_option( 'wclsr-reason-fontweight');
$wclsr_reason_fontfamilly_value = get_option( 'wclsr-reason-fontfamilly');
// *** estimdate
$wclsr_estimdate_color_value = get_option( 'wclsr-estimdate-color' );
$wclsr_estimdate_fontsize_value = get_option( 'wclsr-estimdate-fontsize');
$wclsr_estimdate_fontweight_value = get_option( 'wclsr-estimdate-fontweight');
$wclsr_estimdate_padding_value = get_option( 'wclsr-estimdate-padding');
$wclsr_estimdate_margin_value = get_option( 'wclsr-estimdate-margin');
$wclsr_estimdate_toptitle_alignment_value = get_option( 'wclsr-toptitle-alignment', 'center');

// Presets
$ss_all_presets = [
  '1' => esc_html__('Style1', 'wooc-click-share'),
  '2' => esc_html__('Style2', 'wooc-click-share'),
  '3' => esc_html__('Style3', 'wooc-click-share'),
  '4' => esc_html__('Style4', 'wooc-click-share'),
  '5' => esc_html__('Style5', 'wooc-click-share'),
  '6' => esc_html__('Style6', 'wooc-click-share'),
  '7' => esc_html__('Style7', 'wooc-click-share'),
  '8' => esc_html__('Style8', 'wooc-click-share'),
  '9' => esc_html__('Style9', 'wooc-click-share'),
  '10' => esc_html__('Style10', 'wooc-click-share'),
  '11' => esc_html__('Style11', 'wooc-click-share'),
  '12' => esc_html__('Style12', 'wooc-click-share'),
  '13' => esc_html__('Style13', 'wooc-click-share'),
  '14' => esc_html__('Style14', 'wooc-click-share'),
  '15' => esc_html__('Style15', 'wooc-click-share'),
  '16' => esc_html__('Style16', 'wooc-click-share'),
  '17' => esc_html__('Style17', 'wooc-click-share'),
  '18' => esc_html__('Style18', 'wooc-click-share'),
  '19' => esc_html__('Style19', 'wooc-click-share'),
  '20' => esc_html__('Style20', 'wooc-click-share'),
  '21' => esc_html__('Style21', 'wooc-click-share'),
  '22' => esc_html__('Style22', 'wooc-click-share'),
];
?>
<div class="admin-panel">
  <form method="post" action="options.php">
    <div class="header">
			<?php
			settings_fields( 'wclsr-plugin-settings' );
      ?>
      <a href="https://bestwpdeveloper.com/" target="_blank"><h1 class="dashboard-title"><?php echo esc_html__('BEST WP DEVELOPER', 'wooc-click-share'); ?></h1></a>
      <?php
			do_settings_sections( 'wclsr-plugin-main-menu' );
      ?>
      <div class="save-button">
        <?php submit_button(); ?>
      </div>
    </div>
    <div class="section">
      <div class="clmn-wrap first-clm">
        <div class="select-container select-control wclsr-style-style">
          <label class="wclsr-admi-sty" for=""><?php echo esc_html__('Presets Style', 'wooc-click-share');?></label>
          <?php
          echo '<select id="wclsr-estimass-presets" name="wclsr-estimass-presets">';
            foreach($ss_all_presets as $style_slug => $style_title){
              echo '<option value="'.esc_attr($style_slug).'" '.selected(esc_attr($wclsr_estimass_presets_value),esc_attr($style_slug)).'>'.esc_html__($style_title,'wooc-click-share').'</option>';
            }
          echo '</select>';
          ?>
        </div>
        <div class="wclsr_for_multi_optn">
          <label for="select"><?php echo esc_html__('Add Social:','wooc-click-share'); ?></label>
        <?php do_settings_sections('sk_checkout_settings'); ?>
        </div>   
        <div class="select-container">
          <label class="wclsr-admi-sty" for=""><?php echo esc_html__('Top title', 'wooc-click-share'); ?></label>
          <?php echo '<input type="text" name="wclsr-toptitle" id="wclsr-estimass-text" value="'.$wclsr_notice_toptitle_value.'" title="Text">';?>
        </div>
        <div class="select-container">
          <label class="wclsr-admi-sty" for=""><?php echo esc_html__('Title position to social', 'wooc-click-share'); ?></label>
          <select name="wclsr-notice-position">
            <option value="top" <?php selected($wclsr_notice_position_value, 'top'); ?>><?php echo esc_html__('Top', 'wooc-click-share'); ?></option>
            <option value="bottom" <?php selected($wclsr_notice_position_value, 'bottom'); ?>><?php echo esc_html__('Bottom', 'wooc-click-share'); ?></option>
          </select>
        </div>
        <div class="select-container">
          <label class="wclsr-social-position"><?php echo esc_html__('Social position', 'wooc-click-share'); ?></label>
          <div class="list-item">
            <input type="radio" name="wclsr-only-sshare-show" value="before_single_product_summary"
            <?php checked(get_option('wclsr-only-sshare-show', 'off'), 'before_single_product_summary'); ?>>
            <label ><?php echo esc_html__('Before single product summary', 'faq-focus-for-woo'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="wclsr-only-sshare-show" value="before_add_to_cart_button"
            <?php checked(get_option('wclsr-only-sshare-show', 'on'), 'before_add_to_cart_button'); ?>>
            <label ><?php echo esc_html__('Before add to cart button', 'faq-focus-for-woo'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="wclsr-only-sshare-show" value="after_add_to_cart_button"
            <?php checked(get_option('wclsr-only-sshare-show', 'off'), 'after_add_to_cart_button'); ?>>
            <label ><?php echo esc_html__('After add to cart button', 'faq-focus-for-woo'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="wclsr-only-sshare-show" value="after_single_product"
            <?php checked(get_option('wclsr-only-sshare-show', 'off'), 'after_single_product'); ?>>
            <label ><?php echo esc_html__('After single product', 'faq-focus-for-woo'); ?></label>
          </div>
          <div class="list-item">
            <input type="radio" name="wclsr-only-sshare-show" value="after_single_product_summary"
            <?php checked(get_option('wclsr-only-sshare-show', 'off'), 'after_single_product_summary'); ?>>
            <label ><?php echo esc_html__('After single product summary', 'faq-focus-for-woo'); ?></label>
          </div>
        </div>
        <div class="list-container wclsr_cmmn_chacthak">
          <input type="checkbox" name="wclsr-checkout-page-check" value="on" <?php echo checked( $wclsr_checkout_page_check, 'on', false ); ?>>
          <label class="checker-switch"><?php echo esc_html__('Show in shop page', 'wooc-click-share'); ?></label>
        </div>
        <div class="list-container wclsr_cmmn_chacthak">
          <input type="checkbox" name="wclsr-thankyou-page-check" value="on" <?php echo checked( $wclsr_thankyou_page_check, 'on', false ); ?>>
          <label class="checker-switch"><?php echo esc_html__('Show in single page', 'wooc-click-share'); ?></label>
        </div>
      </div>
      <div class="secound_clmn_w">
        <div class="secound-clm">
          <div class="control_row">
          <label for="" class="wclsr_style_title"><?php echo esc_html__('Icon Style', 'wooc-click-share');?></label>
            <div class="color-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Color', 'wooc-click-share');?></label>
              <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="wclsr-estimass-color" id="wclsr-estimass-text" value="'.$wclsr_estimass_color_value.'" title="Text">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Font Size', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimass-fontsize" id="wclsr-estimass-fontsize" value="'.$wclsr_estimass_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
            </div>
            <div class="number-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Font Weight', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimass-fontweight" id="wclsr-estimass-fontweight" value="'.$wclsr_estimass_fontweight_value.'" title="Number"  placeholder="400">';?>
            </div>
            <div class="number-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Padding', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimass-padding" id="wclsr-estimass-padding" value="'.$wclsr_estimass_padding_value.'" title="Number"  placeholder="0px">';?>
            </div>
            <div class="number-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Margin', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimass-margin" id="wclsr-estimass-margin" value="'.$wclsr_estimass_margin_value.'" title="Number"  placeholder="0px">';?>
            </div>
          </div>
          <div class="control_row">
            <label for="" class="wclsr_style_title"><?php echo esc_html__('Top title', 'wooc-click-share');?></label>
            <div class="color-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Color', 'wooc-click-share');?></label>
              <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba"  name="wclsr-estimdate-color" id="wclsr-estimdate-text" value="'.$wclsr_estimdate_color_value.'" title="Text">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Font Size', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimdate-fontsize" id="wclsr-estimdate-fontsize" value="'.$wclsr_estimdate_fontsize_value.'" title="10px"  placeholder="px, %, rem">';?>
            </div>
            <div class="number-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Font Weight', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimdate-fontweight" id="wclsr-estimdate-fontweight" value="'.$wclsr_estimdate_fontweight_value.'" title="Number"  placeholder="400">';?>
            </div>
            <div class="number-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Padding', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimdate-padding" id="wclsr-estimdate-padding" value="'.$wclsr_estimdate_padding_value.'" title="Number"  placeholder="0px">';?>
            </div>
            <div class="number-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Margin', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-estimdate-margin" id="wclsr-estimdate-margin" value="'.$wclsr_estimdate_margin_value.'" title="Number"  placeholder="0px">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Alignment', 'wooc-click-share');?></label>
              <select name="wclsr-toptitle-alignment" id="wclsr-toptitle-alignment">
                <option value="left" <?php selected($wclsr_estimdate_toptitle_alignment_value, 'left'); ?>><?php echo esc_html__('Left', 'wooc-click-share');?></option>
                <option value="center" <?php selected($wclsr_estimdate_toptitle_alignment_value, 'center'); ?>><?php echo esc_html__('Center', 'wooc-click-share');?></option>
                <option value="right" <?php selected($wclsr_estimdate_toptitle_alignment_value, 'right'); ?>><?php echo esc_html__('Right', 'wooc-click-share');?></option>
              </select>
            </div>
          </div>
          <div class="control_row">
          <label for="" class="wclsr_style_title"><?php echo esc_html__('Wrap', 'wooc-click-share');?></label>
            <div class="color-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Background Color', 'wooc-click-share');?></label>
              <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba"  name="wclsr-estimass-bgcolor" id="wclsr-estimass-text" value="'.$wclsr_estimass_bgcolor_value.'" title="Text">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Box Shadow', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-reason-box-shadow" id="wclsr-reason-box-shadow" value="'.$wclsr_reason_box_shadow_value.'" title="10px"  placeholder="0 0 10px rgb(104 104 104 / 50%)">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Border Radius', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-reason-border-radius" id="wclsr-reason-border-radius" value="'.$wclsr_reason_border_radius_value.'" title="10px"  placeholder="px, %, rem">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Alignment', 'wooc-click-share');?></label>
              <select name="wclsr-reason-fontsize" id="wclsr-reason-fontsize">
                <option value="left" <?php selected($wclsr_reason_fontsize_value, 'left'); ?>><?php echo esc_html__('Left', 'wooc-click-share');?></option>
                <option value="center" <?php selected($wclsr_reason_fontsize_value, 'center'); ?>><?php echo esc_html__('Center', 'wooc-click-share');?></option>
                <option value="right" <?php selected($wclsr_reason_fontsize_value, 'right'); ?>><?php echo esc_html__('Right', 'wooc-click-share');?></option>
              </select>
            </div>
          </div>
          <div class="control_row">
          <label for="" class="wclsr_style_title"><?php echo esc_html__('Hover Wrap', 'wooc-click-share');?></label>
            <div class="color-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Background Color', 'wooc-click-share');?></label>
              <?php echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba"  name="wclsr-estimass-Hbgcolor" id="wclsr-estimass-text" value="'.$wclsr_estimass_Hbgcolor_value.'" title="Text">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Box Shadow', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-reason-Hbox-shadow" id="wclsr-reason-Hbox-shadow" value="'.$wclsr_reason_Hbox_shadow_value.'" title="10px"  placeholder="0 0 10px rgb(104 104 104 / 50%)">';?>
            </div>
            <div class="text-control wclsr-style-style">
              <label for=""><?php echo esc_html__('Border Radius', 'wooc-click-share');?></label>
              <?php echo '<input type="text" name="wclsr-reason-Hborder-radius" id="wclsr-reason-Hborder-radius" value="'.$wclsr_reason_Hborder_radius_value.'" title="10px"  placeholder="px, %, rem">';?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
