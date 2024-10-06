@extends('layout.mian_structer')

@section('section_content')

<div class="container">

</div>

<div class="card">
    <div class="card-header">
        <h5>ارسال بريد الكتروني للمستخدم <b>{{ $booking->users->name }}</b> / بشأن المرفق <b>{{ $booking->rooms->name }}</b></h5>
    </div>
    <div class="card-body pt-2 px-5">
        <form action="{{ route('booking.send_massege') }}" method="post">
            @csrf
            <div class="form-group">
                <label>محتوى الرسالة</label>
                <textarea name="massege" cols="15" rows="5" class="form-control mt-2 p-3"></textarea>
            </div>
            <input type="text" name="booking_id" value="{{ $booking->id }}" hidden>
            <button role="submit" class="btn btn-primary w-100 mt-3">ارسال <i class="bi bi-send-fill"></i></button>
        </form>
    </div>
  </div>
@endsection
