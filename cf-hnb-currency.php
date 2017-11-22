<?php
/**
 * Plugin Name: Caldera Forms HNB Currency Field
 * Description: Use any currency value from HNB.hr as Caldera Forms field
 * Version:     1.0.0
 * Author:      Robert Kavgic
 * Author URI:  https://simple-code.hr
 * Text Domain: cf-hnb-currency
 */

/**
 * Full path to this directory
 *
 * Use to set path to template files
 *
 * @since 0.1.0
 */
define('CF_HNB_FIELD_PATH', plugin_dir_path(__FILE__));

add_action( 'caldera_forms_includes_complete', 'cf_hnb_field_init' );

/**
 * Load plugin
 *
 * @since 0.1.0
 *
 * @uses "caldera_forms_includes_complete" action
 */
function cf_hnb_field_init(){
    add_filter( 'caldera_forms_get_field_types', 'cf_hnb_field_init_field', 15 );
}


/**
 * Add custom field type
 *
 * @since 0.1.0
 *
 * @uses "caldera_forms_get_field_types" filter
 *
 * @param array $fields
 *
 * @return array
 */
function cf_hnb_field_init_field( $fields ){
    $fields[ 'hnb-currency' ]             = array(
        "field"       => __( 'HNB Currency', 'cf-hnb-currency' ),
        "description" => __( 'HNB.hr Currency field', 'cf-hnb-currency' ),
        "file"        => CF_HNB_FIELD_PATH . "/includes/field.php",
        "category"    => __( 'Special', 'caldera-forms' ),
        "setup"       => array(
            "template" => CF_HNB_FIELD_PATH . "/includes/config.php",
            "preview"  => CF_HNB_FIELD_PATH . "/includes/preview.php"
        ),

    );

    return $fields;
}

/**
 * Find total for field, use in field template to display value
 *
 * @since 0.1.0
 *
 * @param array $field Field config
 * @param array $form Form config
 *
 * @return bool|int
 */
function cf_hnb_field_get_hnb_field( array $field, array $form ){
    $field_id = ! empty( $field[ 'config' ][ 'hnb-currency' ] ) ? strip_tags( $field[ 'config' ][ 'hnb-currency' ] ) : null;
    if( $field_id ) {
        return cf_hnb_field_get_currency( $field );
    } else {
        return Caldera_Forms_Field_Util::get_default( $field, $form, true );
    }

}

/**
 * Get active currency value
 *
 * @since 0.1.0
 *
 * @param string $field Field array
 *
 * @return int
 */
function cf_hnb_field_get_currency( $field ) {
    $chosen_currency_name = $field[ 'config' ][ 'hnb-currency' ];
    $chosen_currency_type = $field[ 'config' ][ 'hnb-currency-type' ];
    $currency_default = $field[ 'config' ][ 'default' ];

    $currency_arr = cf_cURL_execute( $chosen_currency_name, $currency_default );
    $currency_val = $currency_default;

    if ( is_array( $currency_arr ) && count( $currency_arr ) !== 0 ) {
        $currency_val = $currency_arr[0][ $chosen_currency_type ];
    }

    return $currency_val;
}

/**
 * Execute cURL
 * @param  string $chosen_currency Chosen currency name according to HNB
 * @param  int    $fallback_value  Currency fallback value
 * @return int                     Chosen currency value from HNB.hr
 */
function cf_cURL_execute( $chosen_currency = "EUR", $fallback_value ) {
    // HNB API URL
    $api_url = "http://api.hnb.hr/tecajn?valuta=$chosen_currency";
    // cURL init
    $ch = curl_init( $api_url );
    // Set cURL options
    $curl_opts = array(
        CURLOPT_POST => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        )
    );
    curl_setopt_array( $ch, $curl_opts );
    // Send the request
    $response = curl_exec( $ch );
    // Check for errors
    if ( !$response ) {
        $response = $fallback_value;
    } else {
        // Decode the response
        $response = json_decode( $response, true );
        // Check if response is an array and it's length equals to 1
        if ( !is_array( $response ) || count( $response ) !== 1 ) {
            $response = $fallback_value;
        }
    }

    return $response;
}