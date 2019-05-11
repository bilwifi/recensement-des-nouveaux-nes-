@extends('etablissements.layouts.master')
@push('stylesheets')
    <link href="{{ asset('css/formulaire/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formulaire/steps.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/matrix.css') }}" rel="stylesheet"> --}}

@endpush
@section('content')
<div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Basic Form Example</h4>
                        <h6 class="card-subtitle"></h6>
                        <form id="example-form" action="#" class="m-t-40" novalidate="novalidate">
                            <div role="application" class="wizard clearfix" id="steps-uid-0"><div class="steps clearfix"><ul role="tablist"><li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0"><span class="current-info audible">current step: </span><span class="number">1.</span> Account</a></li><li role="tab" class="done" aria-disabled="false" aria-selected="false"><a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1"><span class="number">2.</span> Profile</a></li><li role="tab" class="done" aria-disabled="false" aria-selected="false"><a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2"><span class="number">3.</span> Hints</a></li><li role="tab" class="last done" aria-disabled="false" aria-selected="false"><a id="steps-uid-0-t-3" href="#steps-uid-0-h-3" aria-controls="steps-uid-0-p-3"><span class="number">4.</span> Finish</a></li></ul></div><div class="content clearfix">
                                <h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Account</h3>
                                <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false" style="left: 0px;">
                                    <label for="userName">User name *</label>
                                    <label id="userName-error" class="error" for="userName" style="display: none;"></label><input id="userName" name="userName" type="text" class="required form-control valid" aria-invalid="false">
                                    <label for="password">Password *</label>
                                    <label id="password-error" class="error" for="password" style="display: none;"></label><input id="password" name="password" type="text" class="required form-control valid validate-equalTo-blur" aria-invalid="false">
                                    <label for="confirm">Confirm Password *</label>
                                    <label id="confirm-error" class="error" for="confirm" style="display: none;"></label><input id="confirm" name="confirm" type="text" class="required form-control valid" aria-invalid="false">
                                    <p>(*) Mandatory</p>
                                </section>
                                <h3 id="steps-uid-0-h-1" tabindex="-1" class="title">Profile</h3>
                                <section id="steps-uid-0-p-1" role="tabpanel" aria-labelledby="steps-uid-0-h-1" class="body" aria-hidden="true" style="left: -1021px; display: none;">
                                    <label for="name">First name *</label>
                                    <input id="name" name="name" type="text" class="required form-control valid" aria-invalid="false">
                                    <label for="surname">Last name *</label>
                                    <input id="surname" name="surname" type="text" class="required form-control valid" aria-invalid="false">
                                    <label for="email">Email *</label>
                                    <label id="email-error" class="error" for="email" style="display: none;"></label><input id="email" name="email" type="text" class="required email form-control valid" aria-invalid="false">
                                    <label for="address">Address</label>
                                    <input id="address" name="address" type="text" class=" form-control">
                                    <p>(*) Mandatory</p>
                                </section>
                                <h3 id="steps-uid-0-h-2" tabindex="-1" class="title">Hints</h3>
                                <section id="steps-uid-0-p-2" role="tabpanel" aria-labelledby="steps-uid-0-h-2" class="body" aria-hidden="true" style="left: -1021px; display: none;">
                                    <ul>
                                        <li>Foo</li>
                                        <li>Bar</li>
                                        <li>Foobar</li>
                                    </ul>
                                </section>
                                <h3 id="steps-uid-0-h-3" tabindex="-1" class="title">Finish</h3>
                                <section id="steps-uid-0-p-3" role="tabpanel" aria-labelledby="steps-uid-0-h-3" class="body" aria-hidden="true" style="left: 1021px; display: none;">
                                    <label id="acceptTerms-error" class="error" for="acceptTerms" style="display: none;"></label><input id="acceptTerms" name="acceptTerms" type="checkbox" class="required valid" aria-invalid="false">
                                    <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </section>
                            </div><div class="actions clearfix"><ul role="menu" aria-label="Pagination"><li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li><li aria-hidden="false" aria-disabled="false" class="" style=""><a href="#next" role="menuitem">Next</a></li><li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Finish</a></li></ul></div></div>
                        </form>
                    </div>
                </div>


@stop
@push('scripts')
{{-- <script type="text/javascript" src="{{ asset('js/formulaire/custom..js') }}"></script>	 --}}
<script type="text/javascript" src="{{ asset('js/formulaire/wave.js') }}"></script>	
{{-- <script type="text/javascript" src="{{ asset('js/formulaire/jquery.validate.min.js') }}"></script>	 --}}
<script type="text/javascript" src="{{ asset('js/formulaire/jquery.steps.min.js') }}"></script>
  <script>
        // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
     form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    });


    </script>

@endpush