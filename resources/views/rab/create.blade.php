@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah RAB</div>

                    <div class="card-body">
                        <form action="{{ route('rab.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="kegiatan_id">Nama Kegiatan</label>
                                <select name="" id="" class="form-select">
                                    @foreach ($kegiatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                    <option value="">Lainnya</option>
                                </select>
                                <input name="kegiatan_nama" id="kegiatan_nama" class="form-control mt-2"
                                    placeholder="Masukkan nama kegiatan lainnya..." />
                            </div>
                            <div class="form-group mb-4">
                                <label for="barang_id">Nama barang</label>
                                <select name="" id="" class="form-select">
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                    <option value="">Lainnya</option>
                                </select>
                                <input name="barang_nama" id="barang_nama" class="form-control mt-2"
                                    placeholder="Masukkan nama barang lainnya..." />
                            </div>

                            <div class="form-group text-end mt-4">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @push('js')
    <script>
        const __lg = (name, data) => {
            let _lgi = '';
            data.forEach(item => {
                _lgi += `<li class="list-group-item">
                    <input class="form-check-input me-1" type="radio" name="${name}" value="${item.id}" id="${name}${item.id}">
                    <label class="form-check-label" for="${name}${item.id}">${item.label}</label>
                </li>`
            });
            return `<ul class="list-group">${_lgi}</ul>`
        }
        document.addEventListener('DOMContentLoaded', () => {
            drawDrown();
        })

        function fetchDrownData(url) {

        }

        function drawDrown() {
            const drowns = document.getElementsByClassName('drown-search');
            [...drowns].forEach(item => {
                fetch(item.dataset.url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // Mengembalikan promise dari data JSON
                    })
                    .then(data => {
                        console.log(data); // Tampilkan data di console (atau lakukan operasi lainnya)
                        item.insertAdjacentHTML('afterend', __lg(item.dataset.name, data))
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error.message);
                    });
            })
        }

        const json_barangs = @json($barang)

        function cariBarang(el) {
            const searchValue = el.value.trim().toLowerCase();
            const barangList = document.querySelectorAll('.barang');
            const asd = document.querySelectorAll('[name=barang_id]');
            [...barangList].forEach(item => {
                item.classList.remove('active')
            });
            [...asd].forEach(item => {
                item.checked = false
            });
            barangList.forEach(barang => {
                const itemName = barang.textContent.trim().toLowerCase();
                if (itemName.includes(searchValue)) {
                    barang.style.display = 'block'; // or 'list-item'
                } else {
                    barang.style.display = 'none';
                }
            });
        }

        function setCheckedItem(el, id) {
            const barangs = document.querySelectorAll('.barang');
            [...barangs].forEach(barang => {
                barang.classList.remove('active')
            });
            el.classList.add('active')
            const radio = document.getElementById(id);
            radio.checked = true;
        }
    </script>
@endpush --}}
