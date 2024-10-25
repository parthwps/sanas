<?php 
/**
    Template Name: My Vendors   
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
            <h3 class="pageheader-title"> My Vendors</h3>
          </div>
        </div>
      </div>
      <div class="vendor">
        <div class="inner">
          <div class="todo-search-add-link justify-content-end">
            <div class="add-link">
                <a href="#" class="" data-bs-toggle="modal" data-bs-target="#add-todolist-popup"> Add Vendor</a>
            </div>
          </div>
          <div class="todo-box">
            <div class="row">
              <div class="to-do-list-table d-table-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="inner-box3">
                  <div class="table-box upcoming-tasks">
                    <div class="table-responsive m-0">
                      <div id="vendor-table_wrapper" class="dt-container dt-empty-footer"><div class="dt-layout-row"><div class="dt-layout-cell dt-start "><div class="dt-length"><select name="vendor-table_length" aria-controls="vendor-table" class="dt-input" id="dt-length-0"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><label for="dt-length-0"> entries per page</label></div></div><div class="dt-layout-cell dt-end "><div class="dt-search"><label for="dt-search-0">Search:</label><input type="search" class="dt-input" id="dt-search-0" placeholder="" aria-controls="vendor-table"></div></div></div><div class="dt-layout-row dt-layout-table"><div class="dt-layout-cell "><table class="table dataTable" id="vendor-table" aria-describedby="vendor-table_info" style="width: 1020px;"><colgroup><col data-dt-column="0" style="width: 38px;"><col data-dt-column="1" style="width: 140.305px;"><col data-dt-column="2" style="width: 87.1094px;"><col data-dt-column="3" style="width: 151.797px;"><col data-dt-column="4" style="width: 153px;"><col data-dt-column="5" style="width: 229.93px;"><col data-dt-column="6" style="width: 96.0469px;"><col data-dt-column="7" style="width: 123.812px;"></colgroup>
                        <thead>
                        <tr class="todo-check-title" role="row"><th data-dt-column="0" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-asc" aria-sort="ascending" aria-label="  : Activate to invert sorting" tabindex="0"><span class="dt-column-title" role="button"> <input type="checkbox" name="allCheck" id="all-select-chechbox"> </span><span class="dt-column-order"></span></th><th data-dt-column="1" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Category: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Category</span><span class="dt-column-order"></span></th><th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Name: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Name</span><span class="dt-column-order"></span></th><th data-dt-column="3" rowspan="1" colspan="1" class="dt-type-numeric dt-orderable-asc dt-orderable-desc" aria-label="Ph#: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Ph#</span><span class="dt-column-order"></span></th><th data-dt-column="4" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Notes: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Notes</span><span class="dt-column-order"></span></th><th data-dt-column="5" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Social Madia Profile: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Social Madia Profile</span><span class="dt-column-order"></span></th><th data-dt-column="6" rowspan="1" colspan="1" class="dt-type-numeric dt-orderable-asc dt-orderable-desc" aria-label="Pricing: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Pricing</span><span class="dt-column-order"></span></th><th class="actions dt-orderable-asc dt-orderable-desc" data-dt-column="7" rowspan="1" colspan="1" aria-label="Actions: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Actions</span><span class="dt-column-order"></span></th></tr>
                      </thead>
                      <tbody><tr>
                          <td class="sorting_1"><input type="checkbox"></td>
                          <td>Food</td>
                          <td>Martin</td>
                          <td class="dt-type-numeric">+5721458752</td>
                          <td>Thank You !</td>
                          <td>martinfood.com</td>
                          <td class="dt-type-numeric">$1450</td>
                          <td class="actions">
                            <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup">
                              <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="delete theme-btn">
                              <i class="fa-regular fa-trash-can"></i>
                            </a>
                          </td>
                        </tr><tr>
                          <td class="sorting_1"><input type="checkbox"></td>
                          <td>Photography</td>
                          <td>Ethen</td>
                          <td class="dt-type-numeric">+5745783648</td>
                          <td>Thank You !</td>
                          <td>EthenPhotography.com</td>
                          <td class="dt-type-numeric">$1840</td>
                          <td class="actions">
                            <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup">
                              <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="delete theme-btn">
                              <i class="fa-regular fa-trash-can"></i>
                            </a>
                          </td>
                        </tr></tbody>
                      <tfoot></tfoot></table></div></div><div class="dt-layout-row"><div class="dt-layout-cell dt-start "><div class="dt-info" aria-live="polite" id="vendor-table_info" role="status">Showing 1 to 2 of 2 entries</div></div><div class="dt-layout-cell dt-end "><div class="dt-paging paging_full_numbers"><button class="dt-paging-button disabled first" role="link" type="button" aria-controls="vendor-table" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1">«</button><button class="dt-paging-button disabled previous" role="link" type="button" aria-controls="vendor-table" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1">‹</button><button class="dt-paging-button current" role="link" type="button" aria-controls="vendor-table" aria-current="page" data-dt-idx="0" tabindex="0">1</button><button class="dt-paging-button disabled next" role="link" type="button" aria-controls="vendor-table" aria-disabled="true" aria-label="Next" data-dt-idx="next" tabindex="-1">›</button><button class="dt-paging-button disabled last" role="link" type="button" aria-controls="vendor-table" aria-disabled="true" aria-label="Last" data-dt-idx="last" tabindex="-1">»</button></div></div></div></div>
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

<?php
get_footer('dashboard');