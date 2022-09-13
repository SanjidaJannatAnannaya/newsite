
<!--== Header Area Start ==-->
<?php
include('loginCheck.php');
include('header.php');
?>
<!--== Header Area End ==-->

<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Achievement</h1>
                    <p>Achievement story that Inspires millions.</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Register Page Content Start ==-->
<section id="page-content-wrap">

    <div class="blog-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <!-- Blog content Area Start -->
                <div class="">
                    <div class="blog-page-contant-start">
                        <div class="row">

                            <?php
                            include('database/db_connect.php');

                            $sql = "SELECT * FROM success_story";
                            $stories = [];

                            if (isset($_SESSION['user_details']) && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                                $details = $_SESSION['user_details'];
                                $id = $details->faculty_id_fk;
                                if($details->account_type == '0'){
                                    $output = "Admin";
                                    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                                    $sql = "SELECT * FROM success_story;";
                                    $result = $conn->query($sql);
                                    $stories = $result->fetch_all();
                                }else if($details->account_type == '1'){
                                    // $midQuery = "SELECT department FROM faculty WHERE student_id=$id ";
                                    // $result = $conn->query($midQuery);
                                    // $dept = $result->fetch_all();
                                    $output = "Faculty";
                                    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                                    $sql = "SELECT * FROM success_story order by is_valid ASC;";
                                    $result = $conn->query($sql);
                                    $stories = $result->fetch_all();
                                }else{
                                    $output = "General";
                                    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                                    $uid = $details->id;
                                    $sql = "SELECT * FROM success_story WHERE user_id_fk=$uid;";
                                    $result = $conn->query($sql);
                                    $stories0 = $result->fetch_all();
                                    $sql1 = "SELECT * FROM success_story WHERE is_valid=1;";
                                    $result = $conn->query($sql1);
                                    $stories1 = $result->fetch_all();
                                    $stories = array_merge($stories0, $stories1);
                                }
                            }
                            ?>
                            <!--== Single Blog Post start ==-->
                            <?php foreach ($stories as $item) {
                                // session_start();
                                $_SESSION['id'] =$item[0];
                                ?>
                            <div class="col-lg-6 col-md-6">
                                <article class="single-blog-post">
                                    <figure class="blog-thumb">
                                        <div class="blog-thumbnail">
                                            <img src="../backend/storage/<?php echo $item[3] ?>" alt="Blog" class="img-fluid" />
                                        </div>
<!--                                        <figcaption class="blog-meta clearfix">-->
<!--                                            <a  class="author">-->
<!--                                                <div class="author-pic">-->
<!--                                                    <img src="assets/img/blog/author.jpg" alt="Author">-->
<!--                                                </div>-->
<!--                                                <div class="author-info">-->
<!--                                                    <h5>Daney williams</h5>-->
<!--                                                    <p>2 hours Ago</p>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <div class="like-comm pull-right">-->
<!--                                                <a href="#"><i class="fa fa-comment-o"></i>77</a>-->
<!--                                                <a href="#"><i class="fa fa-heart-o"></i>12</a>-->
<!--                                            </div>-->
<!--                                        </figcaption>-->
                                    </figure>

                                    <?php
                                        // session_start();
                                        $id = $_SESSION['id'];                                        
                                        // function button1() {
                                        //     echo "<script> console.log('Button is clicked') </script>";
                                        // }
                                        if(array_key_exists('button1', $_POST)) {
                                            $details = $_SESSION['user_details'];
                                            if($details->account_type != '1'){
                                                echo "<script>alert('You don\'t have permission for this operation')</script>";
                                                echo "<script>location.assign('index.php')</script>";
                                            }else{
                                                $sql = "UPDATE success_story SET is_valid=1 WHERE id=$id";
                                                $conn->query($sql);
                                            }
                                            //button1();
                                        }
                                    ?>

                                    <div class="blog-content">
                                        <h3>
                                            <a>
                                                <?php echo substr($item[1],0,45) ?>.....
                                            </a>
                                        </h3>
                                        <p>
                                            <?php echo substr($item[2],0,200) ?>...
                                        </p>
                                        <div  style="display: flex; flex-direction: row;">
                                        <span>
                                            <form method="post" action="singleSuccessStory.php">
                                                <input name="id" hidden value="<?php echo $item[0]?>">
                                                <input type="submit" class="btn btn-brand" value="More">
                                            </form>
                                        </span>
                                        <span style="margin-left: 15px;">
                                            <form method="post">
                                                <input name="id" hidden value="<?php echo $item[0]?>">
                                                
                                                <?php if ($item[5] == 0):?>
                                                    <input type="submit" name="button1" class="btn btn-brand" value="Pending">
                                                <?php endif?>
                                                <?php if ($item[5] == 1):?>
                                                    <input type="submit" name="button2" class="btn btn-brand" value="Verified">
                                                <?php endif?>
                                            </form>
                                        </span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php } ?>
                            <!--== Single Blog Post End ==-->
                        </div>

                        <!-- Pagination Start -->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-12">-->
<!--                                <div class="pagination-wrap text-center">-->
<!--                                    <nav>-->
<!--                                        <ul class="pagination">-->
<!--                                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>-->
<!--                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">...</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">50</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </nav>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- Pagination End -->
                    </div>
                </div>
                <!-- Blog content Area End -->
            </div>
        </div>
    </div>

</section>
<!--== Register Page Content End ==-->

<!--== Footer Area Start ==-->
<?php
include("footer.php")
?>

