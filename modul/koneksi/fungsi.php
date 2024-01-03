<?php 
          function separatorTanggal($tanggal){
            $separator = date("d-m-Y H:i:s", strtotime($tanggal));
            return $separator;
        }

        function format_rupiah($nilai_rupiah){
          $hasil_rupiah = "".number_format($nilai_rupiah,0,'.','.');
          return $hasil_rupiah;
        }
?>