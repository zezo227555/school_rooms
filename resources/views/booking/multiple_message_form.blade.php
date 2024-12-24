@extends('layout.mian_structer')

@section('section_content')
    <form action="{{ route('booking.multiple_message_send') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body overflow-scroll">
                <h5 class="card-title d-inline-block">قائمة الحجوزات</h5>
                <button type="button" class="btn btn-primary float-start mt-3" data-bs-toggle="modal"
                    data-bs-target="#basicModal">
                    <i class="bi bi-chat-dots-fill"></i> ارسال رسالة لعدة مستخدمين
                </button>
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
                                    <td>{{ Carbon\Carbon::parse($booking->day)->format('Y-m-d') }} |
                                        {{ $booking->start_time_end_time }}</td>
                                    <td>
                                        <input class="form-check-input p-3 align-center mx-1" type="checkbox"
                                            name="booking_id[]" value="{{ $booking->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">رسالة لعدة مستخدمين</h5>
                    </div>
                    <div class="modal-body">
                        <label for="inputPassword">محتوى الرسالة</label>
                        @error('massege')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <textarea class="form-control mt-2" rows="8" name="massege"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <input type="submit" class="btn btn-primary mt-2" value="ارسال">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
