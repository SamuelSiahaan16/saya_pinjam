<x-template title="Success">

    <div class="d-flex justify-content-center align-items-center pb-100 pt-100">
        <div class="card shadow-lg p-4 bg-white rounded">
            <h1 class="text-success text-center">Berhasil!</h1>
            <p class="text-center">Permintaan kamu sedang diproses.</p>
            <p class="text-center">
                Nama Lengkap: <strong>{{ $data['name'] }}</strong><br>
                Kode: <strong>{{ $data['code'] }}</strong><br>
                Tipe Pinjaman: <strong>{{ $data['type'] }}</strong><br>
            </p>
            <p class="text-center">Silahkan Copy Kode Permintaan Anda dan Simpan.</p>
            <p class="text-center">Terima Kasih!</p>
            <div class="text-center">
                <a href="{{ route('cekstatus') }}" class="btn btn-custom btn-continue">Cek Status</a>
            </div>
        </div>
    </div>

    @section('custom_css')
    <style>
        .card {
            background: #f5f5f5;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 100%;
            max-width: 600px;
        }

        .card h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn-custom {
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 16px;
            margin: 10px;
        }

        .btn-rate {
            background: #007bff;
            color: white;
            border: none;
        }

        .btn-continue {
            background: #e0e0e0;
            color: black;
            border: none;
        }

        .vh-100 {
            height: 100vh;
        }
    </style>
    @endsection

</x-template>