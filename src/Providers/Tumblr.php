<?php

namespace SocialLinks\Providers;

class Tumblr extends ProviderBase implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function shareUrl()
    {
        return $this->buildUrl(
            'https://www.tumblr.com/share',
            [
                'url' => 'u',
                'title' => 't',
            ],
            [
                'v' => 3,
            ]
        );
    }
}
