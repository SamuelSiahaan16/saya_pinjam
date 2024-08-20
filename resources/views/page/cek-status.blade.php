<x-template title="Cek Status">

    <div class="raw pt-90 pb-90 h-m-700">
        <div class="container">

            <div class="card bg-danger text-white rounded-3 shadow-lg mb-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="sec-title">
                                <div class="sub-title">Cek Status</div>
                                <h2 class="title mb-0 text-white">Cek Status Pinjaman Anda</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form class="newsletter-form d-flex" action="{{ route('cek-status') }}" method="GET">
                                @csrf
                                <input type="text" name="code" class="form-control me-2"
                                    placeholder="Masukkan Kode Pesanan Anda" required>
                                <button type="submit" class="btn btn-light">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('error'))
            <div class="alert alert-danger mt-5 text-center">
                {{ session('error') }}
            </div>
            @endif

            @if(isset($code))
            <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="text-center">Status Pinjaman Anda</h3>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($code->statuses as $status)
                                <tr>
                                    <td>{{ $status->status }}</td>
                                    <td>{{ $status->remarks }}</td>
                                    <td>{{ $status->created_at->format('d-m-Y H:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                <div class="card-body text-center">
                    <h3>Tidak Ada Riwayat</h3>
                </div>
            </div>
            @endif

        </div>
    </div>

    @section('custom_css')
    <style>
        .h-m-700 {
            min-height: 700px;
        }

        .sec-title {
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .sub-title {
            font-size: 18px;
        }

        .newsletter-form input {
            border-radius: 0.25rem;
            padding: 10px;
        }

        .btn-light {
            background-color: #f8f9fa;
            border: none;
            color: #333;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
        }

        .card {
            border-radius: 15px;
        }

        .card h3 {
            margin-bottom: 20px;
        }
    </style>
    @endsection

</x-template>