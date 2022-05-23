<?php

/**
 * validation用　共通メソッド
 */
class ValidationUtil
{
    /**
     * 半角英数チェック
     * 
     * @param string $value 入力値
     * @return bool 
     */
    public function isHanEisu($value)
    {
        if (!preg_match("/^[a-zA-Z0-9]+$/", $value)) {
            return false;
        }
    }

    /**
     * 文字数制限チェック
     * 
     * @param string $value 入力値
     * @param int $max_length 最大文字数
     * @return bool
     * 
     */
    public function isMaxLength($value, $max_length)
    {
        if (!mb_strlen($value > $max_length)) {
            return false;
        }
    }
}