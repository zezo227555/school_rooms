@extends('layout.mian_structer')

@section('section_content')
    <form action="{{ route('reating.update', $rating->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>تعديل تقييم المرفق {{ $booking->rooms->name }}</h4>
            </div>
            <div class="card-body">
                <div class="rating">
                    <input type="radio" name="stars" value="5" id="5" @checked($rating->stars == 5)>
                    <label for="5">☆</label>

                    <input type="radio" name="stars" value="4" id="4" @checked($rating->stars == 4)>
                    <label for="4">☆</label>

                    <input type="radio" name="stars" value="3" id="3" @checked($rating->stars == 3)>
                    <label for="3">☆</label>

                    <input type="radio" name="stars" value="2" id="2" @checked($rating->stars == 2)>
                    <label for="2">☆</label>

                    <input type="radio" name="stars" value="1" id="1" @checked($rating->stars == 1)>
                    <label for="1">☆</label>
                </div>
                <div class="form-group">
                    <label>اترك لنا تعليقا</label>
                    <textarea name="comment" class="form-control mt-2 p-3" style="height: 100px">{{ $rating->comment }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="حفظ" class="btn btn-primary w-25">
            </div>
        </div>
    </form>
@endsection
