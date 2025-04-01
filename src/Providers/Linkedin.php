<?php

namespace SocialLinks\Providers;

class Linkedin extends ProviderBase implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function shareUrl()
    {
        return $this->buildUrl(
            'https://www.linkedin.com/shareArticle',
            [
                'url',
                'title',
                'text' => 'summary',
            ],
            ['mini' => true]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function shareCountRequest()
    {
        return static::request(
            $this->buildUrl(
                'https://www.linkedin.com/countserv/count/share',
                ['url'],
                ['format' => 'json']
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function shareCount($response)
    {
        $count = self::jsonResponse($response);

        return isset($count['count']) ? intval($count['count']) : 0;
    }
}
