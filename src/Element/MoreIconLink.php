<?php

namespace Drupal\custom_more\Element;

use Drupal\Core\Render\Element\RenderElement;
use Drupal\Core\Render\Element\MoreLink;
use Drupal\custom_more\CustomMoreManager;

/**
 * Provides a link render element for a "more" link, like those used in blocks.
 *
 * Properties:
 * - #title: The text of the link to generate (defaults to 'More').
 *
 * See \Drupal\Core\Render\Element\Link for additional properties.
 *
 * Usage Example:
 * @code
 * $build['more'] = [
 *   '#type' => 'more_icon_link',
 *   '#url' => Url::fromRoute('examples.more_examples')
 *   '#icon' => '<span class="glyphicon glyphicon-chevron-right"></span>',
 *   '#icon_position' => 'after',
 * ]
 * @endcode
 *
 * @RenderElement("more_icon_link")
 */
class MoreIconLink extends MoreLink {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $info = parent::getInfo();
     return [
      '#title' => $this->t('More'),
      '#theme_wrappers' => [
        'container' => [
          '#attributes' => ['class' => ['more-icon-link']],
        ],
      ],
    ] + $info;
  }

  /**
   * {@inheritdoc}
   */
  public static function preRenderLink($element) {
    // Adapt code from \Drupal\bootstrap\Plugin\Prerender\Link.
    // Render the icon and the title, stitch them together, and create a
    // a new render array with the combination.
    if (!empty($element['#icon'])) {
      $title = $element['#title'];
      $icon = $element['#icon'];
      $icon_position = $element['#icon_position'];
      $element['#title'] = CustomMoreManager::appendIcon($title, $icon, $icon_position);
    }
    $element = parent::preRenderLink($element);
    return $element;
  }
}
