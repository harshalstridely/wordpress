<?php

$args = array(
    "columns"         => "four_columns"
);

$html = "";

extract(shortcode_atts($args, $atts));

$html = '<div class="qode_clients clearfix '.$columns.'">';

$html .= do_shortcode($content);

$html .= '</div>';

echo strata_qode_get_module_part($html);