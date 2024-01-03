
// direktori status
function load_statusMelati(){
    $.ajax({
      url:'status/melati.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

function load_statusAnggrek(){
    $.ajax({
      url:'status/anggrek.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

function load_statusVip(){
    $.ajax({
      url:'status/vip.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

function load_listPemesan(){
    $.ajax({
      url:'status/list_pemesan.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

function load_listCheckout(){
    $.ajax({
      url:'status/list_checkout.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }
  //=============================================
  // direktori kamar
  // Load list kamar
function load_melati(){
    $.ajax({
      url:'kamar/melati.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }
function load_anggrek(){
    $.ajax({
      url:'kamar/anggrek.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }
function load_vip(){
    $.ajax({
      url:'kamar/vip.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }
function load_lihatKamar(){
    $.ajax({
      url:'kamar/melati.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

function load_tambahKamar(){
    $.ajax({
      url:'kamar/tambah_kamar.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

function load_tambahTipe(){
    $.ajax({
      url:'kamar/tambah_tipe.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

function load_tambahLantai(){
    $.ajax({
      url:'kamar/tambah_lantai.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }
  //============ End of module

  // direktori booking
  function load_bookingOnline(){
    $.ajax({
      url:'booking/daftar.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }
  //=====================================

  // Direktori pembayaran

  function load_verif(){
    $.ajax({
      url:'pembayaran/list_verif.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

  // Direktori Home
  function load_home(){
    $.ajax({
      url:'home/home.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

  // direktori halaman
  
  function load_customerTidakAda(){
    $.ajax({
      url:'halaman/customer_tidak_ada.html',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

  // direktori riwayat
  function load_riwayatPembayaran(){
    $.ajax({
      url:'riwayat/pembayaran.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }

  function load_riwayatCheckout(){
    $.ajax({
      url:'riwayat/checkout.php',
      type:'GET',
      success:function(data){
        $('#contentAdmin').html(data);
      }
    })
  }
