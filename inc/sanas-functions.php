<?php 
// sanas Options
if (!function_exists('sanas_options')) {
    function sanas_options($option = '', $default = null)
    {
        $defaults = sanas_default_theme_options();
        $options = get_option('sanas_theme_options');
        $default = (!isset($default) && isset($defaults[$option])) ? $defaults[$option] : $default;
        return (isset($options[$option])) ? $options[$option] : $default;
    }
}
// sanas Default Theme Options
if (!function_exists('sanas_default_theme_options')) {
    function sanas_default_theme_options()    {
        return array(
        );
    }
}

// sanas Logo
if (!function_exists('sanas_get_header_logo')) {
    function sanas_get_header_logo()
    {
        $logoEnable = sanas_options('sanas_header_logo_enable', false);
        $logoImage = sanas_options('sanas_header_logo');
        $logoWidth = sanas_options('sanas_header_logo_width');
        $logoHeight = sanas_options('sanas_header_logo_height');
        if ($logoEnable && !empty($logoImage)) {?>
          <div class="col">
              <div class="main-menu-logo">
                <a href="<?php echo site_url('/') ?>">
                  <img width="<?php echo esc_attr($logoWidth); ?>" height="<?php echo esc_attr($logoHeight); ?>" src="<?php echo esc_url($logoImage['url']) ?>"
                  alt="header-logo">
                </a>
              </div>
          </div>
<?php }
    }
}
add_action('sanas_header_logo', 'sanas_get_header_logo');

// Login Popup
if (!function_exists('sanas_get_login_popup')) {
    function sanas_get_login_popup()
    {
        $titleEnable = sanas_options('sanas_signin_popup_title_enable', false);
        $subtitleEnable = sanas_options('sanas_signin_popup_subtitle_enable', false);
        $pageEnable = sanas_options('sanas_signin_popup_page_enable', false);
        $imageEnable = sanas_options('sanas_signin_popup_image_enable', false);
        $popupTitle = sanas_options('sanas_signin_popup_title');
        $popupSubtitle = sanas_options('sanas_signin_popup_subtitle');
        $pagelinkInfo = sanas_options('sanas_signin_popup_page_info');
        $popupImage = sanas_options('sanas_signin_popup_image');
        $signuptitleEnable = sanas_options('sanas_signup_popup_title_enable', false);
        $signupsubtitleEnable = sanas_options('sanas_signup_popup_subtitle_enable', false);
        $signuppageEnable = sanas_options('sanas_signup_popup_page_enable', false);
        $signupimageEnable = sanas_options('sanas_signup_popup_image_enable', false);
        $signuppopupTitle = sanas_options('sanas_signup_popup_title');
        $signuppopupSubtitle = sanas_options('sanas_signup_popup_subtitle');
        $signuppagelinkInfo = sanas_options('sanas_signup_popup_page_info');
        $signuppopupImage = sanas_options('sanas_signup_popup_image');
        $emailtitleEnable = sanas_options('sanas_email_popup_title_enable', false);
        $emailsubtitleEnable = sanas_options('sanas_email_popup_subtitle_enable', false);
        $emailpageEnable = sanas_options('sanas_email_popup_page_enable', false);
        $emailimageEnable = sanas_options('sanas_email_popup_image_enable', false);
        $emailpopupTitle = sanas_options('sanas_email_popup_title');
        $emailpopupSubtitle = sanas_options('sanas_email_popup_subtitle');
        $emailpagelinkInfo = sanas_options('sanas_email_popup_page_info');
        $emailpopupImage = sanas_options('sanas_email_popup_image');
        $passwordtitleEnable = sanas_options('sanas_password_popup_title_enable', false);
        $passwordsubtitleEnable = sanas_options('sanas_password_popup_subtitle_enable', false);
        $passwordpageEnable = sanas_options('sanas_password_popup_page_enable', false);
        $passwordimageEnable = sanas_options('sanas_password_popup_image_enable', false);
        $passwordpopupTitle = sanas_options('sanas_password_popup_title');
        $passwordpopupSubtitle = sanas_options('sanas_password_popup_subtitle');
        $passwordpagelinkInfo = sanas_options('sanas_password_popup_page_info');
        $passwordpopupImage = sanas_options('sanas_password_popup_image');

        ?>
        <div class="search-popup">
          <div class="search-popup-inner">
            <div class="container">
              <div class="form-boxed">
          <!-- Signin Form -->
             <div class="login">
             <div class="form-content">
              <button class="close-search style-two"></button>
              <?php if ($imageEnable && !empty($imageEnable)) {?>
              <div class="hart-icon">
                  <img width="64" src="<?php echo esc_url($popupImage['url']) ?>" alt="popup-image">
              </div>
              <?php } ?>
              <?php if ($titleEnable && !empty($popupTitle)) {?>
              <h4><?php echo esc_html($popupTitle) ?></h4>
              <?php }
              if ($titleEnable && !empty($popupTitle)) {?>
              <p><?php echo esc_html($popupSubtitle) ?></p>
              <?php }?>
              <div class="login-form">
              <form method="post" id="usersignin">
                <div class="form-group">
                    <input type="email" id="signinEmail" name="signinEmail" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" class="password-input password-control" id="signinPassword" name="signinPassword" placeholder="Password" autocomplete="off">
                    <div class="eye-icon">
                       <i class="fa-regular fa-eye-slash"></i>
                    </div>
                </div>
                <div class="form-group remember">
                    <input type="checkbox" id="signInRememberMe">
                    <label for="signInRememberMe"><?php esc_html_e('Remember Me','sanas') ?></label>
                  </div>
                <p id="signinresponseMessage" style="color:red;"></p>

                <div class="form-group">
                    <!-- Button with data attributes to be shown if #ajaxvalue is 1 -->
                    <button class="btn btn-secondary btn-block sign-in-complate usersignin" card-id="" event-id="" btn-url="" type="submit" name="submit-form" id="signInButton"><?php echo esc_html('Sign In') ?></button>

                    <!-- Default button to be shown otherwise -->
                    <input type="hidden" id="ajaxvalue" name="ajaxvalue" value="">
                </div>
                <div class="form-group">
                    <button class="btn-forgot"><?php esc_html_e('Forgot Password ?','sanas'); ?></button>
                </div>
                <div class="divider">
                    <span><?php esc_html_e('OR','sanas'); ?></span>
                </div>
                <?php wp_nonce_field('ajax-usersignin-nonce', 'usersigninsecurity');?>             
            </form>

              </div>
              <ul class="social-box">
                  <!-- <li><a href="#" class="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/google.svg" alt=""></a></li> -->
                  <li>
                    <a href="https://thegenius.co/wpdemo3/wp-login.php?loginSocial=google" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="google" data-popupwidth="600" data-popupheight="600">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/google.svg" alt="" />
                    </a>
                  </li>
                  <li><a href="#" class="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.svg" alt=""></a></li>
                  <li><a href="#" class="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/iphone.svg" alt=""></a></li>
              </ul>
              <div class="lower-social-box">
                  <p><?php echo esc_html('Not a Member Yet?') ?>&nbsp;&nbsp;<a class="sign-up-2" href="#"><?php echo esc_html('Sign Up.') ?></a></p>
                  <?php if($pageEnable) { ?>
                  <p>
                   <?php 
                    $i=0;
                    foreach ($pagelinkInfo as $link): ?>
                    <a href="<?php echo esc_url($link['sanas_signin_popup_page_url']['url']); ?>"><?php echo $link['sanas_signin_popup_page_title'] ?></a> 
                    <?php if ($i == 0) {?>| <?php }?>
                    <?php  $i++; endforeach;?>
                  </p>
                <?php } ?>
              </div>
                </div>
            </div>
          <!-- SignUp Form -->
          <div class="sign-up d-none">
            <div class="form-content">
              <button class="close-search style-two"></button>
              <?php if ($signupimageEnable && !empty($signupimageEnable)) {?>
              <div class="hart-icon">
                <img width="64" src="<?php echo esc_url($signuppopupImage['url']) ?>" alt="popup-image">
              </div>
             <?php } ?>
               <?php if ($signuptitleEnable && !empty($signuppopupTitle)) {?>
              <h4><?php echo esc_html($signuppopupTitle) ?></h4>
              <?php }
              if ($signuptitleEnable && !empty($signuppopupTitle)) {?>
              <p><?php echo esc_html($signuppopupSubtitle) ?></p>
              <?php }?>
              <div class="login-form">
                <form method="post" id="usersignup">
                  <div class="form-group">
                    <input type="text"  id="signupYourname" name="signupYourname" placeholder="Your Name" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <input type="text"  id="signupUsername" name="signupUsername" placeholder="Username*" autocomplete="off" >
                    <div id="signupUsernameError" class="error-message">Enter Valid Username</div>   
                  </div>
                  <div class="form-group">
                      <input type="email" id="signupEmail"  name="signupEmail" placeholder="Email*" autocomplete="off">
                      <div id="signupEmailError" class="error-message">Enter Valid Email</div>   
                  </div>
                 <div class="form-group">
                      <input type="email" id="confirmsignupEmail"  name="confirmsignupEmail" placeholder="Confirm Email*" autocomplete="off">
                      <div id="confirmsignupEmailError" class="error-message">Confirm Email Not Match</div>   
                  </div>
                  <div class="form-group">
                    <input type="password"  class="password-input password-control" id="signupPassword" name="signupPassword" placeholder="Password" autocomplete="off">
                    <div class="eye-icon">
                      <i class="fa-regular fa-eye-slash"></i>
                    </div>
                     <div id="signupPasswordError" class="error-message">Enter Password</div>   
                  </div>
                  <div class="form-group">
                    <button class="btn btn-secondary btn-block usersignup" type="submit" name="submit-form">
                         <?php echo esc_html('Create an account'); ?>
                    </button>
                  </div>
                  <div id="signupresponseError" class="error-message"></div>
                  <div class="divaider">
                    <span>OR</span>
                  </div>
                 <?php wp_nonce_field('ajax-usersignup-nonce', 'usersignupsecurity');?>
                </form>
              </div>
              <!-- Social Box -->
              <ul class="social-box">
                <li>
                    <a href="https://thegenius.co/wpdemo3/wp-login.php?loginSocial=google" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="google" data-popupwidth="600" data-popupheight="600">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/google.svg" alt="" />
                    </a>
                  </li>
                <li><a href="#" class="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.svg" alt=""></a></li>
                <li><a href="#" class="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/iphone.svg" alt=""></a></li>
              </ul>
              <div class="lower-social-box">
                <p><?php echo esc_html__('Already have an account?','sanas'); ?>&nbsp;&nbsp;<a class="sign-in" href="#"><?php echo esc_html('Sign in here.'); ?></a> </p>
                <?php if($signuppageEnable) { ?>
                <p>
                    <?php 
                    $i=0;
                    foreach ($signuppagelinkInfo as $link): ?>
                    <a href="<?php echo esc_url($link['sanas_signup_popup_page_url']['url']); ?>"><?php echo $link['sanas_signup_popup_page_title'] ?></a> 
                    <?php if ($i == 0) {?>| <?php }?>
                    <?php  $i++; endforeach;?>
                </p>
              <?php } ?>
              </div>
            </div>
          </div>
        <!-- Verify email Password Popup -->
          <div class="forgot d-none">
            <div class="form-content">
              <button class="close-search style-two"></button>
              <?php if ($emailimageEnable && !empty($emailimageEnable)) {?>
              <div class="hart-icon">
                <img width="64" src="<?php echo esc_url($emailpopupImage['url']) ?>" alt="popup-image">
              </div>
              <?php } ?>
               <?php if ($emailtitleEnable && !empty($emailpopupTitle)) {?>
              <h4><?php echo esc_html($emailpopupTitle) ?></h4>
              <?php }
              if ($emailtitleEnable && !empty($emailpopupTitle)) {?>
              <p><?php echo esc_html($emailpopupSubtitle) ?></p>
              <?php }?>
              <div class="login-form">
                <form method="post" id="useremailForm">
                    <div id="changepassword-status"></div>
                    <div class="form-group">
                        <input type="email" id="userEmail" name="userEmail" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary btn-block Useremail" type="submit" id="changepassword" name="submit-form"><?php echo esc_html('Verify email'); ?></button>
                    </div>
                 <?php wp_nonce_field('ajax-useremail-nonce', 'useremailsecurity');?>                 
                </form>
              </div>
              <div class="lower-social-box">
                <?php if ($emailpageEnable) {?>
                <p>
                   <?php 
                    $i=0;
                    foreach ($emailpagelinkInfo as $link): ?>
                    <a href="<?php echo esc_url($link['sanas_email_popup_page_url']['url']); ?>"><?php echo $link['sanas_email_popup_page_title'] ?></a> 
                    <?php if ($i == 0) {?>| <?php }?>
                    <?php  $i++; endforeach;?>
                </p>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- Forgot Password poup -->
          <div class="cheng-password d-none">
            <div class="form-content">
              <button class="close-search style-two"></button>
              <?php if ($passwordimageEnable && !empty($passwordimageEnable)) {?>
              <div class="hart-icon">
                <img width="64" src="<?php echo esc_url($passwordpopupImage['url']) ?>" alt="popup-image">
              </div>
              <?php } ?>
              <?php if ($passwordtitleEnable && !empty($passwordpopupTitle)) {?>
              <h4><?php echo esc_html($passwordpopupTitle) ?></h4>
              <?php }
              if ($passwordtitleEnable && !empty($passwordpopupTitle)) {?>
              <p><?php echo esc_html($passwordpopupSubtitle) ?></p>
              <?php }?>
              <div class="login-form">


                <form id="reset-password-form" method="post">
<?php 

if (isset($_GET['reset_password']) && $_GET['reset_password'] == '1' && isset($_GET['key']) && isset($_GET['login'])) {
        $key = sanitize_text_field($_GET['key']);
        $login = sanitize_text_field($_GET['login']);

		$user = check_password_reset_key($key, $login);

        if ($user && !is_wp_error($user)) {

?>                  
					<div id="resetpassword-status"></div>
					<div class="form-group">
                    <input type="password" id="pass1" name="pass1" class="password-input password-control" 
                      placeholder="Enter new password" autocomplete="off" required="">
                      <div class="eye-icon">
                       <i class="fa-regular fa-eye-slash"></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="password" id="pass2" name="pass2" class="password-input password-control" 
                      placeholder="Re-enter new password" autocomplete="off" required="">
                     <div class="eye-icon">
                       <i class="fa-regular fa-eye-slash"></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-secondary" type="submit" name="changepassword-submit"><?php echo esc_html('Change Password'); ?></button>
                  </div>

                 <?php wp_nonce_field('ajax-userpassword-nonce', 'userpasswordsecurity');?>
					<input type="hidden" id="action" name="action" value="reset_user_password">
                    <input type="hidden"  id="key" name="key" value="<?php echo esc_attr($key); ?>">
                    <input type="hidden"  id="login" name="login" value="<?php echo esc_attr($login); ?>">

                 <?php } else{ 

                 	 echo '<p>Invalid or expired password reset link.</p>';
                 }
		}

                 ?>	
                </form>
              </div>
              <div class="lower-social-box">
                <?php if ($passwordpageEnable) {?>
                <p>
                   <?php 
                    $i=0;
                    foreach ($passwordpagelinkInfo as $link): ?>
                    <a href="<?php echo esc_url($link['sanas_password_popup_page_url']['url']); ?>"><?php echo $link['sanas_password_popup_page_title'] ?></a> 
                    <?php if ($i == 0) {?>| <?php }?>
                    <?php  $i++; endforeach;?>
                </p>
              <?php } ?>
              </div>
            </div>
          </div>
          <div class="content-succes d-none">
             <?php if ($imageEnable && !empty($imageEnable)) {?>
              <div class="hart-icon">
                  <img width="64" src="<?php echo esc_url($popupImage['url']) ?>" alt="popup-image">
              </div>
              <?php } ?>
            <h4 id="signinresponseMessagepopup"></h4>
          </div>
          <div class="account-content-succes d-none text-center">
             <?php if ($signupimageEnable && !empty($signupimageEnable)) {?>
              <div class="hart-icon">
                <img width="64" src="<?php echo esc_url($signuppopupImage['url']) ?>" alt="popup-image">
              </div>
             <?php } ?>
            <h4 id="signupresponseMessage"></h4>
          </div>
        </div>
      </div> 
    </div>
  </div>
<?php
}
}
add_action('sanas_get_login', 'sanas_get_login_popup');


function sanas_render_modal_html_alert() {
?>
<div class="modal fade" id="modal_html_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                   
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Keep Editing</button>
              <button type="button" class="btn btn-dark" data-redirect="<?php echo site_url('/') ?>" id="btn-exit">Exit</button>
            </div>
        </div>
    </div>
</div>
<?php
}

function sanas_preloading_overlay()
{
  echo '<div id="preloder-overlay"> 
  <div id="loading-overlay" class="loading-overlay">
    <div class="loading-box">
    <div class="position-relative">
        <div class="loading-spinner"></div>
        </div>
        <div class="loading-message">Loading...</div>
    </div>
    </div>
</div>
';
}

function sanas_get_user_attachments($user_id) {


    $args = array(
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 14, // Retrieve all attachments
        'post_mime_type' => 'image', // Filter by image MIME type        
        'author'         => $user_id, // Filter by user ID
    );

    $query = new WP_Query($args);

    // Check if the query has posts
    if ($query->have_posts()) {
        $attachments = array();

        // Loop through the attachments and add to array
        while ($query->have_posts()) {
            $query->the_post();
            $attachments[] = array(
                'ID'          => get_the_ID(),
                'url'         => wp_get_attachment_url(get_the_ID()),
                'mime_type'   => get_post_mime_type(),
                'upload_date' => get_the_date(),
            );
        }

        // Restore original Post Data
        wp_reset_postdata();

        return $attachments;
    }

    // If no attachments found, return empty array
    return array();
}
if ( !function_exists( 'sanas_blogs_pagination' ) ) {
  function sanas_blogs_pagination() {
    the_posts_pagination( array(
      'screen_reader_text' => '',
      'before'             => '<p>' . esc_html__( 'Pages:', 'hiredots' ) . '</p><ul class="page-numbers ss"><li>',
      'separator'          => '</li><li>',
      'after'              => '</li></ul>',
      'prev_text'          => '<i class="fas fa-long-arrow-alt-left"></i>',
      'next_text'          => '<i class="fas fa-long-arrow-alt-right"></i>',
      'type'               => 'list',
      'mid_size'           => 1,
    ) );
  }
}
if ( ! function_exists( 'sanas_author_avatar' ) ) :
    /**
     * Prints HTML with the author's avatar for the current post.
     */
    function sanas_author_avatar() {
        // Get the author's ID
        $author_id = get_the_author_meta('ID');

        // Get the author's avatar with a specified size
        $avatar = get_avatar( $author_id, 35 ); // 35 is the size of the avatar

        // Print the avatar
        echo wp_kses_post($avatar);
    }
endif;

if ( ! function_exists( 'sanas_single_post_pre_next' ) ) :

  function sanas_single_post_pre_next() {


   $p = get_adjacent_post(false, '', true); 
   $n = get_adjacent_post(false, '', false);
   if(!empty($p) || !empty($n)){
    ?>
    <div class="blog-next-pre">
            <div class="blog-next-pre-left d-flex justify-content-between">
              <div class="next-post">
                <?php previous_post_link( '%link', '<i class="fa fa-long-arrow-left"></i> %title' ); ?>
              </div>
              <div class="prev-post">
                <?php next_post_link( '%link', '%title <i class="fa fa-long-arrow-right"></i>' ); ?>
              </div>
            </div>
         </div>
    <?php
    
   }    
    
  }

endif;
if ( ! function_exists( 'weddlist_shape_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Shape 1.0
 */
function weddlist_shape_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
?>
  <<?php echo esc_attr($tag);?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' == $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID() ?>" class="comment-body review-list">
  <?php endif; ?>
  <div class="row"><!-- row block start-->    
    <?php if (0 != $args['avatar_size']) {?>
        <div class="col-md-2 col-sm-2 hidden-xs avatar-user">           
            <div class="user-pic">
                <?php echo get_avatar($comment, $args['avatar_size'] ); ?>
            </div>
        </div>
    <?php } ?>       
        <div class="col-md-10 col-sm-10">
            <div class="panel panel-default arrow left">
                 <div class="panel-body">
                  <div class="text-left">
                    <h6 class="media-heading"><?php 
                        printf(__('%s', 'weddlist'), sprintf('%s', get_comment_author_link())); ?>
                    </h6>
                    <div class="date">
               <?php comment_time('d F, Y'); ?>
                        <?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?>
                        <?php edit_comment_link( esc_html__( '(Edit)', 'weddlist' ), ' ' ); ?> 
                    </div> <!-- meta -->
                    </div>
                    <div class="comment-box">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'weddlist' ); ?></em>
                        <br />
                    <?php endif; ?>
                    <?php comment_text(); ?>
                    </div>                    
                    <?php comment_reply_link(array_merge($args, array(
                'add_below' => 'div-comment',
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'before'    => '<div class="reply">',
                'after'     => '</div>'       
              )));
          
          ?>
                 </div><!-- panel-body -->
            </div>
        </div>
    </div><!-- row block end--> 
  <?php if ( 'div' == $args['style'] ) : ?>
  </div>
  <?php endif; 
  
}
endif; // ends check for weddlist_shape_comment()


function sanas_card_category_select($class_name = ''){

$terms = get_terms( array(
        'taxonomy'   => 'sanas-card-category',
        'hide_empty' => false,  // Set to true if you want to hide terms without posts
    ) );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    echo '<select name="sanas_card_category" class="' . esc_attr( $class_name ) . '">';
    foreach ( $terms as $term ) {
        echo '<option value="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</option>';
    }
    echo '</select>';
}

}

function sanas_card_category_wishlist($class_name = '') {
  global $wpdb;
  $current_user_id = get_current_user_id();

  $wishlist_items = $wpdb->get_results(
      $wpdb->prepare(
          "SELECT card_id FROM {$wpdb->prefix}sanas_wishlist WHERE user_id = %d",
          $current_user_id
      )
  );

  if (!empty($wishlist_items)) {
      $card_ids = wp_list_pluck($wishlist_items, 'card_id');
      $categories = [];

      foreach ($card_ids as $card_id) {
          $terms = get_the_terms($card_id, 'sanas-card-category');
          if ($terms && !is_wp_error($terms)) {
              foreach ($terms as $term) {
                  if (!isset($categories[$term->term_id])) {
                      $categories[$term->term_id] = [
                          'name' => $term->name,
                          'count' => 0
                      ];
                  }
                  $categories[$term->term_id]['count']++;
              }
          }
      }

      if (!empty($categories)) {
          echo '<div class="d-flex mt-3 mb-2 justify-content-end"><a href="#" class="small text-black category-link text-decoration-underline">Show All</a></div>';
          echo '<ul class="m-0 ' . esc_attr($class_name) . '">';
          foreach ($categories as $category_id => $category) {
              echo '<li><a href="#" class="category-link d-flex justify-content-between" data-category="'.$category_id.'"><span class="name">' . esc_html($category['name']) . '</span> <span class="counter">' . esc_html($category['count']) . '</span></a></li>';
          }
          echo '</ul>';
      }
  }
}

?>