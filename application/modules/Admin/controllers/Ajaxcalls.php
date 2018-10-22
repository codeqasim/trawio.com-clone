<?php
if (!defined('BASEPATH'))
		exit ('No direct script access allowed');

class Ajaxcalls extends MX_Controller {

		private $appsettings;

		function __construct() {
				modules :: load('Admin');
				$this->load->model('Admin/Extras_model');
				$defaultlang = pt_get_default_language();
				if (empty ($this->data['lang_set'])) {
						$this->data['lang_set'] = $defaultlang;
				}
        $this->appsettings = $this->Settings_model->get_settings_data();
				$this->lang->load("front", $this->data['lang_set']);
		}
// Remove Profile Image

		public function remove_profile_image() {
				$userid = $this->input->post('userid');
				$oldphoto = $this->input->post('oldphoto');
				if (!empty ($userid)) {
						$this->Accounts_model->remove_profile_image($userid, $oldphoto);
						$this->session->set_flashdata('flashmsgs', 'Profile Updated Successfully');
						redirect('admin/accounts/profile');
				}
		}
// update menu order

		public function update_menu_order() {
				$update = $this->input->post('updateorder');
				$listorder = $this->input->post('listorder');
				if (!empty ($update)) {
						$this->Menus_model->change_menu_header_order($listorder);
						echo " <i class='fa fa-check-square-o'></i>  Changes Saved";
				}
		}
// update footer menu order

		public function update_footer_menu_order() {
				$update = $this->input->post('updateorder');
				$listorder = $this->input->post('listorder');
				if (!empty ($update)) {
						$this->Menus_model->change_menu_footer_order($listorder);
						echo " <i class='fa fa-check-square-o'></i> Changes Saved";
				}
		}
// update footer cols labels

		public function update_footer_cols_label() {
				$labeltext = $this->input->post('labeltext');
				$id = $this->input->post('id');
				if (!empty ($id)) {
						$this->Menus_model->update_footer_cols_label($id, $labeltext);
						echo "Changes Saved";
				}
		}
// Delete menu

		public function delmenu() {
				$id = $this->input->post('id');
				$this->Menus_model->del_menu($id);
		}
// delete multiple cms pages

		public function delete_multiple_pages() {
				$pageslist = $this->input->post('pagelist');
				foreach ($pageslist as $pageid) {
						$this->Cms_model->delete_page($pageid);
				}
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// Disable multiple cms pages

		public function disable_multiple_pages() {
				$pageslist = $this->input->post('pagelist');
				foreach ($pageslist as $pageid) {
						$this->Cms_model->disable_page($pageid);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// Disable multiple cms pages

		public function enable_multiple_pages() {
				$pageslist = $this->input->post('pagelist');
				foreach ($pageslist as $pageid) {
						$this->Cms_model->enable_page($pageid);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// delete single cms page

		public function delete_single_page() {
				$pageid = $this->input->post('pageid');
				$this->Cms_model->delete_page($pageid);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// delete multiple languages

		public function delete_multiple_languages() {
				$langlist = $this->input->post('langlist');
				foreach ($langlist as $langid) {
						$this->Translation_model->delete_language($langid);
				}
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// disable mulitple languages

		public function disable_multiple_languages() {
				$langlist = $this->input->post('langlist');
				foreach ($langlist as $langid) {
						$this->Translation_model->disable_language($langid);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable mulitple languages

		public function enable_multiple_languages() {
				$langlist = $this->input->post('langlist');
				foreach ($langlist as $langid) {
						$this->Translation_model->enable_language($langid);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// Delete single language

		public function delete_single_language() {
				$langid = $this->input->post('langid');
				$this->Translation_model->delete_language($langid);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// Delete Multiple Socials

		public function delMultipleSocials() {
				$items = $this->input->post('items');
          foreach($items as $item){
          		$this->Misc_model->delete_social($item);
          }


		}
// disable mulitple socials

		public function disable_multiple_socials() {
				$sociallist = $this->input->post('sociallist');
				foreach ($sociallist as $socialid) {
						$this->Misc_model->disable_social($socialid);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable mulitple socials

		public function enable_multiple_socials() {
				$sociallist = $this->input->post('sociallist');
				foreach ($sociallist as $socialid) {
						$this->Misc_model->enable_social($socialid);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// Delete single Social

		public function delete_single_social() {
				$socialid = $this->input->post('socialid');
				$this->Misc_model->delete_social($socialid);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// Update Social Order

		public function update_social_order() {
	      $socialid = $this->input->post('id');
		  $order = $this->input->post('order');

		  $this->db->select('social_id');
          $total = $this->db->get('pt_socials')->num_rows();

          if($order > $total){
            echo '0';
          }else{
          	$this->Misc_model->update_social_order($socialid, $order);
            echo '1';
          }
		}
// Update language Order

		public function update_language_order() {
				$langid = $this->input->post('id');
				$order = $this->input->post('order');
				$this->Translation_model->update_language_order($langid, $order);
		}
// Update Slide Order

		public function update_slide_order() {
          $slideid = $this->input->post('id');
		  $order = $this->input->post('order');

		  $this->db->select('slide_id');
          $total = $this->db->get('pt_sliders')->num_rows();

          if($order > $total){
            echo '0';
          }else{
          	$this->Misc_model->update_slide_order($slideid, $order);
            echo '1';
          }
		}

// delete multiple Slides

		public function delMultipleSlides() {

			$items = $this->input->post('items');
          foreach($items as $item){
          		$this->Misc_model->delete_slide($item);
          }


		}
// Disable multiple Slides

		public function disable_multiple_slides() {
				$slidelist = $this->input->post('slidelist');
				foreach ($slidelist as $slideid) {
						$this->Misc_model->disable_slide($slideid);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// Enable multiple Slides

		public function enable_multiple_slides() {
				$slidelist = $this->input->post('slidelist');
				foreach ($slidelist as $slideid) {
						$this->Misc_model->enable_slide($slideid);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// delete Single Slide

		public function delete_single_slide() {
				$slideid = $this->input->post('slideid');
				$this->Misc_model->delete_slide($slideid);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// disable mulitple modules

		public function disable_multiple_modules() {
				$modulelist = $this->input->post('modulelist');
				foreach ($modulelist as $modid) {
						$this->Modules_model->disable_module($modid);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable mulitple modules

		public function enable_multiple_modules() {
				$modulelist = $this->input->post('modulelist');
				foreach ($modulelist as $modid) {
						$this->Modules_model->enable_module($modid);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// disable single module

		public function disable_single_module() {
				$modid = $this->input->post('moduleid');
				$this->Modules_model->disable_module($modid);
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable single module

		public function enable_single_module() {
				$modid = $this->input->post('moduleid');
				$this->Modules_model->enable_module($modid);
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// enable main module

		public function enable_main_module() {
				$modid = $this->input->post('modulename');
				$this->Modules_model->enable_main_module($modid);
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// disable main module

		public function disable_main_module() {
				$modid = $this->input->post('modulename');
				$this->Modules_model->disable_main_module($modid);
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// disable mulitple gateways

		public function disable_multiple_gateways() {
				$this->load->model('Payments_model');
				$gatewaylist = $this->input->post('gatewaylist');
				foreach ($gatewaylist as $id) {
						$this->Payments_model->disable_gateway($id);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable mulitple gateways

		public function enable_multiple_gateways() {
				$this->load->model('Payments_model');
				$gatewaylist = $this->input->post('gatewaylist');
				foreach ($gatewaylist as $id) {
						$this->Payments_model->enable_gateway($id);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// disable single gateway

		public function disable_single_gateway() {
				$this->load->model('Payments_model');
				$id = $this->input->post('gatewayid');
				$this->Payments_model->disable_gateway($id);
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable single gateway

		public function enable_single_gateway() {
				$this->load->model('Payments_model');
				$id = $this->input->post('gatewayid');
				$this->Payments_model->enable_gateway($id);
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// disable mulitple subscribers

		public function disable_multiple_subscribers() {
				$newslist = $this->input->post('newslist');
				foreach ($newslist as $newsid) {
						$this->Newsletter_model->disable_subscriber($newsid);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable mulitple subscribers

		public function enable_multiple_subscribers() {
				$newslist = $this->input->post('newslist');
				foreach ($newslist as $newsid) {
						$this->Newsletter_model->enable_subscriber($newsid);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// disable single subscriber

		public function disable_single_subscriber() {
				$newsid = $this->input->post('newsid');
				$this->Newsletter_model->disable_subscriber($newsid);
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable single subscriber

		public function enable_single_subscriber() {
				$newsid = $this->input->post('newsid');
				$this->Newsletter_model->enable_subscriber($newsid);
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// delete single subscriber

		public function delete_single_subscriber() {
				$newsid = $this->input->post('newsid');
				$this->Newsletter_model->delete_subscriber($newsid);
				$this->session->set_flashdata('flashmsgs', "Removed Successfully");
		}
// delete single subscriber

		public function delete_multiple_subscribers() {
				$newslist = $this->input->post('newslist');
				foreach ($newslist as $newsid) {
						$this->Newsletter_model->delete_subscriber($newsid);
				}
				$this->session->set_flashdata('flashmsgs', "Removed Successfully");
		}
// delete multiple Accounts

		public function delete_multiple_accounts() {
				$accountlist = $this->input->post('accountlist');
				foreach ($accountlist as $accid) {
						$this->Accounts_model->delete_account($accid);
				}
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// delete Single Account

		public function delete_single_account() {
				$accountid = $this->input->post('accountid');
				$this->Accounts_model->delete_account($accountid);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// disable multiple Accounts

		public function disable_multiple_accounts() {
				$accountlist = $this->input->post('accountlist');
				foreach ($accountlist as $accid) {
						$this->Accounts_model->disable_account($accid);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable multiple Accounts

		public function enable_multiple_accounts() {
				$accountlist = $this->input->post('accountlist');
				foreach ($accountlist as $accid) {
						$this->Accounts_model->enable_account($accid);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// disable single Accounts

		public function disable_single_account() {
				$accid = $this->input->post('id');
				$this->Accounts_model->disable_account($accid);
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// enable single Accounts

		public function enable_single_account() {
				$accid = $this->input->post('id');
				$this->Accounts_model->enable_account($accid);
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}


//change language front-end

		public function change_language_front() {
				$langid = $this->input->post('languageid');
				$langname = $this->input->post('langname');

			  //	$this->session->set_userdata('set_lang', $langid);
			//	$this->session->set_userdata('lang_name', $langname);
		}

//change currency front-end
		function changeCurrency() {
				$id = $this->input->post('id');
				$this->Settings_model->changeCurrency($id);
		}

// Remove theme
		function remove_theme() {
				$this->Settings_model->remove_theme();
		}

// Select theme
		function select_theme() {
				$this->Settings_model->select_theme();
		}
// load state and city of a country selected

		public function get_city() {
				$type = $this->input->post('loadtype');
				$id = $this->input->post('loadid');
				$HTML = "";
				if ($type == 'state') {
						$data = $this->Countries_model->get_country_state($id);
						if (!empty ($data)) {
								$HTML .= "

<option value=''>Select State</option>

";
								foreach ($data as $d) {
										$HTML .= "

<option value='" . $d->state_id . "'>" . $d->state_name . "</option>

";
								}
						}
				}
				elseif ($type == 'city') {
						$data2 = $this->Countries_model->get_state_city($id);
						if (!empty ($data2)) {
								foreach ($data2 as $d2) {
										$HTML .= "

<option value='" . $d2->city_id . "'>" . $d2->city_name . "</option>

";
								}
						}
				}
				echo $HTML;
		}
// load users first name by user type

		public function get_users_name() {
				$type = $this->input->post('usertype');
				$HTML = "";
				$data = $this->Accounts_model->get_accounts_data($type);
				if (!empty ($data)) {
						foreach ($data['all'] as $d2) {
								$HTML .= "

<option value='" . $d2->accounts_id . "'>" . $d2->ai_first_name . " " . $d2->ai_last_name . "</option>

";
						}
				}
				echo $HTML;
		}
// load items of the selected module

		public function get_module_items() {
				$modtype = $this->input->post('modtype');
				$user = $this->input->post('user');
				$issupplier = $this->input->post('segment');
				if ($issupplier == "supplier") {
						echo $this->Modules_model->get_supplier_module_items($modtype, $user);
				}
				else {
						echo $this->Modules_model->get_module_items($modtype);
				}
		}
// Delete Single Supplement

		public function delete_single_supp() {
				$suppid = $this->input->post('suppid');
				$this->Extras_model->delete_supp($suppid);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
// Disable extras

		public function disable_multiple_supps() {
				$supplist = $this->input->post('supplist');
				foreach ($supplist as $id) {
						$this->Extras_model->disable_supp($id);
				}
				$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
		}
// Enable extras

		public function enable_multiple_supps() {
				$supplist = $this->input->post('supplist');
				foreach ($supplist as $id) {
						$this->Extras_model->enable_supp($id);
				}
				$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
		}
// Delete multiple extras

		public function delMultipleEXtras() {
			$items = $this->input->post('items');
          foreach($items as $item){
          		$this->Extras_model->deleteExtra($item);
          }
		}
// get submenu item types

		public function get_submenu_types() {
				$type = $this->input->post('types');
				$HTML = "";
				$data = $this->Menus_model->populate_submenu($type);
				if (!empty ($data)) {
						foreach ($data as $d2) {
								$HTML .= "

<option value='" . $d2->id . "' data-label='" . $d2->label . "'>" . $d2->label . "</option>

";
						}
				}
				echo $HTML;
		}

		public function add_hotels_submenu() {
				$this->Menus_model->add_hotels_submenu();
		}

		public function delete_submenu_item() {
				$this->Menus_model->del_submenu_item();
		}

//process booking
		function processBookingguest() {
				$this->load->model('Admin/Bookings_model');
				$this->form_validation->set_message('matches', trans("0310"));
				$this->form_validation->set_message('valid_email', trans("0311"));
				$this->form_validation->set_message('required', "%s " . trans("0312"));
				$this->form_validation->set_rules('email', trans("094"), 'trim|required|valid_email');
				$this->form_validation->set_rules('confirmemail', trans("094"), 'trim|required|valid_email|matches[email]');
				$this->form_validation->set_rules('firstname', trans("0171"), 'trim|required');
				$this->form_validation->set_rules('lastname', trans("0172"), 'trim|required');
				if ($this->form_validation->run() == FALSE) {

					$bookingResult = array("error" => "yes", 'msg' => validation_errors());
				}
				else {

					$bookingResult = $this->Bookings_model->doGuestBooking();
				}

				//$bookingResult = array("error" => "yes", 'msg' => $this->input->post('passport'));
				echo json_encode($bookingResult);

		}

		function processBookinglogged() {
				$this->load->model('Admin/Bookings_model');
				$user = $this->session->userdata('pt_logged_customer');
				echo json_encode($this->Bookings_model->do_booking($user));
		}

		function processBookinglogin() {
				$this->load->model('bookings_model');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				if ($this->input->is_ajax_request()) {
				  $bookingtype = $this->input->post('btype');

						$bookingResult = $this->Bookings_model->do_login_booking($username, $password);
						echo json_encode($bookingResult);
				}
		}

		function processBookingsignup() {
				$this->load->model('bookings_model');
				$this->form_validation->set_message('matches', trans("0310"));
				$this->form_validation->set_message('valid_email', trans("0311"));
				$this->form_validation->set_message('required', "%s " . trans("0312"));
				$this->form_validation->set_rules('email', trans("094"), 'required|valid_email');
				$this->form_validation->set_rules('password', trans("095"), 'required|min_length[6]');
				$this->form_validation->set_rules('firstname', trans("0171"), 'trim|required');
				$this->form_validation->set_rules('lastname', trans("0172"), 'trim|required');
				if ($this->form_validation->run() == FALSE) {
						echo "

<div class='alert alert-danger'>" . validation_errors() . "</div>

";
				}
				else {
						$this->db->select('accounts_email');
						$this->db->where('accounts_email', $this->input->post('email'));
						$this->db->where('accounts_type', 'customers');
						$nums = $this->db->get('pt_accounts')->num_rows();
						if ($nums > 0) {
								echo "

<div class='alert alert-danger'>" . trans("0313") . "</div>";
						}
						else {
								$this->Bookings_model->do_customer_booking();
								echo "";
						}
				}
		}

		public function verifyAccount() {
				$id = $this->input->post('id');
				$accType = $this->input->post('accType');
				$this->Accounts_model->verify_account($id, $accType);
				$this->session->set_flashdata('flashmsgs', "Account Verified Successfully");
		}

		public function remove_from_menu() {
				$pageid = $this->input->post('pageid');
				$menutype = $this->input->post('menutype');
				if ($menutype == "header") {
						$this->Menus_model->remove_from_header($pageid);
				}
				else {
						$this->Menus_model->remove_from_footer($pageid);
				}
				$this->session->set_flashdata('flashmsgs', "Menu updated Successfully");
		}

		public function updateitemsorder() {
				$items = $this->input->post('menuitems');
				$id = $this->input->post('menuid');
			  $this->Menus_model->update_menu($items, $id);
		}

		public function togglediv() {
				$id = $this->input->post('id');
				if (empty ($id)) {
						$this->session->set_userdata('divclass', "active");
				}
				else {
						$this->session->set_userdata('divclass', "");
				}
		}

		function update_room_adv() {
				$date = $this->input->post('date');
				$roomid = $this->input->post('roomid');
				$rate = $this->input->post('rate');
				$this->load->model('rooms_model');
				$this->Rooms_model->update_room_adv($date, $roomid, $rate);
		}

		function sendtotest() {
				$template = $this->input->post('template');
				$this->load->model('Admin/Emails_model');
				echo $this->Emails_model->sendtotest($template);
		}

		function testingEmail() {
				$email = $this->input->post('email');
				$this->load->model('Admin/Emails_model');
				echo $this->Emails_model->sendtestemail($email);
		}


		function smstest() {
					}

		function quicksms() {
		}

		function quickemail() {
				$msgto = $this->input->post('msgto');
				$subject = $this->input->post('subject');
				$body = $this->input->post('message');
				$msgfrom = $this->input->post('msgfrom');
				if (empty ($msgto)) {
						echo "Enter Email address of recepient";
				}
				elseif (empty ($subject)) {
						echo "Enter Subject of the Email";
				}
				elseif (empty ($body)) {
						echo "Enter Message of the Email";
				}
				elseif (empty ($msgfrom)) {
						echo "Enter the From field";
				}
				else {
						$this->load->model('Admin/Emails_model');
						$this->Emails_model->quickemail($msgfrom, $body, $msgto, $subject);
						echo "1";
				}
		}

        public function postreview(){
          $response = array();
            $this->load->model('Admin/Reviews_model');
        	$this->form_validation->set_rules('reviews_comments', 'Comment', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('fullname', 'Name', 'trim|required');
            	if ($this->form_validation->run() == FALSE) {
				$response = array(
                'result' => false,
                'divclass' => 'alert-danger',
                'msg' => validation_errors()
                );
				}
				else {
				  $check = $this->Reviews_model->check_already_review_posted($this->input->post('email'),$this->input->post('reviewfor'),$this->input->post('reviewmodule'));
					if($check){
                $response = array(
                'result' => false,
                'divclass' => 'alert-danger',
                'msg' => trans('0485')
                );
					}else{
                $this->Reviews_model->add_review_public($this->appsettings[0]->reviews);
                $response = array(
                'result' => true,
                'divclass' => 'alert-success',
                'msg' =>  trans('0486')
                );
					}
				}

        echo json_encode($response);
        }


        public function updatereview(){
          $response = array();
          $id = $this->input->post('reviewid');
            $this->load->model('Admin/Reviews_model');
        	$this->form_validation->set_rules('reviews_comments', 'Comment', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('fullname', 'Name', 'trim|required');
            	if ($this->form_validation->run() == FALSE) {
				$response = array(
                'result' => false,
                'divclass' => 'alert-danger',
                'msg' => validation_errors()
                );
				}
				else {

                $this->Reviews_model->update_review_admin($id);
                $response = array(
                'result' => true,
                'divclass' => 'alert-success',
                'msg' => 'Review Updated Successfully'
                );

				}

        echo json_encode($response);
        }

        public function ThemeInfo(){
          $response = array();
          $theme = $this->input->post('theme');

          $themeinfo = pt_getThemeInfo( "themes/$theme/style.css" );
          if(!file_exists("themes/$theme/screenshot.png")){
           $themeinfo['screenshot'] = PT_BLANK;
          }else{
          $themeinfo['screenshot'] = base_url()."themes/".$theme."/screenshot.png";
			   }
          echo json_encode($themeinfo);

        }

        public function delReview() {
                 $this->load->model('Admin/Reviews_model');
				$id = $this->input->post('id');
				$this->Reviews_model->delete_review($id);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}

		// Delete multiple reviews

		public function delMultipleReviews() {
			  $this->load->model('Admin/Reviews_model');
			$items = $this->input->post('items');
          foreach($items as $item){
          		$this->Reviews_model->delete_review($item);
          }
		}

		function approveReview(){
       	$this->load->model('Admin/Reviews_model');
       	$this->Reviews_model->approveReview();
       }

        public function delAcc() {
				$accountid = $this->input->post('id');
				$this->Accounts_model->delete_account($accountid);
				$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}

		function multiDelAcc(){

          $items = $this->input->post('items');
          foreach($items as $item){
          	$this->Accounts_model->delete_account($item);
          }

        }

		public function approveAccount(){
				$accountid = $this->input->post('id');
				$this->Accounts_model->approveAccount($accountid);
		}

		public function hideBooking(){
		}

        public function createCMSPermalink(){
            $title = $this->input->post('pagetitle');
            $pageid = $this->input->post('pageid');
            $this->db->select("page_id");

				$this->db->order_by("page_id", "desc");
				$query = $this->db->get('pt_cms');
				$lastid = $query->result();
				if (empty ($lastid)) {
						$pagelastid = 1;
				}
				else {
						$pagelastid = $lastid[0]->page_id + 1;
				}
                        $slug = create_url_slug($title);
                        $this->db->select("page_id");
						$this->db->where("page_slug", $slug);
                         if($pageid > 0){
              $this->db->where('page_id !=',$pageid);
            }
						$queryc = $this->db->get('pt_cms')->num_rows();
						if ($queryc > 0) {
								$slug = $slug."-". $pagelastid;
						}
                        echo $slug;
        }

        function delPage(){
             $id = $this->input->post('id');
             $this->Cms_model->delete_page($id);
        }

        function multiDelPage(){

          $items = $this->input->post('items');
          foreach($items as $item){
          	$this->Cms_model->delete_page($item);
          }

        }

         public function createBlogPermalink(){
            $title = $this->input->post('title');
            $postid = $this->input->post('postid');
            $this->db->select("post_id");

				$this->db->order_by("post_id", "desc");
				$query = $this->db->get('pt_blog');
				$lastid = $query->result();
				if (empty ($lastid)) {
						$postlastid = 1;
				}
				else {
						$postlastid = $lastid[0]->post_id + 1;
				}
                        $slug = create_url_slug($title);
                        $this->db->select("post_id");
						$this->db->where("post_slug", $slug);

                        if($postid > 0){
              $this->db->where('post_id !=',$postid);
                         }

						$queryc = $this->db->get('pt_blog')->num_rows();
						if ($queryc > 0) {
								$slug = $slug."-". $postlastid;
						}
                        echo $slug;
        }

        // update post order

		public function update_post_order() {
		  $postid = $this->input->post('id');
		  $order = $this->input->post('order');
           $this->load->model('Blog/Blog_model');
		  $this->db->select('post_id');
          $total = $this->db->get('pt_blog')->num_rows();

          if($order > $total){
            echo '0';
          }else{
          $this->Blog_model->update_post_order($postid, $order);
            echo '1';
          }

		}

        function delBlog(){
            $this->load->model('Blog/Blog_model');
             $id = $this->input->post('id');
             $this->Blog_model->delete_post($id);
        }

        function delBlogCat(){
            $this->load->model('Blog/Blog_model');
             $id = $this->input->post('id');
             $this->Blog_model->delete_cat($id);
        }

        function delLocation(){

            $this->load->model('Admin/Locations_model');
            $id = $this->input->post('id');
            $this->Locations_model->delete_loc($id);
        }

        function delMultipleLocation(){

          $this->load->model('Admin/Locations_model');
          $items = $this->input->post('items');

          foreach($items as $item){
           $this->Locations_model->delete_loc($item);

          }
        }

       function makeCurrDefault(){
         $id = $this->input->post('id');
         $this->Settings_model->makeCurrencyDefault($id);
       }

       function delMultipleCurrencies(){
        $items = $this->input->post('items');
          foreach($items as $item){
          		$this->Settings_model->deleteCurrency($item);
          }
       }

       function updateGatewayOrder(){

       	$order = $this->input->post('order');
       	$action = $this->input->post('action');

       	$this->load->model('Payments_model');
       	$this->Payments_model->updateOrder($order,$action);

       }

       function reduceSidebar(){
       	$sidebar = $this->input->post('sidebar');
       	$this->session->set_userdata('sideBar', $sidebar);

       }



       function notifications(){
       }

       function checkCoupon(){

       }

       function delMultipleWidgets(){

       	$this->load->model('Admin/Widgets_model');

       	$items = $this->input->post('items');
        foreach($items as $item){

       	$this->Widgets_model->deleteWidget($item);

       }

       }

			 function locationsList(){

				 $query = $this->input->get('query');
				 $this->db->select('id,location');
		     $this->db->like('location', $query);
		 //$this->db->or_like('country',$query);
		     $this->db->limit('25');
		     $locres = $this->db->get('pt_locations')->result();
		     if (!empty($locres)) {
		       //$locations[] = (object) array('id' => '', 'name' => '', 'module' => 'location', 'disabled' => true);
		       foreach ($locres as $l) {
		         $locInfo = pt_LocationsInfo($l->id);
		         $locations[] = (object) array('id' => $l->id, 'text' => $locInfo->city.", ".$locInfo->country);
		       }
					 $results = json_encode($locations);
		     }else{
					 $results = json_encode(array("text" => "Not Found"));
				 }

				echo $results;

			 }



}
