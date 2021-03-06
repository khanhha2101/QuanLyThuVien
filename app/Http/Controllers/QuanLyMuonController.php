<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class QuanLyMuonController extends Controller
{
    //
    public function muonsach_show()
    {
        $all_sach = DB::table('sach')->get();
        $all_the = DB::table('themuon')->get();
        return view('admin.chitiet.muonsach')->with('sachs', $all_sach)->with('bandoc', $all_the);
    }
    public function trasach_show()
    {
        $all_chitiet = DB::table('chitiet')
            ->join('themuon', 'themuon.idthe', '=', 'chitiet.idthe')->orderby('idct', 'desc')->get();

        $distinct = null;
        foreach ($all_chitiet as $key => $value) {
            if ($distinct != null) {
                $i = 0;
                foreach ($distinct as $key => $dis) {
                    if ($dis->idthe == $value->idthe && $dis->ngaymuon == $value->ngaymuon) {

                        $i = 1;
                    }
                }
                if ($i == 0) {
                    $distinct[] = $value;
                }
            } else {
                $distinct = array();
                $distinct[] = $value;
            }
        }

        $manager_chitiet = view('admin.chitiet.quanlymuon')->with('all_chitiet', $distinct);
        return view('admin_layout')->with('admin.chitiet.quanlymuon', $manager_chitiet);
    }
    //thêm
    public function add_chitiet(Request $request)
    {

        $masach = $request->masach;

        foreach ($masach as $key => $value) {
            if ($value) {
                $mang = explode(' ', $value);

                $data = array();
                $data['idsach'] = $mang[0];
                $data['idthe'] = $request->idthe;
                $data['ngaymuon'] = $request->ngaymuon;
                $data['ngaytra'] = $request->hantra;

                $result = DB::table('chitiet')->insert($data);
            }
        }

        if ($result) {
            Session::put('msg', '<script type="text/javascript">alert("Thêm thành công!");</script>');

            return Redirect::to('/trasach-show');
        } else {

            return Redirect::to('/muonsach-show');
        }
    }
    //xoá 
    public function del_chitiet($idthe, $ngaymuon)
    {
        DB::table('chitiet')->where('idthe', $idthe)->where('ngaymuon', $ngaymuon)->delete();
        return Redirect::to('trasach-show');
    }

    //sửa 
    public function edit_chitiet($idthe, $ngaymuon, $idct)
    {

        $thongtin = DB::table('chitiet')
        -> join('themuon', 'themuon.idthe', '=', 'chitiet.idthe')
        ->where('idct', $idct)->get();

        $edit_chitiet = DB::table('chitiet')
            ->join('sach', 'sach.idsach', '=', 'chitiet.idsach')
            ->where('idthe', $idthe)->where('ngaymuon', $ngaymuon)->get();
        $manager_chitiet = view('admin.chitiet.trasach')->with('edit_chitiet', $edit_chitiet)->with('thongtin', $thongtin);
        return view('admin_layout')->with('admin.chitiet.trasach', $manager_chitiet);
    }
    public function update_chitiet(Request $request, $idthe, $ngaymuon)
    {

        $idcts = DB::table('chitiet')->where('idthe', $idthe)->where('ngaymuon', $ngaymuon)->get();

        $masach = $request->masach;

        $i = 0;

        foreach ($idcts as $key => $value) {

            $mang = explode(' ', $request->idthe);

            $data = array();
            $data['idsach'] = $masach[$i];
            $data['idthe'] = $mang[0];
            $data['ngaymuon'] = $request->ngaymuon;
            $data['ngaytra'] = $request->hantra;
            $data['ngaytrathucte'] = $request->ngaytra;

            $result = DB::table('chitiet')->where('idct', $value->idct)->update($data);

            $i++;
        }


        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('trasach-show');
    }

    ///lọc theo trạng thái
    public function search_mathe($trangthai) {
        if ($trangthai == 1) {
            $all_chitiet = DB::table('chitiet')
            -> whereNull ('ngaytrathucte')
            ->join('themuon', 'themuon.idthe', '=', 'chitiet.idthe')->orderby('idct', 'desc')->get();
    
        } else {
            $all_chitiet = DB::table('chitiet')
            -> whereNotNull ('ngaytrathucte')
            ->join('themuon', 'themuon.idthe', '=', 'chitiet.idthe')->orderby('idct', 'desc')->get();
    
        }

        

        
        $distinct = null;
        foreach ($all_chitiet as $key => $value) {
            if ($distinct != null) {
                $i = 0;
                foreach ($distinct as $key => $dis) {
                    if ($dis->idthe == $value->idthe && $dis->ngaymuon == $value->ngaymuon) {

                        $i = 1;
                    }
                }
                if ($i == 0) {
                    $distinct[] = $value;
                }
            } else {
                $distinct = array();
                $distinct[] = $value;
            }
        }

        $manager_chitiet = view('admin.chitiet.quanlymuon')->with('all_chitiet', $distinct);
        return view('admin_layout')->with('admin.chitiet.quanlymuon', $manager_chitiet);
    }

    //tìm kiếm theo mã thẻ
    public function search_mathe2($idthe) {
        $all_chitiet = DB::table('chitiet')
            -> where ('chitiet.idthe', $idthe)
            ->join('themuon', 'themuon.idthe', '=', 'chitiet.idthe')->orderby('idct', 'desc')->get();
        
        $distinct = null;
        foreach ($all_chitiet as $key => $value) {
            if ($distinct != null) {
                $i = 0;
                foreach ($distinct as $key => $dis) {
                    if ($dis->idthe == $value->idthe && $dis->ngaymuon == $value->ngaymuon) {

                        $i = 1;
                    }
                }
                if ($i == 0) {
                    $distinct[] = $value;
                }
            } else {
                $distinct = array();
                $distinct[] = $value;
            }
        }

        $manager_chitiet = view('admin.chitiet.quanlymuon')->with('all_chitiet', $distinct);
        return view('admin_layout')->with('admin.chitiet.quanlymuon', $manager_chitiet);
    }
}
