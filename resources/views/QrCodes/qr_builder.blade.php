@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Qr Builder') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-8">
                            <form action="{{route('generateQrCode')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                    @error('name') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <input type="text" name="body" id="body" class="form-control" value="{{old('body')}}">
                                    @error('body') <span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="size">QR Size</label>
                                        <select name="size" id="size" class="form-control">
                                            <option value="">Select Size</option>
                                            <option value="300">300 x 300</option>
                                            <option value="600">600 x 600</option>
                                            <option value="900">900 x 900</option>
                                        </select>
                                        @error('size') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="correction">QR Correction</label>
                                        <select name="correction" id="correction" class="form-control">
                                            <option value="">Select Correction</option>
                                            <option value="L">7%</option>
                                            <option value="M">15%</option>
                                            <option value="Q">25%</option>
                                            <option value="H">30%</option>
                                        </select> 
                                        @error('body') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group col-4">
                                    <label for="encoding">QR Encoding</label>
                                        <select name="encoding" id="encoding" class="form-control">
                                            <option value="">Select QR Encoding</option>
                                            <option value="UTF-8">UTF-8</option>
                                            <option value="ISO-8859-1">ISO-8859-1</option>
                                            <option value="ISO-8859-2">ISO-8859-2</option>
                                            <option value="ISO-8859-3">ISO-8859-3</option>
                                            <option value="ISO-8859-4">ISO-8859-4</option>
                                            <option value="ISO-8859-5">ISO-8859-5</option>
                                            <option value="ISO-8859-6">ISO-8859-6</option>
                                            <option value="ISO-8859-7">ISO-8859-7</option>
                                            <option value="ISO-8859-8">ISO-8859-8</option>
                                            <option value="ISO-8859-9">ISO-8859-9</option>
                                            <option value="ISO-8859-10">ISO-8859-10</option>
                                            <option value="ISO-8859-11">ISO-8859-11</option>
                                            <option value="ISO-8859-12">ISO-8859-12</option>
                                            <option value="ISO-8859-13">ISO-8859-13</option>
                                            <option value="ISO-8859-14">ISO-8859-14</option>
                                            <option value="ISO-8859-15">ISO-8859-15</option>
                                            <option value="ISO-8859-16">ISO-8859-16</option>
                                            <option value="SHIFT-JIS">SHIFT-JIS</option>
                                            <option value="WINDOWS-1250">WINDOWS-1250</option>
                                            <option value="WINDOWS-1251">WINDOWS-1251</option>
                                            <option value="WINDOWS-1252">WINDOWS-1252</option>
                                            <option value="WINDOWS-1256">WINDOWS-1256</option>
                                            <option value="UTF-16BE">UTF-16BE</option>
                                            <option value="ASCII">ASCII</option>
                                            <option value="GBK">GBK</option>
                                            <option value="EUC-KR">EUC-KR</option>
                                        </select>
                                        @error('body') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">Generate QR Code</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            @if (session('code'))
                                <img src="{{ asset('/QrCodes/'.session('code')) }}" alt="{{session('code')}}">
                            @endif     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
