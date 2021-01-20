<section class="content-box">

    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</h2>

    <form id="edit-user-form" method="post" enctype="multipart/form-data">

        <div class="form-group">
        
            <label>User:</label>
            <input type="text" name="user" value="<?php print $_SESSION['user'] ?>" required>

        </div><!--form-group-->

        <div class="form-group">
        
            <label>Name:</label>
            <input type="text" name="name" value="<?php print $_SESSION['name'] ?>" required>

        </div><!--form-group-->

        <div class="form-group">
        
            <label>Password:</label>
            <input type="password" name="password" value="<?php print $_SESSION['password'] ?>" required>

        </div><!--form-group-->
         
        <div class="form-group">
        
            <label>Image:</label>
            <input type="file" name="image">
            <input type="hidden" name="actual-image" value="<?php echo $_SESSION['img'] ?>">

        </div><!--form-group-->

        <div class="form-group">
             
            <input type="submit" name="submit" value="Update User" required>

        </div><!--form-group-->
    
    </form>

</section><!--content-box-->