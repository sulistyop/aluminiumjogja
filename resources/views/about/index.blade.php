@extends('layouts.app')
@section('title','Aluminium Jogja')
@section('content')


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-14 col-lg-6">
                <div class="wrapper-top mt-5">
                    <h2 class="font-weight-bold">SELAMAT DATANG DI Aluminium Jogja</h2>
                    <h5>Belanja Mebel Lebih Murah dan Mudah</h5>
                    <a name="" id="" class="btn btn-primary btn-top mt-3"
                        href="{{ route('produk.index') }}" role="button">Belanja Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="showback">
              <h4><i class="fa fa-angle-right"></i> Aluminium Jogja Jogaja</h4>
             
			<div class="caption">
				<h4>
					
				</h4>
				<p>
					Kami membuka jasa pembuatan mebel. Mebel yang kami buat beragam jenis dan dapat di desain sesuai dengan keinginan pelanggan. Kami juga menerima pesanan dalam jumlah besar.
					Motivasi kami adalah membuat mebel yang unik dari bahan yang berbeda.
					Kami memberikan contoh mebel yang kami buat pada halaman media. Pelanggan juga dapat memesan sesuai dengan keinginan	
			</div>
            </div>

            <!-- /showback -->
          </div>
          <!-- /col-lg-6 -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
              <h4><i class="fa fa-angle-right"></i> Misi</h4>
              <div class="alert alert-success">1)	Memberikan lapangan kerja bagi warga kradenan dan sekitarnya.</div>
              <div class="alert alert-info">2)	Memanfaatkan bahan sisa seperti potongan kayu</div>
              <div class="alert alert-warning">3)	Mengembangkan kerajinan kayu dan resin</div>
            </div>
            <!-- /showback -->
            <!--  DISMISSABLE ALERT -->
            <div class="showback">
              <h4><i class="fa fa-angle-right"></i> Visi </h4>
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 Membuat berbagai inovasi mebel
              </div>
            </div>
            
          </div>
          <!-- /col-lg-6 -->
        </div>
        <!--/ row -->
      </section>
      <!-- /wrapper -->
    </section>

@endsection
