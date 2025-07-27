         <div class="modal fade" id="create-tutor" tabindex="-1" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <form id="addTutor" method="POST">
                     @csrf
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel1">Tambah Tutor</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col mb-3">
                                     <label for="nama_tutor" class="form-label">Nama Tutor</label>
                                     <input type="text" id="nama_tutor" name="nama_tutor" class="form-control"
                                         placeholder="Masukan Nama" />
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col mb-0">
                                     <label for="nomor_induk" class="form-label">Nomor Induk</label>
                                     <input type="number" id="nomor_induk" name="nomor_induk" class="form-control"
                                         placeholder="Masukan nomor induk" />
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
