# Kalender API

Ini adalah sebuah library API kalender untuk scrapping data kalender dari [kalenderbali](http://kalenderbali.org/)

## Instalasi

Install dengan composer

```bash
  composer require yama/kalender-api
```

## Contoh Penggunaan

```php
<?php

require_once __DIR__ . "/vendor/autoload.php";

use Yama\KalenderApi\Kalender;

$data = Kalender::getKalender(2023, 2);
```

| Parameter | Tipe      | Deskripsi               |
| :-------- | :-------- | :---------------------- |
| `tahun`   | `integer` | **Required**. cth: 2023 |
| `bulan`   | `integer` | **Required**. cth: 2    |

data yang di return berupa json

contoh :

```json
{
  "daysCount": 28,
  "weeksCount": 5,
  "year": 2023,
  "month": 2,
  "daily": [
    {
      "type": "before",
      "text": "2023-2-29",
      "date": 29,
      "day": "Sun",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "before",
      "text": "2023-2-30",
      "date": 30,
      "day": "Mon",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "before",
      "text": "2023-2-31",
      "date": 31,
      "day": "Tue",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-1",
      "date": 1,
      "day": "Wed",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-2",
      "date": 2,
      "day": "Thu",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-3",
      "date": 3,
      "day": "Fri",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-4",
      "date": 4,
      "day": "Sat",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-5",
      "date": 5,
      "day": "Sun",
      "holiday": null,
      "fakultatif": null,
      "peringatan": {
        "text": "2023-2-5",
        "date": "5",
        "name": "HUT HMI (Himpunan Mahasiswa Islam)"
      }
    },
    {
      "type": "current",
      "text": "2023-2-6",
      "date": 6,
      "day": "Mon",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-7",
      "date": 7,
      "day": "Tue",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-8",
      "date": 8,
      "day": "Wed",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-9",
      "date": 9,
      "day": "Thu",
      "holiday": null,
      "fakultatif": null,
      "peringatan": {
        "text": "2023-2-9",
        "date": "9",
        "name": "HUT PWI (Persatuan Wartawan Indonesia)"
      }
    },
    {
      "type": "current",
      "text": "2023-2-10",
      "date": 10,
      "day": "Fri",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-11",
      "date": 11,
      "day": "Sat",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-12",
      "date": 12,
      "day": "Sun",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-13",
      "date": 13,
      "day": "Mon",
      "holiday": null,
      "fakultatif": null,
      "peringatan": {
        "text": "2023-2-13",
        "date": "13",
        "name": "HUT Persatuan Farmasi Indonesia"
      }
    },
    {
      "type": "current",
      "text": "2023-2-14",
      "date": 14,
      "day": "Tue",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-15",
      "date": 15,
      "day": "Wed",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-16",
      "date": 16,
      "day": "Thu",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-17",
      "date": 17,
      "day": "Fri",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-18",
      "date": 18,
      "day": "Sat",
      "holiday": {
        "text": "2023-2-18",
        "date": "18",
        "name": "Isra Mikraj Nabi Muhammad SAW"
      },
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-19",
      "date": 19,
      "day": "Sun",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-20",
      "date": 20,
      "day": "Mon",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-21",
      "date": 21,
      "day": "Tue",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-22",
      "date": 22,
      "day": "Wed",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-23",
      "date": 23,
      "day": "Thu",
      "holiday": null,
      "fakultatif": null,
      "peringatan": {
        "text": "2023-2-23",
        "date": "23",
        "name": "HUT Rotary Club"
      }
    },
    {
      "type": "current",
      "text": "2023-2-24",
      "date": 24,
      "day": "Fri",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-25",
      "date": 25,
      "day": "Sat",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-26",
      "date": 26,
      "day": "Sun",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-27",
      "date": 27,
      "day": "Mon",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "current",
      "text": "2023-2-28",
      "date": 28,
      "day": "Tue",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-2-1",
      "date": 1,
      "day": "Wed",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-2-2",
      "date": 2,
      "day": "Thu",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-2-3",
      "date": 3,
      "day": "Fri",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    },
    {
      "type": "after",
      "text": "2023-2-4",
      "date": 4,
      "day": "Sat",
      "holiday": null,
      "fakultatif": null,
      "peringatan": null
    }
  ],
  "holiday": [
    {
      "text": "2023-2-18",
      "date": "18",
      "name": "Isra Mikraj Nabi Muhammad SAW"
    }
  ],
  "fakultatif": null,
  "peringatan": [
    {
      "text": "2023-2-5",
      "date": "5",
      "name": "HUT HMI (Himpunan Mahasiswa Islam)"
    },
    {
      "text": "2023-2-9",
      "date": "9",
      "name": "HUT PWI (Persatuan Wartawan Indonesia)"
    },
    {
      "text": "2023-2-13",
      "date": "13",
      "name": "HUT Persatuan Farmasi Indonesia"
    },
    { "text": "2023-2-23", "date": "23", "name": "HUT Rotary Club" }
  ]
}
```
