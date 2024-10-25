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
?>
<?php

// Redirect non-logged-in users
if (!is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

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

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_profile'])) {
        // Update user details
        update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['first_name']));
        update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['last_name']));
        wp_update_user([
            'ID' => $user_id,
            'user_email' => sanitize_email($_POST['email']),
        ]);
        update_user_meta($user_id, 'phone_number', sanitize_text_field($_POST['phone']));
        update_user_meta($user_id, 'description', sanitize_textarea_field($_POST['about']));
    }

    if (isset($_POST['update_image']) && !empty($_FILES['profile_image']['name'])) {
        // Handle profile image upload
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $uploadedfile = $_FILES['profile_image'];
        $upload_overrides = array('test_form' => false);
        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
        
        if ($movefile && !isset($movefile['error'])) {
            update_user_meta($user_id, 'profile_image', $movefile['url']);
        }
    }

    if (isset($_POST['update_social'])) {
        // Update social media links
        update_user_meta($user_id, 'facebook', esc_url_raw($_POST['facebook']));
        update_user_meta($user_id, 'twitter', esc_url_raw($_POST['twitter']));
        update_user_meta($user_id, 'instagram', esc_url_raw($_POST['instagram']));
        update_user_meta($user_id, 'youtube', esc_url_raw($_POST['youtube']));
    }
}
?>

<!-- HTML Template Starts Here -->
<div class="wl-dashboard-wrapper dashboard">
    <div class="container-fluid wl-dashboard-content">
        <div class="my-profile profile-form">
            <div class="my-profile-box">
                <div class="my-profile-details">
                    <div class="profile-img">
                        <img src="<?php echo esc_url(get_user_meta($user_id, 'profile_image', true) ?: 'assets/img/login-img.jpg'); ?>" alt="" class="img-fluid rounded-circle" width="100" height="100">
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="profile_image" accept="image/*">
                            <button type="submit" name="update_image" class="dashbord-btn">Edit Image</button>
                        </form>
                    </div>
                    <div class="profile-info">
                        <h4><?php echo esc_html($first_name . ' ' . $last_name); ?></h4>
                        <p class="profile-info-text"><?php echo esc_html($about); ?></p>
                        <div class="profile-action"><h4>Active</h4></div>
                    </div>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="tab active-tab" id="tab-11">
                <div class="form-block">
                    <form method="post" action="">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" value="<?php echo esc_attr($first_name); ?>" required>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" value="<?php echo esc_attr($last_name); ?>" required>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo esc_attr($email); ?>" required>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" value="<?php echo esc_attr($phone); ?>" required>
                                </div>
                                <div class="col-lg-12">
                                    <label>About Me</label>
                                    <textarea name="about" rows="5"><?php echo esc_html($about); ?></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="update_profile" class="dashbord-btn">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Social Media Form -->
            <div class="tab" id="tab-14">
                <div class="form-block">
                    <form method="post" action="">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" value="<?php echo esc_url($facebook); ?>" required>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" value="<?php echo esc_url($twitter); ?>" required>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" value="<?php echo esc_url($instagram); ?>" required>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" value="<?php echo esc_url($youtube); ?>" required>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="update_social" class="dashbord-btn">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer('dashboard');