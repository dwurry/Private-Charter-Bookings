<?php
echo '<div class="form">';

$form = $this->beginWidget('CActiveForm', array('id'=>'imageUpload','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('enctype'=>'multipart/form-data')));
echo '<fieldset class="entry">';
echo "<legend>Upload Profile Picture</legend>";

echo $form->errorSummary($picture);

echo '<p></p>';
echo $picture->getImageThumb();
echo '<p></p>';
echo $form->labelEx($picture, 'filename');
echo $form->hiddenField($picture, 'id');
echo $form->hiddenField($picture, 'type');
echo CHtml::activeFileField($picture, 'image');

echo '<div class="row buttons">';
echo CHtml::submitButton('Update Picture', array('name'=>'uploadPicture'));
echo '</div>';
echo "</fieldset>";

$this->endWidget();

echo '</div>'; // <!-- form -->
?>