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
 * PhpsecinfoWidget class
 *
 * @author Da:Sourcerer
 * @version 1.0
 * @license http://www.apache.org/licenses/LICENSE-2.0 ASL 2.0
 */
class PhpsecinfoWidget extends CWidget {
	public $view='application.extensions.phpsecinfo.views.index';

	public $cssFile=false;

	public function init() {
		Yii::import('application.extensions.phpsecinfo.vendors.phpsecinfo.PhpSecInfo.*');
		if($this->cssFile === false)
			$this->cssFile=dirname(__FILE__).'/assets/results.css';
		$path=Yii::app()->getAssetManager()->publish(dirname($this->cssFile));
		Yii::app()->getClientScript()->registerCssFile($path.'/'.basename($this->cssFile));
	}

	public function run() {
		$psi=new PhpSecInfo();
		$psi->loadAndRun();
		$results=$psi->getResultsAsArray();
		$tabs=array();
		foreach($results['test_results'] as $title=>$data) {
			$tabs[]=array(
				'title'=>$title,
				'view'=>'application.extensions.phpsecinfo.views._tab',
				'data'=>array(
					'data'=>$data,
				),
			);
		}
		$tabs[]=array(
			'title'=>'Skipped',
			'view'=>'application.extensions.phpsecinfo.views._tab',
			'data'=>array(
				'data'=>$results['tests_not_run'],
			),
		);
		$tabs[]=array(
			'title'=>'Summary',
			'view'=>'application.extensions.phpsecinfo.views._summary',
			'data'=>array(
				'results'=>$results['result_counts'],
				'num_run_tests'=>$results['num_tests_run'],
			),
		);
		echo $this->render($this->view, array(
			'tabs'=>$tabs,
		));
	}
}