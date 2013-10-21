<div class="row-fluid">
    <div class="span6 offset3">
        <div class="well">
            <form class="form-horizontal" id="change-password">
                <legend>Change the user password</legend>
                <div class="control-group" style="padding-top: 30px;">
                    <label class="control-label" for="inputEmail">Old Password</label>
                    <div class="controls">
                        <input type="password" id="inputEmail" placeholder="Old Password" name="oldpass" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">New Password</label>
                    <div class="controls">
                        <input type="password" id="inputPassword" placeholder="Password" name="newpass" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="repeatPassword">Repeat New Password</label>
                    <div class="controls">
                        <input type="password" id="repeatPassword" placeholder="Password" name="repeatpass" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#change-password').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type : 'post',
            url : '/user/changepassword',
            data : $('#change-password').serialize(),
            success : function(data){
                alert(data);
            }
        });
    });
</script>