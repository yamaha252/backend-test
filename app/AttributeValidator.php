<?php
class AttributeValidator {
    /**
     * @param mixed $data
     * @return bool
     */
    public static function isNotEmpty($data) {
        return !!$data;
    }
}
