<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function indo_currency($nominal)
{
    $result = "Rp " . number_format($nominal, 2, ',', '.');
    return $result;
}

function indo_currency2($nominal)
{
    $result =  number_format($nominal, 0, ',', '.');
    return $result;
}

function indo_currency3($nominal)
{
    $result =  number_format($nominal, 2, ',', '.');
    return $result;
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '/' . $m . '/' . $y;
}

function terbilang($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = terbilang($nilai - 10) . " BELAS";
    } else if ($nilai < 100) {
        $temp = terbilang($nilai / 10) . " PULUH" . terbilang($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " SERATUS" . terbilang($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = terbilang($nilai / 100) . " RATUS" . terbilang($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " SERIBU" . terbilang($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = terbilang($nilai / 1000) . " RIBU" . terbilang($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = terbilang($nilai / 1000000) . " JUTA" . terbilang($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = terbilang($nilai / 1000000000) . " MILYAR" . terbilang(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = terbilang($nilai / 1000000000000) . " TRILYUN" . terbilang(fmod($nilai, 1000000000000));
    }
    return $temp;
}
