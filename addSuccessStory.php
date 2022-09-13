<!--== Header Area Start ==-->
<?php
include('loginCheck.php');
include('header.php');

// if (isset($_SESSION['user_details']) && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // $details = $_SESSION['user_details'];
    // if($details->account_type == '2'){
        // echo"  <script> alert('You don\'t have permission!')</script>";
        // echo"  <script>location.assign('index.php')</script>";
    // }
// }

?>

<!--== Header Area End ==-->

<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Add Achievement Story</h1>
                    <p>A story to inspire thousands of students in their future path.</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Register Page Content Start ==-->
<section id="page-content-wrap" class="bg-info">
    <div class="register-page-wrapper section-padding">
        <div class="container">
            <form method="post" action="../backend/addSuccessStory.php" enctype="multipart/form-data">

            <div class="">
                <div class="form-group">
                    <label for=""><h3>Title</h3></label>
                    <input placeholder="Enter Title Here!" required type="text" class="form-control"  name="title" />
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for=""><h3>Content</h3></label>
                        <textarea    name="content"    id="content"></textarea>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for=""><h3>Cover Photo</h3></label>
                    <input  required type="file" class="form-control" name="cover_photo" />
                </div>
                <br>
                <br>
                <div class="form-group ">
                    <input class="btn-lg btn-success float-right" type="submit" value="Publish">
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<!--== Register Page Content End ==-->

<!--== Footer Area Start ==-->
<?php
include("footer.php")
?>

<script>
    tinymce.init({
        selector: '#content',
        width: 1100,
        height: 600,
    });
</script>



