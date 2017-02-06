<?php if(isset($_GET['update'])) : ?>
    <?php if($_GET['update'] == 1) : ?>
        <div class="alert alert-success">Cập nhật thành công</div>
    <?php else: ?>
        <div class="alert alert-warning">Không có sự thay đổi</div>
    <?php endif; ?>
<?php endif; ?>

<?php if(isset($_GET['insert'])) : ?>
    <?php if($_GET['insert'] == 1) : ?>
        <div class="alert alert-success">Thêm mới thành công</div>
    <?php else: ?>
        <div class="alert alert-danger">Thêm mới thất bại</div>
    <?php endif; ?>
<?php endif; ?>

<?php if(isset($_GET['delete'])) : ?>
    <?php if($_GET['delete'] == 1) : ?>
        <div class="alert alert-success">Xóa thành công</div>
    <?php else: ?>
        <div class="alert alert-danger">Xóa thất bại</div>
    <?php endif; ?>
<?php endif; ?>