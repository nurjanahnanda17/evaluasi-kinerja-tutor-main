<div class="modal fade" id="create-user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addUser" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah User Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama" class="form-label">Name</label>
                            <input type="text" id="nama" name="nama" class="form-control"
                                placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" id="role" name="role" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
