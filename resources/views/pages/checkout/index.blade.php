@extends('layouts.main.index')

@section('pages')

<div class="flex flex-col px-20 pt-10 gap-y-5">
    <div class="text-[#89B441] text-[18px] pt-5 font-semibold flex items-center gap-x-2">
        <a href={{ url()->previous() }}>< Kembali</a>
    </div>
    <div>
        <h1 class="text-[32px] font-bold pb-10">Informasi Pengiriman</h1>
        <form method="GET" action="/buy-now" class="grid grid-cols-2 gap-x-32">
            <div class="hidden">
                <input type="hidden" name="sellerSlug" value={{ $sellerData['slug'] }}>
                <input type="hidden" name="quantity" value={{ $quantity }}>
                <input type="hidden" name="productSlug" value={{ $productData['slug'] }}>
                <input type="hidden" name="catatan" value={{ $catatan }}>
            </div>
            <div class="flex flex-col w-full gap-y-5">
                <div class="flex justify-between gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="nama_depan" class="text-2xl font-bold">Nama Depan</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Rudy" name="nama_depan">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="nama_belakang" class="text-2xl font-bold">Nama Belakang</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Feni" name="nama_belakang">
                    </div>
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="Email" class="text-2xl font-bold">Email</label>
                    <input required type="email" class="h-12 rounded-md" placeholder="fendi_fendi@gmail.com" name="email">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="no_handphone" class="text-2xl font-bold">No Handphone</label>
                    <input required type="text" class="h-12 rounded-md" placeholder="081234567890" name="no_handphone">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="alamat" class="text-2xl font-bold">Alamat</label>
                    <input required type="text" class="h-12 rounded-md" placeholder="Jl. Pahlawan No. 123" name="alamat">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="alamat_pin_point" class="text-2xl font-bold">Alamat Pin Point</label>
                    <input required type="text" class="h-12 rounded-md" placeholder="Jl. Pahlawan No. 123" name="alamat_pin_point">
                </div>
                <div class="flex justify-between gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="provinsi" class="text-2xl font-bold">Provinsi</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Jawa Timur" name="provinsi">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="kota_kabupaten" class="text-2xl font-bold">Kota/Kabupaten</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Surabaya" name="kota_kabupaten">
                    </div>
                </div>
                <div class="flex justify-between gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="kecamatan" class="text-2xl font-bold">Kecamatan</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Purwantoro" name="kecamatan">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="kelurahan" class="text-2xl font-bold">Kelurahan</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Blimbing" name="kelurahan">
                    </div>
                </div>
                <div class="flex justify-between gap-x-20">
                    <div class="flex flex-col w-1/2 gap-y-2">
                        <label for="kode_pos" class="text-2xl font-bold">Kode Pos</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="12345" name="kode_pos">
                    </div>
                    <div class="flex flex-col w-1/2 gap-y-2">
                        <label for="pembayaran" class="text-2xl font-bold">Opsi Pembayaran</label>
                        <select class="h-12 rounded-md" name="pembayaran">
                            <option value="" hidden disabled selected>Pilih salah satu</option>
                            <option value="atm">ATM</option>
                            <option value="qris">QRIS</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col justify-between gap-y-4">
                    <h1 class="text-2xl font-bold">Opsi Pengiriman</h1>
                    <div class="flex justify-between gap-x-20">
                        <div class="flex flex-col gap-y-2 grow">
                            <label for="pengiriman" class="text-lg font-bold">Pilih Pengiriman</label>
                            <select class="h-12 rounded-md" name="pengiriman">
                                <option value="" hidden disabled selected>Pilih salah satu</option>
                                <option value="regular">Regular</option>
                                <option value="express">Express</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-y-2 grow">
                            <label for="kurir" class="text-lg font-bold">Pilih Kurir</label>
                            <select required class="h-12 rounded-md" name="kurir">
                                <option value="" hidden disabled selected>Pilih salah satu</option>
                                <option value="jnt">J&T (Rp 40.000)</option>
                                <option value="ninja">Ninja (Rp 40.000)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-y-4">
                <div class="p-5 bg-white rounded-lg shadow-lg">
                    <h1 class="text-center font-bold text-[30px] pb-10">Ringkasan Pesanan</h1>
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="w-1/2 pb-4 text-left text-[18px]">Subtotal Produk</th>
                                <th class="w-1/2 pb-4 text-left text-[18px]">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td>
                                    <div class="flex items-center gap-x-4">
                                        <img src={{ url($productData['images'][0]) }} class="object-cover w-24 h-24 rounded-lg" alt="">
                                        <h1 class="text-[18px]">{{ $productData['name'] }}</h1>
                                    </div>
                                </td>
                                <td class="flex items-center h-24 font-bold gap-x-3">
                                    <p class="">@currency($productData['price'])</p>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 18" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 6L18 18" stroke="#33363F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <p>{{ $quantity }} PCS</p>
                                </td>
                            </tr>
                            <tr class="border-b border-black">
                                <td class="font-bold text-[18px] pb-2 pt-5 ">
                                    Subtotal
                                </td>
                                <td class="flex items-center pt-5 font-bold">
                                    @currency($productData['price'] * $quantity)
                                </td>
                            </tr>
                            <tr class="border-b border-black">
                                <td class="text-[18px] py-2">
                                    Pengiriman J&T Regular
                                </td>
                                <td class="flex items-center py-2 font-bold gap-x-3">
                                    @currency(40000)
                                </td>
                            </tr>

                            <tr class="text-[20px]">
                                <td class="py-5 font-bold">
                                    TOTAL
                                </td>
                                <td class="flex items-center py-5 font-bold gap-x-3">
                                    @currency($productData['price'] * $quantity + 40000)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="py-3 font-bold border-black border-y text-[20px]">Kupon</button>
                <button class="bg-[#89B53D] py-3 text-white text-[20px] font-bold rounded-xl">Checkout</button>
            </div>
        </form>
    </div>

</div>
@endsection
