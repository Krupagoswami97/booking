<?php

//for web response
function JsonResponse($success, $code, $error, $message, $data = [])
{
    $responseArr = array();
    $responseArr['success'] = $success;
    $responseArr['code'] = $code;
    $responseArr['error'] = $error;
    $responseArr['message'] = $message;
    if ($data) {
        $keys = array_keys($data);
        $count = [];
        if (count($keys) > 0) {
            // nested array count function
            foreach ($keys as $value) {
                try {
                    $count[$value] = count($data[$value]);
                } catch (\Throwable $th) {
                    $count[$value] = (!empty($value)) ? '1' : '0';
                }
            }
        }

        $responseArr['count'] = $count;
        $responseArr['results'] = $data;
    } else {
        $responseArr['count'] = 0; // if data wasnt pass then it will be zero.
        $responseArr['results'] = null;
    }
    return $responseArr;
}


function date_formate($date, $dateTImeFlag = false)
{
    if (empty($date)) {
        return null;
    }
    $date = str_replace('/', '-', $date);
    $dates = date_create($date);
    if ($dateTImeFlag) {
        $new_date = date_format($dates, "Y-m-d H:i:s");
    } else {
        $new_date = date_format($dates, "Y-m-d");
    }
    return $new_date;
}
?>
