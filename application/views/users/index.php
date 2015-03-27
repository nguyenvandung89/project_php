<h3 align='center'>Danh sach user</h3>
<br>
<div><a href="/project_php/index.php/users/add_user">Create user</a></div>
<table class="table table-hover">
  <tr>
    <td>STT</td>
    <td>Username</td>
    <td>Edit</td>
    <td>Del</td>
  </tr>
<?php
 foreach($users as $index => $row)
 {
   echo "<tr>"; ?>
   <td><?php echo $index+1;?></td>
<?php
   echo "<td><a href='/project_php/index.php/users/$row[id]'>$row[username]</a></td>";
   echo "<td><a href='/project_php/index.php/users/edit_user/$row[id]'>Edit</a></td>";
   echo "<td><a href='/project_php/index.php/users/del_user/$row[id]'>Delete</a></td>";
   echo "</tr>";
 }
  echo "</table>";
  echo $pagination;
?>