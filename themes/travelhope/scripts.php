<script src="<?php echo $theme_url; ?>assets/js/scripts.js"></script>

<script>
var options = {
  url: function(phrase) {
   return "http://yasen.hotellook.com/autocomplete?lang=en-US&limit=10&term="+phrase;
  },
  categories:[{
    listLocation: "cities"
  }],

    list: {
        match: {
            enabled: false
        },
        maxNumberOfElements: 10
    },
    getValue: "fullname",
    template: {
		        type: "custom",
		        method: function(value, item) {
                var ccode = item.countryCode;
		            return "<div class='item'><i class='"+ccode.toLowerCase()+" flag'></i>"+value+"</div>";
		        }
		    }
};

$("#citiesInput").easyAutocomplete(options);

</script>

<script>
var fmt = "<?php echo $app_settings[0]->date_f_js;?>";
var baseURL = "<?php echo base_url(); ?>";

$(function() {


/* Wish list global function */
$(".wishlistcheck").on("click",function(){
var id = $(this).prop('id');
var module = $(this).data('module');
var userid = "<?php echo $usersession; ?>";
var action = "add";
var thisdiv = $(this);
if($(this).hasClass('fav')){
action = "remove";
}


$.post(baseURL+'account/wishlist/'+action,{module: module, itemid: id, loggedin: userid},function(resp){
var response = $.parseJSON(resp);
if(response.isloggedIn){

if(action == "remove"){
$("."+module+"wishsign"+id).html("+");
//$("."+module+"wishtext"+id).html("Add to Wishlist");
$("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "<?php echo trans('029'); ?>").tooltip('fixTitle').tooltip('show');
$("."+module+"wishsign"+id).removeClass("fav");
thisdiv.removeClass('fav');

}else{

thisdiv.addClass('fav');
$("."+module+"wishsign"+id).addClass("fav");
$("."+module+"wishsign"+id).html("-");
//$("."+module+"wishtext"+id).html("Remove From Wishlist");
$("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "<?php echo trans('028'); ?>").tooltip('fixTitle').tooltip('show');

}

}else{
alert("<?php echo trans('0482');?>");
}

});

})
/* End Wish list global function */


/* tours ajax categories loader */
<?php  if(pt_main_module_available('tours')){ ?>
$('#location').on('change',function(){ var location = $(this).val(); $.post(baseURL+'tours/tourajaxcalls/onChangeLocation',{location: location},function(resp){ var response = $.parseJSON(resp); console.log(response); if(response.hasResult){ $("#tourtype").html(response.optionsList); }else{ $("#tourtype").html(response.optionsList); } mySelectUpdate(); }) });
<?php } ?>

/* cars ajax types loader */
<?php  if(pt_main_module_available('cars')){ ?>
var totalsVal=$("#cartotals").val();if(totalsVal=="1"){$(".showTotal").show()}else{$(".showTotal").hide()}
var pickupLocation=$('#pickuplocation').val();var dropoffLocation=$('#droplocation').val();$('#carlocations').on('change',function(){var location=$(this).val();$.post(baseURL+'cars/carajaxcalls/onChangeLocation',{location:location},function(resp){var response=$.parseJSON(resp);if(response.hasResult){$("#carlocations2").html(response.optionsList).select2({width:'100%',maximumSelectionSize:1})}})});$('#pickuplocation').on('change',function(){var location=$('#pickuplocation').val();var carid=$("#itemid").val();var pickupDate=$("#departcar").val();var dropoffDate=$("#returncar").val();$.post(baseURL+'cars/carajaxcalls/getDropoffLocations',{location:location,carid:carid,pickupDate:pickupDate,dropoffDate:dropoffDate},function(resp){var response=$.parseJSON(resp);console.log(response);if(response.hasResult){$(".showTotal").show();$(".totaldeposit").html(response.priceInfo.depositAmount);$(".totalTax").html(response.priceInfo.taxAmount);$(".grandTotal").html(response.priceInfo.grandTotal);$("#droplocation").html(response.optionsList).select2({width:'100%',maximumSelectionSize:1})}})});$('.carDates').blur(function(){setTimeout(function(){getCarPrice()},500)});$('#droplocation').on("change",(function(){getCarPrice()}));function getCarPrice(){var pickupLocation=$('#pickuplocation').val();var dropoffLocation=$('#droplocation').val();var carid=$("#itemid").val();var pickupDate=$("#departcar").val();var dropoffDate=$("#returncar").val();$.post(baseURL+'cars/carajaxcalls/getCarPriceAjax',{pickupLocation:pickupLocation,dropoffLocation:dropoffLocation,carid:carid,pickupDate:pickupDate,dropoffDate:dropoffDate},function(resp){var response=$.parseJSON(resp);console.log(response);$(".showTotal").show();$(".totaldeposit").html(response.depositAmount);$(".totalTax").html(response.taxAmount);$(".grandTotal").html(response.grandTotal)})}
<?php } ?>


/* Newsletter subscription */
$(".sub_newsletter").on("click",function(){var e=$(".sub_email").val();$.post("<?php echo base_url();?>home/subscribe",{email:e},function(e){$(".subscriberesponse").html(e).fadeIn("slow"),setTimeout(function(){$(".subscriberesponse").fadeOut("slow")},2000)})});

/* dropdown on hover */
$("ul.nav li.dropdown").hover(function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeIn(200)},function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeOut(200)}); });

/* start change currency functionality */
function change_currency(c){$("#loadingbg").css("display","block"),$.post("<?php echo base_url();?>admin/ajaxcalls/changeCurrency",{id:c},function(){location.reload()})}

/* map iframe modal */
function showMap(a,o){"modal"==o?($("#mapModal").modal("show"),$("#mapModal").on("shown.bs.modal",function(){$("#mapModal .mapContent").html('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')})):$("#"+o).html('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')}
</script>


<?php  if(pt_main_module_available('cartrawler')){ ?>
<script type="text/javascript">
/* cartrawler auto suggest */
function selectLocationValue(l,h,locname){  $("#"+h).val(locname);  if(h == 'ct1'){ $("input[name='pickupLocationId']").val(l); $("#ct2").val(locname); $("input[name='returnLocationId']").val(l); }else if(h == "ct2"){ $("#returnlocation").val(l);   }; $("#"+h+"resp").html("") } $(function(){ $(".ctlocation").on("keyup",function(l){ var h=$(this).val(),e=h.length,i=$(this).prop("id"),t=l.keyCode||l.which;if($.trim(e)>1&&38!=t&&40!=t)$("#"+i+"resp").html(""),$.post("<?php echo base_url();?>cartrawler/getLocations",{term:h,inputid:i},function(l){$("#"+i+"resp").html(l)});else if(38!=t&&40!=t)$("#"+i+"resp").html("");else{var s,g,n=$("#"+i+"resp ul li.highlight");40!==t||n.length||$("#"+i+"resp ul li:first").addClass("highlight"),40===t&&n.length?(g=n.next("#"+i+"resp ul li"),g.length&&(n.removeClass("highlight"),g.addClass("highlight"))):38===t&&(s=n.prev("#"+i+"resp ul li"),s.length&&(n.removeClass("highlight"),s.addClass("highlight"))),console.log($(".highlight").innerHTML)}})});

</script>
<?php } ?>
