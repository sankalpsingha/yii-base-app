<div class="row-fluid">
    <div class="span6 offset3">


        <div class="well">
            <legend>Login</legend>
            <p>Please fill out the following form with your login credentials:</p>

            <div class="form">
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                    'id'=>'login-form',
                    'type' => 'horizontal',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                )); ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <div class="row-fluid">
                    <?php echo $form->textFieldRow($model,'username'); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>

                <div class="row-fluid">
                    <?php echo $form->passwordFieldRow($model,'password'); ?>

                </div>

                <div class="row-fluid rememberMe">
                    <?php echo $form->checkBoxRow($model,'rememberMe'); ?>
                    <?php echo $form->error($model,'rememberMe'); ?>
                </div>

                <div class="row-fluid buttons">
                    <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-info')); ?>
                </div>

                <?php $this->endWidget(); ?>
                <p class="text-error">
                    New user? <a href="<?php echo $this->createUrl('/user/create'); ?>">Register Now!</a>
                </p>
            </div><!-- form -->

        </div>
    </div>
</div>