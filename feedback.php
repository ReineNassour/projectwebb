<?php
        if (isset($_SESSION['user']))
         { 
            ?>
            <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
             <div class="row justify-content-center">
             <div class="col-lg-10 border rounded p-1">
            <div class="border rounded text-center p-1">
            <div class="bg-white rounded text-center p-5">
            <h4 class="mb-4"><span class="text-primary text-uppercase" style="text-decoration: underline;">Give us your feedback!</span></h4>
            <div class="position-relative mx-auto" style="max-width: 400px;">
            <form action="submitFeedback.php" method="POST">
                                        <input class="form-control w-100 py-3 ps-4 pe-5" name="feedback" type="text" placeholder="Enter Your Feedback...">
                                        <button type="submit" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>