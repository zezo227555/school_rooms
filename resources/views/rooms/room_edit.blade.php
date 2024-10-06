@extends('layout.mian_structer')

@section('section_content')
<div class="card">
    <div class="card-body pt-3">
      <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" role="tab" tabindex="-1">عرض و تغيير بيانات المرفق</button>
        </li>
      </ul>
      <div class="tab-content pt-2">
        <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
            <form action="{{ route('room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group mt-2">
                            <label>الاسم</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="text" name="name" class="form-control mt-2" value="{{ $room->name }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mt-2">
                            <label>السعة</label>
                            @error('capacity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="number" min="1" name="capacity" class="form-control mt-2" value="{{ $room->capacity }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mt-2">
                            <label>نوع المرفق</label>
                            @error('type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <select class="form-select mt-2" name="type" aria-label="Default select example">
                                <option value="معمل حاسوب" {{ $room->type == 'معمل حاسوب' ? 'selected' : '' }}>معمل حاسوب</option>
                                <option value="فصل" {{ $room->type == 'فصل' ? 'selected' : '' }}>فصل</option>
                                <option value="مدرج" {{ $room->type == 'مدرج' ? 'selected' : '' }}>مدرج</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mt-2">
                            <label>الحالة</label>
                            @error('type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <select class="form-select mt-2" name="available" aria-label="Default select example">
                                <option value="1" {{ $room->available == 1 ? 'selected' : '' }}>مفعل</option>
                                <option value="0" {{ $room->available == 0 ? 'selected' : '' }}>غير مفعل</option>
                            </select>
                        </div>
                    </div>
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
                    <textarea name="description" class="form-control" rows="3">{{ $room->description }}</textarea>
                </div>
                <input type="submit" value="حفظ" class="btn btn-primary w-25 d-block mt-3">
            </form>
        </div>
      </div><!-- End Bordered Tabs -->
    </div>
</div>
@endsection
