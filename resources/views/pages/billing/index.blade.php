@extends('layouts.main.index')

@section('pages')
@if (request()->pembayaran == "qris")
<div class="relative flex flex-col px-5 md:px-20 pt-10 gap-y-7">
    <div class="flex flex-col p-5 bg-white rounded-lg shadow-lg gap-y-10">
        <div class="flex justify-between item-center">
            <h1 class="text-[24px] font-bold" id="mainTitle">Lakukan pembayaran sebelum</h1>
            <button class="hover:animate-spin" id="reloadButton" type="button" onclick="reloadContent()">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z"/></svg>
            </button>
            <button type="button" onclick="openModal()" class="text-[#89B53D] font-semibold hidden" id="detailTransaksi">
                Lihat Detail Transaksi
            </button>
        </div>
        <div class="">
            <p class="text-[18px] text-[#8C8C8C]" id="secondMainTitle">Lakukan pembayaran sebelum</p>
            <div class="flex justify-between">
                <p class="text-[18px] " id="secondTime">Sabtu, 16 September 2023 pukul 12:33 WIB</p>
                <p class="text-[18px] text-[#DA0000] font-bold" id="time">23:59:12</p>
                <p class="text-[18px] text-[#89B53D] font-bold hidden" id="success">Sukses</p>
            </div>

        </div>
    </div>
    <div class="flex flex-col p-5 bg-white rounded-lg shadow-lg">
        <h1 class="text-[24px] font-bold">Metode Pembayarann</h1>
        <div class="grid grid-cols-1 md:grid-cols-6">
            <div class="col-span-3 flex flex-col gap-y-5">
                <div>
                    <h1 class="text-2xl text-gray-400">Qris</h1> 
                    <p class="text-xl font-medium">Status <span class="text-red-500">Panding</span></p>
                </div>
                <div class="flex flex-col  gap-y-3">
                    <h1 class="font-bold text-[18px]">Ringkasan Belanja</h1>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <span class="w-full pt-10 border-b"></span>
                    <div class="flex flex-col pb-10 font-bold gap-y-1">
                        <div class="flex gap-x-14 text-[15px] justify-between">
                            <p>Total Item</p>
                            <p>24</p>
                        </div>
                        <div class="flex gap-x-14 text-[15px] justify-between">
                            <p>Total Harga</p>
                            <p>@currency(40000)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-span-3 flex justify-center items-center">
                <img src="{{url("/assets/images/qrcode.png")}}" alt="">
            </div>
        </div>
    </div>
</div> 
@elseif (request()->pembayaran == "gopay" || "ovo" || "dana" || "shpeepay")
<div class="relative flex flex-col px-5 md:px-20 pt-10 gap-y-7">
    <div class="flex flex-col justify-between h-[700px] p-5 bg-white rounded-lg shadow-lg">
        <div>
            <h1 class="text-[24px] font-bold">Metode Pembayarann</h1>
            <img src="{{url("/assets/images/gopay.png")}}" alt="">
            <div class="flex justify-between w-2/3 md:w-1/3">
                <h1 class="text-lg font-medium ">Saldo Gopay</h1>
                <p class="text-lg font-medium">@currency(40000)</p>

            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-6">
            <div class="col-span-3 flex flex-col gap-y-5">

                <div class="flex flex-col  gap-y-3">
                    <h1 class="font-bold text-[18px]">Ringkasan Belanja</h1>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (1) </p>
                        <p>@currency(40000)</p>
                    </div>
                    <span class="w-full pt-10 border-b"></span>
                    <div class="flex flex-col pb-10 font-bold gap-y-1">
                        <div class="flex gap-x-14 text-[15px] justify-between">
                            <p>Total Item</p>
                            <p>24</p>
                        </div>
                        <div class="flex gap-x-14 text-[15px] justify-between">
                            <p>Total Harga</p>
                            <p>@currency(40000)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-6 border-t-4 border-gray-500"></div>
            <div class="col-span-6 flex justify-between mt-5">
                <div class="flex-flex-col">
                    <h1 class="text-gray-400 text-2xl font-medium">Total Pembayaran</h1>
                    <p class="text-2xl font-semibold">@currency(5000000)</p>
                </div>
                <button class="w-[200px]  bg-gray-200 text-xl font-semibold rounded-lg"> Bayar</button>
            </div>
        </div>
    </div>
</div> 
@elseif (request()->pembayaran == "transfer_bank")
    <div class="relative flex flex-col px-5 md:px-20 pt-10 gap-y-7">
        <div class="flex flex-col p-5 bg-white rounded-lg shadow-lg gap-y-10">
            <div class="flex justify-between item-center">
                <h1 class="text-[24px] font-bold" id="mainTitle">Menunggu Pembayaran</h1>
                <button class="hover:animate-spin" id="reloadButton" type="button" onclick="reloadContent()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z"/></svg>
                </button>
                <button type="button" onclick="openModal()" class="text-[#89B53D] font-semibold hidden" id="detailTransaksi">
                    Lihat Detail Transaksi
                </button>
            </div>
            <div class="">
                <p class="text-[18px] text-[#8C8C8C]" id="secondMainTitle">Lakukan pembayaran sebelum</p>
                <div class="flex justify-between">
                    <p class="text-[18px] " id="secondTime">Sabtu, 16 September 2023 pukul 12:33 WIB</p>
                    <p class="text-[18px] text-[#DA0000] font-bold" id="time">23:59:12</p>
                    <p class="text-[18px] text-[#89B53D] font-bold hidden" id="success">Sukses</p>
                </div>

            </div>
        </div>
        <div class="flex flex-col p-5 bg-white rounded-lg shadow-lg">
            <h1 class="text-[24px] font-bold">Metode Pembayaran</h1>
            <div class="flex flex-col gap-y-5">
                <div class="flex items-center gap-x-5">
                    <span>
                        <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.50353 27.75H60.4965C60.4689 21.6086 60.2259 18.3087 58.0836 16.1664C55.6673 13.75 51.7782 13.75 44 13.75H22C14.2218 13.75 10.3327 13.75 7.91637 16.1664C5.77406 18.3087 5.53108 21.6086 5.50353 27.75ZM60.5 32.75H5.5V38.5C5.5 46.2782 5.5 50.1673 7.91637 52.5836C10.3327 55 14.2218 55 22 55H44C51.7782 55 55.6673 55 58.0836 52.5836C60.5 50.1673 60.5 46.2782 60.5 38.5V32.75ZM19.25 41.5C17.8693 41.5 16.75 42.6193 16.75 44C16.75 45.3807 17.8693 46.5 19.25 46.5H19.2775C20.6582 46.5 21.7775 45.3807 21.7775 44C21.7775 42.6193 20.6582 41.5 19.2775 41.5H19.25Z" fill="#222222"/>
                        </svg>
                    </span>
                    <h1 class="font-bold text-[18px]">ATM / Virtual Account</h1>
                </div>
                <div class="">
                    <p class="text-[18px] text-[#8C8C8C]">Virtual Account</p>
                    <p class="text-[20px] font-bold">403330000123456</p>
                </div>
                <div class="w-full border-b border-[#D1D1D1]"></div>
                <div class="">
                    <p class="text-[18px] text-[#8C8C8C]">Total Pembayaran</p>
                    <p class="text-[20px] font-bold">@currency(5040000)</p>
                </div>
            </div>
        </div>
        <div id="caraPembayaran">
            <h1 class="font-bold text-[20px]">Cara Pembayaran</h1>
            <p class="text-[#8C8C8C] py-2">ATM BCA</p>
            <ol class="text-[#8C8C8C] list-decimal pl-5 indent-2">
                <li>Masukkan Kartu ATM BCA & PIN</li>
                <li>Pilih menu Transaksi Lainnya > Transfer > ke Rekening BCA Virtual Account</li>
                <li>Masukkan 5 angka kode perusahaan untuk Tokopedia (40333) dan Nomor HP yang terdaftar di akun Anda (Contoh: 4033308123456789)</li>
                <li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai seperti No VA, Nama, Perus/Produk dan Total Tagihan</li>
                <li>Masukkan Jumlah Transfer sesuai dengan Total Tagihan</li>
                <li>Ikuti instruksi untuk menyelesaikan transaksi</li>
                <li>Simpan struk transaksi sebagai bukti pembayaran</li>
            </ol>
        </div>
    </div> 
@endif


@endsection

@section('modal')
{{-- Modal --}}
<div class="fixed top-0 bottom-0 left-0 right-0 w-full h-full hidden overflow-auto font-roboto z-[60]" id="modal">
    <div class="flex items-center h-screen mt-52 md:mt-0 md:mx-14 lg:mx-44">
        <div class=" bg-[#F0F3F7] w-full flex p-3 ">
            <div class="flex flex-col w-full p-5 bg-white gap-y-10 ">
                <div class="flex flex-col lg:flex-row justify-between gap-y-7 gap-x-10">
                    <div class="flex flex-col gap-y-5">
                        <div class="flex flex-col gap-y-2">
                            <div class="flex justify-between">
                                <h1 class="font-bold text-[25px]">Detail Transaksi</h1>
                                <div>
                                    <button type="button" class=" lg:hidden" onclick="closeModal()">
                                        <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M38.5 19.6786C38.5 29.2046 30.299 37.0707 20 37.0707C9.70104 37.0707 1.5 29.2046 1.5 19.6786C1.5 10.1527 9.70104 2.28662 20 2.28662C30.299 2.28662 38.5 10.1527 38.5 19.6786Z" stroke="black" stroke-width="3"/>
                                            <path d="M29 11.1772L11 28.1801" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11 11.1772L29 28.1801" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col p-2 border rounded-lg shadow-lg">
                                <table class="w-full table-fixed">
                                    <tbody>
                                      <tr>
                                        <td class="pr-10 font-bold">Status</td>
                                        <td>Sedang Dikirim</td>
                                      </tr>
                                      <tr>
                                        <td class="pr-10 font-bold ">Kode Transaksi</td>
                                        <td>#2023-ABC-001</td>
                                      </tr>
                                      <tr>
                                        <td class="pr-10 font-bold ">Tanggal Pembelian</td>
                                        <td>19 September 2023</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <h1 class="font-bold text-[25px]">Detail Produk</h1>
                            <div class="flex flex-col p-2 border rounded-lg shadow-lg">
                                <table class="w-full table-fixed">
                                    <tbody>
                                      <tr>
                                        <td class="pr-10">
                                            <div class="flex items-center gap-x-5">
                                                <img src={{ url('assets/images/products/Ikan-arwana-1.jpg') }} class="object-cover w-10 h-10 rounded-lg"  alt="">
                                                <div>
                                                    <p class="text-[15px]">Ikan Arwana</p>
                                                    <p class="font-bold text-[17px]">5 X @currency(1000000)</p>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div>
                                                <p class="text-[15px]">Total Harga</p>
                                                <p class="font-bold text-[17px]">@currency(5000000)</p>
                                            </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <h1 class="font-bold text-[25px]">Info Pengiriman</h1>
                            <div class="flex flex-col p-2 border rounded-lg shadow-lg">
                                <table class="w-full table-fixed">
                                    <tbody>
                                      <tr>
                                        <td class="pr-10 font-bold">Kurir</td>
                                        <td>J&T Reguler</td>
                                      </tr>
                                      <tr>
                                        <td class="pr-10 font-bold">No Resi</td>
                                        <td>NDU6Z37D</td>
                                      </tr>
                                      <tr>
                                        <td class="pr-10 font-bold">Alamat</td>
                                        <td>
                                            <div>
                                                <p>081234567890</p>
                                                <p>Jl. Pahlawan No. 123</p>
                                            </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-5">
                        <div class="flex flex-col gap-y-2">
                            <h1 class="font-bold text-[25px]">Rincian Pembayaran</h1>
                            <div class="flex flex-col p-2 border rounded-lg shadow-lg">
                                <table class="w-full table-fixed">
                                    <tbody>
                                      <tr>
                                        <td class="py-1 pr-10 font-bold">Metode Pembayaran</td>
                                        <td>BCA Virtual Account</td>
                                      </tr>
                                      <tr>
                                        <td class="py-1 pr-10"><b>Total Pembayaran</b> (5 Item)</td>
                                        <td>Rp5.000.000</td>
                                      </tr>
                                      <tr>
                                        <td class="py-1 pr-10"><b>Total Ongkos Kirim</b> (5 Kg)</td>
                                        <td>Rp40.000</td>
                                      </tr>
                                      <tr>
                                        <td class="py-1 pr-10 font-bold">Pengiriman</td>
                                        <td>J&T Reguler</td>
                                      </tr>
                                      <tr>
                                        <td class="py-1 pt-2 pr-10 font-bold">Total Belanja</td>
                                        <td class="pt-2">Rp5.040.000</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class=" hidden lg:block" onclick="closeModal()">
                            <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M38.5 19.6786C38.5 29.2046 30.299 37.0707 20 37.0707C9.70104 37.0707 1.5 29.2046 1.5 19.6786C1.5 10.1527 9.70104 2.28662 20 2.28662C30.299 2.28662 38.5 10.1527 38.5 19.6786Z" stroke="black" stroke-width="3"/>
                                <path d="M29 11.1772L11 28.1801" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11 11.1772L29 28.1801" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex flex-col items-center font-bold text-white gap-y-2">
                    <button class="bg-[#89B53D] py-3 w-[220px] rounded-md">Chat</button>
                    <button class="bg-[#89B53D] py-3 w-[220px] rounded-md">Ajukan Komplain</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const modal = document.getElementById("modal");

    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    window.addEventListener("click", (event) => {
        if (event.target == modal) {
            closeModal();
        }
    });

    function startTimer(duration, display) {
        var timer = duration, hours, minutes, seconds;
        setInterval(function () {
            hours = parseInt(timer / 3600, 10);
            minutes = parseInt((timer % 3600) / 60, 10);
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = hours + ":" + minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var timeInSeconds = 23 * 3600 + 59 * 60 + 59;
        var display = document.querySelector('#time');
        startTimer(timeInSeconds, display);
    };

    function reloadContent() {
        var waitingTitle = document.getElementById('mainTitle');
        var secondMainTitle = document.getElementById('secondMainTitle');
        var secondTime = document.getElementById('secondTime');
        var caraPembayaran = document.getElementById('caraPembayaran');
        var time = document.getElementById('time');
        var success = document.getElementById('success');
        var detailTransaksi = document.getElementById('detailTransaksi');
        var reloadButton = document.getElementById('reloadButton');

        waitingTitle.textContent = "Pembayaran Berhasil";
        secondMainTitle.textContent = "Menunggu konfirmasi penjual";
        secondTime.textContent = "Pesanan telah diteruskan kepada penjual";
        time.className = "hidden";
        caraPembayaran.className="hidden";
        detailTransaksi.classList.remove('hidden');
        reloadButton.classList.add('hidden');
        success.classList.remove("hidden");
    }
</script>
@endpush
