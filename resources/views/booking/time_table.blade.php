@extends('layout.mian_structer')

@section('page_style')
    <style>
    body{
        margin-top:20px;
    }
    .bg-light-gray {
        background-color: #f7f7f7;
    }
    .table-bordered thead td, .table-bordered thead th {
        border-bottom-width: 2px;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .bg-sky.box-shadow {
        box-shadow: 0px 5px 0px 0px #00a2a7
    }

    .bg-orange.box-shadow {
        box-shadow: 0px 5px 0px 0px #af4305
    }

    .bg-green.box-shadow {
        box-shadow: 0px 5px 0px 0px #4ca520
    }

    .bg-yellow.box-shadow {
        box-shadow: 0px 5px 0px 0px #dcbf02
    }

    .bg-pink.box-shadow {
        box-shadow: 0px 5px 0px 0px #e82d8b
    }

    .bg-purple.box-shadow {
        box-shadow: 0px 5px 0px 0px #8343e8
    }

    .bg-lightred.box-shadow {
        box-shadow: 0px 5px 0px 0px #d84213
    }


    .bg-sky {
        background-color: #02c2c7
    }

    .bg-orange {
        background-color: #e95601
    }

    .bg-green {
        background-color: #5bbd2a
    }

    .bg-yellow {
        background-color: #f0d001
    }

    .bg-pink {
        background-color: #ff48a4
    }

    .bg-purple {
        background-color: #9d60ff
    }

    .bg-lightred {
        background-color: #ff5722
    }
    .padding-15px-lr {
        padding-left: 15px;
        padding-right: 15px;
    }
    .padding-5px-tb {
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .margin-10px-bottom {
        margin-bottom: 10px;
    }
    .border-radius-5 {
        border-radius: 5px;
    }

    .margin-10px-top {
        margin-top: 10px;
    }
    .font-size14 {
        font-size: 14px;
    }

    .text-light-gray {
        color: #d6d5d5;
    }
    .font-size13 {
        font-size: 13px;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .table td, .table th {
        padding: .75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    </style>
@endsection


@section('section_content')

<form action="{{ route('booking.select_the_month_table') }}" method="GET" class="d-inline-block">
    @csrf
    <label class="d-inline-block">اختر الشهر: </label>
    <input type="month" name="month" class="form-control w-50 d-inline" value="{{ $month->format('Y-m') }}">
    <input type="text" name="room" value="{{ $room->id }}" hidden>
    <button role="submit" class="btn btn-primary d-inline mx-2"><i class="bi bi-search"></i></button>
</form>

<span>الشهر: <span class="btn btn-secondary">{{ $month->format('F') }}</span></span>

<span class="mx-3">اسم المرفق: <span class="btn btn-info">{{ $room->name }}</span></span>

<div class="container">
    <div class="timetable-img text-center">
        <img src="img/content/timetable.png" alt="">
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light-gray">
                    <th class="text-uppercase">اليوم</th>
                    <th class="text-uppercase">الاسبوع الاول</th>
                    <th class="text-uppercase">الاسبوع الثاني</th>
                    <th class="text-uppercase">الاسبوع الثالث</th>
                    <th class="text-uppercase">الاسبوع الرابع</th>
                    <th class="text-uppercase">الاسبوع الخامس</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>السبت</td>
                    @foreach ($days_of_the_month['Saturday'] as $day)
                        <td>
                            @if ($day >= $month->format('Y-m-d') && $day >= $now->format('Y-m-d'))
                                <form action="{{ route('booking.select_time') }}" method="GET">
                                    @csrf
                                    <input name="day" type="date" value="{{ $day }}" hidden>
                                    <input type="text" name="room_id" value="{{ $room->id }}" hidden>
                                    <input type="submit" value="{{ $day }}" class="btn {{ $day == Carbon\Carbon::now()->format('Y-m-d') ? 'btn-info' : 'btn-link' }}">
                                </form>
                            @else
                                <span class="btn btn-secondary">{{ $day }}</span>
                            @endif
                        </td>
                    @endforeach
                    @if (count($days_of_the_month['Saturday']) == 4)
                        <td></td>
                    @endif
                </tr>
                <tr>
                    <td>الاحد</td>
                    @foreach ($days_of_the_month['Sunday'] as $day)
                        <td>
                            @if ($day >= $month->format('Y-m-d') && $day >= $now->format('Y-m-d'))
                                <form action="{{ route('booking.select_time') }}" method="GET">
                                    @csrf
                                    <input name="day" type="date" value="{{ $day }}" hidden>
                                    <input type="text" name="room_id" value="{{ $room->id }}" hidden>
                                    <input type="submit" value="{{ $day }}" class="btn {{ $day == Carbon\Carbon::now()->format('Y-m-d') ? 'btn-info' : 'btn-link' }}">
                                </form>
                            @else
                                <span class="btn btn-secondary">{{ $day }}</span>
                            @endif
                        </td>
                    @endforeach
                    @if (count($days_of_the_month['Sunday']) == 4)
                        <td></td>
                    @endif
                </tr>
                <tr>
                    <td>الاثنين</td>
                    @foreach ($days_of_the_month['Monday'] as $day)
                        <td>
                            @if ($day >= $month->format('Y-m-d') && $day >= $now->format('Y-m-d'))
                                <form action="{{ route('booking.select_time') }}" method="GET">
                                    @csrf
                                    <input name="day" type="date" value="{{ $day }}" hidden>
                                    <input type="text" name="room_id" value="{{ $room->id }}" hidden>
                                    <input type="submit" value="{{ $day }}" class="btn {{ $day == Carbon\Carbon::now()->format('Y-m-d') ? 'btn-info' : 'btn-link' }}">
                                </form>
                            @else
                                <span class="btn btn-secondary">{{ $day }}</span>
                            @endif
                        </td>
                    @endforeach
                    @if (count($days_of_the_month['Monday']) == 4)
                        <td></td>
                    @endif
                </tr>
                <tr>
                    <td>الثلاثاء</td>
                    @foreach ($days_of_the_month['Tuesday'] as $day)
                        <td>
                            @if ($day >= $month->format('Y-m-d') && $day >= $now->format('Y-m-d'))
                                <form action="{{ route('booking.select_time') }}" method="GET">
                                    @csrf
                                    <input name="day" type="date" value="{{ $day }}" hidden>
                                    <input type="text" name="room_id" value="{{ $room->id }}" hidden>
                                    <input type="submit" value="{{ $day }}" class="btn {{ $day == Carbon\Carbon::now()->format('Y-m-d') ? 'btn-info' : 'btn-link' }}">
                                </form>
                            @else
                                <span class="btn btn-secondary">{{ $day }}</span>
                            @endif
                        </td>
                    @endforeach
                    @if (count($days_of_the_month['Tuesday']) == 4)
                        <td></td>
                    @endif
                </tr>
                <tr>
                    <td>الاربعاء</td>
                    @foreach ($days_of_the_month['Wednesday'] as $day)
                        <td>
                            @if ($day >= $month->format('Y-m-d') && $day >= $now->format('Y-m-d'))
                                <form action="{{ route('booking.select_time') }}" method="GET">
                                    @csrf
                                    <input name="day" type="date" value="{{ $day }}" hidden>
                                    <input type="text" name="room_id" value="{{ $room->id }}" hidden>
                                    <input type="submit" value="{{ $day }}" class="btn {{ $day == Carbon\Carbon::now()->format('Y-m-d') ? 'btn-info' : 'btn-link' }}">
                                </form>
                            @else
                                <span class="btn btn-secondary">{{ $day }}</span>
                            @endif
                        </td>
                    @endforeach
                    @if (count($days_of_the_month['Wednesday']) == 4)
                        <td></td>
                    @endif
                </tr>
                <tr>
                    <td>الخميس</td>
                    @foreach ($days_of_the_month['Thursday'] as $day)
                        <td>
                            @if ($day >= $month->format('Y-m-d') && $day >= $now->format('Y-m-d'))
                                <form action="{{ route('booking.select_time') }}" method="GET">
                                    @csrf
                                    <input name="day" type="date" value="{{ $day }}" hidden>
                                    <input type="text" name="room_id" value="{{ $room->id }}" hidden>
                                    <input type="submit" value="{{ $day }}" class="btn {{ $day == Carbon\Carbon::now()->format('Y-m-d') ? 'btn-info' : 'btn-link' }}">
                                </form>
                            @else
                                <span class="btn btn-secondary">{{ $day }}</span>
                            @endif
                        </td>
                    @endforeach
                    @if (count($days_of_the_month['Thursday']) == 4)
                        <td></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
