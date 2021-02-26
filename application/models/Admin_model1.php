<?php

class Admin_model1 extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
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

	public function auth()
	{
		if($this->input->post('LoginEmail'))
		{
			$email = trim($this->input->post('LoginEmail'));
			if($email!='')
			{
				$this->db->select('*');
				$this->db->from('tb_admin');
				$this->db->where(array('Email'=>$email,'Status'=>'1'));
				$result = $this->db->get()->row_array();
				if(!empty($result) && $result['RoleId'] == '1')
					return array('response'=>1,'Img'=>$result['Img']);
				else
					return array('response'=>0,'Img'=>'');
			}
		}
		else if($this->input->post('Email'))
		{
			$email = trim($this->input->post('Email'));
			$HASH = trim($this->input->post('Password'));

			$this->db->select('*');
			$this->db->from('tb_admin');
			$this->db->where('Email',$email);
			$result = $this->db->get()->row_array();
			if(!empty($result) && password_verify($HASH,$result['Password']))
			{
				$new_session = array('AdminId'=>$result['AdminId'],'RoleId'=>$result['RoleId']);
				$this->session->set_userdata($new_session);
				return 1;
			}
			else
				return 0;
		}
	}

	private function set_upload_options(){   
        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|pdf|html|xlsx|mp4|doc|docx|rtf';
        //$config['max_size']	= '1000000000';
        $config['overwrite']     = FALSE;
        $config['encrypt_name'] = TRUE;        
        
        return $config;
    }

	public function Add_Edit_Category()
	{
		$imagepath = '';
		if($_FILES['cimage']['name'] != NULL)
		{
			$this->load->library("upload");
			$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload("cimage"))
			{
				$data = array('upload_data' => $this->upload->data());
				$imageFileName = $data['upload_data']['file_name'];
				$imagepath = base_url().'uploads/'.$imageFileName;
				$col['Image'] = $imagepath;
			}
			else
				return $this->session->set_flashdata('error','File Upload Error');
		}

		$CategoryId = strip_tags($this->input->post('CategoryId'));
		$col['CategoryName'] = strip_tags($this->input->post('catname'));
		$col['Status'] = intval($this->input->post('Status'));
		$col['Sort'] = intval($this->input->post('sort'));
		$col['Date'] = date('d-m-Y');
		$col['DateTime'] = date('d-m-Y H:i:s');

		if($CategoryId == '')
		{
			if($this->db->insert('categories',$col))
			{
				return $this->session->set_flashdata('success','Category Added Succesfully');
			}
			else
				return $this->session->set_flashdata('error','Category Added Failed');
		}
		else
			$this->db->where('CategoryId',$CategoryId);
			$this->db->update('categories',$col);
			return $this->session->set_flashdata('success','Category Update Succesfully');

	}

	public function get_categories($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from categories";

		if($skey!='')
			$sql.=" where CategoryName LIKE '%$skey%'";

		$finalsql = $sql;
		$tot = $this->db->query($finalsql);

		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY CategoryId order by CategoryId DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();

		$result = $this->db->query($sql)->result();

		return array('category'=>$result,'total'=>$total);

	}

	public function edit_category($eid)
	{
		return $this->db->query("select * from categories where CategoryId='$eid'")->row_array();
	}

	public function get_categories_select()
	{
		return $this->db->query("select * from categories")->result_array();
	}

	public function Add_Edit_Sub_Category()
	{
		$imagepath = '';
		if($_FILES['simage']['name'] != NULL)
		{
			$this->load->library("upload");
			$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload("simage"))
			{
				$data = array('upload_data' => $this->upload->data());
				$imageFileName = $data['upload_data']['file_name'];
				$imagepath = base_url().'uploads/'.$imageFileName;
				$col['Image'] = $imagepath;
			}
			else
				return $this->session->set_flashdata('error','File Upload Error');
		}

		$subcategory_name_id = strip_tags($this->input->post('subcategory_name_id'));
		$col['ParentCategory'] = strip_tags($this->input->post('catname'));
		$col['Title'] = strip_tags($this->input->post('scatname'));
		$col['SubSort'] = intval($this->input->post('sort'));
		$col['Status'] = intval($this->input->post('Status'));
		$col['Date'] = date('d-m-Y');
		$col['DateTime'] = date('d-m-Y H:i:s');

		if($subcategory_name_id == '')
		{
			if($this->db->insert('subcategory',$col))
			{
				return $this->session->set_flashdata('success','Sub Category Added Succesfully');
			}
			else
				return $this->session->set_flashdata('error','Sub Category Added Failed');
		}
		else
			$this->db->where('subcategory_name_id',$subcategory_name_id);
			$this->db->update('subcategory',$col);
			return $this->session->set_flashdata('success','Sub Category Updated Succesfully');

	}

	public function get_sub_categories($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select *,ca.CategoryName as catname,sn.Title as subcattitle,sn.Status as sStatus from subcategory as sn left join categories as ca on ca.CategoryId=sn.ParentCategory";

		if($skey!='')
			$sql.=" where ca.CategoryName LIKE '%$skey%' or sn.Title LIKE '%$skey%' ";

		$finalsql = $sql;
		$tot = $this->db->query($finalsql);

		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY sn.subcategory_name_id order by sn.subcategory_name_id DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();

		$result = $this->db->query($sql)->result();

		return array('subcategory'=>$result,'total'=>$total);
	}

	public function edit_sub_category($id)
	{
		return $this->db->query("select * from subcategory where subcategory_name_id='$id'")->row_array();
	}
	
		public function edit_sub_main_category($id)
	{
		return $this->db->query("select * from subcategory_name where SubCategoryId='$id'")->row_array();
	} 
    
	public function get_caretsTypesid($id)
	{
		return $this->db->query("select * from goldrate where GoldRateId='$id'")->row_array(); 
	} 

  
	public function get_sub_list($id) 
	{
		return $this->db->query("select * from subcategory where ParentCategory='$id' order by subcategory_name_id asc")->result_array();
	}

	public function get_sub_list_list($id)
	{
		return $this->db->query("select * from subcategory_name where subcategory_name_id='$id' order by SubCategoryId asc")->result_array();
	}

	public function Add_Edit_Sub_Category_List()
	{
	    $imagepath = '';
		if($_FILES['cimage']['name'] != NULL)
		{
			$this->load->library("upload");
			$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload("cimage"))
			{
				$data = array('upload_data' => $this->upload->data());
				$imageFileName = $data['upload_data']['file_name'];
				$imagepath = base_url().'uploads/'.$imageFileName;
				$col['Image'] = $imagepath;
			}
			else
				return $this->session->set_flashdata('error','File Upload Error');
		}
		$SubCategoryId = strip_tags($this->input->post('SubCategoryId'));
		$col['SubCategoryName'] = strip_tags($this->input->post('scatnamelist'));
		$col['ParentCategory'] = intval($this->input->post('catname'));
		$col['subcategory_name_id'] = intval($this->input->post('scatname'));
		$col['SubListSort'] = intval($this->input->post('sort'));
		$col['Status'] = intval($this->input->post('Status'));
		$col['Date'] = date('d-m-Y');
		$col['DateTime'] = date('d-m-Y H:i:s');

		if($SubCategoryId == '')
		{
			if($this->db->insert('subcategory_name',$col))
			{
				return $this->session->set_flashdata('success','Added Succesfully');
			}
			else
				return $this->session->set_flashdata('error','Added Failed');
		}
		else
			$this->db->where('SubCategoryId',$SubCategoryId);
			$this->db->update('subcategory_name',$col);
			$this->session->set_flashdata('success','Updated Succesfully');
	}

	public function get_sub_categories_list($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select *,ca.CategoryName as catname,sn.Title as subcattitle,su.SubCategoryName as subtitlelist from subcategory_name as su left join categories as ca on ca.CategoryId=su.ParentCategory left join subcategory as sn on sn.ParentCategory=su.ParentCategory and sn.subcategory_name_id=su.subcategory_name_id";

		if($skey!='')
			$sql.=" where ca.CategoryName LIKE '%$skey%' or sn.subcategory_name LIKE '%$skey%' or su.SubCategoryName LIKE '%$skey%' ";

		$finalsql = $sql;
		$tot = $this->db->query($finalsql);

		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY su.SubCategoryId order by su.SubCategoryId DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();

		$result = $this->db->query($sql)->result();

		return array('subcategorylist'=>$result,'total'=>$total);
	}

	public function Add_Edit_Gold_Rate()
    {
    	$GoldRateId = $this->input->post('GoldRateId');
    	$GoldRate = $this->input->post('grate');
		$GoldCaret = $this->input->post('carettype');      
 
    	$col['GoldRate'] = $GoldRate;
		$col['GoldCaret'] = $GoldCaret;
    	$col['Date'] = date('d-m-Y H:i:s');
    	$col['Status'] = 1;

    	if($GoldRateId == '')
    	{
    		if($this->db->insert('goldrate',$col))
    		{
    			return $this->session->set_flashdata("Success","Gold Rate Added Successfully");
    		}
    		else
    			return $this->session->set_flashdata("Error","Gold Rate Added Failed");
    	}
    	else
    		$this->db->where('GoldRateId',$GoldRateId);
    		$this->db->update('goldrate',$col);
    		return $this->session->set_flashdata("Success","Gold Rate Updated Successfully");
    }

    public function get_gold_rate($page='',$skey='')
    {
    	$lstart = (intval($page)-1)*10;
    	$lend = 10;

    	$sql = "select * from goldrate";

    	if($skey!='')
    		$sql.=" where GoldRate LIKE '%$skey%'"; 
    	$finalsql = $sql;
    	$tot = $this->db->query($finalsql);
    	if($lstart < 0)
    		$lstart = '0';
    	$sql.=" GROUP BY GoldRateId order by GoldRateId DESC LIMIT $lstart,$lend";
    	$total = $tot->num_rows();
    	$result = $this->db->query($sql)->result();
    	return array("total"=>$total,"gold"=>$result);
    }
public function get_user_Logindetails($page='',$skey='',$signin='')
    {
    	$lstart = (intval($page)-1)*10;
    	$lend = 10;

    	$sql = "select * from  user_register";
        
        if($signin!='')
        {
    		
    		$sql.=" where reaccess = '1' ";
        
            
        }
    	if($skey!='')
    		$sql.=" where firstname LIKE '%$skey%'"; 
    	$finalsql = $sql;
    	$tot = $this->db->query($finalsql);
    	if($lstart < 0)
    		$lstart = '0';
    	//$sql.=" GROUP BY GoldRateId order by GoldRateId DESC LIMIT $lstart,$lend";
    	$total = $tot->num_rows();
    	$result = $this->db->query($sql)->result();
    	return array("total"=>$total,"userdetails"=>$result);
    }
    public function get_gold_price($id)
    {
    	return $this->db->query("select * from goldrate where GoldRateId='$id'")->row_array();
    }
	 public function get_userlogintime($id)
    {
    	return $this->db->query("select * from user_register where uid='$id'")->row_array();
		
    }

    public function update_today_goldrate()
    {
    	$GoldPriceId = intval($this->input->post('GoldPriceId'));
    	$goldrate = intval($this->input->post('tgrate'));

    	if($GoldPriceId != '')
    	{
    		$gold['GoldRate'] = $goldrate;
    		$gold['Date'] = date('d-m-Y H:i:s');
    		$this->db->where('GoldRateId',$GoldPriceId);
    		$this->db->update('goldrate',$gold); 

    		$prgoldrate = $this->db->query("select * from tb_products where caretsTypesId='$GoldPriceId'")->result_array();
			foreach($prgoldrate as $prgold)
			{ 
				$gms = $prgold['gms']; 
				$grateforgm = $prgold['TodayGoldRate']; 
				$prgrate = $prgold['GoldPrice']; 
				$prmaking = $prgold['MakingCahrges'];   
				$prdiamondprice = $prgold['DiamondPrice'];   



				
				$col['TodayGoldRate'] = $goldrate; 
				$col['GoldPrice'] = $gms*$goldrate; 
				 $mak = ($prmaking/100)*$goldrate; 
				$tax = ($col['GoldPrice']+$prdiamondprice+$mak)*3/100;
				$col['Tax'] = $tax;
				$col['TotalPrice'] = $col['GoldPrice']+$mak+$prdiamondprice+$tax;
				$col['Date'] = date('d-m-Y H:i:s'); 

				$this->db->where('caretsTypesId',$GoldPriceId);
				$this->db->where('FixedNonFixed',2);
				$this->db->update('tb_products',$col);

			}
			return array('err'=>'0','msg'=>'Gold Rate Updated Successfully');
    	}

    }
 public function update_user_logintime1()
    {
    	$LoginUserId = intval($this->input->post('LoginUserId'));
    	$logintime = intval($this->input->post('logintime'));

    	if($LoginUserId != '')
    	{
    		$user['Login_time'] = $logintime;
    		$user['status'] = 0;
    		//$user['admin_status'] = 0;
    		$user['reaccess'] = 0;
    		$this->db->where('uid',$LoginUserId);
    		$this->db->update('user_register',$user);
			return array('err'=>'0','msg'=>'User Login Time Updated Successfully');
    	}

    }




    public function get_rate_gold()
    {
    	return $this->db->query("select * from goldrate")->row_array();
    }
	
	public function get_CaretsType()
    { 
    	return $this->db->query("select * from goldrate")->result_array();
    }  
  
  
  
  
 	public function Add_Edit_Products()
	{
		$ProductId = intval($this->input->post('ProductId'));

		$imagepath = '';
		if($_FILES['pimage']['name'] != NULL)
		{
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload('pimage') == True)
			{
				$data = array('upload_data' => $this->upload->data());
				$imageFileName = $data['upload_data']['file_name'];
				$imagepath = base_url().'uploads/'.$imageFileName;
				$col['Image'] = $imagepath;
			}
			else

				return $this->session->set_flashdata('error','File Upload Error');
		}

		$imagepath = '';
		if($_FILES['pimage1']['name'] != NULL)
		{
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload('pimage1') == True)
			{
				$data = array('upload_data' => $this->upload->data());
				$imageFileName = $data['upload_data']['file_name'];
				$imagepath = base_url().'uploads/'.$imageFileName;
				$col['Image1'] = $imagepath;
			}
			else

				return $this->session->set_flashdata('error','File Upload Error');
		}

		$imagepath = '';
		if($_FILES['pimage2']['name'] != NULL)
		{
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload('pimage2') == True)
			{
				$data = array('upload_data' => $this->upload->data());
				$imageFileName = $data['upload_data']['file_name'];
				$imagepath = base_url().'uploads/'.$imageFileName;
				$col['Image2'] = $imagepath;
			}
			else

				return $this->session->set_flashdata('error','File Upload Error');
		}

		$ProductType = strip_tags($this->input->post('ptype'));        
		$col['ProductTypeForFixedNonFixed'] = trim($ProductType);   
		$col['tagno'] = trim($this->input->post('tagno'));         
		$col['counter'] = trim($this->input->post('counter'));      
        $col['party'] = trim($this->input->post('party'));
		$col['ParentCategory'] = intval($this->input->post('catname'));
		$col['SubCategory'] = intval($this->input->post('scatname')); 
		$col['SubCategoryList'] = intval($this->input->post('scatlist')); 
		$col['stonestyle'] = trim($this->input->post('style')); 
		$col['stonemodel'] = trim($this->input->post('model')); 
		$col['Sort'] = intval($this->input->post('sort'));       
		$col['ProductName'] = trim($this->input->post('productname'));
		$col['ProductCategory'] = trim($this->input->post('ProductCategory'));
		$col['Stock'] = trim($this->input->post('sold'));
		$col['Model'] = trim($this->input->post('productmodel'));
		$col['ProductSize'] = trim($this->input->post('psize'));
       // $col['stonemodel'] = strip_tags($this->input->post('stonemodel'));	       	
		//$col['stonestyle'] = strip_tags($this->input->post('stonestyle')); 
		$col['metal'] = trim($this->input->post('metal'));
		$col['hsnc'] = trim($this->input->post('hsnc'));   
        $col['caretsTypesId'] = trim($this->input->post('caretsTypes'));  
        $col['gms'] = trim($this->input->post('gms')); 
		$col['stw'] = trim($this->input->post('stw'));
		$col['Quantity'] = trim($this->input->post('pcs'));
		$col['grw'] = trim($this->input->post('grw'));
		$col['TodayGoldRate'] = trim($this->input->post('grates')); 
		$col['GoldPrice'] = trim($this->input->post('gprice'));  
		$col['stoneprice'] = trim($this->input->post('stoneprice'));
		$col['MakingCahrges'] = trim($this->input->post('mcharge'));    
		$col['Gst'] = trim($this->input->post('gst'));                      
		$col['Tax'] = trim($this->input->post('tax'));                      
		$col['TotalPrice'] = trim($this->input->post('tprice'));                 
		$col['ProductStatus'] = trim($this->input->post('pstatus'));          
		$col['DiamondPrice'] = trim($this->input->post('diamondprice'));
		$col['dcts'] = trim($this->input->post('dcts'));  
		$col['wastagepercentage'] = trim($this->input->post('makcharge'));
		$col['makchargeamount'] = trim($this->input->post('makchargeamount'));
		$col['gender1'] = trim($this->input->post('gender'));  
		$col['FixedNonFixed'] = trim($this->input->post('fixednonfixed'));  
		$col['ProductTypeForFixedNonFixed'] = trim($ProductType);   
		$video = implode(',',$this->input->post('orderVideo'));
		$col['video'] = $video;
		$col['PlatinumPrice'] = trim($this->input->post('platinumprice'));
		$col['MakingChargesPer'] = trim($this->input->post('mchargeper')); 
		//$col['stonename'] = strip_tags($this->input->post('stonename'));
		//$col['caratname'] = strip_tags($this->input->post('caratname'));
		//$col['piecename'] = strip_tags($this->input->post('piecename')); 
		//$col['ProductCategory'] = $this->input->post('ProductCategory');
		//   
		$col['Description'] = trim($this->input->post('text'));         
		$col['Date'] = date('d-m-Y');      
		$col['DateTime'] = date('d-m-Y H:i:s');     

		if($ProductId == '')
		{ 
			if($this->db->insert('tb_products',$col))    
			{
				$insert_id 		= $this->db->insert_id();    
				$stonecat		= $this->input->post('stoneparent');
				$stonename 		= $this->input->post('stonename');				
				$stonecolor 	= $this->input->post('stoneclrs');				
				$stoneclarity 	= $this->input->post('stoneclrty');				
				$stonecut		= $this->input->post('stonecut');				
				$stonepolish 	= $this->input->post('stoneplsh');				
				$stoneid		= $this->input->post('stoneid');				
				$qty			= $this->input->post('qty'); 
	            $price 			= $this->input->post('price');
	            $countprice 	= count($price); 
	            $amount 		= $this->input->post('amount');
	            $qtycount 		= count($qty);
				
	            for($i=0;$i<$qtycount;$i++)
	            { 
	              				
					$i1= $i;
					$a=$stonecat[$i];
					$b=$stonename[$i];
					$c=$stonecolor[$i];
					$d=$stoneclarity[$i];
					$e=$stonecut[$i];
					$f=$stonepolish[$i];
					$g=$stoneid[$i];
					$h= $price[$i];
					$j=$amount[$i];
					$k=$qty[$i];
			
					$colssss[$i]['Qty'] 		= trim($qty[$i]);
					$colssss[$i]['caretsWt'] 		= trim($qty[$i])/5;
	                $colssss[$i]['Price'] 		= trim($price[$i]);
	                $colssss[$i]['Amount'] 		= trim($amount[$i]);
	                $colssss[$i]['stonecat'] 	= trim($stonecat[$i]);
					$colssss[$i]['StnColor'] 	= trim($c);   
					$colssss[$i]['StnClarity'] 	= trim($d);      
					$colssss[$i]['StnPolish'] 	= trim($f);   
					$colssss[$i]['stonesid'] 	= trim($g);   
	                $colssss[$i]['ProStoId'] 	= $insert_id;
					$colssss[$i]['StnName'] 	= trim($b);		
					$colssss[$i]['StnCut'] 		= trim($e);
	                $colssss[$i]['Date'] 		= date('Y-m-d');
						
	            }
				
				
	            if(!empty($colssss)) 
	            {
	                $this->db->insert_batch('tb_stones_sub',$colssss);    
	                
	            }
				
				if($ProductType == '1')
				{ 
					//Basic Information
					$gcol['GoldProductType'] = strip_tags($this->input->post('gptype'));
					$gcol['Brands'] = strip_tags($this->input->post('gbrands'));
					$gcol['Gender'] = strip_tags($this->input->post('ggender'));
					$gcol['ProductId'] = $insert_id;
					$gcol['ProductType'] = 1;

					$this->db->insert('tb_gold_basic_information',$gcol);

					//Metal Information

					$gmcol['GoldPurity'] = strip_tags($this->input->post('gpurity'));
					$gmcol['GoldColor'] = strip_tags($this->input->post('gcolor'));
					$gmcol['GoldGrossWeight'] = strip_tags($this->input->post('ggweight'));
					$gmcol['GoldNetWeight'] = strip_tags($this->input->post('gnweight'));
					$gmcol['ProductId'] = $insert_id;
					$gmcol['ProductType'] = 1;

					$this->db->insert('tb_gold_metal_information',$gmcol);

					//Stone Weight
					$gscol['StoneWeight'] = strip_tags($this->input->post('gstoneweight'));
					$gscol['ProductId'] = $insert_id;
					$gscol['ProductType'] = 1;

					$this->db->insert('tb_gold_stone_information',$gscol);

					//Certification Deails

					$gccol['GoldCertificate'] = strip_tags($this->input->post('gcertification'));
					$gccol['ProductId'] = $insert_id;
					$gccol['ProductType'] = 1;

					$this->db->insert('tb_gold_certificate',$gccol);

					//Product Dimension

					$gpcol['GoldProductSize'] = strip_tags($this->input->post('gproductsize'));
					$gpcol['GoldProductHeight'] = strip_tags($this->input->post('gproductheight'));
					$gpcol['GoldProductWidth'] = strip_tags($this->input->post('gproductwidth'));
					$gpcol['ProductId'] = $insert_id;
					$gpcol['ProductType'] = 1;

					$this->db->insert('tb_gold_product_dimension',$gpcol);

					//Other Information

					$gocol['GoldTheme'] = strip_tags($this->input->post('gtheme'));
					$gocol['GoldDesignType'] = strip_tags($this->input->post('gdesigntype'));
					$gocol['GoldWearingStyle'] = strip_tags($this->input->post('gwearingstyle'));
					$gocol['GoldOccasion'] = strip_tags($this->input->post('goccasion'));
					$gocol['ProductId'] = $insert_id;
					$gocol['ProductType'] = 1;

					$this->db->insert('tb_gold_other_information',$gocol);
 				}
 				if($ProductType == '2')
 				{
 					//Basic Information

 					$dcol['DimondProductType'] = strip_tags($this->input->post('dptype'));
 					$dcol['DiamondBrnds'] = strip_tags($this->input->post('dbrands'));
 					$dcol['DiamondItemPackagingQty'] = strip_tags($this->input->post('dpqty'));
 					$dcol['Gender'] = strip_tags($this->input->post('dgender'));
 					$dcol['ProductId'] = $insert_id;
 					$dcol['ProductType'] = 2;

 					$this->db->insert('tb_diamond_basic_information',$dcol);

 					//Metal Information

 					$dmcol['GoldPurity'] = strip_tags($this->input->post('dgpurity'));
					$dmcol['GoldColor'] = strip_tags($this->input->post('dgcolor'));
					$dmcol['GoldGrossWeight'] = strip_tags($this->input->post('dggweight'));
					$dmcol['GoldNetWeight'] = strip_tags($this->input->post('dgnweight'));
					$dmcol['ProductId'] = $insert_id;
					$dmcol['ProductType'] = 2;

					$this->db->insert('tb_gold_metal_information',$dmcol);

					//Diamond Information

					$ddcol['DiamondCut'] = strip_tags($this->input->post('dcut'));
					$ddcol['DiamondColor'] = strip_tags($this->input->post('dcolor'));
					$ddcol['DiamondClarity'] = strip_tags($this->input->post('dclarity'));
					$ddcol['DiamondCarat'] = strip_tags($this->input->post('dcarat'));
					$ddcol['DiamondPieces'] = strip_tags($this->input->post('dpcs'));
					$ddcol['ProductId'] = $insert_id;
					$ddcol['ProductType'] = 2;

					$this->db->insert('tb_diamond_information',$ddcol);

					//Certification Details

					$dccol['GoldCertificate'] = strip_tags($this->input->post('dgcertification'));
					$dccol['DiamondCertificate'] = strip_tags($this->input->post('dcertification'));
					$dccol['ProductId'] = $insert_id;
					$dccol['ProductType'] = 2;

					$this->db->insert('tb_diamond_certification',$dccol);

					//Product Dimension

					$dpdcol['DiamondProductSize'] = strip_tags($this->input->post('dproductsize'));
					$dpdcol['DiamondProductHeight'] = strip_tags($this->input->post('dgproductheight'));
					$dpdcol['DiamondProductWidth'] = strip_tags($this->input->post('dgproductwidth'));
					$dpdcol['ProductId'] = $insert_id;
					$dpdcol['ProductType'] = 2;

					$this->db->insert('tb_diamond_dimension',$dpdcol);

					//Other Information

					$gocol['GoldTheme'] = strip_tags($this->input->post('dtheme'));
					$gocol['GoldDesignType'] = strip_tags($this->input->post('ddesigntype'));
					$gocol['GoldWearingStyle'] = strip_tags($this->input->post('dwearingstyle'));
					$gocol['GoldOccasion'] = strip_tags($this->input->post('doccasion'));
					$gocol['ProductId'] = $insert_id;
					$gocol['ProductType'] = 2;

					$this->db->insert('tb_gold_other_information',$gocol);

 				}
 				if($ProductType == '3')
 				{
 					//Basic Information

 					$pcol['PlatinumProductType'] = strip_tags($this->input->post('pptype'));
 					$pcol['PlatinumBrnds'] = strip_tags($this->input->post('pbrands'));
 					$pcol['PlatinumItemPackagingQty'] = strip_tags($this->input->post('ppqty'));
 					$pcol['Gender'] = strip_tags($this->input->post('pgender'));
 					$pcol['ProductId'] = $insert_id;
 					$pcol['ProductType'] = 3;

 					$this->db->insert('tb_platinum_basic_information',$pcol);

 					//Platinum Information

 					$pmcol['PlatinumPurity'] = strip_tags($this->input->post('ppurity'));
					$pmcol['PlatinumColor'] = strip_tags($this->input->post('pcolor'));
					$pmcol['PlatinumWeight'] = strip_tags($this->input->post('pgweight'));
					$pmcol['PlatinumNetWeight'] = strip_tags($this->input->post('pnweight'));
					$pmcol['ProductId'] = $insert_id;
					$pmcol['ProductType'] = 3;

					$this->db->insert('tb_platinum_information',$pmcol);

					//Certification Details

					$pdcol['PlatinumCertificate'] = strip_tags($this->input->post('pcertification'));
					$pdcol['PlatinumDiamondCertification'] = strip_tags($this->input->post('pdcertification'));
					$pdcol['ProductId'] = $insert_id;
					$pdcol['ProductType'] = 3;

					$this->db->insert('tb_platinum_certification',$pdcol);

					//Product Dimension

					$ppdcol['PlatinumProductSize'] = strip_tags($this->input->post('pproductsize'));
					$ppdcol['PlatinumProductHeight'] = strip_tags($this->input->post('pproductheight'));
					$ppdcol['PlatinumProductWidth'] = strip_tags($this->input->post('pproductwidth'));
					$ppdcol['ProductId'] = $insert_id;
					$ppdcol['ProductType'] = 3;

					$this->db->insert('tb_platinum_dimension',$ppdcol);

					//Diamond Information

					$pddcol['DiamondCut'] = strip_tags($this->input->post('pdcut'));
					$pddcol['DiamondColor'] = strip_tags($this->input->post('pdcolor'));
					$pddcol['DiamondClarity'] = strip_tags($this->input->post('pdclarity'));
					$pddcol['DiamondCarat'] = strip_tags($this->input->post('pdcarat'));
					$pddcol['DiamondPieces'] = strip_tags($this->input->post('pdpcs'));
					$pddcol['ProductId'] = $insert_id;
					$pddcol['ProductType'] = 3;

					$this->db->insert('tb_diamond_information',$pddcol);

					//Other Information

					$pocol['GoldTheme'] = strip_tags($this->input->post('ptheme'));
					$pocol['GoldDesignType'] = strip_tags($this->input->post('pdesigntype'));
					$pocol['GoldWearingStyle'] = strip_tags($this->input->post('pdesigntype'));
					$pocol['GoldOccasion'] = strip_tags($this->input->post('poccasion'));
					$pocol['ProductId'] = $insert_id;
					$pocol['ProductType'] = 3;

					$this->db->insert('tb_gold_other_information',$pocol);

 				}
				return $this->session->set_flashdata('success','Product Added Successfully');
			}
			else
				return $this->session->set_flashdata('error','Product Added Failed');
		}
		else
		{
			$this->db->where('ProductId',$ProductId);
			if($this->db->update('tb_products',$col))
			{
				
				$get_data = $this->db->query("select * from tb_stones_sub where ProStoId='$ProductId'")->result_array();
	            foreach($get_data as $gdata)
	            {
	                $subid = $gdata['StoneId'];
	                $this->db->where('StoneId',$subid);
	                $this->db->delete('tb_stones_sub'); 
	            }
	            
	            
	            $StoneIds 		= $ProductId;   
	            $stonecat 		= $this->input->post('stoneparent');
				$stonename 		= $this->input->post('stonename');				
				$stonecolor 	= $this->input->post('stoneclrs');				
				$stoneclarity 	= $this->input->post('stoneclrty');				
				$stonecut 		= $this->input->post('stonecut');				
				$stonepolish 	= $this->input->post('stoneplsh');				
				$stoneid 		= $this->input->post('stoneid');				
				$qty 			= $this->input->post('qty'); 
	            $price 			= $this->input->post('price');
	            $countprice 	= count($price); 
	            $amount 		= $this->input->post('amount');
	            $qtycount 		= count($qty);
	            
	            for($i=0;$i<$qtycount;$i++)
	            { 
	                $i1= $i;
					$a=$stonecat[$i];
					$b=$stonename[$i];
					$c=$stonecolor[$i];
					$d=$stoneclarity[$i];
					$e=$stonecut[$i];
					$f=$stonepolish[$i];
					$g=$stoneid[$i];
					$h= $price[$i];
					$j=$amount[$i];
					$k=$qty[$i];
			
					$colsss[$i]['Qty'] 			= trim($qty[$i]);
					$colsss[$i]['caretsWt'] 	= trim($qty[$i])/5;
	                $colsss[$i]['Price'] 		= trim($price[$i]);
	                $colsss[$i]['Amount'] 		= trim($amount[$i]);
	                $colsss[$i]['stonecat'] 	= trim($stonecat[$i]);
					$colsss[$i]['StnColor'] 	= trim($c);   
					$colsss[$i]['StnClarity'] 	= trim($d);      
					$colsss[$i]['StnPolish'] 	= trim($f);   
					$colsss[$i]['stonesid'] 	= trim($g);   
	                $colsss[$i]['ProStoId'] 	= $StoneIds;
					$colsss[$i]['StnName'] 		= trim($b);		
					$colsss[$i]['StnCut'] 		= trim($e);
	                $colsss[$i]['Date'] 		= date('Y-m-d');
	            }
	            if(!empty($colsss)) 
	            { 
	                $this->db->insert_batch('tb_stones_sub',$colsss);
	            }
				
				if($ProductType == '1')
				{
					$EGBD = $this->db->query("select * from tb_gold_basic_information where ProductId='$ProductId' and ProductType='1'")->row_array(); 
					if($EGBD)
					{
						$BasicInfoId = $EGBD['BasicInfoId'];
						$this->db->where('BasicInfoId',$BasicInfoId);
						$this->db->delete('tb_gold_basic_information');
					}
					//Basic Information
					$gcol['GoldProductType'] = strip_tags($this->input->post('gptype'));
					$gcol['Brands'] = strip_tags($this->input->post('gbrands'));
					$gcol['Gender'] = strip_tags($this->input->post('ggender'));
					$gcol['ProductId'] = $ProductId;
					$gcol['ProductType'] = 1;

					$this->db->insert('tb_gold_basic_information',$gcol);

					//Metal Information

					$GMI = $this->db->query("select * from tb_gold_metal_information where ProductId='$ProductId' and ProductType='1'")->row_array();

					if($GMI)
					{
						$GoldMetalId = $GMI['GoldMetalId'];
						$this->db->where('GoldMetalId',$GoldMetalId);
						$this->db->delete('tb_gold_metal_information');
					}

					$gmcol['GoldPurity'] = strip_tags($this->input->post('gpurity'));
					$gmcol['GoldColor'] = strip_tags($this->input->post('gcolor'));
					$gmcol['GoldGrossWeight'] = strip_tags($this->input->post('ggweight'));
					$gmcol['GoldNetWeight'] = strip_tags($this->input->post('gnweight'));
					$gmcol['ProductId'] = $ProductId;
					$gmcol['ProductType'] = 1;

					$this->db->insert('tb_gold_metal_information',$gmcol);

					//Stone Weight
					$GSW = $this->db->query("select * from tb_gold_stone_information where ProductId='$ProductId' and ProductType='1'")->row_array();
					if($GSW)
					{
						$GoldStoneInfoId = $GSW['GoldStoneInfoId'];
						$this->db->where('GoldStoneInfoId',$GoldStoneInfoId);
						$this->db->delete('tb_gold_stone_information');
					}
					$gscol['StoneWeight'] = strip_tags($this->input->post('gstoneweight'));
					$gscol['ProductId'] = $ProductId;
					$gscol['ProductType'] = 1;

					$this->db->insert('tb_gold_stone_information',$gscol);

					//Certification Deails
					$GCD = $this->db->query("select * from tb_gold_certificate where ProductId='$ProductId' and ProductType='1'")->row_array();
					if($GCD)
					{
						$GoldCerId = $GCD['GoldCerId'];
						$this->db->where('GoldCerId',$GoldCerId);
						$this->db->delete('tb_gold_certificate');
					}
					$gccol['GoldCertificate'] = strip_tags($this->input->post('gcertification'));
					$gccol['ProductId'] = $ProductId;
					$gccol['ProductType'] = 1;

					$this->db->insert('tb_gold_certificate',$gccol);

					//Product Dimension
					$GPD = $this->db->query("select * from tb_gold_product_dimension where ProductId='$ProductId' and ProductType='1'")->row_array();
					if($GPD)
					{
						$GoldProDimeId = $GPD['GoldProDimeId'];
						$this->db->where('GoldProDimeId',$GoldProDimeId);
						$this->db->delete('tb_gold_product_dimension');
					}
					$gpcol['GoldProductSize'] = strip_tags($this->input->post('gproductsize'));
					$gpcol['GoldProductHeight'] = strip_tags($this->input->post('gproductheight'));
					$gpcol['GoldProductWidth'] = strip_tags($this->input->post('gproductwidth'));
					$gpcol['ProductId'] = $ProductId;
					$gpcol['ProductType'] = 1;

					$this->db->insert('tb_gold_product_dimension',$gpcol);

					//Other Information
					$GOI = $this->db->query("select * from tb_gold_other_information where ProductId='$ProductId' and ProductType='1'")->row_array();
					if($GOI)
					{
						$GoldOccId = $GOI['GoldOccId'];
						$this->db->where('GoldOccId',$GoldOccId);
						$this->db->delete('tb_gold_other_information');
					}
					$gocol['GoldTheme'] = strip_tags($this->input->post('gtheme'));
					$gocol['GoldDesignType'] = strip_tags($this->input->post('gdesigntype'));
					$gocol['GoldWearingStyle'] = strip_tags($this->input->post('gwearingstyle'));
					$gocol['GoldOccasion'] = strip_tags($this->input->post('goccasion'));
					$gocol['ProductId'] = $ProductId;
					$gocol['ProductType'] = 1;

					$this->db->insert('tb_gold_other_information',$gocol);

 				}

 				if($ProductType == '2')
 				{
 					//Basic Information

 					$DBI = $this->db->query("select * from tb_diamond_basic_information where ProductId='$ProductId' and ProductType='2'")->row_array();

 					if($DBI)
 					{
 						$DiamondBasicInfoId = $DBI['DiamondBasicInfoId'];

 						$this->db->where('DiamondBasicInfoId',$DiamondBasicInfoId);
 						$this->db->delete('tb_diamond_basic_information');
 					}
 					$dcol['DimondProductType'] = strip_tags($this->input->post('dptype'));
 					$dcol['DiamondBrnds'] = strip_tags($this->input->post('dbrands'));
 					$dcol['DiamondItemPackagingQty'] = strip_tags($this->input->post('dpqty'));
 					$dcol['Gender'] = strip_tags($this->input->post('dgender'));
 					$dcol['ProductId'] = $ProductId;
 					$dcol['ProductType'] = 2;

 					$this->db->insert('tb_diamond_basic_information',$dcol);

 					//Metal Information
 					$DMI = $this->db->query("select * from tb_gold_metal_information where ProductId='$ProductId' and ProductType='2'")->row_array();

 					if($DMI)
 					{
 						$GoldMetalId = $DMI['GoldMetalId'];
 						$this->db->where('GoldMetalId',$GoldMetalId);
 						$this->db->delete('tb_gold_metal_information');
 					}
 					$dmcol['GoldPurity'] = strip_tags($this->input->post('dgpurity'));
					$dmcol['GoldColor'] = strip_tags($this->input->post('dgcolor'));
					$dmcol['GoldGrossWeight'] = strip_tags($this->input->post('dggweight'));
					$dmcol['GoldNetWeight'] = strip_tags($this->input->post('dgnweight'));
					$dmcol['ProductId'] = $ProductId;
					$dmcol['ProductType'] = 2;

					$this->db->insert('tb_gold_metal_information',$dmcol);

					//Diamond Information
					$DDI = $this->db->query("select * from tb_diamond_information where ProductId='$ProductId' and ProductType='2'")->row_array();
					if($DDI)
					{
						$DiamondInfoId = $DDI['DiamondInfoId'];

						$this->db->where('DiamondInfoId',$DiamondInfoId);
						$this->db->delete('tb_diamond_information');
					}
					$ddcol['DiamondCut'] = strip_tags($this->input->post('dcut'));
					$ddcol['DiamondColor'] = strip_tags($this->input->post('dcolor'));
					$ddcol['DiamondClarity'] = strip_tags($this->input->post('dclarity'));
					$ddcol['DiamondCarat'] = strip_tags($this->input->post('dcarat'));
					$ddcol['DiamondPieces'] = strip_tags($this->input->post('dpcs'));
					$ddcol['ProductId'] = $ProductId;
					$ddcol['ProductType'] = 2;

					$this->db->insert('tb_diamond_information',$ddcol);

					//Certification Details
					$DCI = $this->db->query("select * from tb_diamond_certification where ProductId='$ProductId' and ProductType='2'")->row_array();
					if($DCI)
					{
						$DiamondCerId = $DCI['DiamondCerId'];

						$this->db->where('DiamondCerId',$DiamondCerId);
						$this->db->delete('tb_diamond_certification');
					}
					$dccol['GoldCertificate'] = strip_tags($this->input->post('dgcertification'));
					$dccol['DiamondCertificate'] = strip_tags($this->input->post('dcertification'));
					$dccol['ProductId'] = $ProductId;
					$dccol['ProductType'] = 2;

					$this->db->insert('tb_diamond_certification',$dccol);

					//Product Dimension
					$DDD = $this->db->query("select * from tb_diamond_dimension where ProductId='$ProductId' and ProductType='2'")->row_array();
					if($DDD)
					{
						$DiamondDimensionId = $DDD['DiamondDimensionId'];

						$this->db->where('DiamondDimensionId',$DiamondDimensionId);
						$this->db->delete('tb_diamond_dimension');
					}
					$dpdcol['DiamondProductSize'] = strip_tags($this->input->post('dproductsize'));
					$dpdcol['DiamondProductHeight'] = strip_tags($this->input->post('dgproductheight'));
					$dpdcol['DiamondProductWidth'] = strip_tags($this->input->post('dgproductwidth'));
					$dpdcol['ProductId'] = $ProductId;
					$dpdcol['ProductType'] = 2;

					$this->db->insert('tb_diamond_dimension',$dpdcol);

					//Other Information
					$DOI = $this->db->query("select * from tb_gold_other_information where ProductId='$ProductId' and ProductType='2'")->row_array();
					if($DOI)
					{
						$GoldOccId = $DOI['GoldOccId'];

						$this->db->where('GoldOccId',$GoldOccId);
						$this->db->delete('tb_gold_other_information');
					}
					$gocol['GoldTheme'] = strip_tags($this->input->post('dtheme'));
					$gocol['GoldDesignType'] = strip_tags($this->input->post('ddesigntype'));
					$gocol['GoldWearingStyle'] = strip_tags($this->input->post('dwearingstyle'));
					$gocol['GoldOccasion'] = strip_tags($this->input->post('doccasion'));
					$gocol['ProductId'] = $ProductId;
					$gocol['ProductType'] = 2;

					$this->db->insert('tb_gold_other_information',$gocol);

 				}

 				if($ProductType == '3')
 				{
 					//Basic Information
 					$PBI = $this->db->query("select * from tb_platinum_basic_information where ProductId='$ProductId' and ProductType='3'")->row_array();
 					if($PBI)
 					{
 						$PtBasicInfoId = $PBI['PtBasicInfoId'];

 						$this->db->where('PtBasicInfoId',$PtBasicInfoId);
 						$this->db->delete('tb_platinum_basic_information');
 					}
 					$pcol['PlatinumProductType'] = strip_tags($this->input->post('pptype'));
 					$pcol['PlatinumBrnds'] = strip_tags($this->input->post('pbrands'));
 					$pcol['PlatinumItemPackagingQty'] = strip_tags($this->input->post('ppqty'));
 					$pcol['Gender'] = strip_tags($this->input->post('pgender'));
 					$pcol['ProductId'] = $ProductId;
 					$pcol['ProductType'] = 3;

 					$this->db->insert('tb_platinum_basic_information',$pcol);

 					//Platinum Information
 					$PPI = $this->db->query("select * from tb_platinum_information where ProductId='$ProductId' and ProductType='3'")->row_array();
 					if($PPI)
 					{
 						$PtInfoId = $PPI['PtInfoId'];

 						$this->db->where('PtInfoId',$PtInfoId);
 						$this->db->delete('tb_platinum_information');
 					}
 					$pmcol['PlatinumPurity'] = strip_tags($this->input->post('ppurity'));
					$pmcol['PlatinumColor'] = strip_tags($this->input->post('pcolor'));
					$pmcol['PlatinumWeight'] = strip_tags($this->input->post('pgweight'));
					$pmcol['PlatinumNetWeight'] = strip_tags($this->input->post('pnweight'));
					$pmcol['ProductId'] = $ProductId;
					$pmcol['ProductType'] = 3;

					$this->db->insert('tb_platinum_information',$pmcol);

					//Certification Details
					$PPC = $this->db->query("select * from tb_platinum_certification where ProductId='$ProductId' and ProductType='3'")->row_array();
					if($PPC)
					{
						$PtCertificateId = $PPC['PtCertificateId'];

						$this->db->where('PtCertificateId',$PtCertificateId);
						$this->db->delete('tb_platinum_certification');
					}
					$pdcol['PlatinumCertificate'] = strip_tags($this->input->post('pcertification'));
					$pdcol['PlatinumDiamondCertification'] = strip_tags($this->input->post('pdcertification'));
					$pdcol['ProductId'] = $ProductId;
					$pdcol['ProductType'] = 3;

					$this->db->insert('tb_platinum_certification',$pdcol);

					//Product Dimension
					$PPD = $this->db->query("select * from tb_platinum_dimension where ProductId='$ProductId' and ProductType='3'")->row_array();
					if($PPD)
					{
						$PtDimensionId = $PPD['PtDimensionId'];

						$this->db->where('PtDimensionId',$PtDimensionId);
						$this->db->delete('tb_platinum_dimension');
					}
					$ppdcol['PlatinumProductSize'] = strip_tags($this->input->post('pproductsize'));
					$ppdcol['PlatinumProductHeight'] = strip_tags($this->input->post('pproductheight'));
					$ppdcol['PlatinumProductWidth'] = strip_tags($this->input->post('pproductwidth'));
					$ppdcol['ProductId'] = $ProductId;
					$ppdcol['ProductType'] = 3;

					$this->db->insert('tb_platinum_dimension',$ppdcol);

					//Diamond Information
					$PDII = $this->db->query("select * from tb_diamond_information where ProductId='$ProductId' and ProductType='3'")->row_array();
					if($PDII)
					{
						$DiamondInfoId = $PDII['DiamondInfoId'];

						$this->db->where('DiamondInfoId',$DiamondInfoId);
						$this->db->delete('tb_diamond_information');
					}
					$pddcol['DiamondCut'] = strip_tags($this->input->post('pdcut'));
					$pddcol['DiamondColor'] = strip_tags($this->input->post('pdcolor'));
					$pddcol['DiamondClarity'] = strip_tags($this->input->post('pdclarity'));
					$pddcol['DiamondCarat'] = strip_tags($this->input->post('pdcarat'));
					$pddcol['DiamondPieces'] = strip_tags($this->input->post('pdpcs'));
					$pddcol['ProductId'] = $ProductId;
					$pddcol['ProductType'] = 3;

					$this->db->insert('tb_diamond_information',$pddcol);

					//Other Information
					$POI = $this->db->query("select * from tb_gold_other_information where ProductId='$ProductId' and ProductType='3'")->row_array();
					if($POI)
					{
						$GoldOccId = $POI['GoldOccId'];
						$this->db->where('GoldOccId',$GoldOccId);
						$this->db->delete('tb_gold_other_information');
					}
					$pocol['GoldTheme'] = strip_tags($this->input->post('ptheme'));
					$pocol['GoldDesignType'] = strip_tags($this->input->post('pdesigntype'));
					$pocol['GoldWearingStyle'] = strip_tags($this->input->post('pdesigntype'));
					$pocol['GoldOccasion'] = strip_tags($this->input->post('poccasion'));
					$pocol['ProductId'] = $ProductId;
					$pocol['ProductType'] = 3;

					$this->db->insert('tb_gold_other_information',$pocol);

 				}

 				return $this->session->set_flashdata('success','Product Details Updated Successfully');
			}
			
 				
		}
			
			

 	}
 	
 	

 public function get_all_products($page='',$skey='')
 	{

 		
 		$lstart = (intval($page)-1)*10;
 		$lend = 10;

 		$sql = "select * from tb_products ";

 		/*if($skey!='')
 			$sql.=" where ProductName LIKE '%$skey%'";

 		$finalsql = $sql;
 		$tot = $this->db->query($finalsql);

 		if($lstart < 0)
 			$lstart = '0';
 		$sql.=" GROUP BY ProductId order by ProductId DESC LIMIT $lstart,$lend";
 		$total = $tot->num_rows();*/
 		$result = $this->db->query($sql)->result_array();
		foreach($result as $res) 
		{
			$productId = $res['ProductId'];  
			$stoneres=$this->db->query("select * from tb_stones_sub where ProStoId='$productId' ")->result_array();
			$stoneprice=0;
			$stoneweight=0; 
			foreach ($stoneres as $res1)
			{
				
				$stoneprice=$stoneprice+$res1['Amount'];
				$stoneweight=$stoneweight+$res1['caretsWt'];
			}
			
		    
			$gst=3;
			$finalstoneprice=$stoneprice;
			$finalstoneweight=$stoneweight;
			
			$totalgoldweight=$finalstoneweight+$res['gms'];
			
			$goldprice=$res['GoldPrice'];
			
			$wastageweight = ($res['gms']*$res['wastagepercentage'])/100;
			
			$netandwaste= $goldprice+($wastageweight*$res['TodayGoldRate']);
		
			$tax = ($finalstoneprice+$netandwaste+$res['MakingCahrges'])*($gst/100); 
			
						
			$totalproductprice=$finalstoneprice+$netandwaste+$res['MakingCahrges']+$tax;
			
			$cols['Gst']=$gst; 
			$cols['makchargeamount']=$wastageweight; 
			$cols['Tax']=$tax;
			$cols['TotalPrice']=$totalproductprice;
			$cols['stw'] = $finalstoneweight;  
			$cols['grw'] = $totalgoldweight; 
			$cols['stoneprice'] = $finalstoneprice; 
			$this->db->where('ProductId',$productId); 
			if($this->db->update('tb_products',$cols))
			{	
				$sucess=0;
			}
			else{
				$success=1;
			}
				
			//$productId = $res['ProductId'];  
		}

 		$sql1 = "select * from tb_products ";

				if($skey!='')
 			$sql1.=" where ProductName LIKE '%$skey%'";

			$finalsql = $sql1;
			$tot = $this->db->query($finalsql);

			if($lstart < 0)
 			$lstart = '0';
			$sql1.=" GROUP BY ProductId order by ProductId DESC LIMIT $lstart,$lend";
			$total = $tot->num_rows();
			$results = $this->db->query($sql1)->result();
		
      return array("total"=>$total,"products"=>$results);


 	}



	public function get_users_data($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

	$sql = "select * from user_register";

		if($skey!='')
			$sql.=" where firstname LIKE '%$skey%'";

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
 
		if($lstart < 0)
			$lstart = '0';
		//$sql.= " GROUP BY StoneId order by StoneId DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();
  
		$result = $this->db->query($sql)->result(); 

		return array('get_stonetype'=>$result,'total'=>$total);

	} 
 	public function get_edit_products($id) 
 	{
 		return $this->db->query("select *,

 			pr.SubCategory as subcatid,pr.Image as photo,pr.Description as descr,pr.ParentCategory as prcat,pr.ProductId as prodid,pr.jcarat as jcaratj from tb_products as pr 

 			left join subcategory as su on su.subcategory_name_id=pr.SubCategory 

 			left join subcategory_name as sb on sb.SubCategoryId=pr.SubCategoryList 
 
        
 			where pr.ProductId='$id'")->row_array();   
 	}

 	public function del_products($id)
 	{
 		return $this->db->query("delete from tb_products where ProductId='$id'");
 	}
 	
 	public function get_all_orders($skey='',$page='')
 	{
 		$skey = trim($skey);
 		$page = trim($page);

 		$lstart = (intval($page)-1)*10;
 		$lend = 10;
 		
 		$sql = "select *,os.Status as orStatus,os.TotalTransAmount as ttranamount,os.Date as odate from tb_orders as os left join user_info as us on us.UserId=os.UserId left join tb_orders_prowise as od on od.OrderId=os.OrderId";


 		if($skey!='') 
 			$sql.=" where os.OrderId LIKE '%$skey%'";
 		$finalsql = $sql;
 		$tot = $this->db->query($finalsql);

 		if($lstart < 0)
 			$lstart = 0;
 		$sql.= " GROUP BY os.OrderId order by os.OrderId DESC LIMIT $lstart,$lend";
 		$total = $tot->num_rows();

 		$result = $this->db->query($sql)->result_array();

 		return array('total'=>$total,"orders"=>$result);
 	}
 	public function deleteRecordSub($id){
	    $del = $this->db->query("Delete from subcategory where subcategory_name_id='$id' "); 
	    if($del){
	        $getData = $this->db->query("Select count(*) as co from subcategory_name where subcategory_name_id='$id'")->row_array();
	       
	        if($getData['co'] != 0){
	          return  $this->db->query("Delete from subcategory_name where subcategory_name_id='$id' ");
	        }else{ 
	            return $del;
	        }
	    }   
	   
	}
	
	public function deleteRecordSubCat($id){
	    return $this->db->query("Delete from subcategory_name where SubCategoryId='$id' "); 
	}
	
	
 	public function get_order_details($id)
 	{
 		$id = trim($id);
 		return $this->db->query("select *,os.Status as osstatus from tb_orders as os left join user_info as ui on ui.UserId=os.UserId left join user_address as ua on ua.Aid=os.AddressId  where os.OrderId='$id'")->row_array();
 	}
    public function get_payment_details($id)
 	{ 
 		$id = trim($id); 

 		return $this->db->query("select * from tb_orders as us  left join user_info as ui on ui.UserId=us.UserId left join user_address as ua on ua.Aid=us.AddressId where us.OrderId='$id'")->row_array();
 		//return array('err'=>'0','payments'=>$result);
 	}
	
	public function orders_details_productss($id)    
	{  
		$id= trim($id);      
		$result= $this->db->query("select * from tb_orders_prowise as od left join tb_products as pr on pr.ProductId=od.ProductId   where od.OrderId='$id'")->result_array(); 
	    return array('err'=>'0','orders'=>$result); 
	}      
	 
 	public function get_image_order_view($id)
 	{
 		return $this->db->query("select Image from tb_products as pr left join tb_orders as os on os.Product_Id=pr.ProductId where os.Oid='$id'")->row_array();
 	}

 	public function Add_Edit_History($id)
 	{
 		$HistoryId = trim($this->input->post('HistoryId'));
 		$OrderId = intval($id);

 		$OrderStatus = strip_tags($this->input->post('OrderStatus'));
 		$NotifyCustomer = strip_tags($this->input->post('notifycustomer'));
 		$Comment = strip_tags($this->input->post('comment'));

 		$col['OrderId'] = trim($OrderId);
 		$col['OrderStatus'] = intval($OrderStatus);
 		$col['NotifyCustomer'] = trim($NotifyCustomer);
 		$col['Comment'] = trim($Comment);
 		$col['Date'] = date('d-m-Y');
 		$col['DateTime'] = date('d-m-Y H:i:s');

 		if($HistoryId == '')
 		{
 			if($this->db->insert('tb_order_history',$col))
 			{
 				$ostatus['Status'] = trim($OrderStatus);
 				$ostatus['ModifiedDate'] = date('d-m-Y');
 				$this->db->where('Oid',$OrderId);
 				if($this->db->update('tb_orders',$ostatus))
 				{
 					if($NotifyCustomer == 'Yes')
 					{
 						return array('err'=>'0','msg'=>'History Added Suucessfully');
 					}
 				}
 			}
 		}

 	}

 	public function get_order_history($page='',$id)
 	{
 		$page = trim($page);
 		$orderid = trim($id);

 		$lstart = (intval($page)-1)*10;
 		$lend = 10;

 		$sql = "select * from tb_order_history where OrderId='$id'";

 		$finalsql = $sql;

 		$tot = $this->db->query($finalsql);
 		if($lstart < '0')
 			$lstart = '0';
 		$sql.= " GROUP BY HistoryId order by HistoryId DESC";
 		$total = $tot->num_rows();

 		$result = $this->db->query($sql)->result_array();
 		return array('total'=>$total,'orderhistory'=>$result);
 			
 	}

 	public function count_orders()
 	{
 		$result = $this->db->query("select * from tb_orders")->result_array();
 		return count($result);
 	}
 	public function count_requests()
 	{
 		$result = $this->db->query("select * from user_register where reaccess=1")->result_array();
 		return count($result);
 	}
 	
 	public function get_details_for_invoice_generates($OrderId)
 	{
 		return $this->db->query("select * from tb_orders_prowise as od left join tb_products as pr on pr.ProductId=od.ProductId   where od.OrderId='$OrderId'")->result_array();  
	   
	}     

   public function get_details_for_invoice_generate_orderids($OrderId)
 	{ 
 	   return $this->db->query("select *,os.Status as osstatus from tb_orders as os left join user_info as ui on ui.UserId=os.UserId left join user_address as ua on ua.Aid=os.AddressId  where os.OrderId='$OrderId'")->row_array();
 	
	}	
 	
 	public function get_details_for_invoice_generate($OrderId)
 	{
 		return $this->db->query("select *,os.Status as osstatus from tb_orders as os left join user_info as ui on ui.UserId=os.UserId left join user_address as ua on ua.Aid=os.AddressId left join tb_products as pr on pr.ProductId=os.Product_Id where os.OrderId='$OrderId'")->row_array(); 
 	}
 	

 	public function get_details_for_invoices_generates()
 	{
 		$data = $this->input->post('multi');
		$time = time();
		if($data!='')
		{
		    foreach($data as $row=>$key)
		$data = $key;
		//$needtopay = '';
		$exploded = explode(',',$data);
		if(count($exploded)>='1')
		{
			foreach($exploded as $row)
			{
				$result = $this->db->query("select *,os.Status as osstatus from tb_orders as os left join user_info as ui on ui.UserId=os.User_Id left join user_address as ua on ua.Aid=os.Address_Id left join tb_products as pr on pr.ProductId=os.Product_Id where os.Oid=' $row'")->result_array();
				$res[] = $result;

			}
			return $res;
		}
		else
		    return false;
		}
		else
		    return false;
		
		
 		//foreach($orderid as $row=>$skey)
 		//$exploded = explode(',',$skey);
 		//foreach($exploded as $ex)

 			
	 	//return $result;
			
 	}
 	
 	
	
	public function Add_Edit_Stone_Type()
	{
		

		$StoneId = strip_tags($this->input->post('StoneId'));
		$col['stonename'] = strip_tags($this->input->post('stonename'));
	
		$col['DateTime'] = date('d-m-Y H:i:s');  
    
		if($StoneId == '')       
		{         
			if($this->db->insert('stonetype',$col))        
			{ 
				return $this->session->set_flashdata('success','Stonetype Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Stonetype Added Failed');
		}
		else  
			$this->db->where('StoneId',$StoneId);    
			$this->db->update('stonetype',$col);  
			return $this->session->set_flashdata('success','Stonetype Update Succesfully');

	}
	
		public function Add_user_logintime()
	{
		

		$userid = strip_tags($this->input->post('userid'));
		$col['Login_time'] = strip_tags($this->input->post('reason'));
	
		//$col['DateTime'] = date('d-m-Y H:i:s');  
    
		if($userid == '')       
		{         
			if($this->db->insert('user_register',$col))        
			{ 
				return $this->session->set_flashdata('success','Login_time Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Login_time Added Failed');
		}
		else  
			$this->db->where('uid',$userid);    
			$this->db->update('user_register',$col);  
			return $this->session->set_flashdata('success','user_register Update Succesfully');

	}
		public function get_stonetype($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from stonetype"; 

		if($skey!='')
			$sql.=" where stonename LIKE '%$skey%'";

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
 
		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY StoneId order by StoneId DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();
  
		$result = $this->db->query($sql)->result(); 

		return array('get_stonetype'=>$result,'total'=>$total);

	}  
	public function edit_stone($eid)     
	{      
		return $this->db->query("select * from stonetype where StoneId='$eid'")->row_array();
	} 
	public function del_stone($eid)
	{
		return $this->db->query("delete from stonetype where StoneId='$eid'"); 
	} 
	
	
	
	public function Add_Edit_Carat_Type() 
	{
		

		$CaratId = strip_tags($this->input->post('CaratId'));
		$col['caratname'] = strip_tags($this->input->post('caratname'));
	
		$col['DateTime'] = date('d-m-Y H:i:s');   
     
		if($CaratId == '')       
		{         
			if($this->db->insert('carattype',$col))         
			{ 
				return $this->session->set_flashdata('success','Carattype Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Carattype Added Failed');
		}
		else    
			$this->db->where('CaratId',$CaratId);     
			$this->db->update('carattype',$col);    
			return $this->session->set_flashdata('success','Carattype Update Succesfully');

	}
	
			public function get_carattype($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from carattype"; 

		if($skey!='')
			$sql.=" where caratname LIKE '%$skey%'";

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
    
		if($lstart < 0) 
			$lstart = '0'; 
		$sql.= " GROUP BY CaratId order by CaratId DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows(); 
  
		$result = $this->db->query($sql)->result();   
  
		return array('get_carattype'=>$result,'total'=>$total);  

	}  
	
	public function edit_carat($eid)       
	{      
		return $this->db->query("select * from carattype where CaratId='$eid'")->row_array();
	} 
	public function del_carat($eid)
	{ 
		return $this->db->query("delete from carattype where CaratId='$eid'"); 
	} 
	
	
/////Making Charges //////	

	public function get_purity()
	    {
			return $this->db->query("select GoldCaret from goldrate ")->result_array();
		}
	public function get_style()
	    {
			return $this->db->query("select Style from tb_style_model group by Style")->result_array();
		}
	public function getstylemodel($style) 
	{
		return $this->db->query("select Model from tb_style_model where Style='$style' ")->result_array();
	}
	public function get_weight() 
	{
		return $this->db->query("select * from weightchart  ")->result_array();
	}
	
	
	
	
	public function Add_Edit_Making_Charges() 
	{

		$makId = strip_tags($this->input->post('makId')); 
		$parentcategory = strip_tags($this->input->post('parentcategory')); 
		$subcategory = strip_tags($this->input->post('subcategory')); 
		$purity = strip_tags($this->input->post('purity')); 
		$style = strip_tags($this->input->post('style')); 
		$model = strip_tags($this->input->post('model')); 
		$size =  strtoupper(strip_tags($this->input->post('size'))); 
		
		$weight = strip_tags($this->input->post('weight')); 
		
		$str1=explode('-',$weight);
		$minwt=$str1[0];  
		$maxwt=$str1[1]; 
		
		$percentage=strip_tags($this->input->post('percentage'));
		$itemname=$subcategory.' '.$style.' '.$model;
		
		$col['Itemname']=$itemname;
		$col['parentcategoryid'] = $parentcategory;
	    $col['subcategoryid'] = $subcategory;
		$col['purity'] = $purity; 
		$col['Style'] = $style;   
		$col['Model'] = $model;   
		$col['Size'] = $size;   
		$col['minwt'] = $minwt;   
		$col['maxwt'] = $maxwt;   
		$col['percentage'] = $percentage;   
     
		if($makId == '')           
		{            
			if($this->db->insert('makingcharges',$col))              
			{ 
				return $this->session->set_flashdata('success','Charges Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Charges Added Failed');
		} 
		else     
			$this->db->where('makId',$makId);       
			$this->db->update('makingcharges',$col);        
			return $this->session->set_flashdata('success','Charges Update Succesfully');

	}
	
	public function get_Making_Charges($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from makingcharges"; 

		if($skey!='')
			$sql.=" where mmin LIKE '%$skey%'"; 

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
    
		if($lstart < 0) 
			$lstart = '0';  
		$sql.= " GROUP BY makId order by makId ASC LIMIT $lstart,$lend"; 

		$total = $tot->num_rows(); 
   
		$result = $this->db->query($sql)->result();     
   
		return array('get_piecetype'=>$result,'total'=>$total);  

	}  
	
	public function edit_Making_Charges($eid)       
	{         
		return $this->db->query("select * from makingcharges where makId='$eid'")->row_array();
	} 

	
	public function del_Making_Charges($eid)   
	{  
		return $this->db->query("delete from makingcharges where makId='$eid'"); 
	} 
	
	///Making Charges Ends //////
	
	public function get_stone()
	{  
		return $this->db->query("select * from stonetype")->result_array();
	}   
	public function get_carat()
	{  
		return $this->db->query("select * from carattype")->result_array(); 
	}
	/*public function get_piece()          
	{   
		return $this->db->query("select * from piecetype")->result_array();
	}*/
	
	public function edit_stonesedits($id)       
	{
	    if($id!='')                    
	    {
	        $result = $this->db->query("select * from tb_stones_sub 
			where ProStoId='$id' ")->result_array();    
	        return array('err'=>'0','stonessget'=>$result);   
	    }  
	}
	
	public function find_getmmin($mmin) 
	{
	 
		$fmmin = $this->db->query("select * from piecetype where $mmin BETWEEN mmin and mmax ")->row_array(); 
		if(!empty($fmmin))
		{       
			return array('err'=>'1','msg'=>'Min Value Already Taken');  
		} 
	
	}
	 
	public function find_getmmax($mmax)   
	{ 
		if($mmax){
			$fmman = $this->db->query("select * from piecetype where $mmax BETWEEN mmin and mmax")->row_array(); 
		if(!empty($fmman)) 
		{           
			return array('err'=>'2','msg'=>'Max Value Already Taken'); 
		}
		}
	}
	
	public function find_getmaking($makcharge)   
	{  
		if($makcharge){ 
			$fmman = $this->db->query("select * from piecetype where $makcharge BETWEEN mmin and mmax")->row_array(); 
		if(!empty($fmman)) 
		{            
			return array('err'=>'2','price'=>$fmman['mprice']);  
		} 
		}
	}
	
	//////Staff Model Starts //////
		public function staffauth()
	{
		if($this->input->post('LoginEmail'))
		{
			$email = trim($this->input->post('LoginEmail'));
			if($email!='')
			{
				$this->db->select('*');
				$this->db->from('tb_staff');
				$this->db->where(array('email'=>$email,'status'=>'1'));
				$result = $this->db->get()->row_array();
				if(!empty($result))
					return array('response'=>1);
				else
					return array('response'=>0);
			}
		}
		else if($this->input->post('Email'))
		{
			$email = trim($this->input->post('Email'));
			$HASH = trim($this->input->post('Password'));

			$this->db->select('*');
			$this->db->from('tb_staff');
			$this->db->where('email',$email);
			$result = $this->db->get()->row_array();
			if(!empty($result) && password_verify($HASH,$result['password']))
			{
				$new_session = array('staffid'=>$result['staffid']);
				$this->session->set_userdata($new_session);
				return 1;
			}
			else
				return 0;
		}
	}
	////// Excel starts here /////
	public function coupons_import_file_flag()
	{
		$returnmsg="";
		$err=1; 
		$this->load->library('PHPExcel');  
		if($this->input->post()) 
		{
			$config['upload_path'] = './documents/excels/';
			if (!file_exists($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, true);
			}
			chmod($config['upload_path'],0777);
			$config['allowed_types'] = 'xls|csv|xlsx';
			$config['file_name'] =time().'csv';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('import_file'))
			{
				$data['message_error'] = $this->upload->display_errors();
				$returnmsg="Please upload valid excel format";
				$err=0;
				return array('err'=>$err,'msg'=>$returnmsg);
			}
			else 
			{
				$importdata=array();
				$pdf_files=array();	
				$trx='';	
				$recdate='';
				$rectime='';
				$filedata = array('upload_data' => $this->upload->data());	
				//echo $filedata['upload_data']['file_name'];die;	
				$filename = './documents/excels/'.$filedata['upload_data']['file_name'];   
				
				$Reader = PHPExcel_IOFactory::createReaderForFile($filename);
				$Reader->setReadDataOnly(true); // set this, to not read all excel properties, just data
				$objXLS = $Reader->load($filename);
				$maxRow =$objXLS->getActiveSheet()->getHighestRow();
				$miss_status=0;
				$checking_format=0;
				$column_num=1;
				
				if(trim($objXLS->getSheet()->getCell('A'.$column_num)->getValue())!="Tag No")
				{
					$checking_format=1;
				}
				if(trim($objXLS->getSheet()->getCell('B'.$column_num)->getValue())!="Category")
				{
					$checking_format=1;
				}
				if(trim($objXLS->getSheet()->getCell('C'.$column_num)->getValue())!="SubCategory")
				{
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('D'.$column_num)->getValue())!="Sub Description")
				{
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('E'.$column_num)->getValue())!="Item Description")
				{ 
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('F'.$column_num)->getValue())!="ItemNo")
				{
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('G'.$column_num)->getValue())!="Pcs")
				{
					$checking_format=1; 
				}
					if(trim($objXLS->getSheet()->getCell('H'.$column_num)->getValue())!="NWt")
				{
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('I'.$column_num)->getValue())!="Wastage")
				{
					$checking_format=1;
				}  
				
					if(trim($objXLS->getSheet()->getCell('J'.$column_num)->getValue())!="Labour")
				{
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('K'.$column_num)->getValue())!="Purity")
				{
					$checking_format=1;
				}
				
					if(trim($objXLS->getSheet()->getCell('L'.$column_num)->getValue())!="Note/Remarks")
				{
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('M'.$column_num)->getValue())!="Image")
				{
					$checking_format=1;
				}
				
					if(trim($objXLS->getSheet()->getCell('N'.$column_num)->getValue())!="Branch")
				{
					$checking_format=1;
				}
					if(trim($objXLS->getSheet()->getCell('O'.$column_num)->getValue())!="Sa/Sh")
				{
					$checking_format=1;
				}
				if(trim($objXLS->getSheet()->getCell('P'.$column_num)->getValue())!="Style")
				{
					$checking_format=1;
				}
				if(trim($objXLS->getSheet()->getCell('Q'.$column_num)->getValue())!="Model")
				{
					$checking_format=1;
				}
				if(trim($objXLS->getSheet()->getCell('R'.$column_num)->getValue())!="Gender")
				{
					$checking_format=1;
				}
				if(trim($objXLS->getSheet()->getCell('S'.$column_num)->getValue())!="Premium")
				{
					$checking_format=1;
				}
				if(trim($objXLS->getSheet()->getCell('T'.$column_num)->getValue())!="Sold/Unsold")
				{
					$checking_format=1;
				}
				if($checking_format == 0)
				{
					if($maxRow>1) {
					for($i=2;$i<=$maxRow;$i++)
					{
						$j=0;
						$importdata['Tag No']	=  trim($objXLS->getSheet()->getCell('A'.$i)->getValue());
						
						$importdata['Category']	=  trim($objXLS->getSheet()->getCell('B'.$i)->getValue());
						
						$importdata['SubCategory']	=  trim($objXLS->getSheet()->getCell('C'.$i)->getValue());
						
						$importdata['Sub Description']	=  trim($objXLS->getSheet()->getCell('D'.$i)->getValue());
						
						$importdata['Item Description']	=  trim($objXLS->getSheet()->getCell('E'.$i)->getValue());
						
						$importdata['ItemNo']	=  trim($objXLS->getSheet()->getCell('F'.$i)->getValue());
						
						$importdata['Pcs']	=  trim($objXLS->getSheet()->getCell('G'.$i)->getValue());
						
						$importdata['NWt']	=  trim($objXLS->getSheet()->getCell('H'.$i)->getValue());
						
						$importdata['Wastage']	=  trim($objXLS->getSheet()->getCell('I'.$i)->getValue());
						
						
						$importdata['Labour']	=  trim($objXLS->getSheet()->getCell('J'.$i)->getValue());
						
					   $importdata['Purity']	=  trim($objXLS->getSheet()->getCell('K'.$i)->getValue());
					   
						$importdata['Note/Remarks']	=  trim($objXLS->getSheet()->getCell('L'.$i)->getValue());
						
						$importdata['Image']	=  trim($objXLS->getSheet()->getCell('M'.$i)->getValue());
						
						$importdata['Branch']	=  trim($objXLS->getSheet()->getCell('N'.$i)->getValue());
						
						$importdata['Sa/Sh']	=  trim($objXLS->getSheet()->getCell('O'.$i)->getValue());
						
						$importdata['Style']	=  trim($objXLS->getSheet()->getCell('P'.$i)->getValue());
						
						$importdata['Model']	=  trim($objXLS->getSheet()->getCell('Q'.$i)->getValue());
						
						$importdata['Gender']	=  trim($objXLS->getSheet()->getCell('R'.$i)->getValue());
						
						$importdata['Premium']	=  trim($objXLS->getSheet()->getCell('S'.$i)->getValue());
						
						$importdata['Sold/Unsold']	=  trim($objXLS->getSheet()->getCell('T'.$i)->getValue());
						
						$CouponId = -1; 
						if($importdata['Tag No']!= ''){
							$results = $this->excels_insert_coupons($CouponId,$importdata);
							if($results['err'] == 0){
								$err=1;
								$returnmsg="Successfully Imported"; 
							}
							else{ 
								$returnmsg=$results['msg']; 
								$err=0;
							}
						}
						else{
							$returnmsg="Please fill the required fields Roll number,Name,CLASS,D.O.B,PHONE NO,Addr4,Series,MATHS,Subject Rankm,PHYSICS,Subject Rankp,CHEMISTRY,Subject Rankc,BIOLOGY,Subject Rankb,Total,Rank";$err=0;
						}  
					}	
				}
				else
					$returnmsg="Column fields are not matched..!"; 	$err=0;			
				}
			}		
			return array('err'=>$err,'msg'=>$returnmsg);
		}
	}
	
	public function excels_insert_coupons($CouponId,$importdata)
	{
		//$Coupons = $importdata['Coupons'];  
		$col['tagno'] = $importdata['Tag No'];   
        $tagno = $col['tagno']; 
         
			$data1 = $this->db->query("select ProductId from tb_products where tagno='$tagno'")->row_array(); 
			//print_r($data1);
				//  echo $data1;  
				//  exit;    
			if(!empty($data1))    
			{
				 $dataid = $this->db->query("select ProductId from tb_products where tagno='$tagno'")->row_array(); 
				 $proid = $dataid['ProductId'];
				// echo $proid; 
				 $cols['ProStoId'] = $proid; 
				 $cols['stonecat'] = $importdata['Category'];
				 $stonecat = $importdata['Category'];
				 
				$sql="select * from tb_stone_final where ParentCat='$stonecat' ";
				if($importdata['SubCategory'])
				{
					$stonename=$importdata['SubCategory'];
					$sql.="AND StnName='$stonename' ";
				}
				if($importdata['Sub Description'])
				{
					$stonecolor=$importdata['Sub Description'];
					$sql.="AND StnColor='$stonecolor' ";
				}
				if($importdata['Item Description'])
				{
					$stoneclarity = $importdata['Item Description'];
					$sql.="AND StnClarity='$stoneclarity' ";
				}
				if($importdata['ItemNo'])
				{
					$stonecut = $importdata['ItemNo'];
					$sql.="AND StnCut='$stonecut' ";
				}
				if($importdata['Wastage'])
				{
					$stonepolish = $importdata['Wastage'];
					$sql.="AND StnPolish='$stonepolish' ";
				}
				$sql.="order by Fsid ASC limit 1";
				$finalsql=$sql;
				  $stoneid = $this->db->query($finalsql)->row_array(); 
				  $pprice=$stoneid['StnPrice'];
				  $cols['Price'] 		= $stoneid['StnPrice'];  
				  $cols['StnName'] 		= $stoneid['StnName'];  
				  $cols['StnColor'] 	= $stoneid['StnColor'];  
				  $cols['StnClarity'] 	= $stoneid['StnClarity'];  
				  $cols['StnCut'] 		= $stoneid['StnCut'];  
				  $cols['StnPolish'] 	= $stoneid['StnPolish'];   
				  $cols['Amount'] 		= $importdata['NWt'] * $pprice;
				  $cols['Qty'] 			= $importdata['NWt'];    
				  $cols['stonesid'] 	= $stoneid['Fsid'];    
				  $cols['caretsWt'] 	= ($importdata['NWt'])/5; 
				 	if($this->db->insert('tb_stones_sub',$cols))
					{   
						return array('err'=>1,'msg'=>'Successfully Imported');
					} 
					else  
					{
						return array('err'=>1,'msg'=>'Try again later');
					}
			}					
			  
			else if(empty($data))
			{
				$Category = $importdata['Category'];
				
			if($Category)
			{
				$cat = $this->db->query("select CategoryId from categories where CategoryName='$Category'")->row_array();  
				$col['ParentCategory'] = $cat['CategoryId'];
				$parentcatid=$cat['CategoryId'];
				$col['ProductTypeForFixedNonFixed'] = $cat['CategoryId'];
			}
			$SubCategory = $importdata['SubCategory'];
			if($SubCategory)
			{
				$subcat = $this->db->query("select * from subcategory where Title='$SubCategory'")->row_array();  
				$col['SubCategory'] = $subcat['subcategory_name_id'];
				$subcattitle = $subcat['Title'];
			}
			//Father Name
			$subDescription = $importdata['Sub Description']; 
			if($subDescription)
			{ 
				$subdes = $this->db->query("select SubCategoryId from subcategory_name where SubCategoryName='$subDescription'")->row_array();  
				$col['SubCategoryList'] = $subdes['SubCategoryId'];
			} 
			//class
			$col['ProductName'] = $importdata['Item Description'];
			
			//DOB
			$col['ItemNo'] = $importdata['ItemNo'];
			 
			//phone
			$col['Quantity'] = $importdata['Pcs']; 
			$col['gms'] = $importdata['NWt'];	
			$col['MakingCahrges'] = $importdata['Labour'];
			$carat = $importdata['Purity'];  
			if($carat)            
			{     
				$subdes = $this->db->query("select * from goldrate where GoldCaret like '$carat%'")->row_array();  
				$col['caretsTypesId'] = $subdes['GoldRateId'];   
				$col['TodayGoldRate'] = $subdes['GoldRate']; 
				$purity = $subdes['GoldCaret']; 
			}
			/*if($col['makcharge'])     
			{
				$makcharge = $col['makcharge']; 
				$making = $this->db->query("select * from piecetype where '$makcharge' BETWEEN mmin and mmax")->row_array(); 
				$col['makchargeamount'] = $making['mprice'];   
			
			}*/
			
			$netweight = $importdata['NWt'];
			$Style = $importdata['Style'];
			$col['stonestyle']=$Style;
			$Model = $importdata['Model'];
			$col['stonemodel']=$Model;
			if($Style)
			{
				if($Model)
				{
					$getpercentage = $this->db->query("select * from makingcharges where parentcategoryid='$parentcatid' AND subcategoryid='$subcattitle' AND purity='$purity' AND Style='$Style' AND Model='$Model'AND minwt<='$netweight' and maxwt>='$netweight' AND Size='BABY' ")->row_array();  
				
					$col['wastagepercentage'] = $getpercentage['Percentage'];				
				
				}
				else
				{
					$getpercentage = $this->db->query("select * from makingcharges where parentcategoryid='$parentcatid' AND subcategoryid='$subcattitle' AND purity='$purity' AND Style='$Style' AND minwt<='$netweight' and maxwt>='$netweight' AND Size='BABY' ")->row_array(); 
					
					$col['wastagepercentage'] = $getpercentage['Percentage'];   
					
				}
			}			
									
			$col['GoldPrice'] = $col['TodayGoldRate']*$col['gms'];  
			$col['Remarks'] = $importdata['Note/Remarks'];  
			$col['Image'] = $importdata['Image'];           
			$col['Branch'] = $importdata['Branch'];          
			$col['Sa/Sh'] = $importdata['Sa/Sh'];   
			$col['gender1'] = $importdata['Gender'];   
			$col['ProductCategory'] = $importdata['Premium'];   
			$col['Stock'] = $importdata['Sold/Unsold'];   
			$col['ProductStatus'] = 1; 			
			if($this->db->insert('tb_products',$col))
			{ 
				/*  if($this->db->insert('tb_excelresultsduplicate',$col)){
						return array('err'=>1,'msg'=>'Successfully Uploaded');
				} */ 
					return array('err'=>1,'msg'=>'Successfully Imported');
			}         
				  
			else
				return array('err'=>1,'msg'=>'Try again later');
			} 	
	}
	///// Excel Ends here ///////
	 
}
?>