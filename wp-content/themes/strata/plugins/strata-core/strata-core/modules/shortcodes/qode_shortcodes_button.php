<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Size</label>
            <select name="size" id="size">
                <option value="">Default</option>
                <option value="tiny">Tiny</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="big_large">Big Large</option>
            </select>
        </div>
        <div class="input">
            <label>Text</label>
            <input name="text" id="text" value="" />
        </div>
        <div class="input">
        <label>Icon</label>
            <select id="icon" name="icon">
                <option value=""></option>
                <?php
                $fa_icons = strata_qode_get_font_awesome_icon_array();
                foreach ($fa_icons as $key => $value) {
                ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($key); ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="input">
            <label>Icon Size</label>
            <select name="icon_size" id="icon_size">
                <option value=""></option>
                <option value="fa-lg">Tiny</option>
                <option value="fa-2x">Small</option>
                <option value="fa-3x">Medium</option>
                <option value="fa-4x">Large</option>
                <option value="fa-5x">Very Large</option>
            </select>
        </div>
        <div class="input">
            <label>Icon Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label>Link</label>
            <input name="link" id="link" value="" size="55" />
        </div>
        <div class="input">
            <label>Target</label>
            <select name="target" id="target">
                <option value="_self">Self</option>
                <option value="_blank">Blank</option>
                <option value="_parent">Parent</option>
                <option value="_top">Top</option>
            </select>
        </div>
        <div class="input">
            <label>Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="color" id="color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Top Gradient Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="top_gradient_color" id="top_gradient_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Bottom Gradient Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="bottom_gradient_color" id="bottom_gradient_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Border Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Font Style</label>
            <select name="font_style" id="font_style">
                <option value=""></option>
                <option value="normal">Normal</option>
                <option value="italic">Italic</option>
            </select>
        </div>
        <div class="input">
            <label>Font Weight</label>
            <select name="font_weight" id="font_weight">
                <option value=""></option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                <option value="500">500</option>
                <option value="600">600</option>
                <option value="700">700</option>
                <option value="800">800</option>
                <option value="900">900</option>
            </select>
        </div>
        <div class="input">
            <label>Text Align</label>
            <select name="text_align" id="text_align">
                <option value=""></option>
                <option value="left">Left</option>
                <option value="right">Right</option>
                <option value="center">Center</option>
            </select>
        </div>
		 <div class="input">
            <label>Margin</label>
            <input name="margin" id="margin" value="" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>
<script type="text/javascript">
    colorPicker();
</script>