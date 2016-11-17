<?php

namespace Drupal\svg_inject\Twig;


/**
 * Class SvgInjectExtension
 * Print related nodes
 * @package Drupal\svg_inject\Twig
 */
class SvgInjectExtension extends \Twig_Extension {

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'svg_inject';
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('svg_inject', [$this, 'svgInject'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function svgInject($path) {
      $path = \Drupal::theme()->getActiveTheme()->getPath() . '/' . $path . '.svg';

      if( file_exists($path) ) {
        return file_get_contents($path);
      }
    }
}