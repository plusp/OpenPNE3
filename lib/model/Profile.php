<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * Subclass for representing a row from the 'profile' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Profile extends BaseProfile
{
  public function getOptionsArray()
  {
    $result = array();

    $options = $this->getProfileOptions();

    foreach ($options as $option)
    {
      $result[$option->getId()] = $option->getValue();
    }

    return $result;
  }

  public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
  {
    $result = parent::toArray($keyType, $includeLazyLoadColumns);
    $result = $result + $this->getCurrentProfileI18n()->toArray($keyType, $includeLazyLoadColumns);
    return $result;
  }

  public function hydrate($row, $startcol = 0, $rehydrate = false)
  {
    try
    {
      $context = sfContext::getInstance();
    }
    catch (sfException $e)
    {
      $context = null;
    }

    if ($context)
    {
      $this->setCulture($context->getUser()->getCulture());
    }
    return parent::hydrate($row, $startcol, $rehydrate);
  }

  public function isMultipleSelect()
  {
    return (bool)('date' === $this->getFormType() || 'checkbox' === $this->getFormType());
  }

  public function isSingleSelect()
  {
    return (bool)('radio' === $this->getFormType() || 'select' === $this->getFormType());
  }
}
