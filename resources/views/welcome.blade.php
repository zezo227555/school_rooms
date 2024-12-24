@extends('layout.mian_structer')

@section('section_content')
    <div class="container">
        <h2 class="pb-2">المرافق</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">الفصول</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($class_rooms_available) }}</h6>
                                <span class="text-success small pt-1 fw-bold">متوفره</span>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-house-door-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">المدرجات</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($stage_rooms_available) }}</h6>
                                <span class="text-success small pt-1 fw-bold">متوفره</span>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-hospital-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">معامل الحاسوب</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($computer_rooms_available) }}</h6>
                                <span class="text-success small pt-1 fw-bold">متوفره</span>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-pc-display"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">الفصول</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($class_rooms) }}</h6>
                                <span class="text-danger small pt-1 fw-bold">مغلق</span>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-house-door-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">المدرجات</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($stage_rooms) }}</h6>
                                <span class="text-danger small pt-1 fw-bold">مغلق</span>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-hospital-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">معامل الحاسوب</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($computer_rooms) }}</h6>
                                <span class="text-danger small pt-1 fw-bold">مغلق</span>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-pc-display"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container mt-2">
        <h2 class="pb-2">المستخدمين</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">طالب</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($student) }}</h6>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">عضو هيئة تدريس</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($teacher) }}</h6>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">أدمن</h5>
                        <div class="d-flex">
                            <div class="ps-3 mx">
                                <h6>{{ count($admin) }}</h6>
                            </div>
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
