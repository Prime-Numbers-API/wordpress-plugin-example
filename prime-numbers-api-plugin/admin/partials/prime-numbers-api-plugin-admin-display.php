<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    prime_numbers_api_Plugin
 * @subpackage prime_numbers_api_Plugin/admin/partials
 */
?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). './css/prime-numbers-api-plugin-admin.css' ?>">

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="bg-light p-5 rounded-lg m-3">
    <h1 class="display-4">Prime Numbers API Dashboard</h1>
    <hr>

    <div class="container">
      <div class="row">


        <div class="col-8 left-column"><!-- column 1 of 2 -->

          <div class="card text-center featured-card">
            <div class="card-header">
              Featured News
            </div>
            <div class="card-body">
              <h5 class="card-title">Prime Numbers Launched!</h5>
              <p class="card-text">Subscribe to our API and take full advantage of the largest database of Prime Numbers in the world!</p>
              <a href="http://prime-numbers-api.com/" target="_blank" class="btn btn-primary">Let's Go!</a>
            </div>
          </div>

          <hr>

            <div class="card get-started-card">
              <h5 class="card-header">Getting Started</h5>
              <div class="card-body">
                <h5 class="card-title">Welcome to the Prime Numbers API!</h5>
                <p class="card-text">By default you have access to our basic enpoints: <strong>Get Random Prime</strong> and <strong>Is This Number Prime</strong>. You should start by entering your <u>API Key</u> below in the <strong>Plugin Settings</strong>, then head over to the <a href="http://localhost/localsite/blog/" target="_blank" class="text-decoration-none">blog posts</a> to see real time outputs from your enabled requests! Check out our <strong><a href="http://prime-numbers-api.com/" target="_blank" class="text-decoration-none link-danger">Premium</a></strong> upgrade options for access to exclusive endpoints. Whether you're an educator <strong>prospecting</strong> for specific primes, a scientist or engineer in need of <strong>all the primes between two numbers</strong>, or searching for <strong>isolated primes</strong> to meet your security needs, <strong><a href="http://prime-numbers-api.com/" target="_blank" class="text-decoration-none">Prime Numbers API</a></strong> has something for you! Our database now has over 5 billion primes and counting!</p>
              </div>
            </div>

            <hr>
            
            <div class="card settings-card">
              <h3 class="card-header h3">Plugin Settings</h3>
              <form method="post" action="options.php" class="plugin-settings">
                  <?php
                  settings_fields( "get_prime_settings" );
                  do_settings_sections( "get_prime_settings" );
                  ?>
                <div class="card-body">
                  <div class="form-group api-form">
                    <label for="exampleFormControlInput1"><strong>API Key:</strong></label>
                    <input type="number" name="api_key" value="<?php echo get_option( 'api_key' ); ?>" class="form-control" id="exampleFormControlInput1" placeholder="Ex: YOUR_API_KEY" required>
                  </div>
                  <br>
                  <div class="form-group select-settings">
                    <label for="include_explanations"><strong>Include Explanations:</strong></label>
                    <select class="form-control" id="include_explanations" name="include_explanations">
                      <option <?php if(get_option('include_explanations') == 'False') { echo( 'selected' );} ?>>False</option>
                      <option <?php if(get_option('include_explanations') == 'True') { echo( 'selected' );} ?>>True</option>
                    </select>
                    <br>
                    <label for="include_prime_types_list"><strong>Include Prime Types List:</strong></label>
                    <select class="form-control" id="include_prime_types_list" name="include_prime_types_list">
                      <option <?php if(get_option('include_prime_types_list') == 'False') { echo( 'selected' );} ?>>False</option>
                      <option <?php if(get_option('include_prime_types_list') == 'True') { echo( 'selected' );} ?>>True</option>
                    </select>
                    <br>
                    <label for="language"><strong>Select Language:</strong></label>
                    <select class="form-control" id="language" name="language">
                      <option <?php if(get_option('language') == 'English') { echo( 'selected' );} ?>>English</option>
                      <option <?php if(get_option('language') == 'Mandarin') { echo( 'selected' );} ?>>Mandarin</option>
                      <option <?php if(get_option('language') == 'Hindi') { echo( 'selected' );} ?>>Hindi</option>
                      <option <?php if(get_option('language') == 'Spanish') { echo( 'selected' );} ?>>Spanish</option>
                      <option <?php if(get_option('language') == 'French') { echo( 'selected' );} ?>>French</option>
                      <option <?php if(get_option('language') == 'German') { echo( 'selected' );} ?>>German</option>
                      <option <?php if(get_option('language') == 'Italian') { echo( 'selected' );} ?>>Italian</option>
                      <option <?php if(get_option('language') == 'Japanese') { echo( 'selected' );} ?>>Japanese</option>
                      <option <?php if(get_option('language') == 'Russian') { echo( 'selected' );} ?>>Russian</option>
                    </select>
                    <br>
                  </div>
                  <label for="endpointInput"><strong>Endpoint Selection:</strong></label>
                  <div class="form-group checkbox-form">
                    <input class="form-check-input" type="checkbox" name="is_this_number_prime" value="1" <?php checked(1, get_option('is_this_number_prime'), true); ?> id="defaultCheck1 endpointInput">
                    <label class="form-check-label" for="defaultCheck1">
                      Is This Number Prime
                    </label>
                  </div>
                  <div class="form-group checkbox-form">
                    <input class="form-check-input" type="checkbox" name="get_random_prime" value="1" <?php checked(1, get_option('get_random_prime'), true); ?> id="defaultCheck2 endpointInput">
                    <label class="form-check-label" for="defaultCheck2">
                      Get Random Prime
                    </label>
                  </div>
                  <div class="form-group checkbox-form">
                    <input class="form-check-input" type="checkbox" name="get_primes_between_two_numbers" value="1" <?php checked(1, get_option('get_primes_between_two_numbers'), true); ?> id="defaultCheck3 endpointInput">
                    <label class="form-check-label" for="defaultCheck3">
                      Get All Primes Between Two Numbers
                    </label>
                  </div>
                  <div class="form-group checkbox-form">
                    <input class="form-check-input" type="checkbox" name="prospect_primes" value="1" <?php checked(1, get_option('prospect_primes'), true); ?> id="defaultCheck4 endpointInput">
                    <label class="form-check-label" for="defaultCheck4">
                      Prospect Primes Between Two Numbers
                    </label>
                  </div>
                  <div class="form-group checkbox-form">
                    <input class="form-check-input" type="checkbox" name="get_isolated_random_prime" value="1" <?php checked(1, get_option('get_isolated_random_prime'), true); ?> id="defaultCheck5 endpointInput">
                    <label class="form-check-label" for="defaultCheck5">
                      Get Isolated Random Prime
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Submit Settings</button>
                </div>
              </form>
            </div>

        </div>


        <div class="col-4 right-column"><!-- column 2 of 2 -->

          <div class="card" >
            <div class="card-header">
              <h5>Premium Version</h5> 
            </div>
            <p class="lead">
            Upgrade to the premium version and get the following features:
            </p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Refresh your API key when you need it</li>
              <li class="list-group-item">Increased maximum calls and call frequency</li>
              <li class="list-group-item">Access to our premium endpoints</li>
              <li class="list-group-item">Help centre and support tickets</li>
              <li class="list-group-item">And much more...</li>
            </ul>
            <div class="card-footer">
            <a href="http://prime-numbers-api.com/" target="_blank" class="btn btn-primary">Upgrade</a>
            </div>
          </div>

          <hr>
          <div class="card" >
            <div class="card-header">
              <h5>Shortcode Settings</h5> 
            </div>
            <p class="lead">
            Some attributes are specific to certain endpoints.  You may customize these attributes to your liking.  For example, the <strong>Is This Number Prime</strong> endpoint uses <strong>number</strong> which equals <strong>41</strong> by default.  If you head over to the <strong>Posts</strong> page and select <strong>Is This Number Prime</strong>, you can see: <br><code>[is_this_number_prime_shortcode number="41"]</code><br> Enter the number you want to check in place of 41, click <strong class="text-primary">Update</strong>, and you're ready to view the new request results in the relevant blog post. 
            </p>
          </div>


        </div>


      </div>
    </div>






















</div>

