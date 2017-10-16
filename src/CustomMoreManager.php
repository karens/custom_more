<?php

namespace Drupal\custom_more;

use Drupal\bootstrap\Bootstrap;
use Drupal\bootstrap\Utility\Element;
use Drupal\Component\Render\FormattableMarkup;

/**
 * Class CustomMoreManager.
 *
 * @package Drupal\custom_more
 */
class CustomMoreManager implements CustomMoreManagerInterface {

  /**
   * Type of anchor for the more links.
   * - 'button'
   * - 'link'
   */
  public static function moreType() {
    return 'button';
  }

  /**
   * Markup for the icon.
   */
  public static function icon() {
    return Bootstrap::glyphicon('chevron-right');
  }

  /**
   * Array of classes needed to turn a link into a button.
   */
  public static function buttonClasses() {
    return [
      'btn',
      'btn-primary',
      'btn-lg',
    ];
  }

  /**
   * The attached array to add css to 'more' elements.
   */
  public static function library() {
    return ['library' => ['custom_more/more-css']];
  }

  /**
   * Append the icon to the title and return the updated title.
   */
  public static function appendIcon($title, $icon, $icon_position = 'after') {
    $rendered_icon = trim(Element::create($icon)->renderPlain());
    $rendered_text = trim(Element::create($title)->renderPlain());
    $placeholders = [
      "@title" => $rendered_text,
    ];
    if ($icon_position == 'before') {
      $markup = "$rendered_icon $rendered_text";
    }
    else {
      $markup = "$rendered_text $rendered_icon";
    }
    return new FormattableMarkup($markup, $placeholders);
  }

}
