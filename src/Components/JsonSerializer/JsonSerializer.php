<?php

namespace Robot\Components\JsonSerializer;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class JsonSerializer extends Serializer
{

    public function __construct()
    {
        $normalizers = [
            new ArrayDenormalizer($this),
            new ObjectNormalizer(
                null,
                null,
                null,
                new PhpDocExtractor()
            ),
        ];

        $encoders = [
            new JsonEncoder(),
        ];
        parent::__construct($normalizers, $encoders);
    }


}
