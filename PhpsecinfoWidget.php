<?php
/* Copyright 2013 Da:Sourcerer
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * PhpsecinfoWidget is wrapping around the {@link http://phpsecinfo.com PhpSecInfo} library.
 *
 * PhpSecInfo is a library intending to be the security equivalent of phpinfo(). This widget
 * runs the tests provided by PhpSecInfo and wraps the results up nicely in a tab view, ready
 * to be included into your dashboard.
 *
 * Please take note that the sheer presence of this widget does not add any extra security
 * whatsoever. It is merely a monitoring tool for security-related PHP settings.
 *
 * @author Da:Sourcerer <webmaster@dasourcerer.net>
 * @version 1.0
 * @license http://www.apache.org/licenses/LICENSE-2.0 ASL 2.0
 */
class PhpsecinfoWidget extends CWidget {
	/**
	 *
	 * @var string|bool
	 */
	public $cssFile=false;

	public function init() {
		Yii::import('ext.phpsecinfo.vendors.phpsecinfo.PhpSecInfo.PhpSecInfo');
		if($this->cssFile === false)
			$this->cssFile=dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'results.css';
		$path=Yii::app()->getAssetManager()->publish(dirname($this->cssFile));
		Yii::app()->getClientScript()->registerCssFile($path.DIRECTORY_SEPARATOR.basename($this->cssFile));
	}

	public function run() {
		$psi=new PhpSecInfo();
		$psi->loadAndRun();
		$results=$psi->getResultsAsArray();
		$tabs=array();
		foreach($results['test_results'] as $title=>$data) {
			$tabs[]=array(
				'title'=>CHtml::encode($title),
				'view'=>'ext.phpsecinfo.views._tab',
				'data'=>array(
					'data'=>$data,
				),
			);
		}
		$tabs[]=array(
			'title'=>'Skipped',
			'view'=>'ext.phpsecinfo.views._tab',
			'data'=>array(
				'data'=>$results['tests_not_run'],
			),
		);
		$tabs[]=array(
			'title'=>'Summary',
			'view'=>'ext.phpsecinfo.views._summary',
			'data'=>array(
				'results'=>$results['result_counts'],
				'num_run_tests'=>$results['num_tests_run'],
			),
		);
		echo $this->render('index', array(
			'tabs'=>$tabs,
		));
	}
}