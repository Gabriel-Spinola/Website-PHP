<?php

    $AddUser = new AddUser(new MySqlDataBase);
    $AddUserValidator = new AddUserValidator(new MySqlDataBase);

?>

<section class="content-box">

    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</h2>

    <form id="edit-user-form" method="post" enctype="multipart/form-data">

        <?php
        
        if(isset($_POST['submit'])) {
            $user = $_POST['user'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $position = $_POST['position'];
            $image = $_FILES['image'];

            if ($AddUserValidator -> userExists($user)) {
                DashBoard :: response(
                    'error',
                    "The User Already Exists"
                );
            } else {
                if($image['name'] != '' && $position <= $_SESSION['position']) {
                    if ($AddUser -> isImageValid($image)) {
                        DashBoard :: response(
                            'success',
                            "Suc"
                        );
                    } else {
                        DashBoard :: response(
                            'error',
                            "The image format's not accepted"
                        );
                    }
                } else if ($position <= $_SESSION['position']) {
                    echo 'a';
                } else {
                    die;
                }
            }
        }

        ?>

        <div class="form-group">
        
            <label>User:</label>
            <input type="text" name="user" required>

        </div><!--form-group-->

        <div class="form-group">
        
            <label>Password:</label>
            <input type="password" name="password" required>

        </div><!--form-group-->
         
        <div class="form-group">
        
            <label>Image:</label>
            <input type="file" name="image">

        </div><!--form-group-->

        <div class="form-group">
        
            <label>Name:</label>
            <input type="text" name="name" required>

        </div><!--form-group-->

        <?php

            for($i = 0; $i < count(POSITIONS); $i++) $pos[$i] = POSITIONS[$i];

        ?>

        <div class="form-group">
        
            <label>Position:</label>
            <select name="position" required>
            
                <?php foreach(POSITIONS as $key => $row): ?>

                    <?php if($key <= $_SESSION['position']): ?>

                        <option value="<?php echo $key ?>"><?php print $row ?></option>

                    <?php endif ?>

                <?php endforeach ?>

            </select>

        </div><!--form-group-->

        <div class="form-group">
             
            <input type="submit" name="submit" value="Update User">

        </div><!--form-group-->
    
    </form>

</section><!--content-box-->