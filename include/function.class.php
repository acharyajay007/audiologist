<?php
include("main.class.php");

class Functions extends Database
{
	/*
		*** Main Function Developed By Ravi Patel :) <<<
			-> rp_getData() 
				- return single and multi records
			-> rp_getValue() 
				- return single records
			-> rp_getTotalRecord()
				- return number of records
			-> rp_getMaxVal()
				- return maximum value
			-> rp_insert()
				- insert record
			-> rp_delete()
				- delete record
			-> rp_update()
				- update record
			-> tableExists()
				- check whether table exist or not
			-> rp_limitChar()
				- return trimed character string
			-> rp_dupCheck()
				- check for duplicate record in table
			-> rp_location()
				- redirect to given URL
			-> rp_createSlug()
				- create alias of given string
	*/
	
	public function rp_getData($table, $rows = '*', $where = null, $order = null,$die=0) // Select Query, $die==1 will print query By Ravi Patel
    {
		$results = array();
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;
		if($die==1){
			echo $q;die;
		}
        if($this->tableExists($table))
       	{
			if(mysql_num_rows(mysql_query($q))>0){
				$results = @mysql_query($q);
				return $results;
			}else{
				return false;
			}
        }
		else{
			return false;
		}
    }
	public function rp_getValue($table, $row=null, $where=null,$die=0) // single records ref HB function
    {
		if($this->tableExists($table) && $row!=null && $where!=null)
       	{
			$q = 'SELECT '.$row.' FROM '.$table.' WHERE '.$where;
			if($die==1){
				echo $q;die;
			}
			if(mysql_num_rows(mysql_query($q))>0){
				$results = @mysql_fetch_array(mysql_query($q));
				return $results[$row];
			}else{
				return false;
			}
        }
		else{
			return false;
		}
    }
	public function rp_getMaxVal($table, $row=null, $where=null,$die=0)
    {
		if($this->tableExists($table) && $row!=null && $where!=null)
       	{
			$q = 'SELECT MAX('.$row.') as '.$row.' FROM '.$table.' WHERE '.$where;
			if($die==1){
				echo $q;die;
			}
			if(mysql_num_rows(mysql_query($q))>0){
				$results = @mysql_fetch_array(mysql_query($q));
				return $results[$row];
			}else{
				return 0;
			}
        }
		else{
			return 0;
		}
    }
	public function rp_getMinVal($table, $row=null, $where=null,$die=0)
    {
		if($this->tableExists($table) && $row!=null && $where!=null)
       	{
			$q = 'SELECT MIN('.$row.') as '.$row.' FROM '.$table.' WHERE '.$where;
			if($die==1){
				echo $q;die;
			}
			if(mysql_num_rows(mysql_query($q))>0){
				$results = @mysql_fetch_array(mysql_query($q));
				return $results[$row];
			}else{
				return 0;
			}
        }
		else{
			return 0;
		}
    }
	public function rp_getSumVal($table, $row=null, $where=null,$die=0)
    {
		if($this->tableExists($table) && $row!=null && $where!=null)
       	{
			$q = 'SELECT SUM('.$row.') as '.$row.' FROM '.$table.' WHERE '.$where;
			if($die==1){
				echo $q;die;
			}
			if(mysql_num_rows(mysql_query($q))>0){
				$results = @mysql_fetch_array(mysql_query($q));
				return $results[$row];
			}else{
				return 0;
			}
        }
		else{
			return 0;
		}
    }
	public function rp_getAvgVal($table, $row=null, $where=null,$die=0)
    {
		if($this->tableExists($table) && $row!=null && $where!=null)
       	{
			$q = 'SELECT AVG('.$row.') as '.$row.' FROM '.$table.' WHERE '.$where;
			if($die==1){
				echo $q;die;
			}
			if(mysql_num_rows(mysql_query($q))>0){
				$results = @mysql_fetch_array(mysql_query($q));
				return $results[$row];
			}else{
				return 0;
			}
        }
		else{
			return 0;
		}
    }
	public function rp_getTotalRecord($table, $where = null,$die=0) // return number of records By Ravi Patel
    {
		$q = 'SELECT * FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
		if($die==1){
			echo $q;die;
		}
        if($this->tableExists($table))
			return mysql_num_rows(mysql_query($q))+0;
        else
			return 0;
    }
	public function rp_insert($table,$values,$rows = 0,$die=0) // rp_insert - Insert and Die Values By Rav-i Pa-tel
    {
		if($this->tableExists($table))
        {
            $insert = 'INSERT INTO '.$table;
            if(count($rows) > 0)
            {
                $insert .= ' ('.implode(",",$rows).')';
            }
 
            for($i = 0; $i < count($values); $i++)
            {
                if(is_string($values[$i]))
                    $values[$i] = '"'.$values[$i].'"';
            }
            $values = implode(',',$values);
            $insert .= ' VALUES ('.$values.')';
			if($die==1){
				echo $insert;die;
			}
            $ins = @mysql_query($insert);           
            if($ins)
            {
				$last_id = mysql_insert_id();
                return $last_id;
            }
            else
            {
                return false;
            }
        }
    }
	public function rp_delete($table,$where = null,$die=0)
    {
        if($this->tableExists($table))
        {
            if($where != null)
            {
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;
				if($die==1){
					echo $delete;die;
				}
				$del = @mysql_query($delete);
            }
            if($del)
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
    public function rp_update($table,$rows,$where,$die=0) //update query by Ravi Patel
    {
        if($this->tableExists($table))
        {
            // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row
			//print_r($where);die;
            
            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            for($i = 0; $i < count($rows); $i++)
           	{
                if(is_string($rows[$keys[$i]]))
                {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                }
                else
                {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                 
                // Parse to add commas
                if($i != count($rows)-1)
                {
                    $update .= ',';
                }
            }
            $update .= ' WHERE '.$where;
			if($die==1){
				echo $update;die;
			}
			//$update = trim($update," AND");
            $query = @mysql_query($update);
            if($query)
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
	public function tableExists($table)
    {
		$tablesInDb = @mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
        if($tablesInDb)
        {
            if(mysql_num_rows($tablesInDb)==1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
	public function rp_limitChar($content,$limit,$url="javascript:void(0);",$txt="&hellip;")
    {
        if(strlen($content)<=$limit){
			return $content;
		}else{
			$ans = substr($content,0,$limit);
			if($url!=""){
				$ans .= "<a href='$url' class='desc'>$txt</a>";
			}else{
				$ans .= "&hellip;";
			}
			return $ans;
		}
    }
	public function rp_dupCheck($table, $where = null,$die=0)
    {
        $q = 'SELECT id FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
		if($die==1){
			echo $q;die;
		}
		if($this->tableExists($table))
       	{
			$results = @mysql_num_rows(mysql_query($q));
			if($results>0){
				return true;
			}else{
				return false;
			}
        }
		else
      		return false;
    }
	public function rp_location($redirectPageName=null)
    {
		if($redirectPageName==null){
			header("Location:".$this->SITEURL);
			exit;
		}else{
			header("Location:".$redirectPageName);
			exit;
		}
    }
	public function rp_createSlug($string)   
	{   
		$slug = strtolower(trim(preg_replace('/-{2,}/','-',preg_replace('/[^a-zA-Z0-9-]/', '-', $string)),"-"));
		return $slug;
	}
	public function rp_createProSlug($string)   
	{   
		$slug = strtolower(trim(preg_replace('/-{2,}/','-',preg_replace('/[^a-zA-Z0-9-.]/', '-', $string)),"-"));
		return $slug;
	}
	public function getDBName()   
	{   
		$dbData = $this->db_host.",".$this->db_user.",".$this->db_pass.",".$this->db_name;
		return $dbData;
	}
	public function rp_num($val,$deci="2",$sep=".",$thousand_sep="")
	{
		return number_format($val,$deci,$sep,$thousand_sep);
	}
	public function clean($string)
	{
		$string = trim($string);								// Trim empty space before and after
		if(get_magic_quotes_gpc()) {
			$string = stripslashes($string);					        // Stripslashes
		}
		$string = mysql_real_escape_string($string);			        // mysql_real_escape_string
		return $string;
	}
	public function printr($val,$isDie=1)
	{
		echo "<pre>";
		print_r($val);
		if($isDie){die;}
	}
	public function printJSON($val,$die=0)
	{
		//$val["extra"]=array("requested_params"=>$_REQUEST);
		echo json_encode($val);
		if($die)
		exit();
	}
	public function rp_randomString($len=5)
	{
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$str = "";
		for ($i = 0; $i < $len; $i++) {
			$str .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $str;
	}
	public function rp_get_client_ip()
	{
	  $ipaddress = '';
	  if (getenv('HTTP_CLIENT_IP'))
		  $ipaddress = getenv('HTTP_CLIENT_IP');
	  else if(getenv('HTTP_X_FORWARDED_FOR'))
		  $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	  else if(getenv('HTTP_X_FORWARDED'))
		  $ipaddress = getenv('HTTP_X_FORWARDED');
	  else if(getenv('HTTP_FORWARDED_FOR'))
		  $ipaddress = getenv('HTTP_FORWARDED_FOR');
	  else if(getenv('HTTP_FORWARDED'))
		  $ipaddress = getenv('HTTP_FORWARDED');
	  else if(getenv('REMOTE_ADDR'))
		  $ipaddress = getenv('REMOTE_ADDR');
	  else
		  $ipaddress = 'UNKNOWN';
	
	  return $ipaddress;
	}
}
?>