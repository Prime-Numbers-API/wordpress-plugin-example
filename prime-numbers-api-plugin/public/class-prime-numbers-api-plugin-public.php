<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    prime_numbers_api_Plugin
 * @subpackage prime_numbers_api_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    prime_numbers_api_Plugin
 * @subpackage prime_numbers_api_Plugin/public
 * @author     Your Name <email@example.com>
 */
class prime_numbers_api_Plugin_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $prime_numbers_api_plugin    The ID of this plugin.
	 */
	private $prime_numbers_api_plugin;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $prime_numbers_api_plugin       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $prime_numbers_api_plugin, $version ) {

		$this->prime_numbers_api_plugin = $prime_numbers_api_plugin;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in prime_numbers_api_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The prime_numbers_api_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->prime_numbers_api_plugin, plugin_dir_url( __FILE__ ) . 'css/prime-numbers-api-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in prime_numbers_api_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The prime_numbers_api_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->prime_numbers_api_plugin, plugin_dir_url( __FILE__ ) . 'js/prime-numbers-api-plugin-public.js', array( 'jquery' ), $this->version, false );

	}

	
	
	public function public_is_this_number_prime() {
		
		function console_log($output, $with_script_tags = true) {
			$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
			if ($with_script_tags) {
				$js_code = '<script>' . $js_code . '</script>';
			}
			echo $js_code;
		}

		//get general settings
		$user_api_key = get_option( 'api_key' );
		$user_include_explanations = strtolower(get_option( 'include_explanations' ));
		$user_include_prime_types_list = strtolower(get_option( 'include_prime_types_list' ));
		$user_language = strtolower(get_option( 'language' ));
		$user_is_prime = get_option( 'is_this_number_prime' );
		$user_get_random_prime = get_option( 'get_random_prime' );
		$user_get_primes_between_two_numbers = get_option( 'get_primes_between_two_numbers' );
		$user_prospect_primes = get_option( 'prospect_primes' );
		$user_get_isolated_random_prime = get_option( 'get_isolated_random_prime' );

		if ($user_is_prime == "1") {
				$url = 'http://api.prime-numbers.io/is-this-number-prime.php?key=' . $user_api_key . '&number=41' . '&include_explanations=' . $user_include_explanations . '&include_prime_types_list=' . $user_include_prime_types_list . '&language=' . $user_language;
				console_log($url);
				$arguments = array(
					'method' => 'GET',
					'timeout' => '12'
				);
			
				$response = wp_remote_get( $url, $arguments );
				// console_log($response);
				if ( is_wp_error( $response ) ) {
					$error_message = $response->get_error_message();
					return "Something went wrong: $error_message";
				} else {
					
					$results = json_decode( wp_remote_retrieve_body( $response ) );
					// var_dump($results);
			
					if (is_array($results) || is_object($results)) {
						foreach ($results as $key => $value) {
									$html .= $key . ': ';
									// console_log($results);
									
								  if (is_string($value) || is_integer($value)) {
									// console_log("hello there");
									$html .= $value . ', ';
			
							} else if (is_array($value) || is_object($value)) {
									foreach ($value as $nestedKey => $nestedValue) {
											$html .= $nestedKey . ': ';
											$html .= $nestedValue . ', ';
								}
							} 
						}
							return $html;
					}	else {
						$html .= "Unfortunately, an error occured.";
						return $html;
					}
			
			
				}
				
		} else {
			$html .= "'Is This Number Prime' Request Not Selected in Plugin Settings. ";
			return $html;
		}




	}



	public function public_get_random_prime() {
		//get general settings
		$user_api_key = get_option( 'api_key' );
		$user_include_explanations = strtolower(get_option( 'include_explanations' ));
		$user_include_prime_types_list = strtolower(get_option( 'include_prime_types_list' ));
		$user_language = strtolower(get_option( 'language' ));
		$user_is_prime = get_option( 'is_this_number_prime' );
		$user_get_random_prime = get_option( 'get_random_prime' );
		$user_get_primes_between_two_numbers = get_option( 'get_primes_between_two_numbers' );
		$user_prospect_primes = get_option( 'prospect_primes' );
		$user_get_isolated_random_prime = get_option( 'get_isolated_random_prime' );

		if ($user_get_random_prime == "1") {
			$html = '';
			$url = 'http://api.prime-numbers.io/get-random-prime.php?key=' . $user_api_key . '&include_explanations=' . $user_include_explanations . '&include_prime_types_list=' . $user_include_prime_types_list . '&language=' . $user_language;
			
			$arguments = array(
				'method' => 'GET',
				'timeout' => '12'
			);
			
			$response = wp_remote_get( $url, $arguments );
			
			if ( is_wp_error( $response ) ) {
				$error_message = $response->get_error_message();
				return "Something went wrong: $error_message";
			} else {
					$results = json_decode( wp_remote_retrieve_body( $response ) );	
					
					if (is_array($results) || is_object($results)) {
						foreach ($results as $key => $value) {
									$html .= $key . ': ';
									// console_log($results);
									
								  if (is_string($value) || is_integer($value)) {
									// console_log("hello there");
									$html .= $value . ', ';
		
							} else if (is_array($value) || is_object($value)) {
									foreach ($value as $nestedKey => $nestedValue) {
											$html .= $nestedKey . ': ';
											$html .= $nestedValue . ', ';
								}
							} 
						}
							return $html;
					}	else {
						$html .= "Unfortunately, an error occured.";
						return $html;
					}
				}	
				
		} else {
			$html .= "'Get Random Prime' Request Not Selected in Plugin Settings. ";
			return $html;
		}




	}



	public function public_get_primes_between_two_numbers() {
		//get general settings
		$user_api_key = get_option( 'api_key' );
		$user_include_explanations = strtolower(get_option( 'include_explanations' ));
		$user_include_prime_types_list = strtolower(get_option( 'include_prime_types_list' ));
		$user_language = strtolower(get_option( 'language' ));
		$user_is_prime = get_option( 'is_this_number_prime' );
		$user_get_random_prime = get_option( 'get_random_prime' );
		$user_get_primes_between_two_numbers = get_option( 'get_primes_between_two_numbers' );
		$user_prospect_primes = get_option( 'prospect_primes' );
		$user_get_isolated_random_prime = get_option( 'get_isolated_random_prime' );

		if ($user_get_primes_between_two_numbers == "1") {
			$url = 'http://api.prime-numbers.io/get-all-primes-between-two-numbers.php?key=' . $user_api_key . '&start=350&end=1000' . '&include_explanations=' . $user_include_explanations . '&include_prime_types_list=' . $user_include_prime_types_list . '&language=' . $user_language;
	
			$arguments = array(
				'method' => 'GET',
				'timeout' => '12'
			);

			$response = wp_remote_get( $url, $arguments );

			if ( is_wp_error( $response ) ) {
				$error_message = $response->get_error_message();
				return "Something went wrong: $error_message";
			} else {
				
				$results = json_decode( wp_remote_retrieve_body( $response ) );
				// var_dump($results);
				if (is_array($results)) {
					foreach ($results as $key => $value) {
						// console_log($results);
						if (is_object($value)) {
							// console_log($value);
							foreach ($value as $nestedObjectKey => $nestedObjectValue) {
								if (is_string($nestedObjectKey) || is_integer($nestedObjectKey)) {
									// console_log("hello there");
									$html .= $nestedObjectKey . ': ';

								} if (is_string($nestedObjectValue) || is_integer($nestedObjectValue)) {
									// console_log("hello there");
									$html .= $nestedObjectValue . ', ';

								} if (is_object($nestedObjectValue)) {
									foreach ($nestedObjectValue as $doubleNestedKey => $doulbeNestedValue) {
										$html .= $doubleNestedKey . ': ';
										$html .= $doulbeNestedValue . ', ';
									}
								}
							}
						} 
					}
						return $html;
				}	else {
					$html .= "Unfortunately, an error occured.";
					return $html;
				}


			}	
				
		} else {
			$html .= "'Get All Primes Between Two Numbers' Request Not Selected in Plugin Settings. ";
			return $html;
		}




	}


	public function public_prospect_primes() {
		//get general settings
		$user_api_key = get_option( 'api_key' );
		$user_include_explanations = strtolower(get_option( 'include_explanations' ));
		$user_include_prime_types_list = strtolower(get_option( 'include_prime_types_list' ));
		$user_language = strtolower(get_option( 'language' ));
		$user_is_prime = get_option( 'is_this_number_prime' );
		$user_get_random_prime = get_option( 'get_random_prime' );
		$user_get_primes_between_two_numbers = get_option( 'get_primes_between_two_numbers' );
		$user_prospect_primes = get_option( 'prospect_primes' );
		$user_get_isolated_random_prime = get_option( 'get_isolated_random_prime' );

		if ($user_prospect_primes == "1") {

			$url = 'http://api.prime-numbers.io/prospect-primes-between-two-numbers.php?key=' . $user_api_key . '&start=350&end=1000' . '&include_explanations=' . $user_include_explanations . '&include_prime_types_list=' . $user_include_prime_types_list . '&language=' . $user_language;
			
			$arguments = array(
				'method' => 'GET',
				'timeout' => '12'
			);
		
			$response = wp_remote_get( $url, $arguments );
		
			if ( is_wp_error( $response ) ) {
				$error_message = $response->get_error_message();
				return "Something went wrong: $error_message";
			} else {
				
				$results = json_decode( wp_remote_retrieve_body( $response ) );
				// var_dump($results);
		
				if (is_array($results) || is_object($results)) {
					foreach ($results as $key => $value) {
								$html .= $key . ': ';
								// console_log($results);
								
							  if (is_string($value) || is_integer($value)) {
								// console_log("hello there");
								$html .= $value . ', ';
		
						} else if (is_array($value) || is_object($value)) {
								foreach ($value as $nestedKey => $nestedValue) {
										$html .= $nestedKey . ': ';
										$html .= $nestedValue . ', ';
							}
						} 
					}
						return $html;
				}	else {
					$html .= "Unfortunately, an error occured.";
					return $html;
				}
			}
		} else {
			$html .= "'Prospect Primes' Request Not Selected in Plugin Settings. ";
			return $html;
		}




	}






	public function public_get_isolated_random_prime() {
		//get general settings
		$user_api_key = get_option( 'api_key' );
		$user_include_explanations = strtolower(get_option( 'include_explanations' ));
		$user_include_prime_types_list = strtolower(get_option( 'include_prime_types_list' ));
		$user_language = strtolower(get_option( 'language' ));
		$user_is_prime = get_option( 'is_this_number_prime' );
		$user_get_random_prime = get_option( 'get_random_prime' );
		$user_get_primes_between_two_numbers = get_option( 'get_primes_between_two_numbers' );
		$user_prospect_primes = get_option( 'prospect_primes' );
		$user_get_isolated_random_prime = get_option( 'get_isolated_random_prime' );

		if ($user_get_isolated_random_prime == "1") {

			$url = 'http://api.prime-numbers.io/get-isolated-random-prime.php?key=' . $user_api_key . '&include_explanations=' . $user_include_explanations . '&include_prime_types_list=' . $user_include_prime_types_list . '&language=' . $user_language;
			
			$arguments = array(
				'method' => 'GET',
				'timeout' => '25'
			);
		
			$response = wp_remote_get( $url, $arguments );
		
			if ( is_wp_error( $response ) ) {
				$error_message = $response->get_error_message();
				return "Something went wrong: $error_message";
			} else {
				
				$results = json_decode( wp_remote_retrieve_body( $response ) );
				// var_dump($results);
				if (is_array($results) || is_object($results)) {
					foreach ($results as $key => $value) {
								$html .= $key . ': ';
								// console_log($results);
								
							  if (is_string($value) || is_integer($value)) {
								// console_log("hello there");
								$html .= $value . ', ';
		
						} else if (is_array($value) || is_object($value)) {
								foreach ($value as $nestedKey => $nestedValue) {
										$html .= $nestedKey . ': ';
										$html .= $nestedValue . ', ';
							}
						} 
					}
						return $html;
				}	else {
					$html .= "Unfortunately, an error occured.";
					return $html;
				}
			}
		} else {
			$html .= "'Get Isolated Random Prime' Request Not Selected in Plugin Settings. ";
			return $html;
		}




	}





















}
