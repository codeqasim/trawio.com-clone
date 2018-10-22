<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('invoiceDetails'))
{
    function invoiceDetails($id,$ref,$reviewData = null)
    {

    }
}

if ( ! function_exists('pt_get_einvoice_details'))
{
    function pt_get_einvoice_details($id,$itid)
    {
    $CI = get_instance();
    $CI->db->select('pt_ean_booking.*,pt_accounts.ai_mobile,pt_accounts.accounts_id,pt_accounts.ai_country,pt_accounts.accounts_email,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.ai_address_1,pt_accounts.ai_address_2');
    $CI->db->where('pt_ean_booking.book_id',$id);
    $CI->db->where('pt_ean_booking.book_itineraryid',$itid);
    $CI->db->join('pt_accounts','pt_ean_booking.book_user = pt_accounts.accounts_id','left');
    $invoiceData = $CI->db->get('pt_ean_booking')->result();
    return $invoiceData;


    }
}

if(! function_exists('updateInvoiceStatus')){
  function updateInvoiceStatus($invoiceid,$amount,$txnid,$paymethod,$status,$module,$totalamount){

  }
}

if(!function_exists('updateInvoiceLogs')){
  function updateInvoiceLogs($invoiceid,$logs = ""){
  }
}

if ( ! function_exists('pt_get_selected_rooms'))
{
    function pt_get_selected_rooms($roomstring)
    {

    }
}



if ( ! function_exists('pt_get_room_title'))
{
    function pt_get_room_title($id)
    {

    }
}




if ( ! function_exists('pt_booked_extras'))
{
    function pt_booked_extras($id)
    {

    }
}



if ( ! function_exists('pt_total_accomodates'))
{
    function pt_total_accomodates($array)
    {

      $result = array();
      $comsep = explode(",",$array);
      foreach($comsep as $com){
      $items = explode("_",$com);
      $result[$items[0]] = $items[2];

      }
      return $result;

  }
}
