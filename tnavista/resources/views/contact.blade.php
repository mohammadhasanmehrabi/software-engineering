@extends('layouts.app')

@section('title', 'تماس با ما')

@push('styles')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush

@section('fullwidth')
<!-- بنر بالای صفحه -->
<div class="projects-hero-banner">
    <div class="projects-hero-bg"></div>
    <div class="projects-hero-content">
        <p class="projects-hero-title">تماس با یک تیم سایه‌نشین اما قابل‌اعتماد</p>
        <p class="projects-hero-desc">ارتباط با Novista مثل ارتباط با یک هکر حرفه‌ایه: دقیق، امن، با رمزگذاری کامل — اما بی‌نیاز از پرحرفی!</p>
    </div>
</div>
@endsection

@section('content')
<!-- بخش اصلی تماس -->
<div class="contact-main-section">
    <div class="container">
        <div class="row">
            <!-- فرم تماس -->
            <div class="col-lg-8">
                <div class="contact-form-container">
                    <div class="contact-form-header">
                        <h2 class="contact-form-title">
                            <i class="fas fa-terminal"></i>
                            >> Initiate Secure Contact
                        </h2>
                        <div class="connection-status">
                            <span class="status-dot"></span>
                            <span class="status-text">SECURE CONNECTION ESTABLISHED</span>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sender_name" class="form-label">
                                        <i class="fas fa-user"></i>
                                        [Name]
                                    </label>
                                    <input type="text" 
                                           id="sender_name" 
                                           name="sender_name" 
                                           class="form-control cyber-input" 
                                           placeholder="Who's trying to reach us?"
                                           value="{{ old('sender_name') }}"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sender_contact" class="form-label">
                                        <i class="fas fa-envelope"></i>
                                        [Email]
                                    </label>
                                    <input type="email" 
                                           id="sender_contact" 
                                           name="sender_contact" 
                                           class="form-control cyber-input" 
                                           placeholder="We'll reply only if needed."
                                           value="{{ old('sender_contact') }}"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">
                                <i class="fas fa-tag"></i>
                                [Reason]
                            </label>
                            <select id="subject" name="subject" class="form-select cyber-select" required>
                                <option value="">Choose one:</option>
                                <option value="Project Inquiry" {{ old('subject') == 'Project Inquiry' ? 'selected' : '' }}>Project Inquiry</option>
                                <option value="Bug Report" {{ old('subject') == 'Bug Report' ? 'selected' : '' }}>Bug Report</option>
                                <option value="Join Us" {{ old('subject') == 'Join Us' ? 'selected' : '' }}>Join Us</option>
                                <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">
                                <i class="fas fa-comment"></i>
                                [Message]
                            </label>
                            <textarea id="message" 
                                      name="message" 
                                      class="form-control cyber-textarea" 
                                      rows="6"
                                      placeholder="Keep it short. We value your time."
                                      required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-submit-section">
                            <button type="submit" class="btn cyber-button" id="submitBtn">
                                <span class="button-text">
                                    <i class="fas fa-paper-plane"></i>
                                    [Transmit Message]
                                </span>
                                <div class="button-loading" style="display: none;">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </button>
                            
                            <div class="security-note">
                                <i class="fas fa-shield-alt"></i>
                                ← Data sent via secure Novista Relay Protocol
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- اطلاعات تماس -->
            <div class="col-lg-4">
                <div class="contact-info-container">
                    <h3 class="contact-info-title">
                        <i class="fas fa-network-wired"></i>
                        Alternative Communication Channels
                    </h3>
                    
                    <div class="contact-methods">
                        <div class="contact-method-item">
                            <div class="method-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="method-content">
                                <h4>Email</h4>
                                <p>contact@novista.dev</p>
                                <small>Direct communication channel</small>
                            </div>
                        </div>

                        <div class="contact-method-item">
                            <div class="method-icon">
                                <i class="fab fa-github"></i>
                            </div>
                            <div class="method-content">
                                <h4>GitHub</h4>
                                <p>github.com/novista</p>
                                <small>Open source collaboration</small>
                            </div>
                        </div>

                        <div class="contact-method-item">
                            <div class="method-icon">
                                <i class="fab fa-telegram"></i>
                            </div>
                            <div class="method-content">
                                <h4>Telegram</h4>
                                <p>@novistaHQ</p>
                                <small>Bot-based chat – encrypted</small>
                            </div>
                        </div>

                        <div class="contact-method-item">
                            <div class="method-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="method-content">
                                <h4>Response Time</h4>
                                <p>24-48 hours</p>
                                <small>We respond when it matters</small>
                            </div>
                        </div>
                    </div>

                    <div class="contact-footer-note">
                        <p>
                            <i class="fas fa-info-circle"></i>
                            Novista doesn't operate on typical hours. We respond when it matters.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 