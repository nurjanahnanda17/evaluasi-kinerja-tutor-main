<div class="modal fade" id="edit-user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editUser">
            @method('PUT')
            @csrf
            <input type="hidden" id="idUser">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama" class="form-label">Name</label>
                            <input type="text" id="namaUser" name="nama" class="form-control"
                                placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="emailUser" name="email" class="form-control"
                                placeholder="xxxx@xxx.xx" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" id="roleUser" name="role" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
