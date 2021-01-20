<section class="content-box">

    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</h2>

    <form id="edit-user-form" method="post" enctype="multipart/form-data">

        <?php
        
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $actualImage = $_POST['actual-image'];
            $image = $_FILES['image'];

            if($image['name'] != '') {
                if ($EditUser -> isImageValid($image)): ?>

                    <?php

                        $EditUser -> deleteUserImage($actualImage);
                        $image = $EditUser -> uploadUserImage($image);
                        
                    ?>

                    <a href="<?php echo INCLUDE_PATH_ADMIN ?>?logout">To Save your changes, Click here</a>

                <?php else:

                    DashBoard :: response(
                        'error',
                        "The image format's not accepted"
                    );
                    
                endif;
            }
        }

        ?>

        <div class="form-group">
        
            <label>User:</label>
            <input type="text" name="user" value="<?php print $_SESSION['user'] ?>" required>

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
        
            <label>Name:</label>
            <input type="text" name="name" value="<?php print $_SESSION['name'] ?>" required>

        </div><!--form-group-->

        <?php

            for($i = 0; $i < count(POSITIONS); $i++) $pos[$i] = POSITIONS[$i];

        ?>

        <div class="form-group">
        
            <label>Position:</label>
            <select name="position">
            
                <?php foreach(POSITIONS as $key => $row): ?>

                    <?php if($key <= $_SESSION['position']): ?>

                        <option value="<?php echo $key ?>"><?php print $row ?></option>

                    <?php endif ?>

                <?php endforeach ?>

            </select>

        </div><!--form-group-->

        <div class="form-group">
             
            <input type="submit" name="submit" value="Update User" required>

        </div><!--form-group-->
    
    </form>

</section><!--content-box-->