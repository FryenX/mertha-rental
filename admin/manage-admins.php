<?php 
    include('partials/header.php')
?>

<div class="container padding-top padding-content">
        <h1 class="padding-title text-center">Manage Admin</h1>

        <div class="position-absolute">
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
            if(isset( $_SESSION['delete']))
            {
                echo  $_SESSION['delete'];
                unset ( $_SESSION['delete']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset ($_SESSION['remove']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset ($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset ($_SESSION['failed-remove']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>
    </div>

        <div class="padding-title padding-top-2">
            <a href="add-admin.php" class="btn btn-primary">Add admin</a>
        </div>


        <div class="row tb-header">
            <div class="col-1">
                S.N.
            </div>
            <div class="col-3">
                Full Name
            </div>
            <div class="col-2">
                username
            </div>
            <div class="col-6">
                Action
            </div>
        </div>

        <?php 
            $sql = "SELECT admin_id, CONCAT(first_name, ' ', last_name) as fullname, username FROM admins";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);

                $sn=1;

                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['admin_id'];
                        $fullname=$rows['fullname'];
                        $username=$rows['username'];

                        ?>
                            <div class="row tb-content">
                                <div class="col-1">
                                    <?php echo $sn++; ?>
                                </div>
                                <div class="col-3">
                                    <?php echo $fullname; ?>
                                </div>
                                <div class="col-2">
                                    <?php echo $username; ?>
                                </div>
                                <div class="col-6">
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete admin</a>
                                </div>
                            </div>
                        <?php
                        
                    }
                }
                else
                {
                    
                }
            }
        ?>

</div>
<?php 
    include('partials/footer.php')
?>