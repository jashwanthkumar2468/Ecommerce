<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() 
	{
	
		$data['parentcategory'] = $this->AdminModel->getParentCategory();		
		$data['subcategory'] = $this->AdminModel->getSubCategory();	
        $userId = $this->session->userdata('uid1');
       
			$this->load->view('header',$data);  
		$this->load->view('home',$data);          
		//$this->load->view('footer');     
	} 
		public function login() 
	{
		$data['parentcategory'] = $this->AdminModel->getParentCategory();		
		$data['subcategory'] = $this->AdminModel->getSubCategory();	
// 		$data['category']=$this->AdminModel->category();
// 		$data['subcategory1']=$this->AdminModel->subcategory();
	
		
			if($this->input->post('Login') == 'true')
		{
			$result = $this->AdminModel->User_login();
			echo $result;
			exit;
		} 
		
		    if($this->input->post('rmobile_user')==true)
			{
				$result = $this->AdminModel->get_fmobile_number();
				echo json_encode($result);exit;
	        }
	        
	        if($this->input->post('reqmobile_user')==true)
			{
				$result = $this->AdminModel->get_fmobile_number1();
				echo json_encode($result);exit;
	        }
	        if($this->input->post('sendrequest')==true)
		    {
	        $result = $this->AdminModel->sendrequest();
	        echo json_encode($result);exit;
	        }
	        
	        
		    if($this->input->post('fpwd_user')==true)
		    {
	        $result = $this->AdminModel->forgot_Pwd();
	        echo json_encode($result);exit;
	        }
		//$this->load->view('header',$data);  
		$this->load->view('login',$data);          
		//$this->load->view('footer');     
	}
		public function SignOut()
	{
		$UserId = $this->session->userdata('uid1');
		//$col['status']=0;
	//	$col['admin_status']=0;
	//	$this->db->where('uid',$UserId);       
	//	$this->db->update('user_register',$col);
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
	public function register() 
	{
	    $this->load->helper('string');
		$this->load->helper('captcha');
		$rand = random_string("numeric",5);
	    $vals = array(
		'word'	     => $rand,
		'img_path'   => './captcha/',
		'img_url'    => './captcha/',
		'img_width'  => '150',
		'img_height' => 40, 
		'expiration' => 7200,

		 /*'colors'        => array(
	                'background' => array(255, 255, 255),
	                'border' => array(280, 255, 255),
	                'text' => array(0, 0, 0),
	                'grid' => array(255,255, 255))*/
	        );
	    $cap = create_captcha($vals);
	    
		$data['parentcategory'] = $this->AdminModel->getParentCategory();		
		$data['subcategory'] = $this->AdminModel->getSubCategory();	
		$data['category']=$this->AdminModel->category();
		$data['subcategory1']=$this->AdminModel->subcategory();
		$data['cap']=$cap;
		if($this->input->post('Add_Editors') == 'true')
		{
			$result = $this->AdminModel->user_registration();
			echo json_encode($result);
			exit;
		}
		
			
		$this->load->view('header',$data);  
		$this->load->view('register',$data);          
		//$this->load->view('footer');     
	}
		public function submitpage() 
	{
		
		//$this->load->view('header');       
		$this->load->view('post');          
		//$this->load->view('footer');     
	}
			public function RegisterPage() 
	{
		
		//$this->load->view('header');       
		$this->load->view('newreg');          
		//$this->load->view('footer');     
	}
	
	public function UserProducts()
	{	
    
	  $userId = $this->session->userdata('uid1');
	    $data['count_cart'] = $this->AdminModel->get_user_count_cart($userId);
	   $data['mainmenu']=$this->AdminModel->mainmenu_cat1($userId);
		$data['submenu']=$this->AdminModel->submenu_cat1($userId);
		$data["MaxPrice"] = $this->AdminModel->GetMaxAmount(); 
		$data['products']=$this->AdminModel->ProductsView1($userId);
		$data['staffinfo']=$this->AdminModel->staffinfo($userId);
		$this->load->view("loginheader",$data);         
		$this->load->view("userproducts",$data);            
		//$this->load->view("Admin/includes/footerl");	
	}
	public function userhome()
	{
	   $userId = $this->session->userdata('uid1'); 
	    $data['count_cart'] = $this->AdminModel->get_user_count_cart($userId);
	   $data['mainmenu']=$this->AdminModel->mainmenu_cat1($userId);
		$data['submenu']=$this->AdminModel->submenu_cat1($userId);
		$data['products']=$this->AdminModel->ProductsView1($userId);
		$this->load->view("loginheader",$data);         
		$this->load->view("userhome",$data);            
		//$this->load->view("Admin/includes/footerl"); 
	}
		public function MainCategory($id)   
	{
		  $userId = $this->session->userdata('uid1'); 
	    $data['count_cart'] = $this->AdminModel->get_user_count_cart($userId);
	   $data['mainmenu']=$this->AdminModel->mainmenu_cat1($userId);
		$data['submenu']=$this->AdminModel->submenu_cat1($userId);
	//	$data['products']=$this->AdminModel->ProductsView1($userId);
		$data["MaxPrice"] = $this->AdminModel->GetMaxAmount(); 
		$data['puid']=$id;
	  		
		$data['products'] = $this->AdminModel->getMainProducts($id);	
		$this->load->view("loginheader",$data); 
		$this->load->view("maincategory",$data);  	 
	}
	
		public function clickSide1()
	{
		if($this->input->post('get') == 'getAdminProductsSide')
		{     
			$proId = $this->input->post('catId');  
			$uid = $this->input->post('uid'); 
			$parentid = $this->input->post('parentid');	
			$min = $this->input->post('min');
			$max = $this->input->post('max');			
			$result = $this->AdminModel->get_admin_ProductsSide1($proId,$parentid,$uid,$min,$max); 
			
			echo json_encode(array('getSidePro'=>$result['getSidePro'])); 
			exit;   
		} 
	}
	
		public function usercart()
	{
		if($this->input->post('add') == 'usercart')
		{
			$uid= $this->session->userdata('uid1');
			$id = $this->input->post('id');
			
			if($id!='')
				$result = $this->AdminModel->user_add_cart($id,$uid); 
			echo json_encode($result);
			exit;
		}
	}
	public function cartcount()
	{
		if($this->input->post('cartcount') == 'cartcount')
		{
			 $userId = $this->session->userdata('uid1');
				$result = $this->AdminModel->get_user_count_cart($userId); 
			echo json_encode($result);
			exit;
		}
	}
	public function Products($id)
	{
		$userId = $this->session->userdata('uid1');
	    $data['count_cart'] = $this->AdminModel->get_user_count_cart($userId);
	   $data['mainmenu']=$this->AdminModel->mainmenu_cat1($userId);
	   
		$data['singleproduct']=$this->AdminModel->singleproduct($id);	
		$this->load->view("singleproduct",$data); 	
	}
	
	public function SingleCategory($id) 
	{
	    
		$data['parentcategory'] = $this->AdminModel->getParentCategory();		
		$data['subcategory'] = $this->AdminModel->getSubCategory();	
		$data['parentcategoryName'] = $this->AdminModel->getParentCategoryName($id);		
		$data['subcategoryName'] = $this->AdminModel->getSubCategoryName($id);		
		$data['products'] = $this->AdminModel->getProducts($id);
		$this->load->view('header',$data);
		$this->load->view("selectedcategory",$data); 	
	}
	
	public function SingleProduct($id)
	{
		
		$data['parentcategory'] = $this->AdminModel->getParentCategory();		
		$data['subcategory'] = $this->AdminModel->getSubCategory();	
				$data['submenunames']=$this->AdminModel->submenunames($id);	
		$data['singleproduct']=$this->AdminModel->singleproduct($id);
		$this->load->view('header',$data);
		$this->load->view("singleproduct",$data); 	
	}
		public function userSingleProduct($id)
	{
		
	  $userId = $this->session->userdata('uid1'); 
	    $data['count_cart'] = $this->AdminModel->get_user_count_cart($userId);
	   $data['mainmenu']=$this->AdminModel->mainmenu_cat1($userId);
		$data['submenu']=$this->AdminModel->submenu_cat1($userId);
		$data['singleproduct']=$this->AdminModel->singleproduct1($id);
		$data['submenunames']=$this->AdminModel->submenunames($id);	
			$this->load->view('loginheader',$data);
		$this->load->view("defaultsingleproduct",$data); 	
	}
	
	
	//////
	
	
	 public function ShoppingCart()
	{
		if($this->input->post('get') == 'vcart')
		{ 
			$result = $this->AdminModel->get_shopping_cart();
			echo json_encode($result);
			exit;
		} 
		
		$userId = $this->session->userdata('uid1');
	    $data['count_cart'] = $this->AdminModel->get_user_count_cart($userId);
	    $data['mainmenu']=$this->AdminModel->mainmenu_cat1($userId);
		$data['submenu']=$this->AdminModel->submenu_cat1($userId);
		//$data['products']=$this->AdminModel->ProductsView1($userId);
		
		$this->load->view("loginheader",$data);  
		$this->load->view('shoppingcart',$data);
		
	} 
		public function addorders()
		{
			if($this->input->post('add') == 'usercart1')
			{
				$uid= $this->session->userdata('uid1');
				
				$result = $this->AdminModel->add_orders($uid); 
				echo json_encode($result);
				exit;
			}
		}
		
		//Filters User side //////
		public function UserFilterSide()
	{
		if($this->input->post('get') == 'getFilterProducts')
		{     
	          
			$uid = $this->input->post('uid'); 
			//$tagno = $this->input->post('tagno');
			//$weight = $this->input->post('weight');
			$minprice= $this->input->post('minprice');
			$maxprice = $this->input->post('maxprice');
			$parentid = $this->input->post('selectparent');
			$subcatid = $this->input->post('selectsub');
			$selectsublist = $this->input->post('selectsublist');
			$selectgender = $this->input->post('selectgender');
						
			$result = $this->AdminModel-> get_user_FilteredProductsSide($parentid,$subcatid,$selectsublist,$selectgender,$minprice,$maxprice,$uid); 
						
			echo json_encode(array('getFilterProducts'=>$result['getFilterProducts']));
			exit;   
		}
		if($this->input->post('get') == 'subcategory')
		{
			$parentid = $this->input->post('pcatname');
			$subcatid = $this->input->post('scatname');
			$result = $this->AdminModel->get_user_sub_cat_list1($parentid,$subcatid);
			echo json_encode($result);
			exit;
			
		}	
	}
	
	
	
	
	
	
	//Filters User side End ////
		
		
	
}
?>
