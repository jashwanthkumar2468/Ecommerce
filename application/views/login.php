<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Arasari Studio">
    <title>PREM LAL</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('frontendassets');?>/images/plogo.png">
    <link href="<?php echo base_url('loginassets');?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('loginassets');?>/css/common.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
<link href="<?php echo base_url('loginassets');?>/css/theme-07.css" rel="stylesheet">
<style>
  
	/*-- bootstrap-pop-up --*/
.modal-header {
    font-size: 2em;
    color: #fff;
    height:70px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
    /*background: #339eae;*/
    background:black;
}
.close {
    opacity: 1;
}
.modal-body p {
    color: #999;
    text-align: left;
	/*padding:2em 2em 1em;*/
	margin: 0 !important;
	line-height:2em;
}
.modal-body p i {
    display: block;
    margin: 1em 0;
    color: #212121;
}
.modal-body {
    padding:0;
}
.modal-content {
    border-radius: 0;
}
button.close {
    font-size: 1.5em;
    color:#0490b5;
	outline: none;
}
#forgotbtns{
    background-color: #000000;
    
    color: white;
}
.modal-title{
    color:white;
}


/*-- //bootstrap-pop-up --*/


</style>
    



</head>
<body>
    <div class="forny-container"> 
<div class="forny-inner">
    <div class="forny-two-pane">
        <div>
            <div class="forny-form">
                <!--<div class="mb-8 forny-logo">-->
                <!--    <img src="<?php echo base_url('loginassets');?>/img/logo-07.svg">-->
                <!--</div>-->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active bg-transparent" href="#login" data-toggle="tab" role="tab">
                            <span>Login</span>
                        </a>
                    </li>
                   
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" role="tabpanel" id="login">
                        <p class="mt-6 mb-6">
                            Use your credentials to login into account.
                        </p>
                        <form  id="InstallationAddForm_E1" onsubmit="return false;" method="post">
	
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
    <g transform="translate(0)">
        <path d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z" transform="translate(0 -100.445)"/>
    </g>
</svg>
                </span>
            </div>
    <input required  class="form-control" name="email1" id="email2"
    placeholder="Email Address">
        </div>
    </div> 
    <div class="form-group password-field">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24">
    <g transform="translate(0)">
        <g transform="translate(5.457 12.224)">
            <path d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z" transform="translate(-205.191 -276.673)"/>
        </g>
        <path d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z" transform="translate(-70.11)"/>
    </g> 
</svg>
                </span>
            </div>
    <input required  class="form-control" name="pwd1" id="pwd2" type="password"
    placeholder="Password">
            <div class="input-group-append cursor-pointer">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
    <g transform="translate(0 0)">
        <g transform="translate(0 0)">
            <path d="M23.609,117.568a15.656,15.656,0,0,0-5.045-4.859,12.823,12.823,0,0,0-6.38-1.811c-.062,0-.309,0-.371,0a12.823,12.823,0,0,0-6.38,1.811,15.656,15.656,0,0,0-5.045,4.859,2.464,2.464,0,0,0,0,2.658,15.656,15.656,0,0,0,5.045,4.859,12.822,12.822,0,0,0,6.38,1.811c.062,0,.309,0,.371,0a12.823,12.823,0,0,0,6.38-1.811,15.656,15.656,0,0,0,5.045-4.859A2.464,2.464,0,0,0,23.609,117.568Zm-17.74,6.489a14.622,14.622,0,0,1-4.712-4.538,1.155,1.155,0,0,1,0-1.245,14.621,14.621,0,0,1,4.712-4.538,12.747,12.747,0,0,1,1.586-.79,8.964,8.964,0,0,0,0,11.9A12.748,12.748,0,0,1,5.869,124.057ZM12,125.75c-3.213,0-5.827-3.074-5.827-6.853s2.614-6.853,5.827-6.853,5.827,3.074,5.827,6.853S15.211,125.75,12,125.75Zm10.841-6.23a14.621,14.621,0,0,1-4.712,4.538,12.737,12.737,0,0,1-1.585.788,8.964,8.964,0,0,0,0-11.9,12.74,12.74,0,0,1,1.587.791,14.622,14.622,0,0,1,4.712,4.538A1.155,1.155,0,0,1,22.839,119.52Z" transform="translate(0.002 -110.897)"/>
        </g>
        <g transform="translate(9.565 5.565)">
            <path d="M205.24,202.8a2.435,2.435,0,1,0,2.435,2.435A2.438,2.438,0,0,0,205.24,202.8Zm0,3.917a1.482,1.482,0,1,1,1.482-1.482A1.483,1.483,0,0,1,205.24,206.721Z" transform="translate(-202.805 -202.804)"/>
        </g>
    </g>
</svg>
                </span>
            </div>
        </div>
    </div>
                            <div class="row mt-10">
                                <div class="col-6">
								<input type="hidden" name="Add_Editors1" value="true"/>
                                    <button id="SubmitBtn2"class="btn btn-primary btn-block">Login</button>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <!---<a href="#">Forgot password?</a>--->
                                     <a id="myModal" data-target="#myModal1" data-toggle="modal" class="pull-right" style="cursor:pointer">Forgot Password?</a>
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-end mt-5" >
                                    <!---<a href="#">Forgot password?</a>--->
                                    Already visited... <a id="myModal" data-target="#myModal2" data-toggle="modal" class="pull-right" style="cursor:pointer;color:blue;">Click</a> To Raise access request..
                                    
                                    
                                </div>
                            </div>
    <!--                        <div class="mt-10 mb-4 text-center">-->
    <!--                            <div class="d-block text-center mb-2 text-sm">-->
    <!--                                or login with-->
    <!--                            </div>-->
    <!--<button type="button" class="btn btn-social btn-block btn-facebook">-->
    <!--    Facebook-->
    <!--</button>-->
    <!--<button type="button" class="btn btn-social btn-block btn-google">-->
    <!--    Google-->
    <!--</button>-->
    <!--<button type="button" class="btn btn-social btn-block btn-twitter">-->
    <!--    Twitter-->
    <!--</button>-->
    <!--                        </div>-->
                        </form>
                        <!--------modal starts-------->
						               <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" style="padding:2px;color:white;margin-left:-10px;"class="close" data-dismiss="modal">&times;</button>
          <span class="modal-title" style="color:white;font-size: 20px;font-weight:100">Forgot Password</span>
        </div>
        <div class="modal-body">
           <div class="col-md-12">
            <h3 class="agileinfo_sign"></h3>
            <form action="" method="post" onsubmit="return false;" id="forgformid">
                                  
    <div class="form-group">
    <label for="email">Register Mobile Number:</label>
    <input type="text" class="form-control" id="rmobile" name="rmobile">
     <span id="fmobile_err" class="error"></span>
  </div>
    <input type="submit" value="Submit" id="forgotbtns" name="forgotbtns" style="margin-bottom:5px;">  
                </form>
                
    <div class="otpf" id="otpf" style="display:none">
	
	
	
     <form action="" method="post" onsubmit="return false;">
                                  
    <div class="form-group">
    <label for="email">Enter otp:</label>
    <input type="text" class="form-control" id="otpj" name="otpj">
    <input type="hidden" name="otpc" value='' id="otpc">
     <span id="fotp_err" class="error"></span>
  </div>
                                
    <div class="form-group">
    <label for="email">New Password:</label>
    <input type="password" class="form-control" id="npassword" name="npassword">
     <span id="fnpwd_err" class="error"></span>
  </div>
                                 
    <div class="form-group">
    <label for="email">Confirm New Password:</label>
    <input type="password" class="form-control" id="cnpassword" name="cnpassword">
     <span id="fcnpwd_err" class="error"></span>
  </div>
    <input type="submit" value="Submit" id="resetbtns" style="background: black;
    color: white;"name="resetbtns">  
                </form>
                </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="background-color:black;color:white;padding:5px"data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
						
						
						<!------modal ends here---->
                        <!-------- access modal starts-------->
    <div class="modal fade" id="myModal2" role="dialog" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" style="padding:2px;color:white;margin-left:-10px;"class="close" data-dismiss="modal">&times;</button>
                    <span class="modal-title" style="color:white;font-size: 20px;font-weight:100">Access Permission</span>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <h3 class="agileinfo_sign"></h3>
                           
                                <div class="form-group">
                                    <label for="email">Register Mobile Number:</label>
                                    <input type="text" class="form-control" id="regmobile" name="regmobile">
                                    <span id="fmobile_err" class="error"></span>
                                </div>
                                <button id="accesstimebtn" style="margin-bottom:5px;">  Submit </button>
                            
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" style="background-color:black;color:white;padding:5px"data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
						
						
						<!------access modal ends here---->
                        
                        
                        
                        
                        
                    </div>
                  
                </div>
            </div> 
        </div>
        <div></div>
    </div>
</div>
    </div>
    <script src="<?php echo base_url('loginassets');?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url('loginassets');?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('loginassets');?>/js/main.js"></script>
    <script src="<?php echo base_url('loginassets');?>/js/demo.js"></script>
    
    	<script>
	 $('#resetbtns').click(function(){
        var invalid = '';
       
        var otp = $.trim($('#otpj').val());
        var npwd = $.trim($('#npassword').val());
        var cnpwd = $.trim($('#cnpassword').val());

      
        if(otp == '')
        {
            invalid = 1;
            $('#fotp_err').html('<p>Please Enter a OTP</p>');
        }
        else
            $('#fotp_err').html('');
        if(npwd == '')
        {
            invalid = 1;
            $('#fnpwd_err').html('<p>Please Enter New Password</p>');
        }
        else
            $('#fnpwd_err').html('');
        if(cnpwd == '')
        {
            invalid = 1;
            $('#fcnpwd_err').html('<p>Please Enter Confirm Password</p>');
        }
        else
            $('#fcnpwd_err').html('');
       
        if(invalid == '')
        {
            if(npwd == cnpwd)
            {
                $.ajax({
                    url:"",
                    method:"POST",
                    data:{'fpwd_user':true,'otp':otp,'npwd':npwd},
                    success:function(data)
                    {
                        var data = $.parseJSON(data);
                        if(data.err == '0')
                        {
                            
                            alert('Password Updated Success');
                           window.location.reload();
                        }
                        else
                            alert(''+data.msg);
                    },
                    error:function(data)
                    {
                        alert('Network Error');
                    }

                });
            }
           
        }
    });
	
	
	
	$('#forgotbtns').click(function(){
        var invalid = '';
       
        var mobile = $.trim($('#rmobile').val());
     

      
        if(mobile == '')
        {
            invalid = 1;
            $('#fmobile_err').html('<p>Please Enter a Valid Mobile Number</p>');
        }
        else
            $('#fmobile_err').html('');
       
        if(invalid == '')
        {
            
                $.ajax({
                    url:"",
                    method:"POST",
                    data:{'rmobile_user':true,'mobile':mobile},
                    success:function(data)
                    {
                        var data = $.parseJSON(data);
                        if(data.err == '0')
                        {
                            var notp = data.otpfor;
                            alert('OTP sent to your register mobile number');
                           $('#otpf').show();
                           $('#forgformid').hide();
                           $('#otpc').val(notp);
                        }
                        else if(data.err == '1')
                        {
                            //alert(''+data.msg);
                            alert("Enter Correct Registered Mobile Number")
                        }
                    },
                    error:function(data)
                    {
                        alert('Network Error');
                    }

                });
            
           
        }
    });
    
    $('#accesstimebtn').click(function(){
        
        var invalid = '';
       
        var mobile = $.trim($('#regmobile').val());
     
alert(mobile);
      
        if(mobile == '')
        {
            invalid = 1;
            alert("Please Enter Registered Mobile Number");
        }
        
        if(invalid == '')
        {
            
                $.ajax({
                    url:"",
                    method:"POST",
                    data:{'reqmobile_user':true,'mobile':mobile},
                    success:function(data)
                    {
                        var data = $.parseJSON(data);
                        if(data.err == '0')
                        {
                            
                            raiserequest(mobile);
                        }
                        else if(data.err == '1')
                        {
                            //alert(''+data.msg);
                            alert("Enter Correct Registered Mobile Number")
                        }
                    },
                    error:function(data)
                    {
                        alert('Network Error');
                    }

                });
            
           
        }
    });
    
    function raiserequest(id)
    {
         $.ajax({
                    url:"",
                    method:"POST",
                    data:{'sendrequest':true,'mobile':id},
                    success:function(data)
                    {
                        var data = $.parseJSON(data);
                        if(data.err == '0')
                        {
                            
                            alert('Request sent Successfully');
                           window.location.reload();                        }
                        else if(data.err == '1')
                        {
                            //alert(''+data.msg);
                            alert("Enter Correct Registered Mobile Number")
                        }
                    },
                    error:function(data)
                    {
                        alert('Network Error');
                    }

                });
        
    }
	
	///accesstimebtn
	</script>
	
	
	<script>
var base_url = "<?php echo base_url(); ?>"; 
$('#SubmitBtn2').click(function(){
		loginclick();
	}); 
function loginclick(){
  
        var email1 = $.trim($('#email2').val()); 
        var pwd1  = $.trim($('#pwd2').val()); 
	    	var invalid1 = '';
        if(email1 == '')
    	{
    		invalid1 = 1;
    		$('#email1 ').css('border-color','red');
    	}
	else
		$('#email1 ').css('border-color',''); 
	
	if(pwd1 == '')
	{
		invalid1 = 1;
		$('#pwd1').css('border-color','red');
	}
	else
		$('#pwd1').css('border-color',''); 
	
	if(invalid1=='') 
	{
        $.ajax({
          url:"",
          type:"POST",
          data:{'Login':'true','email1':email1,'pwd1':pwd1},
		 
          success:function(data)
          { 
		
            if(data==1)
            {
              
              setTimeout(function(){window.location.href = 'Welcome/UserProducts';},1000);
            }
            else 
            {
               if(data==2)
            {
				alert("You are already visited this site");
				$('#myModal2').modal('show');
			}
			
			else
			{
				if(data==3)
            {
				alert("You Are Not Authorized");
			}
			else
			{
				alert("login failed");
			  
            }
          }
		  }
		  }
        });
	}
      
}
   
 
</script>

</body>
</html>