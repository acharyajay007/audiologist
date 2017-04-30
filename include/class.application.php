<?php 
class Application extends Functions
{
	public $db;
	public $page_id,$page_bg,$page_title,$page_url,$page_js,$page_description,$page_meta,$previous_page_id,$next_page_id,$page_toolbar;
	public $page_color_template=array(0=>array("background_color"=>"#2e3840","color"=>"#FFF"),1=>array("background_color"=>"#FFF","color"=>"#000"));
	public $application_pages=array(
	0=>array("id"=>0,"page_template"=>"0","page_url"=>"1_cover.php","page_js"=>"js/pages/1_cover.js","page_title"=>"&nbsp;","page_description"=>"","page_meta"=>"","page_toolbar"=>false,"show_before_login"=>true,"show_navigation_right"=>true,"left_page"=>1),
	1=>array("id"=>1,"page_template"=>"1","page_url"=>"2_login.php","page_js"=>"js/pages/2_login.js","page_title"=>"Login","page_description"=>"","page_meta"=>"","page_toolbar"=>false,"show_before_login"=>true),
	2=>array("id"=>2,"page_template"=>"1","page_url"=>"3_new_audiologist.php","page_js"=>"js/pages/3_new_audiologist.js","page_title"=>"Add detail new audiologist","page_description"=>"","page_meta"=>"","page_toolbar"=>false,"show_before_login"=>true),	
	3=>array("id"=>3,"page_template"=>"1","page_url"=>"4_edit_audiologist.php","page_js"=>"js/pages/4_edit_audiologist.js","page_title"=>"Edit detail new audiologist","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_left"=>true,"left_page"=>4),	
	4=>array("id"=>4,"page_template"=>"1","page_url"=>"5_what_would_you_like_to_do.php","page_js"=>"js/pages/1_cover.js","page_title"=>"Menu","page_description"=>"","page_meta"=>"","page_toolbar"=>true),	
	5=>array("id"=>5,"page_template"=>"1","page_url"=>"6_search_customer.php","page_js"=>"js/pages/6_search_customer.js","page_title"=>"Search","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_left"=>true,"left_page"=>4)	,
	6=>array("id"=>6,"page_template"=>"1","page_url"=>"7_add_a_new_customer.php","page_js"=>"js/pages/7_add_a_new_customer.js","page_title"=>"New Customer","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_left"=>true,"left_page"=>4)	,
	7=>array("id"=>7,"page_template"=>"1","page_url"=>"8_customer_profile.php","page_js"=>"js/pages/8_customer_profile.js","page_title"=>"Customer","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_left"=>true,"left_page"=>4),	
	8=>array("id"=>8,"page_template"=>"0","page_url"=>"1_consultation_cover.php","page_js"=>"js/pages/1_consultation_cover.js","page_title"=>"Your hearing aid ﬁtting","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_right"=>true),	
	9=>array("id"=>9,"page_template"=>"1","page_url"=>"2_today_we_will.php","page_js"=>"js/pages/2_consultation_cover.js","page_title"=>"Your needs and hearing assessment","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_left"=>true,"show_navigation_right"=>true),
	10=>array("id"=>10,"page_template"=>"1","page_url"=>"3_tell_us_about_your_hearing.php","page_js"=>"js/pages/3_tell_us_about_your_hearing.php.js","page_title"=>"Your needs and hearing assessment","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_left"=>true,"show_navigation_right"=>true)	,
	11=>array("id"=>11,"page_template"=>"1","page_url"=>"4_hearing_assesment.php","page_js"=>"js/pages/4_hearing_assetsment.php.js","page_title"=>"Your needs and hearing assessment","page_description"=>"","page_meta"=>"","page_toolbar"=>true,"show_navigation_left"=>true,"show_navigation_right"=>true)	
	);
		function __construct($page_id="")
		{
			$db = new Functions();
			$conn = $db->connect();
			$this->db=$db;
			
			if(($page_id!="" || $page_id!=-1) && array_key_exists($page_id,$this->application_pages))
			{
				
				if($page_id==1)
				{
					if($this->isLoggedIn())
					{
						
						$this->db->rp_location($this->application_pages[4]['page_url']);
					}
				}
				else
				{
					if(!(array_key_exists("show_before_login",$this->application_pages[$page_id]))|| !$this->application_pages[$page_id]['show_before_login'])
					{
						if(!$this->isLoggedIn())
						{
							
							$this->db->rp_location($this->application_pages[1]['page_url']);
						}
					}
				}
				
				
				$this->page_id=$page_id;			
				$this->page_url=$this->application_pages[$page_id]['page_url'];
				$this->page_js=$this->application_pages[$page_id]['page_js'];
				$this->page_title=$this->application_pages[$page_id]['page_title'];
				$this->page_description=$this->application_pages[$page_id]['page_description'];			
				$this->page_meta=$this->application_pages[$page_id]['page_meta'];
				$this->page_toolbar=$this->application_pages[$page_id]['page_toolbar'];
				$this->page_template=$this->page_color_template[$this->application_pages[$page_id]['page_template']];

				// Check Whether It is First Page or not
				$previous_page_id=$page_id-1;
				if($page_id>=0 && array_key_exists($previous_page_id,$this->application_pages) && (array_key_exists("show_navigation_left",$this->application_pages[$page_id]) && $this->application_pages[$page_id]['show_navigation_left']))
				{
					if(array_key_exists("left_page",$this->application_pages[$page_id]))
					{
						$this->previous_page_id=$this->application_pages[$page_id]['left_page'];
					}
					else
					{
						$this->previous_page_id=$previous_page_id;					
					}
					
				}				
				else
				{
					$this->previous_page_id=-1;
				}
				// Check Whether It is Last Page or not
				$next_page_id=$page_id+1;
				if($next_page_id<sizeof($this->application_pages) && array_key_exists($next_page_id,$this->application_pages) && (array_key_exists("show_navigation_right",$this->application_pages[$page_id]) && $this->application_pages[$page_id]['show_navigation_right']))
				{
					$this->next_page_id=$next_page_id;
				}
				else
				{
					$this->next_page_id=-1;
				}
				
			}
			else
			{
				// Throgh Exception 
				$this->page_id=$page_id;	
				
			}
	}
	
	public function login($audiologist,$clinic_id,$brand_id)
	{
		$table="audiologist";
		$where="id='".$audiologist."'";
		$count=$this->db->rp_getTotalRecord($table,$where,0);
		if($count>=1)
		{
			$audiologist_data=$this->db->rp_getData($table,"*",$where);
			if($audiologist_data)
			{
				$audiologist_data=mysql_fetch_assoc($audiologist_data);
				$_SESSION[SITE_SESS."_AUDIOLOGIST_ID"]=$audiologist_data['id'];				
				$_SESSION[SITE_SESS."_AUDIOLOGIST_TITLE"]=$audiologist_data['audiologist_title'];
				$_SESSION[SITE_SESS."_AUDIOLOGIST_FIRSTNAME"]=$audiologist_data['audiologist_firstname'];
				$_SESSION[SITE_SESS."_AUDIOLOGIST_SURNAME"]=$audiologist_data['audiologist_surname'];
				$_SESSION[SITE_SESS."_AUDIOLOGIST_CLINIC_ID"]=$audiologist_data['audiologist_clinic'];
				$_SESSION[SITE_SESS."_AUDIOLOGIST_BRAND_ID"]=$audiologist_data['audiologist_brand'];
				$_SESSION[SITE_SESS."_AUDIOLOGIST_PHOTO"]=AUDIOLOGIST_IMAGE.$audiologist_data['audiologist_photo'];
				$_SESSION[SITE_SESS."_SELECTED_AUDIOLOGIST_CLINIC"]=$clinic_id;
				$_SESSION[SITE_SESS."_SELECTED_AUDIOLOGIST_BRAND"]=$brand_id;
				
				return true;
			}
			else
			{
				return false;
			}
			
		}
		else
		{
			return false;
		}
	}
	
	public function register($audiologist_title,$audiologist_firstname,$audiologist_surname,$audiologist_clinic,$audiologist_brand,$audiologist_photo)
	{
		$table="audiologist";
		$count=$this->db->rp_getTotalRecord($table,"audiologist_title='".$audiologist_title."' AND audiologist_firstname='".$audiologist_firstname."' AND audiologist_surname='".$audiologist_surname."' AND audiologist_clinic='".$audiologist_clinic."' AND audiologist_brand='".$audiologist_brand."' AND audiologist_photo='".$audiologist_photo."'","",0);
		if($count<=0)
		{
			$audiologist_id=$this->db->rp_insert($table,array($audiologist_title,$audiologist_firstname,$audiologist_surname,$audiologist_clinic,$audiologist_brand,$audiologist_photo),array("audiologist_title","audiologist_firstname","audiologist_surname","audiologist_clinic","audiologist_brand","audiologist_photo"),0);
			if($audiologist_id!=0)
			{
				return true;
			}
			else
			{
				return false;
			}			
		}
		else
		{
			return false;
		}
	}
	
	public function editProfile($id,$audiologist_title,$audiologist_firstname,$audiologist_surname,$audiologist_clinic,$audiologist_brand,$audiologist_photo)
	{
		$table="audiologist";
		$count=$this->db->rp_getTotalRecord($table,"audiologist_title='".$audiologist_title."' AND audiologist_firstname='".$audiologist_firstname."' AND audiologist_surname='".$audiologist_surname."' AND audiologist_clinic='".$audiologist_clinic."' AND audiologist_brand='".$audiologist_brand."' AND audiologist_photo='".$audiologist_photo."' AND id!='".$id."'","",0);
		if($count<=0)
		{
			$isUpdated=$this->db->rp_update($table,array("audiologist_title"=>$audiologist_title,"audiologist_firstname"=>$audiologist_firstname,"audiologist_surname"=>$audiologist_surname,"audiologist_clinic"=>$audiologist_clinic,"audiologist_brand"=>$audiologist_brand,"audiologist_photo"=>$audiologist_photo),"id='".$id."'");
			if($isUpdated)
			{
				$_SESSION[SITE_SESS."_AUDIOLOGIST_ID"]=$id;				
				$_SESSION[SITE_SESS."_AUDIOLOGIST_TITLE"]=$audiologist_title;
				$_SESSION[SITE_SESS."_AUDIOLOGIST_FIRSTNAME"]=$audiologist_firstname;
				$_SESSION[SITE_SESS."_AUDIOLOGIST_SURNAME"]=$audiologist_surname;
				$_SESSION[SITE_SESS."_AUDIOLOGIST_CLINIC_ID"]=$audiologist_clinic;
				$_SESSION[SITE_SESS."_AUDIOLOGIST_BRAND_ID"]=$audiologist_brand;
				$_SESSION[SITE_SESS."_AUDIOLOGIST_PHOTO"]=AUDIOLOGIST_IMAGE.$audiologist_photo;
				return true;
			}
			else
			{
				return false;
			}			
		}
		else
		{
			return false;
		}
	}
	
	public function addCustomer($custmore_number,$audiologist_id,$clinic,$brand)
	{
		$table="customer";
		$count=$this->db->rp_getTotalRecord($table,"number='".$custmore_number."' AND audiologist_id='".$audiologist_id."' AND clinic='".$clinic."' AND brand='".$brand."'");
		if($count<=0)
		{
			
				$custmore_id=$this->db->rp_insert($table,array($custmore_number,$brand,$clinic,$audiologist_id),array("number","brand","clinic","audiologist_id"),0);
				if($custmore_id!=0)
				{
					return true;
				}
				else
				{
					return false;
				}
				
			
		}
		else
		{
			return false;
		}
	}
	public function searchCustomer($custmore_number)
	{
		$result=array();
		$table="customer";
		$data=$this->db->rp_getData($table,"*","number LIKE '%".$custmore_number."%'");
		if($data)
		{			
			while($d=mysql_fetch_assoc($data))
			{
				$result[]=$d['number'];
					
			}	
		}
		
		return $result;
		
	}
	
	public function isLoggedIn()
	{
		if(isset($_SESSION[SITE_SESS."_AUDIOLOGIST_ID"]) && $_SESSION[SITE_SESS.'_AUDIOLOGIST_ID']!="")
		{
			$table="audiologist";
			$count=$this->db->rp_getTotalRecord($table,"id='".$_SESSION[SITE_SESS."_AUDIOLOGIST_ID"]."'");
			if($count>=1)
			{
				return true;
			}
			else
			{
				return false;
			}
			
		}
		else
		{
			return false;
		}
	}

}
?>