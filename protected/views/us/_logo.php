<?php
echo '<div class="form">';

$form = $this->beginWidget('CActiveForm', array('id'=>'imageUpload','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('enctype'=>'multipart/form-data')));

echo '<fieldset class="entry">';
echo "<legend>Enter Broker Logo</legend>";
echo $form->errorSummary($image);

echo '<p></p>';
echo $image->getImageThumb();
echo '<p></p>';
echo $form->labelEx($image, 'filename');
echo $form->hiddenField($image, 'id');
echo $form->hiddenField($image, 'type');
echo CHtml::activeFileField($image, 'image');

echo '<div class="row buttons">';
echo CHtml::submitButton('Update Logo', array('name'=>'uploadLogo'));
echo "</fieldset>";
echo '</div>';

$this->endWidget();

echo '</div>'; // <!-- form -->
?>