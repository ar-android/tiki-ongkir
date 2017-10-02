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

## Get Origin and Destination

Untuk mendapatkan data origin dan destination silahkan buka pada URL berikut ini dengan method GET.

```

https://tiki.id/etc/CariDaerah/...

Contoh : 
https://tiki.id/etc/CariDaerah/Bandung

json => 
[
  {
    "daerah": "Andir, Bandung",
    "tariff_code": "BDO01.00",
    "importance": "3",
    "tariff_diff": "0"
  },
  {
    "daerah": "Antapani (Cicadas), Bandung",
    "tariff_code": "BDO01.00",
    "importance": "3",
    "tariff_diff": "0"
  },
  {
    "daerah": "Arcamanik, Bandung",
    "tariff_code": "BDO01.00",
    "importance": "3",
    "tariff_diff": "0"
  },
  {
    "daerah": "Arjasari, Bandung",
    "tariff_code": "BDO80.00",
    "importance": "3",
    "tariff_diff": "0"
  },
  {
    "daerah": "Astana Anyar, Bandung",
    "tariff_code": "BDO01.00",
    "importance": "3",
    "tariff_diff": "0"
  },
  {
    "daerah": "Babakan Ciparay, Bandung",
    "tariff_code": "BDO01.00",
    "importance": "3",
    "tariff_diff": "0"
  }
]

```

# License
Read [MIT License](LICENSE)