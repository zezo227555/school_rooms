@extends('layout.mian_structer')

@section('section_content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">عرض بيانات المرفق</h5>

            <!-- Default Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">بيانات المرفق</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">صورة المرفق</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                        role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">التقييمات و
                        التعليقات</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="mt-2">الاسم: {{ $room->name }}</li>
                                <li class="mt-2">الطابق: {{ $room->floor }}</li>
                                <li class="mt-2">النوع: {{ $room->type }}</li>
                                <li class="mt-2">الوصف: {{ $room->description }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="mt-2">السعة: {{ $room->capacity }}</li>
                                @if ($room->available == 1)
                                    <li class="mt-2">متوفر ام لا: <span class="btn btn-success">متوفر</span></li>
                                @else
                                    <li class="mt-2">متوفر ام لا: <span class="btn btn-danger">غير متوفر</span></li>
                                @endif
                                <li class="mt-2">تاريخ الاضافة: {{ $room->created_at->format('Y-m-d') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <img src="{{ asset('rooms') . '/' . $room->image }}" class="image w-75 h-75">
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <ul class="list-group">
                        @foreach ($ratings as $rating)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-10">
                                        <h6>{{ $rating->user->name }}</h6>
                                        @for ($i = 0; $i < $rating->stars; $i++)
                                            <span><i class="bi bi-star-fill me-1 text-warning"></i></span>
                                        @endfor
                                        <p>{{ $rating->comment }}</p>
                                    </div>
                                    <div class="col-2">
                                        <h6 class="d-inline-block">{{ $rating->created_at->format('Y-m-d') }}</h6>
                                        @if (auth()->user()->role == 'مسؤول نظام')
                                            <form action="{{ route('reating.destroy', $rating->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button role="submit" class="btn btn-danger">حذف <i
                                                        class="bi bi-send-x"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
