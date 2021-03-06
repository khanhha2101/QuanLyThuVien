@extends('admin_layout')
@section('admin_content')


<div class="table-agile-info">
    <?php
    $msg = Session::get('msg');
    if ($msg) {
        echo $msg;
        Session::put('msg', null);
    }

    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách mượn
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle" name="forma" onchange="location = this.value;">
                    <option></option>
                    <option value="{{URL::to('/trasach-show')}}">Tất cả</option>
                    <option value="{{URL::to('/search-mathe/1')}}">Chưa trả</option>
                    <option value="{{URL::to('/search-mathe/2')}}">Đã trả</option>
                </select>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">

                    <input type="text" class="input-sm form-control" placeholder="Mã thẻ" name="mathe" id="mathe">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit" onclick="location = '{{URL::to('/search-mathe2/')}}' + '/' + mathe.value;">Search</button>
                    </span>

                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Mã thẻ</th>
                        <th>Họ tên</th>
                        <th>Ngày mượn</th>
                        <th>Hạn trả</th>
                        <th>Ngày trả</th>
                        <th style="width:140px;"></th>
                    </tr>
                </thead>
                <tbody id="listMuon">
                    @foreach($all_chitiet as $key => $chitiet)
                    <tr>
                        <td>{{$chitiet -> idthe}}</td>
                        <td>{{$chitiet -> hoten}}</td>
                        <td>{{$chitiet -> ngaymuon}}</td>
                        <td>{{$chitiet -> ngaytra}}</td>
                        <td>{{$chitiet -> ngaytrathucte}}</td>
                        <td>
                            <button type="submit" class="btn" style="background-color: #49CF9B;"><a href="{{URL::to('/edit-chitiet/'.$chitiet->idthe.'&'.$chitiet->ngaymuon.'&'.$chitiet->idct)}}"> Xem</a></button>

                            <button type="submit" class="btn" style="background-color: #FE8A8A;"><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{URL::to('/del-chitiet/'.$chitiet->idthe.'&'.$chitiet->ngaymuon.'&'.$chitiet->idct)}}">Xóa</a></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>


@endsection