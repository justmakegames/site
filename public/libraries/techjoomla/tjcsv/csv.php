<?php
/**
 * @version    SVN: <svn_id>
 * @package    Techjoomla.Libraries
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Import tag replacement library
jimport('techjoomla.tjmail.mail');

/**
 * TjCsv
 *
 * @package     Techjoomla.Libraries
 * @subpackage  TjCsv
 * @since       1.0
 */
class TjCsv
{
	/**
	 *  Should I produce a CSV header row.
	 *
	 * @var  boolean
	 */
	protected $csv_colHeading = true;

	/**
	 * The filename of the downloaded CSV file.
	 *
	 * @var  string
	 */
	protected $csvFilename = null;

	/**
	 * The columns to include in the CSV output. If it's empty it will be ignored.
	 *
	 * @var  array
	 */
	protected $csvFields = array();

	/**
	 * Public constructor.
	 *
	 * @param   array  $config  The configuration overrides for the view
	 *
	 * @since 1.0
	 */
	public function __construct(array $config = array())
	{
		if (array_key_exists('csv_filename', $config))
		{
			$this->csvFilename = $config['csv_filename'];
		}

		if (array_key_exists('csv_colHeading', $config))
		{
			$this->csv_colHeading = $config['csv_colHeading'];
		}

		if (array_key_exists('csv_fields', $config))
		{
			$this->csvFields = $config['csv_fields'];
		}
	}

	/**
	 * Export Data in the form of CSV
	 *
	 * @param   Array  $items  Two Objects list array
	 *
	 * E.g Input Multidimensional array : Array
	 *		Array
	 *		(
	 *			[0] => stdClass Object
	 *			(
	 *				[id] => 1
	 *				[campaign_title] => Resize and crop all images
	 *			)
	 *			[1] => stdClass Object
	 *			(
	 *				[id] => 2
	 *				[campaign_title] => Resize and crop all images
	 *			)
	 *		)
	 *
	 * @return CSV export
	 */
	public function CsvExport($items)
	{
		// Prepare the column name
		foreach ($items as $object)
		{
			$csv  = array();
			$rec = $object;

			// If it is object then convert it to array
			if (is_object($object))
			{
				$rec = (array) $object;
			}

			$array_keys = array_keys($rec);

			foreach ($array_keys as $v)
			{
				$v = ucfirst($v);
				$v = str_replace('"', '""', $v);
				$v = str_replace("\r", '\\r', $v);
				$v = str_replace("\n", '\\n', $v);
				$v = '"' . $v . '"';

				$csv[] = $v;
			}

			echo implode(",", $csv) . "\r\n";
			break;
		}

		// Prepare records
		foreach ($items as $object)
		{
			$csv  = array();

			// If it is object then convert it to array
			if (is_object($object))
			{
				$rec = (array) $object;
			}

			foreach ($rec as $key => $v)
			{
				$v = str_replace('"', '""', $v);
				$v = str_replace("\r", '\\r', $v);
				$v = str_replace("\n", '\\n', $v);
				$v = '"' . $v . '"';

				$csv[] = $v;
			}

			echo implode(",", $csv) . "\r\n";
		}

		// Code to write and download xsl file using php
		header("Content-type: application/vnd.ms-excel");
		header("Content-disposition: csv" . date("Y-m-d") . ".csv");

		// Set file name
		header("Content-disposition: filename=" . $this->csvFilename . ".csv");

		jexit();
	}

	/**
	 * Replace the tags with particular value
	 *
	 * @param   String   $text              Email body message including tags, E.g: Hi {donor.first_name}, Thank you for your
	 * donation to campaign {campaign.name}. The donor from {city}, {country}
	 *
	 * @param   Array    $value             Multidimensional Objects array
	 *
	 * E.g Input Multidimensional array : Array (
	 * 		[city] 	  => Pune
	 * 		[country] => India
	 *		[campaign] => stdClass Object
	 *			(
	 *				[title] => Nepal earthquake
	 *			)
	 *		[donor] => stdClass Object
	 *			(
	 *				[first_name] => Amol
	 *				[last_name] => Ghatol
	 *			 )
	 * )
	 *
	 * @param   Boolean  $replaceWithBlank  If no content found for tag & then replace content this tag with blank
	 *
	 * @return tag replaced text
	 */
	public static function tagReplace($text, $value, $replaceWithBlank = true)
	{
		// Get all tags in array to replace, E.g array {'campaign.name', 'donor.first_name'}
		$pattern = "/{([^}]*)}/";
		preg_match_all($pattern, $text, $matches);

		$tags = $matches[1];

		// Find the matching content for each & replace it if found
		foreach ($tags as $key => $tag)
		{
			$tag_split = explode('.', trim($tag));

			// For the single dimension array E.g
			if (count($tag_split) == 1)
			{
				// Get the array field name E.g Array ( [city] => Pune )
				$array_name = $tag_split[0];

				// Check if field name exist E.g [city]
				if (isset($value[$array_name]))
				{
					// Get the value to replace tag. E.g. Pune
					$replaceWith = $value[$array_name];
					$text        = str_replace('{' . $tag . '}', $replaceWith, $text);
				}
				elseif ($replaceWithBlank)
				{
					$text = str_replace('{' . $tag . '}', '', $text);
				}
			}
			elseif (count($tag_split) >= 1)
			{
				// Subarray name where check the tag replacment content. E.g 'donor'
				$array_name = $tag_split[0];

				// Name of the column. E.g 'first_name'
				$column_name = $tag_split[1];

				// Check if the array exist for entered array name. E.g Check if 'donor' array exist
				if (isset($value[$array_name]))
				{
					// Check if selected column value available. E.g Check if 'first_name' value exist in 'donor' array
					if (isset($value[$array_name]->$column_name))
					{
						// Get the value to replace tag. E.g. Amol
						$replaceWith = $value[$array_name]->$column_name;

						// Replace tag. E.g replace {donor.first_name} with Amol
						$text = str_replace('{' . $tag . '}', $replaceWith, $text);
					}
					elseif ($replaceWithBlank)
					{
						$text = str_replace('{' . $tag . '}', '', $text);
					}
				}
				elseif ($replaceWithBlank)
				{
					$text = str_replace('{' . $tag . '}', '', $text);
				}
			}
		}

		return $text;
	}
}
