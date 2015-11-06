<?php

N2Loader::import('libraries.slider.generator.NextendSmartSliderGeneratorAbstract', 'smartslider');

class N2GeneratorTwitterTimeline extends N2GeneratorAbstract
{

    private $resultPerPage = 50;
    private $pages = array();
    private $client;

    protected function _getData($count, $startIndex) {
        $this->client = $this->info->getConfiguration()
                                   ->getApi();

        $data = array();
        try {

            $offset = $startIndex;
            $limit  = $count;
            for ($i = 0, $j = $offset; $j < $offset + $limit; $i++, $j++) {

                $items = $this->getPage(intval($j / $this->resultPerPage));

                $item = $items[$j % $this->resultPerPage];
                if (empty($item)) {
                    // There is no more item in the list
                    break;
                }

                $record['author_name']  = $item['user']['screen_name'];
                $record['author_url']   = $item['user']['url'];
                $record['author_image'] = $item['user']['profile_image_url_https'];
                $record['message']      = $this->makeClickableLinks($item['text']);
                $record['url']          = 'https://twitter.com/' . $item['user']['id'] . '/status/' . $item['id'];
                $record['url_label']    = n2_('View tweet');

                if (isset($item['entities']) && isset($item['entities']['media']) && isset($item['entities']['media'][0]) && isset($item['entities']['media'][0]['media_url'])) {
                    $data[$i]['tweet_image'] = $item['entities']['media'][0]['media_url'];
                }
                $record['source']           = $item['source'];
                $record['userid']           = $item['user']['id'];
                $record['user_name']        = $item['user']['name'];
                $record['user_description'] = $item['user']['description'];
                $record['user_location']    = $item['user']['location'];

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
                'count' => $this->resultPerPage
            );
            if ($page != 0) {
                $previousPage      = $this->getPage($page - 1);
                $request['max_id'] = $previousPage[count($previousPage) - 1]['id'];
            }
            $responseCode = $this->client->request('GET', $this->client->url('1.1/statuses/user_timeline'), $request);
            if ($responseCode == 200) {
                $this->pages[$page] = json_decode($this->client->response['response'], true);
            }
        }
        return $this->pages[$page];
    }
}