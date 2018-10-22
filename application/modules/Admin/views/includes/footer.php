</div>
</div>
</div>

<?php $settings = $this->Settings_model->get_settings_data(); ?>
<!-- Bootstrap JS-->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sidebar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/panels.js"></script>



<!-- ckeditor -->


<!-- icheck -->
<script src="<?php echo base_url(); ?>assets/include/icheck/icheck.min.js"></script>
<link href="<?php echo base_url(); ?>assets/include/icheck/square/grey.css" rel="stylesheet">
<script>
var cb, optionSet1;

$(function () {
    var checkAll = $('input.all');
    var checkboxes = $('input.checkboxcls');

    $('input').iCheck({
      checkboxClass: "icheckbox_square-grey",
    });

    checkAll.on('ifChecked ifUnchecked', function(event) {
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
});

$(".radio").iCheck({
checkboxClass: "icheckbox_square-grey",
radioClass: "iradio_square-grey"
});
</script>

<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/include/datepicker/datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/include/datepicker/datepicker.css" />

<script>
var fmt = "<?php echo @$settings[0]->date_f_js;?>";
if (top.location != location) { top.location.href = document.location.href ; }
$(function(){ window.prettyPrint && prettyPrint(); $('.dob').datepicker({format: fmt,autoclose: true}).on('changeDate', function (ev) {
$(this).datepicker('hide'); });
$('#dp1').datepicker();
$('#dp2').datepicker();

// disabling dates
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var checkin = $('.dpd1').datepicker({format: fmt, onRender: function(date) { return date.valueOf() < now.valueOf() ? 'disabled' : ''; } }).on('changeDate', function(ev) {
if (ev.date.valueOf() > checkout.date.valueOf()) {
var newDate = new Date(ev.date)
newDate.setDate(newDate.getDate() + 1); checkout.setValue(newDate); } checkin.hide();
$('.dpd2')[0].focus(); }).data('datepicker'); var checkout = $('.dpd2').datepicker({format: fmt,
onRender: function(date) { return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : ''; }
}).on('changeDate', function(ev) { checkout.hide(); }).data('datepicker'); });
</script>

<!-- timepicker -->
<script src="<?php echo base_url(); ?>assets/include/timepicker/timepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/include/timepicker/timepicker.css" />
<script>
$(function(){
$('.timepicker').clockface(); });
</script>

<!-- dronzone -->
<link href="<?php echo base_url(); ?>assets/include/dropzone/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/include/dropzone/dropzone.min.js"></script>




<!----Custom functions file---->
<script src="<?php echo base_url(); ?>assets/js/funcs.js"></script>
<!----Custom functions file---->

<!-- pnotify -->
<script src="<?php echo base_url(); ?>assets/include/pnotify/pnotify.custom.min.js"></script>
<link href="<?php echo base_url(); ?>assets/include/pnotify/pnotify.custom.css" rel="stylesheet">

<?php NotifyMsg($this->session->flashdata('flashmsgs')); ?>


<script>
$(function() {

$('.chosen-select').select2( { width:'100%', maximumSelectionSize: 1 } );

$(document).ready(function() {
$(".chosen-multi-select").select2( { width:'100%', } ); }); }); function slideout(){ setTimeout(function(){
$(".alert-success").fadeOut("slow", function () { });
$(".alert-danger").fadeOut("slow", function () { }); }, 4000);}
</script>

<!-- smothwhell starts-->
<script src="<?php echo base_url(); ?>assets/include/smoothwheel/smoothwheel.js"></script>
<!-- smothwhell ends-->

<!-- jQuery slimScroll-->
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script>
window.jQuery.ui || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"><\/script>')
</script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script>
/*<![CDATA[*/
$(function() {
$(".social-sidebar").socialSidebar();
$('.main').panels();
});
/*]]>*/
</script>


</body>
</html>
