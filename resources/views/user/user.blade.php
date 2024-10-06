@extends('layout.mian_structer')

@section('section_content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title d-inline-block">قائمة مستخدمي النظام</h5>
      <button type="button" class="btn btn-primary float-start mt-3" data-bs-toggle="modal" data-bs-target="#basicModal">
        <i class="bi bi-person-fill-add"></i> اضافة مستخدم جديد
      </button>
      <table class="table mt-2 text-center datatable">
        <thead>
          <tr>
            <th scope="col">الاسم</th>
            <th scope="col">البريد الالكتروني</th>
            <th scope="col">نوع المستخدم</th>
            <th scope="col">تاريخ الاضافة</th>
            <th scope="col">اجراء</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('user.show_user', $user->id) }}" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning mx-2"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button role="submit" class="btn btn-danger"><i class="bi bi-person-fill-slash"></i></button>
                        </form>
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
<div class="modal fade" id="basicModal" tabindex="-1">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة مستخدم جديد</h5>
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
                        <label>البريد الالكتروني</label>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="email" name="email" class="form-control mt-2">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <input type="submit" class="btn btn-primary mt-2" value="حفظ">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
