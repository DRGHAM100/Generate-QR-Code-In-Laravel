<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Facades\Imagick;
use Validator;
use Str;


class QrController extends Controller
{
    public function index(Request $request){
        return view('QrCodes.qr_builder');
    }

    public function generateQrCode(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $code = Str::slug($request->body).'.svg'; // Drgham Dakhol => drgham-dakhol
        $size = $request->size ?? '300';
        $correction = $request->correction ?? 'H';
        $encoding = $request->encoding ?? 'UTF-8';

        $qr = QrCode::size('100')->format('svg')->encoding($encoding)->errorCorrection($correction);
        $qr->generate($request->body,'../public/QrCodes/'.$code);
        
        return back()->with([
            'status' => 'Qr Code Generated Successfully',
            'code' => $code
        ]);
    }

}
