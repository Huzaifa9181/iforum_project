
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Welcome to edit setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action='/php_forum/components/handle_edit.php' method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" maxlength="50" class="form-control" id="email" name="edit_email">
                    </div>
                    <select required class="form-select" name="role" aria-label="Default select example">
                        <option selected>Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                        <option value="Employee" disabled>Employee</option>
                    </select>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>