<?php require 'assets/src/inc/config.php'; ?>
<?php require 'assets/src/inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/src/assets/js/plugins/slick/slick.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/src/assets/js/plugins/slick/slick-theme.min.css">

<?php require 'assets/src/inc/views/template_head_end.php'; ?>
<?php require 'assets/src/inc/views/base_head.php'; ?>

<div class="content content-boxed">
<!-- Page Header -->
<div class="content content-full text-center" style="background-image: url('<?php echo $one->assets_folder; ?>/img/photos/photo3@2x.jpg');">
    <div class="push-50-t push-15">
        <h1 class="h2 text-white animated zoomIn">Dashboard</h1>
        <h2 class="h5 text-white-op animated zoomIn">Welcome Administrator</h2>
    </div>
</div>
<!-- END Page Header -->
</div>


<!-- Page Content -->

<!-- END Page Content -->

<?php require 'assets/src/inc/views/base_footer.php'; ?>
<?php require 'assets/src/inc/views/template_footer_start.php'; ?>

<!-- Page Plugins -->
<script src="<?php echo $one->assets_folder; ?>/src/assets/js/plugins/slick/slick.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/src/assets/js/plugins/chartjs/Chart.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo $one->assets_folder; ?>/src/assets/js/pages/base_pages_dashboard.js"></script>
<script>
    $(function(){
        // Init page helpers (Slick Slider plugin)
        App.initHelpers('slick');
    });
</script>

<?php require 'assets/src/inc/views/template_footer_end.php'; ?>