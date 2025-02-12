<?php
/* @var $this AdminController  */
/* @var $dataProvider CActiveDataProvider */

// DO NOT REMOVE This is for automated testing to validate we see that page
echo viewHelper::getViewTestTag('homepageSettings');

App()->getClientScript()->registerScript('HomepageSettingsBSSwitcher', "
LS.renderBootstrapSwitch();
", LSYii_ClientScript::POS_POSTSCRIPT);

?>
<script type="text/javascript">
    strConfirm='<?php eT('Please confirm','js');?>';
    strCancel='<?php eT('Cancel','js');?>';
    strOK='<?php eT('OK','js');?>';
</script>

<div class="col-lg-12 list-surveys" style="margin-top: 20px;">

    <div class="row">

        <!-- Tabs --> 
        <ul class="nav nav-tabs" id="boxeslist" role="tablist">
            <li class="active">
                <a href='#boxes'>
                    <?php eT('Boxes') ?>
                </a>
            </li>
            <li>
                <a href='#boxsettings'>
                    <?php eT('Box Settings'); ?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Boxes -->
            <div id="boxes" class="tab-pane active">
                <?php $this->widget('bootstrap.widgets.TbGridView',
                    array(
                        'dataProvider' => $dataProviderBox,
                        'summaryText'=>gT('Displaying {start}-{end} of {count} result(s).'),
                        'columns' => array(
                    array(
                        'header' => gT('Position'),
                        'name' => 'position',
                        'value'=>'$data->position',
                        'htmlOptions' => array('class' => 'col-md-1'),
                    ),
                    array(
                        'header' => gT('Action'),
                        'name' => 'actions',
                        'value'=>'$data->buttons',
                        'type'=>'raw',
                        'htmlOptions' => array('class' => 'col-md-1'),
                    ),
                    array(
                        'header' => gT('Title'),
                        'name' => 'title',
                        'value'=>'$data->title',
                        'htmlOptions' => array('class' => 'col-md-1'),
                    ),
                    array(
                        'header' => gT('Icon'),
                        'name' => 'icon',
                        'value'=>'$data->spanicon',
                        'type'=>'raw',
                        'htmlOptions' => array('class' => 'col-md-1'),
                    ),
                    array(
                        'header' => gT('Description'),
                        'name' => 'desc',
                        'value'=>'$data->desc',
                        'htmlOptions' => array('class' => 'col-md-1'),
                    ),
                    array(
                        'header' => gT('URL'),
                        'name' => 'url',
                        'value'=>'$data->url',
                        'htmlOptions' => array('class' => 'col-md-1'),
                    ),
                    array(
                        'header' => gT('User group'),
                        'name' => 'url',
                        'value'=>'$data->usergroupname',
                        'htmlOptions' => array('class' => 'col-md-1'),
                    ),
                ),
            ));
            ?>
            </div>
            <!-- Box Settings -->
            <div id="boxsettings" class="tab-pane">
               
                <div class="row">
                    <label class="col-sm-2 control-label"><?php eT("Display logo:");?> </label>
                    <div class="col-sm-2">
                        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'show_logo', 'id'=>'show_logo', 'value'=>$bShowLogo, 'onLabel'=>gT('On'),'offLabel'=>gT('Off')));?>

                        <input type="hidden" id="show_logo-url" data-url="<?php echo App()->createUrl('homepageSettings/toggleShowLogoStatus');?>" />
                    </div>

                    <label class="col-sm-2 control-label"><?php eT("Show last visited survey and question:");?> </label>
                    <div class="col-sm-2">
                        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'show_last_survey_and_question', 'id'=>'show_last_survey_and_question', 'value'=>$bShowLastSurveyAndQuestion, 'onLabel'=>gT('On'),'offLabel'=>gT('Off')));?>
                        <input type="hidden" id="show_last_survey_and_question-url" data-url="<?php echo App()->createUrl('homepageSettings/toggleShowLastSurveyAndQuestion');?>" />
                    </div>

                    <br/><br/>
                </div>

                <div class="row">
                    <label class="col-sm-2 control-label"><?php eT("Show survey list:");?> </label>
                    <div class="col-sm-2">
                        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'show_survey_list', 'id'=>'show_survey_list', 'value'=>$bShowSurveyList, 'onLabel'=>gT('On'),'offLabel'=>gT('Off')));?>
                        <input type="hidden" id="show_survey_list-url" data-url="<?php echo App()->createUrl('homepageSettings/toggleShowSurveyList');?>" />
                    </div>

                    <label class="col-sm-2 control-label"><?php eT("Show search box on survey list:");?> </label>
                    <div class="col-sm-2">
                        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'show_survey_list_search', 'id'=>'show_survey_list_search', 'value'=>$bShowSurveyListSearch, 'onLabel'=>gT('On'),'offLabel'=>gT('Off')));?>
                        <input type="hidden" id="show_survey_list_search-url" data-url="<?php echo App()->createUrl('homepageSettings/toggleShowSurveyListSearch');?>" />
                    </div>

                    <br/><br/>
                </div>

                <div class="row">
                    <label class="col-sm-2 control-label"><?php eT("Wrap container around boxes");?> </label>
                    <div class="col-sm-2">
                        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'boxes_in_container', 'id'=>'boxes_in_container', 'value'=>$bBoxesInContainer, 'onLabel'=>gT('On'),'offLabel'=>gT('Off')));?>
                        <input type="hidden" id="boxes_in_container-url" data-url="<?php echo App()->createUrl('homepageSettings/changeBoxesInContainer');?>" />
                    </div>
                    <br/><br/>
                    <br/><br/>
                </div>

                <div class="row">
                    <label class="col-sm-2 control-label"><?php eT("Boxes by row:");?></label>
                    <div class="col-sm-1">
                        <input class="form-control" type="number" id="iBoxesByRow" value="<?php echo $iBoxesByRow;?>" max="6" min="0" name="boxes_by_row"/>
                    </div>
                    <label class="col-sm-2 col-sm-offset-1 control-label"><?php eT("Box orientation:");?></label>
                    <div class="col-sm-1">
                        <select  class="form-control" id="iBoxesOffset" name="boxes_offset">
                            <option value="1" <?php if($iBoxesOffset=='1'){ echo "selected"; } ?> ><?php eT('Left to right') ?></option>
                            <option value="2" <?php if($iBoxesOffset=='2'){ echo "selected"; } ?> ><?php eT('Right to left') ?></option>
                            <option value="3" <?php if($iBoxesOffset=='3'){ echo "selected"; } ?> ><?php eT('Centered') ?></option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="hidden" id="boxesupdatemessage" data-ajaxsuccessmessage="<?php eT('Box settings updated!');?>" />
                        <button class="btn btn-default" type="button" id="save_boxes_setting" data-url="<?php echo App()->createUrl('homepageSettings/updateBoxesSettings');?>"><?php eT('Save boxes settings');?></button>
                    </div>
                    <br/><br/><br/><br/>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $('#boxeslist a').click(function (e) {
        window.location.hash = $(this).attr('href');
        e.preventDefault();
        $(this).tab('show');
    });
    $(document).on('ready pjax:scriptcomplete', function() {
        if (window.location.hash) {
            $('#boxeslist').find('a[href=' + window.location.hash+']').trigger('click');
        }
    });
</script>
