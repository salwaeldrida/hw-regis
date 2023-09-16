import Registrasi from './data.js';

let registrasiList = [];

document.getElementById('formRegis').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let namaLengkap = document.getElementById('namaLengkap').value;
    let umur = parseInt(document.getElementById('umur').value);
    let uangSaku = parseInt(document.getElementById('uangSaku').value);
    
    if (namaLengkap.length < 10) {
      alert('Nama lengkap harus memiliki setidaknya 10 karakter!');
      return;
    }
    
    if (umur < 25 || umur > 100) {
      alert('umur harus berada dalam rentang 25 hingga 100 tahun!');
      return;
    }
    
    if (uangSaku < 100000 || uangSaku > 1000000 || uangSaku % 100000 !== 0) {
      alert('Uang saku harus berada dalam rentang Rp100.000 hingga Rp1.000.000 dan dalam kelipatan Rp100.000!');
      return;
    }
    
    let dataRegistrasi = new Registrasi(namaLengkap, umur, uangSaku);
    registrasiList.push(dataRegistrasi);
    
    tampilDataRegistrasi();
    hitungUmurDanUangSaku();
  });
  
function hitungUmurDanUangSaku() {
    let jumlahUangSaku = registrasiList.reduce((sum, dataRegistrasi) => sum + dataRegistrasi.uangSaku, 0);
    let jumlahUmur = registrasiList.reduce((sum, dataRegistrasi) => sum + dataRegistrasi.umur, 0);

    let rataRataUangSaku = jumlahUangSaku / registrasiList.length;
    let rataRataUmur = jumlahUmur / registrasiList.length;

    let perhitungan = document.getElementById('hasilAkhir');
    perhitungan.innerHTML = `Rata-rata pendaftar memiliki uang saku sebesar Rp${rataRataUangSaku.toFixed(2)} dengan rata-rata umur ${rataRataUmur.toFixed(2)} tahun`;
}

function tampilDataRegistrasi() {
    let listDataRegistrasi = document.getElementById('listDataRegistrasi');
    listDataRegistrasi.innerHTML = '';

    for (let dataRegistrasi of registrasiList) {
        let row = document.createElement('tr');
        row.innerHTML = `<td>${dataRegistrasi.namaLengkap}</td><td>${dataRegistrasi.umur} Tahun</td><td>Rp${dataRegistrasi.uangSaku}</td>`;
        listDataRegistrasi.appendChild(row);
    }
}
