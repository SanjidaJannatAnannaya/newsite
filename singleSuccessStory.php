
<!--== Header Area Start ==-->
<?php
include('header.php');
include("database/db_connect.php");
?>
<!--== Header Area End ==-->

<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Success Story</h1>
                    <p>Success Story That Inspires thousands.</p>
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
                <?php
                    $blog_id = $_POST['id'];

                    $sql = "SELECT * from success_story where id=$blog_id";
                    $result = $conn->query($sql);
                    $blog_details = $result->fetch_assoc();
                    $_SESSION['isverified'] = $blog_details[5];
                ?>
                <!-- Blog content Area Start -->
                <div class="col-lg-10 m-auto">
                    <article class="single-blog-content-wrap">
                        <header class="article-head">
                            <div class="single-blog-thumb">
                                <img src="../backend/storage/<?php echo $blog_details['cover_photo'] ?>" class="img-fluid" alt="Blog">
                            </div>
                            <div class="single-blog-meta">
                                <h2><?php echo $blog_details['title'] ?></h2>
<!--                                <div class="posting-info">-->
<!--                                    <a href="#">23 May 2017</a> • Posted by: <a href="#">Admin</a>-->
<!--                                </div>-->
                            </div>
                        </header>
                        <section class="blog-details">
                           <p>
                               <?php
                               echo $blog_details['content'];
                               ?>
                           </p>
                        </section>

                        <?php
                            if(array_key_exists('postBtn', $_POST)) {
                                $details = $_SESSION['user_details'];
                                if($details->account_type != '1'){
                                    echo "<script>alert('You don\'t have permission for this operation')</script>";
                                    echo "<script>location.assign('index.php')</script>";
                                }else{
                                    // echo "<script>console.log($bid)</script>";
                                    $sql = "UPDATE success_story SET is_valid=1 WHERE id=$bid";
                                    // echo "<script>console.log('SQL -->, $sql)</script>";
                                    $conn->query($sql);
                                    echo "<script>alert('Post verified')</script>";
                                    echo "<script>location.assign('index.php')</script>";
                                }
                            }
                        ?>

                        <footer class="post-share">
                            <div class="row no-gutters ">
                                <div class="col-10">
                                    <div class="shareonsocial">
                                        <span>Share:</span>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-vimeo"></i></a>
                                    </div>
                                </div>
                                <div  style="display: flex; flex-direction: row;">
                                    <span>
                                        <form method="post" action="successStory.php">
                                            <input type="submit" class="btn btn-brand" value="Back">
                                        </form>
                                    </span>
                                    <span style="margin-left: 15px;">
                                        <form method="post">
                                            <input name="id" hidden value="<?php echo $blog_details[0]?>">
                                            <?php if ($_SESSION['isverified'] == 0):?>
                                                <input type="submit" name="postBtn" class="btn btn-brand" value="Verify">
                                            <?php endif?>
                                        </form>
                                    </span>
                                </div>
                                <!-- <div class="col-2 text-right" style="display:flex; flex-direction:row;"> -->
                                    <!-- <a class="btn btn-lg btn-info" href="successStory.php">
                                        <h4 class="bold text-white">Verify</h4>
                                    </a> -->
                                    <!-- <a class="btn btn-lg btn-info" href="successStory.php">
                                        <h4 class="bold text-white">Achievements</h4>
                                    </a> -->
                                    <!-- <input type="submit" name="button1" class="btn btn-brand" value="Pending">
                                    <input type="submit" name="button1" class="btn btn-brand" value="Verity">
                                </div> -->
                            </div>
                        </footer>
                    </article>
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

