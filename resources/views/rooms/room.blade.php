@extends('layout.mian_structer')

@section('section_content')
<div class="card overflow-scroll">
    <div class="card-body">
      <h5 class="card-title d-inline-block">قائمة المرافق</h5>
      @if (auth()->user()->role == 'مسؤول نظام')
        <button type="button" class="btn btn-primary float-start mt-3" data-bs-toggle="modal" data-bs-target="#basicModal">
            <i class="bi bi-building-fill-add"></i>
        </button>
      @endif
      <table class="table mt-2 text-center datatable">
        <thead>
          <tr>
            <th scope="col" class="text-center">الاسم</th>
            <th scope="col" class="text-center">السعة</th>
            <th scope="col" class="text-center">متوفر</th>
            <th scope="col" class="text-center">النوع</th>
            <th scope="col" class="text-center">اجراء</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->capacity }}</td>
                    @if ($room->available == 1)
                        <td><span class="btn btn-success"><i class="bi bi-check-lg"></i></span></td>
                    @else
                        <td><span class="btn btn-danger"><i class="bi bi-ban"></i></span></td>
                    @endif
                    <td>{{ $room->type }}</td>
                    <td>
                        @if (auth()->user()->role == 'مسؤول نظام')
                            <form action="{{ route('room.destroy', $room->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button role="submit" type="submit" class="btn btn-danger">
                                    <i class="bi bi-backspace-fill"></i>
                                </button>
                            </form>
                            <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning mx-1"><i class="bi bi-pencil-square"></i></a>
                        @endif
                        <a href="{{ route('room.show', $room->id) }}" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                        @if ((auth()->user()->role == 'طالب' || auth()->user()->role == 'عضو هيئة تدريس') && $room->available == 1)
                            <form action="{{ route('booking.time_table') }}" method="GET" class="d-inline-block">
                                @csrf
                                <input type="text" name="room_id" value="{{ $room->id }}" hidden>
                                <button role="submit" class="btn btn-primary mx-1"><i class="bi bi-table"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Default Table Example -->
    </div>
  </div>
@endsection

@section('section_modals')
    @if (auth()->user()->role == 'مسؤول نظام')
        <div class="modal fade" id="basicModal" tabindex="-1">
            <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">اضافة مرفق جديد</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mt-2">
                                <label>الاسم</label>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="text" name="name" class="form-control mt-2">
                            </div>
                            <div class="form-group mt-2">
                                <label>السعة</label>
                                @error('capacity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="number" min="1" name="capacity" class="form-control mt-2">
                            </div>
                            <div class="form-group mt-2">
                                <label>نوع المرفق</label>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <select class="form-select mt-2" name="type" aria-label="Default select example">
                                    <option value="معمل حاسوب">معمل حاسوب</option>
                                    <option value="فصل">فصل</option>
                                    <option value="مدرج">مدرج</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>صورة المرفق</label>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input name="image" class="form-control mt-2" type="file" id="formFile">
                            </div>
                            <div class="form-group mt-2">
                                <label>الوصف</label>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <textarea name="description" class="form-control mt-2" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                            <button role="submit" class="btn btn-primary mt-2">حفظ <i class="bi bi-cloud-download"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
