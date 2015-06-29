<?php
App::uses('AppController', 'Controller');
/**
 * Astrology Controller
 *
 * @property Job $Job
*/
class AstrologyController extends AppController {

	var $helpers = array('Html', 'Form','Ajax');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index(){
		$this->set('title','Are Katika Astrology');
		$rss = new DOMDocument();
		$feed = array();
		$link = 'http://www.findyourfate.com/rss/horoscope-astrology-feed.asp?mode=view&todate=';
		$rss->load($link);
		$feed = array();
		$count = 0;
		foreach ($rss->getElementsByTagName('item') as $node) {
			$item = array (
					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
					'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
					'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
					//'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
			array_push($feed, $item);
		}
		$this->set('feed',$feed);
	}

}
?>