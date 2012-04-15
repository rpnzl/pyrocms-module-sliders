<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package 		PyroCMS
 * @subpackage 		Bands In Town Widget
 * @author			Michael Giuliana
 *
 * Display events pulled from Bands In Town API v2.0
 *
 * Usage : on a CMS page add {widget_area('name_of_area')}
 * where 'name_of_area' is the name of the widget area you created in the admin control panel
 */

class Widget_Slider extends Widgets
{
	public $title		= array(
		'en' => 'Bands In Town',
	);
	public $description	= array(
		'en' => 'Display events pulled from Bands In Town API v2.0',
	);

	public $author		= 'Michael Giuliana';
	public $website		= 'http://rpnzl.com';
	public $version		= '1.0.2';

	public $fields = array(
		array(
			'field' => 'app_id',
			'label' => 'App ID',
		),
		array(
			'field' => 'limit',
			'label' => 'Limit',
		),
		array(
			'field' => 'callback',
			'label' => 'JSONP Callback',
		),
		array(
			'field' => 'location',
			'label' => 'Location',
		),
		array(
			'field' => 'mbid',
			'label' => 'Music Brainz ID',
		),
		array(
			'field' => 'artist',
			'label' => 'Artist Name',
		),
		array(
			'field' => 'fbid',
			'label' => 'Artist FB Page ID',
		),
	);


	/**
	 * Set option defaults
	 */
	public function form($options)
	{
		!empty($options['app_id']) 		OR $options['app_id'] = 'YOUR_APP_ID';
		!empty($options['limit']) 		OR $options['limit'] = 5;
		!empty($options['artist']) 		OR $options['artist'] = null;
		!empty($options['mbid']) 		OR $options['mbid'] = null;
		!empty($options['fbid']) 		OR $options['fbid'] = null;
		!empty($options['callback'])	OR $options['callback'] = null;
		!empty($options['location'])	OR $options['location'] = null;
		!empty($options['format']) 		OR $options['format'] = 'json';
		!empty($options['api_version']) OR $options['api_version'] = '2.0';
		!empty($options['display'])		OR $options['display'] = array(
			'datetime'				=> true,
			'on_sale_datetime'		=> false,
			'formatted_location'	=> true,
			'venue_name'			=> true,
			'links'					=> array(
				'tickets'			=> true,
				'google_maps'		=> false,
				'fb_event'			=> false,
			),
		);

		return array(
			'options' => $options
		);
	}


	public function run($options)
	{
		// Count number of columns to be displayed
		$colspan = 0;
		foreach($options['display'] as $item)
		{
			if( ! is_array($item))
			{
				$item == true ? $colspan++ : $colspan;
			}
			else
			{
				/**
				 * This refers to the links array only, if any of the
				 * items are true the column is displayed. All links
				 * are displayed within the same column.
				 */
				in_array(true, $item) ? $colspan++ : $colspan;
			}
		}

		// Set base URL artist attributes
		if ($options['mbid'])
		{
			$url = 'http://api.bandsintown.com/artists/mbid_'.$options['mbid'];
		}
		else if ($options['artist'])
		{
			$options['artist'] = rawurlencode($options['artist']);
			$url = 'http://api.bandsintown.com/artists/'.$options['artist'];
		}
		else
		{
			$url = 'http://api.bandsintown.com/artists/';
		}

		// Set response format
		$url = $url.'/events.'.$options['format'].'?'.'format='.$options['format'];

		// Add options
		$url = $options['fbid'] ? $url.'&artist_id=fbid_'.$options['fbid'] : $url;
		$url = $options['api_version'] ? $url.'&api_version='.$options['api_version'] : $url;
		$url = $options['app_id'] ? $url.'&app_id='.$options['app_id'] : $url;
		$url = $options['callback'] ? $url.'&callback='.$options['callback'] : $url;
		$url = $options['location'] ? $url.'&location='.urlencode($options['location']) : $url;

		// cURL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$results = $options['format'] === 'json' ? json_decode(curl_exec($ch)) : curl_exec($ch);

		// returns the variables to be used within the widget's view
		return array(
			'url'	 	=> $url,
			'results' 	=> $results,
			'options'	=> $options,
			'colspan'	=> $colspan,
		);
	}
}
