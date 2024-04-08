<?php 
global $wpdb;
$table = 'asdf1as3d2f1fd1_donation_master';

if($_REQUEST['action']=='delete' || $_REQUEST['action2']=='delete')
{
	if(isset($_REQUEST['donation_ids']) && $_REQUEST['_wpnonce']!='')
	{
		foreach($_REQUEST['donation_ids'] as $item)
		{	
			$wpdb->delete($table, array('donation_id'=>$item));
			$_GET['msg']="delete";
		}
	}
	else if($_REQUEST['donation_id'])
	{	
		$wpdb->delete($table, array('donation_id'=>$_REQUEST['donation_id']));
	    $_GET['msg']="delete";
	}
}
?>
<?php
	if( ! class_exists( 'WP_List_Table' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	}
	
	class Donation_List_Table extends WP_List_Table {
		
		function __construct(){
			global $status, $page;
				parent::__construct( array(
					'singular'  => "Make a Donation",     //singular name of the listed records
					'plural'    => "Make a Donation",   //plural name of the listed records
					'ajax'      => false        //does this table support ajax?
		
			) );	
		}
		
		function get_columns(){
			$columns = array( 
			'cb' => '<input type="checkbox" />',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone_number' => 'Phone Number',
			'email_address' => 'Email',
			'action' => 'Action',
			);
			return $columns;
		}
		
		function get_sortable_columns() {
			$sortable_columns = array(
				'first_name' => array('first_name',false),
				'last_name' => array('last_name',false),
				'phone_number' => array('phone_number',false),
				'email_address' => array('email_address',false),
				'action' => array('action',false),
			);
			return $sortable_columns;
		}
		
		function get_bulk_actions() {
			  $actions = array(
				'delete' => 'Delete'
			  );
			  return $actions;
		}
		
		function column_cb($item) {
			return sprintf(
				'<input type="checkbox" name="donation_ids[]" value="%s" />', $item->donation_id
			);    
		}
				
		function column_donation_id($item){
			
            $class = '<span class="add_ui_class"></span>';
			//Build row actions
			$actions = array(
				//'delete'    => sprintf('<a href="?page=%s&action=%s&member_id=%s">Delete</a>',$_REQUEST['page'],'delete',$item->membership_id),
				'delete'    => sprintf('<a href="javascript:;" onClick="donation_delete(%s);">Delete</a>',$item->donation_id),
			);
			
			//Return the title contents
			return sprintf('%1$s %2$s %3$s',
				/*$2%s*/ $item->id,
				/*$3%s*/ $this->row_actions($actions),
                $class                
			);
		}
		
		function prepare_items() 
		{
			global $wpdb,$_wp_column_headers;
			$prefix=$wpdb->prefix;
			$screen = get_current_screen();
			
			$search_text=!empty($_POST['s'])?$_POST['s']:"";
			
			$where="";
			
			if(!empty($search_text))
				$where="where first_name LIKE '%".$search_text."%' or last_name LIKE '%".$search_text."%' or email_address LIKE '%".$search_text."%'";
			
			/* -- Preparing your query -- */
				$query = "SELECT * FROM asdf1as3d2f1fd1_donation_master ".$where;
				//echo $query;
				
			/* -- Ordering parameters -- */
				//Parameters that are going to be used to order the result
				$orderby = !empty($_GET["orderby"]) ? ($_GET["orderby"]) : 'date_added';
				$order = !empty($_GET["order"]) ? ($_GET["order"]) : 'DESC';
				if(!empty($orderby) & !empty($order)){ $query.=' ORDER BY '.$orderby.' '.$order; }
		
			/* -- Pagination parameters -- */
				//Number of elements in your table?
				$totalitems = $wpdb->query($query); //return the total number of affected rows
				//How many to display per page?
				$perpage = 20;
				//Which page is this?
				$paged = !empty($_GET["paged"]) ? ($_GET["paged"]) : '';
				//Page Number
				if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ $paged=1; }
				//How many pages do we have in total?
				$totalpages = ceil($totalitems/$perpage);
				//adjust the query to take pagination into account
				if(!empty($paged) && !empty($perpage)){
					$offset=($paged-1)*$perpage;
					$query.=' LIMIT '.(int)$offset.','.(int)$perpage;
				}
		
			/* -- Register the pagination -- */
				$this->set_pagination_args( array(
					"total_items" => $totalitems,
					"total_pages" => $totalpages,
					"per_page" => $perpage,
				) );
				//The pagination links are automatically built according to those parameters
		
			/* -- Register the Columns -- */
				$columns = $this->get_columns();
				$hidden = array();
				$sortable = $this->get_sortable_columns();
				
				$this->_column_headers = array($columns, $hidden, $sortable);
				
				$_wp_column_headers[$screen->Id]=$columns;
				
				//echo $_wp_column_headers[$screen->id];
			/* -- Fetch the items -- */

				$this->items = $wpdb->get_results($query);
				//echo $query;
			
		}

		function column_default( $item, $column_name ) {
			global $wpdb;
			switch( $column_name ) { 
				case 'first_name':											
					return $item->first_name;
				case 'last_name':
					return $item->last_name;		
				case 'phone_number':
					return $item->phone_number;		
				case 'email_address':
					return $item->email_address;
					case 'action':
					echo '<a href="admin.php?page=view_application_donation&action=view&id='.$item->donation_id.'">View Details</a>';
	                break;
				return _e($item->$column_name,'donation_master');			
				default:
				return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
			}
		 }
	}
	$wp_list_table = new Donation_List_Table();
	$wp_list_table->prepare_items();
	//echo $wp_list_table;
	?>
	
	<div class="wrap">
	<h2>Make a Donation</h2>
	  <div id="response-message">
	   <?php if($_GET['msg']){ ?>
       <div class="notice notice-success">
		<?php if($_GET['msg'] == 'delete'){ ?>
        	<p>Record successfully deleted.</p><?php 
		}?>
        </div>
		<?php }?>
       </div>
	  <form method="post">
		<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
		<?php $wp_list_table->search_box( 'search', 'search_id' );?>
		<?php $wp_list_table->display() ?>
	  </form>
	</div>
    <style>
    	.wp-list-table .column-cb { width: 5%; }
		.wp-list-table .column-first_name { width: 15%; }
		.wp-list-table .column-last_name { width: 20%; }
		.wp-list-table .column-phone_number { width: 20%; }		
		.wp-list-table .column-email_address  { width: 25%; }
    </style>
	<script type="text/javascript">
       var home_url = '<?php echo PP_PLUGIN_URL;?>';
       function donation_delete(id)
		{
			if(confirm("Are you sure you want to delete this record?"))
			{	
				location.href='?page=donation_info&action=delete&donation_id='+donation_id;
			}
		}
    </script>