<div class="row">
  <h3 align='center'>Danh sach bai viet</h3>
  <br>
  <div class="col-lg-6">
    <div><a href="/project_php/index.php/articles/create">Create article</a></div>
  </div>
  <form name="frm_search" action="articles" method="get">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" name="search_text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Go!</button>
        </span>
      </div><br><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
  </form>
  <table class="table table-hover">
    <tr>
      <td>STT</td>
      <td>Title</td>
      <td>Content</td>
      <td>Category</td>
      <td>Image</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>
  <?php
   foreach($articles as $index => $row)
   {
     echo "<tr>"; ?>
     <td><?php echo $index+1;?></td>
  <?php
     echo "<td><a href='/project_php/index.php/articles/$row[id]'>$row[title]</a></td>";
     echo "<td>$row[content]</td>";
     echo "<td>$row[sub_categories_id]</td>";
     echo "<td><img src='/project_php/uploads/images/$row[image_name]' width='70' height='90'/></td>";
     echo "<td><a href='/project_php/index.php/articles/edit/$row[id]'>Edit</a></td>";
     echo "<td><a href='/project_php/index.php/articles/del_article/$row[id]'>Delete</a></td>";
     echo "</tr>";
   }
    echo "</table>";
    echo $pagination;
  ?>
</div>