<h3>Add User</h3>
<?php 
if(isset($_POST['register'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$position = $_POST['position'];
	$level = $_POST['level'];
	$insert = mysql_query("insert into user values('$username','$password','$position','$level',1)");
		if($insert){
			echo"Berhasil";
		}else{
			echo"Gagal";
		}
}
?>
<form method="post" action="?page=add_user">
	<div class="row">
	    <div class="large-6 columns">
	      <label>Username
	        <input type="text" placeholder="Username" name='username'/>
	      </label>
	    </div>
	</div>
	<div class="row">
	    <div class="large-4 columns">
	      <label>Password
	        <input type="password" name='password' placeholder="Password" />
	      </label>
	    </div>
	</div>
	<div class="row">
    <div class="large-3 columns">
      <label>Position
        <select name='position'>
        <?php
        	$query = mysql_query("select*from position");
        	echo"<option>Position</option>";
        	while($data = mysql_fetch_array($query)){
        		echo"<option value=$data[id_position]>$data[name_position]</option>";
        	}
        ?>
        </select>
      </label>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label>Level
        <select name='level'>
         <?php
        	$query = mysql_query("select*from level");
        	echo"<option>Level</option>";
        	while($data = mysql_fetch_array($query)){
        		echo"<option value=$data[id_level]>$data[name_level]</option>";
        	}
       	?>
        </select>
      </label>
    </div>
  </div>
	<input type="submit" class="button" value="Register" name="register">
	
</form>

<table>
  <thead>
    <tr>
      <th width="200">Username</th>
      <th>Password</th>
      <th width="150">Position</th>
      <th width="100">Level</th>
      <th width="50">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    	$query = mysql_query("select username,password,level.name_level,position.name_position from user join level on user.level=level.id_level join position on user.position=position.id_position");
		while($data=mysql_fetch_array($query)){
			echo"<tr>
      <td>$data[username]</td>
      <td>$data[password]</td>
      <td>$data[name_position]</td>
      <td>$data[name_level]</td>
      <td><a href=?page=delete&id=$data[username]>Delete</a></td>
    </tr>";	
		}		
    ?>
    
  </tbody>
</table>