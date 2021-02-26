<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
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
	public function getParentCategory()
	{
		$sql="SELECT * FROM categories ";
		$a=$this->db->query($sql)->result_array();	
		return $a;	
	}
	public function getSubCategory()
	{
		$sql="SELECT * FROM subcategory ";
		$a=$this->db->query($sql)->result_array();	
		return $a;	
	}
	public function getProducts($id)  
	{
		$sql="SELECT * FROM tb_products where SubCategory='$id' ";
		$a=$this->db->query($sql)->result_array();	
		return $a;	
	}
	
		public function getMainProducts($id)
	{
	    $parentid = trim($id);
		 $uid1 = $this->session->userdata('uid1');
		 //$a=$this->db->query("select * from tb_admin_user_cart  where userid='$uid1'")->result_array();	 
		//$b=$a['products'];
		
		$sql="select a.*,c.*,b.uid from user_register as b,tb_products as a inner join tb_admin_user_cart as c on a.ProductId=c.products where a.ParentCategory='$parentid' and c.userid='$uid1' GROUP BY a.ProductId";
	//	echo $sql;
	//	exit; 
		//$sql = "select * from tb_products where subcategory='$proId' AND ParentCategory='$parentid' ";

		$result = $this->db->query($sql)->result_array();
  	   return $result;
	}
	
	public function category()
	{
		return $this->db->query("SELECT * FROM `categories` ORDER BY CategoryId ASC LIMIT 3")->result_array();
	}
	public function mainmenu_cat($id)
	{
		$value=$this->db->query("SELECT preferences from user_register where uid='$id'")->row_array();
		$val=$value['preferences'];
		//return $value;
		
		$a=$this->db->query("SELECT a.CategoryId,a.CategoryName FROM categories as a INNER JOIN subcategory as b on a.CategoryId=b.ParentCategory where b.subcategory_name_id IN($val) GROUP BY a.CategoryId ")->result_array();
        return $a;		
		
		
	}
	public function submenu_cat($id)
	{
		$value=$this->db->query("SELECT preferences from user_register where uid='$id'")->row_array();
		$val=$value['preferences'];
		
		$a=$this->db->query("SELECT a.CategoryId,a.CategoryName,b.subcategory_name_id,b.Title,c.SubCategoryName  from subcategory as b INNER JOIN categories as a on a.CategoryId=b.ParentCategory inner join subcategory_name as c on b.subcategory_name_id=c.subcategory_name_id where b.subcategory_name_id IN($val) group by b.subcategory_name_id")->result_array();	
		return $a;	
		
	}
	///staff cat admin starts////
	public function mainmenu_staffcat($id)
	{
		//$value=$this->db->query("SELECT preferences from user_register where uid='$id'")->row_array();
		//$val=$value['preferences'];
		//return $value;
		
		$a=$this->db->query("SELECT a.CategoryId,a.CategoryName FROM categories as a INNER JOIN subcategory as b on a.CategoryId=b.ParentCategory GROUP BY a.CategoryId ")->result_array();
        return $a;		
		
		
	}
	public function submenu_staffcat($id)
	{
		/*$value=$this->db->query("SELECT preferences from user_register where uid='$id'")->row_array();
		$val=$value['preferences'];*/
		
		$a=$this->db->query("SELECT a.CategoryId,a.CategoryName,b.subcategory_name_id,b.Title,c.SubCategoryName  from subcategory as b INNER JOIN categories as a on a.CategoryId=b.ParentCategory inner join subcategory_name as c on b.subcategory_name_id=c.subcategory_name_id  GROUP BY b.subcategory_name_id")->result_array();	
		return $a;	
		
	}
	///staff cat admin ends ////
	
	
	
	
	
	public function mainmenu_cat1($userId)
	{
		$value=$this->db->query("SELECT preferences from user_register where uid='$userId'")->row_array();
		$val=$value['preferences'];
		//return $value;
		
		$a=$this->db->query("SELECT a.CategoryId,a.CategoryName FROM categories as a INNER JOIN subcategory as b on a.CategoryId=b.ParentCategory where b.subcategory_name_id IN($val) GROUP BY a.CategoryId ")->result_array();
        return $a;		
		
		
	}
	public function submenu_cat1($userId)
	{
		$value=$this->db->query("SELECT preferences from user_register where uid='$userId'")->row_array();
		$val=$value['preferences'];
		
		$a=$this->db->query("SELECT a.CategoryId,a.CategoryName,b.subcategory_name_id,b.Title,c.* from subcategory as b INNER JOIN categories as a on a.CategoryId=b.ParentCategory inner join subcategory_name as c on b.subcategory_name_id=c.subcategory_name_id where b.subcategory_name_id IN($val) Group By b.subcategory_name_id ")->result_array();	
		return $a;	
		
	}
	public function subcategory()
	{
		return $this->db->query("SELECT DISTINCT a.CategoryId,a.CategoryName,b.subcategory_name_id,b.Title,c.SubCategoryName FROM `subcategory` as b inner join categories as a on a.CategoryId=b.ParentCategory inner join subcategory_name as c on b.subcategory_name_id=c.subcategory_name_id GROUP BY b.subcategory_name_id  ORDER BY a.CategoryId ASC ")->result_array();
	}
	public function user_registration()
	{
		$fname=$this->input->post('firstname');
		$lname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$gender=$this->input->post('gender');
		$countrycode=$this->input->post('ccode');
		$phone=$this->input->post('phoneField1');
		$details=$this->input->post('detailinformation');
		$mpassword= password_hash($password,PASSWORD_BCRYPT);
		$select=$this->input->post('selection');
		$selection=implode(',', (array) $select);
		$col['firstname']=$fname;
		$col['lastname']=$lname;
	    $col['number']=$phone;
		$col['email']=$email;
		$col['countrycode']=$countrycode;
		$col['password']=$mpassword;
		$col['gender1']=$gender;
		$col['preferences']=$selection;
		$col['detailsinfo']=$details;
		if($this->db->insert('user_register',$col))
	 	{
	 	    $message='Dear'.$lname.' '.$fname.',Thanks for registering with Premraj Shantilal Jain Jewellery. Your account not yet approved , Wait for approval. Thank you.';
	 	    
	 	    $message1=''.$lname.' '.$fname.'got registered with Premraj Shantilal Jain Jewellery. Thank you.';
	 	    $msg= urlencode($message);
	 	    $msg1=urlencode($message1);
	 	    
			$ret=file_get_contents("http://203.212.70.200//smpp/sendsms?username=skybellnewapi&password=skybell@123&to=".$phone."&udh=0&from=SKYBEL&text=".$msg);
			
			$ret1=file_get_contents("http://203.212.70.200//smpp/sendsms?username=skybellnewapi&password=skybell@123&to=8187851087&udh=0&from=SKYBEL&text=".$msg1);
			
			

           if($ret && $ret1)
            {
               // echo "Message Sent Successfully";
            }
            else
            {
                //echo "Message Sending Failed";
            }
			
			echo "<script>alert('Registered Successfully');
                           window.location.href='Login';</script> ";
                           
		}
		else
		{
			echo "<script>alert('Something Went Wrong');
                           window.location.href='Login';</script> ";
		}
	}
		public function User_login()
	{
		$email1 = strip_tags($this->input->post('email1'));
		$pwd1 = strip_tags($this->input->post('pwd1'));
		$result = $this->db->query("select * from user_register where email='$email1' ")->row_array();
		$uid=$result['uid'];
		if($result['uid'] > 0 && password_verify($pwd1,$result['password']))
		{
			$status=$result['status'];
			$adminstatus=$result['admin_status'];
			$logintime=$result['Login_time'];
			if($adminstatus==0)
			{
				if($logintime==0)
				{
					return 3;
				}
				return 3;
			}
			else
			{
				if($logintime==0)
					{
						return 3;
					}
				else 
				{
					if($status=='0')
					{
						$this->db->query("update user_register set status='1' where uid='$uid' ");
						$uid_new_session = array('uid1'=>$result['uid'],'uname'=>$result['firstname']); 
						$this->session->set_userdata($uid_new_session);
						return 1;
					} 
					else 
					{
						if($status=='1')
						{
							return 2;
						}
						else
						{
							return 0;
						}
					}
				  }
			  }
	}

	}
	public function ProductsView($id,$staffid)
	{	
		if($staffid==0)
		{
			$value=$this->db->query("SELECT preferences from user_register where uid='$id'")->row_array();
			$val=$value['preferences'];
			$existsdata = $this->db->query("SELECT * from tb_admin_user_cart where userid='$id'")->row_array();
			if(empty($existsdata))
			{
				$a=$this->db->query("SELECT * from tb_products where SubCategory IN($val)")->result_array();	
				return $a;
			}
			else
			{
				$a=$this->db->query("SELECT t1.* FROM tb_products as t1  WHERE t1.ProductId not IN (SELECT t2.products FROM tb_admin_user_cart as t2  WHERE t2.userid='$id') AND t1.SubCategory IN($val)")->result_array();	
				return $a;
			}	
		}
		else
		{
			$value=$this->db->query("SELECT preferences from user_register where uid='$id'")->row_array();
			$val=$value['preferences'];
			$existsdata = $this->db->query("SELECT * from tb_admin_user_cart where userid='$id'")->row_array();
		
		    $staffdata=$this->db->query("SELECT ProductCategory from tb_staff where staffid='$staffid'")->row_array();
			$productcategory=$staffdata['ProductCategory'];
			if(empty($existsdata))
			{
			    
			    if($productcategory=='Both')
			    {
			        $a=$this->db->query("select * from tb_products group by ProductId")->result_array();
			    }
			    else
			    {
			        
				$a=$this->db->query("SELECT a.*,b.* from tb_products as a inner join tb_staff as b on a.ProductCategory=b.ProductCategory where a.SubCategory IN($val) and a.ProductCategory='$productcategory' group by a.ProductId")->result_array();	
			    }
			    
				return $a;
			}
			else
			{
			    if($productcategory=='Both')
			    {
			        
			       $a=$this->db->query("SELECT t1.*  FROM tb_products t1 WHERE t1.ProductId NOT IN (SELECT t2.products FROM tb_admin_user_cart as t2  WHERE t2.userid='$id') AND t1.SubCategory IN($val) group by t1.ProductId")->result_array();
			    }
			    else
			    {
			        
				$a=$this->db->query("SELECT t1.*,t2.* FROM tb_products t1 inner join tb_staff as t2 on t1.ProductCategory=t2.ProductCategory  WHERE t1.ProductId NOT IN (SELECT t3.products FROM tb_admin_user_cart as t3  WHERE t3.userid='$id') AND t1.SubCategory IN($val) and t2.staffid='$staffid'  group by t1.ProductId")->result_array();	
				
				}
				return $a;
			}	
		}
			
	}
	public function staffproducttype($staffid)
	{
	    
	    $sql=$this->db->query("select * from tb_staff where staffid='$staffid' ")->row_array();
	    return $sql;
	    
	}
	///// staff cat starts /////
	public function staffProductsView($id)
	{
		/*$value=$this->db->query("SELECT preferences from user_register where uid='$id'")->row_array();
		$val=$value['preferences'];*/
		$existsdata = $this->db->query("SELECT * from tb_admin_cart where userid='$id'")->row_array();
		if(empty($existsdata))
		{
			$a=$this->db->query("SELECT * from tb_products ")->result_array();	
			return $a;
		}
		else
		{
			$a=$this->db->query("SELECT t1.* FROM tb_products as t1  WHERE t1.ProductId not IN (SELECT t2.products FROM tb_admin_cart as t2  WHERE t2.userid='$id')  ")->result_array();	
			return $a;
		}	
		
	}
	///// staff cat ends //////
	
	
	
    public function ProductsView1($userId)
	{
		//$value=$this->db->query("SELECT products from tb_admin_cart where userid=$userId ")->result_array();
		
		//$val=$value['products'];
		//SELECT a.* from tb_products as a,tb_admin_cart as b  WHERE a.ProductId IN(8,9) AND b.userid='1'
		$a=$this->db->query("SELECT t1.*,t2.pricestatus from tb_products as t1 inner join tb_admin_user_cart as t2 on t1.ProductId=t2.products where t1.ProductId = t2.products and t2.userid='$userId' group by t1.ProductId ORDER BY t1.ProductId ASC")->result_array();	
		return $a;	
		
	}
	
	
	
    public function staffinfo($userId)
	{
		//$value=$this->db->query("SELECT products from tb_admin_cart where userid=$userId ")->result_array();
		
		//$val=$value['products'];
		//SELECT a.* from tb_products as a,tb_admin_cart as b  WHERE a.ProductId IN(8,9) AND b.userid='1'
		$a=$this->db->query("SELECT a.uid,a.firstname,a.number,a.email,c.staffid,c.name,c.number as staffnumber from user_register as a left join tb_assigned as b on a.uid=b.name inner join tb_staff as c on b.assignedusers=c.staffid where a.uid='$userId' GROUP by a.uid")->row_array();	
		return $a;	
		
	}
	
		public function admin_add_cart($id,$uid)
		{
			$userid=$uid;
			$col['userid'] = $uid;
			$col['products'] = $id;
			$existsdata = $this->db->query("select * from tb_admin_cart where userid='$userid'  ")->row_array();
			if(empty($existsdata))
			{
				if($this->db->insert('tb_admin_cart',$col))
				{
					return array('err'=>'0','msg'=>'Added Successfully..!');
				}
				else
				{
					return array('err'=>'1','msg'=>'NETWORK:ERROR');
				}
			}
			else
			{
				$b=$this->db->query("select products from tb_admin_cart WHERE FIND_IN_SET($id,tb_admin_cart.products) and userid='$userid' ")->row_array();
				if(empty($b))
				{
					$pid= $existsdata['products'];
					if($pid=='')
					{
						$newvalue=$id;
					}
					else
					{
						$newvalue=$pid.','.$id;
					}
					$col1['userid']=$uid;
					$col1['products']=$newvalue;
					$this->db->where("userid",$uid);         
					$a=$this->db->update("tb_admin_cart",$col1);
					if($a)
					{	         
						return array('err'=>'0','msg'=>'Added Successfully..!');  
					}
				}
				else
				{
					return array('err'=>'2','msg'=>'Already Added');  
				}
			}				
					
		}
		/* multi select admin staff cart starts */
		public function admin_add_cart1($uid)
		{
			$uid= $uid;
			$productid=$this->input->post('products');
			$priceid=$this->input->post('price');
			//print_r($productid);
			//echo '<br/>';
			//print_r($priceid);
			//echo '<br/>';
			
			$product='';
			$price='';
			$productlength=sizeof($productid);
			$pricelength=sizeof($priceid);
			if($productlength==$pricelength)
			{
				$i=0;
				for($i=0;$i<$productlength;$i++)
				{
					if($productid[$i]!='0')
					{
						if($product=='')
						{
							$product=$productid[$i];
							$price=$priceid[$i];				
						}
						else
						{
							$product.=','.$productid[$i];
							$price.=','.$priceid[$i];				
						}
					}
				}
							
			}
			$pro1=explode(',',$product);
			$price1=explode(',',$price);
			$productlength1=sizeof($pro1);
			$pricelength1=sizeof($price1);
			if($productlength1==$pricelength1)
			{
					for($i=0;$i<$productlength1;$i++)
					{
						$col['userid'] = $uid;
						$col['products'] = $pro1[$i];
						$proid=$col['products'];
						$col['pricestatus'] = $price1[$i];
						$existsdata = $this->db->query("select * from tb_admin_cart where userid='$uid' and products='$proid' ")->row_array();
						if(empty($existsdata))
						{
							if($this->db->insert('tb_admin_cart',$col))
							{ 
								$a=array('err1'=>'0','msg'=>'Added Successfully..!');
							}
							else
							{
								$a=array('err1'=>'1','msg'=>'NETWORK:ERROR');
							}
						}
						else
						{
							
						}
					}
					return $a;
			}
			/*else
			{
				$pro1=explode(',',$product);
				$price1=explode(',',$price);
				$productlength1=sizeof($pro1);
				$pricelength1=sizeof($price1);
				if($productlength1==$pricelength1)
				{
					for($i=0;$i<$productlength1;$i++)
					{
						$proid1=$pro1[$i];
						$priceid1=$price1[$i];
						echo '<br/>';
						echo $proid1.' AND '.$priceid1;
						echo '<br/>';
						$b=$this->db->query("select products from tb_admin_cart WHERE FIND_IN_SET($proid1,tb_admin_cart.products) and userid='$uid' ")->row_array();
						if(empty($b))
						{
							$existsdata = $this->db->query("select * from tb_admin_cart where userid='$uid'  ")->row_array();
							
							$pid= $existsdata['products'];
							$pricestatus= $existsdata['pricestatus'];
							$newvalue=$pid.','.$proid1;
							$newpriceval=$pricestatus.','.$priceid1;
							echo $newvalue.' AND '.$newpriceval;
							echo '<br/>';
							$col1['userid']=$uid;
							$col1['products']=$newvalue;
							$col1['pricestatus']=$newpriceval;
							$this->db->where("userid",$uid);         
							$a=$this->db->update("tb_admin_cart",$col1);
							if($a)
							{	         
								//return array('err'=>'0','msg'=>'Added Successfully..!');  
							}
							else
							{
								//return array('err'=>'2','msg'=>'Already Added');  
							}	
						}
						else
						{
							
						}
						
						
						
					}	
						
				}
			} */

		}
		/* multi select admin cart ends */
		/* multi select staff user cart starts */
		public function admin_add_user_cart1($uid)
		{
			$uid= $uid;
			$productid=$this->input->post('products');
			$priceid=$this->input->post('price');
			//print_r($productid);
			//echo '<br/>';
			//print_r($priceid);
			//echo '<br/>';
			
			$product='';
			$price='';
			$productlength=sizeof($productid);
			$pricelength=sizeof($priceid);
			if($productlength==$pricelength)
			{
				$i=0;
				for($i=0;$i<$productlength;$i++)
				{
					if($productid[$i]!='0')
					{
						if($product=='')
						{
							$product=$productid[$i];
							$price=$priceid[$i];				
						}
						else
						{
							$product.=','.$productid[$i];
							$price.=','.$priceid[$i];				
						}
					}
				}
							
			}
			$pro1=explode(',',$product);
			$price1=explode(',',$price);
			$productlength1=sizeof($pro1);
			$pricelength1=sizeof($price1);
			if($productlength1==$pricelength1)
			{
					for($i=0;$i<$productlength1;$i++)
					{
						$col['userid'] = $uid;
						$col['products'] = $pro1[$i];
						$proid=$col['products'];
						$col['pricestatus'] = $price1[$i];
						$existsdata = $this->db->query("select * from tb_admin_user_cart where userid='$uid' and products='$proid' ")->row_array();
						if(empty($existsdata))
						{
							if($this->db->insert('tb_admin_user_cart',$col))
							{ 
								$a=array('err1'=>'0','msg'=>'Added Successfully..!');
							}
							else
							{
								$a=array('err1'=>'1','msg'=>'NETWORK:ERROR');
							}
						}
						else
						{
							
						}
					}
					return $a;
			}
			/*else
			{
				$pro1=explode(',',$product);
				$price1=explode(',',$price);
				$productlength1=sizeof($pro1);
				$pricelength1=sizeof($price1);
				if($productlength1==$pricelength1)
				{
					for($i=0;$i<$productlength1;$i++)
					{
						$proid1=$pro1[$i];
						$priceid1=$price1[$i];
						echo '<br/>';
						echo $proid1.' AND '.$priceid1;
						echo '<br/>';
						$b=$this->db->query("select products from tb_admin_cart WHERE FIND_IN_SET($proid1,tb_admin_cart.products) and userid='$uid' ")->row_array();
						if(empty($b))
						{
							$existsdata = $this->db->query("select * from tb_admin_cart where userid='$uid'  ")->row_array();
							
							$pid= $existsdata['products'];
							$pricestatus= $existsdata['pricestatus'];
							$newvalue=$pid.','.$proid1;
							$newpriceval=$pricestatus.','.$priceid1;
							echo $newvalue.' AND '.$newpriceval;
							echo '<br/>';
							$col1['userid']=$uid;
							$col1['products']=$newvalue;
							$col1['pricestatus']=$newpriceval;
							$this->db->where("userid",$uid);         
							$a=$this->db->update("tb_admin_cart",$col1);
							if($a)
							{	         
								//return array('err'=>'0','msg'=>'Added Successfully..!');  
							}
							else
							{
								//return array('err'=>'2','msg'=>'Already Added');  
							}	
						}
						else
						{
							
						}
						
						
						
					}	
						
				}
			} */

		}
		/* multi select staff-user cart ends */
		
		
		
		
		
		
		
		public function user_add_cart($id,$uid)
		{
			$userid=$uid;
			$col['userid'] = $uid;
			$col['products'] = $id;
			$existsdata = $this->db->query("select * from tb_user_cart where userid='$userid' ")->row_array();
			if(empty($existsdata))
				{
					if($this->db->insert('tb_user_cart',$col))
					{
						return array('err'=>'0','msg'=>'Added Successfully..!');
					}
					else
						return array('err'=>'1','msg'=>'NETWORK:ERROR');
				}
				else
				{
					$b=$this->db->query("select products from tb_user_cart WHERE FIND_IN_SET($id,tb_admin_cart.products) and userid='$userid'")->row_array();
					if(empty($b))
					{
						$pid= $existsdata['products'];
						if($pid=='')
						{
							$newvalue=$id;
						}
						else
						{
							$newvalue=$pid.','.$id;
						}
						$col1['userid']=$uid;
						$col1['products']=$newvalue;
						$this->db->where("userid",$uid);         
						$a=$this->db->update("tb_user_cart",$col1);
						if($a)
						{	         
							return array('err'=>'0','msg'=>'Added Successfully..!');  
						}
					}
					
					else
					{
						return array('err'=>'2','msg'=>'Already Added');  
					}
				}				
					
		}
	
	public function get_admin_ProductsSide($proId,$parentid)
	{
		
		
		$proId = trim($proId);
		$parentid = trim($parentid);
		
		$sql = "select * from tb_products where subcategoryList='$proId' AND ParentCategory='$parentid' ";

		$result = $this->db->query($sql)->result_array();
 
		return array('getSidePro'=>$result);  
 
 
	} 
	
	public function get_admin_ProductsparentSide($parentid,$uid)
	{
		
		
		
		$parentid = trim($parentid);
		 $uid1 = trim($uid);
		 $a=$this->db->query("select * from user_register  where uid='$uid1'")->row_array();
		$b=$a['preferences'];
		$sql="select *,b.uid from tb_products,user_register as b where SubCategoryList IN($b) AND ParentCategory='$parentid' GROUP BY ProductId";
		
		//$sql = "select * from tb_products where subcategory='$proId' AND ParentCategory='$parentid' ";

		$result = $this->db->query($sql)->result_array();
 
		return array('getSidePro1'=>$result);  
 
 
	} 
	public function get_welcome_ProductsparentSide1($parentid,$uid1,$min,$max)
	{
	    
		 $parentid = trim($parentid);
		 $uid1 = trim($uid1);
		// $a=$this->db->query("select * from tb_admin_cart  where userid='$uid1'")->row_array();	 
		//$b=$a['products'];
		
		$sql="select a.*,b.uid,c.pricestatus from tb_products as a inner join tb_admin_user_cart as c on a.ProductId=c.products,user_register as b where userid='$uid1' AND a.ParentCategory='$parentid'  AND  (TotalPrice between $min and $max) GROUP BY a.ProductId"; 
		
		//$sql = "select * from tb_products where subcategory='$proId' AND ParentCategory='$parentid' ";

		$result = $this->db->query($sql)->result_array();
 
		return array('getSidePro1'=>$result);  
 
 
	} 
public function get_admin_ProductsSide1($proId,$parentid,$uid,$min,$max)
	{
		
		$userId = $uid;
		
		
		$proId = trim($proId); 
		$parentid = trim($parentid);	
		$sql = "select a.*,b.* from tb_products as a inner join tb_admin_user_cart as b on a.ProductId=b.products where b.userid='$userId' AND SubCategory ='$proId' AND ParentCategory='$parentid' AND (TotalPrice between $min and $max) And ProductId IN(SELECT products from tb_admin_user_cart where userid='$userId') group by a.ProductId ";
	

		$result = $this->db->query($sql)->result_array();
		//print_r($result);
		//exit;
		return array('getSidePro'=>$result);  
 
 
	}
	
	/////cart count for staff categories starts /////
		public function get_count_cart()
	{
		$UserId = $this->input->post('uid');
		if($UserId!='')
		{
			$a=$this->db->query("select count(*) as count from tb_admin_cart where userid='$UserId'")->row_array();
			$b=$a['count'];
			
			//$b=count($result);
			return $b;
		}
		
	}
	/////cart count for staff categories ends /////
	/////cart count for user categories starts /////
		public function get_count_cart1()
	{
		$UserId = $this->input->post('uid');
		if($UserId!='')
		{
			$a=$this->db->query("select count(*) as count from tb_admin_user_cart where userid='$UserId'")->row_array();
			$b=$a['count'];
			
			//$b=count($result);
			return $b;
		}
		
	}
	/////cart count for user categories ends /////
	public function get_user_count_cart($userId)
	{
		$UserId = $this->session->userdata('uid1');
		if($UserId!='')
		{
	    $a=$this->db->query("select * from tb_user_cart where userid='$UserId'")->row_array();
		if(empty($a))
		{
			$b=0;
			return $b;
		}
		else
		{
			$val=$a['products'];
			if($val=='')
			{
				$b=0;
				
			}
			else
			{
			$result=$this->db->query("SELECT * from tb_products where ProductId IN($val) ")->result();
			$b=count($result);
			}
			return $b;
		}
		}
		
	}
	public function submenunames($id)
	{
		$sql="SELECT a.CategoryName,b.SubCategoryName FROM tb_products as c inner join categories as a on c.ParentCategory=a.CategoryId  inner join subcategory_name as b on c.SubCategoryList=b.SubCategoryId where c.ProductId='$id' ";
		
	//	$sql="Select * from tb_products where ProductId='$id'";
		$a=$this->db->query($sql)->row_array();	
		return $a;	
	}
	public function singleproduct($id)
	{
		$sql="SELECT a.*,d.Title,e.GoldCaret FROM tb_products as a inner join subcategory as d on a.SubCategory=d.subcategory_name_id  inner join goldrate as e on a.caretsTypesId=e.GoldRateId where ProductId='$id' ";
		
	//	$sql="Select * from tb_products where ProductId='$id'";
		$a=$this->db->query($sql)->row_array();	
		return $a;	
	}
	public function singleproduct1($id)
	{
		$sql="SELECT a.*,b.pricestatus,d.title,e.GoldCaret FROM tb_products as a inner join subcategory as d on a.SubCategory=d.subcategory_name_id  inner join goldrate as e on a.caretsTypesId=e.GoldRateId inner join tb_admin_user_cart as b on a.ProductId = b.products where a.ProductId='$id' ";
		
	//	$sql="Select * from tb_products where ProductId='$id'";
		$a=$this->db->query($sql)->row_array();	
		return $a;	
	}
	public function getParentCategoryName($id)
	{
	   	$sql="SELECT a.CategoryName from categories as a inner join subcategory as b on a.CategoryId=b.ParentCategory where b.subcategory_name_id='$id' ";
		$a=$this->db->query($sql)->row_array();	
		return $a;	
	}
	public function getSubCategoryName($id)
	{
	   	$sql="SELECT title from subcategory where subcategory_name_id='$id' ";
		$a=$this->db->query($sql)->row_array();	
		return $a;	
	}
	
public function Add_Edit_staff_mem() 
	{
		

		$staffid = strip_tags($this->input->post('staffid')); 
		$col['name'] = strip_tags($this->input->post('name'));
	    $col['number'] = strip_tags($this->input->post('number'));
		$col['email'] = strip_tags($this->input->post('email')); 
		$col['ProductCategory'] = strip_tags($this->input->post('ProductCategory')); 
		$pwd = strip_tags($this->input->post('password')); 
		$col['password'] = password_hash($pwd,PASSWORD_BCRYPT);
		/*$select=$this->input->post('selection');
		$selection=implode(',', (array) $select);
		$col['preferences'] =$selection;*/
		
		if($staffid == '')           
		{            
			if($this->db->insert('tb_staff',$col))              
			{ 
				return $this->session->set_flashdata('success','Registered Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Registered Failed');
		} 
		else     
			$this->db->where('staffid',$staffid);       
			$this->db->update('tb_staff',$col);        
			return $this->session->set_flashdata('success','Updated  Succesfully');

	}
	public function get_staffmem($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from tb_staff"; 

		if($skey!='')
			$sql.=" where name LIKE '%$skey%'"; 

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
    
		if($lstart < 0) 
			$lstart = '0';  
		$sql.= " GROUP BY staffid order by staffid ASC LIMIT $lstart,$lend"; 

		$total = $tot->num_rows(); 
   
		$result = $this->db->query($sql)->result();     
   
		return array('get_staffmem'=>$result,'total'=>$total);  

	} 
	public function edit_staffmem($eid)       
	{         
		return $this->db->query("select * from tb_staff where staffid='$eid'")->row_array();
	} 
	public function del_staffmem($eid)   
	{  
		return $this->db->query("delete from tb_staff where staffid='$eid'"); 
	} 
	//////
	
	   public function Add_Edit_assign_mem() 
	{
		$staffid = strip_tags($this->input->post('staffid')); 
		$col['name'] = strip_tags($this->input->post('selestname'));
	    $col['assignedusers'] = strip_tags($this->input->post('selestuser'));
		
		if($staffid == '')           
		{            
			if($this->db->insert('tb_assigned',$col))              
			{ 
				return $this->session->set_flashdata('success','Registered Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Registered Failed');
		} 
		else  
		{
			
			
         $col1['name'] = strip_tags($this->input->post('selestname1'));
	     $col1['assignedusers'] = strip_tags($this->input->post('selestuser'));
			
			$this->db->where('aid',$staffid);       
			$this->db->update('tb_assigned',$col1);        
			return $this->session->set_flashdata('success','Updated  Succesfully');
        } 
	}
		public function get_assignedmem($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		//$sql = "SELECT a.name,a.aid,a.assignedusers,b.firstname FROM `tb_assigned` as a inner JOIN user_register as b on a.name=b.uid"; 
		 $sql="SELECT a.name,a.aid,a.assignedusers,b.firstname,c.name,c.staffid FROM `tb_assigned` as a inner JOIN user_register as b on a.name=b.uid inner join tb_staff as c on a.assignedusers=c.staffid";
		

		if($skey!='')
			$sql.=" where name LIKE '%$skey%'"; 

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
    
		if($lstart < 0) 
			$lstart = '0';  
		$sql.= " GROUP BY a.aid order by a.aid ASC LIMIT $lstart,$lend"; 

		$total = $tot->num_rows(); 
   
		$result = $this->db->query($sql)->result();     
   
		return array('get_assignedmem'=>$result,'total'=>$total);  

	} 
	public function edit_assign_mem($eid)       
	{       
	//SELECT a.name,a.aid,a.assignedusers,b.firstname FROM `tb_assigned` as a inner JOIN user_register as b on a.name=b.uid
		return $this->db->query("select * from tb_assigned where aid='$eid'")->row_array();
	} 
	public function del_assign_mem($eid)   
	{  
		return $this->db->query("delete from tb_assigned where aid='$eid'"); 
	}
	public function get_staff_select()
	{
		return $this->db->query("select * from tb_staff")->result_array();
	}
	public function get_user_select()
	{
		return $this->db->query("SELECT * FROM user_register  WHERE uid not IN (SELECT name FROM tb_assigned )")->result_array();
	}
	
	public function get_user_select_edit()
	{
		return $this->db->query("SELECT * FROM user_register ")->result_array();
	}
	
	public function get_assigned()
	{
		return $this->db->query("SELECT a.name,a.assignedusers,b.firstname FROM `tb_assigned` as a inner JOIN user_register as b on a.name=b.uid")->result_array();
	}
	
	///////
		public function get_shopping_cart()
	{ 
		$UserId = $this->session->userdata('uid1');
		if($UserId)   
		{ 
	$a=$this->db->query("select products from tb_user_cart where userid='$UserId' ")->row_array();
	$val=$a['products'];
	
			return $this->db->query("select * from tb_products where ProductId In($val)")->result_array();
		}
		  
	}
	/////
		public function get_admin_shopping_cart($id)
	{ 
		$UserId = $id;
		if($UserId)   
		{ 
			return $this->db->query("select t1.*,t2.*,a.CategoryName from tb_products as t1 inner join tb_admin_cart as t2 on t1.ProductId = t2.products inner join categories as a on a.CategoryId = t1.ParentCategory
			where t1.ProductId=t2.products and t2.userid='$UserId' group by t1.ProductId")->result_array();
		}  
	}
	public function del_admin_shopping_cart($id)
	{ 
		$id = $id;
		if($id)   
		{ 
			return $this->db->query("delete from tb_admin_cart where cartid='$id'");
		}
		  
	}
	
		public function admin_update_cart($uid)
		{
			$userid = $uid;
			$products = $this->input->post('products');
			$prices = $this->input->post('pricestatus');
		
			$existingdata=$this->db->query("delete from tb_admin_cart where userid='$userid' ");
			if($existingdata)
			{
				$product='';
				$price='';
				$productlength=sizeof($products);
				$pricelength=sizeof($prices);
				if($productlength==$pricelength)
				{
					$i=0;
					for($i=0;$i<$productlength;$i++)
					{
						if($products[$i]!='0')
						{
							if($product=='')
							{
							$product=$products[$i];
							$price=$prices[$i];				
							}
							else
							{
								$product.=','.$products[$i];
								$price.=','.$prices[$i];				
							}
						}
					}
							
				}
				$pro1=explode(',',$product);
				$price1=explode(',',$price);
				$productlength1=sizeof($pro1);
				$pricelength1=sizeof($price1);
				if($productlength1==$pricelength1)
				{
				
					for($i=0;$i<$productlength1;$i++)
					{
						$col['userid'] = $uid;
						$col['products'] = $pro1[$i];
						$col['pricestatus'] = $price1[$i];
						if($this->db->insert('tb_admin_cart',$col))
						{
							$a=array('err'=>'0');
						}
						else
						{
							$a= array('err'=>'1');
						}
					}
					return $a;
				}
				else
				{
					return array('err'=>'1');	
				}
			}
			
		}
	
	////////
		public function get_admin_user_shopping_cart($id)
	{ 
		$UserId = $id;
		if($UserId)   
		{ 
			return $this->db->query("select t1.*,t2.*,a.CategoryName from tb_products as t1 inner join tb_admin_user_cart as t2 on t1.ProductId = t2.products inner join categories as a on a.CategoryId = t1.ParentCategory
			where t1.ProductId=t2.products and t2.userid='$UserId' group by t1.ProductId")->result_array();
		}  
	}
	public function del_admin_user_shopping_cart($id)
	{ 
		$id = $id;
		if($id)   
		{ 
			return $this->db->query("delete from tb_admin_user_cart where cartid='$id'");
		}
		  
	}
	
		public function admin_user_update_cart($uid)
		{
			$userid = $uid;
			$products = $this->input->post('products');
			$prices = $this->input->post('pricestatus');
		
			$existingdata=$this->db->query("delete from tb_admin_user_cart where userid='$userid' ");
			if($existingdata)
			{
				$product='';
				$price='';
				$productlength=sizeof($products);
				$pricelength=sizeof($prices);
				if($productlength==$pricelength)
				{
					$i=0;
					for($i=0;$i<$productlength;$i++)
					{
						if($products[$i]!='0')
						{
							if($product=='')
							{
							$product=$products[$i];
							$price=$prices[$i];				
							}
							else
							{
								$product.=','.$products[$i];
								$price.=','.$prices[$i];				
							}
						}
					}
							
				}
				$pro1=explode(',',$product);
				$price1=explode(',',$price);
				$productlength1=sizeof($pro1);
				$pricelength1=sizeof($price1);
				if($productlength1==$pricelength1)
				{
				
					for($i=0;$i<$productlength1;$i++)
					{
						$col['userid'] = $uid;
						$col['products'] = $pro1[$i];
						$col['pricestatus'] = $price1[$i];
						if($this->db->insert('tb_admin_user_cart',$col))
						{
							$a=array('err'=>'0');
						}
						else
						{
							$a= array('err'=>'1');
						}
					}
					return $a;
				}
				else
				{
					return array('err'=>'1');	
				}
			}
			
		}
		
		/* user shopping cart page */ 
		public function add_orders($uid)
		{
			$col['UserId'] = $uid;
			$id = $this->input->post('productsids');
		
		
			$ids = implode(',',$id);
				//print_r($ids);
				//exit;
			$col['ProductId'] = $ids;
			
			if($this->db->insert('tb_orders_prowise',$col))
			{
				return array('err'=>'0');
			}
			else
				return array('err'=>'1');
			
		}
		/* User shopping cart page ends */
		
		
		
		
		
		public function get_user_orderdetails($page='',$skey='')
    {
    	$lstart = (intval($page)-1)*10;
    	$lend = 10;

    	$sql = "select a.* from user_register as a inner join tb_orders_prowise as b on a.uid=b.UserId  where a.uid=b.UserId";

    	$finalsql = $sql;
    	$tot = $this->db->query($finalsql);
    	if($lstart < 0)
    		$lstart = '0';
    	//$sql.=" GROUP BY GoldRateId order by GoldRateId DESC LIMIT $lstart,$lend";
    	$total = $tot->num_rows();
    	$result = $this->db->query($sql)->result();
    	return array("total"=>$total,"userdetails"=>$result);
    }
	
	
		public function get_user_orderdetailsview($page='',$id)
    {
    	$lstart = (intval($page)-1)*10;
    	$lend = 10;
		$a=$this->db->query("SELECT ProductId from tb_orders_prowise where UserId='$id' ")->row_array();
		$val=$a['ProductId'];
    	$sql = "select * from tb_products where ProductId IN($val)";

    	$finalsql = $sql;
    	$tot = $this->db->query($finalsql);
    	if($lstart < 0)
    		$lstart = '0';
    	
    	$total = $tot->num_rows();
    	$result = $this->db->query($sql)->result();
    	return array("total"=>$total,"userdetails"=>$result);
    }
	
	/////
	
	 public function userstatus($id,$statusid)
 {
	
	$id = trim($id);
	$statusid = trim($statusid);
	if($statusid==0)
	{
	//$this->db->query("UPDATE user_register SET admin_status='0'");
	$sql=$this->db->query("select * from user_register where uid='$id'")->row_array();
	$phone=$sql['number'];
	 $message='Dear Jash. Your account got approved from  Premraj Shantilal Jain Jewellery. Thank you.';
	 	    
		$msg= urlencode($message);
	 	    
			$ret=file_get_contents("http://203.212.70.200//smpp/sendsms?username=skybellnewapi&password=skybell@123&to=".$phone."&udh=0&from=SKYBEL&text=".$msg);
			if($ret)
			{
			
            	return $this->db->query("UPDATE user_register SET admin_status='1',status='0' WHERE uid='$id'");
        	}
	       }
	else
	{
	return $this->db->query("UPDATE user_register SET admin_status='0',status='0' WHERE uid='$id'");
	}	
 }
 ///////filters admin starts//////////////
 public function get_admin_FilteredProductsSide($parentid,$subcatid,$selectsublist,$selectgender,$selectproductcategory,$description,$weight,$minprice,$maxprice,$uid,$staffid)
	{
		
		$parentid = trim($parentid);
		$subcatid = trim($subcatid);
		$selectsublist = trim($selectsublist);
		$selectgender = trim($selectgender);
		$selectproductcategory = trim($selectproductcategory);
		$description = trim($description);
		$weight = trim($weight);
		$minprice = trim($minprice);
		$maxprice = trim($maxprice);
		 $uid1 = trim($uid);
		 $staffid = trim($staffid);
		
		 $a=$this->db->query("select * from user_register  where uid='$uid1'")->row_array();
		$b=$a['preferences'];
		if($staffid==0)
		{
		$sql1 ="select * from tb_products where ProductId NOT IN(select products from tb_admin_user_cart where userid='$uid1') AND SubCategory IN($b)";
		}
		else
		{	
		$sql1 ="select a.* from tb_products as a where  a.ProductId  NOT IN(select products from tb_admin_user_cart where userid='$uid1') AND SubCategory IN($b)";
		}
		if(!empty($parentid))
		{
			$sql1.=" AND ParentCategory='$parentid'";
		}
		if(!empty($subcatid))
		{
			$sql1.=" AND SubCategory='$subcatid'";
		}
		if(!empty($selectsublist))
		{
			$sql1.=" AND SubCategoryList='$selectsublist'";
		}
		if(!empty($selectgender))
		{
			$sql1.=" AND gender1='$selectgender'";
		}
		if(!empty($selectproductcategory))
		{
			$sql1.=" AND ProductCategory='$selectproductcategory'";
		}
		if(!empty($description))
		{
			$sql1.=" AND productdescription like '%$description'";
		}
		if(!empty($weight))
		{
			$sql1.=" AND grw like '$weight%'";
		}
		if(!empty($minprice))
		{
			$sql1.=" AND totalprice>='$minprice'";
		}
		if(!empty($maxprice))
		{
			$sql1.=" AND totalprice<='$maxprice'";
		}
		
		$result = $this->db->query($sql1)->result_array();
 
		return array('getFilterProducts'=>$result);  
 
 
	} 
	////////Filters admin ends //////
	////////Filters staff category starts //////
	 public function get_adminstaff_FilteredProductsSide($parentid,$subcatid,$selectsublist,$selectgender,$description,$weight,$minprice,$maxprice,$uid)
	{
		
		$parentid = trim($parentid);
		$subcatid = trim($subcatid);  
		$selectsublist = trim($selectsublist);
		$selectgender = trim($selectgender);
		$description = trim($description);
		$weight = trim($weight);
		$minprice = trim($minprice);
		$maxprice = trim($maxprice);
		 $uid1 = trim($uid);
		$existsdata = $this->db->query("SELECT * from tb_admin_cart where userid='$uid1'")->row_array();
		if(empty($existsdata))
		{
			$sql1="SELECT * from tb_products where ProductStatus=1";
			if(!empty($parentid))
			{
				$sql1.=" AND ParentCategory='$parentid'";
			}
			if(!empty($subcatid))
			{
				$sql1.=" AND SubCategory='$subcatid'";
			}
			if(!empty($selectsublist))
			{
				$sql1.=" AND SubCategoryList='$selectsublist'";
			}
			if(!empty($selectgender))
			{
				$sql1.=" AND gender1='$selectgender'";
			}
			if(!empty($description))
			{
				$sql1.=" AND productdescription like '%$description'";
			}
			if(!empty($weight))
			{
				$sql1.=" AND grw='$weight'";
			}
			if(!empty($minprice))
			{
				$sql1.=" AND totalprice>='$minprice'";
			}
			if(!empty($maxprice))
			{
				$sql1.=" AND totalprice<='$maxprice'";
			}			
		
		}
		else
		{
			$sql1="SELECT t1.* FROM tb_products as t1  WHERE t1.ProductId not IN (SELECT t2.products FROM tb_admin_cart as t2  WHERE t2.userid='$uid1') ";
		
		//$sql1 ="select * from tb_products where ProductStatus=1";
		if(!empty($parentid))
		{
			$sql1.=" AND ParentCategory='$parentid'";
		}
		if(!empty($subcatid))
		{
			$sql1.=" AND SubCategory='$subcatid'";
		}
		if(!empty($selectsublist))
		{
			$sql1.=" AND SubCategoryList='$selectsublist'";
		}
		if(!empty($selectgender))
		{
			$sql1.=" AND gender1='$selectgender'";
		}
		if(!empty($description))
		{
			$sql1.=" AND productdescription like '%$description'";
		}
		if(!empty($weight))
		{
			$sql1.=" AND grw='$weight'";
		}
		if(!empty($minprice))
		{
			$sql1.=" AND totalprice>='$minprice'";
		}
		if(!empty($maxprice))
		{
			$sql1.=" AND totalprice<='$maxprice'";
		}
		}
		
		$result = $this->db->query($sql1)->result_array();
 
		return array('getFilterProducts'=>$result);  
 
 
	}
	////////Filters staff category ends //////
	
	public function get_sub_cat_list1($parentid,$subcatid){
		
		$parentid= trim($parentid);
		$subcatid= trim($subcatid);
		
		return $this->db->query("select a.*,b.* from subcategory_name as a inner join subcategory as b on a.subcategory_name_id=b.subcategory_name_id where b.subcategory_name_id='$subcatid' and b.ParentCategory='$parentid'")->result_array();
	
		
	}
 ///////filters Admin ends//////////////
 
 
  ///////filters user starts//////////////
 public function get_user_FilteredProductsSide($parentid,$subcatid,$selectsublist,$selectgender,$minprice,$maxprice,$uid)
	{
		
		$parentid = trim($parentid);
		$subcatid = trim($subcatid);
		$selectsublist = trim($selectsublist);
		$selectgender = trim($selectgender);
		//$tagno = trim($tagno);
		//$weight = trim($weight);
		$minprice = trim($minprice);
		$maxprice = trim($maxprice);
		
		
		 $uid1 = trim($uid);
		 
		 // $a=$this->db->query("select * from tb_admin_cart  where userid='$uid1'")->row_array();	 
		//$b=$a['products'];
		
		$sql1 ="SELECT t1.*,t2.pricestatus from tb_products as t1 inner join tb_admin_cart as t2 on t1.ProductId=t2.products where t1.ProductId = t2.products and t2.userid=' $uid'";
		if(!empty($parentid))
		{
			$sql1.=" AND ParentCategory='$parentid'";
		}
		if(!empty($subcatid))
		{
			$sql1.=" AND SubCategoryList='$subcatid'";
		}
		if(!empty($selectsublist))
		{
			$sql1.=" AND SubCategory='$selectsublist'";
		}
		if(!empty($selectgender))
		{
			$sql1.=" AND gender1='$selectgender'";
		}
		/*if(!empty($tagno))
		{
			$sql1.=" AND tagno='$tagno'";
		}
		if(!empty($weight))
		{
			$sql1.=" AND grw='$weight'";
		}*/
		if(!empty($minprice))
		{
			$sql1.=" AND totalprice>='$minprice'";
		}
		if(!empty($maxprice))
		{
			$sql1.=" AND totalprice<='$maxprice'";
		}
		
		$result = $this->db->query($sql1)->result_array();
 
		return array('getFilterProducts'=>$result);  
 
 
	} 
	
	
	public function get_user_sub_cat_list1($parentid,$subcatid){
		
		$parentid= trim($parentid);
		$subcatid= trim($subcatid);
		
		return $this->db->query("select * from subcategory_name where SubCategory='$subcatid' and ParentCategory='$parentid' order by subcategory_name_id asc")->result_array();
	
		
	}
 ///////filters user ends//////////////
 
	///////////////////////////stafffffffff////////
		public function get_staffview($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);
		$staffid = $this->session->userdata('staffid');
		//print_r($staffid);
		//exit;

		$sql = "SELECT * FROM user_register WHERE uid IN (SELECT name FROM tb_assigned WHERE assignedusers=$staffid)"; 

		if($skey!='')
			$sql.=" where name LIKE '%$skey%'"; 

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
    
		if($lstart < 0) 
			$lstart = '0';  
		$sql.= " GROUP BY uid order by uid ASC LIMIT $lstart,$lend"; 

		$total = $tot->num_rows(); 
   
		$result = $this->db->query($sql)->result();     
   
		return array('get_staffmem'=>$result,'total'=>$total);  

	}
	 public function update_user_feedback()
    {
    	$LoginUserId = intval($this->input->post('LoginUserId'));
    	$logintime = intval($this->input->post('logintime'));

    	if($LoginUserId != '')
    	{
    		$user['Login_time'] = $logintime;
    		
    		$this->db->where('uid',$LoginUserId);
    		$this->db->update('tb_feed',$user);
			return array('err'=>'0','msg'=>'User FeedBack Updated Successfully');
    	}

    }
	
		public function Add_feedback()
	{
		
		$feedbackuserid = strip_tags($this->input->post('feedbackuserid'));
		$col['feedback'] = strip_tags($this->input->post('feedback'));
		$staffid = $this->session->userdata('staffid');
		$col['sid'] = $staffid;
		$col['userid'] = $feedbackuserid;

		
			if($this->db->insert('tb_feedback',$col))
			{
				return array('err'=>'0','msg'=>'success','Feedback Added Succesfully');
			}
			else
				return array('err'=>'1','msg'=>'Feedback Added Failed');
		
		/*else
			$this->db->where('fid',$fedebakId);
			$this->db->update('tb_feedback',$col);
			return $this->session->set_flashdata('success','Feedback Update Succesfully');*/

	}
	
 /////// Staff Models ends /////// 
 ////////add stones starts///////////////
 public function Add_Edit_Stone_Type1()
	{

		$StId = strip_tags($this->input->post('StoneId'));
		$stn=strip_tags($this->input->post('stonename'));
		$stp=strip_tags($this->input->post('stoneprice'));
		
		
		$col['stonename'] = $this->input->post('stonename');
		
		$col['stoneprice'] = $this->input->post('stoneprice');
		$col['DateTime'] = date('d-m-Y H:i:s');  
    
		if($StoneId == '')       
		{         
			if($this->db->insert('tb_stonetype',$col))        
			{ 
				return $this->session->set_flashdata('success','Stonetype Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Stonetype Added Failed');
		}
		else  
			$this->db->where('StoneId',$StoneId);    
			$this->db->update('tb_stonetype',$col);  
			return $this->session->set_flashdata('success','Stonetype Update Succesfully');

	}
	
		public function get_stonetype1($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from tb_stonetype"; 

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
	public function edit_stone1($eid)     
	{      
		return $this->db->query("select * from tb_stonetype where StoneId='$eid'")->row_array();
	} 
	public function del_stone1($eid)
	{
		return $this->db->query("delete from tb_stonetype where StoneId='$eid'"); 
	}  
	
 ////////add stones ends///////////////
 ////////Style & Model starts///////////////
 //////Add new Style & Model Starts //////
 public function Add_Edit_Style_Model()
	{
		$StyleModelId = strip_tags($this->input->post('StyleModelId'));
		$stylename=strip_tags($this->input->post('stylename'));
		$modelname=strip_tags($this->input->post('modelname'));
		//print_r($stn);
		//print_r($stp);
		//exit;
		$col['Style'] = $stylename;
		$col['Model'] = $modelname;
		//$col['DateTime'] = date('d-m-Y H:i:s');  
    
			if($this->db->insert('tb_style_model',$col))        
			{ 
				return $this->session->set_flashdata('success','Style & Model Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Style & Model Added Failed');

	}
	//////Adding new style & Model Ends///////
	
	//////Adding new  Model to Stone Starts///////
	 public function Add_Edit_Model()
	{
		$StyleId = strip_tags($this->input->post('StyleId'));
		$stn=strip_tags($this->input->post('style'));
		$stm=strip_tags($this->input->post('model'));
		//print_r($stn);
		//print_r($stp);
		//exit;
		
		$col['Style'] = $stn;
		$col['Model'] = $stm; 
		//$col['DateTime'] = date('d-m-Y H:i:s');  
		
		if($StyleId == '')       
		{         
			if($this->db->insert('tb_style_model',$col))        
			{ 
				return $this->session->set_flashdata('success','Model for Style Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Model for Style Added Failed');
		}
		else  
			$this->db->where('id',$StyleId);    
			$this->db->update('tb_style_model',$col);  
			return $this->session->set_flashdata('success','Model for Style Update Succesfully');

	}
	//////Adding new model to stone ends /////
	
	public function get_stylemodel($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from tb_style_model"; 

		if($skey!='')
			$sql.=" where Style LIKE '%$skey%'";

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
 
		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY id order by id DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();
  
		$result = $this->db->query($sql)->result(); 

		return array('get_stylemodel'=>$result,'total'=>$total);

	}
	
	public function edit_stylemodel($eid)     
	{      
		return $this->db->query("select * from tb_style_model where id='$eid'")->row_array();
	} 
	public function del_stylemodel($eid)
	{
		return $this->db->query("delete from tb_style_model where id='$eid'"); 
	}
	
	public function getstyles()
	{
		return $this->db->query("select * from tb_style_model group by Style")->result_array();
	}
	
	
	//For adding new styles & Models /////
 	
 ////////style & Model ends///////////////
 ////////add weight starts///////////////
 public function Add_Edit_Weight()
	{

		$wtId = strip_tags($this->input->post('WeightId'));
		$min=strip_tags($this->input->post('minweight'));
		$max=strip_tags($this->input->post('maxweight'));
		
		
		$col['min'] = $min;
		$col['max'] = $max;
		//$col['DateTime'] = date('d-m-Y H:i:s');  
    
		if($wtId == '')       
		{         
			if($this->db->insert('weightchart',$col))        
			{ 
				return $this->session->set_flashdata('success','Stonetype Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','Stonetype Added Failed');
		}
		else  
			$this->db->where('$wtId',$StoneId);    
			$this->db->update('weightchart',$col);  
			return $this->session->set_flashdata('success','Stonetype Update Succesfully');

	}
	
		public function get_weight($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from weightchart"; 

		if($skey!='')
			$sql.=" where min LIKE '%$skey%'";

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
 
		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY id order by id DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();
  
		$result = $this->db->query($sql)->result(); 

		return array('get_weight'=>$result,'total'=>$total);

	}  
	public function edit_weight($eid)     
	{      
		return $this->db->query("select * from weightchart where id='$eid'")->row_array();
	} 
	public function del_weight($eid)
	{
		return $this->db->query("delete from weightchart where id='$eid'"); 
	}  
	
 ////////add weights ends///////////////
 ///////////////FeedBack Back View Start///////////
	public function Add_Edit_feedback_view($id)
	{
		$fbid = strip_tags($this->input->post('fbid'));
		$name=strip_tags($this->input->post('name'));
		$fback=strip_tags($this->input->post('fback'));
		$remainder=strip_tags($this->input->post('remainder'));
		$staffid=$this->session->userdata('staffid');
		//print_r($stn);
		//print_r($stp);
		//exit;
		$col['staffid']=$staffid;
		$col['u_name'] = strip_tags($this->input->post('name'));
		$col['uid']=$id;
		$col['feedback'] = strip_tags($this->input->post('fback'));
		$col['remainder']=$remainder;
		$col['date'] = date('d-m-Y H:i:s');  
    
		if($fbid == '')       
		{         
			if($this->db->insert('tb_feedback_view',$col))        
			{ 
				return $this->session->set_flashdata('success','FeedBack Added Succesfully');
			} 
			else
				return $this->session->set_flashdata('error','FeedBack Added Failed');
		}
		else  
			$this->db->where('fbid',$fbid);    
			$this->db->update('tb_feedback_view',$col);  
			return $this->session->set_flashdata('success','FeedBack Update Succesfully');

	}
	
		public function get_fbview($page='',$skey='',$id)
	{
		
		$lstart = (intval($page)-1);
		$lend = 10;

		$page = trim($page);
		$skey = trim($skey);
		$fid = trim($id);

		$sql = "select *,b.* from tb_feedback_view  inner join tb_staff as b on  tb_feedback_view.staffid=b.staffid where uid='$fid'"; 
	

		if($skey!='')
			$sql.=" where u_name LIKE '%$skey%'";

		$finalsql = $sql; 
		$tot = $this->db->query($finalsql);  
 
		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY fbid order by fbid DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();
  
		$result = $this->db->query($sql)->result(); 

		return array('get_fbview'=>$result,'total'=>$total);

	}  
	public function edit_get_fbview($eid)     
	{      
		return $this->db->query("select * from tb_feedback_view where fbid='$eid'")->row_array();
	} 
	public function del_get_fbview($eid)
	{
		return $this->db->query("delete from tb_feedback_view where fbid='$eid'"); 
	} 	
///////////////FeedBack Back View Ends///////////	
	
	
    public function GetMaxAmount()
	 {
		 return $this->db->query("select MAX(TotalPrice) as price from tb_products")->row_array(); 
	 }
 /////////////Forgot Password starts///////////////////
 	public function get_fmobile_number()
    {
        $mobile = $this->input->post('mobile');
        
        $result =  $this->db->query("SELECT * FROM user_register WHERE number = '$mobile'")->row_array();
        if($result){
              $otp = substr(time(), 4); 
            $message = "".$otp." is your verification code for forgot password.";
            if($this->send_smsforgot($mobile,$message)){
                $this->session->set_userdata('otp',$otp,time()+2);
                $this->session->set_userdata('Mobile',$mobile,time()+2);
                return array('err'=>'0');
            }else{
            return  array('err'=>'1','msg'=>'Please Enter valid mobile number');
           
        }
       
        }else {
             return  array('err'=>'1','msg'=>'Please Enter valid mobile number');
        }
    }
    public function get_fmobile_number1()
    {
        $mobile = $this->input->post('mobile');
        
        $result =  $this->db->query("SELECT * FROM user_register WHERE number = '$mobile'")->row_array();
        if($result){
             
                return array('err'=>'0');
            }
            else{
            return  array('err'=>'1','msg'=>'Please Enter valid mobile number');
        }
      
    }
    
     	public function sendrequest()
    {
        
        $mobile = $this->input->post('mobile');
            
            $col['reaccess'] = 1;
            $this->db->where('number',$mobile);
            $this->db->update('user_register',$col); 
            
            $message1='user with registered mobile number '.$mobile.' raised a webpage access request to Premraj Shantilal Jain Jewellery. Thank you.';
	 	    
	 	    $msg1=urlencode($message1);
	 	    
			
			$ret1=file_get_contents("http://203.212.70.200//smpp/sendsms?username=skybellnewapi&password=skybell@123&to=8187851087&udh=0&from=SKYBEL&text=".$msg1);
            
            if($ret1)
            {
                return array('err'=>'0');  
            }
            else
            {
                return array('err'=>'1','msg'=>'Request Failed..Please Try Again Later..!');
            }
         
          
    }
	
	 	public function forgot_Pwd()
    {
        $otp1 = $this->session->userdata('otp');
        $mb = $this->session->userdata('Mobile');
        $otp = $this->input->post('otp');
        $npw = $this->input->post('npwd');
         if($otp == $otp1){
             $col['password'] = $npw;
             $col['password'] = password_hash($npw,PASSWORD_DEFAULT);
             $this->db->where('number',$mb);
             $this->db->update('user_register',$col); 
            return array('err'=>'0');  
         }else{
              return array('err'=>'1','msg'=>'Invalid otp Please try again..!'); 
         }
          
    }
	
	    	public function send_smsforgot($mobile,$message)
	{
		$username = 'skybellnewapi'; 
		$password = 'skybell@123';
		$api_id   = 'SKYBEL'; 
		$url      = 'http://203.212.70.200//smpp/sendsms';
		$urlf = $url.'?username='.$username.'&password='.$password.'&to='.$mobile.'&from='.'SKYBEL'.'&text=' .urlencode($message);
         
		////http://203.212.70.200//smpp/sendsms?username=skybellnewapi&password=skybell@123&to=9966147077&udh=0&from=SKYBEL&text=test
		 
		 
		 
        $r =  file_get_contents($urlf);
        $res = substr($r[0], 0, 2);
        return  $res;
	} 
	
 
 /////////////Forgot Password Ends///////////////////
 //////// Stone Model Starts ///////
 ///////////////stone Category starts ////////////////////
 public function Add_Edit_Stone_cat()
	{
		$stcatid = strip_tags($this->input->post('stcatid'));
		
		$col['stcatname'] = strip_tags($this->input->post('stcatname'));
		$col['Status'] = intval($this->input->post('Status'));
		$col['Sort'] = intval($this->input->post('sort'));
		//$col['Date'] = date('d-m-Y');
		$col['DateTime'] = date('d-m-Y H:i:s');

		if($stcatid == '')
		{
			if($this->db->insert('tb_stonecat',$col))
			{
				return $this->session->set_flashdata('success','Stone Category Added Succesfully');
			}
			else
				return $this->session->set_flashdata('error','Stone Category Added Failed');
		}
		else
			$this->db->where('stcatid',$stcatid);
			$this->db->update('tb_stonecat',$col);
			return $this->session->set_flashdata('success','Stone Category Update Succesfully');

	}
	 public function Add_Edit_Stone_subcat()
	{
		$stsubcatid = trim($this->input->post('stsubcatid'));
		$col['parentcat'] = trim($this->input->post('stcatname1'));
		$col['stsubcatname'] = trim($this->input->post('stsubcatname'));
		$col['DateTime'] = date('d-m-Y H:i:s');

		if($stsubcatid == '')
		{
		
			if($this->db->insert('tb_stonesubcat',$col))
			{
				return $this->session->set_flashdata('success','Stone Sub Category Added Succesfully');
			}
			else
				return $this->session->set_flashdata('error','Stone Sub Category Added Failed');
		}
		else
			$this->db->where('stsubcatid',$stsubcatid);
			$this->db->update('tb_stonesubcat',$col);
			return $this->session->set_flashdata('success','Stone Sub Category Update Succesfully');

	}
	
	 public function Add_Edit_Stone_color()
	{
		$Scid = strip_tags($this->input->post('Scid'));
		$col['stonecolor'] = strip_tags($this->input->post('stcolor'));
		$col['stoneclarity'] = strip_tags($this->input->post('stclarity'));
		$col['stonecut'] = strip_tags($this->input->post('stcut'));
		$col['stonepolish'] = strip_tags($this->input->post('stpolish'));
		$col['DateTime'] = date('d-m-Y H:i:s');

		if($Scid == '')
		{
		
			if($this->db->insert('tb_stcolors',$col))
			{
				return $this->session->set_flashdata('success','Stone Colors Added Succesfully');
			}
			else
				return $this->session->set_flashdata('error','Stone Colors Added Failed');
		}
		else
			$this->db->where('Scid',$Scid);
			$this->db->update('tb_stcolors',$col);
			return $this->session->set_flashdata('success','Stone Colors Update Succesfully');

	}
		
	 public function Add_Edit_Stone_final()
	{
		$Fsid = strip_tags($this->input->post('Fsid'));
		$col['ParentCat'] = trim($this->input->post('stoneparent'));
		$col['StnName'] = strip_tags($this->input->post('stonename'));
		//$col['StnName'] = trim("Ruby");
		$col['StnColor'] = trim($this->input->post('stoneclrs'));
		$col['StnPolish'] = trim($this->input->post('stoneplsh'));
		$col['StnCut'] = trim($this->input->post('stonecut'));
		$col['StnClarity'] = trim($this->input->post('stoneclrty'));
		$col['StnPrice'] = trim($this->input->post('stoneprice'));
		$col['DateTime'] = date('d-m-Y H:i:s');

		if($Fsid == '')
		{
		
			if($this->db->insert('tb_stone_final',$col))
			{
				return $this->session->set_flashdata('success','Stone Added Succesfully');
			}
			else
				return $this->session->set_flashdata('error','Stone Added Failed');
		}
		else
			$this->db->where('Fsid',$Fsid);
			$this->db->update('tb_stone_final',$col);
			return $this->session->set_flashdata('success','Stone Update Succesfully');

	}
	///////////getting 
	public function get_stone_categories($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;
		if($lstart!=0)
      {
	  $lstart=$lstart*10;
	  }

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from tb_stonecat";

		if($skey!='')
			$sql.=" where stcatname LIKE '%$skey%'";

		$finalsql = $sql;
		$tot = $this->db->query($finalsql);

		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY stcatid order by stcatid DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();

		$result = $this->db->query($sql)->result();

		return array('get_stonetypecat'=>$result,'total'=>$total);

	}
	public function get_finalstone($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;
		if($lstart!=0)
      {
	  $lstart=$lstart*10;
	  }

		$page = trim($page);
		$skey = trim($skey);

		$sql = "select * from tb_stone_final";

		if($skey!='')
			$sql.=" where ParentCat LIKE '%$skey%'";

		$finalsql = $sql;
		$tot = $this->db->query($finalsql);

		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY Fsid order by Fsid DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();

		$result = $this->db->query($sql)->result();

		return array('get_finalstones'=>$result,'total'=>$total);

	}
	public function get_stone_subcategories($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;
			if($lstart!=0)
      {
	  $lstart=$lstart*10;
	  }

		$page = trim($page);
		$skey = trim($skey);

		//$sql = "select * from tb_stonesubcat";
		$sql="select a.*,b.* from tb_stonecat as a inner join tb_stonesubcat as b on a.stcatid=b.parentcat";

		if($skey!='')
			$sql.=" where b.stsubcatname LIKE '%$skey%'";

		$finalsql = $sql;
		$tot = $this->db->query($finalsql);

		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY b.stsubcatid order by b.stsubcatid DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();

		$result = $this->db->query($sql)->result();

		return array('get_stonetypesubcat'=>$result,'total'=>$total);

	}
	public function get_stone_colors($page='',$skey='')
	{
		$lstart = (intval($page)-1);
		$lend = 10;
         	if($lstart!=0)
      {
	  $lstart=$lstart*10;
	  }
		$page = trim($page);
		$skey = trim($skey);
		
		$sql="select * from tb_stcolors ";

		if($skey!='')
			$sql.=" where stonecolor LIKE '%$skey%'";

		$finalsql = $sql;
		$tot = $this->db->query($finalsql);

		if($lstart < 0)
			$lstart = '0';
		$sql.= " GROUP BY Scid order by Scid DESC LIMIT $lstart,$lend";

		$total = $tot->num_rows();

		$result = $this->db->query($sql)->result();

		return array('get_stonecolor'=>$result,'total'=>$total);

	}
	///////////Edit section starts/////////////
	public function edit_stonecategory($eid)
	{
		return $this->db->query("select * from tb_stonecat where stcatid='$eid'")->row_array();
	}
	public function edit_stonesubcategory($eid)
	{
		return $this->db->query("select * from tb_stonesubcat where stsubcatid='$eid'")->row_array();
	}
	public function edit_stonecolors($eid)
	{
		return $this->db->query("select * from tb_stcolors where Scid='$eid'")->row_array();
	}
	public function edit_finalstone($eid)
	{
		return $this->db->query("select * from tb_stone_final where Fsid='$eid'")->row_array();
	}
	///////edit section ends/////////////
public function get_stone_categories_select()
	{
		return $this->db->query("select * from tb_stonecat")->result_array();
	}
	public function get_stone_clrs_select()
	{
		return $this->db->query("select * from tb_stcolors")->result_array();
	}
	
 
 
 ////delete stones section starts/////////
 public function del_stone_cat($eid)   
	{  
		return $this->db->query("delete from tb_stonecat where stcatid='$eid'"); 
	} 
	 public function del_stone_subcat($eid)   
	{  
		return $this->db->query("delete from tb_stonesubcat where stsubcatid='$eid'"); 
	}
	 public function del_stone_colors($eid)   
	{  
		return $this->db->query("delete from tb_stcolors where Scid='$eid'"); 
	}
     public function del_finalstone($eid)   
	{  
		return $this->db->query("delete from tb_stone_final where Fsid='$eid'"); 
	}
	
	
	public function get_stone_name($id) 
	{
		return $this->db->query("SELECT a.*,b.* FROM tb_stonesubcat as a INNER JOIN tb_stonecat as b on a.parentcat=b.stcatid where b.stcatname='$id' group BY a.stsubcatname order by a.stsubcatid ASC")->result_array();
	}
	public function getstoneprice() 
	{
		$stoneparent = trim($this->input->post('stoneparent'));
		$stonename = strip_tags($this->input->post('stonename'));
		$stonecolor = trim($this->input->post('stonecolor'));
		$stoneclarity = trim($this->input->post('stoneclarity'));
		$stonecut = trim($this->input->post('stonecut'));
		$stonepolish = trim($this->input->post('stonepolish'));
		
		if($stoneparent)
		{
			if($stonename)
			{
				$sql="select * from tb_stone_final where ParentCat='$stoneparent' AND StnName='$stonename' ";
				if($stonecolor)
				{
					$sql.=" AND StnColor='$stonecolor' ";
				}
				if($stoneclarity)
				{
					$sql.=" AND StnClarity='$stoneclarity' ";
				}
				if($stonecut)
				{
					$sql.=" AND StnCut='$stonecut' ";
				}
				if($stonepolish)
				{
					$sql.=" AND StnPolish='$stonepolish' ";
				}
				$sql.="order by StnName limit 1";
				$finalsql=$sql;
				return $this->db->query($finalsql)->result_array();
			}
		}
				
	}
	
	public function getwastage() 
	{
		$parent = trim($this->input->post('parent'));
		$subcategory = strip_tags($this->input->post('subcategory'));
		$style = trim($this->input->post('style'));
		$model = trim($this->input->post('model'));
		$purity = trim($this->input->post('purity'));
		$goldweight = trim($this->input->post('goldweight'));
		
		if($parent)
		{
			if($subcategory)
			{
				$getsub=$this->db->query("select * from subcategory where subcategory_name_id='$subcategory' AND ParentCategory='$parent' ")->row_array();
				$subcategory=$getsub['Title'];
		
				$sql="select * from makingcharges where parentcategoryid='$parent' AND subcategoryid='$subcategory' ";
						
				if($style)
				{
					$sql.=" AND Style='$style' ";
				}
				if($model)
				{
					$sql.=" AND Model='$model' ";
				}
				if($purity)
				{
					$getpurity=$this->db->query("select * from goldrate where GoldRateId='$purity' ")->row_array();
					$purity=$getpurity['GoldCaret'];

					$sql.=" AND purity='$purity' ";
				}
				if($goldweight)
				{
					$sql.=" AND minwt<='$goldweight' and maxwt>='$goldweight' ";
				}
				$sql.="limit 1";
				$finalsql=$sql;
				return $this->db->query($finalsql)->result_array();
			}
		}
				
	}
 //////delete stones Section ens//////
 ///////////////stone Category Ends ////////////////////
 
 
}

?>