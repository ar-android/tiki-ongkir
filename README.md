# Tiki Ongkir

[![Build Status](https://img.shields.io/badge/packagist-v1.0.0-blue.svg)](https://packagist.org/packages/ocittwo/tiki-ongkir)

Library untuk cek ongkos kirim dengan jasa pengiriman tiki.

## Install
```composer
composer require ocittwo/tiki-ongkir
```

## Usage

```php

<?php 

require_once __DIR__.'/vendor/autoload.php';

use TikiOngkir\Tiki;

$tiki = new Tiki;
$tiki->origin = 'Jakarta';
$tiki->destination = 'Bandung';
$tiki->tariff_code_origin = 'CGK01.00';
$tiki->tariff_code_destination = 'BDO01.00';
$tiki->weight = 1;


echo json_encode($tiki->getResult());
```

### Result

```json
{
  "success": true,
  "origin": "Jakarta",
  "destination": "Bandung",
  "weight": "1 Kg",
  "result": [
    {
      "product_code": "REG",
      "product_price": "Rp 10.000"
    },
    {
      "product_code": "ECO",
      "product_price": "Rp 8.000"
    },
    {
      "product_code": "ONS",
      "product_price": "Rp 20.000"
    },
    {
      "product_code": "SDS",
      "product_price": "Rp 181.000"
    },
    {
      "product_code": "HDS",
      "product_price": "Rp 42.000"
    },
    {
      "product_code": "TRC",
      "product_price": "Rp 25.000"
    }
  ]
}
```

# License
Read [MIT License](LICENSE)