<?php 
/**
    Template Name: Vendor List 
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
            <h3 class="pageheader-title">Vendors List</h3>
          </div>
        </div>
      </div>
      <div class="vendor">
        <div class="inner">
          <div class="todo-search-add-link justify-content-end">
            <div class="add-link">
              <a href="my-vendor.html" class=""> Move to My Vendors List</a>
                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#add-todolist-popup"> Add Vendor</a>
            </div>
          </div>
          <div class="todo-box">
            <div class="row">
              <div class="to-do-list-table d-table-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="inner-box3">
                  <div class="table-box upcoming-tasks">
                    <div class="table-responsive m-0">
                      <table class="table" id="vendor-table">
                        <thead>
                        <tr class="todo-check-title">
                          <th> <input type="checkbox" name="allCheck" id="all-select-chechbox"> </th>
                          <th>Category</th>
                          <th>Name</th>
                          <th>Ph#</th>
                          <th>Notes</th>
                          <th>Social Madia Profile</th>
                          <th>Pricing</th>
                          <th class="actions">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input type="checkbox"></td>
                          <td>Food</td>
                          <td>Martin</td>
                          <td>+5721458752</td>
                          <td>Thank You !</td>
                          <td>martinfood.com</td>
                          <td>$1450</td>
                          <td class="actions">
                            <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup">
                              <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="delete theme-btn">
                              <i class="fa-regular fa-trash-can"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox"></td>
                          <td>Photography</td>
                          <td>Ethen</td>
                          <td>+5745783648</td>
                          <td>Thank You !</td>
                          <td>EthenPhotography.com</td>
                          <td>$1840</td>
                          <td class="actions">
                            <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup">
                              <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="delete theme-btn">
                              <i class="fa-regular fa-trash-can"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox"></td>
                          <td>Musics</td>
                          <td>jack</td>
                          <td>+5721458752</td>
                          <td>Thank You !</td>
                          <td>jackMusics.com</td>
                          <td>$2000</td>
                          <td class="actions">
                            <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup">
                              <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="delete theme-btn">
                              <i class="fa-regular fa-trash-can"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox"></td>
                          <td>Decorations</td>
                          <td>dhaval</td>
                          <td>+5721458752</td>
                          <td>Thank You !</td>
                          <td>dhavalDecorations.com</td>
                          <td>$1000</td>
                          <td class="actions">
                            <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup">
                              <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="delete theme-btn">
                              <i class="fa-regular fa-trash-can"></i>
                            </a>
                          </td>
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
      </div>
    </div>
  </div>
  <div class="modal fade def-popup add-todolist-popup" id="add-todolist-popup" tabindex="-1" role="dialog"
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
            <form method="post" action="#">
              <div class="form-content">
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Category*</label>
                      <input type="text" class="form-control"  required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Name*</label>
                      <input type="text" class="form-control"  required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control"  required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="number" class="form-control"  required="">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label> Social Madia Profile</label>
                      <input type="url" class="form-control" >
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Pricing</label>
                      <input type="number" class="form-control" >
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <label>Notes</label>
                    <textarea class="form-control"></textarea>
                  </div>
                  <div class="form-group col-lg-12 col-sm-12">
                    <div class="links-box">
                      <button type="submit" class="dashbord-btn">Save</button>
                    </div>
                  </div>
                  <div class="links-box">
                    <button type="submit" class="dashbord-btn">Save and Add Another Vendor</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade def-popup add-todolist-popup" id="edit-todolist-popup" tabindex="-1" role="dialog"
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
            <form method="post" action="#">
              <div class="form-content">
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Category</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="number" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label> Social Madia Profile</label>
                      <input type="url" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12 col-sm-12">
                    <label>Notes</label>
                    <textarea class="form-control"></textarea>
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


<?php
get_footer('dashboard');