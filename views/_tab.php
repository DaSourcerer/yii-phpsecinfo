<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>new CArrayDataProvider($data, array(
		'keyField'=>false,
		'pagination'=>array(
			'pageSize'=>5,
		),
	)),
	'itemView'=>'application.extensions.phpsecinfo.views._view',
));