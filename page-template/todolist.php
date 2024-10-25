<?php 
/**
    * Template Name: To Do List    
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
            <h3 class="pageheader-title">To Do List</h3>
          </div>
        </div>
      </div>
      <div class="todo-list">
        <div class="inner">
          <div class="todo-search-add-link justify-content-end">
            <div class="add-link"><a href="#" class="dashbord-btn" data-bs-toggle="modal" data-bs-target="#add-todolist-popup"><i class="icon-plus"></i> Add Task</a>
            </div>
          </div>
          <div class="title-box">
            <div class="todo-status">
              <p>
              <?php
$todo_items = get_todo_list_items();
$completed_count = 0;
$pending_count = 0;

// Assuming $todo_items is an array of associative arrays
foreach ($todo_items as $item) {
    if ($item['status'] === 'Completed') { // Use array syntax
        $completed_count++;
    } elseif ($item['status'] === 'In Progress') {
        $pending_count++;
    } elseif ($item['status'] === 'Yet To Start') {
      $pending_count++;
  }
}

$total_count = $completed_count + $pending_count;
$percent_count = ($completed_count > 0) ? ($completed_count * 100) / $total_count : 0;
?>
<p>You have completed <?php echo $completed_count; ?> out of <?php echo $total_count; ?> tasks</p>
<div class="progress">
    <div id="todo_progressbar" class="progress-bar" role="progressbar" style="width: <?php echo $percent_count; ?>%"></div>
</div>

            </div>
          </div>
          <div class="todo-box">
    <div class="row">
        <div class="tasks-col to-do-list-table d-table-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="inner-box3">
                <div class="table-box upcoming-tasks">
                    <div class="table-responsive m-0">
                        <table class="table">
                            <tbody>
                                <?php
                                if ($todo_items) {
                                    $current_month = '';
                                    foreach ($todo_items as $item) {
                                        $item_month = date('F', strtotime($item['date']));
                                        $item_year = date('Y', strtotime($item['date']));

                                        // Display a new month heading if the month changes.
                                        if ($item_month . $item_year !== $current_month) {
                                            $current_month = $item_month . $item_year;
                                            echo '<tr><td class="todo-subhead text-align-start" colspan="8">';
                                            echo '<h4>' . $item_month . '<span>' . $item_year . '</span></h4>';
                                            echo '</td></tr>';
                                            
                                            // Display the header row for the table.
                                            echo '<tr class="todo-check-title">
                                                <th class="check">Mark</th>
                                                <th>Category</th>
                                                <th>Task</th>
                                                <th>Notes</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th class="actions">Actions</th>
                                            </tr>';
                                        }
                                        // <th class="todo-reminder">Set Reminder</th>
                                        // Display each todo item.
                                        echo '<tr ';
                                        if($item['completed'] == 1){
                                        echo 'class="text-decoration-line-through pe-none"';
                                        }
                                        echo '>';
                                        echo '<td class="check pe-auto">
                                        <div class="input-box">
                                            <input type="checkbox" class="checkSingle" name="field-name" id="t-c-' . $item['id'] . '" ' . ($item['completed'] == 1 ? 'checked' : '') . '>
                                            <label for="t-c-' . $item['id'] . '"><span class="icon fas fa-check"></span></label>
                                        </div>
                                      </td>';
                                        echo '<td>' . esc_html($item['category']) . '</td>';
                                        echo '<td class="todo-title" data-toggle="tooltip" data-bs-original-title="' . esc_html($item['title']) . '">' . esc_html($item['title']) . '</td>';
                                        echo '<td class="todo-nots-text" data-toggle="tooltip" data-bs-original-title="' . esc_html($item['notes']) . '">' . esc_html($item['notes']) . '</td>';
                                        echo '<td>' . date('d/m/Y', strtotime($item['date'])) . '</td>';
                                        // echo '<td><i class="fa-solid fa-calendar-days"></i></td>';
                                        echo '<td class="todo-status">
                                              <select class="status-dropdown" data-id="' . $item['id'] . '">
                                                  <option value="Yet To Start"' . selected($item['status'], 'Yet To Start', false) . '>Yet To Start</option>
                                                  <option value="In Progress"' . selected($item['status'], 'In Progress', false) . '>In Progress</option>
                                                  <option value="Completed"' . selected($item['status'], 'Completed', false) . '>Completed</option>
                                              </select>
                                            </td>';

                                        // echo '<td class="todo-status"><span class="stat ' . ($item['status'] == 'Completed' ? 'yes' : 'no') . '">' . esc_html($item['status']) . '</span></td>';
                                        echo '<td class="actions">
                                                <a href="#" class="edit theme-btn" data-bs-toggle="modal" data-bs-target="#edit-todolist-popup" data-id="' . $item['id'] . '">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a href="#" class="delete theme-btn" data-id="' . $item['id'] . '">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a>
                                              </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td class="text-align-start todo-subhead" colspan=8><h4>October<span>2024</span></h4><tr class=todo-check-title><th>Mark<th>Category<th>Task<th>Notes<th>Date<th>Status<th class=actions>Actions<tr><td class="check pe-auto"><div bis_skin_checked=1 class=input-box><input class=checkSingle name=field-name type=checkbox> <label><span class="fa-check fas icon"></span></label></div><td>Category<td class=todo-title>Task<td class=todo-nots-text>Notes<td>06/10/2024<td class=todo-status><select class="pe-none status-dropdown"><option value="Yet To Start"selected>Yet To Start<option value="In Progress">In Progress<option value=Completed>Completed</select><td class=actions><a class="theme-btn edit pe-none" href="#"><i class="fa-pen fa-solid"></i> </a><a class="theme-btn delete pe-none"href="#"><i class="fa-regular fa-trash-can"></i></a>';
                                }
                                ?>
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



<!-- Add To-Do Modal -->
<div class="modal fade def-popup add-todolist-popup" id="add-todolist-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <h4 class="modal-title">Add Task</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="cross"></span>
                    </button>
                </div>
                <div class="content-box">
                    <form id="add-todo-form" method="post" action="#">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Task*</label>
                                        <input type="text" name="title" class="form-control" placeholder="Task" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" id="add-todo-date" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-sm-12">
                                    <label>Category*</label>
                                    <input type="text" name="category" class="form-control" required="">
                                </div>
                                <!-- <div class="form-group col-lg-12 col-sm-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Description" required=""></textarea>
                                </div> -->
                                <div class="form-group col-lg-12 col-sm-12">
                                    <label>Notes</label>
                                    <textarea name="notes" class="form-control" placeholder="Notes"></textarea>
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

<!-- Edit To-Do Modal -->
<div class="modal fade def-popup add-todolist-popup" id="edit-todolist-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Task</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="cross"></span>
                    </button>
                </div>
                <div class="content-box">
                    <form id="edit-todo-form" method="post" action="#">
                        <div class="form-content">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Task*</label>
                                        <input type="text" name="title" id="edit-todo-title" class="form-control" placeholder="Task" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" id="edit-todo-date" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-sm-12">
                                    <label>Category*</label>
                                    <input type="text" name="category" id="edit-todo-category" class="form-control" required="">
                                </div>
                                <!-- <div class="form-group col-lg-12 col-sm-12">
                                    <label>Description</label>
                                    <textarea name="description" id="edit-todo-description" class="form-control" placeholder="Description" required=""></textarea>
                                </div> -->
                                <div class="form-group col-lg-12 col-sm-12">
                                    <label>Notes</label>
                                    <textarea name="notes" id="edit-todo-notes" class="form-control" placeholder="Notes"></textarea>
                                </div>
                                <div class="form-group col-lg-12 col-sm-12">
                                    <div class="links-box">
                                        <input type="hidden" name="id" id="edit-todo-id">
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