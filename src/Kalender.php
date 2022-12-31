<?php

namespace Yama\KalenderApi;

use voku\helper\HtmlDomParser;

class Kalender
{
    public static function getKalender(int $tahun, int $bulan)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://kalenderbali.org/klasik/?bl=' . $bulan . '&th=' . $tahun,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $html = HtmlDomParser::str_get_html($response);
        $hari_penting = $html->findMulti('div.waralist')->innerText();
        $hari_libur = [];
        $hari_fakultatif = [];
        $hari_peringatan = [];
        foreach ($hari_penting as $hp) {
            $hp = explode('<br>', $hp);
            foreach ($hp as $h) {
                if (strpos($h, '<strong>HARI LIBUR</strong>') !== false) {
                    $h = HtmlDomParser::str_get_html($h)->findMulti('div[style="padding-bottom:7px; color:#FF0000"] a')->text();
                    foreach ($h as $d) {
                        $libur = explode('.', $d);
                        $hari_libur[] = [
                            'text' => $tahun . '-' . $bulan . '-' . $libur[0],
                            'date' => $libur[0],
                            'name' => preg_replace('/\s\s+/', ' ', str_replace(array("\n", "\r"), '', html_entity_decode(trim($libur[1])))),
                        ];
                    }
                } elseif (strpos($h, '<strong>HARI FAKULTATIF</strong>') !== false) {
                    $h = HtmlDomParser::str_get_html($h)->findMulti('div[style="padding-bottom:7px"] a')->text();
                    foreach ($h as $d) {
                        $fakultatif = explode('.', $d);
                        $hari_fakultatif[] = [
                            'text' => $tahun . '-' . $bulan . '-' . $fakultatif[0],
                            'date' => $fakultatif[0],
                            'name' => preg_replace('/\s\s+/', ' ', str_replace(array("\n", "\r"), '', html_entity_decode(trim($fakultatif[1])))),
                        ];
                    }
                } elseif (strpos($h, '<strong>HARI PERINGATAN</strong>') !== false) {
                    $h = HtmlDomParser::str_get_html($h)->findMulti('div[style="padding-bottom:7px"] a')->text();
                    foreach ($h as $d) {
                        $peringatan = explode('.', $d);
                        $hari_peringatan[] = [
                            'text' => $tahun . '-' . $bulan . '-' . $peringatan[0],
                            'date' => $peringatan[0],
                            'name' => preg_replace('/\s\s+/', ' ', str_replace(array("\n", "\r"), '', html_entity_decode(trim($peringatan[1])))),
                        ];
                    }
                }
            }
        }
        $bulanBefore = $bulan < 2 ? 12 : $bulan - 1;
        $tahunBefore = $bulan < 2 ? $tahun - 1 : $tahun;
        $firstDay = date("D", strtotime($tahun . '-' . $bulan . '-1')); //nama hari
        $lastDate = (int)date("t", strtotime($tahun . '-' . $bulan . '-1')); //tanggal terakhir
        $lastDateBefore = (int)date("t", strtotime($tahunBefore . '-' . $bulanBefore . '-1')); //tanggal terakhir bulan lalu
        $tglBulanIni = range(1, $lastDate);
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $days_flip = array_flip($days);
        $tgl = [];
        $id = $days_flip[$firstDay];
        for ($i = $id - 1; $i >= 0; $i--) {
            $t = $lastDateBefore;
            $tgl[$i] = [
                'type' => 'before',
                'text' => $tahun . '-' . $bulan . '-' . $t,
                'date' => $t,
                'day' => $days[$i],
                'holiday' => null,
                'fakultatif' => null,
                'peringatan' => null,
            ];
            $lastDateBefore--;
        }
        foreach ($tglBulanIni as $t) {
            $holiday = null;
            foreach ($hari_libur as $hl) {
                if ($hl['date'] == $t) {
                    $holiday = $hl;
                    break;
                }
            }
            $fakultatif = null;
            foreach ($hari_fakultatif as $hf) {
                if ($hf['date'] == $t) {
                    $fakultatif = $hf;
                    break;
                }
            }
            $peringatan = null;
            foreach ($hari_peringatan as $hf) {
                if ($hf['date'] == $t) {
                    $peringatan = $hf;
                    break;
                }
            }
            $tgl[] = [
                'type' => 'current',
                'text' => $tahun . '-' . $bulan . '-' . $t,
                'date' => $t,
                'day' => $days[$id % 7],
                'holiday' => $holiday,
                'fakultatif' => $fakultatif,
                'peringatan' => $peringatan,
            ];
            $id++;
        }
        $left = count($tgl) % 7 > 0 ? 7 - (count($tgl) % 7) : 0;
        for ($i = 0; $i < $left; $i++) {
            $t = $i + 1;
            $tgl[$id] = [
                'type' => 'after',
                'text' => $tahun . '-' . $bulan . '-' . $t,
                'date' => $t,
                'day' => $days[$id % 7],
                'holiday' => null,
                'fakultatif' => null,
                'peringatan' => null,
            ];
            $id++;
        }
        ksort($tgl);
        $data = [
            'daysCount' => $lastDate,
            'weeksCount' => floor(count($tgl) / 7),
            'year' => $tahun,
            'month' => $bulan,
            'daily' => $tgl ?: null,
            'holiday' => $hari_libur ?: null,
            'fakultatif' => $hari_fakultatif ?: null,
            'peringatan' => $hari_peringatan ?: null,
        ];
        return json_encode($data);
    }
}
