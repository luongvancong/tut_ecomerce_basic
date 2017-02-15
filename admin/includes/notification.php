<?php if(isset($_GET['update'])) : ?>
    <?php if($_GET['update'] == 1) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Thành công!</strong> Cập nhật thành công
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Không có sự thay đổi
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(isset($_GET['insert'])) : ?>
    <?php if($_GET['insert'] == 1) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Thêm mới thành công
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Thêm mới thất bại
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(isset($_GET['delete'])) : ?>
    <?php if($_GET['delete'] == 1) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Xóa thành công
        </div>
    <?php else: ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Xóa thất bại
        </div>
    <?php endif; ?>
<?php endif; ?>