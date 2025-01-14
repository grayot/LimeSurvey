<?php

/**@var Question $question */
/**@var string $questionThemeTitle */
/**@var string $questionThemeClass */

$generalSettingsUrl = $this->createUrl(
    'questionAdministration/getGeneralSettingsHTML',
    ['surveyId' => $question->sid, 'questionId' => $question->qid]
);
$advancedSettingsUrl = $this->createUrl(
    'questionAdministration/getAdvancedSettingsHTML',
    ['surveyId' => $question->sid, 'questionId' => $question->qid]
);
$extraOptionsUrl = $this->createUrl(
    'questionAdministration/getExtraOptionsHTML',
    ['surveyId' => $question->sid, 'questionId' => $question->qid]
);
$oQuestionSelector = $this->beginWidget(
    'ext.admin.PreviewModalWidget.PreviewModalWidget',
    [
        'widgetsJsName' => "questionTypeSelector",
        'renderType'    => isset($selectormodeclass) && $selectormodeclass == "none" ? "group-simple" : "group-modal",
        'modalTitle'    => gT("Select question type"),
        'groupTitleKey' => "questionGroupName",
        'groupItemsKey' => "questionTypes",
        'debugKeyCheck' => gT("Type:") . " ",
        'previewWindowTitle' => gT("Preview question type"),
        'groupStructureArray' => $aQuestionTypeGroups,
        'survey_active' => $question->survey->active=='Y',
        'value' => $question->type,
        'theme' => $questionThemeName,
        'debug' => YII_DEBUG,
        'buttonClasses' => ['btn-primary'],
        'currentSelected' => $questionThemeTitle, //todo: use questiontheme instead ...
        'optionArray' => [
            'selectedClass' => $questionThemeClass,//Question::getQuestionClass($question->type),
            'onUpdate' => [
                'value',
                'theme',
                // NB: updateQuestionAttributes is defined in assets/scripts/admin/questionEditor.js"
                "$('#question_type').val(value);
                 $('#question_template').val(theme); 
                LS.questionEditor.updateQuestionAttributes(value, theme, '$generalSettingsUrl', '$advancedSettingsUrl', '$extraOptionsUrl');"
            ]
        ]
    ]
);
?>
<?= $oQuestionSelector->getModal(); ?>

<div class="form-group col-sm-12 contains-question-selector">
    <label for="questionCode"><?= gT('Question type'); ?></label>
    <div class="btn-group" style="width: 100%;">
        <?= $oQuestionSelector->getButtonOrSelect(); ?>
        <?php $this->endWidget('ext.admin.PreviewModalWidget.PreviewModalWidget'); ?>
    </div>
    <input type="hidden" id="questionTypeVisual" name="questionTypeVisual" />
    <input type="hidden" id="question_type" name="question[type]" value="<?= $question->type; ?>" />
    <input type="hidden" id="question_template" name="question[question_template]" value="<?= $questionThemeName; ?>" />
</div>
