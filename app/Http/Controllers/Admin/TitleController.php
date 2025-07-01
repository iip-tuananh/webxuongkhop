<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Category;
use Illuminate\Http\Request;
use App\Model\Admin\TitlePage as ThisModel;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use \stdClass;

use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Helpers\FileHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Common\Customer;

class TitleController extends Controller
{
    protected $view = 'admin.title_pages';
    protected $route = 'titlePages';

    public function edit(Request $request, $page)
    {
        $object = ThisModel::getDataForEdit($page);
        $titleArrs = [
            'service'         => 'Dịch vụ',
            'review-video'    => 'Cảm nhận khách hàng',
            'treatment-steps' => 'Quy trình khám chữa',
            'review-text'     => 'Đánh giá khách hàng',
            'register-form'   => 'Đăng ký tư vấn khám miễn phí',
            'news'            => 'Tin tức & Sự kiện',
        ];
        $titlePage = $titleArrs[$object->page] ?? '';

        return view($this->view.'.edit', compact('object', 'titlePage'));
    }

    public function update(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'title_1' => 'nullable',
                'title_2' => 'nullable',
            ]
        );
        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = ThisModel::query()->where('page', $request->page)->first();
            $object->title_1 = $request->title_1;
            $object->title_2 = $request->title_2;

            $object->save();

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            $json->data = $object;
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        $object = ThisModel::findOrFail($id);
        if (!$object->canDelete()) {
            $message = array(
                "message" => "Không thể xóa!",
                "alert-type" => "warning"
            );
        } else {
            if($object->image) {
                FileHelper::deleteFileFromCloudflare($object->image, $object->id, ThisModel::class, 'image');
            }
            $object->delete();
            $message = array(
                "message" => "Thao tác thành công!",
                "alert-type" => "success"
            );
        }


        return redirect()->route($this->route . '.index')->with($message);
    }





}
