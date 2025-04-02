<?php

namespace SocialLinks\Providers;

class Scoopit extends ProviderBase implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function shareUrl()
    {
        return $this->buildUrl(
            'https://www.scoop.it/bookmarklet',
            ['url']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function shareCountRequest()
    {
        return static::request(
            $this->buildUrl(
                'http://www.scoop.it/button',
                ['url'],
                ['position' => 'horizontal']
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function shareCount($response)
    {
        $document = static::htmlResponse($response);

        $count = $document->getElementById('scoopit_count');

        return (int) $count->nodeValue;
    }
}
