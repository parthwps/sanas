document.addEventListener('DOMContentLoaded', () => {
    const tooltipTriggerList = document.querySelectorAll('[data-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});

if (window.location.pathname === '/to-do-list/') {
document.addEventListener('DOMContentLoaded', () => {
    const today = new Date();
    document.getElementById('edit-todo-date').value = today.toISOString().split('T')[0];
    document.getElementById('add-todo-date').value = today.toISOString().split('T')[0];
  });
jQuery(document).ready(function($) {
    jQuery('#add-todo-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=add_todo_item',
            success: function(response) {
                if (response.success) {
                    $('#add-todolist-popup').modal('hide');
                    $('#exampleModalLabel').text('Success');
                    $('#modal-body-text').text(response.data);
                    $('#modal_html_alert').modal('show');
                    recalculate_task();
                    $('#render-modal-yes-button').on('click', function() {
                        location.reload();
                    });
                } else {
                    $('#exampleModalLabel').text('Error');
                    $('#modal-body-text').text(response.data);
                    $('#modal_html_alert').modal('show');
                    $('#render-modal-yes-button').on('click', function() {
                        $('#modal_html_alert').modal('hide');
                    });
                }
            }
        });
    });

    // Edit To-Do Item
    jQuery('#edit-todo-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=edit_todo_item',
            success: function(response) {
                if (response.success) {
                    // Hide add-todolist-popup
                    $('#edit-todolist-popup').modal('hide');
                    // Set the modal title and message
                    $('#exampleModalLabel').text('Success');
                    $('#modal-body-text').text(response.data);
                    // Show the modal
                    $('#modal_html_alert').modal('show');

                    // Handle the click event on the "Yes" button in the modal
                    $('#render-modal-yes-button').on('click', function() {
                        location.reload();
                    });
                } else {
                    // Set the modal title and message
                    $('#exampleModalLabel').text('Error');
                    $('#modal-body-text').text(response.data);
                    // Show the modal
                    $('#modal_html_alert').modal('show');

                    // Handle the click event on the "Yes" button in the modal
                    $('#render-modal-yes-button').on('click', function() {
                        $('#modal_html_alert').modal('hide');
                    });
                }
            }
        });
    });

  
  jQuery(".checkSingle").on("change", function () {
    var $checkbox = jQuery(this);
    var completed = $checkbox.is(":checked") ? 1 : 0;
    var todoId = $checkbox.attr("id").split("-").pop();

    $.ajax({
      type: "POST",
      url: ajax_object.ajax_url,
      data: {
        action: "toggle_todo_completed",
        id: todoId,
        completed: completed,
        security: ajax_object.security // Include if you're using a nonce for security
      },
      success: function (response) {
        if (response.success) {
            //
        } else {
          console.log("Something went wrong: " + response.data);
        }
      }
    });
  });
   // Function to show the modal
    function show_alert_message2(title, message) {
        $('#exampleConfirmModalLabel').text(title);
        $('#confirm_modal-body-text').text(message);
        $('#confirm_modal_html_alert').modal('show');
    }

    // When "Yes" button is clicked
    $('#modal-yes-button').on('click', function () {
        // Trigger the removal process
        proceedWithRemoval();
        $('#confirm_modal_html_alert').modal('hide');
    });

    // Function to handle the AJAX call for removal
    function proceedWithRemoval() {
        var todoId = currentTodoId;

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: { id: todoId, action: 'delete_todo_item' },
            success: function(response) {
                if (response.success) {
                    location.reload();
                } else {
                    // Set the modal title and message
                    $('#exampleModalLabel').text('Error');
                    $('#modal-body-text').text(response.data);
                    // Show the modal
                    $('#modal_html_alert').modal('show');

                    // Handle the click event on the "Yes" button in the modal
                    $('#render-modal-yes-button').on('click', function() {
                        $('#modal_html_alert').modal('hide');
                    });
                }
            }
        });
    }

    // Keep track of the todo ID for the current action
    var currentTodoId;

    // Click handler for the delete icon
    $(".delete").on("click", function (e) {
        e.preventDefault();
        currentTodoId = $(this).data("id");

        show_alert_message2('Delete Task', 'Do you want to delete this task?');
    });
    
function countDropdowns() {
var totalDropdowns = jQuery('.todo-list .status-dropdown').length;
var completedDropdowns = jQuery('.todo-list .status-dropdown').filter(function() {
  return jQuery(this).val() === 'Completed';
}).length;
return { total: totalDropdowns, completed: completedDropdowns };
}
function recalculate_task(){
    var counts = countDropdowns();
    var countmultiple = 100 / counts.total;
    var percent = countmultiple * counts.completed;
    jQuery('.tast-count-com').text(counts.completed);
    jQuery('.tast-count-total').text(counts.total);
    jQuery('#todo_progressbar').css('width', percent + '%');
}
    jQuery(".status-dropdown").on("change", function () {
        var status = jQuery(this).val();
        var id = jQuery(this).data("id");

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_todo_status',
                status: status,
                id: id,
                security: ajax_object.security
            },
            success: function (response) {
                if (response.success) {
                    recalculate_task();
                } else {
                    // console.log("Error: " + response.data);
                }
            }
        });
    });

    // Get To-Do Item for Editing
    jQuery('.edit').on('click', function() {
        var todoId = jQuery(this).data('id');
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: { id: todoId, action: 'get_todo_item' },
            success: function(response) {
                if (response.success) {
                    $('#edit-todo-id').val(response.data.id);
                    $('#edit-todo-title').val(response.data.title);
                    $('#edit-todo-date').val(response.data.date);
                    $('#edit-todo-category').val(response.data.category);
                    $('#edit-todo-notes').val(response.data.notes);
                    $('#edit-todolist-popup').modal('show');
                }
            }
        });
    });
    const tooltipTriggerList = document.querySelectorAll('[data-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});
}

if (window.location.pathname === '/vendors-list/') {
    jQuery(document).ready(function($) {

        // Add Vendor Item
        jQuery('#add-vendor-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var addAnother = $(e.originalEvent.submitter).attr('id') === 'add-new-vendor';
            
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: formData + '&action=add_vendor_item',
                success: function(response) {
                    if (response.success) {
                        if (addAnother) {
                            // add temporary message
                            jQuery('#add-vendor-form').append('<p id="temporary-message">Vendor item added successfully.</p>');
                            setTimeout(function() {
                                jQuery('#temporary-message').fadeOut(500, function() {
                                    jQuery(this).remove();
                                });
                            }, 3000);
                            // Update the vendor table with the new data
                            $('#vendor-table tbody').html(response.data);
                            // Clear form fields
                            $('#add-vendor-form')[0].reset();
                            // Open the form again (assuming it's in a modal)
                            $('#add-todolist-popup').modal('show');
                        } else {
                            // Hide add-vendor-popup
                            $('#add-todolist-popup').modal('hide');
                            // Set the modal title and message
                            $('#exampleModalLabel').text('Success');
                            $('#modal-body-text').text('Vendor item added successfully.');
                            // Show the modal
                            $('#modal_html_alert').modal('show');

                            // Handle the click event on the "Yes" button in the modal
                            $('#render-modal-yes-button').on('click', function() {
                                location.reload();
                            });
                        }
                    } else {
                        alert(response.data);
                    }
                }
            });
        });

        // Select All Checkbox
        jQuery('#all-select-chechbox').on('change', function() {
            var allChecked = $(this).is(':checked');
            $('.checkSingle').prop('checked', allChecked);
        });

        // Get Vendor Item for Editing
        jQuery('.edit').on('click', function() {
            var vendorId = jQuery(this).data('id');
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: { id: vendorId, action: 'get_vendor_list_item' },
                success: function(response) {
                    if (response.success) {
                        $('#edit-vendor-id').val(response.data.id);
                        $('#edit-vendor-category').val(response.data.category);
                        $('#edit-vendor-name').val(response.data.name);
                        $('#edit-vendor-email').val(response.data.email);
                        $('#edit-vendor-phone').val(response.data.phone);
                        $('#edit-vendor-notes').val(response.data.notes);
                        $('#edit-vendor-social-media-profile').val(response.data.social_media_profile);
                        $('#edit-vendor-pricing').val(response.data.pricing);
                        $('#edit-todolist-popup').modal('show');
                    }
                }
            });
        });

        // Edit Vendor Item
        jQuery('#edit-vendor-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: formData + '&action=edit_vendor_item',
                success: function(response) {
                    if (response.success) {
                        // Hide add-vendor-popup
                        $('#edit-todolist-popup').modal('hide');
                        // Set the modal title and message
                        $('#exampleModalLabel').text('Success');
                        $('#modal-body-text').text(response.data);
                        // Show the modal
                        $('#modal_html_alert').modal('show');
                        $('#render-modal-yes-button').on('click', function() {
                            location.reload();
                        });
                    } else {
                        alert(response.data);
                    }
                }
            });
        });

        jQuery(document).ready(function($) {
            // Move to My Vendors List button click
            $('.add-link-btn').on('click', function(e) {
                e.preventDefault();
                var selectedVendors = $('.checkSingle:checked').map(function() {
                    return $(this).closest('tr').find('.edit').data('id');
                }).get();

                if (selectedVendors.length === 0) {
                    // alert('Please select at least one vendor to move to the "My Vendors" page.');
                    // Set the modal title and message
                    $('#exampleModalLabel').text('Error');
                    $('#modal-body-text').text('Please select at least one vendor to move to the "My Vendors" page.');
                    // Show the modal
                    $('#modal_html_alert').modal('show');

                    // Handle the click event on the "Yes" button in the modal
                    $('#render-modal-yes-button').on('click', function() {
                        $('#modal_html_alert').modal('hide');
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: ajax_object.ajax_url,
                        data: {
                            action: 'move_vendors_to_my_list',
                            vendor_ids: selectedVendors
                        },
                        success: function(response) {
                            if (response.success) {
                                // Set the modal title and message
                                $('#exampleModalLabel').text('Success');
                                $('#modal-body-text').text(response.data);
                                // Show the modal
                                $('#modal_html_alert').modal('show');

                                // Handle the click event on the "Yes" button in the modal
                                $('#render-modal-yes-button').on('click', function() {
                                    location.reload();
                                });
                            } else {
                                // Set the modal title and message
                                $('#exampleModalLabel').text('Error');
                                $('#modal-body-text').text(response.data);
                                // Show the modal
                                $('#modal_html_alert').modal('show');

                                // Handle the click event on the "Yes" button in the modal
                                $('#render-modal-yes-button').on('click', function() {
                                    $('#modal_html_alert').modal('hide');
                                });
                            }
                        }
                    });
                }
            });
        });

        // Function to show the modal
        function show_alert_message2(title, message) {
            $('#exampleConfirmModalLabel').text(title);
            $('#confirm_modal-body-text').text(message);
            $('#confirm_modal_html_alert').modal('show');
        }

        // When "Yes" button is clicked
        $('#modal-yes-button').on('click', function () {
            // Trigger the removal process
            proceedWithRemoval();
            $('#confirm_modal_html_alert').modal('hide');
        });

        // Function to handle the AJAX call for removal
        function proceedWithRemoval() {
            var vendorId = currentVendorId;

            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: { id: vendorId, action: 'delete_vendor_item' },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert(response.data);  
                    }
                }
            });
        }

        // Keep track of the vendor ID for the current action
        var currentVendorId;

        // Click handler for the delete icon
        $(".delete").on("click", function (e) {
            e.preventDefault();
            currentVendorId = $(this).data("id");

            show_alert_message2('Delete Vendor', 'Are you sure you want to delete this vendor?');
        });
    });
}

if (window.location.pathname === '/my-vendors/' || window.location.pathname === '/my-dashboard/') {
    jQuery(document).ready(function($) {
        let buttonDataId;
        jQuery('#add-my-vendor-form button[type="submit"]').click(function() {
            buttonDataId = jQuery(this).data('id');
        });
        jQuery('#add-my-vendor-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: formData + '&action=add_my_vendor_item',
                success: function(response) {
                    if (response.success) {
                        if(buttonDataId == 0){
                            $('#add-todolist-popup').modal('hide');
                            $('#exampleModalLabel').text('Success');
                            $('#modal-body-text').text('Vendor item added successfully.');
                            $('#modal_html_alert').modal('show');
                            $('#render-modal-yes-button').on('click', function() {
                                location.reload();
                            });
                        }
                        if(buttonDataId == 1){
                            // add temporary message
                            jQuery('#add-my-vendor-form').append('<p id="temporary-message">Vendor item added successfully.</p>');
                            setTimeout(function() {
                                jQuery('#temporary-message').fadeOut(500, function() {
                                    jQuery(this).remove();
                                });
                            }, 3000);
                            // Update the vendor table with the new data
                            $('#vendor-table tbody').html(response.data);
                            // Clear form fields
                            $('#add-my-vendor-form')[0].reset();
                            // Open the form again (assuming it's in a modal)
                            $('#add-todolist-popup').modal('show');
                        }
                    } else {
                        // Set the modal title and message
                        $('#exampleModalLabel').text('Error');
                        $('#modal-body-text').text(response.data);
                        // Show the modal
                        $('#modal_html_alert').modal('show');

                        // Handle the click event on the "Yes" button in the modal
                        $('#render-modal-yes-button').on('click', function() {
                            $('#modal_html_alert').modal('hide');
                        });
                    }
                }
            });
        });

        // Get My Vendor Item for Editing
        jQuery('.edit-myvendor').on('click', function() {
            console.log('edit');
            var vendorId = jQuery(this).data('id');
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: { id: vendorId, action: 'get_my_vendor_list_item' },
                success: function(response) {
                    if (response.success) {
                        $('#edit-my-vendor-id').val(response.data.id);
                        $('#edit-my-vendor-category').val(response.data.category);
                        $('#edit-my-vendor-name').val(response.data.name);
                        $('#edit-my-vendor-email').val(response.data.email);
                        $('#edit-my-vendor-phone').val(response.data.phone);
                        $('#edit-my-vendor-notes').val(response.data.notes);
                        $('#edit-my-vendor-social-media-profile').val(response.data.social_media_profile);
                        $('#edit-my-vendor-pricing').val(response.data.pricing);
                        $('#edit-todolist-popup').modal('show');
                    }
                }
            });
        });

        // Edit My Vendor Item
        jQuery('#edit-my-vendor-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: formData + '&action=edit_my_vendor_item',
                success: function(response) {
                    if (response.success) {
                        // Hide add-vendor-popup
                        $('#edit-todolist-popup').modal('hide');
                        // Set the modal title and message
                        $('#exampleModalLabel').text('Success');
                        $('#modal-body-text').text(response.data);
                        // Show the modal
                        $('#modal_html_alert').modal('show');

                        // Handle the click event on the "Yes" button in the modal
                        $('#render-modal-yes-button').on('click', function() {
                            location.reload();
                        });
                    } else {
                        // Set the modal title and message
                        $('#exampleModalLabel').text('Error');
                        $('#modal-body-text').text(response.data);
                        // Show the modal
                        $('#modal_html_alert').modal('show');

                        // Handle the click event on the "Yes" button in the modal
                        $('#render-modal-yes-button').on('click', function() {
                            $('#modal_html_alert').modal('hide');
                        });
                    }
                }
            });
        });

        // Function to show the modal
        function show_alert_message2(title, message) {
            $('#exampleConfirmModalLabel').text(title);
            $('#confirm_modal-body-text').text(message);
            $('#confirm_modal_html_alert').modal('show');
        }
        
        // When "Yes" button is clicked
        $('#modal-yes-button').on('click', function () {
            // Trigger the removal process
            proceedWithRemoval();
            $('#confirm_modal_html_alert').modal('hide');
        });
        
        // Function to handle the AJAX call for removal
        function proceedWithRemoval() {
            var vendorId = currentVendorId;
        
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: { id: vendorId, action: 'delete_my_vendor_item' },
                success: function(response) {   
                    if (response.success) {
                        location.reload();
                    } else {
                        alert(response.data);  
                    }
                }
            });
        }
        
        // Keep track of the vendor ID for the current action
        var currentVendorId;
        
        // Click handler for the delete icon
        $(".delete").on("click", function (e) {
            e.preventDefault();
            currentVendorId = $(this).data("id");
        
            show_alert_message2('Delete My Vendor', 'Do you want to delete this entry?');
        });
    }); 
}

if (window.location.pathname === '/budget/') {
    jQuery(document).ready(function($) {
        // Add Budget Category Item
        jQuery('#add-budget-category-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: formData + '&action=add_budget_category_item',
                success: function(response) {
                    if (response.success) {
                        alert(response.data);
                        location.reload();
                    } else {
                        alert(response.data);
                    }
                }
            });
        });

        jQuery('.delete').on('click', function() {
            var categoryId = jQuery(this).data('id');
            if (confirm('Do you want to delete this entry?')) {
                $.ajax({
                    type: 'POST',
                    url: ajax_object.ajax_url,
                        data: { id: categoryId, action: 'delete_budget_category_item' },
                    success: function(response) {
                        if (response.success) {
                            alert(response.data);
                            location.reload();
                        } else {
                            alert(response.data);
                        }
                    }
                });
            }
        });
    });
}

if (window.location.pathname === '/my-favorites/') {
    jQuery(document).ready(function ($) {
        // Function to show the modal
        function show_alert_message2(title, message) {
            $('#exampleConfirmModalLabel').text(title);
            $('#confirm_modal-body-text').text(message);
            $('#confirm_modal_html_alert').modal('show');
        }

        // When "Yes" button is clicked
        $('#modal-yes-button').on('click', function () {
            // Trigger the removal process
            proceedWithRemoval();
            $('#confirm_modal_html_alert').modal('hide');
        });

        // Function to handle the AJAX call for removal
        function proceedWithRemoval() {
            var $icon = $('.wishlist-delete-icon[data-card-id="' + currentCardId + '"]');

            $.ajax({
                url: sanas_ajax_object.ajax_url,
                type: "POST",
                data: {
                    action: "remove_from_wishlist",
                    card_id: currentCardId,
                    security: sanas_ajax_object.security,
                },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        console.log("Something went wrong. Please try again.");
                    }
                },
            });
        }

        // Keep track of the card ID for the current action
        var currentCardId;

        // Click handler for the delete icon
        $(".wishlist-delete-icon").on("click", function (e) {
            e.preventDefault();
            currentCardId = $(this).data("card-id");

            show_alert_message2('Delete Favorite', 'Do you want to remove this card from My Favorites?');
        });
    });
}


jQuery(document).ready(function ($) {
    // Update Profile
    $('form.profile-update').on('submit', function (e) {
        e.preventDefault();
        var data = {
            action: 'update_profile',
            first_name: $('form.profile-update input[name="first_name"]').val(),
            last_name: $('form.profile-update input[name="last_name"]').val(),
            email: $('form.profile-update input[name="email"]').val(),
            phone: $('form.profile-update input[name="phone"]').val(),
            about: $('form.profile-update textarea[name="about"]').val(),
        };

        $.post(ajax_object.ajax_url, data, function (response) {
            alert(response.success ? 'Profile updated successfully!' : response.data);
        });
    });

    // Update Social Media Links
    $('form.social-update').on('submit', function (e) {
        e.preventDefault();
        var data = {
            action: 'update_profile',
            facebook: $('form.social-update input[name="facebook"]').val(),
            twitter: $('form.social-update input[name="twitter"]').val(),
            instagram: $('form.social-update input[name="instagram"]').val(),
            youtube: $('form.social-update input[name="youtube"]').val(),
        };

        $.post(ajax_object.ajax_url, data, function (response) {
            alert(response.success ? 'Social links updated successfully!' : response.data);
        });
    });

    // Change Password
    $('form.change-password').on('submit', function (e) {
        e.preventDefault();
        var data = {
            action: 'change_password',
            current_password: $('form.change-password input[name="current_password"]').val(),
            new_password: $('form.change-password input[name="new_password"]').val(),
        };

        $.post(ajax_object.ajax_url, data, function (response) {
            alert(response.success ? 'Password updated successfully!' : response.data);
        });
    });

    // Delete Account
    $('.delete-account-btn').on('click', function () {
        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
            $.post(ajax_object.ajax_url, { action: 'delete_account' }, function (response) {
                if (response.success) {
                    alert('Account deleted successfully!');
                    window.location.href = ajax_object.home_url; // Redirect to homepage or login
                } else {
                    alert('Error deleting account');
                }
            });
        }
    });
});