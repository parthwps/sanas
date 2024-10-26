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
    // Add To-Do Item
    jQuery('#add-todo-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=add_todo_item',
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
                    alert(response.data);
                    location.reload();
                } else {
                    alert(response.data);
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
          console.log(response.data);
          var $tr = $checkbox.closest("tr");
            if (completed) {
                $tr.addClass("text-decoration-line-through");
                $tr.addClass("pe-none");
            } else {
                $tr.removeClass("text-decoration-line-through");
                $tr.removeClass("pe-none");
            }
        } else {
          console.log("Something went wrong: " + response.data);
        }
      }
    });
  });

    jQuery('.delete').on('click', function() {
        var todoId = jQuery(this).data('id');
        if (confirm('Are you sure you want to delete this To-Do item?')) {
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: { id: todoId, action: 'delete_todo_item' },
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
                    // console.log(response.data);
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
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: formData + '&action=add_vendor_item',
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
                        alert(response.data);
                        location.reload();
                    } else {
                        alert(response.data);
                    }
                }
            });
        });

        jQuery('.delete').on('click', function() {
            var vendorId = jQuery(this).data('id');
            if (confirm('Are you sure you want to delete this Vendor item?')) {
                $.ajax({
                    type: 'POST',
                    url: ajax_object.ajax_url,
                        data: { id: vendorId, action: 'delete_vendor_item' },
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

if (window.location.pathname === '/my-vendors/') {
    jQuery(document).ready(function($) {
        // Add My Vendor Item
        jQuery('#add-my-vendor-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: formData + '&action=add_my_vendor_item',
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

        // Get My Vendor Item for Editing
        jQuery('.edit').on('click', function() {
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
                        alert(response.data);
                        location.reload();
                    } else {
                        alert(response.data);
                    }
                }
            });
        });

        jQuery('.delete').on('click', function() {
            var vendorId = jQuery(this).data('id');
            if (confirm('Are you sure you want to delete this My Vendor item?')) {
                $.ajax({
                    type: 'POST',
                    url: ajax_object.ajax_url,
                        data: { id: vendorId, action: 'delete_my_vendor_item' },
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