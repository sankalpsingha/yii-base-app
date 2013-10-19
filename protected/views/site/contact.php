<div class="row-fluid">

<div class="span10 offset1 well">

    <legend>Contact Us</legend>
    <?php

    // This is for the flash messages
    $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'×', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
        ),
        'htmlOptions' => array('id' => 'myAlert'),

    ));
    ?>

        <p class="text-info">
            If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
        </p>

        <div class="form">

            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'contact-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->errorSummary($model); ?>

            <div class="row-fluid">
                <?php echo $form->textFieldRow($model,'name', array('class'=>'span12')); ?>
            </div>

            <div class="row-fluid">
                <?php echo $form->textFieldRow($model,'email', array('class'=>'span12')); ?>
            </div>

            <div class="row-fluid">
                <?php echo $form->textFieldRow($model,'subject',array('class'=>'span12','maxlength'=>128)); ?>
            </div>

            <div class="row-fluid">
                <?php echo $form->textAreaRow($model,'body',array('row-fluids'=>6, 'rows'=>6, 'class'=>'span12')); ?>
            </div>

            <?php if(CCaptcha::checkRequirements()): ?>
                <div class="row-fluid" style="margin-top: 20px; text-align: center">
                    <div>
                        <?php $this->widget('CCaptcha'); ?>
                        <?php echo $form->textFieldRow($model,'verifyCode'); ?>
                    </div>
                    <div class="text-info">Please enter the letters as they are shown in the image above.
                        <br/>Letters are not case-sensitive.</div>
                    <?php echo $form->error($model,'verifyCode'); ?>
                </div>
            <?php endif; ?>

            <div class="span3 offset4" style="margin-top: 20px;">
                <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-danger btn-large span12')); ?>
            </div>

            <?php $this->endWidget(); ?>

        </div><!-- form -->

</div>
</div>