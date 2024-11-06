<?php 
/**
    Template Name: Budget 
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
    $table_name = $wpdb->prefix . 'budget_expense';
    $totals = $wpdb->get_row(
        $wpdb->prepare("
            SELECT 
                COALESCE(SUM(estimated_cost), 0) AS total_estimated,
                COALESCE(SUM(actual_cost), 0) AS total_actual,
                COALESCE(SUM(paid), 0) AS total_paid,
                COALESCE(SUM(due), 0) AS total_due
            FROM $table_name
            WHERE user_id = %d
        ", $current_user_id)
    );
?>

<div class="wl-dashboard-wrapper dashboard">
    <div class="container-fluid wl-dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h3 class="pageheader-title">Budget Calculator</h3>
          </div>
        </div>
      </div>
      <div class="dashboard-inner-box">
        <div class="specs-widget">
          <div class="row">
            <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
              <div class="card border-top-primary h-100">
                <div class="card-body">
                  <div class="text-muted">Estimated</div>
                  <div class="icon"><i class="fa-solid fa-list" aria-hidden="true"></i></div>
                  <div class="count">
                    <span>$<?php echo number_format($totals->total_estimated, 0); ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
              <div class="card border-top-primary h-100">
                <div class="card-body">
                  <div class="text-muted">Actual</div>
                  <div class="icon"><i class="fa fa-chart-line" aria-hidden="true"></i></div>
                  <div class="count">
                    <span>$<?php echo number_format($totals->total_actual, 0); ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
              <div class="card border-top-primary h-100">
                <div class="card-body">
                  <div class="text-muted">Paid</div>
                  <div class="icon"><i class="fa fa-check-square"></i></div>
                  <div class="count">
                    <span>$<?php echo number_format($totals->total_paid, 0); ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
              <div class="card border-top-primary h-100">
                <div class="card-body">
                  <div class="text-muted">Due</div>
                  <div class="icon"><i class="fa fa-file-alt"></i></div>
                  <div class="count">
                    <span>$<?php echo number_format($totals->total_due, 0); ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="budget-man">
        <div class="inner">
          <div class="title-box">
            <div class="title"><h4>Manage Budget</h4></div>
            <p>Select from below categories or add new category, then enter expense for each</p>
            <div class="add-link align-items-center">
              <a href="#" class="dashbord-btn"> Clear Budget</a>
            </div>
          </div>
          <div class="budget-man-box">
            <div class="row row-gap-5">
              <div class="cat-col col-xl-4 col-lg-12 col-md-12 col-sm-12">
                <div class="links-box">
                  <div class="links">
                      <div class="add-link align-items-center">
                        <a href="#" class="dashbord-btn" data-bs-toggle="modal" data-bs-target="#add-category-popup"> Add Category</a>
                      </div>
                    <ul class="p-0" id="category_cost_section">
                      <?php
                      $categories = get_all_budget_categories();
                      ?>
                      <?php if ($categories): ?>
                      <?php $expense_totals = $wpdb->get_results(
                            $wpdb->prepare("
                                SELECT category_id, SUM(estimated_cost) as total_expense 
                                FROM {$wpdb->prefix}budget_expense
                                WHERE user_id = %d
                                GROUP BY category_id
                            ", $current_user_id),
                            OBJECT_K
                        );
                        $i = 0;
                        // Sort categories by created_at date in descending order
                        usort($categories, function($a, $b) {
                            return strtotime($b['created_at']) - strtotime($a['created_at']);
                        });
                        foreach ($categories as $index => $category) {
                            $category_id = $category['id'];
                            if($i == 0){
                              $first_category = $category_id;
                              $i++;
                            }
                            $total_expense = isset($expense_totals[$category_id]) ? $expense_totals[$category_id]->total_expense : 0;
                            $js_categories[] = esc_js($category['category_name']);
                            $js_expenses[] = (float) $total_expense;
                            ?>
                            
                            <li<?php echo (empty($_GET['category']) && $index === 0) || (isset($_GET['category']) && $_GET['category'] == $category_id) ? ' class="active"' : ''; ?>>
                                <a href="javascript:void(0)" class="budget-category-item" data-id="<?php echo esc_attr($category['id']); ?>">
                                    <div class="ttl">
                                        <i class="fa-solid fa-<?php echo !empty($category['icon_class']) ? esc_attr($category['icon_class']) : strtolower(substr($category['category_name'], 0, 1)); ?>"></i>
                                        <span class="txt"><?php echo esc_html($category['category_name']); ?></span>
                                    </div>
                                    <div class="count">
                                        <span>$<?php echo $total_expense; ?></span>
                                        <i class="fa fa-trash<?php echo $category['user_id'] != 0 ? ' delete' : ''; ?>" <?php echo $category['user_id'] != 0 ? 'data-id="' . esc_attr($category['id']) . '"' : ''; ?>></i>
                                    </div>
                                </a>
                            </li>
                            
                            <?php
                        } ?>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <!--Budget Column-->
              <div class="budget-col col-xl-8 col-lg-12 col-md-12 col-sm-12">
                <div class="info-box">
                  <div class="info-top-box">
                    <div class="info">
                      <div class="title">Budget</div>
                      <div class="subtitle">ESTIMATED COST</div>
                      <div class="p-box">
                        <span class="curr">$</span>
                        <span class="amount"><?php echo $totals->total_estimated; ?></span>
                      </div>
                      <div class="instr">To edit estimated cost edit estimated cost on expenses.</div>
                    </div>
                    <div class="graph-box">
                      <div class="title">Total Budget</div>
                      <div class="graph">
                        <div id="donut-chart-1"></div>
                      </div>
                    </div>
                  </div>
                  <p class="text-center mb-3">Scroll Down To Add Expenses Under Each Category</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="budget-man-box col-12" id="budget-expense-box">
        <div class="inner">
          <div class="lower-box">
            <div class="info-box">
              <div class="cat-info">
                <?php
                foreach ($categories as $index => $category) {
                  if (isset($_GET['category']) && $_GET['category'] == $category['id']) {
                    $category_name_temp = $category['category_name'];
                    $category_icon = $category['icon_class'];
                    break;
                  }
                }
                ?>
                <div class="icon-box"><i class="fa-solid fa-<?php echo $category_icon; ?>"></i></div>
                <div class="category_name_box"><?php echo $category_name_temp;?></div>
                <div class="cost">
                  <span class="c-text">Estimated cost: <span class="category_estimated">$ 12,320</span></span>
                  <span class="c-text">Actual cost: <span class="category_actual">$ 0</span></span>
                </div>
              </div>
            </div>
            <div class="add-link justify-content-between">
               <div class="title">
                <h4>Expense</h4>
               </div>
              <a href="#" class="dashbord-btn mt-2 me-2" data-bs-toggle="modal" data-bs-target="#add-expense-popup"> Add New
                Expense</a>
            </div>
            <div class="table-box upcoming-tasks">
              <div class="table-responsive">
                <table class="table" id="budget-expense">
                  <thead>
                    <tr>
                      <th>Expense</th>
                      <th>Vendor Name</th>
                      <th>Vendor Contact Info</th>
                      <th>Estimated Cost</th>
                      <th>Actual Cost</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th class="actions">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($_GET['category'] != '') {
                      $expense_category = $_GET['category'];
                    } else {
                      $expense_category = $first_category;
                    }
                    $expenses = get_expense_list($expense_category);
                    $total_estimated = 0;
                    $total_actual = 0;
                    $total_paid = 0;
                    $total_due = 0;
                    
                    foreach ($expenses as $expense) {
                        $total_estimated += $expense['estimated_cost'];
                        $total_actual += $expense['actual_cost']; 
                        $total_paid += $expense['paid'];
                        $total_due += $expense['due'];
                        ?>
                        <tr>
                            <td class="expense"><?php echo esc_html($expense['expense']); ?></td>
                            <td><?php echo esc_html($expense['vendor_name']); ?></td>
                            <td><?php echo esc_html($expense['vendor_contact']); ?></td>
                            <td>$<?php echo esc_html($expense['estimated_cost']); ?></td>
                            <td>$<?php echo esc_html($expense['actual_cost']); ?></td>
                            <td>$<?php echo esc_html($expense['paid']); ?></td>
                            <td>$<?php echo esc_html($expense['due']); ?></td>
                            <td class="actions">
                                <a href="#" class="edit theme-btn" data-id="<?php echo esc_attr($expense['id']); ?>" data-bs-toggle="modal" data-bs-target="#edit-expense-popup">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="#" class="delete theme-btn" data-id="<?php echo esc_attr($expense['id']); ?>">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>Total</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>$<?php echo esc_html($total_estimated); ?></td>
                        <td>$<?php echo esc_html($total_actual); ?></td>
                        <td>$<?php echo esc_html($total_paid); ?></td>
                        <td>$<?php echo esc_html($total_due); ?></td>
                        <td class="actions">&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade def-popup add-category-popup" id="add-category-popup" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header">
            <h4 class="modal-title">Add Category</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span class="cross"></span>
            </button>
          </div>
          <div class="content-box">
            <form method="post" action="#" id="add-budget-category-form">
              <div class="form-content">
                <div class="row">
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group ">
                      <label>CATEGORY NAME</label>
                      <input type="text" class="form-control" name="category_name" required>
                    </div>
                  </div>
                  <!-- <div class="col-lg-6 col-sm-12">
                    <div class="form-group ">
                      <label>COST</label>
                      <input type="number" class="form-control" name="cost" required>
                    </div>
                  </div> -->
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
  </div>
  <div class="modal fade def-popup add-expense-popup" id="add-expense-popup" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header">
            <h4 class="modal-title">Add Expense</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span class="cross"></span>
            </button>
          </div>
          <div class="content-box">
            <form id="add-vendor-form" method="post" action="#">
              <div class="form-content">
                <div class="row">
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Expense*</label>
                      <input type="text" name="expense" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Vendor Name</label>
                      <input type="text" name="vendor_name" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Vendor Contact Info</label>
                      <input type="number" name="vendor_contact" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Estimated Cost</label>
                      <input type="number" name="estimated_cost" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Actual Cost</label>
                      <input type="number" name="actual_cost" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Due</label>
                      <input type="number" name="due" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <div class="links-box">
                      <button type="submit" class="dashbord-btn">Save</button>
                      <button type="submit" id="add-new-expense" class="dashbord-btn">Save and Add Another Expense</button>                    
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
  <div class="modal fade def-popup add-expense-popup" id="edit-expense-popup" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-header">
            <h4 class="modal-title">Edit Expense</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span class="cross"></span>
            </button>
          </div>
          <div class="content-box">
            <form method="post" id="edit-vendor-form" action="#">
              <div class="form-content">
                <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Expense*</label>
                      <input type="text" name="expense" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Vendor Name</label>
                      <input type="text" name="vendor_name" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Vendor Contact Info</label>
                      <input type="number" name="vendor_contact" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Estimated Cost</label>
                      <input type="number" name="estimated_cost" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Actual Cost</label>
                      <input type="number" name="actual_cost" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Due</label>
                      <input type="number" name="due" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <div class="links-box">
                      <input type="hidden" name="id" id="edit-expense-id">
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

  <script>
    jQuery(document).ready(function () {
      if (jQuery('#donut-chart-1').length) {
        var categories = <?php echo json_encode($js_categories); ?>;
        var expenses = <?php echo json_encode($js_expenses); ?>;
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
              color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
          }

          // Generate random colors for each category
          var randomColors = categories.map(function() {
            return getRandomColor();
          });
        var options = {
            series: expenses,
            colors: randomColors,
            labels: categories,
            markers: false,
            chart: {
                type: 'donut',
                width: 400
            },
            legend: {
              show: true,
              position: 'bottom',
              formatter: function(seriesName, opts) {
                // Show legend only for the first 10 series
                return opts.seriesIndex < 10 ? seriesName : '';
              }
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '55%'
                    }
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 250
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#donut-chart-1"), options);
        chart.render();
    }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php render_confirm_modal_html_alert(); ?>
<?php render_modal_html_alert(); ?>
<?php
get_footer('dashboard');
