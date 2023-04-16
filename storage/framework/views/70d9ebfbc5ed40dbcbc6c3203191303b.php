    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php echo method_field('post'); ?>

          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title"></h5>
            </div>

            <h3 class="d-flex justify-content-center">Apakah yakin akan menghapus data?</h3>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fa fa-xmark"></i> Batal</button>
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Ya</button>
            </div>
          </div>
        </form>

      </div>
    </div><?php /**PATH C:\xampp\htdocs\katalog_laravel\resources\views/kategori/delete.blade.php ENDPATH**/ ?>