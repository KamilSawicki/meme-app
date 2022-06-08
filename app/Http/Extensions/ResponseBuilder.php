<?php

namespace App\Http\Extensions;

use stdClass;

class ResponseBuilder
{
    public static function build($data, array $schema)
    {
        dump($data);
        if (!is_iterable($data)) {
            $data = [$data];
        }

        return self::processList($data, $schema);
    }

    private static function process($data, $schema) {
        if (empty($data))
            return;

        $callbacks = array_filter($schema, function($value) {
            return is_callable($value);
        });

        $itemSchema = array_filter($schema, function($value) {
            return is_array($value);
        });

        $fields = array_filter($schema, function($value) {
            return is_string($value);
        });

        $result = [];

        foreach ($data as $key => $item) {
            if (in_array($key, $fields))
                $result[$key] = $item;
            else if (array_key_exists($key, $callbacks))
                $result[$key] = $callbacks[$key]($item);
            else if (array_key_exists($key, $itemSchema))
                if (array_is_list($item))
                    $result[$key] = self::processList($item, $itemSchema[$key]);
                else
                    $result[$key] = self::process($item, $itemSchema[$key]);
        }

        return $result;
    }

    private static function processList($data, $schema) {
        $result = [];
        foreach ($data as $item) {
            $result[] = self::process($item, $schema);
        }
        return $result;
    }
}
