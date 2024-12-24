@extends('layout.mian_structer')

@section('section_content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ملخص تقرير الحجوزات</h5>
            <canvas id="doughnutChart"
                style="max-height: 400px; display: block; box-sizing: border-box; height: 350px; width: 350px;" width="1051"
                height="1051"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#doughnutChart'), {
                        type: 'doughnut',
                        data: {
                            labels: [
                                @foreach ($booking_sections as $key => $value)
                                    '{{ $key }}',
                                @endforeach
                            ],
                            datasets: [{
                                data: [
                                    @foreach ( $booking_sections as $booking_section )
                                        {{ $booking_section }},
                                    @endforeach
                                ],
                                backgroundColor: [
                                    @foreach ($booking_sections as $booking_section)
                                        'rgb({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }})',
                                    @endforeach
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                });
            </script>
        </div>
    </div>


    <div class="card">
        <div class="card-body overflow-scroll">
            <h5 class="card-title d-inline-block">التقرير المفصل</h5>
            <table class="table mt-2 text-center datatable">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">اسم المستخدم</th>
                        <th scope="col" class="text-center">الصلاحية</th>
                        <th scope="col" class="text-center">القاعة</th>
                        <th scope="col" class="text-center">الطابق</th>
                        <th scope="col" class="text-center">الموعد</th>
                        <th scope="col" class="text-center">تاريخ الحجز</th>
                    </tr>
                </thead>
                <tbody>
                    @if (auth()->user()->role == 'مسؤول نظام')
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->users->name }}</td>
                                <td>{{ $booking->users->role }}</td>
                                <td>{{ $booking->rooms->name }}</td>
                                <td>{{ $booking->rooms->floor }}</td>
                                <td>{{ Carbon\Carbon::parse($booking->day)->format('Y-m-d') }} |
                                    {{ $booking->start_time_end_time }}</td>
                                <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->users->name }}</td>
                                <td>{{ $booking->users->role }}</td>
                                <td>{{ $booking->rooms->name }}</td>
                                <td>{{ Carbon\Carbon::parse($booking->day)->format('Y-m-d') }} |
                                    {{ $booking->start_time_end_time }}</td>
                                <td>
                                    @if ($booking->rating->isNotEmpty())
                                        @foreach ($booking->rating as $r)
                                            <a href="{{ route('reating.edit', $r->id) }}" class="btn btn-secondary">تعديل
                                                التقييم <i class="bi bi-star-half"></i></a>
                                        @endforeach
                                    @else
                                        <a href="{{ route('reating.create', $booking->id) }}" class="btn btn-success">تقييم
                                            <i class="bi bi-star-half"></i></a>
                                    @endif
                                    @if (Carbon\Carbon::parse($booking->day)->format('Y-m-d H') > Carbon\Carbon::now()->format('Y-m-d H'))
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button role="submit" class="btn btn-danger"><i
                                                    class="bi bi-x-circle-fill"></i></button>
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
