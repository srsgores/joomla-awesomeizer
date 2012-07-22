//for chosen 
var $_ = jQuery;
jQuery(document).ready(function() {
	$_(".adminlist").dataTable();
	$_("select").not("#editor_selection, #lang").chosen();
});
