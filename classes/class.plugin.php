<?php
/**
 * The main class for the plugin
 */

namespace LVL99\WCSSR;

if ( ! defined( 'ABSPATH' ) )
{
  exit;
}

class Plugin {
  /**
   * Whether instance is instantiated or not
   *
   * @var bool
   */
  private $instantiated = FALSE;

  /**
   * Track if honeypot trap is sprung
   *
   * @var bool
   */
  private $paw_in_the_honeypot = FALSE;

  /**
   * Plugin constructor.
   */
  public function __construct ()
  {
    // Initialise actions & filters
    add_action( 'woocommerce_register_form', [ $this, 'woocommerce_register_form' ] );
    add_action( 'wp_loaded', [ $this, 'check_honeypot_trap_sprung' ], 1 );
    add_filter( 'woocommerce_registration_errors', [ $this, 'check_honeypot_trap_sprung_errors' ], 1, 3 );

    // Mark instantiated
    $this->instantiated = TRUE;
  }

  /**
   * Put in a honeypot trap in the customer registration form to fool automated registration bots
   *
   * @hooked woocommerce_register_form_end
   */
  public function woocommerce_register_form ()
  {
    ?>
<div class="form-row" style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;" aria-hidden="true">
  <label for="emailaddress">
    <?php _e( 'Email address', 'woocommerce' ); ?>
  </label>
  <input type="email" id="emailaddress" name="emailaddress" value="" tabindex="-1" autocomplete="off" class="input-field" />
</div>
<?php
  }

  /**
   * Check if honeypot trap has value, if so save it to temp space to reject in registration process
   *
   * @hooked wp_loaded
   * @priority 1
   */
  public function check_honeypot_trap_sprung ()
  {
    if ( ! empty( $_POST ) && ! empty( $_POST['register'] ) && array_key_exists( 'emailaddress', $_POST ) && ! empty( $_POST['emailaddress'] ) )
    {
      $this->paw_in_the_honeypot = TRUE;
    }

    // WooCommerce will do all its own other stuff following this...
  }

  /**
   * Return an error if the honeypot trap was sprung
   *
   * @hooked woocommerce_registration_errors
   * @param \WP_Error $errors
   * @param string $username
   * @param string $email
   * @returns \WP_Error
   */
  public function check_honeypot_trap_sprung_errors ( $errors, $username, $email )
  {
    if ( $this->paw_in_the_honeypot )
    {
      $errors = new \WP_Error( 'registration-error-invalid-email', __( 'Please provide a valid email address.', 'woocommerce' ) );
      error_log( '[LVL99-WCSSR] A spam registration was detected: ' . $username . ' <' . $email . '>' );
    }

    return $errors;
  }
}
