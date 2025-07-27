         <div class="modal fade" id="edit-kriteria" tabindex="-1" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <form id="editKriteria">
                     @method('PUT')
                     @csrf
                     <input type="hidden" name="id" id="id">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel1">Tambah Kriteria</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col mb-3">
                                     <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                                     <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control"
                                         placeholder="Masukan Nama Kriteria" />
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col mb-3">
                                     <label for="deskripsi" class="form-label">Deskripsi</label>
                                     <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control" placeholder="Masukan Deskripsi" /></textarea>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col mb-0">
                                     <label for="bobot" class="form-label">Bobot</label>
                                     <input type="number" id="bobot" name="bobot" class="form-control"
                                         placeholder="Masukan Deskripsi" />
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
