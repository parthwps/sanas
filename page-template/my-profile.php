<?php 
/**
    Template Name: My Profile    
    * The template for displaying all pages
    *
    * This is the template that displays all pages by default.
    * Please note that this is the WordPress construct of pages
    * and that other 'pages' on your WordPress site may use a
    * different template.
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package sanas
*/
get_header();
get_sidebar('dashboard');

if (!is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}
global $current_user;    
wp_get_current_user();
$userID = $current_user->ID;
$first_char = substr($current_user->user_firstname, 0, 1);

// Fetch user data
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$first_name = get_user_meta($user_id, 'first_name', true);
$last_name = get_user_meta($user_id, 'last_name', true);
$email = $current_user->user_email;
$phone = get_user_meta($user_id, 'phone_number', true);
$about = get_user_meta($user_id, 'description', true);
$facebook = get_user_meta($user_id, 'facebook', true);
$twitter = get_user_meta($user_id, 'twitter', true);
$instagram = get_user_meta($user_id, 'instagram', true);
$youtube = get_user_meta($user_id, 'youtube', true);

?>
<div class="wl-dashboard-wrapper dashboard">
    <div class="container-fluid wl-dashboard-content">
      <div class="my-profile profile-form">
        <div class="my-profile-box">
          <div class="my-profile-details">
            <div class="profile-img">
              <div class="profile-firstc"><?php echo ucfirst($first_char); ?></div> 
              <button type="button" class="dashbord-btn">Edit Image</button>
            </div>
            <div class="profile-info">
              <div class="profile-info-title">
                <h4><?php echo esc_html($first_name . ' ' . $last_name); ?></h4>
              </div>
              <p class="profile-info-text">
                <?php if($about == ""){echo "Dream big. Think different. Do great!";}else{echo esc_html($about);} ?></p>
              <div class="profile-action">
                <h4 class="">Active</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="guests-list">
          <div class="inner tabs-box-3 guests-tabs">
            <div class="top-tabs">
              <div class="tabs-box-3">
                <ul class="tab-buttons">
                  <li class="tab-btn active-btn" data-tab="#tab-11">Profile Details</li>
                  <li class="tab-btn" data-tab="#tab-14">Social Madia</li>
                  <li class="tab-btn" data-tab="#tab-15">Change Password</li>
                  <li class="tab-btn" data-tab="#tab-16">Account Delete</li>
                </ul>
              </div>
            </div>
            <div class="guests-box tabs-content">
              <div class="tab active-tab" id="tab-11">
                <div class="form-block">
                  <form method="post" action="#" name="profile-update">
                    <div class="form-box">
                      <div class="row">
                        <div class=" col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="<?php echo esc_attr($first_name); ?>" name="first_name" placeholder="" required="">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="<?php echo esc_attr($last_name); ?>" name="last_name" placeholder="">
                          </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label> Email</label>
                            <input type="email" class="form-control" value="<?php echo esc_attr($email); ?>" name="email" placeholder="" required="">
                          </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label> Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo esc_attr($phone); ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                          <label>About me</label>
                          <textarea placeholder="Dream big. Think different. Do great!" name="about" rows="5" cols="33"><?php echo esc_html($about); ?></textarea>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                          <button type="submit" name="update_profile" class="dashbord-btn">Save
                            Changes</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab" id="tab-14">
                <div class="form-block">
                  <form method="post" action="#">
                    <div class="form-box">
                      <div class="row">
                        <div class=" col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label>Facebook</label>
                          <input type="text" class="form-control" value="<?php echo esc_url($facebook); ?>" placeholder="https://www.facebook.com/">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label>Twitter</label>
                          <input type="text" class="form-control" value="<?php echo esc_url($twitter); ?>" placeholder="https://x.com/">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label>Instagram</label>
                          <input type="text" class="form-control" value="<?php echo esc_url($instagram); ?>" placeholder="https://www.instagram.com/">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label>Youtube</label>
                          <input type="text" class="form-control" value="<?php echo esc_url($youtube); ?>" placeholder="https://www.youtube.com/">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <button type="submit" name="update_social" class="dashbord-btn">Save
                            Changes</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab" id="tab-15">
                <div class="form-block">
                  <div class="form-box">
                    <form method="post" action="#">
                      <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label>Current Password</label>
                            <input type="password"  class=" password-control form-control"
                              name="Password" placeholder="" autocomplete="off" required="">
                              <div class="eye-icon">
                                <i class="fa-regular fa-eye"></i>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label>New Password</label>
                            <input type="password"  class=" password-control form-control"
                              name="Password" placeholder="" autocomplete="off" required="">
                              <div class="eye-icon">
                                <i class="fa-regular fa-eye"></i>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password"  class="password-control form-control"
                              name="Password" placeholder="" autocomplete="off" required="">
                              <div class="eye-icon">
                                <i class="fa-regular fa-eye"></i>
                              </div>
                          </div>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                          <button type="submit" class="dashbord-btn">Save
                            Changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="tab" id="tab-16">
                <div class="form-block del-account">
                  <div class="form-box">
                    <p>In the field below, check to Delete your account.</p>
                    <div class="form-check">
                      <input class="form-check-input custom-check" type="checkbox" value="" id="CheckDel">
                      <label class="form-check-label" for="CheckDel">Delete my account and
                        data listing also.</label>
                    </div>
                    <p>By clicking "Delete My Account", all your invitation cards, dashboard, contacts, and sign-in details will be permanently deleted, and you will no longer be able to log in to Sana's Invite.</p>
                    <button type="submit" class="dashbord-btn">Delete My Account</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script>
  jQuery(document).ready(function ($) {
    // Update Profile
    $('form.profile-update').on('submit', function (e) {
        e.preventDefault();
        var data = {
            action: 'update_profile',
            first_name: $('input[name="first_name"]').val(),
            last_name: $('input[name="last_name"]').val(),
            email: $('input[name="email"]').val(),
            phone: $('input[name="phone"]').val(),
            about: $('textarea[name="about"]').val(),
        };

        $.post(ajax_obj.ajax_url, data, function (response) {
            alert(response.success ? 'Profile updated successfully!' : response.data);
        });
    });

    // Update Social Media Links
    $('form.social-update').on('submit', function (e) {
        e.preventDefault();
        var data = {
            action: 'update_profile',
            facebook: $('input[name="facebook"]').val(),
            twitter: $('input[name="twitter"]').val(),
            instagram: $('input[name="instagram"]').val(),
            youtube: $('input[name="youtube"]').val(),
        };

        $.post(ajax_obj.ajax_url, data, function (response) {
            alert(response.success ? 'Social links updated successfully!' : response.data);
        });
    });

    // Change Password
    $('form.change-password').on('submit', function (e) {
        e.preventDefault();
        var data = {
            action: 'change_password',
            current_password: $('input[name="current_password"]').val(),
            new_password: $('input[name="new_password"]').val(),
        };

        $.post(ajax_obj.ajax_url, data, function (response) {
            alert(response.success ? 'Password updated successfully!' : response.data);
        });
    });

    // Delete Account
    $('.delete-account-btn').on('click', function () {
        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
            $.post(ajax_obj.ajax_url, { action: 'delete_account' }, function (response) {
                if (response.success) {
                    alert('Account deleted successfully!');
                    window.location.href = ajax_obj.home_url; // Redirect to homepage or login
                } else {
                    alert('Error deleting account');
                }
            });
        }
    });
});
</script>



<?php
get_footer('dashboard');