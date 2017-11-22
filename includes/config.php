<?php
/**
 * Extra settings for field type
 */
?>
<div class="caldera-config-group">
	<label for="{{_id}}_default">
		<?php esc_html_e( 'Fallback currency value (e.g. 7.5 for EUR), use comma(,) as delimiter', 'cf-hnb-currency' ); ?>
	</label>
	<div class="caldera-config-field">
		<input type="text" id="{{_id}}_default" class="block-input field-config magic-tag-enabled required"
		       name="{{_name}}[default]" value="{{default}}" required>
	</div>
</div>

<div class="caldera-config-group">
	<label for="{{_id}}_hnb-currency">
		<?php esc_html_e( 'Currency', 'cf-hnb-currency' ); ?></label>
	<div class="caldera-config-field">
		<select id="{{_id}}_hnb-currency" class="block-input field-config" name="{{_name}}[hnb-currency]">
		  <option value="AUD" {{#is hnb-currency value="AUD"}}selected="selected"{{/is}}>AUD</option>
		  <option value="CAD" {{#is hnb-currency value="CAD"}}selected="selected"{{/is}}>CAD</option>
		  <option value="CZK" {{#is hnb-currency value="CZK"}}selected="selected"{{/is}}>CZK</option>
		  <option value="DKK" {{#is hnb-currency value="DKK"}}selected="selected"{{/is}}>DKK</option>
		  <option value="HUF" {{#is hnb-currency value="HUF"}}selected="selected"{{/is}}>HUF</option>
		  <option value="JPY" {{#is hnb-currency value="JPY"}}selected="selected"{{/is}}>JPY</option>
		  <option value="NOK" {{#is hnb-currency value="NOK"}}selected="selected"{{/is}}>NOK</option>
		  <option value="SEK" {{#is hnb-currency value="SEK"}}selected="selected"{{/is}}>SEK</option>
		  <option value="CHF" {{#is hnb-currency value="CHF"}}selected="selected"{{/is}}>CHF</option>
		  <option value="GBP" {{#is hnb-currency value="GBP"}}selected="selected"{{/is}}>GBP</option>
		  <option value="USD" {{#is hnb-currency value="USD"}}selected="selected"{{/is}}>USD</option>
		  <option value="EUR" {{#is hnb-currency value="EUR"}}selected="selected"{{/is}}>EUR</option>
		  <option value="PLN" {{#is hnb-currency value="PLN"}}selected="selected"{{/is}}>PLN</option>
		</select>
	</div>
</div>

<div class="caldera-config-group">
	<label for="{{_id}}_hnb-currency-type">
		<?php esc_html_e( 'Currency type', 'cf-hnb-currency-type' ); ?></label>
	<div class="caldera-config-field">
		<select id="{{_id}}_hnb-currency-type" class="block-input field-config" name="{{_name}}[hnb-currency-type]">
		  <option value="srednji_tecaj" {{#is hnb-currency-type value="srednji_tecaj"}}selected="selected"{{/is}}>Average rate</option>
		  <option value="kupovni_tecaj" {{#is hnb-currency-type value="kupovni_tecaj"}}selected="selected"{{/is}}>Buy rate</option>
		  <option value="prodajni_tecaj" {{#is hnb-currency-type value="prodajni_tecaj"}}selected="selected"{{/is}}>Sell rate</option>
		</select>
	</div>
</div>

<div class="caldera-config-group">
	<label for="{{_id}}_before">
		<?php esc_html_e( 'Before Text', 'cf-hnb-currency' ); ?></label>
	<div class="caldera-config-field">
		<input type="text" id="{{_id}}_before" class="block-input field-config" name="{{_name}}[before]"
		       value="{{before}}">
	</div>
</div>

<div class="caldera-config-group">
	<label for="{{_id}}_after">
		<?php esc_html_e( 'After Text', 'cf-hnb-currency' ); ?></label>
	<div class="caldera-config-field">
		<input type="text" id="{{_id}}_after" class="block-input field-config" name="{{_name}}[after]"
		       value="{{after}}">
	</div>
</div>