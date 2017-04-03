<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
$userTemp = $_SESSION['username'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Admin Panel</title>
		<link rel="shortcut icon" href="../image/favicon.ico">
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen">
		<link id="color" rel="stylesheet" type="text/css" href="../css/blue.css">
		<!-- scripts (jquery) -->
		<script src="../js/jquery-1.6.4.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="../resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="../js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="../js/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="../js/jquery.flot.min.js" type="text/javascript"></script>
		<script src="../js/tiny_mce.js" type="text/javascript"></script>
		<script src="../js/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="../js/smooth.js" type="text/javascript"></script>
		<script src="../js/smooth.menu.js" type="text/javascript"></script>
		<script src="../js/smooth.chart.js" type="text/javascript"></script>
		<script src="../js/smooth.table.js" type="text/javascript"></script>
		<script src="../js/smooth.form.js" type="text/javascript"></script>
		<script src="../js/smooth.dialog.js" type="text/javascript"></script>
		<script src="../js/smooth.autocomplete.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "resources/css/colors";

				$("#date-picker").datepicker();

				$("#box-tabs, #box-left-tabs").tabs();
			});
		</script>
        <script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}
</script>
<link rel="stylesheet" href="../css/ui.css"></head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               
            });
            function sendPushNotification(id){
                var data = $('form#'+id).serialize();
                $('form#'+id).unbind('submit');                
                $.ajax({
                    url: "send_message_processor.php",
                    type: 'GET',
                    data: data,
                    beforeSend: function() {
                        
                    },
                    success: function(data, textStatus, xhr) {
                          $('.txt_message').val("");
						  alert("success");
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
                return false;
            }
        </script>
        <style type="text/css">
            .container{
                width: 950px;
                margin: 0 auto;
                padding: 0;
            }
            h1{
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                font-size: 24px;
                color: #777;
            }
            div.clear{
                clear: both;
            }
            ul.devices{
                margin: 0;
                padding: 0;
            }
            ul.devices li{
                float: left;
                list-style: none;
                border: 1px solid #dedede;
                padding: 10px;
                margin: 0 15px 25px 0;
                border-radius: 3px;
                -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
                -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                color: #555;
            }
            ul.devices li label, ul.devices li span{
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                font-size: 12px;
                font-style: normal;
                font-variant: normal;
                font-weight: bold;
                color: #393939;
                display: block;
                float: left;
            }
            ul.devices li label{
                height: 25px;
                width: 50px;                
            }
            ul.devices li textarea{
                float: left;
                resize: none;
            }
            ul.devices li .send_btn{
                background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#0096FF), to(#005DFF));
                background: -webkit-linear-gradient(0% 0%, 0% 100%, from(#0096FF), to(#005DFF));
                background: -moz-linear-gradient(center top, #0096FF, #005DFF);
                background: linear-gradient(#0096FF, #005DFF);
                text-shadow: 0 1px 0 rgba(0, 0, 0, 0.3);
                border-radius: 3px;
                color: #fff;
            }
        </style>


<body>
		
<div id="header">
			<!-- logo -->
			<div id="logo">
				<h1><a href="../index.php" title="BlackWallet Admin Panel"><img src="../image/logo.png" alt="BlackWallet Admin Panel"></a></h1>
			</div>
			<!-- end logo -->
			<!-- user -->
			<ul id="user">
				<!--<li class="first"><a href="">Account</a></li>
				<li><a href="">Messages (0)</a></li>-->
				<li><a href="../logout.php">Logout</a></li>
				<!--<li class="highlight last"><a href="">View Site</a></li>-->
			</ul>
			<!-- end user -->
			<div id="header-inner">
				<div id="home">
					<a href="../index.php" title="Home"></a>
				</div>
				<!-- quick -->
				<ul id="quick">
					<li>
						<a href="#" title="Products"><span class="normal">Client</span></a>
						<ul style="visibility: hidden;">
							<li><a href="../add_client.php">Add Client</a></li>
							<li><a href="../view_client.php">View Client</a></li>
							
						</ul>
					</li>
					<li>
						<a href="#" title="Products"><span class="icon"><img src="../image/application_double.png" alt="Products"></span><span>Result</span></a>
						<ul style="visibility: hidden;">
							<li><a href="../add_result.php">Add Result</a></li>
							<li><a href="../view_result.php">View Result</a></li>
							<!--<li>
								<a href="#" class="childs">Sales</a>
								<ul style="display: none;">
									<li><a href="">Today</a></li>
									<li><a href="">Yesterday</a></li>
									<li class="last">
										<a href="#" class="childs">Archive</a>
										<ul style="display: none;">
											<li><a href="">Last Week</a></li>
											<li class="last"><a href="">Last Month</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="last">
								<a href="#" class="childs">Offers</a>
								<ul style="display: none;">
									<li><a href="">Coupon Codes</a></li>
									<li class="last"><a href="">Rebates</a></li>
								</ul>
							</li>-->
						</ul>
					</li>
					<li>
						<a href="" title="Events"><span class="icon"><img src="../image/calendar.png" alt="Events"></span><span>Group</span></a>
						<ul style="visibility: hidden;">
							<li><a href="../add_group.php">Add Group</a></li>
							<li class="last"><a href="../view_group.php">View Group</a></li>
						</ul>
					</li>
					<!--li>
						<a href="" title="Pages"><span class="icon"><img src="../image/page_white_copy.png" alt="Pages"></span><span>Metal</span></a>
						<ul style="visibility: hidden;">
							<li><a href="../add_metal.php">Add Metal</a></li>
							<li><a href="../view_metal.php">View Metal</a></li>
						
						</ul>
					</li-->
					<li>
						<a href="" title="Links"><span class="icon"><img src="../image/world_link.png" alt="Links"></span><span>News</span></a>
						<ul style="visibility: hidden;">
							<li><a href="../add_news.php">Add News</a></li>
                            
							<li class="last"><a href="../view_news.php">View News</a></li>
						</ul>
					</li>


				<li>
						<a href="" title="Links"><span class="icon"><img src="../image/password_img.png" alt="Links"></span><span>Change Password</span></a>
						<ul style="visibility: hidden;">
							<li><a href="../change_password.php">Change Password</a></li>
                            
							
						</ul>
					</li>

					<!--<li>
						<a href="" title="Settings"><span class="icon"><img src="../image/cog.png" alt="Settings"></span><span>Settings</span></a>
						<ul style="visibility: hidden;">
							<li><a href="#">Manage Settings</a></li>
							<li class="last"><a href="#">New Setting</a></li>
						</ul>
					</li>-->
				</ul>
				<!-- end quick -->
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
		</div>
		<!-- end header -->
		<!-- content -->
		<div id="content">
			<!-- end content / left -->
			<div id="left">
				<div id="menu">
					<h6 id="h-menu-products" class="selected"><a href="#"><span></span>&nbsp;</a></h6>
					<ul id="menu-products" class="opened">
						<!--<li><a href="">Manage Products</a></li>
						<li class="selected"><a href="">Add Product</a></li>-->
						<li class="collapsible">
							<a href="#" class="collapsible plus">Client</a>
							<ul id="whatever" class="collapsed">
								<li><a href="../add_client.php">Add Client</a></li>
								<li><a href="../view_client.php">View Client</a></li>
								<!--<li class="collapsible last">
									<a href="#" class="collapsible plus">Archive</a>
									<ul class="collapsed">
										<li><a href="">Last Week</a></li>
										<li><a href="">Last Month</a></li>
									</ul>
								</li>-->
							</ul>
						</li>
						<li class="collapsible last">
							<a href="#" class="collapsible plus">Result</a>
							<ul class="collapsed">
								<li><a href="../add_result.php">Add Result</a></li>
								<li class="last"><a href="../view_result.php">View Result</a></li>
							</ul>
						</li>
                        <li class="collapsible last">
							<a href="#" class="collapsible plus">Group</a>
							<ul class="collapsed">
								<li><a href="../add_group.php">Add Group</a></li>
								<li class="last"><a href="../view_group.php">View Group</a></li>
							</ul>
						</li>
                        <!--li class="collapsible last">
							<a href="#" class="collapsible plus">Metal</a>
							<ul class="collapsed">
								<li><a href="../add_metal.php">Add Metal</a></li>
								<li class="last"><a href="../view_metal.php">View Metal</a></li>
							</ul>
						</li-->
                        <li class="collapsible last">
							<a href="#" class="collapsible plus">News</a>
							<ul class="collapsed">
								<li><a href="../add_news.php">Add News</a></li>
								<li class="last"><a href="../view_news.php">View Group</a></li>
							</ul>
						</li>


                        <li class="collapsible last">
							<a href="#" class="collapsible plus">Change Password</a>
							<ul class="collapsed">
								<li><a href="../change_password.php">Change Password</a></li>
								
							</ul>
						</li>
					</ul>
					<!--h6 id="h-menu-pages"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-pages" class="closed">
						<li><a href="">Manage Pages</a></li>
						<li><a href="">New Page</a></li>
						<li class="collapsible last">
							<a href="#" class="plus">Help</a>
							<ul class="collapsed">
								<li><a href="">How to Add a New Page</a></li>
								<li class="last"><a href="">How to Add a New Page</a></li>
							</ul>
						</li>
					</ul>
					<h6 id="h-menu-events"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-events" class="closed">
						<li><a href="">Manage Events</a></li>
						<li class="last"><a href="">New Event</a></li>
					</ul>
					<h6 id="h-menu-links"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-links" class="closed">
						<li><a href="">Manage Links</a></li>
						<li class="last"><a href="">Add Link</a></li>
					</ul>
					<h6 id="h-menu-settings"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-settings" class="closed">
						<li><a href="">Manage Settings</a></li>
						<li class="last"><a href="">New Setting</a></li>
					</ul-->
				</div>
				</div>
			<!-- end content / left -->
			<!-- content / right -->
			<div id="right">
				<!-- table -->
				<div class="box">
					<!-- box / title -->
					<div class="title">
						<h5>&nbsp;</h5>
						
							
						
					</div>
					<div>
					
						<?php
							include_once './db_functions.php';
							error_reporting(E_ALL);
							$db = new DB_Functions();
							if(isset($_GET['uid'])){
							$users = $db->getUserByUID($_GET['uid']);
							if ($users != false)
								$no_of_users = mysql_num_rows($users);
							}else
								$no_of_users = 0;
							
						?>
						<div class="container">
							<h1>No of Devices Registered: <?php echo $no_of_users; ?></h1>
							<hr/>
							<ul class="devices">
								<?php
								if ($no_of_users > 0) {
									?>
									<?php
									while ($row = mysql_fetch_array($users)) {
										?>
										<li>
											<form id="<?php echo $row["id"] ?>" name="" method="post" onsubmit="return sendPushNotification('<?php echo $row["id"] ?>')">
												<label>Name: </label> <span><?php echo $row["name"] ?></span>
												<div class="clear"></div>
												<div class="send_container">                                
													<textarea rows="3" name="message" cols="25" class="txt_message" placeholder="Type message here"></textarea>
													<input type="hidden" name="regId" value="<?php echo $row["gcm_regid"] ?>"/>
													<input type="submit" class="send_btn" value="Send" onclick=""/>
												</div>
											</form>
										</li>
									<?php }
								} else { ?> 
									<li>
										No Users Registered Yet!
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<!-- end table -->
				
				</body></html>