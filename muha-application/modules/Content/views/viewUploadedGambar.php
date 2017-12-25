<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"> -->
<!-- <link href="<?=base_url()?>muha-assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<link href="<?=base_url()?>muha-assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<!-- <link href="<?=base_url()?>muha-assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
<link href="<?=base_url()?>muha-assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>muha-assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=base_url()?>muha-assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>muha-assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<!-- <link href="<?=base_url()?>muha-assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/> -->
<!-- <link id="style_color" href="<?=base_url()?>muha-assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/> -->
<!-- <link href="<?=base_url()?>muha-assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/> -->
<!-- END THEME STYLES -->
<form id="fileupload" action="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
	<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
	<div class="row fileupload-buttonbar">
		<div class="col-lg-12">
			<!-- The fileinput-button span is used to style the file input field as button -->
			<span class="btn green fileinput-button">
			<i class="fa fa-plus"></i>
			<span>
			Add files... </span>
			<input type="file" name="files[]" multiple="">
			</span>
			<button type="submit" class="btn blue start">
			<i class="fa fa-upload"></i>
			<span>
			Start upload </span>
			</button>
			<button type="reset" class="btn warning cancel">
			<i class="fa fa-ban-circle"></i>
			<span>
			Cancel upload </span>
			</button>
			<button type="button" class="btn red delete">
			<i class="fa fa-trash"></i>
			<span>
			Delete </span>
			</button>
			<input type="checkbox" class="toggle">
			<!-- The global file processing state -->
			<span class="fileupload-process">
			</span>
		</div>
		<!-- The global progress information -->
		<div class="col-lg-5 fileupload-progress fade">
			<!-- The global progress bar -->
			<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
				<div class="progress-bar progress-bar-success" style="width:0%;">
				</div>
			</div>
			<!-- The extended global progress information -->
			<div class="progress-extended">
				 &nbsp;
			</div>
		</div>
	</div>
	<!-- The table listing the files available for upload/download -->
	<table role="presentation" class="table table-striped clearfix">
	<tbody class="files">
	</tbody>
	</table>
</form>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger label label-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn blue start" disabled>
                    <i class="fa fa-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn red cancel">
                    <i class="fa fa-ban"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td>
                    {% if (file.deleteUrl) { %}
                        <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="fa fa-trash-o"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle">
                    {% } else { %}
                        <button class="btn yellow cancel btn-sm">
                            <i class="fa fa-ban"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
    </script>
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=base_url()?>muha-assets/global/plugins/respond.min.js"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=base_url()?>muha-assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- END PAGE LEVEL PLUGINS-->
<!-- BEGIN:File Upload Plugin JS files-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
    <script src="<?=base_url()?>muha-assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
<!-- END:File Upload Plugin JS files-->
<script src="<?=base_url()?>muha-assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="<?=base_url()?>muha-assets/admin/pages/scripts/form-fileupload.js"></script>
<script>
        jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
        FormFileUpload.init();
        });
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>