


function validateForm() {
    const sizeField = document.pesanForm.ukuran.value;
    const jumlahField = document.pesanForm.jumlah.value;
    const sewaField = document.pesanForm.tgl_sewa.value;
    const kembaliField = document.pesanForm.tgl_kembali.value;

    if (!sizeField || !jumlahField || !sewaField || !kembaliField) {
        alert('Mohon memasukan data dengan benar.');
        return false;
    }
    return true;
}

function calcHarga() {
    const jumlah = document.pesanForm.jumlah.value;
    const hargaField = document.pesanForm.harga_barang.value;
    let totalhargaField = document.pesanForm.total_harga;
    let total = hargaField * jumlah;
    totalhargaField.value = total;
}

calcHarga();