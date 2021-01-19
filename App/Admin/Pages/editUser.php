<?php 

    $EditUser = new EditUser(new MySqlDataBase, new FilesManager);

    function updateUserInfoView(bool $response, string $SucMessage, string $ErrMessage) {
        if ($response)
            DashBoard :: response(
                response: 'success',
                message: $SucMessage
            );
        else
            DashBoard :: response(
                response: 'error',
                message: $ErrMessage
            );
    }

?>

<section class="content-box">

    <h2><i class="fas fa-pen"></i> Edit User</h2>

    <form id="edit-user-form" method="post" enctype="multipart/form-data">

        <?php
            
        if(isset($_POST['submit'])):

            $name = $_POST['name'];
            $password = $_POST['password'];
            $actualImage = $_POST['actual-image'];
            $image = $_FILES['image'];

            if($image['name'] != ''): ?>

                <?php
                
                if ($EditUser -> isImageValid($image)):

                    $EditUser -> deleteUserImage($actualImage);
                    $image = $EditUser -> uploadUserImage($image);

                    updateUserInfoView(
                        response: $EditUser -> updateUserInfo($name, $password, $image),
                        SucMessage: 'Your account has been successfully updated!',
                        ErrMessage: 'An Error has occurred and your account cannot be updated!'
                    ); ?>

                    <a href="<?php echo INCLUDE_PATH_ADMIN ?>?logout">To Save your changes, Click here</a>

                <?php else:

                    DashBoard :: response(
                        'error',
                        "The image format's not accepted"
                    );
                    
                endif;

            else:

                $image = $actualImage;

                updateUserInfoView(
                    response: $EditUser -> updateUserInfo($name, $password, $image),
                    SucMessage: 'Your account has been successfully updated!',
                    ErrMessage: 'An Error has occurred and your account cannot be updated!'
                );

                ?>

                <a href="<?php echo INCLUDE_PATH_ADMIN ?>?logout">To Save your changes, Click here</a>

            <?php endif;
        
        endif

        ?>
    
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