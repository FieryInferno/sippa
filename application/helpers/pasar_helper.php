<?php
  function upload()
  {
    $CI                             =& get_instance();
    $config['upload_path']          = './assets/img';
    $config['allowed_types']        = 'jpeg|jpg|png';

    $CI->upload->initialize($config);

    if ( ! $CI->upload->do_upload('foto'))
    {
      print_r($CI->upload->display_errors());
      die();
    } else {
      return $CI->upload->data('file_name');    
    }
  }
?>