<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>array(
		'phpversion'=>phpversion(),
		'psiversion'=>PHPSECINFO_VERSION,
		'psibuild'=>PHPSECINFO_BUILD,
		'num_run_tests'=>$num_run_tests,
	),
	'attributes'=>array(
		array(
			'label'=>'PHP Version',
			'name'=>'phpversion',
		),
		array(
			'label'=>'PhpSecInfo Version',
			'name'=>'psiversion',
		),
		array(
			'label'=>'PhpSecInfo Build',
			'name'=>'psibuild,'
		),
		array(
			'label'=>'Test runs',
			'name'=>'num_run_tests',
		),
	),
)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$results,
	'attributes'=>array(
		array(
			'label'=>'Passed',
			'name'=>PHPSECINFO_TEST_RESULT_OK,
		),
		array(
			'label'=>'Notices',
			'name'=>PHPSECINFO_TEST_RESULT_NOTICE,
		),
		array(
			'label'=>'Warnings',
			'name'=>PHPSECINFO_TEST_RESULT_WARN,
		),
		array(
			'label'=>'Skipped',
			'name'=>PHPSECINFO_TEST_RESULT_NOTRUN,
		),
		array(
			'label'=>'Errors',
			'name'=>PHPSECINFO_TEST_RESULT_ERROR,
		),
	),
)); ?>