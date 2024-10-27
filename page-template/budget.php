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
            <div class="add-link align-items-center">
              <a href="#" class="dashbord-btn"> Clear Budget</a>
              <a href="#" class="dashbord-btn" data-bs-toggle="modal" data-bs-target="#add-category-popup"> Add Category</a>
            </div>
          </div>
          <div class="budget-man-box">
            <div class="row row-gap-5">
              <div class="cat-col col-xl-4 col-lg-12 col-md-12 col-sm-12">
                <div class="links-box">
                  <div class="links">
                    <ul class="p-0" id="category_cost_section">
                      <li><a href="#">
                          <div class="ttl"><i class="fa-solid fa-cake-candles"></i><span class="txt">Cake</span>
                          </div>
                          <div class="count"><span>$2,944</span> <i class="fa fa-trash"></i></div>
                        </a></li>
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
      <div class="budget-man-box col-12">
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
              <a href="#" class="dashbord-btn mt-2 me-2"> Add New
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
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group ">
                      <label>CATEGORY NAME</label>
                      <input type="text" class="form-control" name="category_name" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group ">
                      <label>COST</label>
                      <input type="number" class="form-control" name="cost" required>
                    </div>
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php
get_footer('dashboard');
