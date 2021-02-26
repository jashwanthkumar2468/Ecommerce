<?php

class EcoDashAdmin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function SignOut()
	{
		$this->session->sess_destroy();
		redirect(base_url('EcoDashAdmin'));
	}
	public function StaffSignOut()
	{
		$this->session->sess_destroy();
		redirect(base_url('EcoDashAdmin/staffmemberslogin'));
	}
	public function create_links($total_rows=0, $per_page=0, $cur_page=0,$num_links=2)
	{
		if ($total_rows == 0 OR $per_page == 0)
		return '';
		
		$num_pages = (int) ceil($total_rows / $per_page);
	
		if ($num_pages === 1)
		return '';

		
		if($cur_page > $num_pages)
			$cur_page = $num_pages;		

		if($cur_page<$num_links)
		{
			$start	= 1;
			if($num_links > $num_pages) 
				$end = $num_pages;	
			else
				$end = $num_links;
		}
		else
		{
			$start	= $cur_page;
			if(($cur_page + $num_links) > $num_pages) 
				$end = $num_pages;	
			else
				$end = $num_links;
		}
		
		$output = '';
		// Render the "First" link.
		if ($cur_page > 1)
		$output .= '<li page="1"><a aria-label="First"  href="javascript:void(0);"> <span aria-hidden="true">First</span></a></li>';

       
      
		// Render the "Previous" link.
		if ($cur_page !== 1 && $cur_page>1)
		$output .= '<li page="'.($cur_page-1).'"><a href="javascript:void(0);">Previous</li></a>';

		for ($loop = $start; $loop <= $end; $loop++)
		{
			if (intval($cur_page) == intval($loop))
				$output .= "<li page='$loop' class='active'><a href='javascript:void(0);'>".$loop."</a></li>";
			else
				$output .= "<li page='$loop'><a href='javascript:void(0);'>".$loop."</a></li>";
		}	
		
		if ($cur_page < $num_pages)
		{
			$i = $cur_page + 1;
			$output .= "<li page='$i'><a href='javascript:void(0);'>Next</a></li>";
		}

		if($cur_page < $num_pages-1)
		$output .= "<li page='$num_pages'><a href='javascript:void(0);'>Last</a></li>";
		//var_dump($output);die;  
		return $output;
	}
	public function index()
	{
		if($this->input->post())
		{
			if($this->input->post('LoginEmail'))
			{
				$result = $this->Admin_model1->auth();
				echo json_encode($result);
			}
			else
				echo '';
			if($this->input->post('Email'))
			{
				$result = $this->Admin_model1->auth();
				echo $result;
			}
			echo '';

			exit;
		}
		$this->load->view("Admin/Login");
	}

	public function Dashboard()
	{
	    $data['OrderCount'] = $this->Admin_model1->count_orders();
		$data['RequestCount'] = $this->Admin_model1->count_requests();
		$this->load->view('Admin/includes/header',$data);
		$this->load->view('Admin/dashboard');
		$this->load->view('Admin/includes/footer');
	}

	public function Categories()
	{
		if($this->input->post('Add_Edit_Category') == true)
		{
			$this->Admin_model1->Add_Edit_Category();
			redirect(base_url('EcoDashAdmin/Categories'));
		}
		if($this->input->post('get') == 'category')
		{
			$skey = $this->input->post('skey');
			$page = $this->input->post('page');

			$result = $this->Admin_model1->get_categories($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('category'=>$result['category'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'categoryedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->Admin_model1->edit_category($eid);
			echo json_encode($result);
			exit;
		}
		$this->load->view('Admin/includes/header');
		$this->load->view('Admin/Categories');
		$this->load->view('Admin/includes/footer');
	}

	public function SubMenu()
	{
		if($this->input->post('Add_Edit_Sub_Category') == true)
		{
			$this->Admin_model1->Add_Edit_Sub_Category();
			redirect(base_url('EcoDashAdmin/SubMenu'));
		}
		if($this->input->post('get') == 'subcategory')
		{
			$skey = $this->input->post('skey');
			$page = $this->input->post('page');

			$result = $this->Admin_model1->get_sub_categories($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('subcategory'=>$result['subcategory'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'subcategoryedit')
		{
			$id = intval($this->input->post('eid'));
			if($id!='')
				$result = $this->Admin_model1->edit_sub_category($id);
			echo json_encode($result);
			exit;
		}
			 if($this->input->post('Del')=='installation')  
		  { 
	            
	           $id = $this->input->post('iid');   
		 $this->Admin_model1->deleteRecordSub($id);    
	    redirect("EcoDashAdmin/SubMenu");  
		  }
		$data['Categories'] = $this->Admin_model1->get_categories_select();
		$this->load->view('Admin/includes/header',$data);
		$this->load->view('Admin/SubMenu');
		$this->load->view('Admin/includes/footer');
	}

	public function SubMenuList()
	{
		if($this->input->post('Add_Edit_Sub_Category_List') == true)
		{
			$this->Admin_model1->Add_Edit_Sub_Category_List();
			redirect(base_url('EcoDashAdmin/SubMenuList'));
		}
		if($this->input->post('get') == 'scategory')
		{
			$catid = intval($this->input->post('catname'));
			if($catid!='')
				$result = $this->Admin_model1->get_sub_list($catid);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'subcategorylist')
		{
			$skey = $this->input->post('skey');
			$page = $this->input->post('page');

			$result = $this->Admin_model1->get_sub_categories_list($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('subcategorylist'=>$result['subcategorylist'],'pagination'=>$pagination));
			//redirect(base_url('EcoDashAdmin/SubMenuList').$page);
			exit;
		}
			if($this->input->post('get') == 'subcategorylistedit')
		{
			$id = intval($this->input->post('eid'));
			if($id!='')
				$result = $this->Admin_model1->edit_sub_main_category($id);
			echo json_encode($result);
			exit;
		}
			 if($this->input->post('Del')=='installation')  
		  { 
	            
	           $id = $this->input->post('iid');   
		 $this->Admin_model1->deleteRecordSubCat($id);    
	    redirect("EcoDashAdmin/SubMenuList");  
		  }

		$data['Categories'] = $this->Admin_model1->get_categories_select();
		$this->load->view('Admin/includes/header',$data);
		$this->load->view('Admin/SubMenuList');
		$this->load->view('Admin/includes/footer');

	}

	public function Products()
	{
		
		if($this->input->post('Role') == 'import_file_flag')
			{
				$result = $this->Admin_model1->coupons_import_file_flag();
				echo json_encode($result);
				die;
			}
		
		if($this->input->post('get') == 'scategory')
		{
			$catid = intval($this->input->post('catname'));
			if($catid!='')
				$result = $this->Admin_model1->get_sub_list($catid);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'scategorylist')
		{
			$catid = intval($this->input->post('scatname'));
			if($catid!='')
				$result = $this->Admin_model1->get_sub_list_list($catid);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'caretsTypesV')
		{
			$caretsTypesid = intval($this->input->post('caretsTypesid'));
			if($caretsTypesid!='') 
				$result = $this->Admin_model1->get_caretsTypesid($caretsTypesid);
			echo json_encode($result);  
			exit;
		}
		if($this->input->post('Add_Edit_Products') == true)
		{
			$this->Admin_model1->Add_Edit_Products();
			redirect(base_url('EcoDashAdmin/Products'));
		}
		if($this->input->post('get') == 'allproducts')
		{
			$page = $this->input->post('page');
			$skey = strip_tags($this->input->post('skey'));

			$result = $this->Admin_model1->get_all_products($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array("products"=>$result['products'],"pagination"=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'productlist')
		{
			$id = intval($this->input->post('pid'));
			if($id!='')
				$result = $this->Admin_model1->get_edit_products($id);
			echo json_encode($result);
			exit; 
		}
		if($this->input->post('Del') == 'products_del')
		{
			$id = intval($this->input->post('did'));
			if($id!='')
				$result = $this->Admin_model1->del_products($id);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'stonessedit')
		{ 
			$id = strip_tags($this->input->post('iid'));    
			if($id!='')
				$result = $this->Admin_model1->edit_stonesedits($id);
		   echo json_encode($result); 
		   exit;
		}   
		if($this->input->post('get') == 'getmaking') 
		{ 
			$makcharge = $this->input->post('makcharge');  
			 
			if($makcharge!='')        
				$result = $this->Admin_model1->find_getmaking($makcharge);  
			echo json_encode($result);     
			exit;   
		}	
		if($this->input->post('get') == 'stname')
		{
			$catid = $this->input->post('stoneparent');
			if($catid!='')
				$result = $this->AdminModel->get_stone_name($catid);
			echo json_encode($result);
			exit;
		}
		
		if($this->input->post('get') == 'stoneprice')
		{
			
			$result = $this->AdminModel->getstoneprice();
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'wastage')
		{
			
			$result = $this->AdminModel->getwastage();
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'stylemodel')
		{
			$style = $this->input->post('style');
			if($style!='')
				$result = $this->Admin_model1->getstylemodel($style);
			echo json_encode($result);
			exit;
		}
		$data['Categories'] = $this->Admin_model1->get_categories_select();
		$data['stones'] = $this->Admin_model1->get_stone(); 
		$data['carats'] = $this->Admin_model1->get_carat();  
		$data['style']=$this->Admin_model1->get_style();  
		$data['CaretsType'] = $this->Admin_model1->get_CaretsType();
		$data['GoldRate'] = $this->Admin_model1->get_rate_gold();  
		$data['stoneCategories'] = $this->AdminModel->get_stone_categories_select();
		$data['stoneclrs'] = $this->AdminModel->get_stone_clrs_select();
		$this->load->view('Admin/includes/header',$data);
		$this->load->view('Admin/Products',$data); 
		$this->load->view('Admin/includes/footer');
	}
	
	public function RegisteredUsers()
	{
			if($this->input->post('get') == 'userdetails')
		{
			$skey = $this->input->post('skey');
			$page = $this->input->post('page');

			$result = $this->Admin_model1->get_user_Logindetails($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);
			echo json_encode(array("userdetails"=>$result['userdetails'],"pagination"=>$pagination));
			exit;
		}
			if($this->input->post('get') == 'Loginusert')
		{
			$id = $this->input->post('id');
			if($id!='')
				$result = $this->Admin_model1->get_userlogintime($id);
			echo json_encode($result);
			exit;
		}
		
		if($this->input->post('Edit')=='userstatus')
		{
			$id = strip_tags($this->input->post('statusid1'));
			$statusid = strip_tags($this->input->post('statusid'));
			if($id!='')
			{
				$result = $this->AdminModel->userstatus($id,$statusid);
				echo json_encode($result);exit;
			}
		}
		
		if($this->input->post('update') == 'changelogintime')
		{
			$result = $this->Admin_model1->update_user_logintime1();
			echo json_encode($result);
			exit;
		}
  
		
		
		$this->load->view('Admin/includes/header');
		$this->load->view('Admin/regusers'); 
		$this->load->view('Admin/includes/footer');
	}
	public function SigninRequests()
	{
	    $signin='yes';
			if($this->input->post('get') == 'userdetails')
		{
			$skey = $this->input->post('skey');
			$page = $this->input->post('page');

			$result = $this->Admin_model1->get_user_Logindetails($page,$skey,$signin);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);
			echo json_encode(array("userdetails"=>$result['userdetails'],"pagination"=>$pagination));
			exit;
		}
			if($this->input->post('get') == 'Loginusert')
		{
			$id = $this->input->post('id');
			if($id!='')
				$result = $this->Admin_model1->get_userlogintime($id);
			echo json_encode($result);
			exit;
		}
		
		if($this->input->post('Edit')=='userstatus')
		{
			$id = strip_tags($this->input->post('statusid1'));
			$statusid = strip_tags($this->input->post('statusid'));
			if($id!='')
			{
				$result = $this->AdminModel->userstatus($id,$statusid);
				echo json_encode($result);exit;
			}
		}
		
		if($this->input->post('update') == 'changelogintime')
		{
			$result = $this->Admin_model1->update_user_logintime1();
			echo json_encode($result);
			exit;
		}
  
		
		
		$this->load->view('Admin/includes/header');
		$this->load->view('Admin/signinrequests'); 
		$this->load->view('Admin/includes/footer');
	}

	public function UpdateGoldRate()
	{
		if($this->input->post('Add_Edit_Gold') == true)
		{
			$this->Admin_model1->Add_Edit_Gold_Rate();
			redirect(base_url('EcoDashAdmin/UpdateGoldRate'));
		}
		if($this->input->post('get') == 'gold')
		{
			$skey = $this->input->post('skey');
			$page = $this->input->post('page');

			$result = $this->Admin_model1->get_gold_rate($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);
			echo json_encode(array("gold"=>$result['gold'],"pagination"=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'goldprice')
		{
			$id = $this->input->post('id');
			if($id!='')
				$result = $this->Admin_model1->get_gold_price($id);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('update') == 'goldrateprice')
		{
			$result = $this->Admin_model1->update_today_goldrate1();
			echo json_encode($result);
			exit;
		}

		$this->load->view("Admin/includes/header");
		$this->load->view("Admin/updategoldrate");
		$this->load->view("Admin/includes/footer");
	}
	
	public function Orders()
	{
		if($this->input->post('get') == 'orders')
		{
			$page = strip_tags($this->input->post('page'));
			$skey = strip_tags($this->input->post('skey'));

			$result = $this->Admin_model1->get_all_orders($skey,$page);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);
			echo json_encode(array("orders"=>$result['orders'],"pagination"=>$pagination));

			exit;
		}
		 if($this->input->post('Update')=='installation')  
		  { 
	            
	           $id = $this->input->post('iid');   
		 $this->Admin_model1->updateStatus($id);    
	    redirect("ReSSLrDaMin/Orders");  
		  }
		$this->load->view("Admin/includes/header");
		$this->load->view("Admin/Orders");
		$this->load->view("Admin/includes/footer");
	}
	
	public function Order_View($id) 
	{
		
		if($this->input->post('get') == 'orders_details')
		{
			$result = $this->Admin_model1->get_order_details($id);
			echo json_encode($result);
			exit;
		} 
		if($this->input->post('get') == 'orders_details_products')
		{   
			$result = $this->Admin_model1->orders_details_productss($id); 
			echo json_encode($result);
			exit; 
		} 
		if($this->input->post('get') == 'imageview')
		{
			$id = $this->input->post('id');
			if($id!='')
				$result = $this->Admin_model1->get_image_order_view($id);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('Add_Edit_History') == true)
		{
			$result = $this->Admin_model1->Add_Edit_History($id);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'orderhistory')
		{
			$page = $this->input->post('page');

			$result = $this->Admin_model1->get_order_history($page,$id);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('orderhistory'=>$result['orderhistory'],'pagination'=>$pagination));
			exit;

		}	
		$data['OrderId'] = $id;
		$this->load->view("Admin/includes/header",$data);
		$this->load->view("Admin/Order_View");
		$this->load->view("Admin/includes/footer");
	}
	
	public function Invoice($OrderId)
	{
		$data['Invoice_oid'] = $this->Admin_model1->get_details_for_invoice_generates($OrderId);
		$data['Invoice'] = $this->Admin_model1->get_details_for_invoice_generate_orderids($OrderId);
		  
		$this->load->view('Admin/Invoice_order',$data);
	}

	public function invoicegenerate()
	{
		$data['Invoice'] = $this->Admin_model1->get_details_for_invoices_generates();
		$this->load->view('Admin/Invoice',$data);
	}
	
	
	public function Stone_type()
	{
		if($this->input->post('Add_Edit_Stone_Type') == true)
		{
			$this->Admin_model1->Add_Edit_Stone_Type(); 
			redirect(base_url('EcoDashAdmin/Stone_type'));
		}
		if($this->input->post('get') == 'get_stonetype')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->Admin_model1->get_stonetype($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('get_stonetype'=>$result['get_stonetype'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'stoneedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->Admin_model1->edit_stone($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_stone')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->Admin_model1->del_stone($eid);
			echo json_encode($result);   
			exit;  
		}
		$this->load->view("Admin/includes/header");
		$this->load->view("Admin/stonetype"); 
		$this->load->view("Admin/includes/footer");
	}
	
	public function Carat_type()
	{ 
	    if($this->input->post('Add_Edit_Carat_Type') == true)
		{
			$this->Admin_model1->Add_Edit_Carat_Type(); 
			redirect(base_url('EcoDashAdmin/Carat_type')); 
		} 
		if($this->input->post('get') == 'get_carattype') 
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->Admin_model1->get_carattype($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('get_carattype'=>$result['get_carattype'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'caratedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->Admin_model1->edit_carat($eid); 
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_carat')     
		{  
			$eid = $this->input->post('iid');  
			if($eid!='')  
				$result = $this->Admin_model1->del_carat($eid); 
			echo json_encode($result);   
			exit;  
		}
		$this->load->view("Admin/includes/header");  
		$this->load->view("Admin/carattype");  
		$this->load->view("Admin/includes/footer");  
	}
	 
	public function MakingCharges()   
	{
		
		if($this->input->post('get') == 'subcategory')
		{
			$catid = intval($this->input->post('parentcategory'));
			if($catid!='')
				$result = $this->Admin_model1->get_sub_list($catid);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('get') == 'stylemodel')
		{
			$style = $this->input->post('style');
			if($style!='')
				$result = $this->Admin_model1->getstylemodel($style);
			echo json_encode($result);
			exit;
		}
		if($this->input->post('Add_Edit_Piece_Type') == true)
		{
			$this->Admin_model1->Add_Edit_Making_Charges(); 
			redirect(base_url('EcoDashAdmin/MakingCharges'));   
		} 
		if($this->input->post('get') == 'get_piecetype') 
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->Admin_model1->get_Making_Charges($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('get_piecetype'=>$result['get_piecetype'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'pieceedit')
		{ 
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->Admin_model1->edit_Making_Charges($eid);  
			echo json_encode($result);   
			exit;  
		}
		
		if($this->input->post('Del') == 'Del_piece')     
		{   
			$eid = $this->input->post('iid');  
			if($eid!='')  
				$result = $this->Admin_model1->del_Making_Charges($eid);  
			echo json_encode($result);   
			exit;  
		}
		$data['parentcategory']=$this->Admin_model1->get_categories_select();
		$data['purity']=$this->Admin_model1->get_purity();
		$data['style']=$this->Admin_model1->get_style();
		$data['weight']=$this->Admin_model1->get_weight();
		$this->load->view("Admin/includes/header");        
		$this->load->view("Admin/makingtype",$data);           
		$this->load->view("Admin/includes/footer");     
	}
	//////Making charges End/////

		public function UserCategories($id)
	{
		$a=array("uid"=>$id);
		$staffid=0;
	//	$this->session->set_userdata($a);
		$data['count_cart'] = $this->AdminModel->get_count_cart();
		$data['mainmenu']=$this->AdminModel->mainmenu_cat($id);
		$data['submenu']=$this->AdminModel->submenu_cat($id);
		$data['products']=$this->AdminModel->ProductsView($id,$staffid);
		$data['auid'] = $id;
		$data['staffid'] = $staffid;
		if($this->input->post('get') == 'admincartform')
		{
			$uid= $this->input->post('auid');
			if($uid!='') 
				$result = $this->AdminModel->admin_add_user_cart1($uid); 
			echo json_encode($result);
			exit;
	
		}
		//$this->load->view("Admin/includes/header");        
		$this->load->view("Admin/usercat",$data);           
		//$this->load->view("Admin/includes/footerl");
	}
	
	////staff categories page starts /////
	public function StaffCategories($id)
	{
		$a=array("uid"=>$id);
	//	$this->session->set_userdata($a);
		$data['count_cart'] = $this->AdminModel->get_count_cart();
		$data['mainmenu']=$this->AdminModel->mainmenu_staffcat($id);
		$data['submenu']=$this->AdminModel->submenu_staffcat($id);
		$data['products']=$this->AdminModel->staffProductsView($id);
		$data['auid'] = $id;
		if($this->input->post('get') == 'admincartform')
		{
			$uid= $this->input->post('auid');
			if($uid!='') 
				$result = $this->AdminModel->admin_add_cart1($uid); 
			echo json_encode($result);
			exit;	
		}
		
		//$this->load->view("Admin/includes/header");        
		$this->load->view("Admin/staffcat",$data);           
		//$this->load->view("Admin/includes/footerl");
	}
	
	//// staff user categories /////
		public function StaffUserCategories($id)
	{
		$a=array("uid"=>$id);
		$staffid = $this->session->userdata('staffid');
		//$this->session->set_userdata($a);
		$data['count_cart'] = $this->AdminModel->get_count_cart();
		$data['mainmenu']=$this->AdminModel->mainmenu_cat($id);
		$data['submenu']=$this->AdminModel->submenu_cat($id);
		$data['products']=$this->AdminModel->ProductsView($id,$staffid);
		$data['auid'] = $id;
		$data['staffid'] = $staffid;
		$data['staffproducttype']=$this->AdminModel->staffproducttype($staffid);
		if($this->input->post('get') == 'admincartform')
		{
			$uid= $this->input->post('auid');
			if($uid!='') 
				$result = $this->AdminModel->admin_add_user_cart1($uid); 
			echo json_encode($result);
			exit;
	
		}
		//$this->load->view("Admin/includes/header");        
		$this->load->view("Admin/usercat",$data);           
		//$this->load->view("Admin/includes/footerl");
	}
	//// staff user categories ends /////
	
	
	
	
	
   //// staff categories page  ends /////
	
	
	public function cartcount()
	{
		if($this->input->post('cartcount') == 'cartcount')
		{
			$uid = $this->input->post('uid');
			$result = $this->AdminModel->get_count_cart(); 
			echo json_encode($result);
			exit;
		}
		if($this->input->post('cartcount') == 'cartcount1')
		{
			$uid = $this->input->post('uid');
			$result = $this->AdminModel->get_count_cart1(); 
			echo json_encode($result);
			exit;
		}
	}
	
		public function cart()
	{
		if($this->input->post('add') == 'Admincart')
		{
			$id = $this->input->post('id');
			$uid= $this->input->post('uid');
			
			if($id!='')
				$result = $this->AdminModel->admin_add_cart($id,$uid); 
			echo json_encode($result);
			exit;
		}
	}
	
	public function clickSide()
	{
		if($this->input->post('get') == 'getAdminProductsSide')
		{     
			$proId = $this->input->post('catId');  
			$uid = $this->input->post('uid'); 
			$parentid = $this->input->post('parentid');			
			$result = $this->AdminModel->get_admin_ProductsSide($proId,$parentid); 
			
			echo json_encode(array('getSidePro'=>$result['getSidePro']));
			exit;   
		} 
	} 
	public function clickSide1()
	{
		if($this->input->post('get') == 'getAdminProductsSide')
		{     
			$proId = $this->input->post('catId');  
			$uid = $this->input->post('uid'); 
			$parentid = $this->input->post('parentid');			
			$result = $this->AdminModel->get_admin_ProductsSide1($proId,$parentid); 
			
			echo json_encode(array('getSidePro'=>$result['getSidePro']));
			exit;   
		} 
	}
		public function clickparentSide()
	{
		if($this->input->post('get') == 'getAdminparentProductsSide')
		{     
	        // $uid1 = $this->session->userdata('uid');
			 
			//$proId = $this->input->post('catId');  
			$uid = $this->input->post('uid'); 
			$parentid = $this->input->post('parentid');
//print_r($uid1);			
//print_r($parentid);
////exit;			
	$result = $this->AdminModel-> get_admin_ProductsparentSide($parentid,$uid); 
			
			echo json_encode(array('getSidePro1'=>$result['getSidePro1']));
			exit;   
		} 
	}
	
		public function clickparentSide1()
	{
		if($this->input->post('get') == 'getAdminparentProductsSide')
		{     
	         $uid1 = $this->session->userdata('uid1');
			 
			
			$parentid = $this->input->post('parentid'); 
			$min = $this->input->post('min');
			$max = $this->input->post('max');
//print_r($uid1);			
//print_r($parentid);
//exit;			
	$result = $this->AdminModel-> get_welcome_ProductsparentSide1($parentid,$uid1,$min,$max); 
			
			echo json_encode(array('getSidePro1'=>$result['getSidePro1']));
			exit;   
		} 
	}
	
	public function StaffMembers()   
	{
		if($this->input->post('Add_Edit_staff_mem') == true)
		{
			$this->AdminModel->Add_Edit_staff_mem(); 
			redirect(base_url('EcoDashAdmin/StaffMembers'));   
		} 
		if($this->input->post('get') == 'get_staffmem') 
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_staffmem($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('get_staffmem'=>$result['get_staffmem'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'staffedit')
		{ 
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_staffmem($eid);  
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_staffmem')     
		{   
			$eid = $this->input->post('iid');  
			if($eid!='')  
				$result = $this->AdminModel->del_staffmem($eid);  
			echo json_encode($result);   
			exit;  
		}
		$data['parentcategory'] = $this->AdminModel->getParentCategory();		
		$data['subcategory'] = $this->AdminModel->getSubCategory();	
		$data['category']=$this->AdminModel->category();
		$data['subcategory1']=$this->AdminModel->subcategory();
		
		$this->load->view("Admin/includes/header");        
		$this->load->view("Admin/staff",$data);           
		$this->load->view("Admin/includes/footer");     
	}
	
	
	////////Assigned Users start/////////////
		public function AssignedUsers()   
	{
		if($this->input->post('Add_Edit_assign_mem') == true)
		{
			
			$this->AdminModel->Add_Edit_assign_mem(); 
			redirect(base_url('EcoDashAdmin/AssignedUsers'));   
			
			
			
		} 
		if($this->input->post('get') == 'get_assignedmem') 
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_assignedmem($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('get_assignedmem'=>$result['get_assignedmem'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'assignedit')
		{ 
			$eid = $this->input->post('eid');
			//print_r($eid);
			//exit;
			
			if($eid!='')
				$result = $this->AdminModel->edit_assign_mem($eid);  
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'del_assign_mem')     
		{   
			$eid = $this->input->post('iid');  
			if($eid!='')  
				$result = $this->AdminModel->del_assign_mem($eid);  
			echo json_encode($result);   
			exit;  
		}
		
		$data['staffmem'] = $this->AdminModel->get_staff_select();
		$data['user'] = $this->AdminModel->get_user_select();
		$data['useredit'] = $this->AdminModel->get_user_select_edit();
		
		$data['assign1'] = $this->AdminModel->get_assigned();
		//print_r($data['assign1']);
		//exit;
		
		$this->load->view("Admin/includes/header");        
		$this->load->view("Admin/assign",$data);           
		$this->load->view("Admin/includes/footer");     
	}
	
	
	////////Assigned Users end/////////////	
	
	
	
	
	
	/////
public function UserOrders(){
		
			if($this->input->post('get') == 'userdetails')
		{
			$skey = $this->input->post('skey');
			$page = $this->input->post('page');

			$result = $this->AdminModel->get_user_orderdetails($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);
			echo json_encode(array("userdetails"=>$result['userdetails'],"pagination"=>$pagination));
			exit;
		}
	
  
		
		
		$this->load->view('Admin/includes/header');
		$this->load->view('Admin/userorders'); 
		$this->load->view('Admin/includes/footer');
	}
	
	public function UserOrdersView($id){
		
			if($this->input->post('get') == 'userdetails')
		{
			
			$page = $this->input->post('page');

			$result = $this->AdminModel->get_user_orderdetailsview($page,$id);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);
			echo json_encode(array("userdetails"=>$result['userdetails'],"pagination"=>$pagination));
			exit;
		}
	
		$this->load->view('Admin/includes/header');
		$this->load->view('Admin/userordersview'); 
		$this->load->view('Admin/includes/footer');
		
		
	}
	//Filters admin side //////
		public function FilterSide()
	{
		if($this->input->post('get') == 'getFilterProducts')
		{     
	          
			$uid = $this->input->post('uid'); 
			$staffid = $this->input->post('staffid'); 
			$description = $this->input->post('description');
			$weight = $this->input->post('weight');
			$minprice= $this->input->post('minprice');
			$maxprice = $this->input->post('maxprice');
			$parentid = $this->input->post('selectparent');
			$subcatid = $this->input->post('selectsub');
			$selectsublist = $this->input->post('selectsublist');
			$selectgender = $this->input->post('selectgender');
			$selectproductcategory = $this->input->post('selectproductcategory');
						
			$result = $this->AdminModel-> get_admin_FilteredProductsSide($parentid,$subcatid,$selectsublist,$selectgender,$selectproductcategory,$description,$weight,$minprice,$maxprice,$uid,$staffid); 
						
			echo json_encode(array('getFilterProducts'=>$result['getFilterProducts']));
			exit;   
		}
		if($this->input->post('get') == 'subcategory')
		{
			$parentid = $this->input->post('pcatname');
			$subcatid = $this->input->post('scatname');
			$result = $this->AdminModel->get_sub_cat_list1($parentid,$subcatid);
			echo json_encode($result);
			exit;
			
		}	
	}

	//Filters Admin side End ////
	//Filters Staff Admin side Starts ////
		public function StaffFilterSide()
	{
		if($this->input->post('get') == 'getFilterProducts')
		{     
	          
			$uid = $this->input->post('uid'); 
			$description = $this->input->post('description');
			$weight = $this->input->post('weight');
			$minprice= $this->input->post('minprice');
			$maxprice = $this->input->post('maxprice');
			$parentid = $this->input->post('selectparent');
			$subcatid = $this->input->post('selectsub');
			$selectsublist = $this->input->post('selectsublist');
			$selectgender = $this->input->post('selectgender');
						
			$result = $this->AdminModel-> get_adminstaff_FilteredProductsSide($parentid,$subcatid,$selectsublist,$selectgender,$description,$weight,$minprice,$maxprice,$uid); 
						
			echo json_encode(array('getFilterProducts'=>$result['getFilterProducts']));
			exit;   
		}
		if($this->input->post('get') == 'subcategory')
		{
			$parentid = $this->input->post('pcatname');
			$subcatid = $this->input->post('scatname');
			$result = $this->AdminModel->get_sub_cat_list1($parentid,$subcatid);
			echo json_encode($result);
			exit;
			
		}	
	}
	//Filters Staff Admin side Ends ////
	 public function ShoppingCart($id)
	{
		$id1=substr($id,0,1);
		if($id1=='a')
		{
			$id=substr($id,1);
			$id1=0;
		}
		else
		{
			$id1=1;
			$id=$id;
		}	
		if($this->input->post('get') == 'vcart')
		{ 
			$result = $this->AdminModel->get_admin_user_shopping_cart($id);
			echo json_encode($result);
			exit;
		} 
		if($this->input->post('del') == 'cart')
		{ 
			$id=$this->input->post('id');
			$result = $this->AdminModel->del_admin_user_shopping_cart($id);
			echo json_encode($result);
			exit;
		} 
		if($this->input->post('add') == 'usercart1')
			{
				$uid= $id;
				$result = $this->AdminModel->admin_user_update_cart($uid); 
				echo json_encode($result);
				exit;
			}
	
			$data['uid']=$id;
			$data['diff']=$id1;
		$this->load->view('Admin/staffusershoppingcart',$data);
		
	}
	 public function ShoppingCart1($id)
	{
		if($this->input->post('get') == 'vcart')
		{ 
			$result = $this->AdminModel->get_admin_shopping_cart($id);
			echo json_encode($result);
			exit;
		} 
		if($this->input->post('del') == 'cart')
		{ 
			$id=$this->input->post('id');
			$result = $this->AdminModel->del_admin_shopping_cart($id);
			echo json_encode($result);
			exit;
		} 
		if($this->input->post('add') == 'usercart1')
			{
				$uid= $id;
				$result = $this->AdminModel->admin_update_cart($uid); 
				echo json_encode($result);
				exit;
			}
			$data['uid']=$id;
		
		$this->load->view('Admin/adminshoppingcart',$data);
		
	}

		////////////Staffmembers controller starts////////////////////
	
	public function staffmemberslogin()
	{
		        
		$this->load->view("Admin/loginstaff"); 

         if($this->input->post())
		{
			if($this->input->post('LoginEmail'))
			{
				$result = $this->Admin_model1->staffauth();
				echo json_encode($result);
			}
			else
				echo '';
			if($this->input->post('Email'))
			{
				$result = $this->Admin_model1->staffauth();
				echo $result;
			}
			echo '';

			exit;
		}		
		
	}
	public function StaffDashboard()
	{
	   // $data['OrderCount'] = $this->Admin_model1->count_orders();
		//$data['UserCount'] = $this->Admin_model1->count_users();
		$this->load->view('Admin/includes/headersraff');
		$this->load->view('Admin/dashboardstaff');
		$this->load->view('Admin/includes/footer');
	}
	
	
		public function StaffMem()   
		{
		
		if($this->input->post('get') == 'get_staffmem') 
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_staffview($page,$skey);
			$pagination = $this->Admin_model1->create_links($result['total'],10,$page);

			echo json_encode(array('get_staffmem'=>$result['get_staffmem'],'pagination'=>$pagination));
			exit;
		}
		
			if($this->input->post('get') == 'Loginusert')
		{
			$id = $this->input->post('id');
			if($id!='')
				$result = $this->Admin_model1->get_userlogintime($id);
			echo json_encode($result);
			exit;
		}
		
		
	    if($this->input->post('update') == 'feedbackform')
		{
			$result = $this->AdminModel->Add_feedback();
			echo json_encode($result);
			exit;
		}
		
		
		
		
		$this->load->view("Admin/includes/headersraff");        
		$this->load->view("Admin/staffview");           
		$this->load->view("Admin/includes/footer");     
	}
	
	
	////////////Staffmembers controller ends////////////////////

////////video upload Controller starts///////////////////

	public function upload()
 {
  sleep(3);

  if($_FILES["files"]["name"] != '')
  {
  //	print_r($_FILES["files"]["name"]);exit;
   $output = '';
   $config["upload_path"] = 'fileuploads/';
   //echo    $config["upload_path"];exit;
   $config["allowed_types"] = 'gif|jpg|png|JPG|mp4';
   $this->load->library('upload', $config);
   $this->upload->initialize($config);
   for($count = 0; $count < count($_FILES["files"]["name"]); $count++)
   {
    //print_r($_FILES["files"]["name"]) ;exit;
    $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
    $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
    $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
    $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
    $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
    if($this->upload->do_upload('file'))
    {
    	
     $data = $this->upload->data();

     $output .= '
     <div class="col-md-3">
     <video  controls style="width: 179px;height:100px;">
  <source src="'.base_url().'fileuploads/'.$data["file_name"].'" type="video/mp4">
  
  
</video>
      
     </div>
     <input type="hidden" name="orderVideo[]" value = "'.$data["file_name"].'">
     ';
    }else{
    	echo "Failed";
    }
   }

   
   echo $output;   
  }
 }

////////video upload Controller ends///////////////////

/////////////add stones////////////////////

 	public function Stone_type1()
	{
		if($this->input->post('Add_Edit_Stone_Type1') == true)
		{
			$this->AdminModel->Add_Edit_Stone_Type1(); 
			redirect(base_url('EcoDashAdmin/Stone_type1'));
		}
		if($this->input->post('get') == 'get_stonetype')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_stonetype1($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_stonetype'=>$result['get_stonetype'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'stoneedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_stone1($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_stone')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_stone1($eid);
			echo json_encode($result);   
			exit;  
		}
		$this->load->view("Admin/includes/header");
		$this->load->view("Admin/stonetype1"); 
		$this->load->view("Admin/includes/footer");
	}

/////////////add stones////////////////////
/////////////add styles and Models////////////////////

 	public function StyleModel()
	{
		//////For new stone and model starts/////
		if($this->input->post('Add_Edit_Style_Model') == true)
		{
			$this->AdminModel->Add_Edit_Style_Model(); 
			redirect(base_url('EcoDashAdmin/StyleModel'));
		}
		/////For new stone and model ends /////
		
		/////For new model to the stone starts /////
		if($this->input->post('Add_Edit_style_model') == true)
		{
			$this->AdminModel->Add_Edit_Model(); 
			redirect(base_url('EcoDashAdmin/StyleModel'));
		}
		/////For new model to the stone ends /////
		
		if($this->input->post('get') == 'get_stylemodel')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_stylemodel($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_stylemodel'=>$result['get_stylemodel'],'pagination'=>$pagination));
			exit;
		}
		
		if($this->input->post('get') == 'stylemodeledit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_stylemodel($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'delstylemodel')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_stylemodel($eid);
			echo json_encode($result);   
			exit;  
		}
		$data['style']=$this->AdminModel->getstyles();
		$this->load->view("Admin/includes/header");
		$this->load->view("Admin/stylemodel",$data); 
		$this->load->view("Admin/includes/footer");
	}

/////////////add style model////////////////////

/////////////add weight starts////////////////////

 	public function addweights()
	{
		if($this->input->post('Add_Edit_Weight') == true)
		{
			$this->AdminModel->Add_Edit_Weight(); 
			redirect(base_url('EcoDashAdmin/addweights'));
		}
		if($this->input->post('get') == 'get_weight')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_weight($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_weight'=>$result['get_weight'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'weightedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_weight($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_weight')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_weight($eid);
			echo json_encode($result);   
			exit;  
		}
		$this->load->view("Admin/includes/header");
		$this->load->view("Admin/addweight"); 
		$this->load->view("Admin/includes/footer");
	}

/////////////add weight////////////////////






/////////////////////Feed Back  view starts//////////////////
public function adminfeedbackview($id)
{
    $data['uname']='Paani';
	 
	
		if($this->input->post('get') == 'get_fbview')  
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_fbview($page,$skey,$id);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_fbview'=>$result['get_fbview'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'fb_edit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_get_fbview($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_fb')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_get_fbview($eid);
			echo json_encode($result);   
			exit;  
		}
    
    
    
    
      $this->load->view("Admin/includes/header");
		$this->load->view("Admin/adminfeedbackview");  
		$this->load->view("Admin/includes/footer");
    
}





 public function feedbackview($id,$uname)
 {
	 $data['uname']=$uname;
	 
	 if($this->input->post('Add_Edit_feedback_view') == true)
		{
			$this->AdminModel->Add_Edit_feedback_view($id); 
			redirect(base_url('EcoDashAdmin/feedbackview'.'/'.$id.'/'.$uname));
		}
		if($this->input->post('get') == 'get_fbview')  
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_fbview($page,$skey,$id);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_fbview'=>$result['get_fbview'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'fb_edit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_get_fbview($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_fb')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_get_fbview($eid);
			echo json_encode($result);   
			exit;  
		}
	 
	 
	 
	    $this->load->view("Admin/includes/headersraff");
		$this->load->view("Admin/feedbackview",$data); 
		$this->load->view("Admin/includes/footer"); 
 }
 
 ///////////feed back view  ends////////////
 /////// cron jobs///////
  public function sendRemainderSms()
	 {   
		 $d = date("d");   
		 $m = date("m"); 
		 $y = date("Y");
		 $result = $this->db->query("SELECT a.*,b.*,c.number as unumber FROM  tb_feedback_view as a inner join tb_staff as b on a.staffid=b.staffid inner join user_register as c on a.uid=c.uid WHERE YEAR(remainder) = $y AND MONTH(remainder) = $m AND DAYOFMONTH(remainder) =$d group by a.uid")->result_array();

		 $smson = 1 ; 
		 
		  if($smson == 1)
		  {   
			 foreach($result as $musers)         
			 {  
			     $sname = $musers['name'];
				 $mobile = $musers['number'];   
				 $umobile= $musers['unumber'];
				 $uname = $musers['u_name'];    
	            $text 		= 'Dear '.$sname.','.' '.'Today you have a schedule with the customer '.$uname.'. Please contact to '.$umobile;    
		       $text = urlencode($text);    
	 	  
	$status = file_get_contents("http://203.212.70.200//smpp/sendsms?username=skybellnewapi&password=skybell@123&to=".$mobile."&udh=0&from=SKYBEL&text=".$text);
    		  if($status)  
				{ 
				    echo "Sent";
					 
				}			 
			 }  
		  }      
            else  
		  {
		      echo "Failed";			   
		  }		  
			 
			 return true;  
		
	 }
///////cron job end /////
///// Stone starts here //////
////////Stone Categories starts here//////////////
 	public function StoneCategories()
	{
		if($this->input->post('Add_Edit_Stone_cat') == true)
		{
			$this->AdminModel->Add_Edit_Stone_cat(); 
			redirect(base_url('EcoDashAdmin/StoneCategories'));
		}
		if($this->input->post('Add_Edit_Stone_subcat') == true)
		{
			$this->AdminModel->Add_Edit_Stone_subcat(); 
			redirect(base_url('EcoDashAdmin/StoneCategories'));
		}
		if($this->input->post('Add_Edit_Stone_color') == true)
		{
			$this->AdminModel->Add_Edit_Stone_color(); 
			redirect(base_url('EcoDashAdmin/StoneCategories'));
		}
		if($this->input->post('Add_Edit_Stone_final') == true)
		{
			$this->AdminModel->Add_Edit_Stone_final(); 
			redirect(base_url('EcoDashAdmin/StoneCategories'));
		}
		if($this->input->post('get') == 'get_stonetypecat')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_stone_categories($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_stonetypecat'=>$result['get_stonetypecat'],'pagination'=>$pagination));
			exit;
		}
		
		if($this->input->post('get') == 'get_stonecolor')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_stone_colors($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_stonecolor'=>$result['get_stonecolor'],'pagination'=>$pagination));
			exit;
		}
			if($this->input->post('get') == 'get_stonetypesubcat')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_stone_subcategories($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_stonetypesubcat'=>$result['get_stonetypesubcat'],'pagination'=>$pagination));
			exit;
		}
			if($this->input->post('get') == 'get_finalstones')
		{ 
			$skey = $this->input->post('skey');
			$page = $this->input->post('page'); 

			$result = $this->AdminModel->get_finalstone($page,$skey);
			$pagination = $this->AdminModel->create_links($result['total'],10,$page);

			echo json_encode(array('get_finalstones'=>$result['get_finalstones'],'pagination'=>$pagination));
			exit;
		}
		if($this->input->post('get') == 'stoncateedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_stonecategory($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('get') == 'stoncoloreedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_stonecolors($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('get') == 'finalstoneedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_finalstone($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('get') == 'stonsubeedit')
		{
			$eid = $this->input->post('eid');
			if($eid!='')
				$result = $this->AdminModel->edit_stonesubcategory($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_stonecat')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_stone_cat($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_stonesubcat')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_stone_subcat($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_stonecolors')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
				$result = $this->AdminModel->del_stone_colors($eid);
			echo json_encode($result);   
			exit;  
		}
		if($this->input->post('Del') == 'Del_finalstone')    
		{ 
			$eid = $this->input->post('iid'); 
			if($eid!='')  
			$result = $this->AdminModel->del_finalstone($eid);
			echo json_encode($result);   
			exit;  
		}
		
		if($this->input->post('get') == 'stname')
		{
			$catid = $this->input->post('stoneparent');
			if($catid!='')
				$result = $this->AdminModel->get_stone_name($catid);
			echo json_encode($result);
			exit;
		}
		
		$data['stoneCategories'] = $this->AdminModel->get_stone_categories_select();
		$data['stoneclrs'] = $this->AdminModel->get_stone_clrs_select();
		
		$this->load->view("Admin/includes/header");
		$this->load->view("Admin/stonecat",$data); 
		$this->load->view("Admin/includes/footer");
	}
 ////////Stone Categories Ends  here//////////////





}
?>