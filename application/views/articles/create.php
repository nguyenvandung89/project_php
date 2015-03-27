<script type="text/javascript" src="<?php echo base_url("assets/js/category.js"); ?>"></script>
<?php
$query = $this->db->get('categories');
$categories = $query->result();
?>
<?php
$title = array(
  "name"  => "title",
  "id"    => "title",
  "class" => "form-control",
  "size"  => "30",
  "placeholder"=>"title",
  "value" => set_value("title"),
  );
  ?>
  <h3 align='center'>Create article</h3>
  <div class="error">
    <ul>
      <?php
      echo validation_errors('<li>','</li>');
      if($error!="" && !empty($error))
        echo $error;
      ?>
    </ul>
  </div>
  <form class="form-horizontal" action="create" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="inputtitle" class="col-sm-2 control-label">Title</label>
      <div class="col-sm-10">
        <?php echo form_input($title);?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputcontent" class="col-sm-2 control-label">content</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="content" rows="3"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputcontent" class="col-sm-2 control-label">Category</label>
      <div class="col-sm-10">
        <select class="form-control" id="category">
          <option id = "y" value="0">--Select--</option>
          <?php foreach($categories as $category) { ?>
          <option value="<?=$category->id?>"><?=$category->title?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputcontent" class="col-sm-2 control-label">Sub Category</label>
      <div class="col-sm-10">
        <select class="form-control" id="sub_category" name="sub_categories_id">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputcontent" class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10">
        <input type='file' name='userfile' size='20' />
      </div>
    </div>
    <div class="form-group">
      <label for="inputcontent" class="col-sm-2 control-label"></label>
      <div class="col-sm-10">
        <button type="submit" class="btn btn-default">Save</button>
      </div>
    </div>
  </form>

