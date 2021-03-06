@extends('admin_layout')
@section('admin_content')

    <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bạn đọc
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/add-bandoc')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label >Họ tên</label>
                                        <input type="text" class="form-control" name="them_hoten">
                                    </div>
                                    <div class="form-group">
                                        <label >Giới tính</label>
                                        <!-- <input type="text" class="form-control" name="them_giotinh"> -->
                                        <select class="form-control" name="them_gioitinh">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label >Số điện thoại</label>
                                        <input type="number" class="form-control" name="them_sdt">
                                    </div>
                                    <div class="form-group">
                                        <label >Địa chỉ</label>
                                        <input type="text" class="form-control" name="them_diachi">
                                    </div>
                                    <div class="form-group">
                                        <label >Ngày tạo</label>
                                        <input type="date" class="form-control" name="them_ngaytao">
                                    </div>
                                    <div class="form-group">
                                        <label >Ngày hết hạn</label>
                                        <input type="date" class="form-control" name="them_ngayhethan">
                                    </div>
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>

@endsection