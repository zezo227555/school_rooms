@extends('layout.mian_structer')

@section('section_content')
<div class="card">
    <div class="card-body overflow-scroll">
      <h5 class="card-title d-inline-block">قائمة الحجوزات</h5>
      <table class="table mt-2 text-center datatable">
        <thead>
          <tr>
            <th scope="col" class="text-center">اسم المستخدم</th>
            <th scope="col" class="text-center">الصلاحية</th>
            <th scope="col" class="text-center">القاعة</th>
            <th scope="col" class="text-center">التاريخ</th>
            <th scope="col" class="text-center">اجراء</th>
          </tr>
        </thead>
        <tbody>
            @if (auth()->user()->role == 'مسؤول نظام')
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->users->name }}</td>
                        <td>{{ $booking->users->role }}</td>
                        <td>{{ $booking->rooms->name }}</td>
                        <td>{{ Carbon\Carbon::parse($booking->day)->format('Y-m-d') }} | {{ $booking->start_time_end_time }}</td>
                        <td>
                            <a href="{{ route('booking.message_form', $booking->id) }}" class="btn btn-primary mx-1"><i class="bi bi-chat-dots-fill"></i></a>
                            @if (Carbon\Carbon::parse($booking->day)->format('Y-m-d H') > Carbon\Carbon::now()->format('Y-m-d H'))
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button role="submit" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->users->name }}</td>
                        <td>{{ $booking->users->role }}</td>
                        <td>{{ $booking->rooms->name }}</td>
                        <td>{{ Carbon\Carbon::parse($booking->day)->format('Y-m-d') }} | {{ $booking->start_time_end_time }}</td>
                        <td>
                            @if ($booking->rating->isNotEmpty())
                                @foreach ($booking->rating as $r)
                                    <a href="{{ route('reating.edit', $r->id) }}" class="btn btn-secondary">تعديل التقييم <i class="bi bi-star-half"></i></a>
                                @endforeach
                            @else
                                <a href="{{ route('reating.create', $booking->id) }}" class="btn btn-success">تقييم <i class="bi bi-star-half"></i></a>
                            @endif
                            @if (Carbon\Carbon::parse($booking->day)->format('Y-m-d H') > Carbon\Carbon::now()->format('Y-m-d H'))
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button role="submit" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>
@endsection
