@extends('layouts.myapp')

@section('title', 'Giới thiệu về Đồ Gỗ Tỵ Trang')

@section('content')
<div class="container my-5">

    <!-- Tiêu đề trang -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #8B4513;"> Giới thiệu về Đồ Gỗ Tỵ Trang</h1>
        <p class="text-muted mt-3 fs-5">
            Nơi tôn vinh vẻ đẹp của gỗ tự nhiên – kết hợp giữa truyền thống và hiện đại.
        </p>
    </div>

    <!-- Giới thiệu tổng quan -->
    <div class="row align-items-center mb-5">
        <div class="col-md-5">
            <img src="https://tse4.mm.bing.net/th/id/OIP.MsT_Z_zq4xr0X2z2PZsfBAHaEz?pid=Api&P=0&h=220"
                alt="Đồ gỗ nội thất" class="img-fluid rounded-4 shadow-sm">
        </div>
        <div class="col-md-6">
            <h3 class="fw-semibold" style="color: #5A3E2B;"> Về chúng tôi</h3>
            <p class="mt-3 text-secondary" style="text-align: justify;">
                <strong>Đồ Gỗ Tỵ Trang</strong> là thương hiệu chuyên sản xuất và kinh doanh
                các sản phẩm nội thất gỗ cao cấp, được chế tác tỉ mỉ bởi những nghệ nhân
                có kinh nghiệm lâu năm. Chúng tôi mang đến cho khách hàng không gian sống
                sang trọng, tinh tế và bền vững theo thời gian.
            </p>
            <p class="text-secondary" style="text-align: justify;">
                Với phương châm <em>“Chất lượng khẳng định thương hiệu”</em>,
                Tỵ Trang luôn chọn lọc nguyên liệu gỗ tự nhiên, xử lý công nghệ cao,
                đảm bảo sản phẩm không cong vênh, mối mọt và thân thiện với môi trường.
            </p>
        </div>
    </div>

    <!-- Sứ mệnh và giá trị -->
    <div class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-6">
            <img src="https://tse3.mm.bing.net/th/id/OIP.SjTVL4i8LMX4DfN_2-EPlwHaEK?pid=Api&P=0&h=220"
                alt="Xưởng sản xuất đồ gỗ" class="img-fluid rounded-4 shadow-sm">
        </div>
        <div class="col-md-6">
            <h3 class="fw-semibold" style="color: #5A3E2B;"> Sứ mệnh & Giá trị</h3>
            <ul class="mt-3 text-secondary">
                <li>Đặt khách hàng làm trung tâm của mọi quyết định.</li>
                <li>Tôn trọng giá trị truyền thống và tinh hoa nghề mộc Việt Nam.</li>
                <li>Không ngừng đổi mới, ứng dụng công nghệ vào thiết kế nội thất.</li>
                <li>Cam kết chất lượng, uy tín và trách nhiệm xã hội.</li>
            </ul>
        </div>
    </div>

    <!-- Tầm nhìn -->
    <div class="text-center my-5">
        <h3 class="fw-semibold" style="color: #5A3E2B;"> Tầm nhìn tương lai</h3>
        <p class="mt-3 mx-auto text-secondary" style="max-width: 800px; text-align: justify;">
            Đồ Gỗ Tỵ Trang hướng tới trở thành một trong những thương hiệu nội thất hàng đầu tại Việt Nam,
            mở rộng hệ thống phân phối trên toàn quốc và xuất khẩu sản phẩm ra thị trường quốc tế.
            Mỗi sản phẩm của chúng tôi không chỉ là một món đồ nội thất – mà còn là tác phẩm nghệ thuật,
            mang trong mình hơi thở của thiên nhiên và tâm huyết của người thợ Việt.
        </p>
    </div>

</div>
@endsection