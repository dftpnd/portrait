<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.md5.js"></script>
<?php $this->pageTitle = Yii::app()->name . ' - Login'; ?>
<div class="site_login">
    <h1>Авторизуйтесь.</h1>

    <div class="vk">
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form', 'enableAjaxValidation' => true,));
            ?>
            <div id="maineeror">Неправильный логин или пароль</div>
            <table class="reg_form">
                <tr>
                    <td class="spechak">
                        <?php echo $form->labelEx($model, 'username'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'username', array('class' => 'regform_tro')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="spechak">
                        <?php echo $form->labelEx($model, 'password'); ?>
                    </td>
                    <td>
                        <?php echo $form->passwordField($model, 'password', array('class' => 'regform_tro')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <?php echo $form->checkBox($model, 'rememberMe'); ?>
                        <?php echo $form->label($model, 'rememberMe'); ?><br/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <span id="ajax_loade_enter"></span>

                        <div class="ajax_loade_help"></div>
                        <?php echo CHtml::submitButton('Войти', array('class' => 'enter', 'id' => 'enterbtn')); ?>
                        <script>
                            $('#enterbtn').click(function () {
                                $(this).addClass('loading');
                                var returns = false;
                                $.ajax({
                                    url: '<?php echo $this->CreateUrl('site/login'); ?>',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        "LoginForm[password]": $.md5($('#LoginForm_password').val()),
                                        "LoginForm[username]": $("#LoginForm_username").val()
                                    },
                                    success: function (data) {
                                        if (data.status == "success") {
                                            $('#enterbtn').removeClass('loading');
                                            window.location = ('/userAdmin/admin');
                                        }
                                        else {
                                            $('#enterbtn').removeClass('loading');
                                            $("#maineeror").show();
                                            $('.regform_tro').css('background', '#FF9999');
                                        }
                                    }
                                });
                                return returns;
                            });

                        </script>
                    </td>
                </tr>


            </table>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>