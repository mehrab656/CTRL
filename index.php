<?php

use Order\CTRL\EndPointList;

/**
 * Plugin Name: CTRL
 */

class OrderCTRL{
	private static $instance;

	public static function get_instance(){
		if (null===self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		EndPointList::get_instance();
		add_action( 'admin_menu', [$this,'ctrl_register_menu_item'] );
		add_action( 'admin_menu', [$this,'ctrl_reister_endpoint_page'] );
	}

	function ctrl_register_menu_item() {
		add_menu_page(
			__( 'Order CTRL' ),
			'Order CTRL',
			'manage_options',
			'api-order-ctrl',
			[$this,'ctrl_custom_page'],
			'dashicons-cart',
			6
		);
	}
	function ctrl_reister_endpoint_page(){
		add_submenu_page( 'api-order-ctrl', 'EndPoints', 'End Points', 'manage_options', 'api-endpoints-list', [$this,'ctrl_endpoint_lists'], 7 );
	}
	function ctrl_endpoint_lists(){

	}


	/**
	 * Display a custom menu page
	 */
	function ctrl_custom_page() {
		?>
		<div class="wrap">
			<h1><?= __( 'Order CTRL' ) ?></h1>
			<div class="ajax-response"></div>
			<p><?= __( 'Add Your Api Credential From Woo Commerce Settings' ) ?></p>
			<div class="col-6">
				<form method="post" name="authTokenForm" id="authTokenForm" class="validate" novalidate="novalidate">
					<table class="form-table" role="presentation">
						<tbody>
						<tr class="form-field form-required">
							<th scope="row">
								<label for="consumerKey">Consumer Key:</label>
							</th>
							<td>
								<input name="consumerKey" type="text" id="consumerKey" value="" aria-required="true"
								       autocapitalize="none" autocorrect="off">
							</td>
						</tr>
						<tr class="form-field form-required">
							<th scope="row"><label for="secret">Consumer Secret:</th>
							<td><input name="secret" type="password" id="secret" value=""></td>
						</tr>


						</tbody>
					</table>


					<p class="submit">
						<input type="submit" name="addToken" id="addToken" class="button button-primary right"
						       value="Add Token"></p>
				</form>

			</div>
		</div>
		<?php
	}
}

OrderCTRL::get_instance();








