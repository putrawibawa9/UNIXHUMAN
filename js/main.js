// Memilih elemen-elemen DOM
const Menu = document.querySelector('.Menu');
const hamburgerMenu = document.querySelector('.hamburger-menu');
const iconBars = document.querySelector('.icon-bars');
const iconClose = document.querySelector('.icon-close');

// Menambahkan event listener untuk menu hamburger dan menu itu sendiri
hamburgerMenu.addEventListener('click', displayMenu);
Menu.addEventListener('click', displayMenu);

// Fungsi untuk menampilkan atau menyembunyikan menu dan mengganti ikon antara hamburger dan close
function displayMenu() {
  if(Menu.classList.contains('tampil')) {
    Menu.classList.remove('tampil');
    iconBars.style.display='inline';
    iconClose.style.display='none';
  } else {
    Menu.classList.add('tampil');
    iconBars.style.display='none';
    iconClose.style.display='inline';
  }
}

// Definisi kelas untuk item
class Item {
  // Konstruktor untuk kelas Item
  constructor(image, ukuran, denda, waktuPesan) {
    this.image = image;               // Gambar item
    this.ukuran = ukuran;             // Ukuran item
    this.denda = denda;               // Denda untuk kerusakan
    this.waktuPesan = waktuPesan;     // Waktu pemesanan
  }

  // Metode untuk menampilkan item dalam grid HTML
  showItem() {
    const gridItem = document.getElementById('grid-item');
    gridItem.innerHTML += `
          <div class="item">
                <img src="${this.image}" />
                <div class="item-detail">
                    <p>Ukuran ${this.ukuran}</p>
                    <p>Rusak = denda ${this.denda}K</p>
                    <div>
                        <small><i class="fa-regular fa-calendar-days"></i>${this.waktuPesan} hari</small>
                        <a href="form.html" class="button"><i class="fa-solid fa-cart-shopping"></i>PESAN</a>
                        
                    </div>
            </div>
          `;
  }
}

// Membuat instansi dari kelas Item dan menampilkannya
const item1 = new Item("baju.png", "(S, M, L ,XL)", 350, 3);
item1.showItem()
const item2 = new Item("wig.png", "(S, M, L ,XL)", 250, 3);
item2.showItem()
const item3 = new Item("aksesoris.png", "(S, M, L ,XL)", 200, 3);
item3.showItem()