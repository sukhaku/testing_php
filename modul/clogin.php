<?php
class clogin{
	//function check_user($username,$password){
	//	$query= mysql_query("select username,password,name_level from user,level where user.level=level.id_level and username='$username' and password='$password'");
	//}	

	function filter_variable($variable){
		$filter = mysql_real_escape_string($variable);
		return $filter;
	}

	
}


?>