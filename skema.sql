-- tbl_booking (catatan)
-- tbl_checkout(catatan)
-- tbl_pelunasan (catatan)

CREATE VIEW vw_customer AS SELECT
tbCust.id_customer,
tbCust.nama_customer,
tbCustDetails.telp,
tbCustDetails.email
FROM tbl_cust_details tbCustDetails
INNER JOIN tbl_customer tbCust ON
tbCust.id_customer = tbCustDetails.id_customer

CREATE VIEW vw_kamar AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar


CREATE VIEW vw_kamar_melati AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_namaKamar = "FES2KY7906BN1JMZ";

CREATE VIEW vw_kamar_anggrek AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_namaKamar = "O4J6NIQ9T0AWCESG";

CREATE VIEW vw_kamar_vip AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_namaKamar = "3W4ILG5E8CUHVQJF";

CREATE VIEW vw_kamar_tersedia AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK1";


CREATE VIEW vw_tersedia_melati AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK1" AND tbKamar.id_kamar = "FES2KY7906BN1JMZ";

CREATE VIEW vw_tersedia_anggrek AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK1" AND tbKamar.id_kamar = "O4J6NIQ9T0AWCESG";

CREATE VIEW vw_tersedia_vip AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK1" AND tbKamar.id_kamar = "3W4ILG5E8CUHVQJF";
-------
CREATE VIEW vw_kamar_penuh AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK2";

CREATE VIEW vw_penuh_melati AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK2" AND tbKamar.id_kamar = "FES2KY7906BN1JMZ";

CREATE VIEW vw_penuh_anggrek AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK2" AND tbKamar.id_kamar = "O4J6NIQ9T0AWCESG";

CREATE VIEW vw_penuh_vip AS SELECT
tbKamar.id_kamar,
tbNamaKamar.namaKamar,
tbNomorLantai.nomorLantai,
tbKamar.nomor_kamar,
tbStatusKamar.status_kamar
FROM tbl_kamar tbKamar
INNER JOIN tbl_nama_kamar tbNamaKamar ON
tbKamar.id_namaKamar = tbNamaKamar.id_namaKamar
INNER JOIN tbl_nomor_lantai tbNomorLantai ON
tbKamar.id_nomorLantai = tbNomorLantai.id_nomorLantai
INNER JOIN tbl_status_kamar tbStatusKamar ON
tbKamar.id_status_kamar = tbStatusKamar.id_status_kamar
WHERE tbKamar.id_status_kamar = "SK2" AND tbKamar.id_kamar = "3W4ILG5E8CUHVQJF";

--------------------------
CREATE VIEW vw_booking AS SELECT
tbBooking.id_booking,
tbBooking.id_kamar,
tbCust.nama_customer,
vwKamar.namaKamar,
vwKamar.nomorLantai,
vwKamar.nomor_kamar,
tbBooking.tanggal_booking,
tbCheckIn.tanggal_checkin,
tbCheckIn.tanggal_checkout,
tbBooking.catatan
FROM tbl_booking tbBooking
INNER JOIN vw_kamar vwKamar ON
vwKamar.id_kamar = tbBooking.id_kamar
INNER JOIN tbl_customer tbCust ON
tbCust.id_customer = tbBooking.id_customer
INNER JOIN tbl_checkin tbCheckIn ON
tbCheckIn.id_booking = tbBooking.id_booking

CREATE VIEW vw_pembayaran AS SELECT
tbPembayaran.id_pembayaran,
tbPembayaran.id_booking,
vwBooking.id_kamar,
vwBooking.nama_customer,
vwBooking.namaKamar,
vwBooking.nomorLantai,
vwBooking.nomor_kamar,
vwBooking.tanggal_booking,
vwBooking.tanggal_checkin,
vwBooking.tanggal_checkout,
tbJenisPembayaran.jenis_bayar,
tbPembayaran.total_bayar
FROM tbl_pembayaran tbPembayaran
INNER JOIN vw_booking vwBooking ON
vwBooking.id_booking = tbPembayaran.id_booking
INNER JOIN tbl_jenis_pembayaran tbJenisPembayaran ON
tbJenisPembayaran.id_jenis_bayar = tbPembayaran.id_jenis_bayar

CREATE VIEW vw_pelunasan AS SELECT
tbPelunasan.id_pembayaran,
vwPembayaran.id_booking,
vwPembayaran.id_kamar,
vwPembayaran.nama_customer,
vwPembayaran.namaKamar,
vwPembayaran.nomorLantai,
vwPembayaran.nomor_kamar,
vwPembayaran.tanggal_booking,
vwPembayaran.tanggal_checkin,
vwPembayaran.tanggal_checkout,
vwPembayaran.jenis_bayar,
vwPembayaran.total_bayar,
tbStatBayar.status_bayar,
tbPelunasan.catatan
FROM tbl_pelunasan tbPelunasan
INNER JOIN vw_pembayaran vwPembayaran ON
vwPembayaran.id_pembayaran = tbPelunasan.id_pembayaran
INNER JOIN tbl_status_bayar tbStatBayar ON
tbStatBayar.id_status_bayar = tbPelunasan.id_status_bayar

CREATE VIEW vw_lunas AS SELECT
tbPelunasan.id_pembayaran,
vwPembayaran.id_booking,
vwPembayaran.id_kamar,
vwPembayaran.nama_customer,
vwPembayaran.namaKamar,
vwPembayaran.nomorLantai,
vwPembayaran.nomor_kamar,
vwPembayaran.tanggal_booking,
vwPembayaran.tanggal_checkin,
vwPembayaran.tanggal_checkout,
vwPembayaran.jenis_bayar,
vwPembayaran.total_bayar,
tbStatBayar.status_bayar
FROM tbl_pelunasan tbPelunasan
INNER JOIN vw_pembayaran vwPembayaran ON
vwPembayaran.id_pembayaran = tbPelunasan.id_pembayaran
INNER JOIN tbl_status_bayar tbStatBayar ON
tbStatBayar.id_status_bayar = tbPelunasan.id_status_bayar
WHERE tbPelunasan.id_status_bayar = "SB1";

CREATE VIEW vw_batal AS SELECT
tbPelunasan.id_pembayaran,
vwPembayaran.id_booking,
vwPembayaran.id_kamar,
vwPembayaran.nama_customer,
vwPembayaran.namaKamar,
vwPembayaran.nomorLantai,
vwPembayaran.nomor_kamar,
vwPembayaran.tanggal_booking,
vwPembayaran.tanggal_checkin,
vwPembayaran.tanggal_checkout,
vwPembayaran.jenis_bayar,
vwPembayaran.total_bayar,
tbStatBayar.status_bayar
FROM tbl_pelunasan tbPelunasan
INNER JOIN vw_pembayaran vwPembayaran ON
vwPembayaran.id_pembayaran = tbPelunasan.id_pembayaran
INNER JOIN tbl_status_bayar tbStatBayar ON
tbStatBayar.id_status_bayar = tbPelunasan.id_status_bayar
WHERE tbPelunasan.id_status_bayar = "SB2";

CREATE VIEW vw_menunggu AS SELECT
tbPelunasan.id_pembayaran,
vwPembayaran.id_booking,
vwPembayaran.id_kamar,
vwPembayaran.nama_customer,
vwPembayaran.namaKamar,
vwPembayaran.nomorLantai,
vwPembayaran.nomor_kamar,
vwPembayaran.tanggal_booking,
vwPembayaran.tanggal_checkin,
vwPembayaran.tanggal_checkout,
vwPembayaran.jenis_bayar,
vwPembayaran.total_bayar,
tbStatBayar.status_bayar
FROM tbl_pelunasan tbPelunasan
INNER JOIN vw_pembayaran vwPembayaran ON
vwPembayaran.id_pembayaran = tbPelunasan.id_pembayaran
INNER JOIN tbl_status_bayar tbStatBayar ON
tbStatBayar.id_status_bayar = tbPelunasan.id_status_bayar
WHERE tbPelunasan.id_status_bayar = "SB3";

CREATE VIEW vw_checkout AS SELECT
tbCheckOut.id_booking,
vwLunas.id_kamar,
vwLunas.nama_customer,
vwLunas.namaKamar,
vwLunas.nomorLantai,
vwLunas.nomor_kamar,
vwLunas.tanggal_booking,
vwLunas.tanggal_checkin,
vwLunas.tanggal_checkout,
vwLunas.jenis_bayar,
vwLunas.total_bayar,
vwLunas.status_bayar,
tbStatCheckout.status_checkout,
tbCheckOut.tanggal_proses,
tbCheckOut.catatan
FROM tbl_checkout tbCheckOut
INNER JOIN vw_lunas vwLunas ON
vwLunas.id_booking = tbCheckOut.id_booking
INNER JOIN tbl_status_checkout tbStatCheckout ON
tbStatCheckout.id_status_checkout = tbCheckOut.id_status_checkout

CREATE VIEW vw_checkout_sudah AS SELECT
tbCheckOut.id_booking,
vwLunas.id_kamar,
vwLunas.nama_customer,
vwLunas.namaKamar,
vwLunas.nomorLantai,
vwLunas.nomor_kamar,
vwLunas.tanggal_booking,
vwLunas.tanggal_checkin,
vwLunas.tanggal_checkout,
vwLunas.jenis_bayar,
vwLunas.total_bayar,
vwLunas.status_bayar,
tbStatCheckout.status_checkout,
tbCheckOut.tanggal_proses
FROM tbl_checkout tbCheckOut
INNER JOIN vw_lunas vwLunas ON
vwLunas.id_booking = tbCheckOut.id_booking
INNER JOIN tbl_status_checkout tbStatCheckout ON
tbStatCheckout.id_status_checkout = tbCheckOut.id_status_checkout
WHERE tbCheckOut.id_status_checkout = "SC2";

CREATE VIEW vw_checkout_belum AS SELECT
tbCheckOut.id_booking,
vwLunas.id_kamar,
vwLunas.nama_customer,
vwLunas.namaKamar,
vwLunas.nomorLantai,
vwLunas.nomor_kamar,
vwLunas.tanggal_booking,
vwLunas.tanggal_checkin,
vwLunas.tanggal_checkout,
vwLunas.jenis_bayar,
vwLunas.total_bayar,
vwLunas.status_bayar,
tbStatCheckout.status_checkout,
tbCheckOut.tanggal_proses
FROM tbl_checkout tbCheckOut
INNER JOIN vw_lunas vwLunas ON
vwLunas.id_booking = tbCheckOut.id_booking
INNER JOIN tbl_status_checkout tbStatCheckout ON
tbStatCheckout.id_status_checkout = tbCheckOut.id_status_checkout
WHERE tbCheckOut.id_status_checkout = "SC1";

