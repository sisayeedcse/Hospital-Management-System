@extends('defaultLayout.app')

@section('title', 'Our Services - HospitalX Medical Excellence')

@section('content')
    <div class="container">
        <!-- Page header -->
        <div class="content-wrapper text-center">
            <h1 class="display-4 text-primary mb-3">
                <i class="fas fa-stethoscope"></i> Our Medical Services
            </h1>
            <p class="lead text-muted">
                Comprehensive healthcare services delivered by expert medical professionals using advanced technology.
            </p>
        </div>

        <!-- Services grid -->
        <div class="row">
            <!-- Emergency Services -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="content-wrapper h-100 text-center service-card">
                    <div class="service-icon mb-3">
                        <i class="fas fa-ambulance text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="text-primary">Emergency Services</h4>
                    <p class="text-muted">
                        24/7 emergency care with rapid response team, trauma center, and critical care units.
                        Immediate medical attention when you need it most.
                    </p>
                    <ul class="list-unstyled text-left">
                        <li><i class="fas fa-check text-success mr-2"></i> 24/7 Emergency Room</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Trauma Center Level II</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Emergency Surgery</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Ambulance Services</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>

            <!-- Cardiology -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="content-wrapper h-100 text-center service-card">
                    <div class="service-icon mb-3">
                        <i class="fas fa-heartbeat text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="text-primary">Cardiology</h4>
                    <p class="text-muted">
                        Comprehensive heart care including diagnostics, interventional procedures, and cardiac surgery
                        by board-certified cardiologists.
                    </p>
                    <ul class="list-unstyled text-left">
                        <li><i class="fas fa-check text-success mr-2"></i> Cardiac Catheterization</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Heart Surgery</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Pacemaker Implantation</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Preventive Cardiology</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>

            <!-- Orthopedics -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="content-wrapper h-100 text-center service-card">
                    <div class="service-icon mb-3">
                        <i class="fas fa-bone text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="text-primary">Orthopedics</h4>
                    <p class="text-muted">
                        Expert care for bone, joint, and muscle conditions including sports medicine,
                        joint replacement, and spine surgery.
                    </p>
                    <ul class="list-unstyled text-left">
                        <li><i class="fas fa-check text-success mr-2"></i> Joint Replacement</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Spine Surgery</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Sports Medicine</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Physical Therapy</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>

            <!-- Neurology -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="content-wrapper h-100 text-center service-card">
                    <div class="service-icon mb-3">
                        <i class="fas fa-brain text-info" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="text-primary">Neurology</h4>
                    <p class="text-muted">
                        Advanced neurological care for brain, spine, and nervous system disorders
                        with cutting-edge diagnostic and treatment options.
                    </p>
                    <ul class="list-unstyled text-left">
                        <li><i class="fas fa-check text-success mr-2"></i> Brain Surgery</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Stroke Treatment</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Epilepsy Care</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Movement Disorders</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>

            <!-- Pediatrics -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="content-wrapper h-100 text-center service-card">
                    <div class="service-icon mb-3">
                        <i class="fas fa-baby text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="text-primary">Pediatrics</h4>
                    <p class="text-muted">
                        Specialized medical care for infants, children, and adolescents with
                        child-friendly environment and pediatric specialists.
                    </p>
                    <ul class="list-unstyled text-left">
                        <li><i class="fas fa-check text-success mr-2"></i> Neonatal Care</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Pediatric Surgery</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Child Development</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Immunizations</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>

            <!-- Oncology -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="content-wrapper h-100 text-center service-card">
                    <div class="service-icon mb-3">
                        <i class="fas fa-ribbon text-pink" style="font-size: 3rem; color: #e91e63;"></i>
                    </div>
                    <h4 class="text-primary">Oncology</h4>
                    <p class="text-muted">
                        Comprehensive cancer care with multidisciplinary approach including chemotherapy,
                        radiation therapy, and surgical oncology.
                    </p>
                    <ul class="list-unstyled text-left">
                        <li><i class="fas fa-check text-success mr-2"></i> Cancer Screening</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Chemotherapy</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Radiation Therapy</li>
                        <li><i class="fas fa-check text-success mr-2"></i> Support Services</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Specialized centers -->
        <div class="content-wrapper">
            <h2 class="text-center text-primary mb-5">
                <i class="fas fa-hospital"></i> Specialized Medical Centers
            </h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-primary h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-heart"></i> Heart & Vascular Center</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                State-of-the-art cardiac care facility with advanced diagnostic equipment,
                                cardiac catheterization lab, and experienced cardiovascular surgeons.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success mr-2"></i> Cardiac Catheterization Lab</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Open Heart Surgery</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Non-invasive Cardiology</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-success h-100">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-user-md"></i> Women's Health Center</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Comprehensive women's healthcare services including obstetrics, gynecology,
                                mammography, and specialized women's health programs.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success mr-2"></i> Maternity Services</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Gynecological Surgery</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Breast Health Center</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointment call to action -->
        <div class="content-wrapper text-center"
            style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: white;">
            <h3 class="mb-3">Ready to Schedule Your Appointment?</h3>
            <p class="mb-4">
                Our medical professionals are ready to provide you with the highest quality care.
                Contact us today to schedule your consultation.
            </p>
            <div>
                <a href="#" class="btn btn-light btn-lg mr-3">
                    <i class="fas fa-calendar-check"></i> Book Appointment
                </a>
                <a href="tel:+1234567890" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone"></i> Call Now
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/Styles/services.css') }}">
@endpush