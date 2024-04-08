<?php
global $wpdb;
$table = 'asdf1as3d2f1fd1_donation_master';

if($_REQUEST['action']=='view')
{
  $headline = 'View Details';
  
  if($_REQUEST['action']=='view')
  { 
    $donation_id = $_REQUEST['id'];
    $row_pp = $wpdb->get_row("SELECT * FROM ".$table." where donation_id='".$donation_id."'" );
    if(count($row_pp) > 0)
    {
      $donation_frequency = $row_pp->donation_frequency;
      $donation_type = $row_pp->donation_type;
      $donation_level = $row_pp->donation_level;
      $business_name = $row_pp->business_name;
      $first_name = $row_pp->first_name;
      $last_name = $row_pp->last_name;
      $email_address = $row_pp->email_address;
      $phone_number = $row_pp->phone_number;
      $phone_type = $row_pp->phone_type;
      $address1 = $row_pp->address1;
      $address2 = $row_pp->address2;
      $city = $row_pp->city;
      $state = $row_pp->state;
      $postal_code = $row_pp->postal_code;
      $country = $row_pp->country;
      $activity_anonymous = $row_pp->activity_anonymous;
      $contribution = $row_pp->contribution;
      $message_support = $row_pp->message_support;
      $amount_deduct = $row_pp->amount_deduct;
      $card_name = $row_pp->card_name;
      $card_type = $row_pp->card_type;
      $date_added = $row_pp->date_added;
    }
    
  }
  
  
  
?>

<style type="text/css">
h2  { color: #664fa0!important; border-top: 0px solid #c2c2c2;
    border-bottom: 1px solid #999999;
    padding: 10px 0;}
.border{border-bottom:1px solid #ccc;}

/*
td { font-size: 14px; }
table.border, table.border td, table.border th {
  border-collapse:collapse;
  border:1px solid #666;
}
*/
</style>

<div class="wrap">
  <h2>
    <?php  _e($headline,'AAREP'); ?><a class="add-new-h2" href="admin.php?page=donation_info">Back</a></h2>
  <div class="form">
       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #c2c2c2;padding: 10px;">
      <tr>
        <td align="left" valign="top"><h2>Application Information</h2></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <th width="170" align="left" valign="top">Donation Frequency:</th>
            <td colspan="5" align="left" valign="top"><?php echo $donation_frequency; ?></td>
            </tr>
            <tr>
            <th width="170" align="left" valign="top">Donation Level:</th>
            <td colspan="5" align="left" valign="top"><?php echo $donation_level; ?></td>
            </tr>
            <tr>
            <th width="170" align="left" valign="top">Donation Type:</th>
            <td colspan="5" align="left" valign="top"><?php echo $donation_type; ?></td>
            </tr>
            <tr>
            <th width="170" align="left" valign="top">Amount:</th>
            <td colspan="5" align="left" valign="top"><?php echo $amount_deduct; ?></td>
            </tr>
        </table></td>
      </tr>  
      <tr>
        <td align="left" valign="top"><h2>General Information</h2></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
            <th width="170" align="left" valign="top">Business Name:</th>
            <td colspan="5" align="left" valign="top"><?php echo $business_name; ?></td>
            </tr>
          <tr>
            <th width="170" align="left" valign="top">First Name:</th>
            <td colspan="5" align="left" valign="top"><?php echo $first_name; ?></td>
            </tr>
          <tr>
            <th align="left" valign="top">Last Name::</th>
            <td colspan="5" align="left" valign="top"><?php echo $last_name; ?></td>
            </tr>
             <th align="left" valign="top">E-mail Address:</th>
            <td colspan="5" align="left" valign="top"><?php echo $email_address; ?></td>
            </tr>
             <th align="left" valign="top">Phone Number:</th>
            <td colspan="5" align="left" valign="top"><?php echo $phone_number; ?></td>
            </tr>
            <th align="left" valign="top">Phone Type:</th>
            <td colspan="5" align="left" valign="top"><?php echo $phone_type; ?></td>
            </tr>
          <th align="left" valign="top">Address1:</th>
            <td colspan="5" align="left" valign="top"><?php echo $address1; ?></td>
            </tr>
            <th align="left" valign="top">Address2:</th>
            <td colspan="5" align="left" valign="top"><?php echo $address2; ?></td>
            </tr>
            <th align="left" valign="top">City:</th>
            <td colspan="5" align="left" valign="top"><?php echo $city; ?></td>
            </tr>
            <th align="left" valign="top">State::</th>
            <td colspan="5" align="left" valign="top"><?php echo $state; ?></td>
            </tr>
            <th align="left" valign="top">postal_code:</th>
            <td colspan="5" align="left" valign="top"><?php echo $postal_code; ?></td>
            </tr>
             <th align="left" valign="top">Country:</th>
            <td colspan="5" align="left" valign="top"><?php echo $country; ?></td>
            </tr>
             <th align="left" valign="top">Activity anonymous:</th>
            <td colspan="5" align="left" valign="top"><?php echo $activity_anonymous; ?></td>
            </tr>   
             <th align="left" valign="top">Message Of Support:</th>
            <td colspan="5" align="left" valign="top"><?php echo $message_support; ?></td>
            </tr>            
        </table></td>
      </tr> 
      <tr>
        <td align="left" valign="top"><h2>Payment Information</h2></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <th width="170" align="left" valign="top">Name on Card:</th>
            <td colspan="5" align="left" valign="top"><?php echo $card_name; ?></td>
            </tr>
          <tr>
            <th align="left" valign="top">Card Type:</th>
            <td colspan="5" align="left" valign="top"><?php echo $card_type; ?></td>
            </tr>  
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><h2>Date Submission</h2></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <th width="170" align="left" valign="top">Date:</th>
            <td colspan="5" align="left" valign="top"><?php echo date('m-d-Y', strtotime($date_added)); ?></td>
            </tr>
        </table></td>
      </tr>
    </table>    
  </div>
</div>
<?php 
}

?>
<script type="text/javascript">
var home_url = '<?php echo PP_PLUGIN_URL;?>';
</script>