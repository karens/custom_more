<?php

namespace Drupal\custom_more;

/**
 * Interface CustomMoresManagerInterface.
 *
 * @package Drupal\custom_more
 */
interface CustomMoreManagerInterface {

  /**
   * Type of anchor for the more links.
   * - 'button'
   * - 'link'
   */
  public static function moreType();

  /**
   * Markup for the icon.
   */
  public static function icon();

  /**
   * Array of classes needed to turn a link into a button.
   */
  public static function buttonClasses();

  /**
   * The attached array to add css to 'more' elements.
   */
  public static function library();

  /**
   * Append the icon to the title and return the updated title.
   */
  public static function appendIcon($title, $icon, $icon_position = 'after');

}
