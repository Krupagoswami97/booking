<?php

namespace App\Http\Controllers\Api\Admin\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class BookingController extends Controller
{
    public function list(Request $request)
    {
        $obj = Booking::select('*');
        if ($request->has('row_id') && !empty($request->row_id)) {
            $obj = $obj->orWhere('id', $request->row_id);
        }
        $obj = $obj->orderBy('id', 'desc')->get();
        if (count($obj) > 0) {
            $response = JsonResponse(true, 200, [], 'Successfully Get Booking', ['records' => $obj]);
            return response($response, 200);
        } else {
            $response = JsonResponse(false, 200, [], 'Booking Not Found', []);
            return response($response, 200);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validationCustomerName = Validator::make($data, [
            'customer_name' => 'required|string',
        ]);
        if ($validationCustomerName->fails()) {
            $messagesCustomerName = $validationCustomerName->errors()->getMessages()['customer_name'];
            $response = JsonResponse(false, 422, $validationCustomerName->messages(), $messagesCustomerName[0], []);
            return response($response, 422);
        }

        $validationEmail = Validator::make($data, [
            'customer_email' => 'required|unique:bookings,customer_email',
        ]);
        if ($validationEmail->fails()) {
            $messagesEmail = $validationEmail->errors()->getMessages()['customer_email'];
            $response = JsonResponse(false, 422, $validationEmail->messages(), $messagesEmail[0], []);
            return response($response, 422);
        }

        $validationDate = Validator::make($data, [
            'booking_date' => 'required',
        ]);
        if ($validationDate->fails()) {
            $messagesDate = $validationDate->errors()->getMessages()['booking_date'];
            $response = JsonResponse(false, 422, $validationDate->messages(), $messagesDate[0], []);
            return response($response, 422);
        }

        $validationType = Validator::make($data, [
            'booking_type' => 'required',
        ]);
        if ($validationType->fails()) {
            $messagesType = $validationType->errors()->getMessages()['booking_type'];
            $response = JsonResponse(false, 422, $validationType->messages(), $messagesType[0], []);
            return response($response, 422);
        }

        if($request->booking_type == "Half Day"){
            $validationSlot = Validator::make($data, [
                'booking_slot' => 'required',
            ]);
            if ($validationSlot->fails()) {
                $messagesSlot = $validationSlot->errors()->getMessages()['booking_slot'];
                $response = JsonResponse(false, 422, $validationSlot->messages(), $messagesSlot[0], []);
                return response($response, 422);
            }
        }

        if($request->booking_type == "Custom"){
            $validationBookingFrom = Validator::make($data, [
                'booking_from' => 'nullable',
            ]);
            if ($validationBookingFrom->fails()) {
                $messagesBookingFrom = $validationBookingFrom->errors()->getMessages()['booking_from'];
                $response = JsonResponse(false, 422, $validationBookingFrom->messages(), $messagesBookingFrom[0], []);
                return response($response, 422);
            }

            $validationBookingTo = Validator::make($data, [
                'booking_to' => 'required',
            ]);
            if ($validationBookingTo->fails()) {
                $messagesBookingTo = $validationBookingTo->errors()->getMessages()['booking_to'];
                $response = JsonResponse(false, 422, $validationBookingTo->messages(), $messagesBookingTo[0], []);
                return response($response, 422);
            }
        }


        $obj = new Booking();
        $obj->customer_name = $request->customer_name;
        $obj->customer_email = $request->customer_email;
        $obj->booking_date = date_formate($request->booking_date);
        $obj->booking_type = $request->booking_type;

        $requestDateYMD = Carbon::parse($request->booking_date)->format('Y-m-d');
        $objBooking = Booking::where('booking_date',$requestDateYMD)->where('booking_type','Full Day')->first();
        if($objBooking){
            $response = JsonResponse(false, 200, [], 'Selected Date ia already booked as full day', ['records' => $obj]);
            return response($response, 200);
        }

        if($request->booking_type == "Half Day"){
            $obj->booking_slot = $request->booking_slot;
        }
        else if($request->booking_type == "Custom"){
            $obj->booking_from = $request->booking_from;
            $obj->booking_to = $request->booking_to;
        }
        else if( $request->booking_type == "Full Day"){
            $objBooking = Booking::where('booking_date',$requestDateYMD)->where('booking_type','Half Day')->first();
            if($objBooking){
                $response = JsonResponse(false, 200, [], 'Selected Date ia already booked as half day', ['records' => $obj]);
                return response($response, 200);
            }
        }
        $obj->save();

        $response = JsonResponse(true, 200, [], 'Successfully Saved Saved', ['records' => $obj]);
        return response($response, 200);
    }
}
