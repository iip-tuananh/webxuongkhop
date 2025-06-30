<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\ResponseTrait;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Rate;
use App\Model\Admin\Rate as ThisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
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

class RateController extends Controller
{
    use ResponseTrait;
    protected $view = 'admin.rates';
    protected $route = 'rates';

    public function index(Request $request)
    {
        $user = auth()->user();
        $product = Product::query()->find($request->get('product-id'));

        return view($this->view . '.index', compact('user', 'product'));
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);

        return Datatables::of($objects)
            ->editColumn('product_id', function ($object) {
                return $object->product->name ?? '';
            })
            ->editColumn('created_at', function ($object) {
                return $object->created_at->format('d/m/y H:i');
            })
            ->editColumn('user_name', function ($object) {
                return $object->user_name. '<br>' . $object->user_phone .'<br>' . $object->user_address;
            })
            ->editColumn('approve_date', function ($object) {
                return $object->approve_date ? formatDate($object->approve_date) : '' ;
            })
            ->editColumn('approve_id', function ($object) {
                return $object->approve_id ? $object->approved->name : '';
            })
            ->editColumn('content', function ($object) {
                return Str::limit($object->content, 100);
            })
            ->editColumn('rating', function ($object) {
                $fullStar  = '<i class="fas fa-star text-warning"></i>';
                $emptyStar = '<i class="far fa-star text-muted"></i>';

                return str_repeat($fullStar, $object->rating)
                    . str_repeat($emptyStar, 5 - $object->rating);
            })
            ->addColumn('action', function ($object) {
                $result = '';
                $result .= '<a href="javascript:void(0)" title="Chi tiết" class="btn btn-sm btn-primary edit"><i class="fas fa-eye"></i></a>';
                $result .= '&nbsp;<a href="'.route('rates.delete', $object->id).'" title="Xóa" class="btn btn-sm btn-danger confirm"><i class="fas fa-times"></i></a>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['user_name', 'action', 'rating'])
            ->make(true);
    }

    public function create()
    {
        $user = auth()->user();

        return view($this->view . '.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'user_name' => 'required|max:255',
                'user_phone' => 'required|regex:/^(0)[0-9]{9,11}$/',
//                'user_address' => 'required',
                'send_at' => 'required',
                'rating' => 'required',
//                'content' => 'required',
                'status' => 'required',
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
            $object = new ThisModel();

            $object->title = $request->title;
            $object->user_name = $request->user_name;
            $object->user_phone = $request->user_phone;
            $object->user_address = $request->user_address;
            $object->created_at = $request->send_at;
            $object->rating = $request->rating;
            $object->content = $request->content;
            $object->status = $request->status;
            $object->product_id = $request->productid;
            $object->save();

            if($object->status == 2) {
                $object->approve_id = auth()->id();
                $object->approve_date = Carbon::now();

                $object->save();
            }

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

    public function update(Request $request, $id)
    {

        $validate = Validator::make(
            $request->all(),
            [
                'user_name' => 'required|max:255',
                'user_phone' => 'required|regex:/^(0)[0-9]{9,11}$/',
//                'user_address' => 'required',
                'send_at' => 'required',
                'rating' => 'required',
//                'content' => 'required',
                'status' => 'required',
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
            $object = ThisModel::findOrFail($id);
            $object->title = $request->title;
            $object->user_name = $request->user_name;
            $object->user_phone = $request->user_phone;
            $object->user_address = $request->user_address;
            $object->created_at = $request->send_at;
            $object->rating = $request->rating;
            $object->content = $request->content;
            $object->status = $request->status;
            $object->product_id = $request->productid;

            $object->save();

            if($object->status == 2) {
                $object->approve_id = auth()->id();
                $object->approve_date = Carbon::now();

                $object->save();
            }

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

    public function getReview(Request $request, $id) {
        $review = Rate::query()->find($id);

        if($review) {
            $review->send_at = ($review->created_at);
            $review->approve_date = \Illuminate\Support\Carbon::parse($review->approve_date)->format('d/m/Y H:i');
            return $this->responseSuccess("", $review);
        } else {
            return $this->responseErrors();
        }
    }

    public function getDataForEdit($id)
    {
        $json = new stdclass();
        $json->success = true;
        $json->data = ThisModel::getDataForEdit($id);
        return Response::json($json);
    }

    public function delete($id)
    {
        $object = ThisModel::findOrFail($id);

        $productId = $object->product_id;
        $object->delete();

        $message = array(
            "message" => "Thao tác thành công!",
            "alert-type" => "success"
        );

        return redirect()
            ->route($this->route . '.index', [
                'product-id' => $productId,
            ])
            ->with($message);
    }

//    public function update($id, Request $request)
//    {
//        $object = ThisModel::findOrFail($id);
//
//        $object->status = $request->status;
//        if($request->status == 2) {
//            $object->approve_id = auth()->id();
//            $object->approve_date = Carbon::now();
//        }
//        $object->save();
//
//        $json = new stdclass();
//        $json->success = true;
//        $json->message = 'Thao tác thành công';
//
//        return Response::json($json);
//    }

}
