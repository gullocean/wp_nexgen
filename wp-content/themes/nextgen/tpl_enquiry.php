<?php 
// Template Name: Template - Enquiry
get_header();
?>
<script type="text/javascript">
function enquiryForm()
{
var fullName=document.forms["enquiry1"]["name"].value;
if (fullName==null || fullName=="")
  {
  alert("Please Enter Name");
document.forms["enquiry1"]["name"].focus();  
  return false;
  }
  
var email=document.forms["enquiry1"]["email"].value;
if (email==""){
 alert("Please Enter Email Address");
 document.forms["enquiry1"]["email"].focus(); 
  return false;
}  
var x=document.forms["enquiry1"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
 alert("Not a valid e-mail address");
 document.forms["enquiry1"]["email"].focus(); 
  return false;
  }
  
var pno=document.forms["enquiry1"]["phone"].value;
if (pno==""){
 alert("Please Enter Phone Number");
 document.forms["enquiry1"]["phone"].focus();  
  return false;
}

var postcode=document.forms["enquiry1"]["postcode"].value;
if (postcode==""){
 alert("Please Enter Your Postcode");
 document.forms["enquiry1"]["postcode"].focus(); 
  return false;
} 
var enquiry=document.getElementById('enquiry123').value;

if (enquiry==""){
 alert("Please Enter Your Enquiry");
  
  return false;
}  
     
}
</script>
<?php $sql4 = "select * from wp_posts where ID='".$_REQUEST['pid']."'";   $exe4 = mysql_query($sql4);   $res4 = mysql_fetch_array($exe4); $sql41 = "select * from wp_postmeta where post_id='".$_REQUEST['pid']."' and meta_key='_thumbnail_id'";   $exe41 = mysql_query($sql41);   $res41 = mysql_fetch_array($exe41);            $meta_key1 = $res41['meta_value'];      $sql5 = "select * from wp_posts where ID='".$meta_key1."'";   $exe5 = mysql_query($sql5);   $res5 = mysql_fetch_array($exe5);        $sql42 = "select * from wp_postmeta where post_id='".$_REQUEST['pid']."' and meta_key='product_code'";   $exe42 = mysql_query($sql42);   $res42 = mysql_fetch_array($exe42);    ?><section class="service_body">	<div class="container">		<div class="row">			<div class="service_body_innr">			<div class="col-sm-9">									<div class="brd_camp">						<ul>							<li><?php the_field('short_heading'); ?></li>						</ul>					</div>					<p></p>					<?php the_content(); ?>					<p>Enquiry about product: </p>					</div>					<div class="col-sm-9">						<div class="enq_dtl">						<table cellpadding="0" cellspacing="0">							<tr>								<th>Item Image</th>								<th class="ent">Item Name</th>								<th>Code</th>							</tr>							<tr>								<td><img src="<?php echo $res5['guid'];?>" alt="" /></td>								<td><span><a href="<?php echo $res4['guid'];?>"> <?php echo $res4['post_title'];?></a></span></td>								<td> <?php echo $res42['meta_value'];?></td>							</tr>						</table>												</div>												<div class="enq">					<div class="contact_main_frm">				    <form name="enquiry1" action="<?php echo get_option('home');?>/enquiry_feedback.php" method="post" onsubmit="return enquiryForm();">				    	<div class="contact_main_frm_in">				    	<label>First Name *</label>				    	<input type="text" name="name" value="" />				    	</div>				    	<div class="contact_main_frm_in">				    	<label>Email *</label>				    	<input type="email" name="email" value="" />				    	</div>				    	<div class="contact_main_frm_in">				    	<label>Phone  *</label>				    	<input type="text" name="phone" value="" />				    	</div>				    	<div class="contact_main_frm_in">				    	<label>Company</label>				    	<input type="text" name="company" value="" />				    	</div>				    	<div class="contact_main_frm_in">				    	<label>Postcode  *</label>				    	<input type="text" name="postcode" value="" />				    	</div>				    	<div class="contact_main_frm_in">				    	<label>Enquiry  *</label>				    	<textarea name="enquiry"></textarea>				    	</div>				    	<div class="contact_main_frm_in">				    	<label>Subscribe to our newsletter </label>				    	<div class="chekbx">				    	<div class="chekbx_in">				    	<input type="checkbox" name="newsletter" value="Yes">   				    	</div>				    	</div>				    	</div>				    	<input type="hidden" name="prod_name" value="<?php echo $res4['post_title'];?>" />						<input type="hidden" name="item_code" value="<?php echo $res42['meta_value'];?>" />				    	<input type="submit" name="enquiry" value="Submit" />				    </form>				</div>					</div>									</div>					</div>				   </div>				</div></section>


<?php get_footer(); ?>