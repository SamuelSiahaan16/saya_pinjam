<x-template title="Pinjaman untuk Agunan Kendaraan">
    <!-- Checkout section start -->
    <div id="rs-checkout" class="rs-checkout orange-color pt-70 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="coupon-toggle">
                <div id="accordion" class="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <div class="card-title">
                                <span><i class="fa fa-window-maximize"></i>Silahkan Isi Form Berikut dengan benar agar
                                    memudahkan memproses Pinjaman Anda!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="full-grid">
                <form id="main-form">
                    <div class="billing-fields">
                        <div class="checkout-title">
                            <h3>Data Diri</h3>
                        </div>
                        <div class="form-content-box">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap *</label>
                                        <input id="full_name" name="full_name" class="form-control-mod" type="text"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Pekerjaan *</label>
                                        <input id="occupation" name="occupation" class="form-control-mod" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>No KTP *</label>
                                        <input id="id_number" name="id_number" class="form-control-mod" type="text"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>No HP (Whatsapp) *</label>
                                        <input id="phone_number" name="phone_number"
                                            class="form-control-mod number-only" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Nama Ibu Kandung *</label>
                                        <input id="mother_name" name="mother_name" class="form-control-mod" type="text"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten *</label>
                                        <select name="city_district" id="city_district" class="form-control-mod"
                                            required style="width: 100%; height: 50px">
                                            <option value="">Pilih Lokasi</option>
                                            @foreach($provinces as $province)
                                            <optgroup label="{{ $province->name }}">
                                                @foreach($province->cities as $city)
                                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                        <label>*Layanan ini hanya tersedia pada kota/kabupaten yang tersedia pada daftar
                                            ini</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tanggal Lahir *</label>
                                        <input id="date_birthday" name="date_birthday" class="form-control-mod"
                                            type="date" required>
                                        <div id="date_birthday_error" style="color: red; display: none;">Usia harus
                                            antara 21 dan 55 tahun.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="billing-fields">
                        <div class="checkout-title">
                            <h3>Agunan</h3>
                            <input id="type_loan" name="type_loan" class="form-control-mod" value="Agunan Kendaraan"
                                type="text" hidden>
                        </div>
                        <div class="form-content-box">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tipe Kendaraan *</label>
                                        <select name="car_type" id="car_type">
                                            <option value="">Pilih Tipe Kendaraan</option>
                                            <option value="Kendaraan Roda 2">Kendaraan Roda 2</option>
                                            <option value="Kendaraan Roda 4">Kendaraan Roda 4</option>
                                            <option value="Kendaraan Roda 4 Lebih">Kendaraan Roda 4 Lebih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Merk Kendaraan *</label>
                                        <input id="car_brand" name="car_brand" class="form-control-mod" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Model Kendaraan *</label>
                                        <input id="car_model" name="car_model" class="form-control-mod" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tahun Kendaraan *</label>
                                        <input id="car_year" name="car_year" class="form-control-mod" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Plat Kendaraan *</label>
                                        <input id="car_license_plate" name="car_license_plate" class="form-control-mod"
                                            type="text" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="billing-fields">
                        <div class="checkout-title">
                            <h3>Pinjaman</h3>
                        </div>
                        <div class="form-content-box">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Penghasilan Bulanan *</label>
                                        <input id="monthly_salary" name="monthly_salary" class="form-control-mod"
                                            type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Nominal Pinjaman (Rp) *</label>
                                        <input id="loan_amount" name="loan_amount" class="form-control-mod custom-range"
                                            type="range" min="500000" max="100000000" step="500000" required>
                                        <span id="loan_amount_value" class="range-value">500,000</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Jangka Waktu Pinjaman (Bulan) *</label>
                                        <input id="loan_term" name="loan_term" class="form-control-mod custom-range"
                                            type="range" min="1" max="60" step="1" required>
                                        <span id="loan_term_value" class="range-value">1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="additional-fields">
                        <div class="form-content-box">
                            <div class="checkout-title">
                                <h3>Data Tambahan</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Upload KTP *</label>
                                        <input id="id_photo_path" name="id_photo_path" class="form-control-mod"
                                            type="file" required>
                                        <img id="ktp_preview" style="display:none;" alt="KTP Anda">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Selfie (memegang KTP) *</label>
                                        <img id="selfie_preview" style="display:none;" alt="Selfie Anda">
                                        <button id="start-camera-btn" type="button">Buka Kamera</button>
                                        <div class="video-container" style="display:none;">
                                            <video id="video" autoplay></video>
                                            <canvas id="canvas" style="display:none;"></canvas>
                                            <button id="capture-btn" type="button" style="display:none;">Ambil
                                                Foto</button>
                                            <button id="retake-btn" type="button" style="display:none;">Ambil
                                                Ulang</button>
                                            <button id="use-photo-btn" type="button" style="display:none;">Gunakan
                                                Ini</button>
                                        </div>
                                        <input id="photo-input" name="selfie_photo_path" type="file" accept="image/*"
                                            capture="user" style="display:none;">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="g-recaptcha" data-sitekey="{{ env('SITE_KEY_RECAPTCHA') }}"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <input type="checkbox" id="agreement" name="agreement" required>
                                        <label for="agreement" class="ml-10" style="font-size: 12px">
                                            Saya menyetujui <a href="#">Syarat dan Ketentuan</a> dan <a
                                                href="#">Kebijakan Privasi</a> dan bersedia untuk dihubungi oleh
                                            SayaPinjam.com serta semua Institusi Keuangan rekanan. Saya memberi kuasa
                                            kepada SayaPinjam.com dan Institusi Keuangan rekanan untuk memeriksa
                                            informasi
                                            yang diberikan dan menghubungi sumber informasi yang layak seperti SLIK,
                                            biro kredit atau sejenisnya.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="payment-method mt-40 md-mt-20">
                        <div class="bottom-area">
                            <button class="btn-shop orange-color" id="submit_form"
                                onclick="handle_save('#submit_form','#main-form','{{ route('store-jaminan-motor')}}','POST','Kirim Permintaan');"
                                type="submit">Kirim Permintaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('custom_js')
    <script src="{{ asset('assets/custom-js.js') }}"></script>
    @endsection

    @section('custom_css')
    <link rel="stylesheet" href="{{asset('assets/custom-css.css')}}" type="text/css" />
    @endsection

</x-template>