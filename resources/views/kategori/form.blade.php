    <!-- Modal -->
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog" role="document">
          
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('post')
    
                <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title"></h5>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row mb-4">
                            <label for="nama_kategori" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                            <div class="col-md 6">
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control form-control-sm" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                      <button  type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fa fa-xmark"></i> Batal</button>
                      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
            </form>
    
        </div>
      </div>
    
    
      