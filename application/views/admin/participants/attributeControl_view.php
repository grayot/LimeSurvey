<?php
/* @var $this AdminController */

// DO NOT REMOVE This is for automated testing to validate we see that page
echo viewHelper::getViewTestTag('participantsAttributeControl');

?>
<div id="pjax-content" style="margin-top: 20px;">

        <div class="row">
            <div class="container-fluid">
            <div class="row">

            </div>
            <div class="row">
                <?php
                $this->widget('bootstrap.widgets.TbGridView', array(
                    'id' => 'list_attributes',
                    'itemsCssClass' => 'table table-hover items',
                    'dataProvider' => $model->search(),
                    'columns' => $model->columns,
                    'filter'=>$model,
                    'emptyText'=>gT('No attributes found.'),
                    'htmlOptions' => array('class'=> 'table-responsive', 'style' => 'cursor: pointer;'),
                    'rowHtmlOptionsExpression' => '["data-attribute_id" => $data->attribute_id]',
                    'itemsCssClass' => 'table table-responsive table-hover',
                    'afterAjaxUpdate' => 'LS.CPDB.bindButtons',
                    'template'  => "{items}\n<div id='tokenListPager'><div class=\"col-sm-4\" id=\"massive-action-container\">$massiveAction</div><div class=\"col-sm-4 pager-container ls-ba \">{pager}</div><div class=\"col-sm-4 summary-container\">{summary}</div></div>",
                    'summaryText'   => gT('Displaying {start}-{end} of {count} result(s).').' '. sprintf(gT('%s rows per page'),
                                CHtml::dropDownList(
                                    'pageSizeAttributes',
                                    Yii::app()->user->getState('pageSizeAttributes', Yii::app()->params['defaultPageSize']),
                                    Yii::app()->params['pageSizeOptions'],
                                    array('class'=>'changePageSize form-control', 'style'=>'display: inline; width: auto'))
                                ),
                        ));
                    ?>
                </div>
        </div>

                <div id="pager">

                </div>
            </div>
        </div>
        <span id="locator" data-location="attributes">&nbsp;</span>
    </div>
</div>
