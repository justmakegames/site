<?php
/**
* @author    Roland Soos
* @copyright (C) 2015 Nextendweb.com
* @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
defined('_JEXEC') or die('Restricted access');
?><?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorYouTubeByPlaylist extends N2GeneratorAbstract
{

    private $resultPerPage = 50;
    private $pages = array();
    private $youtubeClient;

    protected function _getData($count, $startIndex) {
        $client              = $this->info->getConfiguration()
                                          ->getApi();
        $this->youtubeClient = new Google_Service_YouTube($client);

        $data = array();
        try {

            $offset = $startIndex;
            $limit  = $count;
            for ($i = 0, $j = $offset; $j < $offset + $limit; $i++, $j++) {

                $items = $this->getPage(intval($j / $this->resultPerPage))
                              ->getItems();

                /** @var Google_Service_YouTube_SearchResult $item */
                $item = @$items[$j % $this->resultPerPage];
                if (empty($item)) {
                    // There is no more item in the list
                    break;
                }
                $snippet                    = $item['snippet'];
                $record                     = array();
                $record['video_id']         = $snippet['resourceId']['videoId'];
                $record['video_url']        = 'http://www.youtube.com/watch?v=' . $snippet['resourceId']['videoId'];
                $record['title']            = $snippet['title'];
                $record['description']      = $snippet['description'];
                $record['thumbnail']        = $snippet['thumbnails']['default']['url'];
                $record['thumbnail_medium'] = $snippet['thumbnails']['medium']['url'];
                $record['thumbnail_high']   = $snippet['thumbnails']['high']['url'];
                $record['channel_title']    = $snippet['channelTitle'];
                $record['channel_url']      = 'http://www.youtube.com/user/' . $snippet['channelTitle'];

                $data[$i] = &$record;
                unset($record);

            }
        } catch (Exception $e) {
            N2Message::error($e->getMessage());
        }

        return $data;
    }

    private function getPage($page) {
        if (!isset($this->pages[$page])) {
            $request = array(
                'maxResults' => $this->resultPerPage,
                'playlistId' => $this->data->get('playlist-id', '')
            );
            if ($page != 0) {
                $request['pageToken'] = $this->getPage($page - 1)
                                             ->getNextPageToken();
            }
            /** @var Google_Service_YouTube_SearchListResponse $searchResponse */
            $this->pages[$page] = $this->youtubeClient->playlistItems->listPlaylistItems('id,snippet', $request);
        }
        return $this->pages[$page];
    }
}