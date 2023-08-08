@extends('layouts.app')
@section('title',$produk->name)

@section('content')

<div class="container mt-5">

    <nav aria-label="breadcrumb white">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
          <li class="breadcrumb-item active" aria-current="page">Produk Detail</li>
        </ol>
      </nav>

    <div class="row mt-5">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <img src="{{ url('uploads/'.$produk->image) }}"
                class="card-img-top img-thumbnail" alt="...">
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="mb-4 mt-4">
                <h3><strong>{{ $produk->name }}</strong></h3>
            </div>
            <h5>Rp. {{ number_format($produk->price,0,",","." )}}</h5>
            <table class="table mt-2">
                <tbody>
                    <tr>
                        <th scope="row">Status</th>
                        <td>:</td>
                        <td>
                            @if ($produk->quantity == 0)
                            <span class="badge badge-danger">Habis</span>
                            @else
                            <span class="badge badge-success">Tersedia</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Kategori</th>
                        <td>:</td>
                        <td>{{ $produk->category['name'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <a class="btn btn-success"
                                href="https://api.whatsapp.com/send?phone=6285282330303&text=Saya%20Ingin%20Konsultasi%20">
                                <i aria-hidden="true" class="fab fa-whatsapp"></i> </span>
                                <span class="elementor-button-text">Konsultasi Sekarang</span>
                            </a>                        
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            @unlessrole('admin')
                <button type="submit" class="btn btn-primary w-100 mt-2"> <i class="fa fa-shopping-cart mr-2"></i> Tambah
                Keranjang</button>
            @endunlessrole
            <nav class="mt-5">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="container">
                        <p class="pt-2">
                            {{ $produk->desc }}
                        </p>
                    </div>
                </div>
              </div>
        </div>
    </div>

</div>

@endsection
