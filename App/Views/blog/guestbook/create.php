<!-- Register Page -->
<div id="register-page" class="page box">
    <!-- Centered Content -->
    <div class="centered-content">
        <h1 class="heading">Create New GuestBook</h1>
        <!-- Form -->
        <form action="<?php echo url('/guestbook/submit'); ?>" class="form">
            <div id="form-results"></div>
            <div class="form-group">
                <label for="first_name" class="col-sm-3 col-xs-12">Details</label>
                <div class="col-sm-9 col-xs-12">
                  <textarea type="text" name="details" id="details" class="form-control" rows="10" style="resize: none"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-3 col-xs-12">Your Image Profile</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="file" name="image" id="image" class="input" />
                </div>
            </div>

            <div class="form-group">
                <div class=" col-sm-offset-3 col-sm-9">
                    <button class="button bold submit-btn">Add New GuestBook</button>
                 </div>
            </div>
        </form>
        <!--/ Form -->
    </div>
    <!--/ Centered Content -->
</div>
<!--/ Register Page -->
