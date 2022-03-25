<!-- Login template -->

<?php
$title = 'Login';
include 'header.php';

?>
<div class="container">
    <form action='actions/auth_action.php' method="POST">

        <div class="from-group">
            <!-- Username -->
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" id="username" name="username" placeholder="" class="input-xlarge" required>
            </div>
        </div>

        <div class="from-group">
            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
            </div>
        </div>

        <input type="hidden" id="action" name="action" value='login'>
        <div class="from-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success">Login</button>
            </div>
        </div>
    </form>
</div>
<?php include 'footer.php';?>
