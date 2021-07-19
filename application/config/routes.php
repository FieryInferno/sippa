<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']        = 'Welcome';
$route['404_override']			        = '';
$route['translate_uri_dashes']	    = FALSE;
$route['chat/(:any)']               = 'Chat/index/$1';
$route['bayar/(:any)']              = 'Petugas/Retribusi/index/$1';
$route['bayar_tunggakan/(:any)']    = 'Petugas/Retribusi/bayarTunggakan/$1';
$route['admin/data_potensi_pasar']  = 'Admin/Retribusi/data_potensi_pasar';

$route['pedagang/profile']          = 'Pedagang/Profile';
$route['pedagang/ubah_status']      = 'Pedagang/Profile/ubahStatus';
$route['pedagang/batal_pengajuan']  = 'Pedagang/Pengajuan/batal';
$route['pedagang/tunggakan']        = 'Pedagang/Retribusi/tunggakan';

$route['admin']                             = 'Admin/Dashboard';
$route['admin/pedagang']                    = 'Admin/Dashboard/Pedagang';
$route['admin/pedagang/(:any)']             = 'Admin/Dashboard/Pedagang/$1';
$route['admin/petugas']                     = 'Admin/Petugas';
$route['admin/petugas/tambah']              = 'Admin/Petugas/tambah';
$route['admin/petugas/edit/(:any)']         = 'Admin/Petugas/edit/$1';
$route['admin/petugas/hapus/(:any)']        = 'Admin/Petugas/hapus/$1';
$route['admin/retribusi/verifikasi/(:any)'] = 'Admin/Retribusi/verifikasi/$1';
$route['admin/retribusi/tolak/(:any)']      = 'Admin/Retribusi/tolak/$1';

$route['petugas/pedagang/edit/(:any)']        = 'Petugas/Pedagang/edit/$1';
$route['petugas/pedagang/(:any)']             = 'Petugas/Pedagang/index/$1';
$route['petugas/pedagang/verifikasi/(:any)']  = 'Petugas/Pedagang/verifikasi/$1';
$route['petugas/pasar/edit/(:any)']           = 'Petugas/Pasar/edit/$1';
$route['petugas/data_tunggakan']              = 'Petugas/Retribusi/dataTunggakan';
$route['petugas/upload_ulang/(:any)']         = 'Petugas/Retribusi/uploadUlang/$1';
$route['petugas/data_retribusi']              = 'Petugas/Retribusi/data_retribusi';

$route['kepala_bidang']                       = 'KepalaBidang/KepalaBidang';
$route['kepala_bidang/data_pedagang']         = 'KepalaBidang/Pedagang';
$route['kepala_bidang/data_pedagang/(:any)']  = 'KepalaBidang/Pedagang/index/$1';
$route['kepala_bidang/data_retribusi']        = 'KepalaBidang/Retribusi';