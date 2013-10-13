<div class="phpsecinfo-result<?php
	$prefix=' phpsecinfo-result-';
	switch ($data['result']) {
		case PHPSECINFO_TEST_RESULT_OK:
			echo $prefix.'ok';
			break;
		case PHPSECINFO_TEST_RESULT_NOTICE:
			echo $prefix.'notice';
			break;
		case PHPSECINFO_TEST_RESULT_WARN:
			echo $prefix.'warn';
			break;
		case PHPSECINFO_TEST_RESULT_NOTRUN:
			echo $prefix.'notrun';
			break;
		case PHPSECINFO_TEST_RESULT_ERROR:
			echo $prefix.'error';
			break;
} ?>">
	<?php echo $data['message']; ?>
	<div class="right">
		<?php echo CHtml::link('More info &raquo;', $data['moreinfo_url'], array(
			'target'=>'_blank',
		)); ?>
	</div>
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$data,
		'attributes'=>array(
			array(
				'label'=>'Current value',
				'name'=>'value_current',
			),
			array(
				'label'=>'Recommended value',
				'name'=>'value_recommended',
			),
		),
	)); ?>
</div>