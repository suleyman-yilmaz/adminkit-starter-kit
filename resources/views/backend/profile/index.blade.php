@extends('backend.layouts.app')
@section('backend.title', 'Profile')
@section('backend.content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Profile</h1>
            </div>
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Details</h5>
                        </div>
                        <div class="card-body text-center">
                            {{--
                            <img src="/backend/assets/img/avatars/avatar-4.jpg" alt="Christina Mason"
                                 class="img-fluid rounded-circle mb-2" width="128" height="128"/>
                            --}}
                            <div
                                class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mb-2 mx-auto"
                                style="width:128px; height:128px; font-size:48px; font-weight:600;">
                                {{ auth()->user()->initials }}
                            </div>
                            <h5 class="card-title mb-0">{{ auth()->user()->name ?? '-' }}</h5>
                            <div class="text-muted mb-2">Software Developer</div>

                            <div>
                                <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    <span data-feather="edit"></span> Edit
                                </a>
                            </div>
                        </div>
                        <hr class="my-0"/>
                        <div class="card-body">
                            <h5 class="h6 card-title">Skills</h5>
                            <a href="#" class="badge bg-primary me-1 my-1">Laravel</a>
                            <a href="#" class="badge bg-primary me-1 my-1">TypeSctipt</a>
                            <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
                            <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
                        </div>
                        <hr class="my-0"/>
                        <div class="card-body">
                            <h5 class="h6 card-title">About</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in
                                    <a href="#">Nevşehir, TR</a></li>

                                <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span>
                                    Works at <a href="#">Hika Bilişim</a></li>
                                <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From
                                    <a href="#">Turkiye</a></li>
                            </ul>
                        </div>
                        <hr class="my-0"/>
                        <div class="card-body">
                            <h5 class="h6 card-title">Elsewhere</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1"><a href="https://github.com/suleyman-yilmaz" target="_blank">Github</a>
                                </li>
                                <li class="mb-1"><a href="https://www.instagram.com/iamsuleymanymz" target="_blank">Instagram</a>
                                </li>
                                <li class="mb-1"><a href="https://www.linkedin.com/in/suleyman-yilmaz-888634251/"
                                                    target="_blank">LinkedIn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-xl-9">
                    <div class="card">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Activities</h5>
                        </div>
                        <div class="card-body h-100">

                            <div class="d-flex align-items-start">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                                     style="width:36px; height:36px; font-size:14px; font-weight:600;">
                                    {{ auth()->user()->initials }}
                                </div>
                                {{--
                                <img src="/backend/assets/img/avatars/avatar-5.jpg" width="36" height="36"
                                     class="rounded-circle me-2" alt="Vanessa Tucker">
                                --}}
                                <div class="flex-grow-1">
                                    <small class="float-end text-navy">{{ \Carbon\Carbon::parse('2025-10-19')->locale('tr')->diffForHumans() }}</small>
                                    <strong>Süleyman YILMAZ</strong> created <strong>Adminkit Starer Kit Project</strong><br/>
                                    <small class="text-muted">19.10.2025</small><br/>

                                </div>
                            </div>

                            <hr/>
                            <div class="d-grid">
                                <a href="#" class="btn btn-primary">Load more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Profili Düzenle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                </div>
                <form action="{{ route('backend.profile.update', auth()->user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Sekme Başlıkları -->
                        <ul class="nav nav-tabs" id="editProfileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                        type="button" role="tab" aria-controls="info" aria-selected="true">
                                    <i data-feather="user"></i> Bilgiler
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password"
                                        type="button" role="tab" aria-controls="password" aria-selected="false">
                                    <i data-feather="lock"></i> Şifre Değiştir
                                </button>
                            </li>
                        </ul>

                        <!-- Sekme İçerikleri -->
                        <div class="tab-content mt-3" id="editProfileTabsContent">
                            <!-- Bilgiler Sekmesi -->
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Ad Soyad</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ auth()->user()->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">E-posta</label>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Şifre Değiştir Sekmesi -->
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Mevcut Şifre</label>
                                            <input type="password" name="current_password" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Yeni Şifre</label>
                                            <input type="password" name="new_password" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Yeni Şifre (Tekrar)</label>
                                            <input type="password" name="new_password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
