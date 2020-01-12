<?php

/*
 * This file is part of the takeit/AmpHtmlBundle package.
 *
 * (c) Rafał Muszyński <rmuszynski1@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Takeit\Bundle\AmpHtmlBundle\Twig;

use Takeit\Bundle\AmpHtmlBundle\Generator\AmpUrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig_SimpleFilter;

/**
 * AMP Twig Extension.
 */
class AmpExtension extends AbstractExtension
{
    /**
     * @var AmpUrlGeneratorInterface
     */
    private $ampUrlGenerator;

    /**
     * @param AmpUrlGeneratorInterface $ampUrlGenerator
     */
    public function __construct(AmpUrlGeneratorInterface $ampUrlGenerator)
    {
        $this->ampUrlGenerator = $ampUrlGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('amp', [$this, 'ampFilter']),
        ];
    }

    /**
     * Returns an AMP URL.
     *
     * @param $url URL
     * @return string
     */
    public function ampFilter($url)
    {
        return $this->ampUrlGenerator->generate($url);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'takeit_amp_extension';
    }
}
