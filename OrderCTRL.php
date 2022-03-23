<?php

namespace Order\CTRL;

class OrderCTRL {
	private static $instance;

	public static function get_instance() {
		if (null===self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct() {
		add_action( 'admin_notices', [ $this, 'admin_notice' ] );

		add_action( 'admin_menu', [$this,'ctrl_register_menu_item'] );
		add_action( 'admin_menu', [$this,'ctrl_register_endpoint_page'] );
		add_action( 'admin_init', [ $this, 'handle_post' ] );

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
	function ctrl_register_endpoint_page(){
		add_submenu_page( 'api-order-ctrl', 'EndPoints', 'End Points', 'manage_options', 'api-endpoints-list', [$this,'ctrl_endpoint_lists'], 7 );
	}
    public function get_page_url():string {
        return admin_url('admin.php?page=api-order-ctrl');
    }
    function handle_post(){
        if (isset($_POST['order-ctrl-settings-save'])){
	        $this->get_previous_keys();
            $secret = isset($_POST['secret'])?sanitize_text_field($_POST['secret']):null;
            $key = isset($_POST['consumerKey'])?sanitize_text_field($_POST['consumerKey']):null;
            $newKeys = [
                    'secret'=>$secret,
                    'key'=>$key,
            ];
	        if ( $secret && ! $key || $key && ! $secret ) {
		        $this->add_settings_status( __( 'Both Consumer key & Consumer secret required.' ), 'error' );
	        }else{
                if ($secret && $key){
                    if ($newKeys===$this->loadkeys){
                        $this->add_settings_status(__('Nothing Has been Changed'),'error');
                    }else{
                        $this->loadkeys = $newKeys;
                        update_option('order_ctrl_api_keys',$newKeys);
                        $this->add_settings_status('Api Connected','success');
	                    wp_safe_redirect($this->get_page_url());

                    }
                }

            }

        }

    }
    private $loadkeys;
    function get_previous_keys(){
        if (null===$this->loadkeys){
            $keys = get_option('order_ctrl_api_keys',[]);
            if (isset($keys)){
                $this->loadkeys = $keys;
            }
        }
        return $this->loadkeys;
    }
	protected function add_settings_status( $message, $type = 'success' ) {
		$data = get_transient( 'rwp-setting-status' );
		if ( ! $data ) {
			$data = [];
		}
		$hash = md5( $message . $type );
		$data[ $hash ] = [ $message, $type ];

		set_transient( 'rwp-setting-status', $data, 60 );
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
                <form method="post" action="<?php echo esc_url( $this->get_page_url() ); ?>">
					<table class="form-table" role="presentation">
						<tbody>
                        <tr>
                            <th scope="row">
                                <label for="consumerKey">Consumer Key:</label>
                            </th>
                            <td>
                                <input name="consumerKey" type="text" id="consumerKey"  class="regular-text" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="secret">Consumer Secret:</th></th>
                            <td><input name="secret" type="password" id="secret" class="regular-text" autocomplete="off"></td>
                        </tr>

						</tbody>
					</table>

					<p class="submit">
						<?php submit_button( __( 'Save Changes', 'order-ctrl' ), 'primary', 'order-ctrl-settings-save' ); ?>

                </form>

			</div>
		</div>
		<?php
	}

    function admin_notice(){
	    $needSetup = $this->check_setup();
        if (true===$needSetup){
            ?>
            <div class="notice notice-<?= __('Notice'); ?>">
                <p><?= __('Provide Consumer Keys and Secret from Woo Commerce Settings') ?></p>
            </div>
<?php
        }
    }
    function check_setup():bool {
        $apiKeys = get_option('order_ctrl_api_keys',[]);
        if (empty($apiKeys)){
            update_option('order_ctrl_setup_needed','false');
        }
        return false;
    }
}