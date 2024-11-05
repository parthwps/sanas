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
                    <span>$89850</span>
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
                    <span>$78238</span>
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
                    <span>$25579</span>
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
                    <span>$52659</span>
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
          </div>
          <!-- <div class="add-link align-items-center">
              <a href="#" class="dashbord-btn"> Clear Budget</a>
            </div> -->
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
                      <?php foreach ($categories as $index => $category): ?>
                        <li<?php echo $index === 0 ? ' class="active"' : ''; ?>><a href="#budget-expense-box">
                          <div class="ttl">
                            <i class="fa-solid fa-<?php echo !empty($category['icon_class']) ? $category['icon_class'] : strtolower(substr($category['category_name'], 0, 1)); ?>"></i>
                            <span class="txt"><?php echo esc_html($category['category_name']); ?></span>
                          </div>
                          <div class="count">
                            <span>$<?php if(esc_html($category['cost']) != ""){echo esc_html($category['cost']);}else{echo "1000";} ?></span>
                            <i class="fa fa-trash<?php echo $category['user_id'] != 0 ? ' delete' : ''; ?>" <?php echo $category['user_id'] != 0 ? 'data-id="' . esc_attr($category['id']) . '"' : ''; ?>></i>
                          </div>
                        </a></li>
                      <?php endforeach; ?>
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
                        <span class="amount">42,000</span>
                      </div>
                      <div class="instr">You can edit this at any time.</div>
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
                <div class="icon-box"><i class="fa-solid fa-bowl-food"></i></div>
                <div class="subtitle">Catering</div>
                <div class="cost">
                  <span class="c-text">Estimated cost: <span>$ 12,320</span></span>
                  <span class="c-text">Actual cost: <span>$ 0</span></span>
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
                    <tr>
                      <td class="expence">Red Dress</td>
                      <td>Martin</td>
                      <td>+8475486751</td>
                      <td>$2,500</td>
                      <td>$0</td>
                      <td>$0</td>
                      <td>$1011</td>
                      <td class="actions">
                        <a href="#" class="edit theme-btn" data-bs-toggle="modal"
                          data-bs-target="#edit-category-popup"><i class="fa-solid fa-pen"></i></a>
                        <a href="#" class="delete theme-btn"><i class="fa-regular fa-trash-can"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td class="expence">Pink Dress</td>
                      <td>Martin</td>
                      <td>+8475486751</td>
                      <td>$2,500</td>
                      <td>$0</td>
                      <td>$0</td>
                      <td>$390</td>
                      <td class="actions">
                        <a href="#" class="edit theme-btn" data-bs-toggle="modal"
                          data-bs-target="#edit-category-popup"><i class="fa-solid fa-pen"></i></a>
                        <a href="#" class="delete theme-btn"><i class="fa-regular fa-trash-can"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Total</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>$5,000</td>
                      <td>$0</td>
                      <td>$0</td>
                      <td>$3300</td>
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
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Expense*</label>
                      <input type="text" name="expense" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Vendor Name</label>
                      <input type="text" name="vendor_name" class="form-control" required="">
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
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Actual Cost</label>
                      <input type="number" name="actual_cost" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
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
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Expense*</label>
                      <input type="text" name="expense" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Vendor Name</label>
                      <input type="text" name="vendor_name" class="form-control" required="">
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
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Actual Cost</label>
                      <input type="number" name="actual_cost" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
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
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php render_confirm_modal_html_alert(); ?>
<?php render_modal_html_alert(); ?>
<?php
get_footer('dashboard');
