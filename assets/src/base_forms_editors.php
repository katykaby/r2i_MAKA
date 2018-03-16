<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote.min.css">
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote-bs3.min.css">

<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Text Editors <small>Text editing at its finest. Powered by Summernote and CKeditor.</small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Forms</li>
                <li><a class="link-effect" href="">Text Editors</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Summernote (.js-summernote + .js-summernote-air classes are initialized in App() -> uiHelperSummernote()) -->
    <!-- For more info and examples you can check out http://summernote.org/ -->
    <h2 class="content-heading">Edition Email Template</h2>
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Full Editor</h3>
            <select name="type_template" id="type_template">
                <option value="2">
                    Mail Notif Attribution de charge (BEI)
                </option>
                <option value="3">
                    Mail Notif Attribution OT
                </option>
                <option value="4">
                    Mail Notif Control des plan OK
                </option>
            </select>
        </div>
        <div class="block-content">
            <form action="page_forms_editors.php" method="post" class="form-horizontal" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-xs-12">
                        <!-- CKEditor Container -->
                        <textarea id="js-ckeditor" name="ckeditor">Hello CKEditor!</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- END Summernote -->

    <!-- CKEditor (.js-ckeditor-inline + .js-ckeditor classes are initialized in App() -> uiHelperCkeditor()) -->
    <!-- For more info and examples you can check out http://ckeditor.com -->
    <h2 class="content-heading">CKEditor</h2>
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">In-place Editor</h3>
        </div>
        <div class="block-content">
            <form action="page_forms_editors.php" method="post" class="form-horizontal" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-xs-12">
                        <!-- CKEditor Container -->
                        <div id="js-ckeditor-inline" contenteditable="true">Hello inline CKEditor! Click this text to edit it!</div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- END CKEditor -->
</div>
<!-- END Page Content -->

<?php require 'inc/views/base_footer.php'; ?>
<?php require 'inc/views/template_footer_start.php'; ?>

<!-- Page JS Plugins -->
<script src="<?php echo $one->assets_folder; ?>/js/plugins/summernote/summernote.min.js"></script>
<script src="<?php echo $one->assets_folder; ?>/js/plugins/ckeditor/ckeditor.js"></script>

<!-- Page JS Code -->
<script>
    $(function(){
        // Init page helpers (Summernote + CKEditor plugins)
        App.initHelpers(['summernote', 'ckeditor']);
        $.("#type_template").change(function(e){
            $.ajax({
                method : "GET",
                url : "change_content_mail_notif.php",
                date : "type=".$( "#type_template" ).val();
        },
                success : function(reponse){
                $('#js-ckeditor').html(reponse);

            })
        });

    });
</script>

<?php require 'inc/views/template_footer_end.php'; ?>