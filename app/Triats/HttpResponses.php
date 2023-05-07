<?php
namespace App\Triats;

trait HttpResponses {
    protected function Success($data,$message=null,$code=200){
    return response()->json([
        'status'=>'Request was succesfull',
        'message'=>$message,
        'data'=>$data
    ],$code);
    }
    protected function Error($data,$message=null,$code){
        return response()->json([
            'status'=>'Error has occurre',
            'message'=>$message,
            'data'=>$data
        ],$code);
        }
}
