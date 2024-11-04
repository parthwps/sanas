<?php 
/**
    Template Name: My Dashboard 
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
global $wpdb;
$current_user_id = get_current_user_id();
$wishlist_count = $wpdb->get_var(
    $wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}sanas_wishlist WHERE user_id = %d",
        $current_user_id
    )
);
$completed_count = $wpdb->get_var(
    $wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}todo_list WHERE user_id = %d AND status = %s",
        get_current_user_id(),
        'Completed'
    )
);

?>

  <div class="wl-dashboard-wrapper dashboard">
    <div class="container-fluid wl-dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h3 class="pageheader-title">Dashboard</h3>
          </div>
        </div>
      </div>
      <div class="specs-widget couple-dashboard">
        <div class="row">
          <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card border-top-primary h-100">
              <div class="card-body">
                <h4 class="text-muted">Completed Tasks</h4>
                <div class="icon"><i class="fa-solid fa-list"></i></div>
                <div class="count">
                  <span><?php echo $completed_count; ?></span>
                </div>
                <div class="link"><a href="/to-do-list/">View Details</a></div>
              </div>
            </div>
          </div>
          <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card border-top-primary h-100">
              <div class="card-body">
                <h4 class="text-muted">Estimated Budget</h4>
                <div class="icon"><i class="fa fa-chart-line"></i></div>
                <div class="count">
                  <span>$76,822</span>
                </div>
                <div class="link"><a href="/budget/">View Details</a></div>
              </div>
            </div>
          </div>
          <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card border-top-primary wishlist h-100">
              <div class="card-body">
                <h4 class="text-muted">My Favorites</h4>
                <div class="icon"><i class="fa fa-heart"></i></div>
                <div class="count">
                  <span><?php echo $wishlist_count; ?></span>
                </div>
                <div class="link"><a href="/my-favorites/">View Details</a></div>
              </div>
            </div>
          </div>
          <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card border-top-primary h-100">
              <div class="card-body">
                <h4 class="text-muted">My Website</h4>
                <div class="icon"><i class="fa-solid fa-earth-americas"></i></div>
                <div class="link"><a href="#">View Details</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
      $get_event = $wpdb->get_results(
          $wpdb->prepare(
              "SELECT * FROM {$wpdb->prefix}sanas_card_event WHERE event_user = %d ORDER BY event_no DESC LIMIT 1",
              $current_user_id
          )
      );
      if ($get_event) {
          $event_front_card_preview = $get_event[0]->event_front_card_preview;
          $event_back_card_preview = $get_event[0]->event_back_card_preview;
          $event_card_id = $get_event[0]->event_card_id;
          $event_rsvp_id = $get_event[0]->event_rsvp_id;
          $eventDate= esc_html(get_post_meta($event_rsvp_id, 'event_date', true));
          $eventtitle= esc_html(get_post_meta($event_rsvp_id, 'event_name', true));
          $formattedDate = '';
          if(!empty($eventDate))
          {
            $date = new DateTime($eventDate);
            $formattedDate = $date->format('F jS, Y');          
          }
      }
      ?>
      <div class="row">
        <div class="attend-info col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="inner">
            <div class="event-title-2">
              <h4>My Events</h4>
            </div>
            <div class="inner-box">
              <a href="/user-dashboard/?dashboard=guestlist&card_id=<?php echo $get_event[0]->event_card_id; ?>&event_id=<?php echo $get_event[0]->event_no; ?>" class="flip-container" style="background-color:#dc587f;">
                <div class="flipper">
                  <div class="front">
                    <img src="<?php echo $event_front_card_preview; ?>" alt="template">
                  </div>
                  <div class="middel-card">
                    <img src="<?php echo $event_front_card_preview; ?>" alt="template">
                  </div>
                  <div class="back">
                    <img src="<?php echo $event_back_card_preview; ?>" alt="template">
                  </div>
                </div>
              </a>
              <div class="lower-content ps-0 pe-0">
                <h4><?php echo $eventtitle; ?></h4>
                <p class="m-0">Date: <?php echo $formattedDate ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="attend-info col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="inner">
            <div class="title-box">
              <div class="title graph">
                <h4>Guests Attending</h4>
              </div>
              <div class="options">
                <a href="guest-list.html">View Guest List </a>
              </div>
            </div>
            <div class="graph-box">
              <div id="guest_attending"></div>
            </div>
          </div>
        </div>
        <div class="wed-cat-info col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="inner">
            <div class="title-box">
              <div class="title">
                <h4>Budget Calculator</h4>
              </div>
              <div class="options">
                <div class="drop-nav option-nav">
                  <div class="dropdown-outer"><a class="btn-box" id="dropdownMenu5" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="true" href="#"><span class="icon fa fa-ellipsis-v"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu5">
                      <li><a href="#">View All</a></li>
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Update</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="list">
              <ul>
                <li><a href="#">
                    <div class="ttl"><i class="icon flaticon-camera"></i><span class="txt">Photography</span>
                    </div>
                    <div class="Budget-count"><span> $15,000</span></div>
                  </a></li>
                <li><a href="#">
                    <div class="ttl"><i class="icon flaticon-bouquet-1"></i><span class="txt">Flowers (100)</span>
                    </div>
                    <div class="Budget-count"><span> $1,000</span></div>
                  </a></li>
                <li><a href="#">
                    <div class="ttl"><i class="icon flaticon-envelope"></i><span class="txt">Invitation
                        (100)</span></div>
                    <div class="Budget-count"><span> $3,000</span></div>
                  </a></li>
                <li><a href="#">
                    <div class="ttl"><i class="icon flaticon-wedding-arch-1"></i><span class="txt">Decorations
                        (30)</span></div>
                    <div class="Budget-count"><span> $5,000</span></div>
                  </a></li>
              </ul>
            </div>
            <div class="link-box">
              <a href="" class="dashbord-btn">Manage Budget</a>
            </div>
          </div>
        </div>
        <div class="wed-cat-info  col-12">
          <div class="vendor">
            <div class="inner">
              <div class="todo-search-add-link">
                  <div class="title">
                    <h4>My Vendors</h4>
                  </div>
                <div class="add-link">
                    <a href="#" class="" data-bs-toggle="modal" data-bs-target="#add-vendor-popup"> Add Vendor</a>
                </div>
              </div>
              <div class="todo-box">
                <div class="row">
                  <div class="to-do-list-table d-table-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-box3">
                      <div class="table-box upcoming-tasks">
                        <div class="vendor-table table-responsive m-0">
                          <table class="vendor-list-table" id="vendor-table">
                            <thead>
                            <tr>
                              <th><input type="checkbox" name="allCheck" id="all-select-chechbox"> </th>
                              <th>Category</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Ph#</th>
                              <th>Notes</th>
                              <th class="text-single-line" data-toggle="tooltip" data-bs-original-title="Social Madia Profile">Social Madia Profile</th>
                              <th>Pricing</th>
                              <th class="actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $my_vendor_items = get_my_vendor_list_items();
                            ?>
                            <?php if ($my_vendor_items): ?>
                                <?php foreach ($my_vendor_items as $my_vendor): ?>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($my_vendor['category']); ?>"><?php echo esc_html($my_vendor['category']); ?></td>
                                        <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($my_vendor['name']); ?>"><?php echo esc_html($my_vendor['name']); ?></td>
                                        <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($my_vendor['email']); ?>"><?php echo esc_html($my_vendor['email']); ?></td>
                                        <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($my_vendor['phone']); ?>"><?php echo esc_html($my_vendor['phone']); ?></td>
                                        <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($my_vendor['notes']); ?>"><?php echo esc_html($my_vendor['notes']); ?></td>
                                        <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($my_vendor['social_media_profile']); ?>"><?php echo esc_html($my_vendor['social_media_profile']); ?></td>
                                        <td>$<?php echo esc_html($my_vendor['pricing']); ?></td>
                                        <td class="actions">
                                            <a href="#" class="edit edit-myvendor theme-btn" data-id="<?php echo esc_attr($my_vendor['id']); ?>" data-bs-toggle="modal" data-bs-target="#edit-vendor-popup">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="#" class="delete theme-btn" data-id="<?php echo esc_attr($my_vendor['id']); ?>">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                          </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wed-cat-info todo-list col-12">
          <div class="inner">
            <h5 class="pageheader-title mb-3">To Do List</h5>

            <div class="to-do-table-box table-box upcoming-tasks">
                    <div class="vendor-table table-responsive m-0">
                        <?php
                        $vendor_items = get_vendor_list_items();
                        ?>
                        <?php if ($todo_items): ?>
                        <?php 
                        $grouped_items = [];

                        foreach ($todo_items as $item) {
                            $item_month = date('F', strtotime($item['date']));
                            $item_year = date('Y', strtotime($item['date']));
                            $current_item_month_year = $item_month . ' ' . $item_year;

                            // Group items by month and year
                            if (!isset($grouped_items[$current_item_month_year])) {
                                $grouped_items[$current_item_month_year] = []; // Create an array for each month
                            }
                            $grouped_items[$current_item_month_year][] = $item; // Add the item to the respective month
                        }

                        // Generate tables for each month
                        foreach ($grouped_items as $month_year => $items): ?>
                            <table class="mb-0">
                            <tr><th class="todo-subhead text-align-start" colspan="7">
                            <h4><span><?php echo $month_year; ?></span></h4>
                            </th></tr>
                            </table>
                            <table class="vendor-list-table todo-list-table todo-table" id="todo-table-<?php echo str_replace(' ', '-', $month_year); ?>">
                                <thead>
                                    <tr class="todo-check-title">
                                        <th>Category</th>
                                        <th>Task</th>
                                        <th>Notes</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item): ?>
                                        <tr <?php echo ($item['completed'] == 1) ? 'class="text-decoration-line-through pe-none"' : ''; ?>>
                                            <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($item['category']); ?>">
                                                <?php echo esc_html($item['category']); ?>
                                            </td>
                                            <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($item['title']); ?>">
                                                <?php echo esc_html($item['title']); ?>
                                            </td>
                                            <td class="text-single-line" data-toggle="tooltip" data-bs-original-title="<?php echo esc_html($item['notes']); ?>">
                                                <?php echo esc_html($item['notes']); ?>
                                            </td>
                                            <td class="text-single-line text-nowrap">
                                                <?php echo DateTime::createFromFormat('Y-m-d', $item['date'])->format('jS M Y'); ?>
                                            </td>
                                            <td>
                                                <select class="status-dropdown" data-id="<?php echo $item['id']; ?>">
                                                    <option value="Yet To Start" <?php echo selected($item['status'], 'Yet To Start', false); ?>>Yet To Start</option>
                                                    <option value="In Progress" <?php echo selected($item['status'], 'In Progress', false); ?>>In Progress</option>
                                                    <option value="Completed" <?php echo selected($item['status'], 'Completed', false); ?>>Completed</option>
                                                </select>
                                            </td>
                                            <td class="actions">
                                                <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup" data-id="<?php echo $item['id']; ?>">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a href="#" class="delete theme-btn" data-id="<?php echo $item['id']; ?>">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-table-block couple-dashboard-table wed-cat-info col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  </div>
  <div class="modal fade def-popup add-todolist-popup" id="add-vendor-popup" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header">
            <h4 class="modal-title">Add Vendor</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span class="cross"></span>
            </button>
          </div>
          <div class="content-box">
            <form method="post" action="#" id="add-my-vendor-form">
              <div class="form-content">
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Category*</label>
                      <input type="text" class="form-control" name="category" required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Name*</label>
                      <input type="text" class="form-control" name="name" required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="number" class="form-control" name="phone">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label> Social Madia Profile</label>
                      <input type="text" class="form-control" name="social_media_profile">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Pricing</label>
                      <input type="number" class="form-control" name="pricing">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <label>Notes</label>
                    <textarea class="form-control" name="notes" maxlength="250"></textarea>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <div class="links-box">
                      <button type="submit" data-id="0" class="dashbord-btn">Save</button>
                      <button type="submit" data-id="1" class="dashbord-btn">Save and Add Another Vendor</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade def-popup add-todolist-popup" id="edit-vendor-popup" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header">
            <h4 class="modal-title">Edit Vendor</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span class="cross"></span>
            </button>
          </div>
          <div class="content-box">
            <form method="post" action="#" id="edit-my-vendor-form">
              <div class="form-content">
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Category</label>
                      <input type="text" class="form-control" name="category" id="edit-my-vendor-category">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" id="edit-my-vendor-name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="edit-my-vendor-email">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="number" class="form-control" name="phone" id="edit-my-vendor-phone">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label> Social Madia Profile</label>
                      <input type="text" class="form-control" name="social_media_profile" id="edit-my-vendor-social-media-profile">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Pricing</label>
                      <input type="number" class="form-control" name="pricing" id="edit-my-vendor-pricing">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <label>Notes</label>
                    <textarea class="form-control" name="notes" maxlength="250" id="edit-my-vendor-notes"></textarea>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <div class="links-box">
                      <input type="hidden" name="id" id="edit-my-vendor-id">
                      <button type="submit" class="dashbord-btn">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php render_confirm_modal_html_alert(); ?>
<?php render_modal_html_alert(); ?>
  <!-- <div class="modal fade def-popup add-todolist-popup" id="edit-todolist-popup" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header">
            <h4 class="modal-title">Edit Todolist</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span class="cross"></span>
            </button>
          </div>
          <div class="content-box">
            <form method="post" action="#">
              <div class="form-content">
                <div class="row">
                  <div class=" col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Title" required="">
                    </div>
                  </div>
                  <div class=" col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" required="">
                    </div>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Category*</label>
                    <input type="text" class="form-control" required="">
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Description" required=""></textarea>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Note</label>
                    <textarea class="form-control" placeholder="Note" required=""></textarea>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <div class="links-box">
                      <button type="submit" class="dashbord-btn">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->


  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php
get_footer('dashboard');
