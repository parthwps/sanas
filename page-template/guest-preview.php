<?php 
/**
    Template Name: Guest Preview    
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

if(isset($_GET['event_id']))
{
global $post, $wpdb;


$sanas_card_event_table = $wpdb->prefix . 'sanas_card_event';  

$guest_details_info_table = $wpdb->prefix . 'guest_details_info';  


$event_id=$_GET['event_id'];
$guestid=$_GET['guestid'];

$guest_status_query = $wpdb->prepare(
      "SELECT guest_status FROM $guest_details_info_table WHERE guest_id = %d",
       $guestid
 );
$guest_status = $wpdb->get_var($guest_status_query);


$get_event_date = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $sanas_card_event_table WHERE event_no = %d",
        $event_id
    ));

$event_front_bg_link='';



$rsvp_bg_img = $wpdb->prepare(
      "SELECT event_rsvp_bg_link FROM $sanas_card_event_table WHERE event_no = %d",
       $event_id
 );
$rsvp_bg_img_url = $wpdb->get_var($rsvp_bg_img);
$rsvp_bg_img_url_value=get_template_directory_uri() . '/assets/img/preview-bg.jfif';
if($rsvp_bg_img_url)
{
    $rsvp_bg_img_url_value=$rsvp_bg_img_url;
}  

$color_bg_link = $wpdb->prepare(
      "SELECT event_front_bg_color FROM $sanas_card_event_table WHERE event_no = %d",
       $event_id
 );
$colorbg = $wpdb->get_var($color_bg_link);
$colorbgvalue='';
if($colorbg)
{
    $colorbgvalue=$colorbg;
}    

if(isset($get_event_date))
{
$event_front_card_preview=$get_event_date[0]->event_front_card_preview;
$event_back_card_preview=$get_event_date[0]->event_back_card_preview;
$event_rsvp_id=$get_event_date[0]->event_rsvp_id;
$event_front_bg_link=$get_event_date[0]->event_front_bg_link;
$event_card_id=$get_event_date[0]->event_card_id;
$event_user=$get_event_date[0]->event_user;
}

function is_youtube_url($url) {
  return preg_match('/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/', $url);
}    

$existing_rsvp_query = new WP_Query(array(
    'post_type' => 'sanas_rsvp',
    'author' => $event_user,
    'posts_per_page' => 1,  // Limit to 1 post per user
));
if ($existing_rsvp_query->have_posts()) {
    // If an existing RSVP post is found
    $existing_rsvp_query->the_post();
    $edit_id = $event_rsvp_id;
    $rsvpvideo = esc_html(get_post_meta($edit_id, 'opt_upload_video', true));
    $guestName = esc_html(get_post_meta($edit_id, 'guest_name', true));
    $eventtitle = esc_html(get_post_meta($edit_id, 'event_name', true));
    $eventdate = esc_html(get_post_meta($edit_id, 'event_date', true));    
    $guestContact = esc_html(get_post_meta($edit_id, 'guest_contact', true));
    $guestMessage = esc_html(get_post_meta($edit_id, 'guest_message', true));
    $program      = get_post_meta($edit_id, 'listing_itinerary_details', true);
    $registry     = get_post_meta($edit_id, 'registries', true);

    $guest_name_css = get_post_meta($edit_id, 'guest_name_css', true);
    $guest_contact_css = get_post_meta($edit_id, 'guest_contact_css', true);
    $guest_message_css = get_post_meta($edit_id, 'guest_message_css', true);
    $event_title_css = get_post_meta($edit_id, 'event_title_css', true);
    $event_date_css = get_post_meta($edit_id, 'event_date_css', true);


    // Restore original post data
    wp_reset_postdata();
} 
?>
<style type="text/css">
body {
    background-color: #F9F9F9;
}
section.wl-main-canvas .inner-container .inner-colum {
    background-image: url(<?php echo $event_front_bg_link; ?>) !important;
    background-size: cover;
    background-color:<?php echo $colorbg;?>; 
}
#previewcanvasElement {
    background-image: url('<?php echo $rsvp_bg_img_url_value ?>') !important;
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
}       
</style>


     <section class="wl-main-canvas guest-preview">
        <div class="container-fluid">
            <div class="inner-container"  id="previewcanvasElement">
                <div class="inner-colum">
                    <div class="card-canvas row">
                        <div class=" col-md-6 col-sm-12">
                            <div class="preview-img">
                                <img src="<?php echo $event_front_card_preview;?>" alt="">
                            </div>
                        </div>
                        <div class=" col-md-6 col-sm-12">
                            <div class="preview-img">
                                <img src="<?php echo $event_back_card_preview;?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content content-3">
                    <div class="row">
                        <div class="divider">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/divider.png" alt="">
                        </div>
                        <div class="wl-card-detaile">
                            <div class="row">
                              <?php if (!empty($rsvpvideo)) { ?>
                            <div class="col-12">
                                    <?php if (is_youtube_url($rsvpvideo)) : ?>
                                    <?php
                                         $youtubevideo=$rsvpvideo ;
                                        // Extract YouTube video ID
                                        preg_match('/\/([^\/]+)$/', $youtubevideo, $matches);
                                        $youtube_id = $matches[1];                                   
                                    ?>
                                    <iframe id="youtube-iframe" width="1000" height="490" src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <?php else : ?>

                                    <?php if (!empty($rsvpvideo)) { ?>
                                    <video controls>
                                        <source src="<?php echo esc_url($rsvpvideo); ?>">
                                    </video>
                                    <?php } ?>
                                <?php endif; ?>
                            </div>
                            <?php } ?>
                            </div>
                             <?php if (!empty($rsvpvideo)) { ?>
                            <div class="divider">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/divider.png" alt="">
                            </div>
                             <?php } ?>
                            <div class="wl-inner-card-detaile">
                                <div class="row">
                                    <div class="col-xxl-5 col-lg-7 col-md-7 col-sm-12 m-auto">
                                        <h4 class="mb-0">Hosted By</h4>
                                        <?php 
                                            if(!empty($eventtitle)) { echo '<h4 style="'.$event_title_css.'">'.esc_html($eventtitle).'</h4>'; }

                                            if(!empty($guestName)) { echo '<h2 style="'.$guest_name_css.'">'.esc_html($guestName).'</h2>'; }

                                            if(!empty($guestContact)) { echo '<span style="'.$guest_contact_css.'">'.esc_html($guestContact).'</span>'; }

                                            if(!empty($guestMessage)) { echo '<p style="'.$guest_message_css.'">'.esc_html($guestMessage).'</p>'; }

                                            if(!empty($eventdate)) { echo '<p style="'.$event_date_css.'">'.esc_html($eventdate).'</p>'; }
                                         
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                        <?php 
                                           if( !empty($program) && count($program)>0 ){ ?>
                                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-12 m-auto">
                                            <div class="wl-fuc-timing">
                                                <span>Itinerary</span>
                                                <table>
                                                    <?php 
                                                    if( !empty($program) && count($program)>0 ){
                                                    foreach ($program as $event) :?>
                                                    <tr>
                                                        <td><?php echo esc_attr($event['program_name'])?></td>
                                                        <td><?php echo esc_attr($event['program_time'])?></td>
                                                    </tr>
                                                    <?php endforeach; }?>
                                                </table>
                                            </div>
                                        </div>
                                       <?php } ?>
                                </div>    
                                <div class="row">
                                    <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-10 col-sm-12 m-auto">
                                        <div class="wl-joining m-0">
                                            <h4 class="mb-0">Will you be joining us?</h4>
                                            <form action="#">
                                                <div class="check-box-from">
                                                    <div class="check-box-from-field">
                                                        <input id="yes" name="Yes" data-value="Accepted" type="checkbox">
                                                        <label for="yes">Yes</label>
                                                    </div>
                                                    <div class="check-box-from-field">
                                                        <input id="no" name="No" data-value="Declined" type="checkbox">
                                                        <label for="no">No</label>
                                                    </div>
                                                    <div class="check-box-from-field">
                                                        <input id="notSure" name="NotSure" data-value="May Be" type="checkbox">
                                                        <label for="notSure">Not Sure</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-10 m-auto">
                                        <div class="guest-count">
                                            <h4 class="mb-0">No. of Guests</h4>
                                            <div class="guest-counter">
                                                <h4>Adults</h4>
                                                <div class="count">
                                                    <span class="mines"><i class="fa-solid fa-minus"></i></span>
                                                    <span class="total-guest" id="adult-guest">0</span>
                                                    <span class="plues"><i class="fa-solid fa-plus"></i></span>
                                                </div>
                                            </div>
                                            <div class="guest-counter">
                                                <h4>Kids</h4>
                                                <div class="count">
                                                    <span  class="mines"><i class="fa-solid fa-minus"></i></span>
                                                    <span class="total-guest" id="kids-guest">0</span>
                                                    <span  class="plues"><i class="fa-solid fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-12 m-auto">
                                        <textarea name="Message" id="mesg" rows="5" placeholder="Message to the host..."></textarea>
                                    </div>
                                </div>
                                <?php
                                if($guest_status=='pending')
                                {
                                ?>
                                
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-8 col-sm-12 m-auto text-center ">
                                        <button  id="invite-action-submit" data-eventid="<?php echo $_GET['event_id'];?>" data-guestid="<?php echo $_GET['guestid'];?>" type="button"
                                            class="btn btn-secondary m-auto mt-3 ps-4 pe-4">Submit </button>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                    <div class="alert mt-5 alert-success">You have already submited your response.</div>
                                <?php } ?>
                                <?php wp_nonce_field('ajax-sanas-guest-preview-nonce', 'sanasguestpreviewsecurity');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="registry">
                <div class="container">
                    <div class="row">
                        <div class=" col-12 m-auto">
                            <h5>Gift Registry</h5>
                            <div class=" row">
                               <?php
                               if( !empty($registry) && count($registry)>0 ){
                                foreach ($registry as $event) :?>
                                     <div class="col-xl-3 col-lg-6 col-md-6">
                                      <?php 

                                            if (str_contains($event['url'], 'amazon.')) {
                                            ?>
                                            <a class="gift-registry" href="<?php echo esc_url($event['url'])?>" target="_blank">
                                                <?php echo '<img id="img12" src=" ' . get_template_directory_uri() . '/assets/img/Amazon.png" alt=""> '?> </a>
                                            <?php    
                                            } else  if (str_contains($event['url'], 'target.')) {
                                            ?>
                                             <a class="gift-registry" href="<?php echo esc_url($event['url'])?>" target="_blank"><?php echo '<img id="img12" src=" ' . get_template_directory_uri() . '/assets/img/Target.png" alt=""> '?></a>
                                            <?php    
                                            } else {
                                            ?>
                                             <a class="gift-registry" href="<?php echo esc_attr($event['url'])?>" target="_blank"><?php echo esc_attr($event['name'])?></a>
                                            <?php    
                                                
                                            }
                                      ?>                                       
                                </div>
                               <?php endforeach; }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
// // The Base64 string
// $data_uri = ""; // Replace with your actual Base64 string

// // Step 1: Remove the "data:image/png;base64," part
// $encoded_data = preg_replace('#^data:image/\w+;base64,#i', '', $data_uri);

// // Step 2: Decode the Base64 string to get binary data
// $image_data = base64_decode($encoded_data);

// // Step 3: Specify the path where you want to save the file
// // You can use wp_upload_dir() to save it in the WordPress uploads directory
// $upload_dir = wp_upload_dir();
// $file_path = $upload_dir['path'] . '/image.png'; // Save the image as "image.png"

// // Step 4: Save the binary data as a PNG file
// file_put_contents($file_path, $image_data);

// echo "Image saved to: " . $file_path;


}
else{
?>
    <section class="wl-main-canvas guest-preview">
        <div class="container">
          <div class="row">
        <?php
          echo '<p>' . esc_html__('Sorry, enter wrong URL!', 'sanas') . '</p>';
        ?>
          </div>
          </div>
        </section>
<?php 
}
get_footer();