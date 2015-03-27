<h1>Upload image</h1>
<?php echo $error; ?>
<?php echo form_open_multipart('index.php/rankings/upload');?>
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