
// Direktori kamar
function load_melati(){
    $.ajax({
      url:'kamar/melati.php',
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

  function load_kodeBooking(kodeBooking){
    $.ajax({
      url:'daftar/kode_booking.php',
      type:'GET',
      success:function(data){
        $('#contentCustomer').html(data);
      }
    })
  }