
// Direktori kamar
function load_listKamar(){
    $.ajax({
      url:'kamar/list_kamar.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }

function load_anggrek(){
    $.ajax({
      url:'kamar/anggrek.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }

function load_vip(){
    $.ajax({
      url:'kamar/vip.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }

  // Direktori Home
  function load_home(){
    $.ajax({
      url:'home/home.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }

  // Direktori daftar
  function load_cekBooking(){
    $.ajax({
      url:'daftar/cek_booking.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }

  function load_booking(){
    $.ajax({
      url:'daftar/booking.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }

  function load_kodeBooking(){
    $.ajax({
      url:'daftar/kode_booking.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }

  function load_uploadBuktiTransfer(){
    $.ajax({
      url:'daftar/upload_bukti.php',
      type:'GET',
      success:function(data){
        $('#contentUpload').html(data);
      }
    })
  }

  function load_PrevBuktiTransfer(){
    $.ajax({
      url:'daftar/prev_bukti.php',
      type:'GET',
      success:function(data){
        $('#contentUpload').html(data);
      }
    })
  }