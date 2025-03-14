<?php

namespace AlifShop\AlifShop\Model\Config\Backend;

use Magento\Framework\App\Config\Value;
use Magento\Framework\Exception\LocalizedException;

class MaxDiscount extends Value
{
    /**
     * Валидация перед сохранением
     *
     * @throws LocalizedException
     */
    public function beforeSave()
    {
        $value = $this->getValue();

        // Проверяем, что введено число
        if (!is_numeric($value)) {
            throw new LocalizedException(__('Max Discount must be a number.'));
        }

        // Проверяем диапазон значений (0 - 100)
        if ($value < 0 || $value > 100) {
            throw new LocalizedException(__('Max Discount must be between 0 and 100.'));
        }

        parent::beforeSave();
    }
}