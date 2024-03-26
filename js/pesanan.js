function validateForm() {
  const sizeField = document.pesanForm.ukuran.value;
  const jumlahField = document.pesanForm.jumlah.value;
  const sewaField = document.pesanForm.tgl_sewa.value;
  const kembaliField = document.pesanForm.tgl_kembali.value;

  if (!sizeField || !jumlahField || !sewaField || !kembaliField) {
    alert("Mohon memasukan data dengan benar.");
    return false;
  }
  return true;
}

function calcHarga() {
  const jumlah = document.pesanForm.jumlah.value;
  let tgl_sewa = new Date(document.getElementById("tgl_sewa").value);
  let tgl_kembali = new Date(document.getElementById("tgl_kembali").value);

  let diffTime = Math.abs(tgl_kembali - tgl_sewa);
  let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

  let harga = diffDays *2;

  const hargaField = document.pesanForm.harga_barang.value;
  let totalhargaField = document.pesanForm.total_harga;
  let total = hargaField * jumlah *harga;
  totalhargaField.value = total;
}

calcHarga();
