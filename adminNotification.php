<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" type='text/css' crossorigin="anonymous" />
<link rel="stylesheet" href="../assets/frontend/assests/notification.css" type="text/css"/>
<?php
    include('loginCheck.php');
    include('header.php');
?>
<div class="row justify-content-center my-2">
    <div class="col-lg-6 mt-4" id="showNotification"></div>
    <?php
        include('database/db_connect.php');

        $sql = "SELECT * FROM success_story WHERE is_valid=0";
        $not_varified = [];

        $result = $conn->query($sql);
        $not_varified = $result->fetch_all();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 right">
                <div class="box shadow-sm rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Notifications</h6>
                    </div>
                    <?php foreach ($not_varified as $item){
                    ?>
                    <?php
                        $sql = "SELECT name,id from users where id=$item[4]";
                        $result = $conn->query($sql);
                        $name = $result->fetch_all();
                        $name = $name[0];
                    ?>

                    <form method="post" name="notificationToPost" id="notificationToPost" action="successStory.php" class="box-body p-0" >
                        <input type="hidden" value="<?php echo $name;  ?>">  <!-- pdo here || id here  -->
                        <input name="id" hidden value="<?php echo $item[0]?>">
                        <button type="submit" style="border: 0; width: 100%;">
                        <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">

                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                        </div>
                        <input name="id" hidden value="<?php echo $item[0]?>">
                        <?php 
                            echo "<script>console.log('Sending -->', $item[0])</script>"; 
                        ?>
                        <div class="font-weight-bold mr-3" onClick="document.forms['notificationToPost'].submit();">
                            <div class="text-truncate"><?php echo $name[0] ?> shares a story.</div> 
                            <div class="small"><?php echo substr($item[2], 0, 20)?></div>
                        </div>

                        <div class="font-weight-bold mr-3">
                            <div class="text-truncate"><?php echo $name[0] ?> shares a story.</div> 
                            <div class="small"><?php echo substr($item[2], 0, 20)?></div>
                        </div>


                            <!-- <span class="ml-auto mb-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                        <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                    </div>
                                </div>
                                <br />
                                <div class="text-right text-muted pt-1">3d</div>
                            </span> -->
                        </div>
                        </button>
                    </form>


                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    

</div>

<!-- Footer Area -->
</div>
</div>
</div>
<script type="text/javascript">$(document).ready(function(){
    //fetch noti ajax request
    function fetchNotification(){
        $.ajax({
            url: 'adminAction.php',
            method:'post',
            data: {action: 'fetchNotification'},
            seccess: function(response){
                console.log(response);
            }
        });
    }
});

</script>
<?php
include("footer.php")
?>
</body>
</html>
