<div class="jumbotron">
    <h1>Учетные данные</h1>

    <form id="user_data" class="classic_form">
        <div>
            <label>
                <div>
                    Login
                </div>
                <input type="text" autocomplete="off" name="User[username]" value="<?php echo $user->username ?>">
            </label>
            <label>
                <div>
                    New Password
                </div>
                <input type="password" name="User[password]" value="">
            </label>
        </div>
        <input class="btn btn-lg btn-success" type="submit" value="Изменить" onclick="updateUser();return false">
    </form>
</div>

