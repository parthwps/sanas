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

<div class="wl-dashboard-wrapper dashboard">
    <div class="container-fluid wl-dashboard-content">
      <div class="my-profile profile-form">
        <div class="my-profile-box">
          <div class="my-profile-details">
            <div class="profile-img">
              <img src="assets/img/login-img.jpg" alt="" class="img-fluid rounded-circle" width="100" height="100">
              <button type="button" class="dashbord-btn">Edit Image</button>
            </div>
            <div class="profile-info">
              <div class="profile-info-title">
                <h4>Nancy</h4>
              </div>
              <p class="profile-info-text">Dream big. Think different. Do great!</p>
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
                  <li class="tab-btn active-btn" data-tab="#tab-11"> Profile Details </li>
                  <li class="tab-btn" data-tab="#tab-14">Social Madia</li>
                  <li class="tab-btn" data-tab="#tab-15">Change Password</li>
                  <li class="tab-btn" data-tab="#tab-16">Account Delete</li>
                </ul>
              </div>
            </div>
            <div class="guests-box tabs-content">
              <div class="tab active-tab" id="tab-11">
                <div class="form-block">
                  <form method="post" action="#">
                    <div class="form-box">
                      <div class="row">
                        <div class=" col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="" required="">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="" required="">
                          </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label> Email</label>
                            <input type="email" class="form-control" placeholder="" required="">
                          </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label> Phone Number</label>
                            <input type="text" class="form-control" placeholder="" required="">
                          </div>
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                          <label>About me</label>
                          <textarea placeholder="Thank You!" name="story" rows="5" cols="33"></textarea>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                          <button type="submit" class="dashbord-btn">Save
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
                          <input type="text" class="form-control" placeholder="https://www.facebook.com/"
                            required="">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label>Twitter</label>
                          <input type="text" class="form-control" placeholder="https://x.com/"
                            required="">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label>Instagram</label>
                          <input type="text" class="form-control" placeholder="https://www.instagram.com/"
                            required="">
                          </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                          <label>Youtube</label>
                          <input type="text" class="form-control" placeholder="https://www.youtube.com/"
                            required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <button type="submit" class="dashbord-btn">Save
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
sdfs
<?php
get_footer('dashboard');