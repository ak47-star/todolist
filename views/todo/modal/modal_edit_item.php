<?php
$todo = $_SESSION['todo'] ?? null;
?>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" id="modal-edit-todo" action="index.php?controller=ToDo&action=update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="display: none;">
                    <input name="id" value="<?= $todo['id'] ?>">
                    <input name="create_date" value="">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Task info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Task name</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="<?= $todo['task_name']; ?>" id="example-text-input" name="task_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Start</label>
                        <div class="col-10">
                            <input class="form-control date-start-add" type="date" value="<?= $todo['start_date']; ?>" id="example-date-input" name="start_date" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">End</label>
                        <div class="col-10">
                            <input class="form-control date-end-add" type="date" value="<?= $todo['end_date']; ?>" id="example-date-input" name="end_date" required>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" <?= ($todo['status'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="gridRadios1">
                                        Planning
                                    </label>
                                    <button type="button" class="btn btn-info btn-sm"></button>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="2" <?= ($todo['status'] == 2) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="gridRadios2">
                                        Doing
                                    </label>
                                    <button type="button" class="btn btn-success btn-sm"></button>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="3"  <?= ($todo['status'] == 3) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="gridRadios3">
                                        Complete
                                    </label>
                                    <button type="button" class="btn btn-warning btn-sm"></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-submit-form">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>