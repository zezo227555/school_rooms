@extends('layout.mian_structer')

@section('section_content')
    <form action="{{ route('reating.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>تقييم المرفق {{ $booking->rooms->name }}</h4>
            </div>
            <div class="card-body">
                <div class="rating">
                    <input type="radio" name="stars" value="5" id="5">
                    <label for="5">☆</label>

                    <input type="radio" name="stars" value="4" id="4">
                    <label for="4">☆</label>

                    <input type="radio" name="stars" value="3" id="3">
                    <label for="3">☆</label>

                    <input type="radio" name="stars" value="2" id="2">
                    <label for="2">☆</label>

                    <input type="radio" name="stars" value="1" id="1">
                    <label for="1">☆</label>
                </div>
                <div class="form-group">
                    <label>اترك لنا تعليقا</label>
                    <textarea name="comment" class="form-control mt-2 p-3" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <input type="text" name="booking_id" value="{{ $booking->id }}" hidden>
                <input type="text" name="rooms_id" value="{{ $booking->rooms->id }}" hidden>
                
                <input type="submit" value="حفظ" class="btn btn-primary w-25">
            </div>
        </div>
    </form>
@endsection
