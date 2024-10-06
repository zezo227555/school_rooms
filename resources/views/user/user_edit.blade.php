@extends('layout.mian_structer')

@section('section_content')
<div class="card">
    <div class="card-body pt-3">
      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" role="tab" tabindex="-1">عرض و تغيير بيانات الحساب</button>
        </li>

      </ul>
      <div class="tab-content pt-2">
        <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
          <!-- Change Password Form -->
          <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-2">
                <label>الاسم</label>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="name" class="form-control mt-2" value="{{ $user->name }}">
            </div>
            <div class="form-group mt-2">
                <label>البريد الالكتروني</label>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="email" name="email" class="form-control mt-2" value="{{ $user->email }}">
            </div>
            <div class="form-group mt-2">
                <label>نوع المستخدم</label>
                @error('role')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <select class="form-select mt-2" name="role" aria-label="Default select example">
                    <option value="طالب">طالب</option>
                    <option value="عضو هيئة تدريس">عضو هيئة تدريس</option>
                    <option value="مسؤول نظام">مسؤول نظام</option>
                  </select>
            </div>
            <div class="form-group mt-2">
                <label>كلمة المرور</label>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="password" name="password" class="form-control mt-2">
            </div>
              <button type="submit" class="btn btn-primary mt-3 d-block w-25">تعديل البيانات</button>
          </form><!-- End Change Password Form -->
        </div>
      </div><!-- End Bordered Tabs -->
    </div>
</div>
@endsection
