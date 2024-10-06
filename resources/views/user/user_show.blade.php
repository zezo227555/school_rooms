@extends('layout.mian_structer')

@section('section_content')

<div class="card">
    <div class="card-body pt-3">
      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="false" role="tab" tabindex="-1">عرض بيانات الحساب</button>
        </li>

      </ul>
      <div class="tab-content pt-2">
        <div class="tab-pane fade show profile-overview" id="profile-overview" role="tabpanel">

            <h5 class="card-title">تفاصيل الحساب</h5>

            <div class="row mt-2">
              <div class="col-lg-3 col-md-4 label ">الاسم</div>
              <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
            </div>

            <div class="row mt-2">
              <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
              <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
            </div>

            <div class="row mt-2">
              <div class="col-lg-3 col-md-4 label">الصلاحية</div>
              <div class="col-lg-9 col-md-8">{{ $user->role }}</div>
            </div>

            <div class="row mt-2">
              <div class="col-lg-3 col-md-4 label">تاريخ الاضافة</div>
              <div class="col-lg-9 col-md-8">{{ $user->created_at->format('Y-m-d') }}</div>
            </div>

            <div class="row mt-2">
              <div class="col-lg-3 col-md-4 label">تاريخ اخر تعديل</div>
              <div class="col-lg-9 col-md-8">{{ $user->updated_at->format('Y-m-d') }}</div>
            </div>
          </div>
      </div><!-- End Bordered Tabs -->
    </div>
</div>

@endsection
