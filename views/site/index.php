<?php
/* @var $this yii\web\View */

use kartik\form\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>




<div class="row">
    
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
         
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" >
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif ?>
        <div class="well" style="padding: 30px">
            <h1 class="text-center">Upload Here</h1>
            <div class="alert alert-info" style="padding: 30px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>NOTE</strong> 
                <ul>
                    <li>Please make sure to remove the header of the file .</li>
                    <li>The file must contain only the data.  </li>
                </ul>
                 
            </div>
            <?php 
            $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data']
                ]); 
            ?>

                <?=  
                $form
                ->field($model, 'csvFile')
                ->fileInput(['accept' => '.csv']);
                ?>
                <?= Html::submitButton("Submit", ['class' => 'btn btn-lg btn-primary']); ?>
            <?php ActiveForm::end(); ?>
        </div>        
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        
    </div>

</div>


