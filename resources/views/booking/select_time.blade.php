@extends('layout.mian_structer')


@section('section_content')

<span>اليوم: <span class="btn btn-secondary">{{ $day }}</span></span>

<span class="mx-3">اسم المرفق: <span class="btn btn-info">{{ $room->name }}</span></span>

<div class="container">
    <div class="timetable-img text-center">
        <img src="img/content/timetable.png" alt="">
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light-gray">
                    <th class="text-uppercase">التوقيت</th>
                    <th class="text-uppercase">اجراء</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $conter = false;
                @endphp
                <tr>
                        <td>8am - 10am</td>
                        @if ($bookings->isEmpty())
                            <td>
                                @if ($now < '8' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="8am_10am" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 8:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                @else
                                    <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                @endif
                            </td>
                        @else
                        @foreach ($bookings as $booking)
                            @if ($booking->start_time_end_time == '8am_10am')
                                @php
                                    $conter = true;
                                @endphp
                            @endif
                        @endforeach

                    @if ($conter)
                        <td><span class="btn btn-danger">محجوز</span></td>
                    @else
                        <td>
                            @if ($now < '8' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="8am_10am" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 8:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                @else
                                    <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                @endif
                        </td>
                    @endif
                        @endif
                </tr>
                @php
                    $conter = false;
                @endphp
                <tr>
                    <td>10am - 12pm</td>
                    @if ($bookings->isEmpty())
                        <td>
                            @if ($now < '10' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="10am_12pm" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 10:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                @else
                                    <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                @endif
                        </td>
                    @else
                    @foreach ($bookings as $booking)
                    @if ($booking->start_time_end_time == '10am_12pm')
                        @php
                            $conter = true;
                        @endphp
                    @endif
                        @endforeach

                        @if ($conter)
                            <td><span class="btn btn-danger">محجوز</span></td>
                        @else
                            <td>
                                @if ($now < '10' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="10am_12pm" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 10:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                @else
                                    <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                @endif
                            </td>
                        @endif
                    @endif
                </tr>
                @php
                    $conter = false;
                @endphp
                <tr>
                    <td>12pm - 2pm</td>
                    @if ($bookings->isEmpty())
                        <td>
                            @if ($now < '12' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="12pm_2pm" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 12:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                @else
                                    <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                @endif
                        </td>
                    @else
                        @foreach ($bookings as $booking)
                                @if ($booking->start_time_end_time == '12pm_2pm')
                                    @php
                                        $conter = true;
                                    @endphp
                                @endif
                            @endforeach

                            @if ($conter)
                                <td><span class="btn btn-danger">محجوز</span></td>
                            @else
                                <td>
                                    @if ($now < '12' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="12pm_2pm" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 12:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                    @else
                                        <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                    @endif
                                </td>
                            @endif
                        @endif
                </tr>
                @php
                    $conter = false;
                @endphp
                <tr>
                    <td>2pm - 4pm</td>
                    @if ($bookings->isEmpty())
                        <td>
                            @if ($now < '14' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="2pm_4pm" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 14:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                    @else
                                        <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                    @endif
                        </td>
                    @else
                        @foreach ($bookings as $booking)
                            @if ($booking->start_time_end_time == '2pm_4pm')
                                @php
                                    $conter = true;
                                @endphp
                            @endif
                        @endforeach

                        @if ($conter)
                            <td><span class="btn btn-danger">محجوز</span></td>
                        @else
                            <td>
                                @if ($now < '14' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                <form action="{{ route('booking.store') }}" method="POST">
                                    @csrf
                                    <input type="text" value="2pm_4pm" name="booking_hour" hidden>
                                    <input type="text" value="{{ $room->id }}" name="room" hidden>
                                    <input type="text" value="{{ $day }} 14:00" name="day" hidden>
                                    <input type="submit" value="حجز الموعد" class="btn btn-success">
                                </form>
                                @else
                                    <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                @endif
                            </td>
                        @endif
                    @endif
                </tr>
                @php
                    $conter = false;
                @endphp
                <tr>
                    <td>4pm - 6pm</td>
                        @if ($bookings->isEmpty())
                            <td>
                                @if ($now < '16' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="4pm_6pm" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 16:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                @else
                                    <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                @endif
                            </td>
                        @else
                            @foreach ($bookings as $booking)
                                @if ($booking->start_time_end_time == '4pm_6pm')
                                    @php
                                        $conter = true;
                                    @endphp
                                @endif
                            @endforeach

                            @if ($conter)
                                <td><span class="btn btn-danger">محجوز</span></td>
                            @else
                                <td>
                                    @if ($now < '16' || $day > Carbon\Carbon::now()->format('Y-m-d'))
                                    <form action="{{ route('booking.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="4pm_6pm" name="booking_hour" hidden>
                                        <input type="text" value="{{ $room->id }}" name="room" hidden>
                                        <input type="text" value="{{ $day }} 16:00" name="day" hidden>
                                        <input type="submit" value="حجز الموعد" class="btn btn-success">
                                    </form>
                                    @else
                                        <span class="btn btn-secondary"><i class="bi-x-octagon-fill"></i></span>
                                    @endif
                                </td>
                            @endif
                        @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
