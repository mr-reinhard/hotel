function dataBerhasilDisimpan() {

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Data berhasil disimpan"
      });

}

function updateBerhasil() {

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Data berhasil diupdate"
      });

}

function hapusBerhasil() {

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Data berhasil dihapus"
      });

}

function registrasiBerhasil() {
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Registrasi berhasil dilakukan"
      });
}

function verifikasiBerhasil() {
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Verifikasi berhasil dilakukan"
      });
}

function bookingBerhasil() {
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Booking berhasil dilakukan"
      });
}

function checkoutBerhasil() {
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Checkout berhasil dilakukan"
      });
}

function kamarBerhasilDihapus() {
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Kamar berhasil dihapus"
      });
}

function kamarBerhasilDiupdate() {
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Kamar berhasil diperbaharui"
      });
}

function karakterTidakValid() {
    
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "error",
        title: "Karakter tidak valid"
      });
}

function tanggalTidakValid() {
    Swal.fire({
        title: "Tanggal tidak valid",
        text: "Mohon cek tanggal nya.",
        icon: "error"
      });
}

function UploadError() {
    Swal.fire({
        title: "Invalid bukti transfer",
        text: "Mohon upload bukti transfer",
        icon: "error"
      });
}

function ukuranGambarError() {
    Swal.fire({
        title: "Ukuran terlalu besar",
        text: "Ukuran gambar minimal dibawah 700kb",
        icon: "error"
      });
}

function invalidEkstensi() {
    Swal.fire({
        title: "Ekstensi tidak valid",
        text: "Upload hanya gambar saja",
        icon: "error"
      });
}

function koneksiTerputus() {
    Swal.fire({
        title: "Koneksi terputus",
        text: "Cek Koneksi internet anda",
        icon: "error"
      });
}

function lengkapiData() {
    Swal.fire({
        title: "Data belum lengkap",
        text: "Cek kembali data anda",
        icon: "error"
      });
}

function komentarDiposting() {
    Swal.fire({
        title: "Posting berhasil",
        text: "Komentar berhasil di posting.",
        icon: "success",
        showConfirmButton: false,
        timer:"2000"
      });
}